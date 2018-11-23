@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Payment Methods</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-list" style="padding-top: 6px;" aria-hidden="true"></i>
            <h3 class="box-title" style="padding-top: 6px;">List</h3>
            <a class="btn btn-success pull-right" href="{{ route('admin.payment_types.create') }}">Add New Payment Method</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table-stripped table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Payment Method Name</th>
                        <th>Created At</th>
                        <th>Modified At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($PaymentTypes as $PaymentType)
                        <tr>
                            <td>{{ $PaymentType->id }}</td>
                            <td>{{ $PaymentType->name }}</td>
                            <td>{{ $PaymentType->created_at }}</td>
                            <td>{{ $PaymentType->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.payment_types.edit', ['id' => $PaymentType->id]) }}" class='btn btn-xs btn-info'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                <form action="{{ route('admin.payment_types.destroy', ['id' => $PaymentType->id]) }}">
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
        $('#users-table').DataTable();
    </script>
@stop