{{ Form::label($label, null, ['class' => 'control-label']) }}
{{Form::select($name, $listValue, $value,[
     'class' => 'form-control'
])}}

@if($errors->first($name))
    <p class="text-danger">
        {{$errors->first($name)}}
    </p>
@endif