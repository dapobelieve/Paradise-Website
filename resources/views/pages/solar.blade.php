@extends('template')

@section('site.title', 'Solar Training Registration | Paradise Digital World')

@section('site.content')
    <div class="main-container dark-translucent-bg" style="background-image:url('/assets/paradise/solar-img.jpg');">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="form-block center-block p-30 light-gray-bg border-clear">
                        <h2 style="color: #000" class="center-block">Solar Training Registration</h2>
                        <form class="form-horizontal" method="post" action="{{ route('solar.register') }}" role="form">
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
                                <label for="inputLastName" class="col-sm-3 control-label">Phone Number <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ Request::old('phone') ?: '' }}" name="phone" class="form-control" id="inputLastName" placeholder="Phone Number" >
                                    <i class="fa fa-phone form-control-feedback"></i>
                                    @if($errors->has('phone'))
                                        <span class="has-error">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Status <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <select name="status" class="form-control" id="status">
                                        <option selected="" value="{{ Request::old('status') ?: '' }}">---Select---</option>
                                        <option value="student">Student</option>
                                        <option value="student">Not Student</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <span class="has-error">
                                            {{ $errors->first('status') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Contact Address <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <textarea name="address" rows="5" class="form-control" >
                                        {{ Request::old('address') ?: '' }}
                                    </textarea>
                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                    @if($errors->has('address'))
                                        <span class="has-error">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" > Accept our <a href="#">privacy policy</a> and <a href="#">customer agreement</a>
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
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