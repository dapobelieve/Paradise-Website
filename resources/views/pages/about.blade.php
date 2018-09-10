@extends('template')

@section('site.title', 'About Us | Paradise Digital World')

@section('site.content')

    <div class="banner dark-translucent-bg" style="background-image:url('/assets/images/page-about-banner-1.jpg'); background-position: 50% 27%;">
                <!-- breadcrumb start -->
                <!-- ================ -->
                <div class="breadcrumb-container">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home pr-10"></i><a class="link-dark" href="index.html">Home</a></li>
                            <li class="active">Page About</li>
                        </ol>
                    </div>
                </div>
                <!-- breadcrumb end -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 text-center col-md-offset-2 pv-20">
                            <h3 class="title logo-font object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">The <span class="text-default">Project</span> Inc.</h3>
                            <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
                            <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi perferendis magnam ea necessitatibus, officiis voluptas odit! Aperiam omnis, cupiditate laudantium velit nostrum, exercitationem accusamus, possimus soluta illo deserunt tempora qui.</p>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus illo vero cupiditate, sed enim voluptatibus provident consectetur. Quo dolor sunt nostrum, eligendi illo accusamus odit, ipsam excepturi voluptatem nulla minus.</p>
                            <p>Blanditiis aspernatur, non quasi, maxime corporis officiis quia. Cupiditate, voluptatibus ducimus, natus, labore mollitia dolorem incidunt voluptatum, delectus eius fugit porro placeat animi voluptatem autem hic eligendi sint. Amet pariatur odit repudiandae sunt. Rem ipsum dolor sit amet, consectetur adipisicing elit. Sunt asperiores a.</p>
                            <ul class="list-icons">
                                <li><i class="icon-check-1"></i> We are here to support you</li>
                                <li><i class="icon-check-1"></i> Free updates</li>
                                <li><i class="icon-check-1"></i> Unlimited options and variations</li>
                                <li><i class="icon-check-1"></i> ipsam asperiores fugiat quo</li>
                            </ul>
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

        <!-- section start -->
        <!-- ================ -->
        <div class="light-gray-bg pv-20 section mt-20">
            <div class="container">
                <h4 class="mb-20">Our <strong>Team</strong></h4>
                <div class="row grid-space-10">
                    <div class="col-sm-6 col-md-3">
                        <div class="image-box team-member style-2 shadow bordered mb-20 text-center">
                            <div class="overlay-container overlay-visible">
                                <img src="/assets/images/team-member-1.jpg" alt="">
                                <div class="overlay-bottom">
                                    <p class="small margin-clear">Lorem ipsum dolor sit amet, consectetur adipisicing elit!</p>
                                </div>
                            </div>
                            <div class="body">
                                <h3 class="margin-clear">Jane Doe</h3>
                                <small>CEO</small>
                                <div class="separator mt-10"></div>
                                <ul class="social-links circle colored margin-clear">
                                    <li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="xing"><a target="_blank" href="https://www.xing.com/"><i class="fa fa-xing"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="image-box team-member style-2 shadow bordered mb-20 text-center">
                            <div class="overlay-container overlay-visible">
                                <img src="/assets/images/team-member-2.jpg" alt="">
                                <div class="overlay-bottom">
                                    <p class="small margin-clear">Ipsum dolor sit amet, consectetur adipisicing elit!</p>
                                </div>
                            </div>
                            <div class="body">
                                <h3 class="margin-clear">John Doe</h3>
                                <small>CTO</small>
                                <div class="separator mt-10"></div>
                                <ul class="social-links circle colored margin-clear">
                                    <li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="xing"><a target="_blank" href="https://www.xing.com/"><i class="fa fa-xing"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="image-box team-member style-2 shadow bordered mb-20 text-center">
                            <div class="overlay-container overlay-visible">
                                <img src="/assets/images/team-member-3.jpg" alt="">
                                <div class="overlay-bottom">
                                    <p class="small margin-clear">Dolor sit amet, praesentium consectetur adipisicing elit!</p>
                                </div>
                            </div>
                            <div class="body">
                                <h3 class="margin-clear">Anne Doe</h3>
                                <small>Project Manager</small>
                                <div class="separator mt-10"></div>
                                <ul class="social-links circle colored margin-clear">
                                    <li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="xing"><a target="_blank" href="https://www.xing.com/"><i class="fa fa-xing"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="image-box team-member style-2 shadow bordered mb-20 text-center">
                            <div class="overlay-container overlay-visible">
                                <img src="/assets/images/team-member-4.jpg" alt="">
                                <div class="overlay-bottom">
                                    <p class="small margin-clear">Voluptates praesentium nulla cupiditate explicabo!</p>
                                </div>
                            </div>
                            <div class="body">
                                <h3 class="margin-clear">Maria Doe</h3>
                                <small>Designer</small>
                                <div class="separator mt-10"></div>
                                <ul class="social-links circle colored margin-clear">
                                    <li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="xing"><a target="_blank" href="https://www.xing.com/"><i class="fa fa-xing"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </section>
    
    @include('layout._cta')

@stop