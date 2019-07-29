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
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon default-bg circle"><i class="fa fa-wifi"></i></span>
                        <h3>Broadband Internet</h3>
                        <div class="separator clearfix"></div>
                        <p>Voluptatem ad provident non repudiandae beatae cupiditate amet reiciendis lorem ipsum dolor sit amet, consectetur.</p>
                        <a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="150">
                        <span class="icon default-bg circle"><i class="fa fa-video-camera"></i></span>
                        <h3>CCTV Installation</h3>
                        <div class="separator clearfix"></div>
                        <p>Iure sequi unde hic. Sapiente quaerat sequi inventore veritatis cumque lorem ipsum dolor sit amet, consectetur.</p>
                        <a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-camera-retro"></i></span>
                        <h3>Photography</h3>
                        <div class="separator clearfix"></div>
                        <p>Inventore dolores aut laboriosam cum consequuntur delectus sequi lorem ipsum dolor sit amet, consectetur.</p>
                        <a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-film"></i></span>
                        <h3>Video Production</h3>
                        <div class="separator clearfix"></div>
                        <p>Inventore dolores aut laboriosam cum consequuntur delectus sequi lorem ipsum dolor sit amet, consectetur.</p>
                        <a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-credit-card"></i></span>
                        <h3>Remita Payments</h3>
                        <div class="separator clearfix"></div>
                        <p>Inventore dolores aut laboriosam cum consequuntur delectus sequi lorem ipsum dolor sit amet, consectetur.</p>
                        <a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <span class="icon default-bg circle"><i class="fa fa-asterisk"></i></span>
                        <h3>Solar Installations</h3>
                        <div class="separator clearfix"></div>
                        <p>Inventore dolores aut laboriosam cum consequuntur delectus sequi lorem ipsum dolor sit amet, consectetur.</p>
                        <a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
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
