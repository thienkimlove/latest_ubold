<div class="menu-left" id="menu-left">
    <div class="inner">
        <a href="javascript:void(0)" title="Menu" class="btn-menu" id="btn-menu">Menu</a>
        <div class="search">
            <div class="search-in">
                <form>
                    <input type="text" name="keyword" class="txt" placeholder="Từ khóa tìm kiếm"/>
                    <input type="submit" name="submit" class="btn-find" value=""/>
                </form>
            </div>
        </div>
        <nav>
            <ul class="nav-mobile">
                <li>
                    <a class="{{(isset($page) && $page == 'index') ? 'active' : ''}}" href="{{url('/')}}" title="">TRANG CHỦ</a>
                </li>

                <li>
                    <a class="{{(isset($page) && $page == 'product') ? 'active' : ''}}" href="{{url('product')}}" title="">Sản phẩm</a>
                </li>

                @if ($headerCategories->count() > 0)
                    @foreach ($headerCategories as $headerCategory)
                        <li>
                            <a class="{{(isset($page) && ($page == $headerCategory->slug || in_array($page, $headerCategory->subCategories->lists('slug')->all()))) ? 'active' : ''}}" href="{{url($headerCategory->slug)}}">{{$headerCategory->name}}</a>
                        </li>
                    @endforeach
                @endif


                <li>
                    <a class="{{(isset($page) && $page == 'cau-hoi-thuong-gap') ? 'active' : ''}}" href="{{url('cau-hoi-thuong-gap')}}" title="">Hỏi đáp chuyên gia</a>
                </li>
                <li>
                    <a class="{{(isset($page) && $page == 'video') ? 'active' : ''}}" href="{{url('video')}}" title="">Video</a>
                </li>
                <li>
                    <a class="{{(isset($page) && $page == 'lien-he') ? 'active' : ''}}" href="{{url('lien-he')}}" title="">Liên hệ</a>
                </li>
                <li>
                    <a class="{{(isset($page) && $page == 'phan-phoi') ? 'active' : ''}}" href="{{url('phan-phoi')}}" title="">Phân phối</a>
                </li>
            </ul>
        </nav>
    </div>
</div>