{{ csrf_field() }}

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Personal Information</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse">
      <div class="panel-body">

        <div class="{{ $errors->has('admission_date') ? 'text-danger' : '' }} form-group col-md-3" id="admission_date_div">
            {!! Form::label('admission_date', 'Admission Date *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('admission_date', old('admission_date') ,['class' => 'form-control datetimepicker datemask', 'placeholder' => 'e.g 2010-06-21']) !!}
            @if ($errors->has('admission_date'))
                <div class="text-danger">{{ $errors->first('admission_date') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('name') ? 'text-danger' : '' }} form-group col-md-3" id="name_div">
            {!! Form::label('name', 'Student Name *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('name', old('name') ,['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('gender') ? 'text-danger' : '' }} form-group col-md-3" id="gender_div">
            {!! Form::label('gender', 'Gender *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('gender', array('' => 'Select a Gender') + \Config::get('admin.gender_array'), old('gender'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('gender'))
                <div class="text-danger">{{ $errors->first('gender') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('image') ? 'text-danger' : '' }} form-group col-md-3" id="image_div">
            <img src="{{ isset($Student) ? asset($Student->image) : '' }}" style="border: 1px solid #aaa; width: 90px; height: 80px; margin-left: 50px;" id="image_previewer">
        </div>  
        <div class="{{ $errors->has('date_of_birth') ? 'text-danger' : '' }} form-group col-md-3" id="date_of_birth_div">
            {!! Form::label('date_of_birth', 'DOB *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('date_of_birth', old('date_of_birth') ,['class' => 'form-control datemask', 'placeholder' => 'e.g 2010-06-21']) !!}
            @if ($errors->has('date_of_birth'))
                <div class="text-danger">{{ $errors->first('date_of_birth') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('cnic') ? 'text-danger' : '' }} form-group col-md-3" id="cnic_div">
            {!! Form::label('cnic', 'CNIC *', ['class' => 'control-label']) !!}
            {!! Form::text('cnic', old('cnic') ,['class' => 'form-control cnicmask', 'placeholder' => 'e.g 35202-1234567-1']) !!}
            @if ($errors->has('cnic'))
                <div class="text-danger">{{ $errors->first('cnic') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('class') ? 'text-danger' : '' }} form-group col-md-3" id="class_div">
            {!! Form::label('class', 'Class *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('class', array('' => 'Select a Class') + \Config::get('admin.class_array'), old('class'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('class'))
                <div class="text-danger">{{ $errors->first('class') }}</div>
            @endif
        </div>     
        <div class="{{ $errors->has('roll_no') ? 'text-danger' : '' }} form-group col-md-3" id="roll_no_div">
            {!! Form::label('roll_no', 'Roll No *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('roll_no', old('roll_no'), ['class' => 'form-control']) !!}
            @if ($errors->has('roll_no'))
                <div class="text-danger">{{ $errors->first('roll_no') }}</div>
            @endif
        </div>  
        <div class="{{ $errors->has('campus') ? 'text-danger' : '' }} form-group col-md-3" id="campus_div">
            {!! Form::label('campus', 'Campus *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('campus', $Campuses, old('campus'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('campus'))
                <div class="text-danger">{{ $errors->first('campus') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('image') ? 'text-danger' : '' }} form-group col-md-3" id="image_div">
            {!! Form::label('image', 'Choose an Image *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
            @if ($errors->has('image'))
                <div class="text-danger">{{ $errors->first('image') }}</div>
            @endif
        </div> 

      </div>
    </div>
  </div>
</div>