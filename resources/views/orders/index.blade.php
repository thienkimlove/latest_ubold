@extends('layouts.app')

@section('inline_styles')
    <style>
        .select2-container--default {
            width: 250px !important;
        }
        .select2-container--default .select2-results > .select2-results__options {
            max-height: 500px;
            min-height: 400px;
            overflow-y: auto;
        }
    </style>
@endsection

@section('styles')
    <!-- DataTables -->
    <link href="/vendor/ubold/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/ubold/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/vendor/ubold/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="/orders/create"><button type="button" class="btn btn-default dropdown-toggle waves-effect" >Tạo mới <span class="m-l-5"><i class="fa fa-plus"></i></span></button></a>
            </div>
            <ol class="breadcrumb">
                <li class="active">
                    Danh sách Đơn hàng
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-inline" role="form" id="search-form">

                            <div class="form-group m-l-10">
                                <label class="sr-only" for="">Tên KH</label>
                                <input type="text" class="form-control" placeholder="Tên" name="name"/>
                            </div>

                            <div class="form-group m-l-10">
                                <label class="sr-only" for="">Sản phẩm</label>
                                {!! Form::select('product_id', ['' => '--- Chọn Product ---'] + \App\Lib\Helpers::productList(), null, ['class' => 'form-control']) !!}
                            </div>


                            <div class="form-group m-l-10">
                                <label class="sr-only" for="">Trạng thái</label>
                                {!! Form::select('status', ['' => '--- Chọn Trạng thái ---'] + config('system.customer_content_status'), null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group m-l-10">
                                <label class="sr-only" for="">Theo ngày</label>
                                <input class="form-control input-daterange-datepicker" type="text" name="date" value="" placeholder="Theo ngày" style="width: 200px;"/>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-l-15">Tìm kiếm</button>
                        </form>

                        @if (Sentinel::getUser()->hasAccess(['orders.export']))

                        <div class="form-group pull-right">
                            {!! Form::open(['route' => 'orders.export', 'method' => 'get', 'role' => 'form', 'class' => 'form-inline', 'id' => 'export-form']) !!}

                            {{Form::hidden('filter_name', null)}}
                            {{Form::hidden('filter_product_id', null)}}
                            {{Form::hidden('filter_status', null)}}
                            {{Form::hidden('filter_date', null)}}

                            <button class="btn btn-danger waves-effect waves-light m-t-15" value="export" type="submit" name="export">
                                <i class="fa fa-download"></i>&nbsp; Xuất Excel
                            </button>
                            {!! Form::close() !!}

                        </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Danh sách Đơn hàng</b></h4>
                <p class="text-muted font-13 m-b-30"></p>
                <table id="dataTables-orders" class="table table-striped table-bordered table-actions-bar">
                    <thead>
                    <tr>
                        <th width="10%">Tên KH</th>
                        <th width="10%">Điện thoại</th>
                        <th width="10%">Địa chỉ</th>
                        <th width="10%">Sản phẩm</th>
                        <th width="10%">Số lượng</th>
                        <th width="10%">Ghi chú</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">Ngày tạo</th>
                        <th width="10%">Sửa lần cuối</th>
                        <th width="15%"></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/vendor/ubold/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.bootstrap.js"></script>

    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/jszip.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.colVis.js"></script>
    <script src="/vendor/ubold/assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

    <script src="/vendor/ubold/assets/pages/datatables.init.js"></script>
    <script src="/vendor/ubold/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="/js/handlebars.js"></script>

    <script src="/vendor/ubold/assets/plugins/moment/moment.js"></script>
    <script src="/vendor/ubold/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $('.select2').select2();

        $(function () {
            var dataTable = $("#dataTables-orders").DataTable({
                searching: false,
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{!! route('orders.dataTables') !!}',
                    data: function (d) {
                        d.name = $('input[name=name]').val();
                        d.product_id = $('select[name=product_id]').val();
                        d.status = $('select[name=status]').val();
                        d.date = $('input[name=date]').val();
                    }
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'address', name: 'address'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'note', name: 'note'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'histories', name: 'histories'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                order: [[4, 'desc']]
            });

            $('#search-form').on('submit', function(e) {
                dataTable.draw();
                e.preventDefault();
            });

            $('#export-form').on('submit', function (e) {
                $('input[name=filter_name]').val($('input[name=name]').val());
                $('input[name=filter_product_id]').val($('select[name=product_id]').val());
                $('input[name=filter_status]').val($('select[name=status]').val());
                $('input[name=filter_date]').val($('input[name=date]').val());
                $(this).submit();
                dataTable.draw();
                e.preventDefault();
            });

            dataTable.on('click', '[id^="btn-delete-"]', function (e) {
                e.preventDefault();

                var url = $(this).data('url');

                swal({
                    title: "Bạn có muốn xóa đơn hàng này?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Accept!"
                }).then(function () {
                    $.ajax({
                        url : url,
                        type : 'DELETE',
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');
                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        }
                    }).always(function (data) {
                        dataTable.draw();
                    });
                });
            });


            $('.input-daterange-datepicker').daterangepicker({
                autoUpdateInput: false,
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-default',
                cancelClass: 'btn-white',
                separator: ' to ',
                locale: {
                    format: 'DD/MM/YYYY',
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            });

            $('.input-daterange-datepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('.input-daterange-datepicker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



    </script>
@endsection