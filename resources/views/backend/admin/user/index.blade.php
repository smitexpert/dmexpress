@extends('backend.admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          User Manager
          <small>Manage Admin Users</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-dashboard"></i> Users</a></li>
          <li class="active">List</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="pull-right">
              <div class="btn-group">
                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Create User</a>
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
                <h3 class="box-title">Users List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $item)
                          <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td class="text-center">
                                @if ($item->status == 1)
                                    <span class="badge bg-green">Active</span>
                                @else
                                  <span class="badge bg-red">Deactive</span>
                                @endif
                            </td>
                            <td>
                              <div class="btn-group">
                                <a href="{{ route('admin.users.edit', ['user' => $item->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-sliders"></span> Edit</a>                                
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12">
                    <div class="pull-right">
                      {!! $users->links('pagination::default') !!}
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