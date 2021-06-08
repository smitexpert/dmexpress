<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marchent;
use App\Models\Parcel;
use App\Models\PaymentInvoice;
use App\Models\PaymentInvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PaymentInvoiceController extends Controller
{
    public function index()
    {
        return view('backend.admin.invoice.index');
    }

    public function show($id)
    {
        $marchent = Marchent::with(['parcels' => function($q){
            $q->doesntHave('invoice')->whereNotIn('status_id', [1,2,3,4,5,7]);
        }])->with('payoutMethod')->where('id', $id)->firstOrFail();

        return view('backend.admin.invoice.show', compact('marchent'));
    }

    public function generate($id)
    {
        $marchent = Marchent::with(['parcels' => function($q){
            $q->doesntHave('invoice')->whereNotIn('status_id', [1,2,3,4,5,7]);
        }])->with('payoutMethod')->where('id', $id)->firstOrFail();

        $payable = 0;
        $charge = 0;

        foreach($marchent->parcels as $item)
        {
            if($item->status_id == 8)
            {
                $payable += $item->collection;
            }else{
                $payable += 0;
            }

            $charge += $item->charge;
        }

        $marchent_invoices = PaymentInvoice::where('marchent_id', $marchent->id)->count();

        $data = [
            'invoice' => date('ymd').'-'.$marchent->id.'-'.($marchent_invoices+1),
            'marchent_id' => $marchent->id,
            'amount' => $payable-$charge,
            'charge' => $charge,
            'marchent_payment_detail_id' => $marchent->payoutMethod->id,
            'issued_by' => Auth::user()->id
        ];

        // return dd($data);

        $invoice = PaymentInvoice::create($data);

        $items = [];

        foreach($marchent->parcels as $item)
        {
            $payable = 0;

            if($item->status_id == 8)
            {
                $payable = $item->collection - $item->charge;
            }

            $items[] = [
                'payment_invoice_id' => $invoice->id,
                'parcel_id' => $item->id,
                'collection' => $item->collection,
                'payable' => $payable,
                'charge' => $item->charge,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // return dd($items);

        PaymentInvoiceItem::insert($items);

        return redirect()->route('admin.payment.invoice.paid', ['id' => $invoice->id]);
    }


    public function paid($id)
    {
        $invoice = PaymentInvoice::with('marchent', 'parcels.parcel.status')->where('id', $id)->firstOrFail();
        
        return view('backend.admin.invoice.paid', compact('invoice'));
    }

    public function paidList()
    {
        $invoices = PaymentInvoice::with('marchent', 'admin')->orderBy('id', 'DESC')->paginate(20);
        
        return view('backend.admin.invoice.paid-list', compact('invoices'));
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
}
