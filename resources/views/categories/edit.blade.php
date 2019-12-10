@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-6">
            {{ Breadcrumbs::render('categories.edit',$category) }}
            @component('layouts.box')
                @slot('box_title','Sửa danh mục')

                {{ Form::open(['route' => ['categories.update',$category->id] , 'method' => 'Put']) }}
                {{ Form::bsText('Danh mục','name',value($category->name),[]) }}
                {{ Form::bsSubmit('Sửa') }}
                {{ Form::close() }}
            @endcomponent
        </div>
    </div>
@endsection