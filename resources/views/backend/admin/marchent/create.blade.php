@extends('backend.admin.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('backend') }}/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#affiliate").select2();
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

        });
    </script>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Create Marchent
          <small>Create new Marchent.</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.marchents.index') }}"><i class="fa fa-dashboard"></i> Marchents</a></li>
          <li class="active">Create Marchent</li>
        </ol>
    </section>
  
      <!-- Main content -->
      <section class="content container-fluid">
  
        <div class="row">
            <div class="col-sm-6">
                <div class="btn-group">
                    <a href="{{ route('admin.marchents.index') }}" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span> Back</a>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div>
        <br>
        @include('partial.alert')
        <div class="row">
          <form action="{{ route('admin.marchents.store') }}" method="POST">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Marchent</h3>
                </div>
                <div class="box-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="">Company Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                          <label for="">Phone</label>
                          <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
                          @error('phone')
                              <span class="help-block">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" value="12345678" required>
                        @error('password')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                          <label for="">Status</label>
                          <select name="status" id="status" class="form-control" required>
                            <option value="">SELECT</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                          </select>
                          @error('status')
                              <span class="help-block">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="affiliate">Affiliates</label>
                              <select name="affiliate" id="affiliate" class="form-control select2">
                                  <option value="">SELECT</option>
                                  @foreach ($affiliates as $affiliate)
                                      <option value="{{ $affiliate->id }}">{{ $affiliate->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Marchent Pickup Area</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                      <label for="">Select Area</label>
                      <div class="form-group">
                        <select name="area_id" id="area_id" class="form-control" required>
                          <option value="">SELECT AREA</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="">Address</label>
                      <div class="form-group">
                        <textarea name="address" id="address" class="form-control" required>

                        </textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button class="btn btn-success">SAVE</button>
                </div>
              </div>
            </div>
          </form>
        </div>
  
      </section>
      <!-- /.content -->
@endsection