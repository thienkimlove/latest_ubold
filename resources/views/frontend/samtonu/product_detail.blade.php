@extends('frontend.samtonu.frontend')
@section('content')
    @if (request()->filled('tab2'))
        <div class="body">
            <div class="pattern-img"><img src="{{url('frontend/samtonu/images/img-pattern.png')}}" alt=""></div>
            <div class="tabs">
                <a href="{{url('product', 'sam-to-nu')}}" class="product-intro" title="Giới thiệu sản phẩm">Giới thiệu sản phẩm</a>
                <a href="{{url('product', 'sam-to-nu')}}?tab2=1" class="product-strength active" title="Ưu điểm vượt trội">Ưu điểm vượt trội</a>
            </div>
            <div class="content-tabs">
                <div class="block8">
                    <div class="fixCen">
                        <h2 class="globalPattern type4 type5">"Hoạt chất Deoxymiroestrol mạnh gấp 10.000 lần estrogen từ mầm đậu nành"</h2>
                        <div class="txt-intro">
                            Với nhiều phương pháp khác nhau, các nhà khoa học hàng đầu Thái Lan và Anh
 Quốc đã chứng minh thấy hoạt chất deoxymiroestrol có hoạt tính mạnh gấp 10.000 lần estrogen từ mầm đậu nành.
                        </div>
                        <div class="img-product">
                            <img src="{{url('frontend/samtonu/images/img-sp1.png')}}" class="imgFull">
                        </div>
                        <div class="special-formula">
                            <h2 class="globalPattern type4 type5">Công thức đột phá của Sâm nhung tố nữ Tuệ Linh</h2>
                            <div class="content pr">
                                <div class="center wow fadeInDown">
                                    <img src="{{url('frontend/samtonu/images/img-sp4.png')}}" alt="" class="imgFull">
                                </div>
                                <div class="around-items">
                                    <div class="item1 wow fadeInDown">
                                        <div class="left">
                                            <img src="{{url('frontend/samtonu/images/circle5.png')}}" alt="" class="imgFull">
                                        </div>
                                        <div class="right">
                                            <a href="javascript:void(0)" class="name" title="Sâm nhung tố nữ" >Sâm tố nữ </a>
                                            <div class="txt">
                                                Bổ sung nội tiết tố mạnh gấp 10.000 lần Estrogen từ mầm đậu nành. Giải quyết tận gốc mọi vấn đề của phụ nữ do thiếu hụt nội tiết tố ( Bốc hỏa, vã mồ hôi, giảm ham muốn, khô âm đạo, ngực chảy xệ, da nám sạm ... )
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item2 wow fadeInDown">
                                        <div class="left">
                                            <img src="{{url('frontend/samtonu/images/circle6.png')}}" alt="" class="imgFull">
                                        </div>
                                        <div class="right">
                                            <a href="javascript:void(0)" class="name" title="Nhân sâm" >Nhân sâm</a>
                                            <div class="txt">
                                                Đại bổ khí huyết, tăng cường sức khỏe toàn thân
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item3 wow fadeInDown">
                                        <div class="left">
                                            <img src="{{url('frontend/samtonu/images/circle7.png')}}" alt="" class="imgFull">
                                        </div>
                                        <div class="right">
                                            <a href="javascript:void(0)" class="name" title="Thiên môn đông" >Thiên môn đông</a>
                                            <div class="txt">
                                                Giúp ngủ ngon và làm chậm quá trình lão hóa.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item4 wow fadeInDown">
                                        <div class="left">
                                            <img src="{{url('frontend/samtonu/images/circle8.png')}}" alt="" class="imgFull">
                                        </div>
                                        <div class="right">
                                            <a href="javascript:void(0)" class="name" title="Thảo dược Nữ lang" >Nữ Lang</a>
                                            <div class="txt">
                                                An thần, giúp ngủ ngon và sâu giấc.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item5 wow fadeInDown">
                                        <div class="left">
                                            <img src="{{url('frontend/samtonu/images/circle9.png')}}" alt="" class="imgFull">
                                        </div>
                                        <div class="right">
                                            <a href="javascript:void(0)" class="name" title="Nhung hươu Bắc Cực" >Nhung hươu Bắc Cực</a>
                                            <div class="txt">
                                                Bồi bổ khí huyết, tăng cường sức khỏe, làm chậm quá trình lão hóa
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block18">
                    <div class="fixCen">
                        <div class="content">
                            <h2 class="globalPattern type4 type5">Sản phẩm 100% nguồn gốc tự nhiên</h2>
                            <div class="txt">
                                100% các nguyên liệu dùng để sản xuất Sâm nhung tố nữ Tuệ Linh đều có nguồn gốc từ tự nhiên, an toàn cho người sử dụng và hoàn toàn không có tác dụng phụ.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block19">
                    <div class="fixCen">
                        <div class="content">
                            <h2 class="globalPattern">Nữ Lang được nhập khẩu hoàn toàn từ Châu Âu</h2>
                            <div class="txt">
                                " Nguồn nguyên liệu Nữ Lang được nhập khẩu hoàn toàn từ Châu Âu - nơi có tiêu chuẩn dược phẩm cao nhất thế giới. Tại đây những sản phẩm từ Nữ Lang đã được sử dụng rộng rãi nhiều thế kỷ.
                                <br> Đặc biệt tại Mỹ, Nữ Lang còn được là một phương pháp điều trị mất ngủ hàng đầu."
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block20">
                    <div class="fixCen">
                        <div class="content">
                            <h2 class="globalPattern type4 type5">Công nghệ hiện đại đạt tiêu chuẩn quốc tế GMP</h2>
                            <div class="txt">
                                Sản phẩm được sản xuất trên dây truyền công nghệ hiện đại, đạt tiêu chuẩn quốc tế GMP - WHO, đáp ứng những đòi hỏi cao nhất về một sản phẩm đạt tiêu chuẩn quốc tế, nhằm đảm bảo giữ được trọn vẹn những gì quý giá nhất.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block16 block21">
                    <div class="fixCen">
                        <h3 class="globalTitle">Tin xem thêm</h3>
                        <div class="content" id="block16_slider">

                            @foreach (\App\Lib\Helpers::getLatestNews() as $index => $rPost)
                                <div class="item item{{$index+1}}">
                                    <a href="{{url($rPost->slug.'.html')}}" class="setBg" style="background: url({{url('files/'.$rPost->image)}})" >
                                        <img src="{{url('files/'.$rPost->image)}}" alt="" class="imgFull">
                                    </a>
                                    <a href="{{url($rPost->slug.'.html')}}" class="title"  title="{{$rPost->title}}">{{$rPost->title}}</a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="block17 block22">
                    <div class="fixCen">
                        <h2 class="globalPattern">Đặt hàng tại đây</h2>
                        <div class="content">
                            <h3 class="note-pp">
                                Để mua đúng sản phẩm chính hãng, Quý khách có thể thực hiện một trong những cách sau:
                            </h3>
                            <div class="note1 note">
                                <div class="title">
                                    <span class="number">1</span>
                                    <a href="{{url('phan-phoi')}}" title="Danh sách nhà thuốc có bán sản phẩm" >
                                        Danh sách nhà thuốc có bán sản phẩm
                                    </a>
                                </div>
                            </div>
                            <div class="note2 note">
                                <div class="title">
                                    <span class="number">2</span>
                                    Gọi tới tổng đài tư vấn và chăm sóc khách hàng <a href="tel:18001190">1800 1190</a>
                                </div>
                            </div>
                            <div class="note3 note">
                                <div class="title">
                                    <span class="number">3</span>
                                    Điền thông tin đặt hàng online - giao hàng, thu tiền tại nhà <a href="#">[ ĐẶT HÀNG NGAY ]</a>
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
                                            @foreach (\App\Lib\Helpers::productList() as $id => $product)
                                                <option value="{{$id}}">{{$product}}</option>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="body">
            <div class="pattern-img"><img src="{{url('frontend/samtonu/images/img-pattern.png')}}" alt=""></div>
            <div class="tabs">
                <a href="{{url('product', 'sam-to-nu')}}" class="product-intro" title="Giới thiệu sản phẩm">Giới thiệu sản phẩm</a>
                <a href="{{url('product', 'sam-to-nu')}}?tab2=1" class="product-strength active" title="Ưu điểm vượt trội">Ưu điểm vượt trội</a>
            </div>
            <div class="content-tabs">
                <div class="block8">
                    <div class="fixCen">
                        <h2 class="globalPattern type2 type6">"Sâm nhung tố nữ Tuệ Linh- Bổ sung nội tiết mạnh gấp 10.000 lần estrogen từ mầm đậu nành"</h2>
                        <div class="txt-intro">
                            Không phải ngẫu nhiên mà một đất nước nổi tiếng với các phương pháp làm đẹp từ thiên
 nhiên như Thái Lan lại sử dụng Sâm tố nữ suốt hàng trăm năm qua. Những người phụ nữ ở xứ sở Chùa Vàng đã dùng thảo dược này mỗi ngày như một liệu pháp tự nhiên hữu hiệu giúp trẻ hóa cơ thể, làm đẹp da tóc, cho ngực nở nang, săn chắc và đặc biệt là cải thiện các triệu chứng do thiếu hụt nội tiết tố gây ra. Cho đến nay đã có hàng trăm công trình nghiên cứu trên thế giới chứng minh Sâm tố nữ chứa ít nhất 17 hoạt chất có tác dụng tương tự estrogen. Đặc biệt, trong nghiên cứu của trường ĐH Reading (Anh Quốc) được thực hiện vào năm 2005 đã cho thấy Sâm tố nữ chứa rất nhiều Deoxymiroestrol – một loại hoạt chất quý hiếm có tác dụng cao nhất trong tất cả các estrogen thực vật, mạnh hơn gấp 1.000 - 10.000 lần các insoflavonid trong mầm đậu nành, là estrogen tự nhiên tốt nhất dành cho phái đẹp.
                        </div>
                        <div class="img-product">
                            <img src="{{url('frontend/samtonu/images/img-sp1.png')}}" class="imgFull">
                        </div>
                    </div>
                </div>
                <div class="block9 pr">
                    <div class="fixCen">
                        <h2 class="globalPattern type2">Sâm nhung tố nữ Tuệ Linh<span>Bổ sung nội tiết tố, căng tràn sức xuân</span></h2>
                        <div class="txt-intro">
                            Sâm nhung tố nữ Tuệ Linh là sản phẩm tiên phong kết hợp từ Sâm tố nữ, Nhung hươu cùng các nguyên liệu quý khác. Mang đến một giải pháp toàn diện cho phụ nữ tuổi trung niên. Đây được xem là bước đột phá mới, kết hợp hoàn hảo giữa các dược liệu hàng đầu cho sức khỏe và nhan sắc phái đẹp giúp:
