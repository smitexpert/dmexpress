<?php

namespace App\Http\Controllers\Marchent;

use App\Http\Controllers\Controller;
use App\Models\AreaType;
use App\Models\Parcel;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areatypes = AreaType::all();
        $pickups = Pickup::with('areaType', 'area')->where('marchent_id', Auth::guard('marchent')->user()->id)->get();

        return view('backend.marchent.pickup.index', compact('areatypes', 'pickups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.marchent.pickup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pickup::create([
            'marchent_id' => Auth::guard('marchent')->user()->id,
            'area_type_id' => $request->area_type_id,
            'area_id' => $request->area_id,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Pickup Address Successfully Added.');
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
        //
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
        Pickup::where('id', $id)->delete();

        return back()->with('success', 'Pickup Address Deleted!');
    }
}
