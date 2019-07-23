@extends('template')

@section('site.title', 'About Us | Paradise Digital World')

@section('site.content')

    <div class="banner dark-translucent-bg" style="background-image:url('/assets/images/page-about-banner-1.jpg'); background-position: 50% 27%;">
                <!-- breadcrumb start -->
                <!-- ================ -->
                <div class="breadcrumb-container">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home pr-10"></i><a class="link-dark" href="{{route('home')}}">Home</a></li>
                            <li class="active"> About</li>
                        </ol>
                    </div>
                </div>
                <!-- breadcrumb end -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 text-center col-md-offset-2 pv-20">
                            <h3 class="title logo-font object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
                                Paradise Digital World</h3>
                            <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
                        </div>
                    </div>
                </div>
    </div>
    
    <section class="main-container padding-bottom-clear">

        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-12">
                    <h3 class="title">Who <strong>We Are</strong></h3>
                    <div class="separator-2"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Our mission from the very first day has been to cultivate professional relationships with our clients to provide effective and reliable information technology solutions for their needs. The team at {{ config('site.defaults.name') }} is equipped with a highly developed skillset developed over years of experience not only in information technology but also in business processes across a range of industry sectors. This business experience makes us uniquely positioned to offer solutions promising greater operational efficiency, productivity gains and cost savings for each of our clients, regardless of their industry.</p>
                            <p>

                                As an established technology-intensive company, we pride ourselves on providing a comprehensive suite of solutions comprising of infrastructure consultancy, on/offsite services, enterprise architecture consulting. Our team consistently delivers state-of-the-art solutions in various areas including, but not limited to, integrated business solutions, system applications, product development, Internet/Intranet applications and communication & network management services.

                                At {{ config('site.defaults.name') }}, we guarantee rapid, reliable and robust information technology solutions that work.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="owl-carousel content-slider-with-controls">
                                <div class="overlay-container overlay-visible">
                                    <img src="/assets/images/page-about-1.jpg" alt="">
                                    <div class="overlay-bottom hidden-xs">
                                        <div class="text">
                                            <h3 class="title">We Can Do It</h3>
                                        </div>
                                    </div>
                                    <a href="/assets/images/page-about-1.jpg" class="popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
                                </div>
                                <div class="overlay-container overlay-visible">
                                    <img src="/assets/images/page-about-2.jpg" alt="">
                                    <div class="overlay-bottom hidden-xs">
                                        <div class="text">
                                            <h3 class="title">You Can Trust Us</h3>
                                        </div>
                                    </div>
                                    <a href="/assets/images/page-about-2.jpg" class="popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
                                </div>
                                <div class="overlay-container overlay-visible">
                                    <img src="/assets/images/page-about-3.jpg" alt="">
                                    <div class="overlay-bottom hidden-xs">
                                        <div class="text">
                                            <h3 class="title">We Love What We Do</h3>
                                        </div>
                                    </div>
                                    <a href="/assets/images/page-about-3.jpg" class="popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
    
    @include('layout._cta')

@stop