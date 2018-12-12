<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse4">General Information</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
      
        <div class="{{ $errors->has('permanent_address') ? 'text-danger' : '' }} form-group col-md-6" id="permanent_address_div">
            {!! Form::label('permanent_address', 'Permanent Address *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('permanent_address', old('permanent_address') ,['class' => 'form-control']) !!}
            @if ($errors->has('permanent_address'))
                <div class="text-danger">{{ $errors->first('permanent_address') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('phone_no') ? 'text-danger' : '' }} form-group col-md-3" id="phone_no_div">
            {!! Form::label('phone_no', 'Phone *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('phone_no', old('phone_no') ,['class' => 'form-control']) !!}
            @if ($errors->has('phone_no'))
                <div class="text-danger">{{ $errors->first('phone_no') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('cell_no') ? 'text-danger' : '' }} form-group col-md-3" id="cell_no_div">
            {!! Form::label('cell_no', 'Cell No *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('cell_no', old('cell_no') ,['class' => 'form-control cellmask']) !!}
            @if ($errors->has('cell_no'))
                <div class="text-danger">{{ $errors->first('cell_no') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('no_of_children') ? 'text-danger' : '' }} form-group col-md-3" id="no_of_children_div">
            {!! Form::label('no_of_children', 'No of Children *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('no_of_children', old('no_of_children') ,['class' => 'form-control']) !!}
            @if ($errors->has('no_of_children'))
                <div class="text-danger">{{ $errors->first('no_of_children') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('male') ? 'text-danger' : '' }} form-group col-md-3" id="male_div">
            {!! Form::label('male', 'Male *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('male', old('male') ,['class' => 'form-control']) !!}
            @if ($errors->has('male'))
                <div class="text-danger">{{ $errors->first('male') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('female') ? 'text-danger' : '' }} form-group col-md-3" id="female_div">
            {!! Form::label('female', 'Female *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('female', old('female') ,['class' => 'form-control']) !!}
            @if ($errors->has('female'))
                <div class="text-danger">{{ $errors->first('female') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('religion') ? 'text-danger' : '' }} form-group col-md-3" id="religion_div">
            {!! Form::label('religion', 'Religion *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('religion', array('' => 'Select a Religion') + \Config::get('admin.religion_array'), old('religion'), ['class' => 'form-control']) !!}
            @if ($errors->has('religion'))
                <div class="text-danger">{{ $errors->first('religion') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('guardian_occupation') ? 'text-danger' : '' }} form-group col-md-3" id="guardian_occupation_div">
            {!! Form::label('guardian_occupation', 'Occupation *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('guardian_occupation', array('' => 'Select an Occupation') + \Config::get('admin.occupation_array'), old('guardian_occupation'), ['class' => 'form-control']) !!}
            @if ($errors->has('guardian_occupation'))
                <div class="text-danger">{{ $errors->first('guardian_occupation') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('residential_status') ? 'text-danger' : '' }} form-group col-md-3" id="residential_status">
            {!! Form::label('residential_status', 'Residential Status *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('residential_status', array('' => 'Select a Status') + \Config::get('admin.residential_status_array'), old('residential_status'), ['class' => 'form-control']) !!}
            @if ($errors->has('residential_status'))
                <div class="text-danger">{{ $errors->first('residential_status') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('father_income') ? 'text-danger' : '' }} form-group col-md-3" id="father_income">
            {!! Form::label('father_income', 'Father Income *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('father_income', array('' => 'Select a Range') + \Config::get('admin.income_array'), old('father_income'), ['class' => 'form-control']) !!}
            @if ($errors->has('father_income'))
                <div class="text-danger">{{ $errors->first('father_income') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('father_income') ? 'text-danger' : '' }} form-group col-md-3" id="mother_income">
            {!! Form::label('mother_income', 'Mother Income *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('mother_income', array('' => 'Select a Range') + \Config::get('admin.income_array'), old('mother_income'), ['class' => 'form-control']) !!}
            @if ($errors->has('mother_income'))
                <div class="text-danger">{{ $errors->first('mother_income') }}</div>
            @endif
        </div>    
        <div class="{{ $errors->has('other_income') ? 'text-danger' : '' }} form-group col-md-3" id="other_income">
            {!! Form::label('other_income', 'Other Income *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('other_income', array('' => 'Select a Range') + \Config::get('admin.income_array'), old('other_income'), ['class' => 'form-control']) !!}
            @if ($errors->has('other_income'))
                <div class="text-danger">{{ $errors->first('other_income') }}</div>
            @endif
        </div>   

      </div>
    </div>
  </div>
</div>