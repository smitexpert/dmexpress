<!-- NAVIGATION -->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header logoo">
            <button id="tog-btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home-section"><img style="width: 120px; height: auto;" class="img-responsive" src="{{ asset('frontend') }}/assets/images/logo.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                <li class="gold"><a href="javascript:;"><button class="  btn btn-gradient outline-button" style="margin-bottom: 0px;"><div style="background: #1C589B;transition: all 0.3s;">পার্সেল ট্র্যক করুন</div></button></a></li>
            </ul>
            <ul id="navigation" class="nav navbar-nav navbar-right">
                <li><a class="active" href="{{ route('home') }}#home-section">হোম</a></li>
                {{-- <li><a href="#about-section">আমাদের সম্পর্কে</a></li> --}}
                <li><a href="{{ route('home') }}#offers-section">জিজ্ঞাসা</a></li>
                <li><a href="{{ route('home') }}#pricing-table">ডেলিভরী চার্জ</a></li>
                <li><a href="{{ route('home') }}#contact-section">যোগাযোগ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right visible-xs visible-sm">
                <li class="gold" style="border-top: 1px solid rgba(255,255,255,0.1)"><a href="">পার্সেল ট্র্যক করুন</a></li>
            </ul>
        </div>

    </div>
</nav>
<!-- NAVIGATION -->