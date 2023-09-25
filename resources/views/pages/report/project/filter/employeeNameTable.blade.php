@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Project  | Project Report </small></h1>
    <div class="panel panel">
    <div class="panel-body" id="projectStatusJs">
            <div class="row p-2"> 
                <h4>Project Report</h4>
            </div>
            <div class="row p-2"> 
                <h5>Department: {{$departmentName}}</h5>
            </div>
            <div class="row p-2"> 
                <h5>Employee Name: {{$employeeName}}</h5>
            </div>
        <table id="employeeTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th width="1%">NO</th>
                    <th class="text-nowrap">Customer Name</th>
                    <th class="text-nowrap">Project Code</th>
                    <th class="text-nowrap">Project Name</th>
                    <th class="text-nowrap">Project Member Name</th>
                    <th class="text-nowrap">Designation</th>
                    <th class="text-nowrap">Branch</th>
                    <th class="text-nowrap">Unit</th>
                    <th class="text-nowrap">Joined Date</th>
                    <th class="text-nowrap">Exit Date</th>
                    <th class="text-nowrap">Assigned As</th>
                    <th class="text-nowrap">Project Status</th>


                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @if ($empName)
                @foreach ($empName as $project)
                <tr class="odd gradeX">
                    <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                    <td class="text-nowrap">{{$project->customer_name}}</td>
                    <td class="text-nowrap">{{$project->project_code}}</td>
                    <td class="text-nowrap">{{$project->project_name}}</td>
                    <td class="text-nowrap">{{$project->employeeName}}</td>
                    <td class="text-nowrap">{{$project->designationName}}</td>
                    <td class="text-nowrap">{{$project->branchName}}</td>
                    <td class="text-nowrap">{{$project->unitName}}</td>
                    <td class="text-nowrap">{{$project->joined_date}}</td>
                    <td class="text-nowrap">{{$project->exit_project_date}}</td>
                    <td class="text-nowrap">{{$project->assign_as}}</td>
                    <td class="text-nowrap">{{$project->status}}</td>
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
        <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/projectFilter" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
    </div>
</div>
@endsection
