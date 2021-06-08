@extends('backend.admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Marchent
          <small>Edit Marchent.</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.marchents.index') }}"><i class="fa fa-dashboard"></i> Marchents</a></li>
          <li class="active">Edit Hero</li>
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
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Marchent</h3>
              </div>
              <form action="{{ route('admin.marchents.update', ['marchent' => $marchent->id]) }}" method="POST">
              <div class="box-body">
                    @method('put')
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ (old('name')) ? old('name') : $marchent->name }}" class="form-control" required>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                          <label for="">Phone</label>
                          <input type="text" name="phone" value="{{ (old('phone')) ? old('phone') : $marchent->phone }}" class="form-control" disabled>
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
                        <input type="password" name="password" class="form-control">
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
                            <option value="1" {{ ($marchent->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ ($marchent->status == 0) ? 'selected' : '' }}>Deactive</option>
                          </select>
                          @error('status')
                              <span class="help-block">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                  </div>
                  
                  
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="pull-left">
                            <button class="btn btn-sm btn-success">SAVE</button>
                          </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>

            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Marchent Charge</h3>
              </div>
              <form action="{{ route('admin.marchents.charge', ['id' => $marchent->id]) }}" method="POST">
                @csrf
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>AREA TYPE</th>
                            <th>CHARGE</th>
                            <th>COD</th>
                            <th>ADDITIONAL (AFTER 1KG+)</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($charges->count() > 0)
                              @foreach ($charges as $item)
                              <tr>
                                <td>
                                  {{ $item->type->name }}
                                  <input type="hidden" name="area_type_id[]" value="{{ $item->area_type_id }}">
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="number" name="charge[]" value="{{ ($item->charge) ? $item->charge : 0 }}" class="form-control" required>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="number" name="cod[]" value="{{ ($item->cod) ? $item->cod : 0 }}" class="form-control" required>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="number" name="additional_charge[]" value="{{ ($item->additional_charge) ? $item->additional_charge : 0 }}" class="form-control" required>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                          @else
                            @foreach ($types as $item)
                              <tr>
                                <td>
                                  {{ $item->name }}
                                  <input type="hidden" name="area_type_id[]" value="{{ $item->id }}">
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="number" name="charge[]" class="form-control" required>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="number" name="cod[]" class="form-control" required>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="number" name="additional_charge[]" class="form-control" required>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-success">SAVE</button>
                </div>
              </form>
            </div>
          </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection