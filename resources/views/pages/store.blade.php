@extends('template')

@section('site.title', 'Store | Paradise Digital World')

@section('site.content')
{{-- set user data if user is logged in --}}
        <script>
            @if(Auth::check())
                localStorage.setItem('paraUser', '{!! Auth::user() !!}')
            @endif
        </script>
    <div id="store" class="store">
        
        <main-app></main-app>
    </div>
    @include('layout._cta')
@stop