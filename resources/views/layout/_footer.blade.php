<footer id="footer" class="clearfix ">
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-content">
                            <div class="logo-footer"><img id="logo-footer" src="/assets/images/logo_light_blue.png" alt=""></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Accusantium animi architecto
                                nostrum ut vel voluptate.
                                <a href="{{ route('site.about') }}">
                                    Learn More
                                    <i class="fa fa-long-arrow-right pl-5"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2 class="title">Useful Links</h2>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{ route('site.store') }}">Store</a></li>
                                    <li><a href="{{ route('site.store') }}">Solar</a></li>
                                    <li><a href="{{ route('site.contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2 class="title">Contact Us</h2>
                            <div class="separator-2"></div>
                            <p>Head Office: Shop 7 & 8 <br>
                                SSANUU Complex, Funaab. <br>
                                Tel: 08039109394, 08150769033 <br>
                            </p>
                            </div>
                        </div>
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2 class="title">We are Social</h2>
                            <div class="separator-2"></div>
                            <ul class="social-links circle animated-effect-1">
                                <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="subfooter-inner">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">{{ config()->get('site.defaults.name') }} © {{ date('Y') }} Built by
                            <a target="_blank" class="link-dark" href="#">Dapo Michaels</a>. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>