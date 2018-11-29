{{ csrf_field() }}

<div class="{{ $errors->has('employee_id') ? 'text-danger' : '' }} form-group col-md-3" id="employee_id_div">
    {!! Form::label('employee_id', 'Employee *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('employee_id', $Employees, old('employee_id'), ['class' => 'form-control select2']) !!}
    @if ($errors->has('employee_id'))
        <div class="text-danger">{{ $errors->first('employee_id') }}</div>
    @endif
</div>

<div class="{{ $errors->has('emergency_contact') ? 'text-danger' : '' }} form-group col-md-3" id="emergency_contact_div">
    {!! Form::label('emergency_contact', 'Emergency Contact *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::number('emergency_contact', old('emergency_contact'), ['class' => 'form-control']) !!}
    @if ($errors->has('emergency_contact'))
        <div class="text-danger">{{ $errors->first('emergency_contact') }}</div>
    @endif
</div>

<div class="{{ $errors->has('area_id') ? 'text-danger' : '' }} form-group col-md-3" id="area_id_div">
    {!! Form::label('area_id', 'Area *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('area_id', $Areas, old('area_id'), ['class' => 'form-control select2']) !!}
    @if ($errors->has('area_id'))
        <div class="text-danger">{{ $errors->first('area_id') }}</div>
    @endif
</div>

<div class="{{ $errors->has('day_id') ? 'text-danger' : '' }} form-group col-md-3" id="day_id_div">
    {!! Form::label('day_id', 'Day *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('day_id', $Days, old('day_id'), ['class' => 'form-control']) !!}
    @if ($errors->has('day_id'))
        <div class="text-danger">{{ $errors->first('day_id') }}</div>
    @endif
</div>