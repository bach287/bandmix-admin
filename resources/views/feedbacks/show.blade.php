@extends('layouts.master')
@section('content')
    {{--{{ Breadcrumbs::render('events.show',$event) }}--}}
    <a  class="btn btn-primary" href="{{ route('feedback.index') }}">Trở về</a>
    @component('layouts.box')
        <h4><b>Tên người feedback: </b></h4>
        <p>{{$feedback->guest_name}}</p>
        <h4><b>Email: </b></h4>
        <p>{{$feedback->email}}</p>
        <h4><b>Tiêu đề feedback: </b></h4>
        <p>{{$feedback->feedback_title}}</p>
        <h4><b>Nội dung feedback: </b></h4>
        <p>{{$feedback->feedback_body}}</p>
    @endcomponent
@endsection