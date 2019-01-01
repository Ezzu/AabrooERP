@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Areas</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.areas.create') }}">Add New Area</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Area Name</th>
                        <th>Created At</th>
                        <th>Modified At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Areas as $Area)
                        <tr>
                            <td>{{ $Area->id }}</td>
                            <td>{{ $Area->name }}</td>
                            <td>{{ $Area->created_at }}</td>
                            <td>{{ $Area->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.areas.edit', ['id' => $Area->id]) }}" style="float:left; margin: 2px;" class='btn btn-xs btn-info'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                @if($Area->status)
                                    <a href="{{ route('admin.areas.inactive', ['id' => $Area->id]) }}" style="float:left; margin: 2px;"  class='btn btn-xs btn-warning' style='margin-top: 3px;'><i class="fa fa-times" aria-hidden="true"></i> Deactivate</a>
                                @else
                                    <a href="{{ route('admin.areas.active', ['id' => $Area->id]) }}" style="float:left; margin: 2px;"  class='btn btn-xs btn-warning' style='margin-top: 3px;'><i class="fa fa-check" aria-hidden="true"></i> Activate</a>
                                @endif
                                
                                <form action="{{ route('admin.areas.destroy', ['id' => $Area->id]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class='btn btn-danger btn-xs' style="float:left; margin: 2px;" onclick='confirm("Are you sure you want to perform this action ?"'><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
    <script type="javascript/text" src="{{ asset('js\admin\areas\list.js') }}"></script>
    <script>
        var FormControls = function(){
            $('#users-table').DataTable();

        }();

        $(document).ready(function(){
            
        });
    </script>
@stop