@extends('template')

@section('site.title', 'POST UTME | Paradise Digital World')

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
            <div id="store" class="row">
                <jamb></jamb>
            </div>
        </div>
    </section>
    
    @include('layout._cta')

@stop