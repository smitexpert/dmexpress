@extends('backend.admin.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('backend') }}/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#affiliate").select2();
        });
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Create Zone
          <small>Zone new Marchent.</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.zones.index') }}"><i class="fa fa-dashboard"></i> Zones</a></li>
          <li class="active">Create Zone</li>
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
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Create Zone</h3>
              </div>
              <div class="box-body">
                <form action="{{ route('admin.zones.update', [$zone]) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="">Zone Name</label>
                        <input type="text" name="name" value="{{ (old('name')) ? old('name') : $zone->name }}" class="form-control" required>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="pull-left">
                        <button class="btn btn-sm btn-success">SAVE</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection