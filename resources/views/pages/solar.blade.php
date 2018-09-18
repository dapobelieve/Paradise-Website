@extends('template')

@section('site.title', 'Solar Training Registration | Paradise Digital World')

@section('site.content')
    <div class="main-container dark-translucent-bg" style="background-image:url('/assets/images/background-img-6.jpg');">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="form-block center-block p-30 light-gray-bg border-clear">
                        <h2 style="color: #000" class="center-block">Solar Training Registration</h2>
                        <form class="form-horizontal" role="form">
                            <div class="form-group has-feedback">
                                <label for="inputName" class="col-sm-3 control-label">Full Name <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputName" placeholder="Fisrt Name" required>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputLastName" class="col-sm-3 control-label">Phone Number <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputLastName" placeholder="Phone Number" required>
                                    <i class="fa fa-phone form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Contact Address <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <textarea cols="" rows="5" class="form-control" ></textarea>
                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" required> Accept our <a href="#">privacy policy</a> and <a href="#">customer agreement</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button type="submit" class="btn btn-group btn-default btn-animated">Sign Up <i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </div>
@stop