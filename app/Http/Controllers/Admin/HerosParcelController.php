<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use PDF;

class HerosParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heros = Hero::with(['parcels' => function($q){
            $q->whereIn('status_id', [4, 5]);
        }])->whereHas('parcels', function($q){
            return $q->whereIn('status_id', [4, 5]);
        })->get();

        return view('backend.admin.parcel.hero-parcel', compact('heros'));
    }

    public function hero($id)
    {
        $hero = Hero::where('id', $id)->firstOrFail();
        return view('backend.admin.parcel.hero', compact('hero'));
    }

    public function print($id)
    {
        // $parcels = Parcel::with('marchent', 'area')->where('hero_id', $this->hero_id)->whereIn('status_id', [4, 5])->get();

        // Parcel::with('marchent', 'area')->where('hero_id', $this->hero_id)->where('status_id', 4)->orWhere('status_id', 5)->get()
        // $hero = Hero::with('parcels.area', 'parcels.marchent')->where('id', $id)->firstOrFail();

        $hero = Hero::with('parcels.area', 'parcels.marchent')->with(['parcels' => function($q){
            $q->whereIn('status_id', [4,5]);
        }])->whereHas('parcels', function($q){
            return $q->whereIn('status_id', [4,5]);
        })->where('id', $id)->firstOrFail();

        view()->share('hero', $hero);

        $pdf = PDF::loadView('backend.admin.parcel.hero-print', [], [], [
            'format' => 'A4',
            'margin_top' => 10,
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_bottom' => 5,

        ]);
	    return $pdf->stream('document.pdf');

        // return view('backend.admin.parcel.hero-print', compact('hero'));
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
        //
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
        //
    }
}
