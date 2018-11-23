<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse6">Medical Status</a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse">
      <div class="panel-body">
      
        <div class="{{ $errors->has('mother_education') ? 'text-danger' : '' }} form-group col-md-3" id="eyesight_div">
            {!! Form::label('eyesight', 'Eyesight', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('eyesight', array('' => 'Select a Status') + \Config::get('admin.normal_week_array'), old('mother_education'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('eyesight'))
                <div class="text-danger">{{ $errors->first('eyesight') }}</div>
            @endif
        </div>    
        <div class="{{ $errors->has('mother_education') ? 'text-danger' : '' }} form-group col-md-3" id="hearing_div">
            {!! Form::label('hearing', 'Hearing', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('hearing', array('' => 'Select a Status') + \Config::get('admin.normal_week_array'), old('mother_education'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('hearing'))
                <div class="text-danger">{{ $errors->first('hearing') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('mother_cnic') ? 'text-danger' : '' }} form-group col-md-3" id="weight_div">
            {!! Form::label('weight', 'Weight', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('weight', old('weight'), ['class' => 'form-control']) !!}
            @if ($errors->has('weight'))
                <div class="text-danger">{{ $errors->first('weight') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('mother_cnic') ? 'text-danger' : '' }} form-group col-md-3" id="height_div">
            {!! Form::label('height', 'Height', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('height', old('height'), ['class' => 'form-control']) !!}
            @if ($errors->has('height'))
                <div class="text-danger">{{ $errors->first('height') }}</div>
            @endif
        </div>

      </div>
    </div>
  </div>
</div>