@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content" >
    <h1 class="page-header">Reporting | Timesheet | Employee Report</h1>
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
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="row p-2">
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Select Date</label>
                                <input type="text" id="daterange" class="form-control" value="" placeholder="click to select the date range" />

                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Timesheet Report By Date</label>
                                <select class="form-select" id="reportby" >
                                    <option class="form-label" value="" selected>Please Select</option>
                                    <option class="form-label" value="Summary">Summary</option>
                                    <option class="form-label" value="Project">Project</option>
                                    <option class="form-label" value="Department">Department</option>
                                    <option class="form-label" value="Employee">Employee Name</option>
                                </select>
                            </div>
                        </div>

                        <div class="row p-2" id="rowproject">
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Project</label>
                                <select class="form-select" >
                                    <option class="form-label" value="" selected>Please Select</option>

                                </select>
                            </div>
                        </div>

                        <div class="row p-2" id="rowdepartment">
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Department</label>
                                <select class="form-select" >
                                    <option class="form-label" value="" selected>Please Select</option>

                                </select>
                            </div>
                        </div>

                        <div class="row p-2" id="rowemployee">
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Employee Name</label>
                                <select class="form-select" >
                                    <option class="form-label" value="" selected>Please Select</option>

                                </select>
                            </div>
                        </div>


                        <div class="row p-2">
                            <div class="col-sm-12" style="display: flex; justify-content: flex-end" >
                                <button type="button" class="btn btn-primary mt-3">
                                    Submit
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END tab-pane -->
                <!-- BEGIN tab-pane -->
                <div class="tab-pane fade" id="default-tab-2">
                    <div class="panel-body">
                        <div class="row p-2">
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Select Year</label>
                                <select class="form-select"  >
                                    <option class="form-label" value="" selected>Please Select</option>

                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Select Month</label>
                                <select class="form-select"  >
                                    <option class="form-label" value="" selected>Please Select</option>

                                </select>
                            </div>
                        </div>

                        <div class="row p-2" >
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Select Department</label>
                                <select class="form-select" >
                                    <option class="form-label" value="" selected>Please Select</option>

                                </select>
                            </div>
                        </div>

                        <div class="row p-2" >
                            <div class="col-sm-3">
                                <label for="emergency-firstname" class="form-label">Select Employee Name</label>
                                <select class="form-select" >
                                    <option class="form-label" value="" selected>Please Select</option>

                                </select>
                            </div>
                        </div>




                        <div class="row p-2">
                            <div class="col-sm-12" style="display: flex; justify-content: flex-end" >
                                <a type="button" href="/timesheet/timesheetemployeereportall" class="btn btn-primary mt-3">Submit</a>
                            </div>
                        </div>


                    </div>






                </div>
            </div>
            <!-- END tab-pane -->

        </div>


        <!-- END col-4 -->
    </div>
    <!-- END row -->
</div>

@endsection
