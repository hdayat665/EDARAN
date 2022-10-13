@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Timesheet | Employee Report </small></h1>
    <div class="panel panel">
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5>Department : {{$department ?? '-'}}</h5>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5> Date : {{$date_range}}</h5>
                </div>
            </div>
            <table id="departmenttable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Employee Name</th>
                        <th class="text-nowrap">Project</th>
                        <th class="text-nowrap">Total Hours</th>
                        <th class="text-nowrap">Amount (MYR)</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @if ($departments)
                        @foreach ($departments as $department)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                            <td>{{$department->employeeName}}</td>
                            <td>{{$department->project_name}}</td>
                            <td>{{$department->total_hour ?? '00:00'}}</td>
                            <td>321</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @endsection
