<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affiliates = Affiliate::orderBy('id', 'desc')->paginate(20);

        return view('backend.admin.affiliate.index', compact('affiliates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.affiliate.create');
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
            'phone' => 'required|min:11|max:11|unique:affiliates,phone',
            'password' => 'required|min:6|max:32',
            'status' => 'required'
        ]);

        $affiliate = Affiliate::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'status' => $request->status,
            'password' => Hash::make($request->password)
        ]);

        if($affiliate)
        {
            return redirect()->route('admin.affiliates.index')->with('success', 'Affiliate '.$affiliate->name.' created!');
        }else{
            return back()->with('error', 'Affiliate user not created!');
        }
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
        $affiliate = Affiliate::findOrFail($id);

        return view('backend.admin.affiliate.edit', compact('affiliate'));
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
        $affiliate = Affiliate::findOrFail($id);

        $request->validate([
            'name' => 'required|min:4',
            'status' => 'required'
        ]);

        if($request->password != null)
        {
            $request->validate([
                'password' => 'required|min:6|max:32'
            ]);

            Affiliate::where('id', $id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        Affiliate::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Affiliate User Updated Successfully!');
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
