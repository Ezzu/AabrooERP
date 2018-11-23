@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Areas</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title" style="padding-top: 6px;">Update Area</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.areas.index') }}">Back</a>
        </div>
        {!! Form::Model($Area, ['route' => ['admin.areas.update', $Area->id], 'method' => 'PUT']) !!}
            <div class="box-body table-responsive">
                @include('admin.areas.fields')
            </div>
            <div class="box-footer">
                <button class="btn btn-danger"> Save </button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')

@stop