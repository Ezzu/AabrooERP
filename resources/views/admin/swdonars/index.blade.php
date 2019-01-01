@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">SW Donars</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.swdonars.create') }}">Add New SW Donar</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Donar Name</th>
                        <th>Contact</th>
                        <th>Area</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($SWDonars as $Donar)
                        <tr>
                            <td>{{ $Donar->id }}</td>
                            <td>{{ $Donar->donar_name }}</td>
                            <td>@if($Donar->phone_no) {{ $Donar->phone_no }} @else {{ $Donar->cell_no }} @endif</td>
                            <td>{{ isset($Donar->area->name) ? $Donar->area->name : 'Not Specified' }}</td>
                            <td>{{ $Donar->address }}</td>
                            <td>{{ $Donar->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.swdonars.edit', ['id' => $Donar->id]) }}" class='btn btn-xs btn-info'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                <form action="{{ route('admin.swdonars.destroy', ['id' => $Donar->id]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class='btn btn-danger btn-xs' style='margin-top: 3px;' onclick='confirm("Are you sure you want to perform this action ?"'><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script type="javascript/text" src="{{ asset('js\admin\swdonars\list.js') }}"></script>
    <script>
        var FormControls = function(){
            $('#users-table').DataTable();

        }();

        $(document).ready(function(){

        });
    </script>
@stop