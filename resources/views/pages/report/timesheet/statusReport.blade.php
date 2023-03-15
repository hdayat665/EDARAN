@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Timesheet | Report Status </small></h1>
    <div class="panel panel" id="statusReportJs">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">

            <div class="col-md-12" style="display: flex; justify-content: flex-end" >

                <a id="filter" class="btn btn-default btn-icon btn-lg">
                    <i class="fa fa-filter"></i>
                </a>

            </div>

        </div>
        <div class="panel-body">
            <div class="form-control" id="filterform" style="display:none">
                <form action="/searchStatusReport" method="POST">
                    <div class="row p-2">
                        <h4>Filter</h4>
                        <div class="col-sm-3">
                            <label for="emergency-firstname" class="form-label">Employer Name</label>
                            <select class="form-select" id="employeesearch" name="employeeName" data-default-value="">
                                <option class="form-label" value="" >Please Select</option>
                                <?php $employees = getEmployee() ?>
                                @foreach ($employees as $employee)
                                <option value="{{$employee->employeeName}}">{{$employee->employeeName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="emergency-firstname" class="form-label">Year</label>
                            <select class="form-select" id="yearsearch" name="year" data-default-value="">
                                <option class="form-label" value="" >Please Select</option>
                                <?php $years = year() ?>
                                @foreach ($years as $year => $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="emergency-firstname" class="form-label">Month</label>
                            <select class="form-select" id="monthsearch"  name="month" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $months = month() ?>
                                @foreach ($months as $month => $value)
                                <option value="{{$month}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="emergency-firstname" class="form-label">Designation</label>
                            <select class="form-select" id="designationsearch" name="designation" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $designations = getDesignation() ?>
                                @foreach ($designations as $designation)
                                <option value="{{$designation->designationName}}">{{$designation->designationName}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row p-2">
                        <div class="col-sm-3">
                            <label for="emergency-firstname" class="form-label">Department</label>
                            <select class="form-select" id="departmentsearch" name="department" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <?php $departments = getDepartment() ?>
                                @foreach ($departments as $department)
                                <option value="{{$department->departmentName}}">{{$department->departmentName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="emergency-firstname" class="form-label">Status</label>
                            <select class="form-select" id="statussearch" name="status" data-default-value="">
                                <option class="form-label" value="">Please Select</option>
                                <option class="form-label" value="approve">APPROVE</option>
                                <option class="form-label" value="pending">AWAITING APPROVAL</option>
                                <option class="form-label" value="amend">AMENDED</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="emergency-firstname" class="form-label">&nbsp;</label>
                            <button href="#" type="submit" class="btn btn-primary form-control"> <i class="fas fa-magnifying-glass"></i> Search</button>
                        </div>

                        <div class="col-sm-1">
                            <label for="emergency-firstname" class="form-label">&nbsp;</label>
                            <a href="#"  id="reset" class="btn btn-primary form-control"> <i class="fas fa-repeat"></i> Reset</a>
                        </div>

                    </div>
                </form>
            </div>
            <!-- END panel-heading -->
            <!-- BEGIN panel-body --><br>
            <div class="form-control">
                <div class="panel-body">

                    <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th class="text-nowrap">No</th>
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
                            @if ($statusReports)
                            @foreach ($statusReports as $statusReport)
                            <tr class="odd gradeX">
                                <td>{{$no++}}</td>
                                <td><a href="/viewTimesheet/{{$statusReport->id}}/{{$statusReport->user_id}}" class="btn btn-primary" data-id="{{$statusReport->id}}" id="viewtimesheet">View</a></td>
                                {{-- <td width="5%"><a href="javascript:;" class="btn btn-primary">View</a></td> --}}
                                <td>{{$statusReport->created_at}}</td>
                                <td>{{$statusReport->employee_name}}</td>
                                <td>{{date('Y', strtotime($statusReport->created_at))}}</td>
                                <td>{{date('M', strtotime($statusReport->created_at))}}</td>
                                <td>{{$statusReport->designation}}</td>
                                <td>{{$statusReport->department}}</td>
                                <td>
                                    @if ($statusReport->status == 'pending')
                                    <div id="awaitingapproval" style="display:block"> <span class="badge bg-warning rounded-pill">Awaiting Approval</span> </div>

                                    @endif

                                    @if ($statusReport->status == 'approve')
                                    <div id="approved" style="display:block"> <span class="badge bg-lime rounded-pill">Approved</span> </div>

                                    @endif

                                    @if ($statusReport->status == 'amend')
                                    <div id="rejected" style="display:block"> <span class="badge bg-danger rounded-pill">Amended</span></div>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div> --}}
            
    </div>
        </div>
        @endsection
