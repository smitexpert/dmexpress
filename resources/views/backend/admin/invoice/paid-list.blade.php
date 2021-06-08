@extends('backend.admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Paid Invoices
          <small>Paid and Ganerated Invoices</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Paid Invoice List
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>INVOICE ID</th>
                                            <th>MERCHENT</th>
                                            <th>PAID AMOUNT</th>
                                            <th>CHARGES</th>
                                            <th>ISSUED BY</th>
                                            <th>PAID DATE</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $item)
                                            <tr>
                                                <td>{{ $item->invoice }}</td>
                                                <td>
                                                    {{ $item->marchent->marchent }} <br>
                                                    {{ $item->marchent->name }}
                                                </td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->charge }}</td>
                                                <td>{{ $item->admin->name }}</td>
                                                <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <div class="btn-group pull-right">
                                                        <a href="{{ route('admin.payment.invoice.paid', ['id' => $item->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-eye"></span> View</a>
                                                        <a href="{{ route('admin.payment.invoice.print', ['id' => $item->id]) }}" target="blank" class="btn btn-sm btn-warning"><span class="fa fa-print"></span> Print</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
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