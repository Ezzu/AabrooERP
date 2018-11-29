@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">SW Employees</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Create New SW Employee</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.swemployees.index') }}">Back</a>
        </div>
        {!! Form::open(['route' => 'admin.swemployees.store']) !!}
            <div class="box-body table-responsive">
                @include('admin.swemployees.fields')
            </div>
            <div class="box-footer">
                <button class="btn btn-danger"> Save </button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script type="javascript/text" src="{{ asset('js\admin\swemployees\create_modify.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@stop