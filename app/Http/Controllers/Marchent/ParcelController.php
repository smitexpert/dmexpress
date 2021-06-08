<?php

namespace App\Http\Controllers\Marchent;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\AreaType;
use App\Models\DefaultCharge;
use App\Models\MarchentCharge;
use App\Models\Parcel;
use App\Models\ParcelTimeline;
use App\Models\Pickup;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $pickups = Pickup::where('marchent_id', Auth::guard('marchent')->user()->id)->get();

        if($pickups->count() == 0)
        {
            return redirect()->route('marchent.pickups.index')->with('error', 'পিকআপ ঠিকানা ব্যবহার করা হয়নি।');
        }

        return view('backend.marchent.parcel.index', compact('pickups'));
    }

    public function dataTable()
    {
        $parcels = Parcel::where('marchent_id', Auth::guard('marchent')->user()->id)->orderBy('id', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pickups = Pickup::where('marchent_id', Auth::guard('marchent')->user()->id)->get();

        if($pickups->count() == 0)
        {
            return redirect()->route('marchent.pickups.index')->with('error', 'পিকআপ ঠিকানা ব্যবহার করা হয়নি।');
        }
        
        $pickups = Pickup::where('marchent_id', Auth::guard('marchent')->user()->id)->get();
        $types = AreaType::all();

        return view('backend.marchent.parcel.create', compact('pickups', 'types'));
    }

    public function area(Request $request)
    {
        $area = Area::where('type_id', $request->id)->get();

        $marchent_charge = MarchentCharge::where('marchent_id', Auth::guard('marchent')->user()->id)->where('area_type_id', $request->id)->first();

        $charge = 0;
        $cod = 0;
        $additional_charge = 0;

        if($marchent_charge)
        {
            $charge = $marchent_charge->charge;
            $cod = $marchent_charge->cod;
            $additional_charge = $marchent_charge->additional_charge;
        }else{
            $default_charge = DefaultCharge::where('area_type_id', $request->id)->first();

            if($default_charge)
            {
                $charge = $default_charge->charge;
                $cod = $default_charge->cod;
                $additional_charge = $default_charge->additional_charge;
            }
        }

        $weight_charge = $additional_charge * ($request->weight - 1);

        $cal_cod = (($charge+$weight_charge)/100)*$cod;

        $final_charge = $charge+$weight_charge+$cal_cod;

        $data = [
            'areas' => $area,
            'charge' => $final_charge,
            'cod' => $cod.'%'
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $total = Parcel::whereDay('created_at', date('d'))
                            ->whereMonth('created_at', date('m'))
                            ->whereYear('created_at', date('Y'))->count();

        $tracking = date('y').date('m').date('d').'-'.($total+1);

        $marchent_charge = MarchentCharge::where('marchent_id', Auth::guard('marchent')->user()->id)->where('area_type_id', $request->area_type_id)->first();

        $charge = 0;
        $cod = 0;
        $additional_charge = 0;

        if($marchent_charge)
        {
            $charge = $marchent_charge->charge;
            $cod = $marchent_charge->cod;
            $additional_charge = $marchent_charge->additional_charge;
        }else{
            $default_charge = DefaultCharge::where('area_type_id', $request->area_type_id)->first();

            if($default_charge)
            {
                $charge = $default_charge->charge;
                $cod = $default_charge->cod;
                $additional_charge = $default_charge->additional_charge;
            }
        }

        $weight_charge = $additional_charge * ($request->weight - 1);

        $cal_cod = (($charge+$weight_charge)/100)*$cod;

        $final_charge = $charge+$weight_charge+$cal_cod;

        $delivery_date = Carbon::now()->addDay();

        if(date("H") >= 15)
        {
            $delivery_date = Carbon::now()->addDays(2);
        }

        $parcel = Parcel::create([
            'tracking' => $tracking,
            'marchent_id' => Auth::guard('marchent')->user()->id,
            'pickup_id' => $request->pickup_id,
            'area_type_id' => $request->area_type_id,
            'area_id' => $request->area_id,
            'marchent_invoice_no' => $request->marchent_invoice_no,
            'collection' => $request->collection,
            'product_price' => $request->product_price,
            'weight' => $request->weight,
            'cod' => $cod,
            'charge' => $final_charge,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'status_id' => 1,
            'delivery_at' => $delivery_date,
            'attempt' => 1,
        ]);

        $data = [];

        $link = route('marchent.parcels.print', ['tracking' => $tracking]);

        ParcelTimeline::create([
            'parcel_id' => $parcel->id,
            'text' => 'পার্সেলটি সঠিকভাবে প্লেস করা হয়েছে।'
        ]);

        $data = [
            'link' => $link,
            'parcel' => $parcel
        ];

        return response()->json($data);
    }

    public function print($tracking)
    {
        $parcel = Parcel::with('area')->where('tracking', $tracking)->firstOrFail();

        view()->share('parcel', $parcel);

        $size = array(58, 210);

        $pdf = PDF::loadView('backend.admin.parcel.print', [], [], [
            'format' => $size,
            'margin_top' => 0,
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_bottom' => 0,
            ]);
	    return $pdf->stream('document.pdf');
       

        // return view('backend.marchent.parcel.print', compact('parcel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
