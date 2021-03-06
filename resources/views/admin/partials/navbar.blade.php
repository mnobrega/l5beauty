<ul class="nav navbar-nav">
    <li><a href="/">Blog Home</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/post*')) class="active" @endif>
            <a href="/admin/post">Posts</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="active" @endif>
            <a href="/admin/tag">Tags</a>
        </li>
        <li @if (Request::is('admin/upload*')) class="active" @endif>
            <a href="/admin/upload">File Storage</a>
        </li>
        <li @if (Request::is('admin/jointjs')) class="active" @endif>
            <a href="/admin/jointjs">JointJS</a>
        </li>
        <li @if (Request::is('admin/googlemaps')) class="active" @endif>
            <a href="/admin/googlemaps">GoogleMaps</a>
        </li>
        <li @if (Request::is('admin/trello')) class="active" @endif>
            <a href="/admin/trello">Trello</a>
        </li>
        <li @if (Request::is('admin/mail')) class="active" @endif>
            <a href="/admin/mail">E-mail</a>
        </li>
        <li @if (Request::is('admin/rt')) class="active" @endif>
            <a href="/admin/rt">RT</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/auth/login">Login</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
        </li>
    @endif
</ul>