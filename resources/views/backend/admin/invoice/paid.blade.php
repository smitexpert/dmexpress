@extends('backend.admin.layouts.master')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paid Invoice
          <small>Paid Invoice</small>
        </h1>
        {{-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol> --}}
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
          <div class="row">
              <div class="col-md-12">
                <h3 class="center">Payment Invoice <b># {{ $invoice->invoice }}</b></h3>
                <h4 style="padding: 0; margin: 0;">
                    Marchent: {{ $invoice->marchent->name }}
                </h4>
                <p style="padding: 0; margin: 0;"><b>Phone: {{ $invoice->marchent->phone }}</b></p>
                <br>
                <table style="text-align: left">
                    <tr>
                        <th>Payable</th>
                        <td>:</td>
                        <td>{{ $invoice->amount }} Tk.</td>
                    </tr>
                    <tr>
                        <th>Charge</th>
                        <td>:</td>
                        <td>{{ $invoice->charge }} Tk.</td>
                    </tr>
                    @if ($invoice->payment->type == 'bkash')
                    <tr>
                        <th>{{ $invoice->payment->name }}</th>
                        <td>:</td>
                        <td>{{ $invoice->payment->account_number }} </td>
                    </tr>
                    @endif
                    @if ($invoice->payment->type == 'bank')
                    <tr>
                        <th>BANK NAME</th>
                        <td>:</td>
                        <td>{{ $invoice->payment->name }}</td>
                        <td>-</td>
                        <th>ACCOUNT NO</th>
                        <td>:</td>
                        <td>{{ $invoice->payment->account_number }} </td>
                    </tr>
                    <tr>
                        <th>BRANCH</th>
                        <td>:</td>
                        <td>{{ $invoice->payment->branch_name }}</td>
                        <td>-</td>
                        <th>ACCOUNT TYPE</th>
                        <td>:</td>
                        <td>{{ $invoice->payment->account_type }} </td>
                    </tr>
                    @endif
                </table>

            <br>
              </div>
          </div>
          <br>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-title">
                        <h3 class="box-title">
                            Paid Invoice Items for {{ $invoice->marchent->name }}
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right btn-group">
                                    <a target="blank" href="{{ route('admin.payment.invoice.print', ['id' => $invoice->id]) }}" class="btn btn-success"><span class="fa fa-print"></span> Print</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>TRACKING ID</th>
                                            <th>CUSTOMER</th>
                                            <th>COLLECTION</th>
                                            <th>Payable</th>
                                            <th>CHARGE</th>
                                            <th>Status</th>
                                            <th>REMARKS</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice->parcels as $item)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item->parcel->tracking }}</td>
                                                <td>
                                                    {{ $item->parcel->customer_name }} <br>
                                                    {{ $item->parcel->customer_phone }} <br>
                                                </td>
                                                <td>{{ $item->parcel->collection }}</td>
                                                <td>{{ $item->payable }}</td>
                                                <td>{{ $item->charge }}</td>
                                                <td>{{ $item->parcel->status->name }}</td>
                                                <td></td>
                                                <td><a href="{{ route('admin.parcels.print', ['id' => $item->id]) }}" target="blank" class="btn btn-sm btn-warning"><span class="fa fa-print"></span></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- /.content -->
@endsection