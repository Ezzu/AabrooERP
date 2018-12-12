<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2">Mother Information</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
      
            <div class="{{ $errors->has('mother_name') ? 'text-danger' : '' }} form-group col-md-3" id="mother_name_div">
                {!! Form::label('mother_name', 'Name *', ['class' => 'control-label', 'style' => ""]) !!}
                {!! Form::text('mother_name', old('mother_name') ,['class' => 'form-control']) !!}
                @if ($errors->has('mother_name'))
                    <div class="text-danger">{{ $errors->first('mother_name') }}</div>
                @endif
            </div>
            <div class="{{ $errors->has('mother_date_of_birth') ? 'text-danger' : '' }} form-group col-md-3" id="mother_date_of_birth_div">
                {!! Form::label('mother_date_of_birth', 'Date of Birth *', ['class' => 'control-label', 'style' => ""]) !!}
                {!! Form::text('mother_date_of_birth', old('mother_date_of_birth') ,['class' => 'form-control datemask', 'placeholder' => 'e.g 2010-06-21']) !!}
                @if ($errors->has('mother_date_of_birth'))
                    <div class="text-danger">{{ $errors->first('mother_date_of_birth') }}</div>
                @endif
            </div>        
            <div class="{{ $errors->has('mother_cnic') ? 'text-danger' : '' }} form-group col-md-3" id="mother_cnic_div">
                {!! Form::label('mother_cnic', 'CNIC *', ['class' => 'control-label', 'style' => ""]) !!}
                {!! Form::text('mother_cnic', old('mother_cnic') ,['class' => 'form-control cnicmask', 'placeholder' => 'e.g 35202-1234567-1']) !!}
                @if ($errors->has('mother_cnic'))
                    <div class="text-danger">{{ $errors->first('mother_cnic') }}</div>
                @endif
            </div>
            <div class="{{ $errors->has('mother_education') ? 'text-danger' : '' }} form-group col-md-3" id="mother_education_div">
                {!! Form::label('mother_education', 'Qualification *', ['class' => 'control-label', 'style' => ""]) !!}
                {!! Form::select('mother_education', array('' => 'Select a Qualification') + \Config::get('admin.education_level_array'), old('mother_education'), ['class' => 'form-control']) !!}
                @if ($errors->has('mother_education'))
                    <div class="text-danger">{{ $errors->first('mother_education') }}</div>
                @endif
            </div>     
            <div class="{{ $errors->has('mother_professional_status') ? 'text-danger' : '' }} form-group col-md-3" id="mother_professional_status_status_div">
                {!! Form::label('mother_professional_status', 'Professional Status *', ['class' => 'control-label', 'style' => ""]) !!}
                {!! Form::select('mother_professional_status', array('' => 'Select a Status') + \Config::get('admin.professional_status_array'), old('mother_professional_status'), ['class' => 'form-control']) !!}
                @if ($errors->has('mother_professional_status'))
                    <div class="text-danger">{{ $errors->first('mother_professional_status') }}</div>
                @endif
            </div> 

        </div>
    </div>
  </div>
</div>