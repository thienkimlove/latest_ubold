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
                <a href="{{ route('orders.index') }}" class="btn btn-primary waves-effect waves-light"><span class="m-r-5"><i class="fa fa-list"></i></span> List</a>
            </div>
            <h4 class="page-title">Chi tiết Order</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::open(['route' => ['orders.update', $order->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include('layouts.partials.errors')

                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                {!! Form::text('name', $order->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone</label>
                            <div class="col-md-9">
                                {!! Form::text('phone', $order->phone, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Phone']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-9">
                                {!! Form::textarea('address', $order->address, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product</label>
                            <div class="col-md-9">
                                {!! Form::select('product_id', ['' => 'Chọn Product'] + \App\Lib\Helpers::productList(), $order->product_id, ['id' => 'product_id',  'class' => 'form-control select2', 'data-placeholder' => 'Chọn Product...']) !!}
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Quantity</label>
                            <div class="col-md-9">
                                {!! Form::number('quantity', $order->quantity, ['id' => 'quantity', 'class' => 'form-control', 'placeholder' => 'Quantity']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Note</label>
                            <div class="col-md-9">
                                {!! Form::textarea('note', $order->note, ['id' => 'note', 'class' => 'form-control', 'placeholder' => 'Note']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-9">
                                {!! Form::select('status', ['' => 'Chọn Status'] + config('system.customer_content_status'), $order->status, ['id' => 'status',  'class' => 'form-control select2', 'data-placeholder' => 'Chọn Status...']) !!}
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Ngày tạo</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{ $order->created_at }}</p>
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