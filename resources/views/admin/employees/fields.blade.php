        {{ csrf_field() }}
        <div class="{{ $errors->has('branch_id') ? 'text-danger' : '' }} form-group col-md-3" id="branch_id_div">
            {!! Form::label('branch_id', 'Branch *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('branch_id', $Branches, old('branch_id'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('branch_id'))
                <div class="text-danger">{{ $errors->first('branch_id') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('department_id') ? 'text-danger' : '' }} form-group col-md-3" id="department_div">
            {!! Form::label('department_id', 'Department *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('department_id', $Departments, old('department_id'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('department_id'))
                <div class="text-danger">{{ $errors->first('department_id') }}</div>
            @endif
        </div> 
        <div class="{{ $errors->has('job_title_id') ? 'text-danger' : '' }} form-group col-md-3" id="job_title_div">
            {!! Form::label('job_title_id', 'Designation *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('job_title_id', $JobTitles, old('job_title_id'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('job_title_id'))
                <div class="text-danger">{{ $errors->first('job_title_id') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('image') ? 'text-danger' : '' }} form-group col-md-3" id="image_div">
            <img src="{{ isset($Employee) ? asset($Employee->image) : '' }}" style="border: 1px solid #aaa; width: 110px; height: 100px; margin-left: 50px;" id="image_previewer">
        </div>
        <div class="{{ $errors->has('date_of_joining') ? 'text-danger' : '' }} form-group col-md-3" id="date_of_joining_div">
            {!! Form::label('date_of_joining', 'DOJ *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('date_of_joining', old('date_of_joining') ,['class' => 'form-control datetimepicker']) !!}
            @if ($errors->has('date_of_joining'))
                <div class="text-danger">{{ $errors->first('date_of_joining') }}</div>
            @endif
        </div>      
        <div class="{{ $errors->has('name') ? 'text-danger' : '' }} form-group col-md-3" id="name_div">
            {!! Form::label('name', 'Name *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('name', old('user_id') ,['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('father_name') ? 'text-danger' : '' }} form-group col-md-3" id="father_name_div">
            {!! Form::label('father_name', 'Father Name *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('father_name', old('father_name') ,['class' => 'form-control']) !!}
            @if ($errors->has('father_name'))
                <div class="text-danger">{{ $errors->first('father_name') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('gender') ? 'text-danger' : '' }} form-group col-md-3" id="gender_div">
            {!! Form::label('gender', 'Gender *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('gender', array('' => 'Select a Gender') + \Config::get('admin.gender_array'), old('gender'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('gender'))
                <div class="text-danger">{{ $errors->first('gender') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('cnic') ? 'text-danger' : '' }} form-group col-md-3" id="cnic_div">
            {!! Form::label('cnic', 'CNIC *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('cnic', old('cnic') ,['class' => 'form-control']) !!}
            @if ($errors->has('cnic'))
                <div class="text-danger">{{ $errors->first('cnic') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('contact') ? 'text-danger' : '' }} form-group col-md-3" id="contact_div">
            {!! Form::label('contact', 'Contact *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('contact', old('contact') ,['class' => 'form-control']) !!}
            @if ($errors->has('contact'))
                <div class="text-danger">{{ $errors->first('cnic') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('email') ? 'text-danger' : '' }} form-group col-md-3" id="email_div">
            {!! Form::label('email', 'Email *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::email('email', old('email') ,['class' => 'form-control']) !!}
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('permanent_address') ? 'text-danger' : '' }} form-group col-md-3" id="permanent_address_div">
            {!! Form::label('permanent_address', 'Permanent Address *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('permanent_address', old('permanent_address') ,['class' => 'form-control']) !!}
            @if ($errors->has('permanent_address'))
                <div class="text-danger">{{ $errors->first('permanent_address') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('temporary_address') ? 'text-danger' : '' }} form-group col-md-3" id="temporary_address_div">
            {!! Form::label('temporary_address', 'Temporary Address *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('permanent_address', old('temporary_address') ,['class' => 'form-control']) !!}
            @if ($errors->has('temporary_address'))
                <div class="text-danger">{{ $errors->first('temporary_address') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('city') ? 'text-danger' : '' }} form-group col-md-3" id="city_div">
            {!! Form::label('city', 'City *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('city', old('city') ,['class' => 'form-control']) !!}
            @if ($errors->has('city'))
                <div class="text-danger">{{ $errors->first('city') }}</div>
            @endif
        </div>
        <div class="clearfix"></div>
        <div class="panel-body pad table-responsive">
            <button onclick="FormControls.createLineItem();" style="margin-bottom: 5px;" class="btn pull-right btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i>&nbsp;Add <u>R</u>ow</button>
                <table class="table table-bordered table-striped" id="qualifications-table">
                    <thead>
                        <tr>
                            <th>SrNo.</th>
                            <th>Degree Title</th>
                            <th>Passing Year</th>
                            <th>Division</th>
                            <th>Institution</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $counter=0 ?>
                        @if(count($Qualifications) )
                            @foreach($Qualifications as $key => $val)
                                <?php  $counter++ ?>
                                <tr id="line_item-{{$counter}}" >
                                    <td>
                                        {{$counter}}
                                    </td>
                                    <td>
                                        <div class="form-group  @if($errors->has('line_title')) has-error @endif">
                                            {!! Form::text('line_items[title]['.$counter.']',  $val->title, ['id' => 'line_item-title_id-1','class' => 'form-control']) !!}
                                            @if($errors->has('line_title'))
                                                <span class="help-block">
                                                    {{ $errors->first('line_title') }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  @if($errors->has('line_passing_year')) has-error @endif">
                                            {!! Form::number('line_items[passing_year]['.$counter.']',  $val->passing_year, ['id' => 'line_item-passing_year_id-1','class' => 'form-control']) !!}
                                            @if($errors->has('line_passing_year'))
                                                <span class="help-block">
                                                    {{ $errors->first('line_passing_year') }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  @if($errors->has('division')) has-error @endif">
                                            {!! Form::select('line_items[division]['.$counter.']', array('' => 'Select a Division') + config('admin.division_array'), $val->division, ['id' => 'line_item-division_id-1','class' => 'form-control' ]) !!}
                                            @if($errors->has('line_division'))
                                                <span class="help-block">
                                                    {{ $errors->first('line_division') }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  @if($errors->has('institution')) has-error @endif">
                                            {!! Form::text('line_items[institution]['.$counter.']',  $val->institution, ['id' => 'line_item-institution_id-1','class' => 'form-control']) !!}
                                            @if($errors->has('line_institution'))
                                                <span class="help-block">
                                                    {{ $errors->first('line_institution') }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td><button id="line_item-del_btn-{{$counter}}" onclick="FormControls.destroyLineItem('{{$counter}}');" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                    <td><input type="hidden" id="q_id-{{$counter}}" value="{{ $val->id }}"></td>
                                </tr>
                            @endforeach
                        @endif
                        <input type="hidden" id="line_item-global_counter" value="<?php  echo ++$counter ?>"   />
                    </tbody>
                </table>
                
                    <table>
                        <tbody id="line_item-container" style='display:none'>
                            <tr class="line_item-container-{{$counter}}" id="line_item-######">
                                <td>
                                    <p id="line_item-no-######">{{$counter-1}}</p>
                                </td>
                                <td >
                                    <div class="form-group" style="margin-bottom: 0px !important;">
                                        <div class="form-group" style="margin-bottom: 0px !important;">
                                        
                                            {!! Form::text('line_items[title][######]',  old('title'), ['id' => 'line_item-title_id-######','class' => 'form-control', 'required' => 'true']) !!}
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px !important;" >

                                        {!! Form::number('line_items[passing_year][######]',  old('passing_year'), ['id' => 'line_item-passing_year_id-######','class' => 'form-control', 'required' => 'true']) !!}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px !important;" >

                                        {!! Form::select('line_items[division][######]', array('' => 'Select a Division') + Config::get('admin.division_array'), old('division'), ['id' => 'line_item-division_id-######','class' => 'form-control', 'required' => 'true']) !!}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px !important;" >

                                        {!! Form::text('line_items[institution][######]',  old('institution'), ['id' => 'line_item-institution_id-######','class' => 'form-control', 'required' => 'true']) !!}

                                    </div>
                                </td>

                                <td><button id="line_item-del_btn-######" onclick="FormControls.destroyLineItem('######');" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                <td><input type="hidden" id="q_id-######" value="not_applicable"></td>
                            </tr>
                        </tbody>
                    </table>
        </div>

        <div class="{{ $errors->has('bank_id') ? 'text-danger' : '' }} form-group col-md-3" id="bank_id_div">
            {!! Form::label('bank_id', 'Bank *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::select('bank_id', $Banks, old('gender'), ['class' => 'form-control select2']) !!}
            @if ($errors->has('bank_id'))
                <div class="text-danger">{{ $errors->first('bank_id') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('account_no') ? 'text-danger' : '' }} form-group col-md-3" id="account_no_div">
            {!! Form::label('account_no', 'Account No *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::text('account_no', old('account_no') ,['class' => 'form-control']) !!}
            @if ($errors->has('account_no'))
                <div class="text-danger">{{ $errors->first('account_no') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('basic_salary') ? 'text-danger' : '' }} form-group col-md-3" id="basic_salary_div">
            {!! Form::label('basic_salary', 'Basic Salary *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('basic_salary', old('basic_salary') ,['class' => 'form-control']) !!}
            @if ($errors->has('basic_salary'))
                <div class="text-danger">{{ $errors->first('basic_salary') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('medical_allowance') ? 'text-danger' : '' }} form-group col-md-3" id="medical_allowance_div">
            {!! Form::label('medical_allowance', 'Medical Allowance *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('medical_allowance', old('medical_allowance') ,['class' => 'form-control']) !!}
            @if ($errors->has('medical_allowance'))
                <div class="text-danger">{{ $errors->first('medical_allowance') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('conveyance') ? 'text-danger' : '' }} form-group col-md-3" id="medical_allowance_div">
            {!! Form::label('conveyance', 'Conveyance *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::number('conveyance', old('conveyance') ,['class' => 'form-control']) !!}
            @if ($errors->has('conveyance'))
                <div class="text-danger">{{ $errors->first('medical_allowance') }}</div>
            @endif
        </div>
        <div class="{{ $errors->has('image') ? 'text-danger' : '' }} form-group col-md-3" id="image_div">
            {!! Form::label('image', 'Choose an Image *', ['class' => 'control-label', 'style' => ""]) !!}
            {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
            @if ($errors->has('image'))
                <div class="text-danger">{{ $errors->first('image') }}</div>
            @endif
        </div>