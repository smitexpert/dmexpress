<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Zone;
use App\Models\ZoneArea;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::with('areas')->orderBy('name', 'ASC')->get();

        return view('backend.admin.zones.index', compact('zones'));
    }

    public function areasDataTable()
    {
        $areas = Area::doesntHave('zone')->get();

        return Datatables::of($areas)
                            ->addColumn('type', function($area){
                                return $area->type->name;
                            })
                            ->addColumn('action', function($area){
                                return '<button id="assign_id_'.$area->id.'" onclick="assign('.$area->id.')" class="btn btn-sm btn-info"><span class="fa fa-hand-o-left"></span> Assing</button>';
                            })
                            ->make();
    }

    public function zoneAreasDataTable($id)
    {
        
        $zone = Zone::where('id', $id)->with('areas')->first();

        return Datatables::of($zone->areas)
                            ->addColumn('type', function($area){
                                return $area->type->name;
                            })
                            ->addColumn('action', function($area){
                                return '<button id="remove_id_'.$area->id.'" onclick="remove('.$area->id.')" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> Remove</button>';
                            })
                            ->make();
    }

    public function assign(Request $request)
    {
        ZoneArea::create([
            'zone_id' => $request->zone,
            'area_id' => $request->id
        ]);

        return response('success', 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function remove(Request $request)
    {
        ZoneArea::where('area_id', $request->id)->delete();

        return response('success', 200)
                  ->header('Content-Type', 'text/plain');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.zones.create');
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
            'name' => 'required'
        ]);

        Zone::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.zones.index')->with('success', 'Zone Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        return view('backend.admin.zones.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        return view('backend.admin.zones.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {

        $request->validate([
            'name' => 'required'
        ]);

        $zone->update([
            'name' => $request->name
        ]);

        return back()->with('success', 'Zone Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        //
    }
}
