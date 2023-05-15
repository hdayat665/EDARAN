@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Project Registration | Project Information</h1>
    <div class="row" id="projectJs">
        <div class="col-xl-15">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Project Information</span>
                    </a>
                </li>
                @if ($projectManager)
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">Project Approval</span>
                    </a>
                </li>
                @endif
            </ul>
            <div class="tab-content panel m-0 rounded-0 p-3">
                <div class="tab-pane fade active show" id="default-tab-1">
                    <div class="panel-heading">
                        <div class="col-md-6">
                            <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ Register Project</a>
                        </div>
                        <h4 class="panel-title"></h4>
                    </div>
                    <div class="panel-body">
                        <table id="projectTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">No.</th>
                                    <th data-orderable="false" class="align-middle">Action</th>
                                    <th class="text-nowrap">LOA Date</th>
                                    <th class="text-nowrap">Customer Name</th>
                                    <th class="text-nowrap">Project Code</th>
                                    <th class="text-nowrap">Project Name</th>
                                    <th class="text-nowrap">Account Manager</th>
                                    <th class="text-nowrap">Contract Value</th>
                                    <th class="text-nowrap">Contract Start Date</th>
                                    <th class="text-nowrap">Contract End Date</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Modified By</th>
                                    <th class="text-nowrap">Modified Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($projectInfos)
                                <?php $id = 1 ?>
                                @foreach ($projectInfos as $projectInfo)
                                <tr class="odd gradeX">
                                    <td width="1%">{{$id++}}</td>
                                    <td>
                                        <a href="/projectInfoEdit/{{$projectInfo->id}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>{{$projectInfo->LOA_date}}</td>
                                    <td>{{$projectInfo->customer_name}}</td>
                                    <td>{{$projectInfo->project_code}}</td>
                                    <td>{{$projectInfo->project_name}}</td>
                                    <td>{{$projectInfo->acc_manager_name}}</td>
                                    <td>RM {{ number_format($projectInfo->contract_value, 2) }}</td>
                                    <td>{{$projectInfo->contract_start_date}}</td>
                                    <td>{{$projectInfo->contract_end_date}}</td>
                                    <td>{{$projectInfo->status}}</td>
                                    <td>{{($projectInfo->update_by) ? getEmployeeName($projectInfo->update_by) : '-'}}</td>
                                    <td>{{($projectInfo->update_by) ? $projectInfo->updated_at : '-'}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="default-tab-2">
                    <br>
                    <div class="panel-body">
                        <table id="data-table-default2" style="width: 100% !important" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="4%" data-orderable="false" class="align-middle text-center">No.</th>
                                    <th width="6%" class="align-middle">Action</th>
                                    <th class="text-nowrap">Requested Date</th>
                                    <th class="text-nowrap">Employee Name</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Customer Name</th>
                                    <th class="text-nowrap">Project Code</th>
                                    <th class="text-nowrap">Project Name</th>
                                    <th class="text-nowrap">Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($projectApproval)
                                @foreach ($projectApproval as $key => $projectInfo)
                                <tr class="odd gradeX">
                                    <td>{{$key + 1}}</td>
                                    <td width="7%">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                            <a href="javascript:;" id="approveButton" data-id="{{$projectInfo->id}}" class="dropdown-item"> Approve </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" id="rejectViewButton" data-id="{{$projectInfo->id}}" class="dropdown-item"> Reject</a>
                                        </div>
                                    </td>
                                    <td>{{$projectInfo->requested_date}}</td>
                                    <td>{{$projectInfo->employeeName}}</td>
                                    <td>{{$projectInfo->departmentName}}</td>
                                    <td>{{$projectInfo->customer_name}}</td>
                                    <td>{{$projectInfo->project_code}}</td>
                                    <td>{{$projectInfo->project_name}}</td>
                                    <td>{{$projectInfo->reason}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modal.project.projectRegistration')
@include('modal.project.rejectProjectApproval')
@endsection
