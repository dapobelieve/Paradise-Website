@extends('template')

@section('site.title', ' | Paradise Digital World')

@section('site.content')

    <section class="main-container">
        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-8">
                    <h1 class="page-title">{{$service->name}}</h1>
                    <article class="blogpost full">
                        <header>
                            <div class="post-info">
                                <span class="submitted"><i class="icon-user-1"></i> by <a href="#">Paradise Admin</a></span>
                            </div>
                        </header>
                        <div class="blogpost-content">
                            <div id="carousel-blog-post" class="carousel slide mb-20" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @foreach($service->images as $image)
                                        <li data-target="#carousel-blog-post" data-slide-to="{{$loop->index}}" class="@if($loop->index == 0) active @endif"></li>
                                    @endforeach
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    @foreach($service->images as $image)
                                        <div class="item @if($loop->index + 1 == 1) active @endif">
                                            {{--                                        <div class="overlay-container">--}}
                                            <img style="object-fit: cover; height: 100%; width: 100%" src="{{ json_decode($image->url, true)['secure_url'] }}" alt="">
                                            {{--                                        </div>--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
{{--                            <h4>Price:  &#8358;{{  number_format($property->price) }}</h4>--}}
                            <p>{{$service->body}}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

@stop