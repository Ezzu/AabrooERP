@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Employees</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Update Employee</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.employees.index') }}">Back</a>
        </div>
        {!! Form::Model($Employee, ['route' => ['admin.employees.update', $Employee->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'employees-form']) !!}
            <div class="box-body table-responsive">
                
                @include('admin.employees.fields')
                
            </div>
            <div class="box-footer">
                <button class="btn btn-danger" type="submit" onclick="document.getElementById('employees-form').submit();"> Save </button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js\admin\employees\create_modify.js') }}"></script>
@stop