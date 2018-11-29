@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Students</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Update Student</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.students.index') }}">Back</a>
        </div>
        {!! Form::Model($Student, ['route' => ['admin.students.update', $Student->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            <div class="box-body table-responsive">
                
                @include('admin.students.information_fields')
                @include('admin.students.father_fields')
                @include('admin.students.mother_fields')
                @include('admin.students.general_fields')
                @include('admin.students.guarantor_fields')
                @include('admin.students.medical_fields')
                
            </div>
            <div class="box-footer">
                <button class="btn btn-danger"> Save </button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js\admin\students\create_modify.js') }}"></script>
@stop