<div class="header-top dark ">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-6 col-md-9">
            </div>
            <div class="col-xs-9 col-sm-6 col-md-3">

                <!-- header-top-second start -->
                <!-- ================ -->
                <div id="header-top-second"  class="clearfix">
                    <!-- header top dropdowns start -->
                    <!-- ================ -->
                    <div class="header-top-dropdown text-right">
                        @if (Auth::check())
                        <div class="btn-group">
                            <a href="#" class=" btn-sm">
                                <i class=" pr-10"></i>Hello, {{ Auth::user()->name }}
                            </a>
                        </div>
                        @if(Auth::user()->hasRole(['admin', 'agent', 'cashier']))
                            <div class="btn-group">
                                <a href="{{route('dashboard')}}" class=" btn-sm">
                                    <i class=" pr-10"></i>Dashboard
                                </a>
                            </div>
                            @endif
                        <div class="btn-group">
                            <a href="{{ route('site.logout') }}">Logout</a>
                        </div>
                        @else
                        <div class="btn-group">
                            <a href="{{ route('site.register') }}" class="btn btn-default btn-sm"><i class="fa fa-user pr-10"></i> Register</a>
                        </div>
                        <div class="btn-group dropdown">
                            <button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown"><i class="fa fa-lock pr-10"></i> Login</button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                <li>
                                    <form method="post" action="{{ route('site.login') }}" class="login-form margin-clear">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="">
                                            <i class="fa fa-user form-control-feedback"></i>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="">
                                            <i class="fa fa-lock form-control-feedback"></i>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Log In</button>
                                        {{-- <span class="pl-5 pr-5">or</span> --}}
                                        {{-- <ul>
                                            <li><a href="#">Forgot your password?</a></li>
                                        </ul> --}}
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <!--  header top dropdowns end -->
                </div>
                <!-- header-top-second end -->
            </div>
        </div>
    </div>
</div>