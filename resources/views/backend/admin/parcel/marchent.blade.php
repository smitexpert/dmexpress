@extends('backend.admin.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('backend') }}/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#marchent_id").select2();
            $("#area_id").select2();
            $("#pickup_id").select2();

            $("#area_type_id").change(function(){
                var id = $(this).val();
                $("#area_id").prop('disabled', true);

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

                    $("#area_id").prop('disabled', false);
                    
                }
                })

            })

            $("#marchent_id").change(function(){
                var marchent_id = $(this).val();
                
                $("#pickup_id").prop('disabled', true);
                $("#pickup_id").find("*").remove();

                $.ajax({
                    url: "{{ route('admin.pickups.get') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        marchent_id
                    },
                    success: function(data){
                    var html = [];

                    html += `<option value="">SELECT PICKUP AREA</option>`

                    data.forEach(item => {
                    html += `<option value="${item.id}">${item.area.name} - ${item.address}</option>`
                    });

                    $("#pickup_id").append(html);

                    $("#pickup_id").prop('disabled', false);
                    }
                });
            })
        });

        $("#parcel_form").submit(function(e){
            e.preventDefault();

            $("#parcel_form :input").prop("disabled", true);
            
            var marchent_id = $("#marchent_id").val();
            var pickup_id = $("#pickup_id").val();
            var collection = $("#collection").val();
            var product_price = $("#product_price").val();
            var weight = $("#weight").val();
            var marchent_invoice_no = $("#marchent_invoice_no").val();

            var area_type_id = $("#area_type_id").val();
            var area_id = $("#area_id").val();
            var customer_phone = $("#customer_phone").val();
            var customer_name = $("#customer_name").val();
            var address = $("#address").val();
            var date = $("#date").val();

            var charge = $("#charge").val();
            var cod = $("#cod").val();

            $.ajax({
                url: "{{ route('admin.parcels.store') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    marchent_id,
                    pickup_id,
                    collection,
                    product_price,
                    weight,
                    marchent_invoice_no,
                    area_type_id,
                    area_id,
                    customer_phone,
                    customer_name,
                    address,
                    date,
                    charge,
                    cod
                },
                success: function(data){
                    
                    $("#parcel_form :input").prop("disabled", false);
                    
                    // console.log(data)
                    $("#place_parcel_id").html(data.tracking)
                    $("#parcel_print").attr('href', data.print_url);

                    $(".place_alert").css('display', 'block');

                    $("#collection").val('');
                    $("#product_price").val('');
                    $("#marchent_invoice_no").val('');
                    $("#area_type_id").val('');
                    $("#area_id").val('');
                    $("#customer_phone").val('');
                    $("#customer_name").val('');
                    $("#address").val('');
                }
            });
            

        });
    </script>
@endpush
@include('partial.sweet')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Add Parcel For Marchent
          <small>Create new Parcel for Marchent.</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.marchents.index') }}"><i class="fa fa-dashboard"></i> Parcel</a></li>
          <li class="active">Add New Parcel</li>
        </ol>
    </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
        <br>
        @include('partial.alert')
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success place_alert" style="display: none">
                    Successfully Submitted the Parcel #<span id="place_parcel_id"></span> <a href="" id="parcel_print" target="_blank">Print</a>
                </div>
            </div>
        </div>
        <div class="row">
          <form action="" id="parcel_form" method="POST">
            @csrf
            <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Parcel Informations</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Select Marchent</label>
                            <div class="form-group">
                                <select name="marchent_id" id="marchent_id" class="form-control" required>
                                    <option value="">SELECT MARCHENT</option>
                                    @foreach ($marchents as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Marchent Pickup Address</label>
                            <div class="form-group">
                                <select name="pickup_id" id="pickup_id" class="form-control" required>
                                    <option value="">SELECT PICKUP AREA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Shipping Date</label>
                            <div class="form-group">
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Collection Amount</label>
                            <div class="form-group">
                                <input type="number" min="0" name="collection" id="collection" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Product Price</label>
                            <div class="form-group">
                                <input type="number" min="0" name="product_price" id="product_price" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Weight</label>
                            <div class="form-group">
                                <input type="number" name="weight" id="weight" step="1" min="1" value="1" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">MARCHENT INVOICE NO (OPTION)</label>
                            <div class="form-group">
                                <input type="text" name="marchent_invoice_no" id="marchent_invoice_no" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Customer Informations</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Select Delivery Type</label>
                                <div class="form-group">
                                    <select name="area_type_id" id="area_type_id" class="form-control" required>
                                        <option value="">SELECT DELIVERY TYPE</option>
                                        @foreach ($types as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Customer Phone</label>
                                <div class="form-group">
                                    <input type="text" name="customer_phone" class="form-control" name="customer_phone" id="customer_phone" minlength="11" maxlength="11" pattern="[0-9]{11}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Customer Name</label>
                                <div class="form-group">
                                    <input type="text" name="customer_name" class="form-control" name="customer_name" id="customer_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Customer Address</label>
                                <div class="form-group">
                                    <textarea name="address" id="address" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Charge</label>
                                <div class="form-group">
                                    <input type="number" step="0.01" name="charge" id="charge" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">COD (%)</label>
                                <div class="input-group">
                                    <input type="number" name="cod" id="cod" class="form-control">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>
  
      </section>
      <!-- /.content -->
@endsection