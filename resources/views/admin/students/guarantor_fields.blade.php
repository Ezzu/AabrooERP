<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse5">Guarantor Information</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">
      
        <div class="{{ $errors->has('guarantor_name') ? 'text-danger' : '' }} form-group col-md-3" id="guarantor_name_div">
            {!! Form::label('guarantor_name', 'Name', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('guarantor_name', old('guarantor_name') ,['class' => 'form-control']) !!}
            @if ($errors->has('guarantor_name'))
                <div class="text-danger">{{ $errors->first('guarantor_name') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('guarantor_relation') ? 'text-danger' : '' }} form-group col-md-3" id="guarantor_relation_div">
            {!! Form::label('guarantor_relation', 'Relation', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('guarantor_relation', old('guarantor_relation') ,['class' => 'form-control']) !!}
            @if ($errors->has('guarantor_relation'))
                <div class="text-danger">{{ $errors->first('guarantor_relation') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('guarantor_cnic') ? 'text-danger' : '' }} form-group col-md-3" id="guarantor_cnic_div">
            {!! Form::label('guarantor_cnic', 'CNIC', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('guarantor_cnic', old('guarantor_cnic') ,['class' => 'form-control']) !!}
            @if ($errors->has('guarantor_cnic'))
                <div class="text-danger">{{ $errors->first('guarantor_cnic') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('guarantor_address') ? 'text-danger' : '' }} form-group col-md-3" id="guarantor_address_div">
            {!! Form::label('guarantor_address', 'Address', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('guarantor_address', old('guarantor_address') ,['class' => 'form-control']) !!}
            @if ($errors->has('guarantor_address'))
                <div class="text-danger">{{ $errors->first('guarantor_address') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('cell_no') ? 'text-danger' : '' }} form-group col-md-3" id="guarantor_contact_div">
            {!! Form::label('guarantor_contact', 'Contact', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('guarantor_contact', old('guarantor_contact') ,['class' => 'form-control']) !!}
            @if ($errors->has('guarantor_contact'))
                <div class="text-danger">{{ $errors->first('guarantor_contact') }}</div>
            @endif
        </div>

      </div>
    </div>
  </div>
</div>