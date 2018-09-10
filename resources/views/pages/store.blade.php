@extends('template')

@section('site.title', 'Store | Paradise Digital World')

@section('site.content')
    <section class="main-container">

                <div class="container">
                    <div class="row">
                        <!-- main start -->
                        <!-- ================ -->
                        <div class="main col-md-12">

                            <h1 class="page-title text-center"><strong>Products</strong></h1>
                            <div class="separator"></div>
                            <br>
                            <!-- Tab panes -->
                            <div class="tab-content clear-style">
                                <div class="tab-pane active" id="pill-1">                       
                                    <div class="row masonry-grid-fitrows grid-space-10">
                                        <div class="col-md-3 col-sm-6 masonry-grid-item">
                                            <div class="listing-item white-bg bordered mb-20">
                                                <div class="overlay-container">
                                                    <img src="/assets/images/product-1.jpg" alt="">
                                                </div>
                                                <div class="body">
                                                    <h3><a href="#">Suscipit consequatur velit</a></h3>
                                                    <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</p>
                                                    <div class="elements-list clearfix">
                                                        <span class="price">
                                                            $70.00
                                                        </span>
                                                        <a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pills end -->
                            <!-- pagination start -->
                            <nav class="text-center">
                                <ul class="pagination">
                                    <li><a href="#" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>
                            <!-- pagination end -->
                        </div>
                        <!-- main end -->

                    </div>
                </div>
            </section>
    @include('layout._cta')
@stop