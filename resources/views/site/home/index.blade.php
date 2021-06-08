@extends('site.layouts.main')

@section('content')

@include('site.layouts.navigation')
    <!-- HEADER -->
<section id="home-section" class="header-bg">
    <div class="gradient sectionP60 header-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 header-text sectionP60">
                            <h1 class="rL white">ডেলিভারি শেষ তো</h1>
                            <h1 class="rL white">পেমেন্ট রেডি</h1>
                            <p class="rL blue-L">ডিজিটাল পধ্যতীর মাধ্যমে সবচেয়ে কম সময়ে ডেলিভারি সেবা ই-কমার্স ব্যবসাকে সক্ষম করে নিশ্চত ডেলিভারির লক্ষ্য নিয়েই আমরা DMEX নিয়ে এসেছি।</p>
                            <button class="btn btn-gradient" data-toggle="modal" data-target="#pop-register">রেজিস্টার করুন</button>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                            <div class="login-div centered" >
                                <div class="head">
                                    <h3 class="purple oR m0">লগইন করুন</h3>
                                    <p class="light oR">আপনার মোবাইল নম্বর এবং পাসওয়ার্ড দিয়ে লাগইন করুন।</p>
                                </div>
                                <form action="{{ route('marchent.login.attempt') }}" method="POST">
                                    @csrf
                                    <div class="body">
                                        <div class="input-box">
                                            <input placeholder="মোবাইল নম্বর" type="text" name="phone" required>
                                            <span style="position: absolute"><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="input-box">
                                            <input placeholder="পাসওয়ার্ড" type="password" name="password" required>
                                            <span style="position: absolute"><i class="fa fa-key"></i></span>
                                        </div>
                                    </div>
                                    <div class="foot">
                                        <a href="javascript:;" class="forgot pull-left"><small>পাসওয়ার্ড ভুলে গেছেন?</small></a>
                                        <button class="btn btn-gradient W100 pull-right" >লগইন করুন!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HEADER -->

<!-- What Can We Offer -->
<section id="offers-section" class="hiw-bg">
    <div class="sectionP60 grey-bg-o">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 text-center">
                        <div >
                            <div class="heading-text">
                                <span class="gold-gradient-color">আপনার জিজ্ঞাসা
                                </span>
                            </div>
                            {{-- <p class="light oR" style="font-size: 16px;">আমরা দেশের ৬৪ জেলায় পণ্য ডেলিভারী করে থাকি ।</p> --}}
                        </div>
                    </div>
                    <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 p0 sectionP40">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div >
                                <img class="img-responsive centered" src="{{ asset('frontend') }}/assets/images/delivery.jpg"/>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12 sectionP20 pull-right">
                            <div class="acordian gradient-accordian" >
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                        <div class="acordian-desc res-txt-center">
                                            <i class="fa fa-heart-o"></i><span class="rM">আপনারা কোথায় কোথায় পণ্য ডেলিভারী করেন ?</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="acordian-body res-txt-center">
                                            <span class="white rL">আমরা ঢাকা শহর এবং পর্শবর্তী জেলায় পণ্য ডেলিভারী করে থাকি ।</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="acordian active gradient-accordian" >
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                        <div class="acordian-desc res-txt-center">
                                            <i class="fa fa-bicycle"></i><span class="rM">প্রোডাক্ট কালেকশন কিভাবে হবে ?</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="acordian-body res-txt-center">
                                            <span class="white rL">আমাদের নিজস্ব কালেক্টর আপনার দেওয়া কালেকশন পয়েন্ট থেকে পণ্য কালেক্ট করবে। বর্তমানে আমরা (ঢাকা,চিটাগাং,সিলেট,নারায়ঙ্গঞ্জ,গাজীপুর ও সাভার) থেকে প্রোডাক্ট কালেকশন করি।</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="acordian gradient-accordian" >
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                        <div class="acordian-desc res-txt-center">
                                            <i class="fa fa-home"></i><span class="rM">আপনারা কি হোম ডেলিভারী করেন, নাকি কাস্টমারেকে কাউন্টারে এসে নিতে হবে ?</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="acordian-body res-txt-center">
                                            <span class="white rL">আমরা হোম ডেলিভরী করি এবং কাস্টমার চাইলে আমাদের হাব থেকে নিয়ে যেতে পারবে।</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="acordian gradient-accordian" >
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                        <div class="acordian-desc res-txt-center">
                                            <i class="fa fa-paper-plane"></i><span class="rM">আপনারা কী সত্যিই 24 ঘন্টাতে ডেলিভরী করবেন?</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="acordian-body res-txt-center">
                                            <span class="white rL">আমরা বিশ্বাস করি একমাত্র দ্রুত ডেলিভারিই পারে কাস্টমার সন্তুষ্টি অর্জনের মাধ্যমে একজন উদ্যোক্তার ব্যবসাকে সামনে এগিয়ে নিতে।</span>
                                        </div>
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
<!-- What Can We Offer -->
<!-- Pricing Table -->
<section id="pricing-table" class="sectionP60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 text-center">
                    <div>
                        <div class="heading-text">
                            <span class="gold-gradient-color">ডেলিভরী চার্জ সমূহ</span>
                        </div>
                        <p class="light oR" style="font-size: 16px;">আপনার পর্সেল পাঠাতে কেমন খরচ হবে দেখেনিন।</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 sectionP60">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class='package'>
                              <div class='name'>ঢাকার সিটির মধ্যে (24 ঘন্টায়)</div>
                              <div class='price'>৬০ টাকা।</div>
                              <div class='trial'>পরবর্তী প্রতি কেজি ২০ টাকা।</div>
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class='package'>
                              <div class='name'>ঢাকার পার্শবর্তী এলাকা</div>
                              <div class='price'>১২০ টাকা।</div>
                              <div class='trial'>পরবর্তী প্রতি কেজি ২০ টাকা।</div>
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class='package'>
                              <div class='name'>ঢাকার বাহিরে অন্য জেলাতে</div>
                              <div class='price'>১৫০ টাকা।</div>
                              <div class='trial'>পরবর্তী প্রতি কেজি ৩০ টাকা।</div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing Table -->
@endsection

@push('popups')
    <!-- Register Popup -->
    <div id="pop-register" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h3 class="modal-title  blue oR m0">রেজিস্টার করুন</h3>
                    <span class="light oR" style="font-size: 14px">আপনার তথ্য দিয়ে রেজিস্ট্রেশন করুন।</span>
                </div>
                <form action="{{ route('marchent.register.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-box">
                            <input placeholder="কম্পানির নাম" type="text" name="name" required>
                            <span style="position: absolute"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="input-box">
                            <input placeholder="মোবাইল নম্বর 01700000000" type="text" name="phone" minlength="11" maxlength="11" pattern="[0-9]{11}" required>
                            <span style="position: absolute"><i class="fa fa-phone"></i></span>
                        </div>
                        <div class="input-box">
                            <input placeholder="পাসওয়ার্ড" type="password" name="password" required>
                            <span style="position: absolute"><i class="fa fa-key"></i></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient">রেজিস্টার করুন</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Register Popup -->
@endpush