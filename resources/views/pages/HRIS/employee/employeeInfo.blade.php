@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">HRIS | Employee Information</h1>
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
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="/editEmployee/{{$employeeInfo->user_id}}" class="dropdown-item">Edit Employee </a>
                                <div class="dropdown-divider"></div>
                                <a href="register_v3.html" data-bs-toggle="modal" id="terminate" data-employee="{{$employeeInfo->id}}" data-id="{{$employeeInfo->user_id}}" class="dropdown-item"> Terminate Employee</a>
                                <a href="register_v3.html" class="dropdown-item" style="display:none"> Cancel Termination</a>
                            </div>
                        </td>
                        <td>{{$employeeInfo->employeeId}}</td>
                        <td>{{$employeeInfo->firstName}}</td>
                        <td>{{$employeeInfo->lastName}}</td>
                        <td>{{$employeeInfo->email}}</td>
                        <td>{{$employeeInfo->phoneNo}}</td>
                        <td>{{$employeeInfo->department}}</td>
                        <td>{{ ($employeeInfo->report_to) ? getSupervisor($employeeInfo->report_to)->employeeName : '-' }}</td>
                        <td><span class="badge <?= ($employeeInfo->status == 'active') ? 'bg-green' : 'bg-red'  ?>">{{$employeeInfo->status}}</span></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @include('pages.HRIS.employee.terminateEmployee')
    </div>
@endsection

