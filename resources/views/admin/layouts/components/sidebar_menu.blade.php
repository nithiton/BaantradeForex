<!-- Sidebar user panel (optional) -->
{{--<div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
    {{--<div class="image">--}}
        {{--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
    {{--</div>--}}
    {{--<div class="info">--}}
        {{--<a href="#" class="d-block">Alexander Pierce</a>--}}
    {{--</div>--}}
{{--</div>--}}
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-columns"></i>
                <p>News</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.activities.index') }}" class="nav-link {{ request()->is('admin/activities*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-people-carry"></i>
                <p>Activities</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is('admin/posts*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-edit"></i>
                <p>Posts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.ads.index') }}" class="nav-link {{ request()->is('admin/ads*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-ad"></i>
                <p>Ads</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.theaters.index') }}" class="nav-link {{ request()->is('admin/theaters*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tv"></i>
                <p>Theaters</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.lessons.index') }}" class="nav-link {{ request()->is('admin/lessons*') ? 'active' : '' }}">
                <i class="nav-icon fab fa-leanpub"></i>
                <p>Lessons</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->

