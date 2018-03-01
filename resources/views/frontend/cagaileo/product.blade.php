@extends('frontend.cagaileo.frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">
            <ul class="breadcrumbs cf">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li>Sản phẩm</li>
            </ul>

            <div class="col-left">
                <div class="list-product cf">
                    @foreach ($products as $product)
                       <div class="item-product">
                        <a href="{{url('product', $product->slug)}}" class="thumb-product">
                            <img src="{{url('img/cache/188x188', $product->image)}}" alt="">
                        </a>
                        <h3><a href="{{url('product', $product->slug)}}">{{$product->title}}</a></h3>
                        <p>
                            {{str_limit($product->seo_desc, 108)}}
                        </p>
                           <div class="panel-product cf">
                               <div class="left-product">
                                   <div class="area-price">
                                      <span class="old-product">
                                       {{ \App\Lib\Helpers::getProductDetails($product, 'giacu') }}
                                      </span>
                                           <span class="price-product">
                                        {{\App\Lib\Helpers::getProductDetails($product, 'giamoi')}}
                                      </span>
                                   </div>
                                   <div class="rate-star">
                                       <div style="width:100%"></div>
                                   </div>
                               </div>
                               <div class="right-product">
                                <span class="buy-product">
                                   <a href="{{url('product', $product->slug)}}" title="" style="color:#FFFFFF">Mua ngay</a>
                                </span>
                               </div>
                           </div>
                    </div>
                    @endforeach
                </div>
                <!-- /paging -->
                <div class="boxPaging">
                    @include('frontend.cagaileo.pagination', ['paginate' => $products])
                </div><!--//news-list-->
                <ul class="listAdv cf">
                    <li>
                        <a href="{{url('phan-phoi')}}">
                            <img src="{{url('frontend/cagaileo/images/btn01.jpg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{url('lien-he')}}">
                            <img src="{{url('frontend/cagaileo/images/btn02.jpg')}}" alt="">
                        </a>
                    </li>
                </ul>
                @foreach ($middleIndexBanner as $banner)
                <div class="adv">
                    <a href="{{$banner->url}}">
                        <img src="{{url('files', $banner->image)}}" alt="">
                    </a>
                </div>
                @endforeach
            </div><!--//col-left-->


            @include('frontend.cagaileo.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section>

@endsection