@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Project  | Project Status </small></h1>
    <div class="panel panel">
        <div class="panel-heading" id="projectStatusJs">
            <h4 class="panel-title">Project Status Report</h4>
            <div class="panel-heading-btn">
            </a>
        </div>
    </div>
    <div class="panel-body">
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
    </div>
</div>
@endsection
