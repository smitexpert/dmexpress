<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\AffiliateMarchent;
use App\Models\AreaType;
use App\Models\Marchent;
use App\Models\MarchentCharge;
use App\Models\PaymentInvoice;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Yajra\Datatables\Datatables;

class MarchentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.marchent.index');
    }

    public function dataTable()
    {
        $marchents = Marchent::select(['id', 'marchent', 'name', 'phone', 'status'])->orderBy('id', 'DESC');

        return Datatables::of($marchents)
                            ->addColumn('action', function($marchent){
                                return '<div class="btn-group pull-right"><a href="'.route("admin.marchents.edit", ["marchent" => $marchent->id]).'" class="btn btn-sm btn-info"><span class="fa fa-cogs"></span> Edit</a><a href="'.route("admin.marchents.show", ["marchent" => $marchent->id]).'" class="btn btn-sm btn-warning"><span class="fa fa-cogs"></span> View</a></div>';
                            })
                            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $affiliates = Affiliate::where('status', true)->get();
        $areatypes = AreaType::all();

        return view('backend.admin.marchent.create', compact('affiliates', 'areatypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();

        $request->validate([
            'name' => 'required|min:4',
            'phone' => 'required|min:11|max:11|unique:marchents,phone',
            'password' => 'required|min:6|max:32',
            'status' => 'required',
            'area_type_id' => 'required',
            'area_id' => 'required',
            'address' => 'required'
        ]);

        $total = Marchent::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        $id = date('Y').date('m').($total+1);

        $marchent = Marchent::create([
            'marchent' => $id,
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        if($request->affiliate != null)
        {
            AffiliateMarchent::create([
                'affiliate_id' => $request->affiliate,
                'marchent_id' => $marchent->id
            ]);
        }

        Pickup::create([
            'marchent_id' => $marchent->id,
            'area_type_id' => $request->area_type_id,
            'area_id' => $request->area_id,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('admin.marchents.index')->with('success', 'Marchent Create succfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marchent = Marchent::where('id', $id)->with('address.areatype', 'address.area', 'paymentDetails')->firstOrFail();

        // return dd($marchent);        

        $areatypes = AreaType::all();

        $invoices = PaymentInvoice::where('marchent_id', $marchent->id)->paginate(10);

        return view('backend.admin.marchent.show', compact('marchent', 'areatypes', 'invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marchent = Marchent::findOrFail($id);
        $charges = MarchentCharge::where('marchent_id', $id)->get();
        $types = AreaType::all();


        return view('backend.admin.marchent.edit', compact('marchent', 'charges', 'types'));
    }

    public function updateCharge(Request $request, $id)
    {
        $request->validate([
            'area_type_id.*' => 'required',
            'charge.*' => 'required',
            'cod.*' => 'required',
            'additional_charge.*' => 'required',
        ]);

        MarchentCharge::where('marchent_id', $id)->delete();

        $data = [];

        for($i=0; $i<count($request->area_type_id); $i++)
        {
            $data[] = [
                'marchent_id' => $id,
                'area_type_id' => $request->area_type_id[$i],
                'charge' => $request->charge[$i],
                'cod' => $request->cod[$i],
                'additional_charge' => $request->additional_charge[$i],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        MarchentCharge::insert($data);

        return back()->with('success', 'Charge Updated Successfully');
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
        $request->validate([
            'name' => 'required|min:4',
            'status' => 'required'
        ]);

        if($request->password != null)
        {
            $request->validate([
                'password' => 'required|min:6|max:32',
            ]);

            Marchent::where('id', $id)->update([
                'password' => Hash::make($request->password),
            ]);


        }

        Marchent::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        
        return back()->with('success', 'Marchent Updated Successfully!');
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
