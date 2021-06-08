@extends('backend.marchent.layouts.master')

@section('content')

  <!-- Main content -->
  <section class="content container-fluid">

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>{{ App\Models\Parcel::where('marchent_id', Auth::guard('marchent')->user()->id)->count() }}</h3>
          
                        <p>Orders Placed</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                    </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{ App\Models\Parcel::where('marchent_id', Auth::guard('marchent')->user()->id)->where('status_id', 4)->count() }}</h3>
      
                    <p>Orders in Transit</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bicycle"></i>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{ App\Models\Parcel::where('marchent_id', Auth::guard('marchent')->user()->id)->where('status_id', 6)->count() }}</h3>
      
                    <p>Orders Returned</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-share"></i>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ App\Models\Parcel::where('marchent_id', Auth::guard('marchent')->user()->id)->where('status_id', 8)->count() }}</h3>
      
                    <p>Orders Delivered</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-check"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
          
                      <div class="info-box-content">
                        <span class="info-box-text">Messages</span>
                        <span class="info-box-number">1,410</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
        </div>
    </div>

  </section>
  <!-- /.content -->
    
@endsection