@extends('frontend.estrogen.frontend')

@section('content')

    <section class="body pr">
        <div class="fixCen">

            @php
                $indexTopPosts = \App\Lib\Helpers::getContentByModule('posts', 'top_index')->slice(0, 5);
            @endphp

            <div class="block-1 banner-post">
                @if ($firstPost = $indexTopPosts->shift())
                <div class="banner-big pr">
                    <a href="{{url($firstPost->slug.'.html')}}" title="{{$firstPost->title}}" class="thumbs" style="background-image: url({{url('files', $firstPost->image)}})">
                        <img src="{{url('files', $firstPost->image)}}" alt="" width="507" height="310"></a>
                    <div class="title">
                        <a href="{{url($firstPost->slug.'.html')}}" title="{{$firstPost->title}}">
                            {{str_limit($firstPost->title, 50)}}
                        </a>
                    </div>
                </div>
                @endif

                @if ($indexTopPosts->count() > 0)
                <div class="group-banner-sm">
                    @foreach ($indexTopPosts  as $indexTopPost)
                        <div class="bn pr">
                            <a href="{{url($indexTopPost->slug.'.html')}}" title="{{$indexTopPost->title}}" class="thumbs" style="background-image: url({{url('files', $indexTopPost->image)}})">
                                <img src="{{url('files', $indexTopPost->image)}}" alt="" width="226" height="148"></a>
                            <div class="title">
                                <a href="{{url($indexTopPost->slug.'.html')}}" title="{{$indexTopPost->title}}">
                                    {{str_limit($indexTopPost->title, 50)}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="groups">



                <div class="left-content">
                    @foreach (['index_block_1', 'index_block_2'] as $keyType)
                        @include('frontend.estrogen.index_block_1', [
                        'category' => \App\Lib\Helpers::getContentByModule('categories', $keyType)->first(),
                        'key_type' => $keyType
                        ])
                    @endforeach

                        <div class="ads">
                            @foreach ($middleIndexBanner as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>

                    <div class="block-4">
                        @foreach (['index_block_3', 'index_block_4'] as $keyType)
                            @include('frontend.estrogen.index_block_2', [
                            'category' => \App\Lib\Helpers::getContentByModule('categories', $keyType)->first(),
                             'key_type' => $keyType
                             ])

                        @endforeach
                    </div>
                </div>
                @include('frontend.estrogen.right_content')
            </div>
        </div>
        @include('frontend.estrogen.exp')
    </section>
@endsection