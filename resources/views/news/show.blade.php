@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('news.show',$news) }}
    @component('layouts.box')
        <h4><b>Tiêu đề:</b></h4>
        <p>{{$news->title}}</p>
        <h4><b>Danh mục:</b></h4>
        <p>{{$news->category->name}}</p>
        <h4><b>Trạng thái:</b></h4>
        @if($news->status == 1)
            <p style="color: #00CC00"><b>Đang hoạt động</b></p>
        @else
            <p style="color:#BA2121"><b>Chưa hoạt động</b></p>
        @endif
        <h4><b>Ảnh đại diện</b></h4>
        <img src="{{url($news->avatar)}}" alt="Ảnh đại diện của {{$news->title}}" style="width: 300px">

        <h4><b>Nội dung:</b></h4>
        <div id="body-text">{!!$news->body!!}</div>
    @endcomponent
@endsection


