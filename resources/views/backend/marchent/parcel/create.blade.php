@extends('backend.marchent.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('backend') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#area_id").select2();

            $("#area_type_id").change(function(){
                var id = $(this).val();
                var weight = $("#weight").val();

                $("#area_id").prop('disabled', true);

                $.ajax({
                    url: "{{ route('marchent.parcels.area') }}",
                    method: 'POST',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        id: id,
                        weight: weight
                    },
                    success: function(data){

                        $("#area_id").find("*").remove();

                        var html = [];

                        html += `<option value="">SELECT AREA</option>`

                        var areas = data.areas;
                        areas.forEach(item => {
                            html += `<option value="${item.id}">${item.name}</option>`
                        });

                        $("#area_id").append(html);

                        $("#delivery_charge").text(data.charge);
                        $("#cod_charge").text(data.cod);

                        $("#area_id").prop('disabled', false);
                        
                    }
                })
            })

            var collection_amount = 0;
            var delivery_charge = 0;
            var cod_charge = '0%';


            $("#collection_amount").text(collection_amount);
            $("#delivery_charge").text(delivery_charge);
            $("#cod_charge").text(cod_charge);

            $("#collection").keyup(function(){
                $("#collection_amount").text($(this).val());
            })

            $("#weight").change(function(){
                

                var id = $("#area_type_id").val();
                var weight = $("#weight").val();

                if((id != '') && (weight != ''))
                {
                    $.ajax({
                    url: "{{ route('marchent.parcels.area') }}",
                    method: 'POST',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        id: id,
                        weight: weight
                    },
                    success: function(data){

                        $("#delivery_charge").text(data.charge);
                        $("#cod_charge").text(data.cod);
                        
                    }
                })
                }
            })

            $("#parcel_submit").submit(function(e){
                e.preventDefault();
                $("#parcel_submit :input").prop('disabled', true);
                
                var customer_name = $("#customer_name").val();
                var customer_phone = $("#customer_phone").val();
                var address = $("#address").val();
                var marchent_invoice_no = $("#marchent_invoice_no").val();
                var weight = $("#weight").val();
                var pickup_id = $("#pickup_id").val();
                var area_type_id = $("#area_type_id").val();
                var area_id = $("#area_id").val();
                var collection = $("#collection").val();
                var product_price = $("#product_price").val();

                $.ajax({
                    url: '{{ route("marchent.parcels.store") }}',
                    method: 'POST',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        customer_name,
                        customer_phone,
                        address,
                        marchent_invoice_no,
                        weight,
                        pickup_id,
                        area_type_id,
                        area_id,
                        collection,
                        product_price
                    },
                    success: function(data){
                        
                        $("#parcel_tracking_id").text(data.parcel.tracking);
                        $("#tracking_link").attr('href', data.link);
                        $("#parcel_submit :input").prop('disabled', false);

                        $("#alert_panel").css("display", 'block');


                        $("#customer_name").val("");
                        $("#customer_phone").val("");
                        $("#address").val("");
                        $("#marchent_invoice_no").val("");
                        $("#collection").val("");
                        $("#product_price").val("");

                        $("#collection_amount").text(collection_amount);
                        $("#delivery_charge").text(delivery_charge);
                        $("#cod_charge").text(cod_charge);

                        window.location.hash = "#add_parcel";

                    }
                })

            })
          
        });
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Parcels
          <small>Manage Your Parcels</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Parcel</a></li>
          {{-- <li class="active">Here</li> --}}
        </ol>
    </section>
  
      <!-- Main content -->
      <section class="content container-fluid" id="add_parcel">

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                <div class="btn-group">
                    <a href="{{ route('marchent.parcels.index') }}" class="btn btn-sm btn-success"><span class="fa fa-arrow-left"></span> Back</a>
                </div>
                </div>
            </div>
        </div>

        
        @include('partial.alert')

        <br>
        
        <div class="row" style="display: none;" id="alert_panel">
            <div class="col-md-12">
                <div class="alert alert-success">
                    পার্সেল আইডি <span id="parcel_tracking_id"></span> আপনার পার্সেলটি সফল ভাবে তালিকাভুক্ত করা হয়েছে। <a id="tracking_link" href="" target="_blank">Print</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <form id="parcel_submit">
                            @csrf
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Customer Informations</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Customer Name</label>
                                                        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Customer Phone</label>
                                                        <input type="text" name="customer_phone" id="customer_phone" class="form-control" minlength="11" maxlength="11" pattern="[0-9]{11}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Customer Address</label>
                                                        <textarea name="address" id="address" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Merchant Invoice</label>
                                                        <input type="text" min="1" name="marchent_invoice_no" id="marchent_invoice_no" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Parcel Weight</label>
                                                        <input type="number" name="weight" id="weight" class="form-control" min="1" value="1" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Pickup Area</label>
                                                        <select name="pickup_id" id="pickup_id" class="form-control" required>
                                                            @foreach ($pickups as $item)
                                                                <option value="{{ $item->id }}">{{ $item->area->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Delivery Type</label>
                                                        <select name="area_type_id" id="area_type_id" class="form-control" required>
                                                            <option value="">SELECT DELIVERY TYPE</option>
                                                            @foreach ($types as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Select Area</label>
                                                        <select name="area_id" id="area_id" class="form-control" required>
                                                            <option value="">SELECT AREA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Colluction Amount</label>
                                                        <input type="text" name="collection" id="collection" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Product Price</label>
                                                        <input type="text" name="product_price" id="product_price" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button class="btn btn-success">SAVE</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    DELIVERY CHARGE DETAILS
                                </h3>
                            </div>
                            <div class="box-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <th>Cash Collection</th>
                                        <td>:</td>
                                        <td style="min-width: 120px;">Tk. <span id="collection_amount"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Charge</th>
                                        <td>:</td>
                                        <td>Tk. <span id="delivery_charge"></span></td>
                                    </tr>
                                    <tr>
                                        <th>COD Charge</th>
                                        <td>:</td>
                                        <td>Tk. <span id="cod_charge"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection