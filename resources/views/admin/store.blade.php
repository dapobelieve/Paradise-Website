@extends('admin.layout.template')


@section('admin-content')

<div id="content">
    <div id="content-header" class="mini">
        <h1>Dashboard</h1>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
        <a href="#" class="current">All Items in Store</a>
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
                        <div class="table-responsive widget-content nopadding">
                            <table class="data-table table table-bordered table-striped table-hover with-check"> 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</div>


@stop