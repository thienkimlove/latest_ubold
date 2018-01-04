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
            <h4 class="page-title">Chi tiết Contact</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::open(['route' => ['contacts.update', $contact->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include('layouts.partials.errors')

                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-9">
                             {{$contact->title}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Customer</label>
                            <div class="col-md-9">
                              {{$contact->name}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone</label>
                            <div class="col-md-9">
                                {{$contact->phone}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                {{$contact->email}}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Content</label>
                            <div class="col-md-9">
                                {{$contact->content}}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-9">
                                {!! Form::select('status', ['' => 'Chọn Status'] + config('system.customer_content_status'), $contact->status, ['id' => 'status',  'class' => 'form-control select2', 'data-placeholder' => 'Chọn Status...']) !!}
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Ngày tạo</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{ $contact->created_at }}</p>
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
            $('.select2').select2();
        })(jQuery);
    </script>
@endsection