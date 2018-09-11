@extends('template')

@section('site.title', 'Store | Paradise Digital World')

@section('site.content')
    <div id="store" class="store">
        <main-app></main-app>
    </div>
    @include('layout._cta')
@stop