- Bổ sung nội tiết tố nữ mạnh gấp 1000 - 10.000 lần estrogen mầm đậu nành từ thảo dược Sâm tố nữ, giúp cải thiện các triệu chứng do thiếu hụt gây ra.
- Bồi bổ khí huyết, tăng cường sức khỏe toàn thân. Đồng thời, Nhung hươu giúp tăng tái tạo các tế bào, làm trẻ hóa và chậm quá trình lão hóa của cơ thể.
                        </div>
                        <div class="content">
                            <div class="img-ps pr">
                                <img src="{{url('frontend/samtonu/images/img-ps1.png')}}" alt="" class="imgFull">
                            </div>
                            <div class="img-sp pr">
                                <div class="item item1 pa wow fadeInDown">
                                    <img src="{{url('frontend/samtonu/images/img-sp2.png')}}" alt="" class="">
                                    <div class="txt">Sâm tố nữ</div>
                                </div>
                                <div class="item item2 pa wow fadeInDown">
                                    <img src="{{url('frontend/samtonu/images/circle1.jpg')}}" alt="" class="">
                                    <div class="txt">Thảo dược Nữ Lang</div>
                                </div>
                                <div class="item item3 pa wow fadeInDown">
                                    <img src="{{url('frontend/samtonu/images/circle2.jpg')}}" alt="" class="">
                                    <div class="txt">Nhân sâm</div>
                                </div>
                                <div class="item item4 pa wow fadeInDown">
                                    <img src="{{url('frontend/samtonu/images/circle3.png')}}" alt="" class="">
                                    <div class="txt">Nhung hươu Bắc Cực</div>
                                </div>
                                <div class="item item5 pa wow fadeInDown">
                                    <img src="{{url('frontend/samtonu/images/circle4.jpg')}}" alt="" class="">
                                    <div class="txt">Thiên môn đông</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block10">
                    <div class="fixCen">
                        <h2 class="globalPattern">Cơ chế tác động của Sâm nhung tố nữ Tuệ Linh</h2>
                        <div class="content">
                            <div class="top">
                                <img src="{{url('frontend/samtonu/images/img-sp3.png')}}" alt="" class="imgFull">
                            </div>
                            <div class="bottom">
                                <img src="{{url('frontend/samtonu/images/img-combile.png')}}" alt="" class="imgFull">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block11">
                    <div class="fixCen">
                        <h2 class="globalPattern type3">Ưu điểm vượt trội của Sâm nhung tố nữ Tuệ Linh</h2>
                        <div class="boxAnswer">
                            <div class="reason reason1">
                                <div class="left">
                                    <a href="javascript:void(0)" title=""><img src="{{url('frontend/samtonu/images/tc1.png')}}" alt=""></a>
                                </div>
                                <div class="right">
                                    Hoạt chất Deoxymiroestrol trong sâm tố nữ đã được các nhà khoa học hàng đầu Thái Lan và Anh Quốc chứng minh tác dụng mạnh gấp 1000 - 10.000 lần estrogen từ mầm đậu nành.
                                </div>
                            </div>
                            <div class="reason reason2">
                                <div class="right">
                                    Công thức đột phá,  sử dụng những dược liệu có dược tính mạnh nhất và an toàn nhất để bổ sung nội tiết, giải quyết tận gốc vấn đề do thiếu hụt nội tiết tố nữ gây ra.
                                </div>
                                <div class="left">
                                    <a href="javascript:void(0)" title=""><img src="{{url('frontend/samtonu/images/tc2.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="reason reason3">
                                <div class="left">
                                    <a href="javascript:void(0)" title=""><img src="{{url('frontend/samtonu/images/tc3.png')}}" alt=""></a>
                                </div>
                                <div class="right">
                                    Nhung hươu giúp bồi bổ khí huyết, tăng cường sức khỏe và làm chậm quá trình lão hóa.
                                </div>
                            </div>
                            <div class="reason reason4">
                                <div class="right">
                                    Sản phẩm 100% nguồn gốc tự nhiên nên rất an toàn, không tác dụng phụ.
                                </div>
                                <div class="left">
                                    <a href="javascript:void(0)" title=""><img src="{{url('frontend/samtonu/images/tc4.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="reason reason5">
                                <div class="left">
                                    <a href="javascript:void(0)" title=""><img src="{{url('frontend/samtonu/images/tc5.jpg')}}" alt=""></a>
                                </div>
                                <div class="right">
                                     Nguồn nguyên liệu Nữ lang được nhập khẩu hoàn toàn từ Châu Âu.
                                </div>
                            </div>
                            <div class="reason reason6">
                                <div class="right">
                                    Được sản xuất trên dây truyền hiện đại theo tiêu chuẩn quốc tế GMP – WHO, đáp ứng những đòi hỏi cao nhất về một sản phẩm đạt tiêu chuẩn quốc tế.
                                </div>
                                <div class="left">
                                    <a href="javascript:void(0)" title=""><img src="{{url('frontend/samtonu/images/tc6.jpg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block12">
                    <div class="fixCen">
                        <h2 class="globalPattern">Ai nên sử dụng</h2>
                        <div class="txt-intro">
                           Nội tiết tố nữ được coi là cội nguồn của sự nữ tính, sắc đẹp và sức khỏe phái
