@extends('layouts.master')
<<<<<<< HEAD
@section('content')
    {{ Breadcrumbs::render('news.edit',$news) }}
    <div class="row">
        <div class="col-md-12">
            @component('layouts.box')
                @slot('box_title','Chỉnh sửa tin tức')

                {{ Form::open(['route' => ['news.update',$news->id], 'method' => 'Put']) }}
                {{ Form::bsText('Tiêu đề','title',value($news->title),[]) }}
                {{ Form::bsText('Trích dẫn','description',value($news->description),[]) }}
                {{ Form::bsFile('Ảnh đại diện','avatar') }}
                @if ($news->avatar != null)
                    <img style="width: 200px;height: 200px;display: block;" src="{{$news->avatar}}" class="img-responsive img-thumbnail" id="pre-img" alt="Image">
                @endif
                {{ Form::bsSelect('Danh mục','categories',$categories,value($news->category_id),[]) }}
                {{ Form::bsText('Đường dẫn','slug',value($news->slug),[]) }}
                {{ Form::bsTextArea('Nội dung','body',value($news->body),[
                    'rows'=>12
                ]) }}

                {{ Form::checkbox('status',1,$news->status == 1 ? 'checked':'') }}
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
        // Change img whenever picking a new image
        $(document).ready(function () {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#pre-img').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#avt_input").on('change', function(){
                readURL(this);

            });
        });
    </script>
@endpush

