{{ Form::label($label, null, ['class' => 'control-label']) }}
{{Form::file($name, [
     'class' => 'form-control'
     , 'id' => 'avt_input'
])}}
@if($errors->first($name))
    <p class="text-danger">
        {{$errors->first($name)}}
    </p>
@endif
