@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Students</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Create New Student</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.students.index') }}">Back</a>
        </div>
        {!! Form::open(['route' => 'admin.students.store', 'enctype' => 'multipart/form-data']) !!}
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
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script>
        $(".cnicmask").inputmask("99999-9999999-9");
        $(".cellmask").inputmask("0399-9999999");
        $(".datemask").inputmask("9999-99-99");
        $('.select2').select2();
    </script>
@stop