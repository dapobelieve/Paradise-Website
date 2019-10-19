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
                <div class="widget-box">
                    <div id="store" class="widget-content">
                        <transact></transact>                        
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</div>


@stop