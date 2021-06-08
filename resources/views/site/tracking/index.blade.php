@extends('site.layouts.main')

@push('styles')
    <style>
        .status_icon_active {
            background-color: #2ecc71;
            padding: 15px;
            color: #fff;
            border-radius: 200px;
            margin-right: 20px;
            border: 2px solid #2ecc71;
        }

        .status_icon {
            background-color: #fff;
            padding: 15px;
            color: #2ecc71;
            border: 2px solid #2ecc71;
            border-radius: 200px;
            margin-right: 20px;            
        }

        .status_line {
            margin-top: 15px;
        }

        .status_line::before {
            content: '';
            position: absolute;
            height: 15px;
            width: 2px;
            background-color: #2ecc71;
            margin-left: 22px;
            margin-top: -15px;
        }

        .track_box {
            background-color: #ffffff;
            padding: 15px;
        }

        .track_box input {
            width: 100%;
            padding: 10px 15px;
            padding-right: 90px
        }

        .track_box button {
            background-color: #e52628;
            border: none;
            color: #ffffff;
            position: absolute;
            right: 0;
            margin-right: 30px;
            top: 0;
            margin-top: 16px;
            font-weight: bold;
            padding: 10px 20px;
        }

        .status_line b {
            position: absolute;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function(){
            $("#search").submit(function(e){
                var track = $("#tracking").val();

                if(track == "")
                {
                    e.preventDefault();
                }
            })
        })
    </script>
@endpush

@section('content')
@include('site.layouts.nav')

        <!-- HEADER -->
<section id="home-section" class="header-bg">
    <div class="gradient sectionP60 header-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            {{-- <div class="login-div centered" >
                                <div class="head">
                                    <h3 class="purple oR m0">পার্সেল ট্রাক করুন</h3>
                                </div>
                                <form action="{{ route('tracking') }}" method="GET">
                                    <div class="body" style="margin-bottom: 0">
                                        <div class="input-box" style="padding-bottom: 0">
                                            <input style="padding: 20px 10px" placeholder="ট্রাকিং নম্বর" type="text" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="foot">
                                        <button class="btn btn-gradient pull-right" >ট্রাক করুন!</button>
                                    </div>
                                </form>
                            </div> --}}
                            <form action="{{ route('tracking') }}" id="search" method="GET">
                                <div class="track_box">
                                    <input type="text" placeholder="" name="parcel" value="{{ $tracking }}" id="tracking">
                                    <button>TRACK</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HEADER -->

    <section id="pricing-table" class="sectionP60">
        <div class="container">
            <div class="row">
                @if ($result == true)
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>ট্রাক পার্সেল</h3>
                            <hr>
                            <p>
                                <b>Tracking ID</b><br>
                                {{ $tracking }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h3>অর্ডারের বিস্তারিত তথ্য</h3>
                            <hr>
                            <p>
                                <b>Customer Name</b><br>
                                {{ $status->customer_name }}
                            </p>
                            <p>
                                <b>Customer Phone</b><br>
                                {{ $status->customer_phone }}
                            </p>
                            <p>
                                <b>Customer Address</b><br>
                                {{ $status->address }}
                            </p>
                            <p>
                                <b>Area</b><br>
                                {{ $status->area->name }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h3>পার্সেলের তথ্য</h3>
                            <hr>
                            @foreach ($status->timeline as $item)
                                @if ($loop->index == 0)
                                    <p>
                                        <span class="fa fa-check status_icon_active"></span> <b>{{ $item->text }}</b>
                                    </p>
                                @else
                                    <p class="status_line">
                                        <span class="fa fa-check status_icon"></span> <b>{{ $item->text }}</b>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                    
                @endif
                
            </div>
        </div>
    </section>
@endsection