<?php

namespace App\Http\Controllers\Marchent;

use App\Http\Controllers\Controller;
use App\Models\MarchentPaymentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = MarchentPaymentDetails::where('marchent_id', Auth::guard('marchent')->user()->id)->get();
        return view('backend.marchent.payment.index', compact('payments'));
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
        if($request->type != 'bank')
        {
            $name = $request->type;
        }else{
            $name = $request->name;
        }

        if($request->active == 1)
        {
            $active = 1;
        }else{
            $active = 0;
        }

        if($active == 1)
        {
            MarchentPaymentDetails::where('marchent_id', Auth::guard('marchent')->user()->id)->update([
                'active' => 0,
            ]);
        }

        MarchentPaymentDetails::create([
            'marchent_id' => Auth::guard('marchent')->user()->id,
            'type' => $request->type,
            'name' => $name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'active' => $active,
        ]);

        

        return back()->with('success', 'Payment Details Successfully Saved!');
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
        MarchentPaymentDetails::where('marchent_id', Auth::guard('marchent')->user()->id)->update([
            'active' => 0
        ]);

        MarchentPaymentDetails::where('id', $id)->update([
            'active' => 1
        ]);

        return back()->with('success', 'Payment Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MarchentPaymentDetails::where('id', $id)->delete();

        return back()->with('success', 'Payment Details Deleted Successfully!');
    }
}
