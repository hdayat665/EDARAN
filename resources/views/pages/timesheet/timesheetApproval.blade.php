@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Timesheet <small>| Timesheet Approval </small></h1>
    <div class="panel panel" id="timesheetApprovalJs">
        <div class="panel-heading">
            <div class="col-md-12" style="display: flex; justify-content: flex-end" >
                <a href="javascript:;" id="approveAllButton" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Approve All</a>	&nbsp;&nbsp;&nbsp;
                <a id="filter" class="btn btn-default btn-icon btn-lg">
                    <i class="fa fa-filter"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            {{-- <div class="form-control" id="filterform" style="display:none"> --}}
                <form action="/searchTimesheet" method="POST">
                    <div class="row p-2" style="display: none" id="filterform">
                        <h4>Filter</h4>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Employee Name</label>
                            <select class="form-select" id="employeesearch" name="employee_name"  data-default-value="">
                                <option class="form-label" value="" >PLEASE CHOOSE</option>
                                <?php $employees = getEmployee() ?>
                                @foreach ($employees as $employee)
                                <option value="{{$employee->id}}" {{($employeeId == $employee->id) ? 'selected="selected"' : ''}}>{{$employee->employeeName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-lastname" class="form-label">Month</label>
                            <select class="form-select" id="monthsearch"  name="month" data-default-value="">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <option class="form-label" {{($months == 'Jan') ? 'selected="selected"' : ''}} value="jan">JANUARY</option>
                                <option class="form-label" {{($months == 'Feb') ? 'selected="selected"' : ''}} value="feb">FEBRUARY</option>
                                <option class="form-label" {{($months == 'Mar') ? 'selected="selected"' : ''}} value="Mar">MARCH</option>
                                <option class="form-label" {{($months == 'April') ? 'selected="selected"' : ''}} value="April">APRIL</option>
                                <option class="form-label" {{($months == 'May') ? 'selected="selected"' : ''}} value="May">MAY</option>
                                <option class="form-label" {{($months == 'June') ? 'selected="selected"' : ''}} value="June">JUNE</option>
                                <option class="form-label" {{($months == 'July') ? 'selected="selected"' : ''}} value="July">JULY</option>
                                <option class="form-label" {{($months == 'Aug') ? 'selected="selected"' : ''}} value="Aug">AUGUST</option>
                                <option class="form-label" {{($months == 'Sept') ? 'selected="selected"' : ''}} value="Sept">SEPTEMBER</option>
                                <option class="form-label" {{($months == 'Oct') ? 'selected="selected"' : ''}} value="Oct">OCTOBER</option>
                                <option class="form-label" {{($months == 'Nov') ? 'selected="selected"' : ''}} value="Nov">NOVEMBER</option>
                                <option class="form-label" {{($months == 'Dec') ? 'selected="selected"' : ''}} value="Dec">DECEMBER</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Designation</label>
                            <select class="form-select" id="designsearch"  name="designation" data-default-value="">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <?php $designations = getDesignation() ?>
                                @foreach ($designations as $designation)
                                <option value="{{$designation->designationName}}" {{($deisgnationId == $designation->designationName) ? 'selected="selected"' : ''}}>{{$designation->designationName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Department</label>
                            <select class="form-select" id="departmentsearch" name="department" data-default-value="">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <?php $departments = getDepartment() ?>
                                @foreach ($departments as $department)
                                <option value="{{$department->departmentName}}"  {{($departmentId == $department->departmentName) ? 'selected="selected"' : ''}}>{{$department->departmentName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="emergency-firstname" class="form-label">Status</label>
                            <select class="form-select" id="statussearch" name="status" data-default-value="">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <option class="form-label" {{($statusId == 'pending') ? 'selected="selected"' : ''}} value="pending">AWAITING APPROVAL</option>
                                <option class="form-label" {{($statusId == 'approve') ? 'selected="selected"' : ''}} value="approve">APPROVE</option>
                                <option class="form-label" {{($statusId == 'amend') ? 'selected="selected"' : ''}} value="amend">AMENDED</option>
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
            {{-- </div> --}}
            <br>
            {{-- <div class="form-control"> --}}
                <div class="panel-body">
                    <form id="approveAllForm">
                        <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">&nbsp;</th>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Action</th>
                                    <th class="text-nowrap">Submitted Date</th>
                                    <th class="text-nowrap">Employee Name</th>
                                    <th class="text-nowrap">Year</th>
                                    <th class="text-nowrap">Month</th>
                                    <th class="text-nowrap">Designation</th>
                                    <th class="text-nowrap">Department</th>
                                    <th width="9%" data-orderable="false" class="align-middle">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @if ($timesheets)
                                @foreach ($timesheets as $timesheet)
                                <tr class="odd gradeX">
                                    <td width="1%" class="fw-bold text-dark"><input class="form-check-input" value="{{$timesheet->id}}" name="id[]" type="checkbox" id="checkbox1" /></td>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                            @if ($timesheet->status == 'approve' || $timesheet->status == 'amend')
                                            <div class="viewtimesheet">
                                                <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}" class="dropdown-item" data-id="{{$timesheet->id}}" id="viewtimesheet">View Timesheet</a>
                                            </div>
                                            {{-- <div class="canceltimesheet">
                                                <div class="dropdown-divider "></div>
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="cancel" id="statusButton">Cancel Timesheet</a>
                                            </div> --}}
                                            @else
                                            <div class="viewtimesheet">
                                                <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}" class="dropdown-item" data-id="{{$timesheet->id}}" id="viewtimesheet">View Timesheet</a>
                                            </div>
                                            <div class="approvereject">
                                                <div class="dropdown-divider "></div>
                                                <div class="approvetimesheet">
                                                    <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="approve" id="statusButton">Approve Timesheet</a>
                                                </div>
                                                {{-- <div class="rejecttimesheet">
                                                    <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="reject" id="statusButton">Reject Timesheet</a>
                                                </div> --}}
                                            </div>
                                            <div class="amendtimesheet">
                                                <div class="dropdown-divider "></div>
                                                <div class="amendtimesheet">
                                                    <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="amend" id="amendreasonmodal" data-bs-toggle="modal"
                                                        id="amendreasonmodal">Amend Timesheet</a>
                                                </div>
                                                {{-- <div class="rejecttimesheet">
                                                    <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="reject" id="statusButton">Reject Timesheet</a>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="canceltimesheet">
                                                <div class="dropdown-divider "></div>
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="cancel" id="statusButton">Cancel Timesheet</a>
                                            </div> --}}
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$timesheet->created_at}}</td>
                                    <td>{{$timesheet->employee_name ?? '-'}}</td>
                                    <td>{{date('Y', strtotime($timesheet->created_at))}}</td>
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

                                        {{-- @if ($timesheet->status == 'reject')
                                        <div id="rejected"> <span class="badge bg-danger rounded-pill">Rejected</span></div>
                                        @endif --}}

                                        @if ($timesheet->status == 'amend')
                                        <div id="amended"> <span class="badge bg-danger rounded-pill" data-toggle="tooltipamend"  data-placement="bottom" title="{{$timesheet->amendreason}}">Amended</span> </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </form>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@include('modal.timesheet.amendreasonmodal')
@endsection
