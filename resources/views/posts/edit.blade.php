@extends('layouts.app')

@section('styles')
    <!-- Plugins css-->
    <link href="/vendor/ubold/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/vendor/ubold/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
    <link href="/vendor/ubold/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="/vendor/ubold/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendor/ubold/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/vendor/ubold/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="{{ route('posts.index') }}" class="btn btn-primary waves-effect waves-light"><span class="m-r-5"><i class="fa fa-list"></i></span> Danh sách </a>
            </div>
            <h4 class="page-title">Chi tiết Bài viết</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include('layouts.partials.errors')

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tiêu đề</label>
                            <div class="col-md-9">
                                {!! Form::text('title', $post->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Title']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Mô tả</label>
                            <div class="col-md-9">
                                {!! Form::textarea('desc', $post->desc, ['id' => 'desc', 'class' => 'form-control', 'placeholder' => 'Description']) !!}
                            </div>
                        </div>

                        <div class="card-box">

                            <h4>Nội dung phục vụ SEO</h4>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Tiêu đề SEO</label>
                                <div class="col-md-9">
                                    {!! Form::text('seo_title', $post->seo_title, ['id' => 'seo_title', 'class' => 'form-control', 'placeholder' => 'SEO Title']) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Mô tả SEO</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('seo_desc', $post->seo_desc, ['id' => 'seo_desc', 'class' => 'form-control', 'placeholder' => 'SEO Description']) !!}
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Ảnh bài viết</label>
                            <div class="col-md-9">
                                @if ($post->image)
                                    <p><img src="/img/cache/small/{{$post->image}}" /></p>
                                @endif
                                {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Chuyên mục</label>
                            <div class="col-md-9">
                                {!! Form::select('category_id', ['' => 'Chọn chuyên mục'] + \App\Lib\Helpers::categoryList(), $post->category_id, ['id' => 'category_id',  'class' => 'form-control select2', 'data-placeholder' => 'Chọn chuyên mục...']) !!}
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Nội dung</label>
                            <div class="col-md-9">
                                {!! Form::textarea('content', $post->content, ['class' => 'form-control ckeditor']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Từ khóa</label>
                            <div class="col-md-9">
                                {!! Form::select('tags[]', \App\Lib\Helpers::tagList(), $post->tags->pluck('name','name')->all(), ['id' => 'tags', 'class' => 'form-control select2', 'multiple']) !!}
                            </div>

                        </div>


                        @if (Sentinel::getUser()->hasAccess(['posts.approve']))

                        <div class="form-group">
                            <label class="col-md-3 control-label">Trạng thái</label>
                            <div class="col-md-9">
                                {!! Form::checkbox('status', '1', $post->status, ['data-plugin' => 'switchery', 'data-color' => '#81c868']) !!}
                                <span class="lbl"></span>
                            </div>
                        </div>

                        @endif


                        <div class="form-group">
                            <label class="col-md-3 control-label">Ngày tạo</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{ $post->created_at }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Lưu</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/vendor/ubold/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/switchery/js/switchery.min.js"></script>
    <script type="text/javascript" src="/vendor/ubold/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="/vendor/ubold/assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
    <script src="/vendor/ubold/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

    <script src="/vendor/ubold/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

    <script src="/vendor/ubold/assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>

    <script src="/vendor/ubold/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src="/vendor/ubold/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/vendor/ubold/assets/plugins/autocomplete/jquery.mockjax.js"></script>
    <script type="text/javascript" src="/vendor/ubold/assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="/vendor/ubold/assets/plugins/autocomplete/countries.js"></script>
    <script type="text/javascript" src="/vendor/ubold/assets/pages/autocomplete.js"></script>

@endsection

@section('inline_scripts')
    <script>
        (function($){
            $('.select2').select2({tags : true});
            $(":file").filestyle({input: false});
        })(jQuery);
    </script>
@endsection