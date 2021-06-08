@extends('backend.admin.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
<script src="{{ asset('backend') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>

            var areas = $('#areas').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{ route("admin.zones.areas.datatable") }}',
              columns: [
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
            });

            var url = '{{ route("admin.zones.areas.datatablearea", ["id" => $zone->id]) }}';

            var zone_areas = $('#zone_areas').DataTable({
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                  {data: 'name', name: 'name'},
                  {data: 'type', name: 'type'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
              });

        

        function reload()
        {
          areas.ajax.reload();
          zone_areas.ajax.reload();
        }

        function assign(id)
        {
            var zone = "{{ $zone->id }}";

            $.ajax({
                url: '{{ route("admin.zones.areas.assign") }}',
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    zone: zone
                },
                success: function(data){
                    reload();
                }
            });
        }

        function remove(id)
        {
          $.ajax({
                url: '{{ route("admin.zones.areas.remove") }}',
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(data){
                    reload();
                }
            });
        }
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Assing Zone
          <small>Zone Assing Areas.</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.zones.index') }}"><i class="fa fa-dashboard"></i> Zones</a></li>
          <li class="active">Assing Zone</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
            <div class="col-sm-6">
                <div class="btn-group">
                    <a href="{{ route('admin.zones.index') }}" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span> Back</a>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div>
        <br>
        @include('partial.alert')
        <div class="row">
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Assing Zone</h3>
              </div>
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Zone Name</label>
                              <input type="text" class="form-control" value="{{ $zone->name }}" disabled>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-md-12">
                        <table id="zone_areas" class="table table-bordered">
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
                  </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Area List</h3>
              </div>
              <div class="box-body">
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
            </div>
          </div>

        </div>
  
      </section>
      <!-- /.content -->
@endsection