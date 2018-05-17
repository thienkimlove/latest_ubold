@extends('frontend.estrogen.frontend')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('product')}}" title="Video">Sản phẩm</a></h3>
                    </div>
                    <div class="list-news">
                        <div class="news">
                            @foreach ($products as $product)
                                <div class="post post-news">
                                <a href="{{url('product', $product->slug)}}" title="{{$product->title}}" class="img-title thumbs" style="background-image: url({{url('files', $product->image)}})">
                                    <img src="{{url('files', $product->image)}}" alt="" width="276" height="157">
                                </a>
                                <div class="right">
                                    <a href="{{url('product', $product->slug)}}" class="title" title="{{$product->title}}">
                                        {{$product->title}}
                                    </a>
                                    <div class="sumary">
                                        {{str_limit($product->desc, 150)}}
                                    </div><br />
                                    <a href="{{url('product', $product->slug)}}" class="view-detail" title="Xem chi tiết">Xem chi tiết >></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @include('frontend.estrogen.pagination', ['paginate' => $products])
                        @include('frontend.estrogen.list_button')
                    </div>
                </div>
                @include('frontend.estrogen.right_normal')
            </div>
        </div>
        @include('frontend.estrogen.exp')
    </section>
@endsection