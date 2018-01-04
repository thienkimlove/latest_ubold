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

                    <a href="#"><i class="md md-edit"></i>Contents</a>
                    <ul class="submenu">
                        <li><a href="{{ url('/posts')}}">Posts</a></li>
                        <li><a href="{{ url('/questions')}}">Questions</a></li>
                        <li><a href="{{ url('/videos')}}">Videos</a></li>
                        <li><a href="{{ url('/products')}}">Products</a></li>
                    </ul>
                </li>


                <li class="has-submenu">

                    <a href="#"><i class="md md-layers"></i>Stores</a>
                    <ul class="submenu">
                        <li><a href="{{ url('/stores')}}">Stores</a></li>
                        <li><a href="{{ url('/orders')}}">Orders</a></li>
                        <li><a href="{{ url('/contacts')}}">Contacts</a></li>

                    </ul>
                </li>

                @if ($currentUser->isAdmin())

                    <li class="has-submenu">
                        <a href="#"><i class="md md-folder"></i>Site Settings</a>
                        <ul class="submenu">
                            <li><a href="{{ url('/positions')}}">Positions</a></li>
                            <li><a href="{{ url('/banners')}}">Banners</a></li>
                            <li><a href="{{ url('/categories')}}">Categories</a></li>
                            <li><a href="{{ url('/tags')}}">Tags</a></li>
                            <li><a href="{{ url('/settings')}}">Frontend Settings</a></li>
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
