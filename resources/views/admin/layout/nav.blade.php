<div id="sidebar">
    {{-- <div id="search">
        <input type="text" placeholder="Search here..."/>
        <button type="submit" class="tip-right" title="Search">
            <i class="fa fa-search"></i>
        </button>
    </div> --}}  
    <ul>
        <li><a href="#">
            <i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <li class="submenu">
            <a href="#"><i class="fa fa-flask"></i> <span>Products</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{ route('store.index') }}">All Product</a></li>
                <li><a href="{{ route('store.add') }}">Add Product</a></li>
            </ul>
        </li>

        <li><a href="#">
            <i class="fa fa-home"></i> <span>Orders</span></a>
        </li>

        <li><a href="{{ route('solar.index') }}">
            <i class="fa fa-home"></i> <span>Solar Training</span></a>
        </li>

        {{-- <li><a href="tables.html"><i class="fa fa-th"></i> <span>Tables</span></a></li>
        <li><a href="grid.html"><i class="fa fa-th-list"></i> <span>Grid Layout</span></a></li> --}}
    </ul>
</div>