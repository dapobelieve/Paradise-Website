@extends('template')

@section('site.title', 'Register | Paradise Digital World')

@section('site.content')
    <div class="main-container dark-translucent-bg" style="background-image:url('/assets/images/background-img-7.jpg');">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="form-block center-block p-30 light-gray-bg border-clear">
                        <h2 style="color: #000" class="center-block">Register</h2>
                        <form class="form-horizontal" method="post" action="{{ route('site.register') }}" role="form">
                            <div class="form-group has-feedback">
                                <label for="inputName" class="col-sm-3 control-label">Full Name <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="fname" class="form-control" id="inputName" placeholder="Fisrt Name" value="{{ Request::old('fname') ?: '' }}" >
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                    @if($errors->has('fname'))
                                        <span class="has-error">
                                            {{ $errors->first('fname') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" value="{{ Request::old('email') ?: '' }}" class="form-control" id="inputEmail" placeholder="Email" >
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                    @if($errors->has('email'))
                                        <span class="has-error">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputLastName" class="col-sm-3 control-label">Password <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" placeholder="Enter a minimum of 6 character password" >
                                    <i class="fa fa-lock form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button type="submit" class="btn btn-group btn-default btn-animated">Register <i class="fa fa-check"></i></button>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </div>
@stop