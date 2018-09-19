<footer id="footer" class="clearfix ">
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="logo-footer"><img id="logo-footer" src="/assets/images/logo_light_blue.png" alt=""></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus illo vel dolorum soluta consectetur doloribus sit. Delectus non tenetur odit dicta vitae debitis suscipit doloribus. Lorem ipsum dolor sit amet, illo vel dolorum soluta consectetur adipisicing... <a href="{{ route('site.about') }}">Learn More<i class="fa fa-long-arrow-right pl-5"></i></a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-content">
                            <h2 class="title">Useful Links</h2>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{ route('site.store') }}">Store</a></li>
                                    <li><a href="{{ route('site.contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-content">
                            <h2 class="title">Popular Tags</h2>
                            <div class="separator-2"></div>
                            <div class="tags-cloud">
                                <div class="tag">
                                    <a href="#">energy</a>
                                </div>
                                <div class="tag">
                                    <a href="#">business</a>
                                </div>
                                <div class="tag">
                                    <a href="#">food</a>
                                </div>
                                <div class="tag">
                                    <a href="#">fashion</a>
                                </div>
                                <div class="tag">
                                    <a href="#">finance</a>
                                </div>
                                <div class="tag">
                                    <a href="#">culture</a>
                                </div>
                                </div>
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