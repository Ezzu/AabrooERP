<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse3">Father/Guardian Information</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      
        <div class="{{ $errors->has('father_name') ? 'text-danger' : '' }} form-group col-md-3" id="father_name_div">
            {!! Form::label('father_name', 'Name *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('father_name', old('father_name') ,['class' => 'form-control']) !!}
            @if ($errors->has('father_name'))
                <div class="text-danger">{{ $errors->first('father_name') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('father_date_of_birth') ? 'text-danger' : '' }} form-group col-md-3" id="father_date_of_birth_div">
            {!! Form::label('father_date_of_birth', 'Date of Birth *', ['class' => 'control-label datemask', 'style' => ""]) !!}
            {!! Form::text('father_date_of_birth', old('father_date_of_birth') ,['class' => 'form-control datemask', 'placeholder' => 'e.g 2010-06-21']) !!}
            @if ($errors->has('father_date_of_birth'))
                <div class="text-danger">{{ $errors->first('father_date_of_birth') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('father_cnic') ? 'text-danger' : '' }} form-group col-md-3" id="father_cnic_div">
            {!! Form::label('father_cnic', 'CNIC *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('father_cnic', old('father_cnic') ,['class' => 'form-control cnicmask', 'placeholder' => 'e.g 35202-1234567-1']) !!}
            @if ($errors->has('father_cnic'))
                <div class="text-danger">{{ $errors->first('father_cnic') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('father_education') ? 'text-danger' : '' }} form-group col-md-3" id="father_education_div">
            {!! Form::label('father_education', 'Qualification *', ['class' => 'control-label']) !!}
            {!! Form::select('father_education', array('' => 'Select a Qualification') + \Config::get('admin.education_level_array'), old('father_education'), ['class' => 'form-control']) !!}
            @if ($errors->has('father_education'))
                <div class="text-danger">{{ $errors->first('father_education') }}</div>
            @endif
        </div>     
        <div class="{{ $errors->has('father_professional_status') ? 'text-danger' : '' }} form-group col-md-3" id="father_professional_status_div">
            {!! Form::label('father_professional_status', 'Professional Status *', ['class' => 'control-label']) !!}
            {!! Form::select('father_professional_status', array('' => 'Select a Status') + \Config::get('admin.professional_status_array'), old('father_professional_status'), ['class' => 'form-control']) !!}
            @if ($errors->has('father_professional_status'))
                <div class="text-danger">{{ $errors->first('father_professional_status') }}</div>
            @endif
        </div> 

      </div>
    </div>
  </div>
</div>