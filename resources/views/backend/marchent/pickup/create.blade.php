@extends('backend.marchent.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
<script src="{{ asset('backend') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        // $(document).ready(function(){
        //   $('#marchents').DataTable({
        //       processing: true,
        //       serverSide: true,
        //       ajax: '{{ route("marchent.parcels.datatable") }}',
        //       columns: [
        //         {data: 'marchent', name: 'id'},
        //         {data: 'name', name: 'name'},
        //         {data: 'phone', name: 'phone'},
        //         {data: 'status', render: function(status){ return (status == 1) ? '<span class="badge bg-green">Active</span>' : '<span class="badge bg-red">Deactive</span>' }},
        //         {data: 'action', name: 'action', orderable: false, searchable: false},
        //       ]
        //     });
        // });
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Pickup Area
          <small>Manage Your Pickup Area</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Pickup Area</a></li>
          <li class="active">Add Pickup Area</li>
        </ol>
    </section>
  
      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                <div class="btn-group">
                    <a href="{{ route('marchent.pickups.index') }}" class="btn btn-sm btn-success"><span class="fa fa-arrow-left"></span> Back</a>
                </div>
                </div>
            </div>
        </div>

        
        @include('partial.alert')

        <br>
  
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Pickup Area</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="">SELECT AREA TYPE</label>
                                <div class="form-group">
                                    <select name="type_id" id="type_id" class="form-control">
                                        <option value="">SELECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="">SELECT AREA</label>
                                <div class="form-group">
                                    <select name="area_id" id="area_id" class="form-control">
                                        <option value="">SELECT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="">SELECT AREA</label>
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone"  class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <button class="btn btn-success">SAVE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection