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
                <a href="{{ route('questions.index') }}" class="btn btn-primary waves-effect waves-light"><span class="m-r-5"><i class="fa fa-list"></i></span> List</a>
            </div>
            <h4 class="page-title">Tạo mới Question</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::open(['route' => ['questions.store'], 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include('layouts.partials.errors')

                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-9">
                                {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Title']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Người hỏi</label>
                            <div class="col-md-9">
                                {!! Form::text('person', null, ['id' => 'person', 'class' => 'form-control', 'placeholder' => 'Người hỏi']) !!}
                            </div>
                        </div>


                        <h4>SEO Part</h4>

                        <div class="card-box">

                            <div class="form-group">
                                <label class="col-md-3 control-label">SEO Title</label>
                                <div class="col-md-9">
                                    {!! Form::text('seo_title', null, ['id' => 'seo_title', 'class' => 'form-control', 'placeholder' => 'SEO Title']) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">SEO Description</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('seo_desc', null, ['id' => 'seo_desc', 'class' => 'form-control', 'placeholder' => 'SEO Description']) !!}
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-9">
                                {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Question</label>
                            <div class="col-md-9">
                                {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Answer</label>
                            <div class="col-md-9">
                                {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Short Answer</label>
                            <div class="col-md-9">
                                {!! Form::textarea('short_answer', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tags</label>
                            <div class="col-md-9">
                                {!! Form::select('tags[]', \App\Lib\Helpers::tagList(), null, ['id' => 'tags', 'class' => 'form-control select2', 'multiple']) !!}
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Trạng thái</label>
                            <div class="col-md-9">
                                {!! Form::checkbox('status', '1', 1, ['data-plugin' => 'switchery', 'data-color' => '#81c868']) !!}
                                <span class="lbl"></span>
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