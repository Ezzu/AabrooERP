@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Students</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.employees.create') }}">Add New Employee</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered {{ count($Employees) ? 'datatables' : '' }}" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Employee Name</th>
                        <th>Father Name</th>
                        <th>Qualification</th>
                        <th>DOJ</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Employees as $Employee)
                    <tr>
                        <td>{{ $Employee->id }}</td>
                        <td>{{ $Employee->name }}</td>
                        <td>{{ $Employee->father_name }}</td>
                        <td>
                            @if(\App\Models\Admin\QualificationsModel::getLastQualificationByEmployeeId($Employee->id))
                                {{ \App\Models\Admin\QualificationsModel::getLastQualificationByEmployeeId($Employee->id)->title }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ date('F d, Y', strtotime($Employee->date_of_joining)) }}</td>
                        <td>{{ $Employee->contact }}</td>
                        <td>{{ $Employee->permanent_address }}</td>
                        <td>{{ $Employee->created_at }}</td>
                        <td>
                            
                            <a href="{{ route('admin.employees.edit', ['id' => $Employee->id]) }}" class='btn btn-xs btn-info' style='margin-top: 3px;'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            <form action="{{ route('admin.employees.destroy', ['id' => $Employee->id]) }}" method="POST">
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
    <script type="javascript/text" src="{{ asset('js\admin\students\list.js') }}"></script>
    <script>
        $('.datatables').DataTable({
            // processing: true,
            // serverSide: true,
            // ajax:{
            //     type: 'POST',
            //     url: '',
            //     data: {

            //     }
            // },
            // columns: {
            //     {}
            // }
        });
    </script>
@stop