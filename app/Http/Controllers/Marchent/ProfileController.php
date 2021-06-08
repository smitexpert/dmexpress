<?php

namespace App\Http\Controllers\Marchent;

use App\Http\Controllers\Controller;
use App\Models\Marchent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::guard('marchent')->user();

        return view('backend.marchent.profile.index', compact('profile'));
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

    public function UpdateProfile(Request $request)
    {
        Marchent::where('id', Auth::guard('marchent')->user()->id)->update([
            'name' => $request->name
        ]);

        return back()->with('success', 'Profile Updated Successfully!');
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);

        $pass = Auth::guard('marchent')->user()->password;

        if(!Hash::check($request->current_password, $pass))
        {
            return back()->with('error', 'Wrong Password Entered');
        }

        if($request->new_password != $request->confirm_password)
        {
            return back()->with('error', 'Confirmed Password Not Matched!');
        }

        Marchent::where('id', Auth::guard('marchent')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password Updated Successfully!');
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
