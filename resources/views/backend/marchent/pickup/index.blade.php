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
            
            $.ajax({
              url: "{{ route('area.get') }}",
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

        });
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Pickup Area
          <small>Manage Your Pickup Area</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Pickup</a></li>
          {{-- <li class="active">Here</li> --}}
        </ol>
    </section>
  
      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                <div class="btn-group">
                    <button data-target="#modal-pickup" data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Add Pickup Address</button>
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
                        <h3 class="box-title">Parcel List</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-border" id="pickups">
                          <thead>
                            <tr>
                              <th>Area Type</th>
                              <th>Area Name</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>ACTION</th>
                            </tr>
                          </thead>
                            @foreach ($pickups as $item)
                                <tr>
                                  <td>{{ $item->areaType->name }}</td>
                                  <td>{{ $item->area->name }}</td>
                                  <td>{{ $item->phone }}</td>
                                  <td>{{ $item->address }}</td>
                                  <td>
                                    <div class="btn-group">
                                      <button onclick="if(confirm('Are You Sure?')) document.getElementById('pickup_{{ $item->id }}').submit()" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
                                      <form onsubmit="" id="pickup_{{ $item->id }}" action="{{ route('marchent.pickups.destroy', ['pickup' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                      </form>
                                    </div>
                                  </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
  
      </section>
      <!-- /.content -->



      <div class="modal fade" id="modal-pickup">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Pickup Address</h4>
            </div>
            <form action="{{ route('marchent.pickups.store') }}" method="POST">
                @csrf
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
                            <input type="text" name="phone" minlength="11" maxlength="11" pattern="[0-9]{11}" class="form-control" required>
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
@endsection