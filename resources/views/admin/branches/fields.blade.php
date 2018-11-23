{{ csrf_field() }}

<div class="{{ $errors->has('name') ? 'text-danger' : '' }} form-group col-md-3" id="name_div">
    {!! Form::label('name', 'Branch Name *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('name', old('name') ,['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="{{ $errors->has('contact') ? 'text-danger' : '' }} form-group col-md-3" id="contact_div">
    {!! Form::label('contact', 'Contact *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::number('contact', old('contact') ,['class' => 'form-control']) !!}
    @if ($errors->has('contact'))
        <div class="text-danger">{{ $errors->first('contact') }}</div>
    @endif
</div>

<div class="{{ $errors->has('location') ? 'text-danger' : '' }} form-group col-md-3" id="location_div">
    {!! Form::label('location', 'Location *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('location', old('location') ,['class' => 'form-control']) !!}
    @if ($errors->has('location'))
        <div class="text-danger">{{ $errors->first('location') }}</div>
    @endif
</div>