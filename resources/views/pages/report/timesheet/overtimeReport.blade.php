@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Timesheet | Overtime Report </small></h1>
    <div class="panel panel" id="overtimeReportJs">
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6" style="display: flex; justify-content: flex-end">

                    <a id="filter" class="btn btn-default btn-icon btn-lg">
                        <i class="fa fa-filter"></i>
                    </a>
                </div>
            </div><br>
            <div class="form-control" id="filterform" style="display:none">
                <div class="row p-2">

                    <h4>Filter</h4>
                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Employer Name</label>
                        <select class="form-select" id="" >
                            <option class="form-label" value="" selected>Please Select</option>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Year</label>
                        <select class="form-select" id="" >
                            <option class="form-label" value="" selected>Please Select</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Month</label>
                        <select class="form-select" id="" >
                            <option class="form-label" value="" selected>Please Select</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Designation</label>
                        <select class="form-select" id="" >
                            <option class="form-label" value="" selected>Please Select</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Department</label>
                        <select class="form-select" id="" >
                            <option class="form-label" value="" selected>Please Select</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label for="emergency-firstname" class="form-label">&nbsp;</label>
                        <a href="#" class="btn btn-primary form-control"> <i class="fas fa-magnifying-glass"></i> Search</a>
                    </div>
                    <div class="col-sm-1">
                        <label for="emergency-firstname" class="form-label">&nbsp;</label>
                        <a href="#" class="btn btn-primary form-control"> <i class="fas fa-repeat"></i> Reset</a>
                    </div>
                </div>
            </div>
            <!-- END panel-heading -->
            <!-- BEGIN panel-body --><br>
            <div class="form-control">
                <div class="panel-body">

                    <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>

                                <th class="text-nowrap">No</th>
                                <th class="text-nowrap">Employee Name</th>
                                <th class="text-nowrap">Designation</th>
                                <th class="text-nowrap">Department</th>
                                <th class="text-nowrap">Total Overtime Hours</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <td> 1 </td>
                                <td> Amanina </td>
                                <td>Business Analyst</td>
                                <td>Service Delivery Department</td>
                                <td>04:00</td>

                            </tr>
                            <tr class="even gradeC">

                                <td>2 </td>
                                <td>Irsyad</td>
                                <td>Business Analyst</td>
                                <td>Admin Department</td>
                                <td>02:00</td>

                            </tr>
                            <tr class="even gradeC">
                                <td>3 </td>
                                <td> Nina </td>
                                <td>Data Scientist</td>
                                <td>Group Human Resource</td>
                                <td>05:00</td>

                            </tr>
                            <td> 4 </td>
                            <td> Lina </td>
                            <td>Data Analyst</td>
                            <td>Service Delivery Department</td>
                            <td>03:00</td>

                        </tr>



                    </tbody>
                </table>
            </div>

        </div>
    </div>

    @endsection
