@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->

    <!-- END page-header -->
    <!-- BEGIN row -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Reporting <small>| Timesheet | Employee Report </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel" id="employeeReportAllJs">


        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5>Year : 2022</h5>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5> Month : September</h5>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5> Department : Service Delivery Department</h5>
                </div>
            </div>
            <table id="summarytable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Employee Name</th>
                        <th class="text-nowrap">Designation</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">1hb</th>
                        <th class="text-nowrap">2hb</th>
                        <th class="text-nowrap">3hb</th>
                        <th class="text-nowrap">4hb</th>
                        <th class="text-nowrap">5hb</th>
                        <th class="text-nowrap">6hb</th>
                        <th class="text-nowrap">7hb</th>
                        <th class="text-nowrap">8hb</th>
                        <th class="text-nowrap">9hb</th>
                        <th class="text-nowrap">10hb</th>
                        <th class="text-nowrap">11hb</th>
                        <th class="text-nowrap">12hb</th>
                        <th class="text-nowrap">13hb</th>
                        <th class="text-nowrap">14hb</th>
                        <th class="text-nowrap">15hb</th>
                        <th class="text-nowrap">16hb</th>
                        <th class="text-nowrap">17hb</th>
                        <th class="text-nowrap">18hb</th>
                        <th class="text-nowrap">19hb</th>
                        <th class="text-nowrap">20hb</th>
                        <th class="text-nowrap">21hb</th>
                        <th class="text-nowrap">22hb</th>
                        <th class="text-nowrap">23hb</th>
                        <th class="text-nowrap">24hb</th>
                        <th class="text-nowrap">25hb</th>
                        <th class="text-nowrap">26hb</th>
                        <th class="text-nowrap">27hb</th>
                        <th class="text-nowrap">28hb</th>
                        <th class="text-nowrap">29hb</th>
                        <th class="text-nowrap">30hb</th>
                        <th class="text-nowrap">31hb</th>


                    </tr>
                </thead>
                <tbody>
                    @if ($logs)
                    <?php $no = 1 ?>
                    @foreach ($logs as $log)
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                        <td>{{$log->employeeName}}</td>
                        <td>{{$log->departmentName}}</td>
                        <td>{{$log->status}}</td>
                        <td>{{$log->a1hb}}</td>
                        <td>{{$log->a2hb}}</td>
                        <td>{{$log->a3hb}}</td>
                        <td>{{$log->a4hb}}</td>
                        <td>{{$log->a5hb}}</td>
                        <td>{{$log->a6hb}}</td>
                        <td>{{$log->a7hb}}</td>
                        <td>{{$log->a8hb}}</td>
                        <td>{{$log->a9hb}}</td>
                        <td>{{$log->a10hb}}</td>
                        <td>{{$log->a11hb}}</td>
                        <td>{{$log->a12hb}}</td>
                        <td>{{$log->a13hb}}</td>
                        <td>{{$log->a14hb}}</td>
                        <td>{{$log->a15hb}}</td>
                        <td>{{$log->a16hb}}</td>
                        <td>{{$log->a17hb}}</td>
                        <td>{{$log->a18hb}}</td>
                        <td>{{$log->a19hb}}</td>
                        <td>{{$log->a20hb}}</td>
                        <td>{{$log->a21hb}}</td>
                        <td>{{$log->a22hb}}</td>
                        <td>{{$log->a23hb}}</td>
                        <td>{{$log->a24hb}}</td>
                        <td>{{$log->a25hb}}</td>
                        <td>{{$log->a26hb}}</td>
                        <td>{{$log->a27hb}}</td>
                        <td>{{$log->a28hb}}</td>
                        <td>{{$log->a29hb}}</td>
                        <td>{{$log->a30hb}}</td>
                        <td>{{$log->a31hb}}</td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
       
</div>
    </div>
    @endsection

