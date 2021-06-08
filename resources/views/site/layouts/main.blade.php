
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DHAKA MATRO EXPRESS - DMEX - E-COMMERCE COURIER</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- <link rel="shortcut icon" href="assets/images/favicon.html"> -->

    <!--All css  are here-->

    <!--Bootstrap css here-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.css">

    <!--Font-Awsome css here-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/font-awesome.min.css">

    <!--Owl-carousel css here-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/plugins/owl/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/plugins/owl/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/plugins/owl/owl.transitions.css">

    <!--Custon css here-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custom.css">

    <!--Scroll Animation - aos-master css here-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/plugins/aos-master/aos.css"/>

    <!--Responsive css here-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">

    @stack('styles')

</head>
<body>
<div class="se-pre-con"></div>

@yield('content')

<!-- About -->
{{-- <section id="about-section" class="grey-bg" style="padding-bottom: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="services-div margin-minus" >
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center br service-hover">
                        <div class="service" >
                            <div class="service-icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="service-desc">
                                <h4 class="blue oB">পরের দিনই পেমেন্ট</h4>
                                <p class="light oR">ডেলিভারি সম্পূর্ণ হলে পরের দিনই পেমেন্ট পেয়ে যাবেন</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center br b0 service-hover">
                        <div class="service" >
                            <div class="service-icon">
                                <i class="fa fa-paint-brush"></i>
                            </div>
                            <div class="service-desc">
                                <h4 class="blue oB">সেরা ক্যাশ অন ডেলিভারি রেট</h4>
                                <p class="light oR">ঢাকার ভিতর ক্যাশ অন ডেলিভারি চার্জ ০%, ঢাকার বাইরে ১%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center br b0 service-hover">
                        <div class="service" >
                            <div class="service-icon">
                                <i class="fa fa-hourglass-2"></i>
                            </div>
                            <div class="service-desc">
                                <h4 class="blue oB">বিকাশ পেমেন্টের সুবিধা</h4>
                                <p class="light oR">মার্চেন্টরা ব্যাংক অথবা বিকাশের মাধ্যমে পেমেন্ট গ্রহণ করতে পারবেন</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center br service-hover">
                        <div class="service" >
                            <div class="service-icon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <div class="service-desc">
                                <h4 class="blue oB">লাইভ ট্র্যাকিং</h4>
                                <p class="light oR">ঘরে বসেই দেখুন আপনার পার্সেলের বর্তমান লোকেশন</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 text-center">
                    <div id="wwa">
                        <div class="heading-text" >
                           <span class="gold-gradient-color">WHO WE ARE?</span>
                        </div>
                        <p class="light oR" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <button class="btn btn-gradient outline-button mtb20" data-toggle="modal" data-target="#pop-about" ><div style="background: #f1f1f1;transition: all 0.3s"><span>Read More About Us</span></div></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- About -->

<!-- Why Choose Us -->
{{-- <section id="why-us-section" class="sectionP60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="responsive rsb"  >
                        <div class="heading-text">
                            <span class="blue-gradient-color">Why choose PayYou?</span>
                        </div>
                        <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <br>
                        <p class="light oR">
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="video-embed pull-right" >
                        <div class="thumb">
                             <span><i class="gold-gradient-color fa fa-youtube-play"></i></span>
                        </div>
                        <iframe width="533" height="300" src="https://www.youtube.com/embed/2LeOH9AGJQM?rel=0" frameborder="0" allowfullscreen></iframe>
                        <!--<iframe src="https://player.vimeo.com/video/202406936?title=0&amp;byline=0&amp;portrait=0&amp;color=FDA10E&amp;autoplay=0" width="100%" height="300" autoplay="0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></iframe>-->
                    </div>
                    <div class="quote-div gold-gradient-bg pull-right" >
                        <p class="white oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Why Choose Us -->

<!-- How We Work -->
{{-- <section id="how-section" class="sectionP60 grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-md-offset-0 col-sm-10 col-xs-12">
                    <div >
                        <div class="heading-text">
                            <span class="blue-gradient-color">How we work?</span>
                        </div>
                        <p class="light rL" style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 p0 sectionP40">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="service2" >
                            <div class="service2-icon">
                                <i class="gold-gradient-color fa fa-lightbulb-o"></i>
                            </div>
                            <div class="service2-desc">
                                <h4 class="blue oB">Think</h4>
                                <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
                                <a href="javascript:;" class="gold" data-toggle="modal" data-target="#pop-read-more1">Read more...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="service2" >
                            <div class="service2-icon">
                                <i class="gold-gradient-color fa fa-pencil"></i>
                            </div>
                            <div class="service2-desc">
                                <h4 class="blue oB">Create</h4>
                                <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
                                <a href="javascript:;" class="gold" data-toggle="modal" data-target="#pop-read-more2">Read more...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="service2" >
                            <div class="service2-icon">
                                <i class="gold-gradient-color fa fa-money"></i>
                            </div>
                            <div class="service2-desc">
                                <h4 class="blue oB">Sell</h4>
                                <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
                                <a href="javascript:;" class="gold" data-toggle="modal" data-target="#pop-read-more3">Read more...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="service2" >
                            <div class="service2-icon">
                                <i class="gold-gradient-color fa fa-bullhorn"></i>
                            </div>
                            <div class="service2-desc">
                                <h4 class="blue oB">Earn</h4>
                                <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
                                <a href="javascript:;" class="gold" data-toggle="modal" data-target="#pop-read-more4">Read more...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- How We Work -->

<!-- Number Counter -->
{{-- <section class="counter-bg">
    <div class="sectionP40 blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="responsive" >
                            <div class="heading-text">
                                <span class="gold-gradient-color">Little bit of stats.</span>
                            </div>
                            <p class="light2 oL" style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            <button class="btn btn-gradient outline-button mtb20 hidden-sm hidden-xs"  ><div  style="background: #091D48;transition: all 0.3s">Buy Now</div></button>
                        </div>
                    </div>
                    <div id="counter" class="col-md-5 col-sm-12 col-xs-12 pull-right resPad0">
                        <div class="col-md-6 col-sm-3 col-xs-6 br bb">
                            <div class="numbers text-center" >
                                <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4969' data-delay='1' data-increment='25'>00</span>
                                <p class="white oR">Downloads</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-xs-6 bb">
                            <div class="numbers text-center" >
                                <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4670' data-delay='1' data-increment='25'>00</span>
                                <p class="white oR">Theme Lovers</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-xs-6 br">
                            <div class="numbers text-center" >
                                <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4343' data-delay='1' data-increment='25'>00</span>
                                <p class="white oR">Followers</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-xs-6">
                            <div class="numbers text-center" >
                                <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4546' data-delay='1' data-increment='25'>00</span>
                                <p class="white oR">Haters</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Number Counter -->



<!-- Our Best Features -->
{{-- <section id="features-section" class="sectionP60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 text-center">
                    <div >
                        <div class="heading-text">
                            <span class="gold-gradient-color">Our best features.</span>
                        </div>
                        <p class="light oR" style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
                <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 p0 sectionP60">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="img" >
                            <img class="img-responsive centered" src='assets/images/mobile.png'/>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 pull-right">
                        <div class="features">
                            <ul class="ul-style">
                                <li class="oR light" ><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></li>
                                <li class="oR light" ><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></li>
                                <li class="oR light" ><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></li>
                                <li class="oR light" ><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></li>
                                <li class="oR light" ><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></li>
                                <li class="oR light" ><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Our Best Features -->

<!-- Meet Our Team -->
{{-- <section id="team-section" class="sectionP60 grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 res-txt-center">
                    <div  >
                        <div class="heading-text">
                            <span class="blue-gradient-color">Meet our team.</span>
                        </div>
                        <p class="light oR" style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 p0 sectionP40">
                    <div class="col-md-6 col-sm-12 col-xs-12 p0">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="team-member centered tm1" >
                                <div class="member-desc">
                                    <p class="white oR">Tom Cruise</p>
                                    <small class="gold-gradient-color">Brilliant Actor</small>
                                    <span class="white oL">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                    <div class="social-icons">
                                        <a href="javascript:;" target="_blank"><i class="fa fa-facebook-f white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa fa-twitter white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa  fa-youtube-play white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="team-member centered tm2" >
                                <div class="member-desc">
                                    <p class="white oR">Adam Levine</p>
                                    <small class="gold-gradient-color">Singer & Songwriter</small>
                                    <span class="white oL">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                    <div class="social-icons">
                                        <a href="javascript:;" target="_blank"><i class="fa fa-facebook-f white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa fa-twitter white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa  fa-youtube-play white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 p0">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="team-member centered tm3" >
                                <div class="member-desc">
                                    <p class="white oR">Adele</p>
                                    <small class="gold-gradient-color">Singer-Songwriter</small>
                                    <span class="white oL">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                    <div class="social-icons">
                                        <a href="javascript:;" target="_blank"><i class="fa fa-facebook-f white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa fa-twitter white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa  fa-youtube-play white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="team-member centered tm4" >
                                <div class="member-desc">
                                    <p class="white oR">Bruno Mars</p>
                                    <small class="gold-gradient-color">My Favourite</small>
                                    <span class="white oL">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                    <div class="social-icons">
                                        <a href="javascript:;" target="_blank"><i class="fa fa-facebook-f white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa fa-twitter white"></i></a>
                                        <a href="javascript:;" target="_blank"><i class="fa  fa-youtube-play white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Meet Our Team -->

<!-- Testimonials -->
{{-- <section id="testimonial-section" class="hiw-bg">
    <div class="blue-bg sectionP60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 text-center">
                        <div  >
                            <div class="heading-text">
                                <span class="gold">WHY PEOPLE L<i class="fa fa-heart-o"></i>VE US?</span>
                            </div>
                            <p class="white oR" style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 sectionP60" style="padding-bottom: 0">
                        <div id="testimonial">
                            <div class="item col-md-12">
                                <div class="testimonial">
                                    <div class="testi-text">
                                        <p class="white rL" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta libero id arcu vulputate.</p>
                                        <span class="gold-gradient-color rM">Adam Levine</span>
                                        <small class="light2 or">Singer</small>
                                    </div>
                                    <div class="testi-p-image">
                                        <div class="arrow-image"><img src="assets/images/testimonial/bottom-pic.png"></div>
                                        <div class="person-image"><div><img class="img-responsive" src="assets/images/testimonial/client-1.png"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item col-md-12">
                                <div class="testimonial">
                                    <div class="testi-text">
                                        <p class="white rL" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta libero id arcu vulputate.</p>
                                        <span class="gold-gradient-color rM">Tom Cruise</span>
                                        <small class="light2 or">Actor</small>
                                    </div>
                                    <div class="testi-p-image">
                                        <div class="arrow-image"><img src="assets/images/testimonial/bottom-pic.png"></div>
                                        <div class="person-image"><div><img class="img-responsive" src="assets/images/testimonial/client-2.png"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item col-md-12">
                                <div class="testimonial">
                                    <div class="testi-text">
                                        <p class="white rL" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta libero id arcu vulputate.</p>
                                        <span class="gold-gradient-color rM">Adele</span>
                                        <small class="light2 or">My Favourite</small>
                                    </div>
                                    <div class="testi-p-image">
                                        <div class="arrow-image"><img src="assets/images/testimonial/bottom-pic.png"></div>
                                        <div class="person-image"><div><img class="img-responsive" src="assets/images/testimonial/client-3.png"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item col-md-12">
                                <div class="testimonial">
                                    <div class="testi-text">
                                        <p class="white rL" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta libero id arcu vulputate.</p>
                                        <span class="gold-gradient-color rM">Adam Levine</span>
                                        <small class="light2 or">Singer</small>
                                    </div>
                                    <div class="testi-p-image">
                                        <div class="arrow-image"><img src="assets/images/testimonial/bottom-pic.png"></div>
                                        <div class="person-image"><div><img class="img-responsive" src="assets/images/testimonial/client-1.png"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item opacity col-md-12">
                                <div class="testimonial">
                                    <div class="testi-text">
                                        <p class="white rL" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta libero id arcu vulputate.</p>
                                        <span class="gold-gradient-color rM">Tom Cruise</span>
                                        <small class="light2 or">Actor</small>
                                    </div>
                                    <div class="testi-p-image">
                                        <div class="arrow-image"><img src="assets/images/testimonial/bottom-pic.png"></div>
                                        <div class="person-image"><div><img class="img-responsive" src="assets/images/testimonial/client-2.png"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item opacity col-md-12">
                                <div class="testimonial">
                                    <div class="testi-text">
                                        <p class="white rL" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta libero id arcu vulputate.</p>
                                        <span class="gold-gradient-color rM">Adele</span>
                                        <small class="light2 or">My Favourite</small>
                                    </div>
                                    <div class="testi-p-image">
                                        <div class="arrow-image"><img src="assets/images/testimonial/bottom-pic.png"></div>
                                        <div class="person-image"><div><img class="img-responsive" src="assets/images/testimonial/client-3.png"></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Testimonials -->





<!-- Google Map -->
{{-- <section>
    <div id="map-section" class="section">
        <div class="google-map" id="location" data-lat="48.8580362" data-lng="2.2933471" data-zoom="17" style="height: 330px"></div>
    </div>
</section> --}}
<!-- Google Map -->

<!-- Footer Section -->
<footer id="contact-section" class="sectionP60 dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-7 col-sm-7 col-xs-12 pull-right resCont">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="heading-text">
                            <span class="gold-gradient-color">পরামর্শ ও মতামত দিন।</span>
                        </div>
                    </div>
                    <form action="#">
                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Full Name" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Email Address" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Mobile or Telephone" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-phone"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-box">
                                    <input placeholder="Subject" type="text" required>
                                    <span style="position: absolute"><i class="fa fa-puzzle-piece"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 p0">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="input-box">
                                    <textarea placeholder="Type your message here..." name="" id="" cols="30" rows="5"></textarea>
                                    <span style="position: absolute"><i class="fa fa-comments"></i></span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-gradient outline-button pull-right mtb20"><div style="background: #0C1222;transition: all 0.3s">Send <tag class="hidden-xs">Message</tag></div></button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-5 col-xs-12 border-right resCompany">
                    <div class="company-desc logoo">
                        <a href="#home-section"><img style="width: 120px; height: auto;" class="img-responsive" src="{{ asset('frontend') }}/assets/images/logo.png"/></a>
                        {{-- <p class="light2 rl">
                        </p> --}}
                            
                    </div>
                    <div class="meet-us">
                        <p class="gold rL">আমাদের ঠিকানা</p>
                        <span class="light2 oR">148/9/D, Sha-Ali Garden <br>
                            Mirpur-1, Dhaka-1216</span>
                    </div>
                    <div class="cont-us">
                        <p class="gold rL">যোগাযোগ</p>
                        <div><a class="light2 g" href="tel: +8801567874697"><span class="oR">Office Support : +880 156 787 4697</span></a></div>
                        <div><a class="light2 g" href="tel: +8801404313120"><span class="oR">Operation Manager : +880 140 431 3120</span></a></div>
                        <div><a class="light2 g" href="mailto: info@dmexpress.xyz"><span class="oR">Email : info@dmexpress.xyz</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section -->

<!-- Copyright Section -->
<section class="sectionP20" style="background: #0b101d;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    <p class="light oR m0" style="opacity: .65">&copy; Copyright {{ date('Y') }}, all rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Copyright Section -->

<!-- Scroll Back Top Button -->
<button onclick="topFunction()" id="myBtn" class="btn btn-gradient"><i class="visible-xs fa fa-arrow-up"></i><tag class="hidden-xs">Back To Top</tag></button>
<!-- Scroll Back Top Button -->


<!-- Popups Are Here -->
<popups>

    @stack('popups')

    <!-- About Us Popup -->
    {{-- <div id="pop-about" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h3 class="modal-title  gold-gradient-color oR m0">About Us</h3>
                </div>
                <div class="modal-body">
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- About Us Popup -->

    <!-- Think Popup -->
    {{-- <div id="pop-read-more1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h3 class="modal-title  gold-gradient-color oR m0">Think</h3>
                </div>
                <div class="modal-body">
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- Think Popup -->

    <!-- Create Popup -->
    {{-- <div id="pop-read-more2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h3 class="modal-title  gold-gradient-color oR m0">Create</h3>
                </div>
                <div class="modal-body">
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- Create Popup -->

    <!-- Sell Popup -->
    {{-- <div id="pop-read-more3" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h3 class="modal-title  gold-gradient-color oR m0">Sell</h3>
                </div>
                <div class="modal-body">
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- Sell Popup -->

    <!-- Earn Popup -->
    {{-- <div id="pop-read-more4" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h3 class="modal-title  gold-gradient-color oR m0">Earn</h3>
                </div>
                <div class="modal-body">
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p class="light oR">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- Earn Popup -->

</popups>
<!-- Popups Are Here -->



<!-- All Javascripts -->

<!-- Jquery -->
<script src="{{ asset('frontend') }}/components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="{{ asset('frontend') }}/assets/js/bootstrap.js"></script>

<!-- Nice Scroll -->
{{-- <script type="text/javascript" src="{{ asset('frontend') }}/assets/plugins/niceScroll/niceScroll.min.js"></script> --}}

<!-- Google Map -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script>
<script type="text/javascript" src="{{ asset('frontend') }}/assets/plugins/map/map.js"></script> --}}

<!-- Video Background -->
{{-- <script type="text/javascript" src="{{ asset('frontend') }}/assets/plugins/videoBg/jquery.vide.js"></script> --}}

<!-- Owl Carousel -->
{{-- <script type="text/javascript" src="{{ asset('frontend') }}/assets/plugins/owl/owl.carousel.js"></script> --}}

<!-- Number Counter -->
{{-- <script type="text/javascript" src="{{ asset('frontend') }}/assets/plugins/numScroll/numscroller-1.0.js"></script> --}}

<!-- Scroll Animations aos-master js -->
{{-- <script src="{{ asset('frontend') }}/assets/plugins/aos-master/aos.js"></script> --}}

<!-- Common -->
<script type="text/javascript" src="{{ asset('frontend') }}/assets/js/common.js"></script>

@stack('scripts')
<!-- All Javascripts -->
</body>

</html>
