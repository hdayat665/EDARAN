@extends('layouts.dashboardTenant')

@section('content')
    <style>
        .custom-dropdown-menu {
        position: static ;
        /* display:block; */
        height: auto ;
        max-height: none ;
        overflow: visible ;
    }
    </style>

<div id="content" class="app-content">
    <h1 class="page-header">HRMIS | Employee Information</h1>
    <div class="panel panel">
        <div class="panel-heading">
            <a href="/registerEmployee" class="btn btn-primary">+ Register New Employee</a>
            <h4 class="panel-title"></h4>
            <div class="panel-heading-btn">
            </div>
        </div>

        <div class="panel-body" id="employeeInfo">
            <table id="tableemployeeinfo" class="table table-striped table-bordered align-middle" style="width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch;">
                <thead>
                    <tr>
                        <th width="1%" data-orderable="false">No</th>
                        <th width="1%" data-orderable="false">Action</th>
                        <th class="text-nowrap">Employee ID</th>
                        <th class="text-nowrap">First Name</th>
                        <th class="text-nowrap">Last name</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Phone Number</th>
                        <th class="text-nowrap">Department</th>
                        <th class="text-nowrap">Report to</th>
                        <th class="text-nowrap">Employee Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employeeInfos)
                    <?php $no = 1 ?>
                    @foreach ($employeeInfos as $employeeInfo)
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                        <td>
                            @if (strtolower($employeeInfo->status) == 'active')
                                <div class="btn-group">
                                    <div>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                    </div>
                                    <ul class="dropdown-menu custom-dropdown-menu wan">
                                        <li><a href="/editEmployee/{{$employeeInfo->user_id}}" class="dropdown-item">Edit Employee</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="register_v3.html" data-bs-toggle="modal" id="terminate" data-employee="{{$employeeInfo->id}}" data-id="{{$employeeInfo->user_id}}" class="dropdown-item">Exit Employee</a></li>
                                    </ul>
                                </div>
                            @else
                                <div class="btn-group">
                                    <div>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"><i class="fa fa-cogs"></i>Actions <i class="fa fa-caret-down"></i></a>
                                    </div>
                                    <ul class="dropdown-menu custom-dropdown-menu wan">
                                        <li><a href="/editEmployee/{{$employeeInfo->user_id}}" class="dropdown-item">Edit Employee</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a id="cancelButton" data-id="{{$employeeInfo->user_id}}" class="dropdown-item">Cancel Termination</a></li>
                                    </ul>
                                </div>
                            @endif
                        </td>
                        <td>{{$employeeInfo->employeeId}}</td>
                        <td>{{$employeeInfo->firstName}}</td>
                        <td>{{$employeeInfo->lastName}}</td>
                        <td>{{$employeeInfo->email}}</td>
                        <td>{{$employeeInfo->phoneNo}}</td>
                        <td>{{$employeeInfo->department}}</td>
                        <td>{{ ($employeeInfo->report_to) ? getSupervisor($employeeInfo->report_to)->employeeName : '-' }}</td>
                        @if($employeeInfo->status == 'active')
                        <td> <span class="badge bg-green">Active </span></td>
                        @else
                        <td> <span class="badge bg-red">Deactivate </span></td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        @include('pages.HRIS.employee.terminateEmployee')
        </div>

    </div>
@endsection

