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
                <a href="{{ route('shares.index') }}" class="btn btn-primary waves-effect waves-light"><span class="m-r-5"><i class="fa fa-list"></i></span> Danh sách</a>
            </div>
            <h4 class="page-title">Chi tiết Chia sẻ người dùng</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::open(['route' => ['shares.update', $share->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include('layouts.partials.errors')


                        <div class="form-group">
                            <label class="col-md-3 control-label">Tên Người dùng</label>
                            <div class="col-md-9">
                                {!! Form::text('name', $share->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Tên Người dùng']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Link</label>
                            <div class="col-md-9">
                                {!! Form::text('link', $share->link, ['id' => 'link', 'class' => 'form-control', 'placeholder' => 'Link']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Địa chỉ</label>
                            <div class="col-md-9">
                                {!! Form::textarea('address', $share->address, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Địa chỉ']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Ảnh</label>
                            <div class="col-md-9">
                                @if ($share->image)
                                    <p><img src="/img/cache/small/{{$share->image}}" /></p>
                                @endif
                                {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Mô tả ngắn</label>
                            <div class="col-md-9">
                                {!! Form::textarea('short_desc', $share->short_desc, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Mô tả</label>
                            <div class="col-md-9">
                                {!! Form::textarea('desc', $share->desc, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        @if (Sentinel::getUser()->hasAccess(['shares.approve']))

                            <div class="form-group">
                                <label class="col-md-3 control-label">Trạng thái</label>
                                <div class="col-md-9">
                                    {!! Form::checkbox('status', '1', $share->status, ['data-plugin' => 'switchery', 'data-color' => '#81c868']) !!}
                                    <span class="lbl"></span>
                                </div>
                            </div>

                        @endif


                        <div class="form-group">
                            <label class="col-md-3 control-label">Ngày tạo</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{ $share->created_at }}</p>
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