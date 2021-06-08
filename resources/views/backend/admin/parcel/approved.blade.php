@extends('backend.admin.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/select2/dist/css/select2.min.css">
    @livewireStyles
@endpush

@push('scripts')
    <script src="{{ asset('backend') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
    @livewireScripts
    <script>
      $(document).ready(function(){

        $("#heros").select2();

        window.addEventListener('assign', event => {
          $("#modal-assign").modal('toggle');
          console.log("Hello");
        })

      })
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Listed Parcel
          <small>Approved Parcel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        @livewire('admin.parcel-approved')
  
      </section>
      <!-- /.content -->

      <div class="modal fade" id="modal-assign">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Assign Parcel To Hero</h4>
            </div>
            <div class="modal-body">
              @livewire('admin.parcel-assign-modal')
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection