@extends('backend.marchent.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Shop Payments
          <small>Shop Payments History</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Shop Payment</a></li>
          {{-- <li class="active">Here</li> --}}
        </ol>
      </section>
  
      <br>
      <!-- Main content -->
      <section class="content container-fluid">
        @include('partial.alert')

        <br>
        <div class="row">
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Update Profile</h3>
              </div>
              <form action="{{ route('marchent.update.profile') }}" method="POST">
                  @csrf
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-12">
                              <label for="">Shop Name</label>
                              <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ $profile->name }}" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <label for="">Phone</label>
                              <div class="form-group">
                                <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}" disabled>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="box-footer">
                      <div class="pull-right">
                          <button class="btn btn-success">SAVE</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Update Password</h3>
              </div>
              <form action="{{ route('marchent.update.password') }}" method="POST">
                  @csrf
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-12">
                              <label for="">Current Password</label>
                              <div class="form-group">
                                  <input type="password" class="form-control" name="current_password" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <label for="">New Password</label>
                              <div class="form-group">
                                  <input type="password" class="form-control" name="new_password" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <label for="">Confirm Password</label>
                              <div class="form-group">
                                  <input type="password" class="form-control" name="confirm_password" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="box-footer">
                      <div class="pull-right">
                          <button class="btn btn-success">SAVE</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection