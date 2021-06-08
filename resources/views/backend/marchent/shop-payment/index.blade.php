@extends('backend.marchent.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Shop Payments
          <small>Shop Payments History</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Shop Payment</a></li>
          {{-- <li class="active">Here</li> --}}
        </ol>
      </section>
  
      <br>
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Shop Payment History</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>INVOICE</th>
                            <th>ISSUE DATE</th>
                            <th>Payment Amount</th>
                            <th>Delivery Charge</th>
                            <th>COD Charge</th>
                            <th>Download</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($invoices as $item)
                              <tr>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->charge }}</td>
                                <td>0</td>
                                <td>
                                  <a href="{{ route('marchent.invoice.print', ['id' => $item->id]) }}" target="blank" class="btn btn-success"><span class="fa fa-print"></span> Print</a>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $invoices->links('pagination::default') }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection