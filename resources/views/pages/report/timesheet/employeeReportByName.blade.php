@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Timesheet | Employee Report </small></h1>
    <div class="panel panel" id="employeeReportByJs">
        <div class="panel-body">
            <div class="row p-2">
                {{-- @if ($employees)
                @foreach ($employees->groupBy('employeeName') as $group)
                    <h5>Filter Option: {{ $group->first()->employeeName }}</h5>
                @endforeach
            @endif --}}
            <h5>Filter Option: Employee Names</h5>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
					<h5> Date : {{$date_range}}</h5>
                </div>
            </div>
            <table id="summarytable" class="table table-striped table-bordered align-middle">
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
                @if ($employees)
                    @foreach ($employees as $employee)
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                        <td>{{$employee->employeeName}}</td>
                        <td>{{$employee->project_name}}</td>
                        <td>{{ str_replace(':', '.', substr($employee->total_hour, 0, -2)) }}</td>
                        <td>{{ number_format(floatval(str_replace(':', '.', substr($employee->total_hour, 0, -2))) * floatval($employee->COR), 2) }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total:</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="javascript:history.back()" class="btn btn-primary" class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        
</div>
    </div>

    @endsection
