@extends('backend.marchent.layouts.master')

@push('styles')
    <style>
        .bank {
        display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $("#type").change(function(){
            var type = $(this).val();

            if(type == 'bank')
            {
              $(".bank").css('display', 'block');

              $("#name").prop('required', true);
              $("#branch_name").prop('required', true);
              $("#account_type").prop('required', true);
            }else{
              $(".bank").css('display', 'none');
              $("#name").prop('required', false);
              $("#branch_name").prop('required', false);
              $("#account_type").prop('required', false);
            }
        })
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Payment Settings
          <small>Manage Your Payment Settings</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Payment</a></li>
          {{-- <li class="active">Here</li> --}}
        </ol>
    </section>
  
      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                <div class="btn-group">
                    <button class="btn btn-sm btn-success" data-target="#modal-payment" data-toggle="modal">Add Payment Optoin</button>
                </div>
                </div>
            </div>
        </div>

        
        @include('partial.alert')

        <br>
  
        <div class="row">
            @foreach ($payments as $item)
                <div class="col-md-6">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $item->type }}</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                @if ($item->name)
                                    <tr>
                                        <th>Name</th>
                                        <td>:</td>
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                @endif
                                @if ($item->account_number)
                                    <tr>
                                        <th>Account Number</th>
                                        <td>:</td>
                                        <td>{{ $item->account_number }}</td>
                                    </tr>
                                @endif
                                @if ($item->bank_name)
                                    <tr>
                                        <th>BANK NAME</th>
                                        <td>:</td>
                                        <td>{{ $item->bank_name }}</td>
                                    </tr>
                                @endif
                                @if ($item->branch_name)
                                    <tr>
                                        <th>BRANCH NAME</th>
                                        <td>:</td>
                                        <td>{{ $item->branch_name }}</td>
                                    </tr>
                                @endif
                                @if ($item->account_name)
                                    <tr>
                                        <th>ACCOUNT NAME</th>
                                        <td>:</td>
                                        <td>{{ $item->account_name }}</td>
                                    </tr>
                                @endif
                                @if ($item->account_type)
                                    <tr>
                                        <th>ACCOUNT TYPE</th>
                                        <td>:</td>
                                        <td>{{ $item->account_type }}</td>
                                    </tr>
                                @endif
                                @if ($item->active)
                                    <tr>
                                        <th>ACTIVE</th>
                                        <td>:</td>
                                        <td>TRUE</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <div class="btn-group">
                                    @if ($item->active)
                                        <button onclick="document.getElementById('delete_{{ $item->id }}').submit()" class="btn btn-sm btn-danger">DELETE</button>
                                    @else
                                        <button onclick="document.getElementById('active_{{ $item->id }}').submit()" class="btn btn-sm btn-success">ACTIVE</button>
                                    @endif
                                    <form action="{{ route('marchent.payments.destroy', ['payment' => $item->id]) }}" id="delete_{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                    <form action="{{ route('marchent.payments.update', ['payment' => $item->id]) }}" id="active_{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
  
      </section>
      <!-- /.content -->

      <!-- /.modal -->

      <div class="modal fade" id="modal-payment">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Pickup Address</h4>
            </div>
            <form action="{{ route('marchent.payments.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Payment Account Type</label>
                        <div class="form-group">
                          <select name="type" id="type" class="form-control" required>
                            <option value="">SELECT ACCOUNT TYPE</option>
                            <option value="bank">BANK</option>
                            <option value="bkash" selected>bKash</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 bank">
                        <label for="">BANK NAME</label>
                        <div class="form-group">
                          <input type="text" name="name" id="name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="">ACCOUNT NUMBER</label>
                        <div class="form-group">
                          <input type="text" name="account_number" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6 bank">
                        <label for="">BRANCH NAME</label>
                        <div class="form-group">
                          <input type="text" name="branch_name" id="branch_name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 bank">
                        <label for="">ACCOUNT TYPE</label>
                        <div class="form-group">
                          <select name="account_type" id="account_type" id="account_type" class="form-control">
                            <option value=""></option>
                            <option value="saving">Saving</option>
                            <option value="current">Current</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="checkbox" class="" name="active" value="1">
                          <label for="">Active</label>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection