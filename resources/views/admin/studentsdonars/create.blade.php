@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Students Sponsership</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Sponser New Student</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.students_donars.index') }}">Back</a>
        </div>
        {!! Form::open(['route' => 'admin.students_donars.store']) !!}
            <div class="box-body table-responsive">
                @include('admin.studentsdonars.fields')
            </div>
            <div class="box-footer">
                <button class="btn btn-danger"> Save </button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script>
        $('#users-table').DataTable();
        $('.select2').select2();
    </script>
@stop