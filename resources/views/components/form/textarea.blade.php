{{ Form::label($label, null, ['class' => 'control-label']) }}
{{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
@if($errors->first($name))
    <p class="text-danger">
        {{$errors->first($name)}}
    </p>
@endif