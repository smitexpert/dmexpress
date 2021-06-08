@extends('backend.admin.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/select2/dist/css/select2.min.css">

    <style>
      .bank {
        display: none;
      }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend') }}/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function(){
          $("#area_id").select2();

          
          $("#area_type_id").change(function(){
            var id = $(this).val();
            
            $.ajax({
              url: "{{ route('admin.areas.get') }}",
              method: 'POST',
              data: {
                '_token': "{{ csrf_token() }}",
                id: id
              },
              success: function(data){

                $("#area_id").find("*").remove();

                var html = [];

                html += `<option value="">SELECT AREA</option>`

                data.forEach(item => {
                  html += `<option value="${item.id}">${item.name}</option>`
                });

                $("#area_id").append(html);
                
              }
            })

          })

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

        });
    </script>
@endpush


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Marchent Manager
          <small>Show Marchent Account</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Marchent</a></li>
          <li class="active">Show</li>
        </ol>
    </section>
  
      <!-- Main content -->
    <section class="content container-fluid">
  
        <div class="row">
          <div class="col-md-12">
            <div class="pull-left">
              <div class="btn-group">
                <a href="{{ route('admin.marchents.index') }}" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span> Back</a>
              </div>
            </div>
          </div>
        </div>

        
        @include('partial.alert')

        <br>

        <div class="row">
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Marchent Info</h3>
              </div>
              <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Company Name</label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $marchent->name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Contact/Phone</label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $marchent->phone }}" disabled>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Marchent Payments Invoice</h3>
              </div>
              <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>INVOICE NO</th>
                            <th>PAID AMOUNT</th>
                            <th>CHARGE</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($invoices as $item)
                              <tr>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ $item->amount }} Tk.</td>
                                <td>{{ $item->charge }} Tk.</td>
                                <td>
                                  <a href="{{ route('admin.payment.invoice.paid', ['id' => $item->id]) }}" class="btn btn-sm btn-success">SHOW</a>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Marchent Picup Address</h3>
              </div>
              <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Area Type</th>
                                    <th>Area Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marchent->address as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $item->areatype->name }}</td>
                                        <td>{{ $item->area->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Add Pickup Address</button>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title">Marchent Payment Details</h3>
                  </div>
                  <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($marchent->paymentDetails as $item)
                                        <tr>
                                          <td>{{ $loop->index+1 }}</td>
                                          <td>{{ $item->type }}</td>
                                          @if ($item->type == 'bank')
                                          <td>{{ $item->name }} - ({{ $item->account_name }})</td>
                                          @else
                                          <td>{{ $item->name }}</td>
                                          @endif
                                          <td>{{ $item->account_number }}</td>
                                          <td>
                                            <button onclick="if(confirm('Are You?'))document.getElementById('delete_{{ $item->id }}').submit()" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
                                            <form id="delete_{{ $item->id }}" action="{{ route('admin.paymentdetails.destroy', ['paymentdetail' => $item->id]) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                            </form>
                                          </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-payment"><span class="fa fa-plus"></span> Add Payment Details</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
      </section>
      <!-- /.content -->

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Pickup Address</h4>
            </div>
            <form action="{{ route('admin.pickups.store') }}" method="POST">
                @csrf
                <input type="hidden" name="marchent_id" value="{{ $marchent->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                          <label for="">Area Type</label>
                          <div class="form-group">
                            <select name="area_type_id" id="area_type_id" class="form-control" required>
                              <option value="">SELECT TYPE</option>
                              @foreach ($areatypes as $type)
                                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="">Select Area</label>
                          <div class="form-group">
                            <select name="area_id" id="area_id" class="form-control" required>
                              <option value="">SELECT AREA</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="">Phone</label>
                          <div class="form-group">
                            <input type="text" name="phone" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="">Address</label>
                          <div class="form-group">
                            <textarea name="address" id="address" class="form-control" required></textarea>
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

      <div class="modal fade" id="modal-payment">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Pickup Address</h4>
            </div>
            <form action="{{ route('admin.paymentdetails.store') }}" method="POST">
                @csrf
                <input type="hidden" name="marchent_id" value="{{ $marchent->id }}">
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
                          <input type="text" name="bank_name" id="bank_name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="">ACCOUNT NUMBER</label>
                        <div class="form-group">
                          <input type="text" name="account_number" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6 bank">
                        <label for="">ACCOUNT NAME</label>
                        <div class="form-group">
                          <input type="text" name="account_name" id="account_name" class="form-control">
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
                            <option value="saving">Saving</option>
                            <option value="current">Current</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="checkbox" class="" name="active">
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