@extends('backend.admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Default Charge Settings
          <small>Set Parcel Delivery Charge Here</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active">Default Charge</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
        
        @if ($errors->any())
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Please fill the missing data.
                    </div>
                </div>
            </div>
        @endif

        @include('partial.alert')

        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <form action="{{ route('admin.charges.store') }}" method="POST">
                        @csrf
                        <div class="box-header with-border">
                            <h3 class="box-title">Set Default Charge</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Charge</th>
                                                <th>COD (%)</th>
                                                <th>Addition Charge (Per KG)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($types as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->name }}
                                                        <input type="hidden" name="area_type_id[]" value="{{ $item->id }}">
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            @if ($item->charges)
                                                                <input type="number" name="charge[]" class="form-control" value="{{ ($item->charges->charge != null) ? $item->charges->charge : '0' }}" required>
                                                            @else
                                                                <input type="number" name="charge[]" class="form-control" value="0" required>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            @if ($item->charges)
                                                                <input type="number" name="cod[]" class="form-control" value="{{ ($item->charges->cod != null) ? $item->charges->cod : '0' }}" required>
                                                            @else
                                                                <input type="number" name="cod[]" class="form-control" value="0" required>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            @if ($item->charges)
                                                                <input type="number" name="additional_charge[]" value="{{ ($item->charges->additional_charge != null) ? $item->charges->additional_charge : '0' }}" class="form-control" required>
                                                            @else
                                                            <input type="number" name="additional_charge[]" value="0" class="form-control" required>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection