@extends('template')

@section('site.title', 'Properties | Paradise Digital World')

@section('site.content')

<section class="main-container">

    <div class="container">
        <div class="row">
            <div class="main col-md-12">
                <div class="tab-content clear-style">
                    <div class="tab-pane active" id="pill-1">
                        <div class="row masonry-grid-fitrows grid-space-10">
                            @foreach($properties as $property)
                            <div class="col-md-4 masonry-grid-item">
                                <div class="listing-item white-bg bordered mb-20">
                                    <div class="overlay-container">
                                        <img style="object-fit: cover" src="{{ json_decode($property->images[0]->url, true)['secure_url'] }}" alt="">
                                    </div>
                                    <div class="body">
                                        <h3><a href="{{ $property->link()  }}">{{$property->title}}</a></h3>
                                        <p class="small">
                                            {{ str_limit($property->details, 50) }}
                                        </p>
                                        <div class="elements-list clearfix">
                                            <span class="price"> &#8358;{{number_format($property->price)}}</span>
                                            <a href="{{ $property->link()  }}" class="pull-right margin-clear">
                                                More Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop