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
            <div class="row p-2">

                <h4>Filter</h4>
                <div class="col-sm-3">
                    <label for="emergency-firstname" class="form-label">Employer Name</label>
                    <select class="form-select" id="" >
                        <option class="form-label" value="" selected>Please Select</option>
                    </select>
                </div>

                <div class="col-sm-3">
                    <label for="emergency-firstname" class="form-label">Year</label>
                    <select class="form-select" id="" >
                        <option class="form-label" value="" selected>Please Select</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="emergency-firstname" class="form-label">Month</label>
                    <select class="form-select" id="" >
                        <option class="form-label" value="" selected>Please Select</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="emergency-firstname" class="form-label">Designation</label>
                    <select class="form-select" id="" >
                        <option class="form-label" value="" selected>Please Select</option>
                    </select>
                </div>

            </div>
            <div class="row p-2">
                <div class="col-sm-3">
                    <label for="emergency-firstname" class="form-label">Department</label>
                    <select class="form-select" id="" >
                        <option class="form-label" value="" selected>Please Select</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="emergency-firstname" class="form-label">Status</label>
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

                            <th class="text-nowrap">Action</th>
                            <th class="text-nowrap">Submitted Date</th>
                            <th class="text-nowrap">Employee Name</th>
                            <th class="text-nowrap">Designation</th>
                            <th class="text-nowrap">Department</th>
                            <th width="9%" data-orderable="false" class="align-middle">Status</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <td width="5%"><a href="javascript:;" class="btn btn-primary">View</a></td>
                            <td>03/10/2022</td>
                            <td> Amira Roslam </td>
                            <td>Business Analyst</td>
                            <td>Service Delivery Department</td>
                            <td>
                                <div id="awaitingapproval" style="display:none"> <span class="badge bg-warning rounded-pill">Awaiting Approval</span> </div>
                                <div id="approved" style="display:block"> <span class="badge bg-lime rounded-pill">Approved</span> </div>
                                <div id="rejected" style="display:none"> <span class="badge bg-danger rounded-pill">Rejected</span></div>
                            </td>

                        </tr>
                        <tr class="even gradeC">
                            <td width="5%"><a href="javascript:;" class="btn btn-primary">View</a></td>
                            <td>03/10/2022</td>
                            <td> Hazizul Husni </td>
                            <td>Bill Gates</td>
                            <td>12 Feb 2021 4.30 pm</td>
                            <td>
                                <div style="display:block"> <span class="badge bg-warning rounded-pill">Awaiting Approval</span> </div>
                                <div style="display:none"> <span class="badge bg-lime rounded-pill">Approved</span> </div>
                                <div style="display:none"> <span class="badge bg-danger rounded-pill">Rejected</span></div>
                            </td>
                        </tr>
                        <tr class="even gradeC">
                            <td width="5%"><a href="javascript:;"  class="btn btn-primary">View</a></td>
                            <td>02/10/2022</td>
                            <td> Shahira Ahmad </td>
                            <td>Maisarah</td>
                            <td>10 Feb 2022 2.30 pm</td>
                            <td>
                                <div style="display:none"> <span class="badge bg-warning rounded-pill">Awaiting Approval</span> </div>
                                <div style="display:block"> <span class="badge bg-lime rounded-pill">Approved</span> </div>
                                <div style="display:none"> <span class="badge bg-danger rounded-pill">Rejected</span></div>
                            </td>
                        </tr>
                        <td width="5%"><a href="javascript:;"  class="btn btn-primary">View</a></td>
                        <td>02/10/2022</td>
                        <td> Izzuddin </td>
                        <td>Maisarah</td>
                        <td>10 Feb 2022 2.30 pm</td>
                        <td>
                            <div style="display:none"> <span class="badge bg-warning rounded-pill">Awaiting Approval</span> </div>
                            <div style="display:none"> <span class="badge bg-lime rounded-pill">Approved</span> </div>
                            <div style="display:block"> <span class="badge bg-danger rounded-pill">Rejected</span></div>
                        </td>
                    </tr>



                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