đẹp, hay nói cách khác nó chính là yếu tố “đặc trưng” tạo nên sự khác biệt
của người phụ nữ. Thuở đôi mươi thì xuân sắc rạng ngời. Nhưng theo thời gian, khi đến tuổi 35, theo quy luật của tự nhiên, buồng trứng bắt đầu có dấu hiệu lão hóa dẫn đến sự sụt giảm nội tiết tố trong cơ thể.
                        </div>
                        <div class="content">
                            <div class="left pr">
                                <div class="title">Phụ nữ 35+ bình thường</div>
                                <ul class="someInfos">
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Bốc hỏa - Vã mồ hôi" >Bốc hỏa - Vã mồ hôi</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Mất ngủ" >Mất ngủ</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Giảm ham muốn - Khô âm đạo" >Giảm ham muốn - Khô âm đạo</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Vòng 1 chảy xệ" >Vòng 1 chảy xệ</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Da khô, nhăn, nám, sạm" >Da khô, nhăn, nám, sạm</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Cáu gắt, khó chịu" >Cáu gắt, khó chịu</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="right pr">
                                <div class="title">Phụ nữ 35+ sử dụng Sâm nhung tố nữ Tuệ Linh</div>
                                <span class="title2">"Bổ sung nội tiết tố nữ mạnh gấp 10.000 lần estrogen từ mầm đậu nành"</span>
                                <ul class="someInfos">
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Giảm bốc hỏa - Vã mồ hôi" >Giảm bốc hỏa - Vã mồ hôi</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Giúp ngủ ngon & sâu giấc" >Giúp ngủ ngon & sâu giấc</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Tăng ham muốn, tăng tiết dịch làm mất hiện tượng khô âm đạo" >Tăng ham muốn, tăng tiết dịch làm mất hiện tượng khô âm đạo</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Làm giảm và chậm quá trình lão hóa" >Làm giảm và chậm quá trình lão hóa</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Làm đẹp da, giảm nếp nhăn, nám, sạm, tăng cường đàn hồi giúp da đẹp, mịn màng, hồng hào" >Làm đẹp da, giảm nếp nhăn, nám, sạm, tăng cường đàn hồi giúp da đẹp, mịn màng, hồng hào</a>
                                    </li>
                                    <li class="wow fadeInDown">
                                        <a href="javascript:void(0)" title="Bồi bổ khí huyết, tăng cường sức khỏe" >Bồi bổ khí huyết, tăng cường sức khỏe</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block13">
                    <div class="fixCen">
                        <div class="content">
                            <h2 class="globalPattern type4 type5">Cách sử dụng Sâm nhung tố nữ Tuệ Linh</h2>
                            <div class="title">Để sử dụng Sâm nhung tố nữ Tuệ Linh đạt được hiệu quả cao, nên dùng như sau:</div>
                            <div class="left">
                                <img src="{{url('frontend/samtonu/images/drug.png')}}" alt="">
                            </div>
                            <div class="center">
                                Uống mỗi ngày 1 đến 2 lần, mỗi lần 2 viên, uống sau khi ăn
                            </div>
                            <div class="right">
                                Mỗi đợt nên sử dụng liên tục trong 3 tháng để đạt hiệu quả tốt nhất
                            </div>
                            <div class="right2">
                                <img src="{{url('frontend/samtonu/images/123.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.samtonu.below_index_and_product')
                <div class="block16">
                    <div class="fixCen">
                        <h3 class="globalTitle">Tin xem thêm</h3>
                        <div class="content" id="block16_slider">

                            @foreach (\App\Lib\Helpers::getLatestNews() as $index => $rPost)
                                <div class="item item{{$index+1}}">
                                    <a href="{{url($rPost->slug.'.html')}}" class="setBg" style="background: url({{url('files/'.$rPost->image)}})" >
                                        <img src="{{url('files/'.$rPost->image)}}" alt="" class="imgFull">
                                    </a>
                                    <a href="{{url($rPost->slug.'.html')}}" class="title"  title="{{$rPost->title}}">{{$rPost->title}}</a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="block17">
                    <div class="fixCen">
                        <h2 class="globalPattern">Đặt hàng tại đây</h2>
                        <div class="content">
                            <h3 class="note-pp">
                                Để mua đúng sản phẩm chính hãng, Quý khách có thể thực hiện một trong những cách sau:
                            </h3>
                            <div class="note1 note">
                                <div class="title">
                                    <span class="number">1</span>
                                    <a href="{{url('phan-phoi')}}" title="Danh sách nhà thuốc có bán sản phẩm" >
                                        Danh sách nhà thuốc có bán sản phẩm
                                    </a>
                                </div>
                            </div>
                            <div class="note2 note">
                                <div class="title">
                                    <span class="number">2</span>
                                    Gọi tới tổng đài tư vấn và chăm sóc khách hàng <a href="tel:18001190">1800 1190</a>
                                </div>
                            </div>
                            <div class="note3 note">
                                <div class="title">
                                    <span class="number">3</span>
                                    Điền thông tin đặt hàng online - giao hàng, thu tiền tại nhà dưới đây <a href="#">[ ĐẶT HÀNG NGAY ]</a>
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
                                            @foreach (\App\Lib\Helpers::productList() as $id => $product)
                                                <option value="{{$id}}">{{$product}}</option>
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
                                        <div class="error" id="delivery_form_message">Bạn đã đặt hàng thành công. Chúng tôi sẽ gọi lại cho bạn để xác nhận đơn hàng trong giờ hành chính. Cảm ơn bạn.</div>
                                    @else
                                        <div class="error" id="delivery_form_message" style="display: none"></div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
