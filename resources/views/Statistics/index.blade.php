@extends('layouts.master')
@section('content')
    {{--{{ Breadcrumbs::render('event') }}--}}
    @component('layouts.box')
        @slot('box_title','Thống kê chi tiết')
        <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Người đăng kí</span>
                <div class="count">{{ count($members) }}</div>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-optin-monster"></i> Tổng sự kiện</span>
                <div class="count green">{{ count($events) }}</div>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-music"></i> Tổng ban nhạc</span>
                <div class="count green">{{ count($bands) }}</div>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-ticket"></i> Đơn đặt hàng</span>
                <div class="count red">{{ count($books) }}</div>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-th-large"></i> Tổng danh mục</span>
                <div class="count">{{ count($categories) }}</div>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-file-o"></i> Tổng bài viết</span>
                <div class="count">{{ count($news) }}</div>

            </div>

        </div>


    @endcomponent


@endsection
