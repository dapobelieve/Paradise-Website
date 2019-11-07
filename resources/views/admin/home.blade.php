@extends('admin.layout.template')


@section('admin-content')

<div id="content">
    <div id="content-header" class="mini">
        <h1>Dashboard</h1>
    </div>
    @if(Auth::user()->hasRole(['agent']))
        @include('admin.pages.agent')
    @elseif(Auth::user()->hasRole(['cashier']))
        @include('admin.pages.cashier')
    @else
        @include('admin.pages.admin')
    @endif

</div>

@stop