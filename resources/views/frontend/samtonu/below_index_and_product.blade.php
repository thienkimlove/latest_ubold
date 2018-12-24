<div class="block6">
    <div class="fixCen">
        <h2 class="globalPattern">Hỏi đáp về nội tiết tố nữ</h2>
        <div class="content">
            <div class="left">
                <img src="{{url('frontend/samtonu/images/img-chuyengia.png')}}" alt="">
            </div>
            <div class="right">
                <div class="slogan">
                    Nội tiết tố estrogen được ví như  nguồn nhựa sống trong cơ thể người phụ nữ, giúp duy trì ham muốn, nét trẻ trung, nữ tính cũng như sức khỏe của phái đẹp. Tuy nhiên, theo quy luật tự nhiên, nội tiết tố dần suy giảm, phụ nữ phải đối mặt với tình trạng suy giảm sức khỏe, sắc đẹp và sinh lý.
                </div>
                <div class="notes">
                    <span>Bổ sung estrogen để phòng và cải thiện các triệu chứng do thiếu hụt nội tiết gây ra là vô cùng cần thiết.</span>
                    <span>Nghiên cứu khoa học chứng minh, estrogen từ thảo dược tự nhiên rất an toàn cho người sử dụng, phụ nữ có thể chủ động bổ sung để cải thiện các triệu chứng.</span>
                    <span>Sâm tố nữ - dược liệu hàng đầu bổ sung nội tiết tố nữ, giúp bổ sung nội tiết tố nữ tự nhiên mạnh gấp 10.000 lần estrogen từ mầm đậu nành.</span>
                </div>
                <a href="javascript:void(0)" class="view-more" title="Xem chi tiết">Xem chi tiết</a>
            </div>
        </div>
    </div>
</div>
<div class="block7">
    <div class="fixCen">
        <h2 class="globalPattern">Các dược quý</h2>
        <div class="content" id="block7_slider">
            @foreach (\App\Lib\Helpers::getContentByModule('shares', 'below_index')->slice(0, 7) as $index => $indexShare)
                <div class="item">
                    <div class="left">
                        <img src="{{url('files/'.$indexShare->image)}}" class="avatar" alt="Tên người" width="114" height="114">
                    </div>
                    <div class="right">
                        <div class="title"><a href="{{$indexShare->link}}">{{$indexShare->short_desc}}</a></div>
                        <div class="name">{{$indexShare->name}}</div>
                        <div class="address">{{$indexShare->address}}</div>
                    </div>
                    <div class="bottom">
                        {{$indexShare->desc}}
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>