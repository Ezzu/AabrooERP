{{ csrf_field() }}

<div class="{{ $errors->has('name') ? 'text-danger' : '' }} form-group col-md-3" id="name_div">
    {!! Form::label('name', 'Job Title *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('name', old('name') ,['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</div>
    @endif
</div>