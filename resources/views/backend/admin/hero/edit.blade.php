@extends('backend.admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Hero
          <small>Edit Hero.</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.heros.index') }}"><i class="fa fa-dashboard"></i> Heros</a></li>
          <li class="active">Edit Hero</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
            <div class="col-sm-6">
                <div class="btn-group">
                    <a href="{{ route('admin.heros.index') }}" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span> Back</a>
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
                <h3 class="box-title">Edit Hero</h3>
              </div>
              <form action="{{ route('admin.heros.update', ['hero' => $hero->id]) }}" method="POST">
              <div class="box-body">
                    @method('put')
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ (old('name')) ? old('name') : $hero->name }}" class="form-control" required>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                          <label for="">Phone</label>
                          <input type="text" name="phone" value="{{ (old('phone')) ? old('phone') : $hero->phone }}" class="form-control" disabled>
                          @error('phone')
                              <span class="help-block">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                          <label for="">Status</label>
                          <select name="status" id="status" class="form-control" required>
                            <option value="">SELECT</option>
                            <option value="1" {{ ($hero->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ ($hero->status == 0) ? 'selected' : '' }}>Deactive</option>
                          </select>
                          @error('status')
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