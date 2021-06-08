@extends('backend.admin.layouts.master')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

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
                    <div class="box-header">
                        <h3 class="box-title">MARCHENT INFO</h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th>Marchent Name</th>
                                <td>:</td>
                                <td>{{ $marchent->name }}</td>
                                <th>Marchent Phone</th>
                                <td>:</td>
                                <td>{{ $marchent->phone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @livewire('admin.parcel-request', ['marchent' => $marchent->id])
  
      </section>
      <!-- /.content -->
@endsection