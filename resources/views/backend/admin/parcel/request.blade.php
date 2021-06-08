@extends('backend.admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Requested Parcel
          <small>Requested Parcel</small>
        </h1>
        {{-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol> --}}
      </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Requested Parcels</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>MARCHENT NAME</th>
                                    <th>TOTAL PARCEL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marchents as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->parcels->count() }}</td>
                                        <td>
                                            <div class="pull-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.parcels.request.show', ['id' => $item->id]) }}" class="btn btn-success"><span class="fa fa-eye"></span> VIEW</a>
                                                    <a href="{{ route('admin.parcels.request.list', ['marchent' => $item->id]) }}" target="_blank" class="btn btn-info"><span class="fa fa-print"></span> Print List</a>
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
  
      </section>
      <!-- /.content -->
@endsection