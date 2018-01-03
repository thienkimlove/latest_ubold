<div class="navbar-custom">
    <?php
        $currentUser = Sentinel::getUser();
    ?>
    <div class="container">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{url('admin')}}"><i class="md md-dashboard"></i>Trang chủ</a>
                </li>


                <li class="has-submenu">
                    <a href="{{url('/posts')}}"><i class="md md-edit"></i>Posts</a>
                </li>

                <li class="has-submenu">
                    <a href="{{url('/questions')}}"><i class="md md-done"></i>Questions</a>
                </li>

                <li class="has-submenu">
                    <a href="{{url('/videos')}}"><i class="md md-class"></i>Videos</a>
                </li>

                <li class="has-submenu">
                    <a href="{{url('/products')}}"><i class="md md-pages"></i>Products</a>
                </li>

                @if ($currentUser->isAdmin())

                    <li class="has-submenu">
                        <a href="#"><i class="md md-folder"></i>Site Settings</a>
                        <ul class="submenu">
                            <li><a href="{{ url('/positions')}}">Positions</a></li>
                            <li><a href="{{ url('/banners')}}">Banners</a></li>
                            <li><a href="{{ url('/categories')}}">Categories</a></li>
                            <li><a href="{{ url('/tags')}}">Tags</a></li>
                        </ul>
                    </li>


                    <li class="has-submenu">
                        <a href="#"><i class="md md-settings"></i>Other</a>
                        <ul class="submenu">
                            <li><a href="{{ url('/users')}}">User</a></li>
                            <li><a href="{{ url('/roles') }}">Role</a></li>
                            <li><a href="{{ url('/permissions') }}">Permission</a></li>
                        </ul>
                    </li>

                @endif
            </ul>
            <!-- End navigation menu        -->
        </div>
    </div> <!-- end container -->
</div> <!-- end navbar-custom -->
