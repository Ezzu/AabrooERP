@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Job Titles</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Create New Job Title</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.departments.index') }}">Back</a>
        </div>
        {!! Form::model($JobTitle, ['method' => 'PUT', 'route' => ['admin.job_titles.update', $JobTitle->id]]) !!}
            <div class="box-body table-responsive">
                @include('admin.jobtitles.fields')
            </div>
            <div class="box-footer">
                <button class="btn btn-danger"> Save </button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script>
        var FormControls = function(){
            $('.select2').select2();
            $( ".datetimepicker" ).datepicker({
                format: "mm-dd-yyyy",
                weekStart: 0,
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                rtl: true,
                orientation: "auto"
            });

        }();

        $(document).ready(function(){
            
        });
    </script>
@stop