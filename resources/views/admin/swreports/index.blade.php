@inject('request', 'Illuminate\Http\Request')
@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">SW Management Report</h1>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.swreport.search'], 'id' => 'validation-form']) !!}
        {{csrf_field()}}

        <div class="form-group col-md-3 @if($errors->has('month')) has-error @endif" id="month_div">
            {!! Form::label('month', 'Month *', ['class' => 'control-label']) !!}
            {!! Form::select('month', array('' => 'Choose a Month') + Config::get('admin.month_array') , old('month'),
            ['class' => 'form-control select2'  ,'id' => 'month']) !!}
        </div>

        <div class="form-group col-md-3 @if($errors->has('year')) has-error @endif" id="year_div">
            {!! Form::label('year', 'Year *', ['class' => 'control-label']) !!}
            {!! Form::select('year', array('' => 'Choose an Year') + Config::get('admin.year_array') , old('year'),
            ['class' => 'form-control select2'  ,'id' => 'year']) !!}
        </div>

        <div class="form-group col-md-3 @if($errors->has('employee_id')) has-error @endif" id="employee_id_div">
            {!! Form::label('employee_id', 'Employee *', ['class' => 'control-label']) !!}
            {!! Form::select('employee_id', $Employees, old('employee_id'),
            ['class' => 'form-control select2'  ,'id' => 'employee_id']) !!}
        </div>

        <button id="search_button" style="margin-top: 25px;" class="btn  btn-sm btn-flat btn-primary"><b>&nbsp;Search </b> </button>
    {!! Form::close() !!}
@stop

@section('content')
<style>
.DTFC_LeftBodyLiner{
    top: -13px !important;
}
</style>
    <div class="clear-fix"></div>

    <div class="box box-primary">
            @if(isset($Reports) && $Reports)
                        <div class="box-header">
                            <i class="fa fa-user"></i> <h3 class="box-title">SW Management Report</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="panel-body pad table-responsive">
                            <table class="table table-striped" id="tablewithextensions" >
                                <thead>
                                    <tr>
                                        <th style='background: #666; color: white;'>Employee : {{ $Reports['employee']->name }}</th>
                                        <th>Day : {{ $Reports['day'] }}</th>
                                        <th>Month : {{ Config::get('admin.month_array.'.$Reports['month']) }}</th>
                                        @for($i=0; $i<=count($Reports['dates']) + 1; $i++)
                                            <td>&nbsp;</td>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style='background: #666; color: white;'>{{ Config::get('admin.month_array.'.$Reports['month']) }} {{ $Reports['year'] }}</th>
                                        <th>Donar Name</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Remarks</th>
                                        @foreach($Reports['dates'] as $date_day)
                                           {{-- <th>{{ $date_day[0].'-'.$Reports['month'].'-'.$Reports['year'] }}</th> --}}
                                           <th>{{ $date_day[0] }}</th>
                                        @endforeach
                                    </tr>
                                    <?php $count=0; ?>
                                    @foreach(array_keys($Reports['donars']) as $area)
                                        <tr>
                                            <td style='background: #666; color: white;'>{{ $area }}</td>
                                            @for($i=0; $i<=count($Reports['dates'])+3; $i++)
                                                <td>&nbsp;</td>
                                            @endfor
                                        </tr>
                                        @if($Reports['donars'][$area])
                                            @foreach($Reports['donars'][$area] as $donar)
                                                <tr>
                                                    <td>{{ strval(++$count) }}</td>
                                                    <td>{{ $donar->donar_name }}</td>
                                                    <td>{{ $donar->address }}</td>
                                                    <td>@if($donar->phone_no) {{ strval($donar->phone_no) }} @else {{ strval($donar->cell_no) }} @endif</td>
                                                    <td>{{ $donar->cnic }}</td>
                                                    @for($i=0; $i < count($Reports['dates']); $i++)
                                                        <td>&nbsp;</td>
                                                    @endfor
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            @else
                <div class="box-header text-center">
                    No Record Found
                </div>
            @endif
    </div>
@stop

@section('js')
    @include('partials.datatablesextensions')
    <script type="javascript/text" src="{{ asset('js\admin\swreports\list.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection