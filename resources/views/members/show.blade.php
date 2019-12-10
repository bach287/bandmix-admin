@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('members.show',$member) }}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @component('layouts.box')
                @slot('box_title','Thông tin người dùng')
                <div class="x_content">
                    <br>
                    {{ Form::model($member,['route' => ['members.edit',$member->id], 'method' => 'GET','enctype' => 'multipart/form-data','class' => 'form-horizontal form-label-left']) }}
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ và tên<span
                                    class="required">:</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h5 class=" col-md-7 col-xs-12">{{$member->name}}</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img src="{{$member->avatar}}" style="width: 150px;height: 150px" class="img-fluid"> <br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span
                                    class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h5 class=" col-md-7 col-xs-12">{{$member->gender == 1 ? 'Nam':'Nữ'}}</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h5 class=" col-md-7 col-xs-12">{{$member->address}}</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h5 class=" col-md-7 col-xs-12">{{$member->dob}}</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Number Phone <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h5 class=" col-md-7 col-xs-12">{{$member->phone_number}}</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    </div>
                    {{ Form::close() }}
                </div>
            @endcomponent
        </div>
    </div>
@endsection