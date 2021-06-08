<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Marchent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MarchentAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.marchent.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.marchent.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        if($request->has('phone'))
        {
            $phone = Marchent::where('phone', $request->phone)->first();
    
            if($phone)
            {
                return redirect()->route('marchent.register')->with('error', 'নম্বরটি ইতিমধ্যে ব্যবহার করা হয়েছে।');
            }
        }

        $request->validate([
            'name' => 'required',
            'phone' => 'required|min:11|max:11|unique:marchents,phone',
            'password' => 'required|min:6',
        ]);

        $total = Marchent::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        $id = date('Y').date('m').($total+1);

        $marchent = Marchent::create([
            'marchent' => $id,
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);

        if($marchent)
        {
            // Auth::guard('marchent')->attempt([$request->phone, $request->password], 1);
            return redirect()->route('marchent.login')->with('success', 'আপনার মার্চেন্ট একাউন্টি তৈরী করা হয়েছে।');
        }else{
            return redirect()->route('marchent.register')->with('error', 'Something Wrong!');
        }
    }

    public function attempt(Request $request)
    {
        if(Auth::guard('marchent')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('marchent.home'));
        }
        return redirect()->route('marchent.login')->with('error', 'আপনার লাগইন তথ্য সঠিক নয়।');
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
