@extends('adminlte::page')

@section('title', 'Aabroo Accounts')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title font-weight-bold">System Overview</h3>
        </div>
        <div class="box-body">
            <div class="row">
        
                <div class="col-md-3">        
                    <!-- Apply any bg-* class to to the info-box to color it -->
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Donars</span>
                        <span class="info-box-number">{{ $DonarsCount }}</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>

                <div class="col-md-3">        
                    <!-- Apply any bg-* class to to the info-box to color it -->
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Enrollment</span>
                        <span class="info-box-number">{{ $StudentsCount }}</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>

                <div class="col-md-3">        
                    <!-- Apply any bg-* class to to the info-box to color it -->
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">SPONSERS</span>
                        <span class="info-box-number">{{ $SponsersCount }}</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>     

                <div class="col-md-3">        
                    <!-- Apply any bg-* class to to the info-box to color it -->
                    <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="fa fa-id-badge"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Employees</span>
                        <span class="info-box-number">{{ $EmployeesCount }}</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>       
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header">
                    <div class="box-title">Pie Representation</div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        data = [<?php echo $DonarsCount; ?>, <?php echo $StudentsCount; ?>, <?php echo $SponsersCount; ?>, <?php echo $EmployeesCount; ?>];
        var ctx = document.getElementById('pieChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',

            // The data for our dataset
            data: {
                labels: ["Donars", "Enrollment", "Sponsers", "Employees"],
                datasets: [{
                    label: "System Overview",
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)', 'rgb(54, 102, 235)'],
                    data: data,
                }]
            },

            // Configuration options go here
            options: {
                
            }
        });
    </script>
    <!-- <script type="text/javascript" src="{{ asset('js\admin\dashboard\charts.js') }}"></script> -->
@stop