<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pickup;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function getPickup(Request $request)
    {
        $pickup = Pickup::where('marchent_id', $request->marchent_id)->with('area')->get();

        return response()->json($pickup);
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
            'marchent_id' => 'required',
            'area_type_id' => 'required',
            'area_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        
        Pickup::create($request->all());

        return back()->with('success', 'Pickup Address Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function show(Pickup $pickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function edit(Pickup $pickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pickup $pickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pickup $pickup)
    {
        //
    }
}
