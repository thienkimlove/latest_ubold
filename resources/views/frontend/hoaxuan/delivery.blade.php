@extends('frontend.hoaxuan.frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">
            <div class="col-left">
                <ul class="breadcrumbs cf">
                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                    <li>Phân phối</li>
                </ul>
                <!-- BoxContact -->
                <div class="box-member cf">
                    @foreach ($totalDeliveries as $area => $cities)
                        <div class="title01">{{$area}}</div>
                        <div class="data">
                            @foreach ($cities->chunk(6) as $partCities)
                                <article class="item">
                                    @foreach ($partCities as $city)
                                        <a href="{{url('phan-phoi/'. $city->id)}}" title="">{{config('delivery')['city'][$city->city]}}</a>
                                    @endforeach
                                </article>
                            @endforeach
                        </div>
                    @endforeach
                </div><!--//box-member-->
                <!-- EndBoxContact -->
            </div><!--//col-left-->
            @include('frontend.hoaxuan.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section><!--//section-->

@endsection
