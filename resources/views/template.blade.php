<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout._head')        
</head>
    <body class="no-trans front-page transparent-header ">

        <div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
        
        <!-- page wrapper start -->
        <!-- ================ -->
        <div class="page-wrapper">
        
            <!-- header-container start -->
            <div class="header-container">
                
                <!-- header-top start -->
                <!-- classes:  -->
                <!-- "dark": dark version of header top e.g. class="header-top dark" -->
                <!-- "colored": colored version of header top e.g. class="header-top colored" -->
                <!-- ================ -->
                @include('layout._header-dark')
                <!-- header-top end -->
                
                <!-- header start -->
                <!-- classes:  -->
                <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
                <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
                <!-- "full-width": mandatory class for the full-width menu layout -->
                <!-- "centered": mandatory class for the centered logo layout -->
                <!-- ================ --> 
                <header class="header  fixed   clearfix">
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- header-left start -->
                                <!-- ================ -->
                                <div class="header-left clearfix">

                                    <!-- logo -->
                                    <div id="logo" class="logo">
                                        <a href="{{ route('site.home') }}">
                                            <img width="85px"  id="logo_img" src="/assets/images/dlogo.png" alt="Paradise Logo"></a>
                                    </div>

                                    <!-- name-and-slogan -->
                                    <div class="site-slogan">
                                        Paradise Digital World
                                    </div>
                                    
                                </div>
                                <!-- header-left end -->
                            </div>
                            <div class="col-md-9">
                                <div class="header-right">
                                    @include('layout._nav')
                                </div>                    
                            </div>
                        </div>
                    </div>
                    
                </header>
                <!-- header end -->
            </div>
            <!-- header-container end -->
            @yield('site.content')

            @include('layout._footer')
        </div>
        @include('layout._modal')

        @include('layout._scripts')
<script>
@if(Session::has('errorMessage'))
    alert('{{ Session::get('errorMessage') }}')
@endif
(function () {
    $('#paradiseAlert').modal('show');
})();
    
</script>
    </body>
</html>
