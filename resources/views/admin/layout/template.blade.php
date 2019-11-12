<!DOCTYPE html>
<html lang="en">


@include('admin.layout.head')   

    <body data-color="grey" class="flat">
        <div id="wrapper">
            <div id="header">
                <h1><a href="#">Paradise Admin</a></h1>
                <a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>    
            </div>
        
             @include('admin.layout.topnav')

            @include('admin.layout.nav')

            @yield('admin-content')
            

            @include('admin.layout.footer')
        </div>
        <script>
            @if(Auth::check())
                localStorage.setItem('paraUser', '{!! Auth::user()->id !!}');
            @endif
        </script>

            @include('admin.layout.scripts')
    </body>


</html>
