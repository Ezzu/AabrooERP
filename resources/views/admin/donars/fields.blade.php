{{ csrf_field() }}

<div class="{{ $errors->has('sponsership_date') ? 'text-danger' : '' }} form-group col-md-3" id="sponsership_date_div">
    {!! Form::label('sponsership_date', 'Sponsership Date *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('sponsership_date', old('sponsership_date') ,['class' => 'form-control datetimepicker']) !!}
    @if ($errors->has('sponsership_date'))
        <div class="text-danger">{{ $errors->first('sponsership_date') }}</div>
    @endif
</div>

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

<div class="{{ $errors->has('cnic') ? 'text-danger' : '' }} form-group col-md-3" id="cnic_div">
    {!! Form::label('cnic', 'CNIC *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('cnic', old('cnic'), ['class' => 'form-control']) !!}
    @if ($errors->has('cnic'))
        <div class="text-danger">{{ $errors->first('cnic') }}</div>
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

<div class="{{ $errors->has('email') ? 'text-danger' : '' }} form-group col-md-3" id="email_div">
    {!! Form::label('email', 'Email', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
    @if ($errors->has('email'))
        <div class="text-danger">{{ $errors->first('email') }}</div>
    @endif
</div>

<!-- <div class="{{ $errors->has('sponser_count') ? 'text-danger' : '' }} form-group col-md-3" id="sponser_count_div">
    {!! Form::label('sponser_count', 'Sponser Count *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::number('sponser_count', '' ,['class' => 'form-control']) !!}
    @if ($errors->has('sponser_count'))
        <div class="text-danger">{{ $errors->first('sponser_count') }}</div>
    @endif
</div> -->

<div class="{{ $errors->has('fee_per_child') ? 'text-danger' : '' }} form-group col-md-3" id="fee_per_child_div">
    {!! Form::label('fee_per_child', 'Fee Per Child *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::number('fee_per_child', old('fee_per_child'), ['class' => 'form-control']) !!}
    @if ($errors->has('fee_per_child'))
        <div class="text-danger">{{ $errors->first('fee_per_child') }}</div>
    @endif
</div>

<div class="{{ $errors->has('payment_type_id') ? 'text-danger' : '' }} form-group col-md-3" id="payment_type_id_div">
    {!! Form::label('payment_type_id', 'Payment Method *', ['class' => 'control-label', 'style' => ""]) !!}
    {!! Form::select('payment_type_id', $PaymentTypes, old('payment_type_id'), ['class' => 'form-control select2']) !!}
    @if ($errors->has('payment_type_id'))
        <div class="text-danger">{{ $errors->first('payment_type_id') }}</div>
    @endif
</div>