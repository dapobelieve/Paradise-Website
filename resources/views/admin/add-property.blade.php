@extends('admin.layout.template')


@section('admin-content')

    <div id="content">
        <div id="content-header" class="mini">
            <h1>Dashboard</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current">Dashboard</a>
            <a href="#" class="current">Add Property</a>
        </div>
        <div class="container-fluid">
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
                    <div class="widget-box" id="store">
                        <div class="widget-content">
                            <add-property></add-property>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop