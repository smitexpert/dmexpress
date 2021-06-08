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
            Payment Invoice
          <small>Payment Invoice</small>
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
                            Pending Invoice List
                        </h3>
                    </div>
                    <div class="box-body">
                        @livewire('admin.payment-marchent')
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- /.content -->
@endsection