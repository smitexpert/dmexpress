<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\AreaType;
use App\Models\DefaultCharge;
use App\Models\Marchent;
use App\Models\MarchentCharge;
use App\Models\Parcel;
use App\Models\ParcelTimeline;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use \Milon\Barcode\DNS1D;
use PDF;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marchents = Marchent::where('status', 1)->orderBy('name', 'ASC')->get();
        $types = AreaType::all();

        return view('backend.admin.parcel.marchent', compact('marchents', 'types'));
    }

    public function add()
    {
        $marchents = Marchent::where('status', 1)->orderBy('name', 'ASC')->get();
        $types = AreaType::all();

        return view('backend.admin.parcel.marchent', compact('marchents', 'types'));
    }

    public function request()
    {
        $marchents = Marchent::with(['parcels' => function($q){
                return $q->where('status_id', 1);
            }])->whereHas('parcels', function($q){
            $q->where('status_id', 1);
        })->get();

        return view('backend.admin.parcel.request', compact('marchents'));
    }

    public function requestList($id)
    {
        $marchent = Marchent::with('parcels.type', 'parcels.area', 'parcels.pickup.area')->with(['parcels' => function($q){
            return $q->where('status_id', 1);
        }])->where('id', $id)->firstOrFail();

        // return dd($marchent);

        return view('backend.admin.parcel.request-list', compact('marchent'));
    }

    public function requestShow($id)
    {
        $marchent = Marchent::findOrFail($id);

        return view('backend.admin.parcel.show', compact('marchent'));
    }

    public function pending()
    {
        $marchents = Marchent::with(['parcels' => function($q){
                return $q->where('status_id', 1);
            }])->whereHas('parcels', function($q){
            $q->where('status_id', 1);
        })->get();

        return view('backend.admin.parcel.pending', compact('marchents'));
    }

    public function approved()
    {
        $parcels = Parcel::with('marchent', 'area.zone')->where('status_id', 2)->get();

        return view('backend.admin.parcel.approved', compact('parcels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->charge != null)
        {
            $net_charge = $request->charge;
            $cod = 0;
        }else{
            $calculate = MarchentCharge::where('marchent_id', $request->marchent_id)
                                    ->where('area_type_id', $request->area_type_id)
                                    ->first();
        
            if(!$calculate)
            {
                $calculate = DefaultCharge::where('area_type_id', $request->area_type_id)->first();
            }

            if($calculate)
            {
                $charge = $calculate->charge;
                $cod = $calculate->cod;
                $additional_charge = $calculate->additional_charge;
            }else{
                $charge = 0;
                $cod = 0;
                $additional_charge = 0;
            }

            if($request->weight > 1)
            {
                $net = $request->weight - 1;
                $cal_add = $net * $additional_charge;

                $net_charge = $charge + $cal_add;
            }else{
                $net_charge = $charge;
            }
        }

        
        if($request->cod != null)
        {
            $cod = $request->cod;
            $net_charge = $net_charge+($request->collection/100)*$request->cod;
        }


        $total = Parcel::whereDay('created_at', date('d'))
                            ->whereMonth('created_at', date('m'))
                            ->whereYear('created_at', date('Y'))->count();

        $tracking = date('y').date('m').date('d').'-'.($total+1);

        $parcel = Parcel::create([
            'tracking' => $tracking,
            'marchent_id' => $request->marchent_id,
            'pickup_id' => $request->pickup_id,
            'collection' => $request->collection,
            'product_price' => $request->product_price,
            'weight' => $request->weight,
            'marchent_invoice_no' => $request->marchent_invoice_no,
            'area_type_id' => $request->area_type_id,
            'area_id' => $request->area_id,
            'customer_phone' => $request->customer_phone,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'charge' => $net_charge,
            'cod' => $cod,
            'status_id' => 2,
            'delivery_at' => $request->date,
            'attempt' => 1
        ]);

        ParcelTimeline::create([
            'parcel_id' => $parcel->id,
            'text' => 'Parcel is created successfully.'
        ]);

        $data = [
            'tracking' => $parcel->tracking,
            'id' => $parcel->id,
            'print_url' => route('admin.parcels.print', ['id' => $parcel->id])
        ];

        return response()->json($data);
    }

    public function print($id)
    {
        $parcel = Parcel::with('marchent', 'area', 'hero')->findOrFail($id);

        view()->share('parcel', $parcel);

        $size = array(58, 210);

        // return view('backend.admin.parcel.print', compact('parcel'));

        $pdf = PDF::loadView('backend.admin.parcel.print', [], [], [
            'format' => $size,
            'margin_top' => 0,
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_bottom' => 0,
            ]);
	    return $pdf->stream('document.pdf');

        // $pdf = PDF::loadView('backend.admin.parcel.print', $parcel)->setPaper($size);


        // return $pdf->stream();


       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        $marchent = Marchent::where('id', $parcel->marchent_id)->with('address')->firstOrFail();
        $types = AreaType::all();
        $areas = Area::where('type_id', $parcel->area_type_id)->orderBy('name', 'ASC')->get();
        // return dd($marchent);

        return view('backend.admin.parcel.edit', compact('marchent', 'types', 'parcel', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcel $parcel)
    {
        $request->validate([
            'pickup_id' => 'required',
            'area_type_id' => 'required',
            'area_id' => 'required',
            'collection' => 'required',
            'product_price' => 'required',
            'weight' => 'required',
            'cod' => 'required',
            'charge' => 'required',
            'customer_name' => 'required',
            'customer_phone' => 'required|min:11|max:11',
            'address' => 'required'
        ]);

        $parcel->update([
            'pickup_id' => $request->pickup_id,
            'area_type_id' => $request->area_type_id,
            'area_id' => $request->area_id,
            'marchent_invoice_no' => $request->marchent_invoice_no,
            'collection' => $request->collection,
            'product_price' => $request->product_price,
            'weight' => $request->weight,
            'cod' => $request->cod,
            'charge' => $request->charge,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'updated_by' => Auth::user()->id
        ]);

        return back()->with('success', 'পার্সেলটি আপডেট সম্পর্ন হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcel $parcel)
    {
        //
    }
}
