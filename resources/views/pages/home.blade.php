@extends('template')

@section('site.title', 'Paradise Digital World')

@section('site.content')
            
    <!-- banner start -->
    <!-- ================ -->
    <div class="banner clearfix">

        @include('layout._slider')

    </div>
    <!-- banner end -->
        
    <div id="page-start"></div>
    @include('layout._choose')
    <section class="light-gray-bg pv-30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center">Our <strong>Services</strong></h2>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon default-bg circle"><i class="fa fa-wifi"></i></span>
                        <h3>Broadband Internet</h3>
                        <div class="separator clearfix"></div>
                        <p>We offer Fast Internet Broadband Services for all your online browsing, social media surfing and email.</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="150">
                        <span class="icon default-bg circle"><i class="fa fa-video-camera"></i></span>
                        <h3>CCTV Installation</h3>
                        <div class="separator clearfix"></div>
                        <p>We Offer CCTV Installation and maintenance, we use the best state of the art equipments and our technical hands are well trained</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-camera-retro"></i></span>
                        <h3>Photography</h3>
                        <div class="separator clearfix"></div>
                        <p>Come in for all your Photography needs, picture frames, portraits, graphic clean ups etc</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-film"></i></span>
                        <h3>Video Production</h3>
                        <div class="separator clearfix"></div>
                        <p>We offer Video Production at its best with professional tools and editing services.</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-credit-card"></i></span>
                        <h3>Remita Payments</h3>
                        <div class="separator clearfix"></div>
                        <p>For all forms of Federal Government payments our partnership with payment giants Remita makes the whole process a breeze.</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-asterisk"></i></span>
                        <h3>Solar Installations</h3>
                        <div class="separator clearfix"></div>
                        <p>Solar Installations for homes, offices, shops and company premises</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->


    @include('layout._stats')
    @include('layout._cta')


@stop

@section('site.scripts')
<script>
  (function () {
    $('#paradiseAlert').modal('show');
})();  
</script>

@stop
