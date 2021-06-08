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
            Payment Invoice
          <small>Payment Invoice</small>
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
                  <div class="pull-right">
                      @if ($marchent->payoutMethod == null)
                            <button class="btn btn-success" disabled>Generate Invoice</button> <br>
                            
                          <b>Marchent Doesn't have any Payment Method</b>
                      @else  
                        <a href="{{ route('admin.payment.invoice.generate', ['id' => $marchent->id]) }}" class="btn btn-success">Generate Invoice</a>
                      @endif
                  </div>
              </div>
          </div>
          <br>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-title">
                        <h3 class="box-title">
                            Pending Invoice List for {{ $marchent->name }}
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                        
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
                                        @php
                                            $payable = 0;
                                            $charge = 0;
                                            $collection = 0;
                                        @endphp
                                        @foreach ($marchent->parcels as $item)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item->tracking }}</td>
                                                <td>
                                                    {{ $item->customer_name }} <br>
                                                    {{ $item->customer_phone }} <br>
                                                </td>
                                                <td>
                                                    @if ($item->status_id == 8)
                                                        {{ $item->collection }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status_id == 8)
                                                        {{ $item->collection - $item->charge }}
                                                        @php
                                                            $payable += $item->collection - $item->charge;
                                                            $collection += $item->collection;
                                                        @endphp
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->charge }}
                                                    @php
                                                        $charge += $item->charge;
                                                    @endphp
                                                </td>
                                                <td>{{ $item->status->name }}</td>
                                                <td></td>
                                                <td><a href="{{ route('admin.parcels.print', ['id' => $item->id]) }}" target="blank" class="btn btn-sm btn-warning"><span class="fa fa-print"></span></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4"></th>
                                            <th>{{ $collection-$charge }}</th>
                                            <th>{{ $charge }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
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