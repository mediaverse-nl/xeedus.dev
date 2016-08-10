<div class="col-lg-2 sidebar">
    <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="list-group">
        <a href="{{route('author_home')}}" class="list-group-item {{ Request::is('author') ? 'active' : null }}">
            <i class="fa fa-comment-o"></i> Dashboard
        </a>
        <a href="{{route('author_video_index')}}" class="list-group-item {{ Request::is('author/video*') ? 'active' : null }}">
            <i class="fa fa-bar-chart-o"></i> Videobeheer
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-bar-chart-o"></i> Comments <span class="badge">14</span>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-bar-chart-o"></i> Revieuws <span class="badge">14</span>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-bar-chart-o"></i> Broadcast
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-bar-chart-o"></i> Profile
        </a>
    </div>
</div>