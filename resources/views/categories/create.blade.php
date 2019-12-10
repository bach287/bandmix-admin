
@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-6">
            {{ Breadcrumbs::render('categories.create') }}
            @component('layouts.box')
                @slot('box_title','Tạo mới danh mục')

                {{ Form::open(['route' => 'categories.store', 'method' => 'POST']) }}
                {{ Form::bsText('Danh mục','name',null,[]) }}
                {{ Form::bsSubmit('Tạo mới') }}
                {{ Form::close() }}
            @endcomponent
        </div>
    </div>
@endsection
