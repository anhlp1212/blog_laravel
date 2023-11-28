<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                @if (Route::has('dashboard'))
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }} "
                        href="{{ route('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                @endif
            </li>
            @if (auth()->guard('admin')->user()->hasRole('admin'))
                <li class="nav-item">
                    @if (Route::has('user.users'))
                        <a class="nav-link text-white {{ request()->routeIs('user.*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('user.users') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">Users</span>
                        </a>
                    @endif
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            @if (Route::has('user.users'))
                                <a href="{{ route('user.users') }}" class="nav-link">All users</a>
                            @endif
                        </li>

                        <li class="nav-item">
                            @if (Route::has('user.add_user_page'))
                                <a href="{{ route('user.add_user_page') }}" class="nav-link">New Users</a>
                            @endif
                        </li>
                    </ul>
                </li>
            @endif
            <li class="nav-item">
                @if (Route::has('post.posts'))
                    <a class="nav-link text-white {{ request()->routeIs('post.*') ? 'active bg-gradient-primary' : '' }} "
                        href="{{ route('post.posts') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Posts</span>
                    </a>
                @endif
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        @if (Route::has('post.posts'))
                            <a class="nav-link" href="{{ route('post.posts') }}">All posts</a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if (Route::has('post.add_post_page'))
                            <a class="nav-link" href="{{ route('post.add_post_page') }}">New post</a>
                        @endif
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../pages/notifications.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../pages/sign-in.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Log out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
