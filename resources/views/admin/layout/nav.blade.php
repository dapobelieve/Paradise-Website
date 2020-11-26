<div id="sidebar">
    {{-- <div id="search">
        <input type="text" placeholder="Search here..."/>
        <button type="submit" class="tip-right" title="Search">
            <i class="fa fa-search"></i>
        </button>
    </div> --}}

        <ul>
            <li><a href="{{ url('dashboard#/stats') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            @if(Auth::user()->hasRole(['admin']))
                <li class="submenu">
                    <a href="#"><i class="fa fa-home"></i> <span>Properties</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li><a href="{{ url('dashboard#/list-property') }}">Properties</a></li>
                        <li><a href="{{ url('dashboard#/create-property') }}">Add Property</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-gears"></i> <span>Services</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li><a href="{{ url('dashboard#/list-service') }}">Services</a></li>
                        <li><a href="{{ url('dashboard#/create-service') }}">Add Services</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Workers</span><i class="arrow fa fa-chevron-right"></i>
                    </a>
                    <ul>
                        <li><a href="{{ route('add.user') }}">All Users</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span>Products</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li><a href="{{ route('store.index') }}">All Product</a></li>
{{--                        <li><a href="{{ route('store.add') }}">Add Product</a></li>--}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-file"></i> <span>Files</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li><a href="{{ route('all-files') }}">All Files</a></li>
                        <li><a href="{{ route('add-file') }}">Add New File</a></li>
                    </ul>
                </li>
                <li><a href="#">
                    <i class="fa fa-home"></i> <span>Orders</span></a>
                </li>
            @elseif(Auth::user()->hasRole(['admin', 'agent']))
                <li>
                    <a href="{{ route('agent.transact') }}">
                        <i class="fa fa-laptop"></i> <span>Transact</span>
                    </a>
                </li>
            @elseif(Auth::user()->hasRole(['admin', 'cashier']))
{{--                <li>--}}
{{--                    <a href="">--}}
{{--                        <i class="fa fa-home"></i> <span>Modify</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            @endif
            <li>
                <a href="{{ route('site.home') }}" target="_blank">
                    <i class="fa fa-globe"></i> <span>Website</span>
                </a>
            </li>
        </ul>

</div>