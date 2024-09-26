@extends('layouts.admin_layout')
@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Admin Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User Accounts</span>
                            <span class="info-box-number">
                                {{$userCount}}
                                <small>accounts</small>

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Instructors</span>
                            <span class="info-box-number">
                                {{$instructorCount}}
                                <small>instructors</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Workout List</span>
                            <span class="info-box-number">
                                {{$workoutCount}}
                                <small>workouts</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Member Lists</span>
                            <span class="info-box-number">
                                {{$memberCount}}
                                <small>members</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button id="weekbtn" class="button">Weekly</button>
                    <button id="monthbtn" class="button active">Monthly</button>
                    <button id="yearbtn" class="button ">Yearly</button>
                    <!-- BAR CHART -->
                    <div id="datamethod1" class="card card-success none">
                        <div class="card-header">
                            <h3 class="card-title">Data For {{$currentYear}} in Week Form</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div id="datamethod2" class="card card-success ">
                        <div class="card-header">
                            <h3 class="card-title">Data For {{$currentMonth}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div id="datamethod3" class="card card-success none">
                        <div class="card-header">
                            <h3 class="card-title">Data For {{$currentYear}} in Yearly Form</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<script src="../js/sweetalert.min.js"></script>
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/chart.js/Chart.min.js"></script>
<script>
    $(function() {

        var areaChartData = {
            labels: ['Monday', 'Tuesday' , 'Wednesday' , 'Thursday' ,'Friday' , 'Saturday' , 'Sunday'],
            datasets: [{
                    label: 'Users',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php for ($i = 1; $i < 7; $i++) : ?>
                            <?php echo $weekUserCount[$i]; ?>
                            <?php if ($i < 7) : ?>
                                <?php echo ","; ?>
                            <?php endif ?>
                        <?php endfor ?>
                    ]
                },
                {
                    label: 'Members',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php for ($i = 1; $i < 7; $i++) : ?>
                            <?php echo $weekMemberCount[$i]; ?>
                            <?php if ($i < 7) : ?>
                                <?php echo ","; ?>
                            <?php endif ?>
                        <?php endfor ?>
                    ]
                },
            ]
        }

        var areaChartData2 = {
            labels: [
                <?php for($startDate ; $startDate < $endDate ; $startDate++) : ?>
                    '<?php echo $currentMonth . '-' . $startDate; ?>',
                <?php endfor ?>
            ],
            datasets: [{
                    label: 'Users',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php for($i = 1 ; $i < $endDate ; $i++) : ?>
                            <?php echo $monthUserCount[$i]; ?>
                            <?php if ($i < $endDate) : ?>
                                <?php echo ","; ?>
                            <?php endif ?>
                        <?php endfor ?>
                    ]
                },
                {
                    label: 'Members',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php for($i = 1 ; $i < $endDate ; $i++) : ?>
                            <?php echo $monthMemberCount[$i]; ?>
                            <?php if ($i < $endDate) : ?>
                                <?php echo ","; ?>
                            <?php endif ?>
                        <?php endfor ?>
                    ]
                },
            ]
        }

        var areaChartData3 = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Auguest', 'September', 'October', 'November', 'December'],
            datasets: [{
                    label: 'Users',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php for ($i = 1; $i < 12; $i++) : ?>
                            <?php echo $yearUserCount[$i]; ?>
                            <?php if ($i < 12) : ?>
                                <?php echo ","; ?>
                            <?php endif ?>
                        <?php endfor ?>
                    ]
                },
                {
                    label: 'Members',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php for ($i = 1; $i < 12; $i++) : ?>
                            <?php echo $yearMemberCount[$i]; ?>
                            <?php if ($i < 12) : ?>
                                <?php echo ","; ?>
                            <?php endif ?>
                        <?php endfor ?>
                    ]
                },
            ]
        }

        //-------------
        //- BAR CHART 1 -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        //-------------
        //- BAR CHART 2 -
        //-------------
        var barChartCanvas = $('#barChart2').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData2)
        var temp0 = areaChartData2.datasets[0]
        var temp1 = areaChartData2.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        //-------------
        //- BAR CHART 3 -
        //-------------
        var barChartCanvas3 = $('#barChart3').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData3)
        var temp0 = areaChartData3.datasets[0]
        var temp1 = areaChartData3.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas3   , {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    })
</script>
@if (Session::has('message'))
<script>
    swal("Message", "{{ Session::get('message') }}", 'success', {
        button: true,
        button: "Ok",
    });
</script>
@endif
@endsection