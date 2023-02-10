@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Timesheet <small>| Timesheet Approval </small></h1>
    <div class="panel panel" id="timesheetApprovalJs">
        <div class="panel-heading">
            <div class="col-md-12" style="display: flex; justify-content: flex-end" >
                <a href="javascript:;" id="approveAllButton" class="btn btn-primary">Approve All</a>	&nbsp;&nbsp;&nbsp;
                <a id="filter" class="btn btn-default btn-icon btn-lg">
                    <i class="fa fa-filter"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-control" id="filterform" style="display:none">
                <form action="/searchTimesheet" method="POST">
                    <div class="row p-2">
                        <h4>Filter</h4>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Employer Name</label>
                            <select class="form-select" id="employeesearch" name="employee_name"  data-default-value="">
                                <option class="form-label" value="" >Please Select</option>
                                <?php $employees = getEmployee() ?>
                                @foreach ($employees as $employee)
                                <option value="{{$employee->id}}" {{($employeeId == $employee->id) ? 'selected="selected"' : ''}}>{{$employee->employeeName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-lastname" class="form-label">Month</label>
                            <select class="form-select" id="monthsearch"  name="month" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <option class="form-label" {{($months == 'jan') ? 'selected="selected"' : ''}} value="jan">JANUARY</option>
                                <option class="form-label" {{($months == 'feb') ? 'selected="selected"' : ''}} value="feb">FEBRUARY</option>
                                <option class="form-label" {{($months == 'mac') ? 'selected="selected"' : ''}} value="mac">MARCH</option>
                                <option class="form-label" {{($months == 'april') ? 'selected="selected"' : ''}} value="april">APRIL</option>
                                <option class="form-label" {{($months == 'may') ? 'selected="selected"' : ''}} value="may">MAY</option>
                                <option class="form-label" {{($months == 'june') ? 'selected="selected"' : ''}} value="june">JUNE</option>
                                <option class="form-label" {{($months == 'july') ? 'selected="selected"' : ''}} value="july">JULY</option>
                                <option class="form-label" {{($months == 'aug') ? 'selected="selected"' : ''}} value="aug">AUGUST</option>
                                <option class="form-label" {{($months == 'sept') ? 'selected="selected"' : ''}} value="sept">SEPTEMBER</option>
                                <option class="form-label" {{($months == 'oct') ? 'selected="selected"' : ''}} value="oct">OCTOBER</option>
                                <option class="form-label" {{($months == 'nov') ? 'selected="selected"' : ''}} value="nov">NOVEMBER</option>
                                <option class="form-label" {{($months == 'dec') ? 'selected="selected"' : ''}} value="dec">DECEMBER</option>
                               
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Designation</label>
                            <select class="form-select" id="designsearch"  name="designation" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $designations = getDesignation() ?>
                                @foreach ($designations as $designation)
                                <option value="{{$designation->designationName}}" {{($designation == $designation->designationName) ? 'selected="selected"' : ''}}>{{$designation->designationName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Department</label>
                            <select class="form-select" id="departmentsearch" name="department" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $departments = getDepartment() ?>
                                @foreach ($departments as $department)
                                <option value="{{$department->departmentName}}"  {{($departmentId == $department->departmentName) ? 'selected="selected"' : ''}}>{{$department->departmentName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Status</label>
                            <select class="form-select" id="statussearch" name="status" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <option class="form-label" {{($statusId == 'cancel') ? 'selected="selected"' : ''}} value="cancel">CANCEL</option>
                                <option class="form-label" {{($statusId == 'approve') ? 'selected="selected"' : ''}} value="approve">APPROVE</option>
                                <option class="form-label" {{($statusId == 'reject') ? 'selected="selected"' : ''}} value="reject">REJECT</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="emergency-firstname" class="form-label">&nbsp;</label>
                            <button class="btn btn-primary form-control" type="submit" id="searchButton"> <i class="fas fa-magnifying-glass"></i> Search</button>
                        </div>
                        <div class="col-sm-1">
                            <label for="emergency-firstname" class="form-label">&nbsp;</label>
                            <a href="#" class="btn btn-primary form-control" id="reset"> <i class="fas fa-repeat"></i> Reset</a>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="form-control">
                <div class="panel-body">
                    <form id="approveAllForm">
                        <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">&nbsp;</th>
                                    <th class="text-nowrap">Action</th>
                                    <th class="text-nowrap">Submitted Date</th>
                                    <th class="text-nowrap">Employee Name</th>
                                    <th class="text-nowrap">Month</th>
                                    <th class="text-nowrap">Designation</th>
                                    <th class="text-nowrap">Department</th>
                                    <th width="9%" data-orderable="false" class="align-middle">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($timesheets)
                                @foreach ($timesheets as $timesheet)
                                <tr class="odd gradeX">
                                    <td width="1%" class="fw-bold text-dark"><input class="form-check-input" value="{{$timesheet->id}}" name="id[]" type="checkbox" id="checkbox1" /></td>
                                    <td>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                            @if ($timesheet->status == 'approve')
                                            <div class="viewtimesheet">
                                                <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}" class="dropdown-item" data-id="{{$timesheet->id}}" id="viewtimesheet">View Timesheet</a>
                                            </div>
                                            <div class="canceltimesheet">
                                                <div class="dropdown-divider "></div>
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="cancel" id="statusButton">Cancel Timesheet</a>
                                            </div>
                                            @else
                                            <div class="viewtimesheet">
                                                <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}" class="dropdown-item" data-id="{{$timesheet->id}}" id="viewtimesheet">View Timesheet</a>
                                            </div>
                                            <div class="approvereject">
                                                <div class="dropdown-divider "></div>
                                                <div class="approvetimesheet">
                                                    <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="approve" id="statusButton">Approve Timesheet</a>
                                                </div>
                                                <div class="rejecttimesheet">
                                                    <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="reject" id="statusButton">Reject Timesheet</a>
                                                </div>
                                            </div>
                                            <div class="canceltimesheet">
                                                <div class="dropdown-divider "></div>
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="cancel" id="statusButton">Cancel Timesheet</a>
                                            </div>
                                            <a href="#" style="display: none" class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                            id="amendreasonmodal" data-id="{{$timesheet->id}}">Tesing for amend modal</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$timesheet->created_at}}</td>
                                    <td>{{$timesheet->employee_name ?? '-'}}</td>
                                    <td>{{$timesheet->month}}</td>
                                    <td>{{$timesheet->designation ?? '-'}}</td>
                                    <td>{{$timesheet->department}}</td>
                                    <td>
                                        @if ($timesheet->status == 'pending')
                                        <div id="awaitingapproval"> <span class="badge bg-warning rounded-pill">Awaiting Approval</span> </div>
                                        @endif

                                        @if ($timesheet->status == 'approve')
                                        <div id="approved"> <span class="badge bg-lime rounded-pill">Approved</span> </div>
                                        @endif

                                        @if ($timesheet->status == 'reject')
                                        <div id="rejected"> <span class="badge bg-danger rounded-pill">Rejected</span></div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="row p-2">
				<div class="col align-self-start">
					<a href="/claimapproval/supervisor" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
				</div>
			</div>
        </div>
    </div>
</div>
@include('modal.timesheet.amendreasonmodal')
@endsection
