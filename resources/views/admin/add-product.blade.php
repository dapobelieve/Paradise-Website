@extends('admin.layout.template')


@section('admin-content')

<div id="content">
    <div id="content-header" class="mini">
        <h1>Dashboard</h1>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
        <a href="#" class="current">Dashboard</a>
    </div>
    <div class="container-fluid">
        {{-- @include('admin.layout.stats') --}}
        <br />

        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    <div class="alert alert-info">
                        <strong>*</strong>
                        {{Session::get('message')}}
                        <a href="#" data-dismiss="alert" class="close">×</a>
                    </div>
                @endif
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('store.add') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Product Name: </label>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <input type="text" name="title" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Product Price: </label>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <input type="text" name="price" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Product Image: </label>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <input type="file" name="pimage" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Product Details: </label>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <textarea name="desc" class="form-control" name="" id="" cols="30" rows="8"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 col-lg-2 control-label"> </label>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
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
</div>


@stop