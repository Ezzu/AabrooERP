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
            <a class="btn btn-success pull-right" href="{{ route('admin.students.create') }}">Add New Student</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered {{ count($Students) ? 'datatables' : '' }}" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Age</th>
                        <th>Class</th>
                        <th>Shift</th>
                        <th>Admission Date</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Students as $Student)
                    <tr>
                        <td>{{ $Student->id }}</td>
                        <td>{{ $Student->name }}</td>
                        <td>{{ $Student->father_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($Student->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y Years') }}</td>
                        <td>{{ Config::get('admin.class_array.'.$Student->class) }}</td>
                        <td>{{ Config::get('admin.shift_array.'.$Student->shift) }}</td>
                        <td>{{ date('F d, Y', strtotime($Student->admission_date)) }}</td>
                        <td>{{ $Student->cell_no }}</td>
                        <td>{{ $Student->permanent_address }}</td>
                        <td>{{ $Student->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.students.print', ['id' => $Student->id]) }}" target='_blank' class='btn btn-xs btn-primary'><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                            <a href="{{ route('admin.students.edit', ['id' => $Student->id]) }}" class='btn btn-xs btn-info' style='margin-top: 3px;'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            <form action="{{ route('admin.students.destroy', ['id' => $Student->id]) }}">
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