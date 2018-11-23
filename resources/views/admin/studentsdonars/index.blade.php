@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Students Sponsership</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.students_donars.create') }}">Sponser a Student</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered {{ count($StudentsDonars) ? 'datatables' : '' }}" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Donar Name</th>
                        <th>Donar Contact</th>
                        <th>Sponser Type</th>
                        <th>Fee</th>
                        <th>St. Name</th>
                        <th>St. Roll#</th>
                        <th>St. Class</th>
                        <th>Sponsership Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($StudentsDonars as $StudentDonar)
                        <tr>
                            <td>{{ $StudentDonar->id }}</td>
                            <td>{{ $StudentDonar->donar->donar_name }}</td>
                            <td>{{ $StudentDonar->donar->cell_no }}</td>
                            <td>{{ \Config::get('admin.sponser_type_array.'.$StudentDonar->sponser_type) }}</td>
                            <td>Rs. {{ $StudentDonar->donar->fee_per_child }} /-</td>
                            <td>{{ $StudentDonar->student->name }}</td>
                            <td>{{ $StudentDonar->student->roll_no }}</td>
                            <td>{{ config('admin.class_array.'.$StudentDonar->student->class) }}</td>
                            <td>{{ $StudentDonar->created_at }}</td>
                            <td>
                                <form action="{{ route('admin.students_donars.destroy', ['id' => $StudentDonar->id]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class='btn btn-danger btn-xs' style='margin-top: 3px;' onclick='confirm("Are you sure you want to perform this action ?")'><i class="fa fa-trash" aria-hidden="true"></i> Unlink</button>
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
    <script type="javascript/text" src="{{ asset('js\admin\students_donars\list.js') }}"></script>
    <script>
        $('#users-table').DataTable({
            // processing: true,
            // serverSide: true,
            // ajax:{
            //     type: 'POST',
            //     url: 'students_donars/datatables',
            //     data: {
            //         _token: $('input[name=_token]').val()
            //     }
            // },
            // columns: [
            //     {data: 'id', name: 'id'},
            //     {data: 'donar_name', name: 'donar_name'},
            //     {data: 'donar_contact', name: 'donar_contact'},
            //     {data: 'student_name', name: 'student_name'},
            //     {data: 'student_roll_no', name: 'student_roll_no'},
            //     {data: 'student_class', name: 'student_class'},
            //     {data: 'sponsership_date', name: 'sponsership_date'},
            //     {data: 'action', name: 'action', orderable: false, searchable: false},
            // ]
        });
        $('.select2').Select2();
    </script>
@stop