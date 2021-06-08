@extends('backend.admin.layouts.master')

{{-- @push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
<script src="{{ asset('backend') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
          $('#marchents').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{ route("admin.marchents.datatable") }}',
              columns: [
                {data: 'name', name: 'name'},
                {data: 'phone', name: 'phone'},
                {data: 'status', render: function(status){ return (status == 1) ? '<span class="badge bg-green">Active</span>' : '<span class="badge bg-red">Deactive</span>' }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
            });
        });
    </script>
@endpush --}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Zone Manager
          <small>Manage Zone</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Zone</a></li>
          <li class="active">List</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
          <div class="col-md-12">
            <div class="pull-right">
              <div class="btn-group">
                <a href="{{ route('admin.zones.create') }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Create Zone</a>
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
                <h3 class="box-title">Zone List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered" id="zone">
                      <thead>
                        <tr>
                          <th>Zone Name</th>
                          <th>Total Area</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($zones as $zone)
                            <tr>
                                <td>{{ $zone->name }}</td>
                                <td>{{ $zone->areas->count() }}</td>
                                <td>
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.zones.show', [$zone]) }}" class="btn btn-sm btn-success">Assign Area</a>
                                            <a href="{{ route('admin.zones.edit', [$zone]) }}" class="btn btn-sm btn-info">Edit</a>
                                        </div>
                                    </div>
                                </td>
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