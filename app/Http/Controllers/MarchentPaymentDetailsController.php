<?php

namespace App\Http\Controllers;

use App\Models\MarchentPaymentDetails;
use Illuminate\Http\Request;

class MarchentPaymentDetailsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->type;

        if($request->type == 'bank')
        {
            $name = $request->name;
        }

        $md = MarchentPaymentDetails::create([
            'marchent_id' => $request->marchent_id,
            'type' => $request->type,
            'name' => $name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
        ]);

        if($request->active == true)
        {
            MarchentPaymentDetails::where('marchent_id', $request->marchent_id)->update([
                'active' => false
            ]);

            MarchentPaymentDetails::where('id', $md->id)->update([
                'active' => true
            ]);
        }

        return back()->with('success', 'Marchent Payment Details is Created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarchentPaymentDetails  $marchentPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function show(MarchentPaymentDetails $marchentPaymentDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarchentPaymentDetails  $marchentPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(MarchentPaymentDetails $marchentPaymentDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarchentPaymentDetails  $marchentPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarchentPaymentDetails $marchentPaymentDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarchentPaymentDetails  $marchentPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarchentPaymentDetails $marchentPaymentDetails, $id)
    {
        
        MarchentPaymentDetails::where('id', $id)->delete();

        return back()->with('success', 'মার্চেন্টের পেমেন্ট মেথড ডিলিট করা হয়েছে।');
    }
}
