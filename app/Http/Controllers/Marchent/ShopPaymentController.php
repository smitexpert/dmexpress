<?php

namespace App\Http\Controllers\Marchent;

use App\Http\Controllers\Controller;
use App\Models\PaymentInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ShopPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = PaymentInvoice::where('marchent_id', Auth::guard('marchent')->user()->id)->paginate(20);

        return view('backend.marchent.shop-payment.index', compact('invoices'));
    }

    public function print($id)
    {
        $invoice = PaymentInvoice::with('marchent', 'parcels.parcel.status', 'payment')->where('id', $id)->firstOrFail();

        // return dd($invoice);

        // return view('backend.admin.invoice.print', compact('invoice'));

        view()->share('invoice', $invoice);

        $pdf = PDF::loadView('backend.admin.invoice.print', [], [
            'format' => 'A4-L'
        ]);
	    return $pdf->stream('document.pdf');
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
