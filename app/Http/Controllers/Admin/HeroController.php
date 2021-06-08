<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Yajra\Datatables\Datatables;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.hero.index');
    }

    public function dataTable()
    {
        $heroes = Hero::select(['id', 'name', 'phone', 'status']);

        return Datatables::of($heroes)
                            ->addColumn('action', function($hero){
                                return '<a href="'.route("admin.heros.edit", ["hero" => $hero->id]).'" class="btn btn-sm btn-info"><span class="fa fa-cogs"></span> Edit</a>';
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
        return view('backend.admin.hero.create');
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
            'name' => 'required|min:4',
            'phone' => 'required|min:11|max:11|unique:heroes,phone',
            'password' => 'required|min:6|max:32',
            'status' => 'required'
        ]);

        $hero = Hero::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        return redirect()->route('admin.heros.index')->with('success', 'Hero Create succfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = Hero::findOrFail($id);

        return view('backend.admin.hero.edit', compact('hero'));
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
        $hero = Hero::findOrFail($id);

        $request->validate([
            'name' => 'required|min:4',
            'status' => 'required'
        ]);

        if($request->password != null)
        {
            $request->validate([
                'password' => 'required|min:6|max:32'
            ]);

            Hero::where('id', $id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        Hero::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return back()->with('success', 'Hero Updated Successfully!');

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
