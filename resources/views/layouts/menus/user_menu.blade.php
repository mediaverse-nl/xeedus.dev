<div class="col-sm-4 col-md-3 sidebar">
    <div class="list-group">
        <a href="{{URL::route('profile_show')}}" class="list-group-item {{ Request::is( str_replace('http://localhost:8000/', '', URL::route('profile_show'))) ? ' active' : NULL}}">
            <i class=" glyphicon glyphicon-user"></i> Profile
        </a>
        <a href="{{URL::route('profile_courses_index')}}" class="list-group-item {{ Request::is( str_replace('http://localhost:8000/', '', URL::route('profile_courses_index'))) ? ' active' : NULL }}">
            <i class="glyphicon glyphicon-film"></i> My Courses
        </a>
        <a href="{{URL::route('orders_show')}}" class="list-group-item {{ Request::is( str_replace('http://localhost:8000/', '', URL::route('orders_show'))) ? ' active' : NULL }}">
            <i class="glyphicon glyphicon-shopping-cart"></i> My Orders
        </a>
        {{--<a href="{{URL::route('review_show')}}" class="list-group-item {{ Request::is( str_replace('http://localhost:8000/', '', URL::route('review_show'))) ? ' active' : NULL }}">--}}
            {{--<i class="glyphicon glyphicon-shopping-cart"></i> My Reviews--}}
        {{--</a>--}}
    </div>
</div>