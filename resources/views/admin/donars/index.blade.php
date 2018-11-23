@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Donars</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.donars.create') }}">Add New Donar</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Donar Name</th>
                        <th>Sponsership Date</th>
                        <th>Contact</th>
                        <th># of Sponsers</th>
                        <th>Fee/Child</th>
                        <th>Payment Method</th>
                        <th>Created At</th>
                        <th>Modified At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Donars as $Donar)
                        <tr>
                            <td>{{ $Donar->id }}</td>
                            <td>{{ $Donar->donar_name }}</td>
                            <td>{{ date('F d, Y', strtotime($Donar->sponsership_date)) }}</td>
                            <td>{{ $Donar->phone_no }}</td>
                            <td>{{ \App\Models\Admin\StudentsDonarsModel::getSponserCountByDonarId($Donar->id) }}</td>
                            <td>{{ $Donar->fee_per_child }}</td>
                            <td>{{ \App\Models\Admin\PaymentTypesModel::getPaymentTypeByID($Donar->payment_type_id) }}</td>
                            <td>{{ $Donar->created_at }}</td>
                            <td>{{ $Donar->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.donars.edit', ['id' => $Donar->id]) }}" class='btn btn-xs btn-info'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                <form action="{{ route('admin.donars.destroy', ['id' => $Donar->id]) }}">
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
    <script type="javascript/text" src="{{ asset('js\admin\areas\list.js') }}"></script>
    <script>
        var FormControls = function(){
            $('#users-table').DataTable();

        }();

        $(document).ready(function(){

        });
    </script>
@stop