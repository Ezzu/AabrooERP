@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Donars</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Create New Donar</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.swdonars.index') }}">Back</a>
        </div>
        {!! Form::model($Donar, ['method' => 'PUT', 'route' => ['admin.swdonars.update', $Donar->id]]) !!}
            <div class="box-body table-responsive">
                @include('admin.swdonars.fields')
            </div>
            <div class="box-footer">
                <button class="btn btn-danger"> Save </button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script type="javascript/text" src="{{ asset('js\admin\swdonars\list.js') }}"></script>
    <script>
        var FormControls = function(){
            $('#users-table').DataTable();
            $('.select2').select2();

        }();

        $(document).ready(function(){
            FormControls.init();
        });
    </script>
@stop