@extends('backend.admin.layouts.master')

@push('styles')
    
@endpush

@push('scripts')
    
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assigned Parcel
          <small>Assigned Parcel</small>
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
                    <div class="box-header with-title">
                        <h3 class="box-title">
                            Parcel for Heros
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hero Name</th>
                                    <th>Hero Phone</th>
                                    <th>Total Parcel</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($heros as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->parcels->count() }}</td>
                                        {{-- <td></td> --}}
                                        <td>
                                            <div class="btn-group pull-right">
                                                <a href="{{ route('admin.parcels.hero', ['id' => $item->id]) }}" class="btn btn-success"><span class="fa fa-eye"></span></a>
                                                <a href="{{ route('admin.parcels.hero.print', ['id' => $item->id]) }}" target="_blank" class="btn btn-info"><span class="fa fa-print"></span></a>
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