<div class="main-navigation   animated with-dropdown-buttons">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid pull-right">
            <!-- Toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse  navbar-collapse" id="navbar-collapse-1">
                <!-- main-menu -->
                <ul class="nav navbar-nav ">
                    <li class="active">
                        <a href="{{ route('site.home') }}">Home</a>
                    </li>
                    <li>
                        {{--<a href="{{ route('site.services') }}">Services</a>--}}
                    </li>
                    <li>
                        <a href="{{ route('site.store') }}">Store</a>
                    </li>
                    <li>
                        {{-- <a href="{{ route('site.post-jamb') }}">Post UTME </a> --}}
                    </li>
                    <li>
                        {{-- <a href="{{ url('/programs#/funaab-registrations') }}">Funaab Registrations</a> --}}
                    </li>
                    <li>
                        <a href="{{ route('site.about') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('site.contact') }}">Contact Us</a>
                    </li>
                </ul>
                <!-- main-menu end -->
                
                <!-- header dropdown buttons -->
                <div class="header-dropdown-buttons hidden-xs ">
                </div>
                <!-- header dropdown buttons end-->
            </div>
        </div>
    </nav>
</div>