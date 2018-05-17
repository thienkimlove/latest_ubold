<div class="col-right right-content pr">
    @if ($rightBanners->count() > 0)
        @foreach ($rightBanners as $rightBanner)
            <div class="box-adv">
                <a href="{{$rightBanner->link}}">
                    <img src="/files/{{$rightBanner->image}}">
                </a>
            </div>
        @endforeach
    @endif

</div><!--//col-right-->