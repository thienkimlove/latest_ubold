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
                        <span>|</span>
                        <h4>{{$product->title}}</h4>
                    </div>
                    <div class="detail-content">
                        <article class="detail">
                            <span class="detail-title">{{$product->title}}</span>
                            <ul class="tabs detail-tabs rs">
                                <li class="tab-1 tab active" data-content="#tab-8"><h3 class="rs"><a href="javascript:void(0)" title="Thông tin sản phẩm">THÔNG TIN SẢN PHẨM</a></h3></li>
                                <li class="tab-2 tab" data-content="#tab-9"><h3 class="rs"><a href="javascript:void(0)" title="Bằng chứng khoa học">bằng chứng khoa học</a></h3></li>
                                <li class="tab-3 tab" data-content="#tab-10"><h3 class="rs"><a href="javascript:void(0)" title="Cảm nhận khách hàng">cảm nhận khách hàng</a></h3></li>
                            </ul>
                            <div class="tab-content detail-tab-content">
                                <div id="tab-8" class="content active">
                                    <article>
                                        {!! $product->content_tab1 !!}
                                    </article>
                                </div>
                                <div id="tab-9" class="content">
                                    <article>
                                        {!! $product->content_tab2 !!}
                                    </article>
                                </div>
                                <div id="tab-10" class="content">
                                    <article>
                                        {!! $product->content_tab3 !!}
                                    </article>
                                </div>
                            </div>
                        </article>
                    <div class="delivery">
                        <h3 class="note-pp">
                            Để mua đúng sản phẩm chính hãng, Quý khách vui lòng thực hiện một trong các bước dưới đây:
                        </h3>
                        <div class="note3 note">
                            <div class="title">
                                <span class="number">1</span>
                                 Hỏi mua sản phẩm tại các nhà thuốc trên toàn quốc theo danh sách <b><a href="{{url('phan-phoi')}}" title="Phân phối" style="color:#FF0000">tại đây</a></b>:
                            </div>
                        </div>
                        <div class="note2 note">
                            <div class="title">
                                <span class="number">2</span>
                                Gọi tới tổng đài tư vấn và chăm sóc KH: <a href="tel: 18001190">1800 1190 </a>(miễn phí cước gọi) - <a href="tel: 0912571190">0912 571 190</a>
                            </div>
                        </div>
                        <div class="note1 note">
                            <div class="title">
                                <span class="number">3</span>
                                Điền vào form thông tin đặt hàng online - giao hàng và thu tiền tại nhà dưới đây .
                            </div>
                            <form action="{{url('saveOrder')}}" id="order_online" method="POST">
                                <div class="row1">
                                    <input type="text" id="name" name="name" placeholder="Họ tên">
                                    <input type="text" id="address" name="address" placeholder="Địa chỉ">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                </div>
                                <div class="row2">
                                    <input type="number" id="phone" name="phone" placeholder="Điện thoại">
                                    <select name="product_id" id="product_id">
                                        <option>Chọn sản phẩm</option>
                                        @foreach (\App\Models\Product::pluck('title', 'id') as $id => $listProduct)
<option value="{{$id}}">{{$listProduct}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row3">
                                    <input type="hidden" name="redirect_url" value="{{request()->fullUrl()}}" />
                                    <input type="text" id="note" name="note" placeholder="Ghi chú">
                                    <input type="number" id="quantity" name="quantity" placeholder="Số lượng" class="sl-onl"> <label for="">hộp</label>
                                    <button id="delivery_form_submit" class="btn-order-onl">ĐẶT MUA HÀNG</button>
                                </div>

                                @if (isset($success_delivery_form_message) && $success_delivery_form_message)
                                    <div class="error" id="delivery_form_message">Bạn đã đặt hàng thành công. Chúng tôi sẽ gọi lại cho bạn để xác nhận đơn hàng. Cảm ơn bạn.</div>
                                @else
                                    <div class="error" id="delivery_form_message" style="display: none"></div>
                                @endif

                            </form>
                        </div></div>
                        @include('frontend.estrogen.list_button')
                        <div class="ads">
                            @foreach ($middleNormalBanner as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>
                        <div class="box-tags">
                            <span>Từ khóa: </span>
                            @foreach ($product->tags as $tag)
                                <a href="{{url('tu-khoa', $tag->slug)}}" title="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="news-bt">

                            <div class="box-usual-ques">
                                <h3 class="global-title">
                                    <a href="#"> TIN LIÊN QUAN</a>
                                </h3>
                                <div class="box-bd">
                                    @foreach ($product->related_posts as $rPost)
                                        <div class="item cf item-r">
                                            <h3>
                                                <a href="{{url($rPost->slug.'.html')}}">{{$rPost->title}}</a>
                                            </h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="box-usual-ques">
                                <h3 class="global-title">
                                    <a href="#">TIN MỚI</a>
                                </h3>
                                <div class="box-bd">
                                    @foreach (\App\Lib\Helpers::getLatestNormalPosts() as $normalPost)
                                        <div class="item cf item-r">
                                            <h3>
                                                <a href="{{url($normalPost->slug.'.html')}}">{{$normalPost->title}}</a>
                                            </h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="social-bt">
                            <div class='fb-like' data-action='like' data-href='{{url('product', $product->slug)}}' data-layout='button_count' data-share='true' data-show-faces='false' data-width='520'></div>
                        <g:plusone size="tall"></g:plusone>
                        </div>
                        <div class="comment-post">
                            <div class="fb-comments" data-href="{{url('product', $product->slug)}}" data-numposts="2" data-width="100%"></div>
                        </div>
                    </div>
                </div>
                @include('frontend.estrogen.right_normal')
            </div>
        </div>
        @include('frontend.estrogen.exp')
    </section>
@endsection
@section('frontend_script')
    <script>
        $(function(){
            $('#delivery_form_submit').click(function(e){
                e.preventDefault();

                var name = $('#name').val();
                var address = $('#address').val();
                var phone = $('#phone').val();
                var product_id = $('#product_id').val();
                var quantity = $('#quantity').val();

                if (!name || !address || !phone || !product_id || !quantity) {
                    $('#delivery_form_message').html('Bạn vui lòng điền đầy đủ các thông tin').show();
                } else {
                    $('#order_online').submit();
                }

                return false;
            });
        });
    </script>
@endsection