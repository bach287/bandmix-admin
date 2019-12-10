@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('events.show',$event) }}
    @component('layouts.box')
        <h4><b>Tên sự kiện</b></h4>
        <p>{{$event->name}}</p>
        <h4><b>Mô tả</b></h4>
        <p>{{$event->description}}</p>
        <h4><b>Thời gian</b></h4>
        <p>{{$event->time}}</p>
        <h4><b>Địa điểm</b></h4>
        <p>{{$event->location}}</p>
        <h4><b>Giá tiền</b></h4>
        <p>{{$event->price}}</p>
        <h4><b>Chỗ trống</b></h4>
        <p>{{$event->vacancy}}</p>
        <h4><b>Trạng thái:</b></h4>
        @if($event->status == 1)
            <p style="color: #00CC00"><b>Đang hoạt động</b></p>
        @else
            <p style="color:#BA2121"><b>Chưa hoạt động</b></p>
        @endif
        <h4><b>Ảnh đại diện</b></h4>
        <img src="{{url($event->avatar)}}" alt="Ảnh đại diện của {{$event->name}}" style="width: 300px">

        <h4><b>Chi tiết:</b></h4>
        <div id="body-text">{!!$event->detail!!}</div>
    @endcomponent
@endsection


