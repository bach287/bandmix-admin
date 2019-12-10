@extends('layouts.master')
@section('content')
    {{ Breadcrumbs::render('members.edit',$member) }}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @component('layouts.box')

                @slot('box_title','Chỉnh sửa người dùng')

                {{--{{ Form::model($member,['route' => ['members.update',$member->id], 'method' => 'Put','enctype' => 'multipart/form-data']) }}--}}
                {{--{{ Form::bsText('Name','name',value($member->name),[]) }}--}}
                {{--<label for="">Avatar</label><br/>--}}

                {{--<img src="{{$member->avatar}}" style="width: 60px;height: 60px" class="img-circle">--}}
                {{--<br/>--}}
                {{--{{ Form::bsFile('Ảnh đại diện','avatar') }}--}}



                {{--{{ Form::checkbox('status',0,$member->status == 1 ? true:false) }}--}}
                {{--{{ Form::label('status','Hoạt động',[]) }}--}}
                {{--{{ Form::bsSubmit('Chỉnh sửa') }}--}}
                {{--{{ Form::close() }}--}}
                <div class="x_content">

                    <br>
                    {{ Form::model($member,['route' => ['members.update',$member->id], 'method' => 'Put','enctype' => 'multipart/form-data','class' => 'form-horizontal form-label-left']) }}
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ và tên<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" value="{{$member->name}}" required="required"
                                   class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img src="/{{$member->avatar}}" style="width: 150px;height: 150px" class="img-fluid"> <br/>
                            {{ Form::bsFile('Ảnh đại diện','avatar') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span
                                    class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <div id="gender" class="btn-group">
                                <label class="" for="Male">Male</label>
                                <input type="radio" name="gender" id="Male" data-parsley-multiple="gender"
                                       {{$member->gender == 1 ? 'checked':''}} value="1">

                                <label class="" for="Female">Female</label>
                                <input type="radio" name="gender" id="Female" data-parsley-multiple="gender"
                                       {{$member->gender == 0 ? 'checked':''}} value="0">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required"
                                   type="text" value="{{$member->address}}" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required"
                                   type="date" value="{{$member->dob}}" name="dob">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Number Phone <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required"
                                   type="text" value="{{$member->phone_number}}" name="phone_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hoạt động<span
                                    class="required">*</span></label>
                            {{--<div class="col-md-8">--}}

                                {{--<input type="checkbox" style="" name="status" value="1" {{$member->status == 1 ? 'checked':''}}>--}}
                                        <div class="material-switch">
                                            <input id="someSwitchOptionSuccess" name="status" type="checkbox" value="1" {{$member->status == 1 ? 'checked':''}}>
                                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                                        </div>
                            {{--</div>--}}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    {{ Form::close() }}
                </div>
            @endcomponent
        </div>
    </div>
@endsection