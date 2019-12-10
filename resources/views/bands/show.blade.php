@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('bands.show',$band) }}
    @component('layouts.box')
        {{ Form::model($band,['route' => ['bands.edit',$band->id], 'method' => 'GET','enctype' => 'multipart/form-data','class' => 'form-horizontal form-label-left']) }}
        <h4><b>Tên band:</b></h4>
        <p>{{$band->name}}</p>
        <h4><b>Người tạo:</b></h4>
        <p>{{$band->member->name}}</p>
        <h4><b>Trạng thái:</b></h4>
        @if($band->status == 1)
            <p style="color: #00CC00"><b>Đang hoạt động</b></p>
        @else
            <p style="color:#BA2121"><b>Chưa hoạt động</b></p>
        @endif
        <h4><b>Ảnh đại diện</b></h4>
        <img src="{{$band->avatar}}" alt="Ảnh đại diện của {{$band->name}}" style="width: 300px">

        <h4><b>Sơ lược band:</b></h4>
        <div id="body-text">{!!$band->about!!}</div>
        <h4><b>Thành tụu:</b></h4>
        <div id="body-text">{!!$band->achievements!!}</div>
        <h4><b>Lượt like:</b></h4>
        <div id="body-text">{!!$band->like_count!!}</div>
        <h4><b>Đánh giá:</b></h4>
        <div id="body-text">{!!$band->rate!!}</div>
        <h4><b>Số điện thoại liên hệ:</b></h4>
        <div id="body-text">{!!$band->phone_manager!!}</div>
        {{ Form::bsSubmit('Chỉnh sửa') }}
        {{Form::close()}}
    @endcomponent
@endsection