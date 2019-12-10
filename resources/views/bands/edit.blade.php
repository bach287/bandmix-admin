@extends('layouts.master')
@section('content')
    {{--{{ Breadcrumbs::render('news.edit',$news) }}--}}
    <div class="row">
        <div class="col-md-12">
            @component('layouts.box')
                @slot('box_title','Chỉnh sửa Band')
                {{ Form::model($band,['route' => ['bands.update',$band->id], 'method' => 'Put','enctype' => 'multipart/form-data','class' => 'form-horizontal form-label-left']) }}
                @csrf
                {{ Form::bsText('Tên band','name',value($band->name),[],'readonly') }}
                <label for="">Avatar</label><br/>
                <img src="{{$band->avatar}}" style="width: 150px;height: 150px" class="img-fluid"> <br/>


                <label for="">Người tạo: </label>
                <p>{{$band->member->name}}</p>
                {{ Form::bsTextArea('About','about',value($band->about),[
                    'rows'=>12,'readonly'
                ]) }}
                {{ Form::bsTextArea('Thành tựu','achievements',value($band->achievements),[
                        'rows'=>12,'readonly'
                    ]) }}
                {{Form::bsText("Số điện thoại",'phone_manager',value($band->phone_manager),[],'readonly')}}
                {{ Form::checkbox('status',1,$band->status == 1 ? 'checked':'') }}
                {{ Form::label('status','Hoạt động',[]) }}
                {{ Form::bsSubmit('Chỉnh sửa') }}
                {{ Form::close() }}
            @endcomponent
        </div>
    </div>
@endsection
@push('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'body' );
    </script>
@endpush