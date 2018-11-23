{{ csrf_field() }}

<div class="{{ $errors->has('donar_id') ? 'text-danger' : '' }} form-group col-md-3" id="donar_div">
    {!! Form::label('donar_id', 'Select a Donar *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('donar_id', $Donars, old('donar_id'), ['class' => 'form-control select2']) !!}
    @if ($errors->has('donar_id'))
        <div class="text-danger">{{ $errors->first('donar_id') }}</div>
    @endif
</div>  

<div class="{{ $errors->has('student_id') ? 'text-danger' : '' }} form-group col-md-6" id="student_div">
    {!! Form::label('student_id', 'Select Student(s) *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('student_id[]', $Students, old('student_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
    @if ($errors->has('student_id'))
        <div class="text-danger">{{ $errors->first('student_id') }}</div>
    @endif
</div>  

<div class="{{ $errors->has('sponser_type') ? 'text-danger' : '' }} form-group col-md-3" id="student_div">
    {!! Form::label('sponser_type', 'Sponser Type *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('sponser_type', array('' => 'Select a Type') + config('admin.sponser_type_array'), old('sponser_type'), ['class' => 'form-control select2',]) !!}
    @if ($errors->has('sponser_type'))
        <div class="text-danger">{{ $errors->first('sponser_type') }}</div>
    @endif
</div>