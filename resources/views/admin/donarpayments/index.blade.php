@inject('request', 'Illuminate\Http\Request')
@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1 style="margin-bottom: 15px;">Donar Payments</h1>
    {!! Form::open(['method' => 'POST', 'route' => 'admin.donar_payments.filter', 'id' => 'validation-form']) !!}
        {{csrf_field()}}

        <div class="form-group col-md-3 @if($errors->has('payment_status')) has-error @endif" id="payment_status_div">
            {!! Form::label('payment_status', 'Payment Status *', ['class' => 'control-label']) !!}
            {!! Form::select('payment_status', array('' => 'Choose a Status') + Config::get('admin.payment_status_array') , old('month'),
            ['class' => 'form-control select2'  ,'id' => 'payment_status']) !!}
        </div>

        <div class="form-group col-md-3 @if($errors->has('sponser_type')) has-error @endif" id="sponser_type_div">
            {!! Form::label('sponser_type', 'Sponser Type *', ['class' => 'control-label']) !!}
            {!! Form::select('sponser_type', array('' => 'Choose a Type') + Config::get('admin.sponser_type_array') , old('sponser_type'),
            ['class' => 'form-control select2'  ,'id' => 'sponser_type']) !!}
        </div>

        <div class="form-group col-md-3 @if($errors->has('class')) has-error @endif" id="class_div">
            {!! Form::label('class', 'Student Class *', ['class' => 'control-label']) !!}
            {!! Form::select('class', array('' => 'Choose a Class') + Config::get('admin.class_array') , old('class'),
            ['class' => 'form-control select2'  ,'id' => 'class']) !!}
        </div>

        <button id="search_button" style="margin-top: 25px;" class="btn  btn-sm btn-flat btn-primary"><b>&nbsp;Search </b> </button>
    {!! Form::close() !!}
@stop

@section('content')
    <div class="box box-primary">
            @if(count($DonarPayments))
                        <div class="box-header">
                        <i class="fa fa-money" aria-hidden="true"></i> <h3 class="box-title">Donar Payments</h3>
                        <a class="btn btn-success pull-right" href="{{ route('admin.donar_payments.create') }}"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="panel-body pad table-responsive">
                            <table class="table table-striped" id="users-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Donar - Student</th>
                                        <th>Class</th>
                                        <th>Roll#</th>
                                        <th>Sponser Type</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($DonarPayments as $payment)
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->student_sponsership->donar->donar_name }} - {{ $payment->student_sponsership->student->name }}</td>
                                            <td>{{ config::get('admin.class_array.'.$payment->student_sponsership->student->class) }}</td>
                                            <td>{{ $payment->student_sponsership->student->roll_no }}</td>
                                            <td>{{ config('admin.sponser_type_array.'.$payment->student_sponsership->sponser_type) }}</td>
                                            <td>{{ \App\Models\Admin\PaymentTypesModel::getPaymentTypeByID($payment->student_sponsership->donar->payment_type_id) }}</td>
                                            <td>{{ config::get('admin.payment_status_array.'.$payment->payment_status) }}</td>
                                            <td>{{ $payment->created_at }}</td>
                                            <td>
                                            @if($payment->payment_status)
                                                <a href="{{ route('admin.donar_payments.active', ['id' => $payment->id]) }}" onclick = "confirm('Are you sure you want to undo ?')" class='btn btn-xs btn-warning' style='margin-top: 3px;'><i class="fa fa-times" aria-hidden="true"></i> Undo</a>
                                            @else
                                                <a href="{{ route('admin.donar_payments.inactive', ['id' => $payment->id]) }}" onclick = "confirm('Are you sure you want to make payment ?')" class='btn btn-xs btn-success' style='margin-top: 3px;'><i class="fa fa-check" aria-hidden="true"></i> Pay</a>
                                            @endif
                                            </td>
                                        </tr>
                                            @endforeach
                                </tbody>
                            </table>
                        </div>
            @else
                <div class="box-header text-center">
                    No Record Found
                </div>
            @endif
    </div>
@stop

@section('js')
    @include('partials.datatablesextensions')
    <script type="javascript/text" src="{{ asset('js\admin\donarpayments\list.js') }}"></script>
    <script>
        $('.select2').select2();
        $('#users-table').DataTable();
    </script>
@endsection