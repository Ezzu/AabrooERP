@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Job Title</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.job_titles.create') }}">Add New Job Title</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Job Title</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($JobTitles as $JobTitle)
                        <tr>
                            <td>{{ $JobTitle->id }}</td>
                            <td>{{ $JobTitle->name }}</td>
                            <td>{{ $JobTitle->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.job_titles.edit', ['id' => $JobTitle->id]) }}" class='btn btn-xs btn-info'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                <br>
                                @if($JobTitle->status)
                                    <a href="{{ route('admin.job_titles.inactive', ['id' => $JobTitle->id]) }}" class='btn btn-xs btn-warning' style='margin-top: 3px;'><i class="fa fa-times" aria-hidden="true"></i> Deactivate</a>
                                @else
                                    <a href="{{ route('admin.job_titles.active', ['id' => $JobTitle->id]) }}" class='btn btn-xs btn-warning' style='margin-top: 3px;'><i class="fa fa-check" aria-hidden="true"></i> Activate</a>
                                @endif
                                
                                <form action="{{ route('admin.job_titles.destroy', ['id' => $JobTitle->id]) }}" method="post">
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
    <script type="javascript/text" src="{{ asset('js\admin\departments\list.js') }}"></script>
    <script>
        var FormControls = function(){
            $('#users-table').DataTable();

        }();

        $(document).ready(function(){
            
        });
    </script>
@stop