<div class="experience" id="experience">
    <div class="fixCen">
        <h2 class="rs no-extend">KINH NGHIỆM PHÒNG VÀ ĐIỀU TRỊ THIẾU HỤT NỘI TIẾT</h2>
        <h2 class="rs extend"><a href="http://www.viemgan.com.vn/chuong-trinh-chia-se-ngay-nhan-qua-hay.html" title="Chia sẻ ngay câu chuyện của bạn" target="_blank">CHIA SẺ NGAY CÂU CHUYỆN CỦA BẠN</a></h2>
        <div id="slider-2">
            @foreach (\App\Lib\Helpers::getSharingIndex() as $comment)
                <div class="item">
                <div class="left">
                    <img src="{{url('files', $comment->image)}}" class="avatar" alt="Tên người" width="114" height="114">
                </div>
                <div class="right">
                    <div class="title"><a href="{{$comment->link}}">{{str_limit($comment->short_desc, 60)}}</a></div>
                    <div class="name">{{$comment->name}}</div>
                    <div class="address">{{$comment->address}}</div>
                </div>
                <div class="bottom">
                    {{str_limit($comment->desc, 265)}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>