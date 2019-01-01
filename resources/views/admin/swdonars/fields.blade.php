{{ csrf_field() }}

<div class="{{ $errors->has('donar_name') ? 'text-danger' : '' }} form-group col-md-3" id="donar_name_div">
    {!! Form::label('donar_name', 'Donar Name *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('donar_name', old('donar_name'), ['class' => 'form-control']) !!}
    @if ($errors->has('donar_name'))
        <div class="text-danger">{{ $errors->first('donar_name') }}</div>
    @endif
</div>

<div class="{{ $errors->has('address') ? 'text-danger' : '' }} form-group col-md-6" id="address_div">
    {!! Form::label('address', 'Address *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
    @if ($errors->has('address'))
        <div class="text-danger">{{ $errors->first('address') }}</div>
    @endif
</div>

<div class="{{ $errors->has('area_id') ? 'text-danger' : '' }} form-group col-md-3" id="area_id_div">
    {!! Form::label('area_id', 'Area *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('area_id', $Areas, old('area_id'), ['class' => 'form-control select2']) !!}
    @if ($errors->has('area_id'))
        <div class="text-danger">{{ $errors->first('area_id') }}</div>
    @endif
</div>

<div class="{{ $errors->has('phone_no') ? 'text-danger' : '' }} form-group col-md-3" id="phone_no_div">
    {!! Form::label('phone_no', 'Phone No *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('phone_no', old('phone_no'), ['class' => 'form-control']) !!}
    @if ($errors->has('phone_no'))
        <div class="text-danger">{{ $errors->first('phone_no') }}</div>
    @endif
</div>

<div class="{{ $errors->has('cell_no') ? 'text-danger' : '' }} form-group col-md-3" id="cell_no_div">
    {!! Form::label('cell_no', 'Cell No', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('cell_no', old('cell_no'), ['class' => 'form-control']) !!}
    @if ($errors->has('cell_no'))
        <div class="text-danger">{{ $errors->first('cell_no') }}</div>
    @endif
</div>

<div class="{{ $errors->has('cnic') ? 'text-danger' : '' }} form-group col-md-6" id="cnic_div">
    {!! Form::label('cnic', 'Remarks', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('cnic', old('cnic'), ['class' => 'form-control']) !!}
    @if ($errors->has('cnic'))
        <div class="text-danger">{{ $errors->first('cnic') }}</div>
    @endif
</div>