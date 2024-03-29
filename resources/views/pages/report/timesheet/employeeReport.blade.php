@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content" >
    <h1 class="page-header">Reporting <small>| Timesheet | Employee Report</small></h1>
    <div class="row" id="employeeReportJs">
        <div class="col-xl-15">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Timesheet Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">Employee Report</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content panel m-0 rounded-0 p-3">
                <div class="tab-pane fade active show" id="default-tab-1">
                    <form action="/searchEmployeeTimesheetReport" onsubmit="return validateForm()" method="POST">
                        <div class="panel-body">
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Date</label>
                                    <input type="text" id="daterange" class="form-control" value="" name="date_range" placeholder="click to select the date range" />

                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Timesheet Report By :</label>
                                    <select class="form-select" id="reportby" name="category" >
                                        <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                        <option class="" value="Summary">SUMMARY</option>
                                        <option class="" value="Project">PROJECT</option>
                                        <option class="" value="Department">DEPARTMENT</option>
                                        <option class="" value="Employee">EMPLOYEE NAME</option>
                                    </select>
                                    <div id="report_by" style="color: red;"></div>
                                </div>
                            </div>

                            <div class="row p-2" id="rowproject">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Project</label>
                                    <select class="form-select" id="projectid" name="project">
                                        <option class="form-label" value="">PLEASE CHOOSE</option>
                                        <?php $projects = project() ?>
                                        @foreach ($projects->sortBy('project_name') as $project)
                                        <option value= {{$project->id}}>{{$project->project_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row p-2" id="rowdepartment">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Department</label>
                                    <select class="form-select" id="departmentid" name="department">
                                        <option class="form-label" value="">PLEASE CHOOSE</option>
                                        <?php $departments = getDepartment() ?>
                                        @foreach ($departments->sortBy('departmentName') as $department)
                                        <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row p-2" id="rowemployee">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Employee Name</label>
                                    <select class="form-select" id="employeeid" name="user_id">
                                        <option class="form-label" value="" >PLEASE CHOOSE</option>
                                        <?php $employees = getEmployee() ?>
                                        @foreach ($employees->sortBy('employeeName') as $employee)
                                        <option value="{{$employee->user_id}}">{{$employee->employeeName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-sm-12" >
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="default-tab-2">
                    <form action="/searchEmployeeReport" onsubmit="return validateForm1()" method="POST"  >
                        <div class="panel-body">
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Year</label>
                                    <select class="form-select" id="yearv" name="year2">
                                        <option class="form-label" value="" >PLEASE CHOOSE</option>
                                        <?php $years = year() ?>
                                        @foreach ($years as $year => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <div id="year_v" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Month</label>
                                    <select class="form-select" id="monthv" name="month2">
                                        <option class="form-label" value="">PLEASE CHOOSE</option>
                                        <?php $months = month() ?>
                                        @foreach ($months as $month => $value)
                                        <option value="{{$month}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <div id="month_v" style="color: red;"></div>
                                </div>
                            </div>

                            <div class="row p-2" >
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Department</label>
                                    <select class="form-select" name="department2" id="departmentv">
                                        <option class="form-label" value="">PLEASE CHOOSE</option>
                                        <?php $departments = getDepartment() ?>
                                        @foreach ($departments->sortBy('departmentName') as $department)
                                        <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                        @endforeach
                                    </select>
                                    <div id="department_v" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="row p-2" id="labelcategory">
                                <div class="col-sm-3">
                                    <label class="form-label" id="">Employee</label>
                                    <select class="form-select" id="employeev" name="claim_category_detail" >
                                        <option value="" class="form-label" label="PLEASE CHOOSE">PLEASE CHOOSE</option>
                                    </select>
                                     <div id="employee_v" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
</div>




@endsection
