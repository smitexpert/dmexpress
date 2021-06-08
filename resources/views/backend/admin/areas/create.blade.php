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
          Create Area
          <small>Create new Area.</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.areas.index') }}"><i class="fa fa-dashboard"></i> Areas</a></li>
          <li class="active">Create Area</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
            <div class="col-sm-6">
                <div class="btn-group">
                    <a href="{{ route('admin.areas.index') }}" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span> Back</a>
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
                <h3 class="box-title">Create Area</h3>
              </div>
              <form action="{{ route('admin.areas.store') }}" method="POST">
              <div class="box-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                          <label for="">Area Type</label>
                          <select name="type_id" id="" class="form-control" required>
                              <option value="">SELECT AREA TYPE</option>
                              @foreach ($types as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                          </select>
                          @error('phone')
                              <span class="help-block">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                  </div>
              </div>
              <div class="box-footer">
                <div class="row">
                    <div class="col-md-12">
                      <div class="pull-left">
                        <button class="btn btn-sm btn-success">SAVE</button>
                      </div>
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