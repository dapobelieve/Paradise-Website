<div id="user-nav">
    <ul class="btn-group">
        <li style="color: floralwhite">Hello {{Auth::user()->name}}</li>
        <li class="btn"><a title="" href="{{ route('site.logout') }}"><i class="fa fa-share"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>