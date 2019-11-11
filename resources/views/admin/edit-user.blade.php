@extends('admin.layout.template')
@section('admin-content')
    <div id="content">
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current"></a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div style="display: flex;  align-items: center" class="widget-title">
                            <h5>Send</h5>
                        </div>
                        <div class="widget-content">
                        <span>
                            @foreach($errors->all() as $error)
                                <strong style="color: red">*{{ $error }}</strong> <br>
                            @endforeach
                            @if(Session::has('error'))
                                <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                            @endif
                        </span>
                            <div class="row">
                                @if(Session::has('success'))
                                    <strong style="color: green">* {{ Session::get('success') }}</strong>
                                @endif
                                <form method="post" action="{{ route('wallet.send') }}" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="wallet" class="col-sm-3 col-md-3 col-lg-2 control-label">Address</label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <input id="wallet" value="" type="text" name="address" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="wallet" class="col-sm-3 col-md-3 col-lg-2 control-label">Amount </label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <input value="" id="amount" name="amount" placeholder="Amount" type="text" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <input type="text" value="" name="fromWallet" hidden>
                                    <div class="form-group">
                                        <label for="wallet" class="col-sm-3 col-md-3 col-lg-2 control-label">Notes</label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <textarea name="" id="" cols="61" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
