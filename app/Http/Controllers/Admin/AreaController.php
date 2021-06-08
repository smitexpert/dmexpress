<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\AreaType;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.areas.index');
    }

    public function dataTable()
    {
        $areas = Area::with('type')->get();

        return Datatables::of($areas)
                            ->addColumn('type', function($area){
                                return $area->type->name;
                            })
                            ->addColumn('action', function($area){
                                return '<a href="'.route("admin.areas.edit", ["area" => $area]).'" class="btn btn-sm btn-info"><span class="fa fa-cogs"></span> Edit</a>';
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
        $types = AreaType::orderBy('id', 'ASC')->get();

        return view('backend.admin.areas.create', compact('types'));
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
            'name' => 'required',
            'type_id' => 'required'
        ]);

        Area::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
        ]);

        // session()->flush('')

        return back()->with('success', 'Area add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    public function getAreas(Request $request)
    {
        $areas = Area::where('type_id', $request->id)->orderBy('name', 'ASC')->get();

        return response()->json($areas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
    }
}
