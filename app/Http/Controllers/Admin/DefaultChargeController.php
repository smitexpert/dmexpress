<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaType;
use App\Models\DefaultCharge;
use Illuminate\Http\Request;

class DefaultChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = AreaType::with('charges')->get();
        
        return view('backend.admin.charge.index', compact('types'));
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
        $request->validate([
            'area_type_id.*' => 'required',
            'charge.*' => 'required',
            'cod.*' => 'required',
            'additional_charge.*' => 'required',
        ]);

        DefaultCharge::truncate();

        $data = [];

        for($i=0; $i<count($request->cod); $i++)
        {
            $data[] = [
                'area_type_id' => $request->area_type_id[$i],
                'charge' => $request->charge[$i],
                'cod' => $request->cod[$i],
                'additional_charge' => $request->additional_charge[$i],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DefaultCharge::insert($data);

        return back()->with('success', 'Default Charge Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DefaultCharge  $defaultCharge
     * @return \Illuminate\Http\Response
     */
    public function show(DefaultCharge $defaultCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DefaultCharge  $defaultCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(DefaultCharge $defaultCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DefaultCharge  $defaultCharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DefaultCharge $defaultCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DefaultCharge  $defaultCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefaultCharge $defaultCharge)
    {
        //
    }
}
