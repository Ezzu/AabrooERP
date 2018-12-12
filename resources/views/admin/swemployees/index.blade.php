@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">SW Employees</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.swemployees.create') }}">Add New SW Employee</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Employee Name</th>
                        <th>Contact</th>
                        <th>Area(s)</th>
                        <th>Day</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($SWEmployees as $Employee)
                        <tr>
                            <td>{{ $Employee->id }}</td>
                            <td>{{ App\Models\Admin\EmployeesModel::getEmployeeNameById($Employee->employee_id) }}</td>
                            <td>{{ $Employee->emergency_contact }}</td>
                            <td>
                                @if($Employee->areas)
                                    <ol>
                                        @foreach($Employee->areas as $employee_area)
                                            <li>{{ $employee_area->name }}</li>
                                        @endforeach
                                    </ol>
                                @else
                                    'Not Specified'
                                @endif
                            </td>
                            <td>{{ isset($Employee->working_day->name) ? $Employee->working_day->name : 'Not Specified' }}</td>
                            <td>{{ $Employee->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.swemployees.edit', ['id' => $Employee->id]) }}" class='btn btn-xs btn-info'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                <form action="{{ route('admin.swemployees.destroy', ['id' => $Employee->id]) }}" method="post">
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
    <script type="javascript/text" src="{{ asset('js\admin\swemployees\list.js') }}"></script>
    <script>
        var FormControls = function(){
            $('#users-table').DataTable();

        }();

        $(document).ready(function(){

        });
    </script>
@stop