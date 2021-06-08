@extends('backend.admin.layouts.master')


@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
<script src="{{ asset('backend') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
          $('#areas').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{ route("admin.areas.datatable") }}',
              columns: [
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
            });
        });
    </script>
@endpush


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Area Manager
          <small>Manage Areas</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.areas.index') }}"><i class="fa fa-dashboard"></i> Areas</a></li>
          <li class="active">List</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
          <div class="col-md-12">
            <div class="pull-right">
              <div class="btn-group">
                <a href="{{ route('admin.areas.create') }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Create Areas</a>
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
                <h3 class="box-title">Area List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table id="areas" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12">
                    <div class="pull-right">
                      {{-- {!! $users->links('pagination::default') !!} --}}
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