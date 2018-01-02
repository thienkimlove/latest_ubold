@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">HỆ THỐNG</h4>
            <p class="text-muted page-title-alt">Chào mừng bạn {{Sentinel::getUser()->name}}</p>
        </div>
    </div>


    <!-- End row -->
@endsection