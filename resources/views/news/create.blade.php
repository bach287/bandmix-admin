@extends('layouts.master')
@section('content')
   <div class="row">
       <div class="col-md-12">
           {{ Breadcrumbs::render('news.create') }}
           @component('layouts.box')
               @slot('box_title','Tạo mới tin tức')
               {{--<form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">--}}
                {{ Form::open(['route' => 'news.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                @csrf
                {{ Form::bsText('Tiêu đề','title',null,['required']) }}
                {{ Form::bsText('Trích dẫn','description',null,[]) }}
               <label for="avatar">Ảnh đại diện</label>
                {{ Form::bsFile('Ảnh đại diện','avatar',[]) }}
               <img src="{{url('uploads/avatar/default.jpg')}}" class="pre-img" alt="Ảnh đại diện" style="display: block; width: 200px; height: 200px">
                {{ Form::bsSelect('Danh mục','category_id',$categories,null,[]) }}
                {{ Form::bsTextArea('Nội dung','body',null,[
                'rows'=>6
                ]) }}
                {{ Form::checkbox('status',1,[]) }}
                {{ Form::label('status','Hoạt động',['class' => 'control-label']) }}
                {{ Form::bsSubmit('Tạo mới') }}
                {{Form::close()}}
           @endcomponent
       </div>
   </div>
@endsection
@push('footer')
    <script>
        CKEDITOR.replace( 'body' );
        //avatar load
        $(document).ready(function () {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.pre-img').attr('src', e.target.result);
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
