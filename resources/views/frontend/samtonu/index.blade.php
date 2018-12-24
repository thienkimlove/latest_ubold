@extends('frontend.samtonu.frontend')


@section('content')
    <div class="body">
        <div class="block1">
            <div class="fixCen">
                <h2 class="globalPattern">Dược liệu điển hình cho nội tiết tố nữ</h2>
                <div class="slogan" style="color:#1C5CBC">
                    Sâm tố nữ là thảo dược đã được sử dụng phổ biến từ hơn 100 năm nay tại Thái Lan với tác dụng trẻ hóa cơ thể, làm đẹp da, đen tóc, tăng tuần hoàn máu,
cải thiện trí nhớ và duy trì sinh lý. Cho đến nay đã có hàng trăm công trình nghiên cứu trên thế giới chứng minh Sâm tố nữ chứa ít nhất 17 hoạt chất có tác dụng tương tự estrogen, đặc biệt là Deoxymiroestrol – hoạt chất quý hiếm có tác dụng cao nhất trong tất cả các estrogen từ thực vật, có tác dụng mạnh gấp 1000-10.000 lần estrogen từ mầm đậu nành.
                </div>
                <div class="content">
                    @foreach (\App\Lib\Helpers::getContentByModule('posts', 'top_index')->slice(0, 4) as $index => $topIndexPost)
                    <div class="material material1 fadeInDown{{$index+1}} animated{{$index+1}} wow">
                        <a href="{{url($topIndexPost->slug.'.html')}}" class="setBg" title="{{$topIndexPost->title}}"  style="background: url({{ url('files/'.$topIndexPost->image) }});">
                            <img src="{{ url('files/'.$topIndexPost->image) }}" alt="" class="imgFull">
                        </a>
                        <a href="{{url($topIndexPost->slug.'.html')}}" class="title" title="{{$topIndexPost->title}}">{{$topIndexPost->title}}</a>
                    </div>
                        
                    @endforeach    

                </div>
            </div>
        </div>
        <div class="block2">
            <div class="fixCen">
                <h2 class="globalPattern">Cân bằng nội tiết tố nữ</h2>
                <div class="content" id="block2_slider">
                    @foreach (\App\Lib\Helpers::getContentByModule('shares', 'above_index')->slice(0, 8) as $index => $middleIndexPost)
                        <div class="material material{{$index+1}}">
                            <a href="{{$middleIndexPost->link}}" class="title" title="{{$middleIndexPost->name}}">{{$middleIndexPost->name}}</a>
                            <a href="{{$middleIndexPost->link}}" class="img-title" title="{{$middleIndexPost->name}}">
                                <span class="setBg" style="background: url({{url('files/'.$middleIndexPost->image)}});"><img src="{{url('files/'.$middleIndexPost->image)}}" alt=""></span>
                            </a>
                            <div class="summary">{{$middleIndexPost->short_desc}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="block3">
            <div class="fixCen">
                <div class="left">
                    <img src="{{url('frontend/samtonu/images/img-tc1.png')}}" alt="">
                    <div class="summary">Vùng nguyên liệu được chuẩn hóa. Mọi quy trình từ chọn giống, chăm sóc và thu hái được kiểm soát nghiêm ngặt.</div>
                    <a href="javascript:void(0)" class="view-more"  title="Xem chi tiết">Xem chi tiết</a>
                </div>
                <div class="right">
                    <img src="{{url('frontend/samtonu/images/img-tc2.png')}}" alt="">
                    <div class="summary">Được sản xuất trên dây chuyền công nghệ hiện đại đạt tiêu chuẩn quốc tế GMP-WHO</div>
                    <a href="javascript:void(0)" class="view-more"  title="Xem chi tiết">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="block4">
            <div class="fixCen">
                <h2 class="globalPattern">Sự kiện nhãn hàng</h2>
                <div class="content" id="block4_slider">


                    @foreach (\App\Lib\Helpers::getContentByModule('posts', 'below_index')->slice(0, 7) as $index => $belowIndexPost)
                        <div class="material material{{$index+1}}">
                            <a href="{{url($belowIndexPost->slug.'.html')}}" class="img-title" title="{{$belowIndexPost->title}}" >
                                <span class="setBg" style="background: url({{url('files/'.$belowIndexPost->image)}});"><img src="{{url('files/'.$belowIndexPost->image)}}" alt=""></span>
                            </a>
                            <a href="{{url($belowIndexPost->slug.'.html')}}" class="title" title="{{$belowIndexPost->title}}">{{$belowIndexPost->title}}</a>
                            <div class="summary">{{$belowIndexPost->desc}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="block5">
            <img src="{{url('frontend/samtonu/images/bg10.jpg')}}" alt="">
        </div>
        @include('frontend.samtonu.below_index_and_product')
    </div>
@endsection