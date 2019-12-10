@extends('layouts.master')
@section('content')
    {{ Breadcrumbs::render('events.edit',$event) }}
    <div class="row">
        <div class="col-md-12">
            @component('layouts.box')
                @slot('box_title','Chỉnh sửa sự kiện')

                {{ Form::open(['route' => ['events.update',$event->id], 'method' => 'Put']) }}
                {{ Form::bsText('Tên sự kiện','name',value($event->name),[],'readonly') }}
                {{ Form::bsText('Mô tả','description',value($event->description),[],'readonly') }}
                <label for="time0">Ảnh đại diện</label>

                @if ($event->avatar != null)
                    <img style="width: 200px;height: 200px;display: block;" src="{{url($event->avatar)}}" class="img-responsive img-thumbnail" alt="Image">
                @endif
{{--                {{ Form::bsSelect('Danh mục','categories',$categories,value($news->category_id),[]) }}--}}
                {{ Form::bsText('Giá vé','price',value($event->price),[],'readonly') }}
                {{ Form::bsText('Số lượng vé','vacancy',value($event->vacancy),[],'readonly') }}
                {{ Form::bsText('Đường dẫn','slug',value($event->slug),[]) }}
                <label for="time0">Thời gian</label><br>
                <input id="time" name="time" value="{{$event->time}}" readonly><br>
                {{ Form::checkbox('status',1,$event->status == 1 ? 'checked':'') }}
                {{ Form::label('status','Hoạt động',[]) }}<br>
                {{ Form::checkbox('is_on_top',0,$event->is_on_top == 0 ? 'checked':'') }}
                {{ Form::label('is_on_top','Có lên top',[]) }}<br>
                {{ Form::bsTextArea('Chi tiết','detail',value($event->detail),[
                        'rows'=>12,'readonly'
                    ]) }}
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
        CKEDITOR.replace( 'detail' );
    </script>
@endpush


