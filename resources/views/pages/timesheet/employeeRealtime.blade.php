@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Timesheet <small>| Realtime Activity </small></h1>
    <div class="panel panel" id="eventRealtimeJs">
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-6">
                    <a data-bs-toggle="modal" data-bs-target="#neweventmodal" class="btn btn-primary">New Event</a>
                    <a href="/realtimeEventTimesheet" class="btn btn-primary">View Event</a>
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
                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Attendance</label>
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
                                <th class="text-nowrap">Image</th>
                                <th class="text-nowrap">Employee</th>
                                <th class="text-nowrap">Phone</th>
                                <th class="text-nowrap">Department</th>
                                <th class="text-nowrap">Designation</th>
                                <th class="text-nowrap">Attendance</th>
                                <th class="text-nowrap">Clock-In</th>
                                <th class="text-nowrap">Clock-Out</th>
                                <th class="text-nowrap">Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <td width="5%"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#viewlog" class="btn btn-primary">View</a></td>
                                <td class="text-center"><img src="../assets/img/user/user-13.jpg" class="w-50px"></td>
                                <td> Amanina </td>
                                <td>01128798709</td>
                                <td>Business Analyst</td>
                                <td>Service Delivery Department</td>
                                <td>
                                    <div id="awaitingapproval" style="display:none"> <span class="badge bg-warning rounded-pill">On leave</span> </div>
                                    <div id="approved" style="display:block"> <span class="badge bg-lime rounded-pill">Present</span> </div>
                                    <div id="rejected" style="display:none"> <span class="badge bg-danger rounded-pill">Absent</span></div>
                                </td>
                                <td>8.10am</td>
                                <td>17.30pm</td>
                                <td>Headquarter</td>
                            </tr>
                            <tr class="even gradeC">
                                <td><a href="javascript:;"  class="btn btn-primary">View</a></td>
                                <td class="text-center"><img src="../assets/img/user/user-5.jpg" class="w-50px"></td>
                                <td> Haziq Lokman </td>
                                <td>01128753549</td>
                                <td>Scrum Master</td>
                                <td>Admin Department</td>
                                <td>
                                    <div id="awaitingapproval" style="display:none"> <span class="badge bg-warning rounded-pill">On leave</span> </div>
                                    <div id="approved" style="display:none"> <span class="badge bg-lime rounded-pill">Present</span> </div>
                                    <div id="rejected" style="display:block"> <span class="badge bg-danger rounded-pill">Absent</span></div>
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>Unavailable</td>
                            </tr>
                            <tr class="even gradeC">
                                <td><a href="javascript:;"  class="btn btn-primary">View</a></td>
                                <td class="text-center"><img src="../assets/img/user/user-6.jpg" class="w-50px"></td>
                                <td> Amanina </td>
                                <td>01128798709</td>
                                <td>Business Analyst</td>
                                <td>Group Human Resource</td>
                                <td>
                                    <div id="awaitingapproval" style="display:block"> <span class="badge bg-warning rounded-pill">On leave</span> </div>
                                    <div id="approved" style="display:none"> <span class="badge bg-lime rounded-pill">Present</span> </div>
                                    <div id="rejected" style="display:none"> <span class="badge bg-danger rounded-pill">Absent</span></div>
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>Unavailable</td>
                            </tr>
                            <td><a href="javascript:;"  class="btn btn-primary">View</a></td>
                            <td class="text-center"><img src="../assets/img/user/user-7.jpg" class="w-50px"></td>
                            <td> Amanina </td>
                            <td>01128798709</td>
                            <td>Business Analyst</td>
                            <td>Service Delivery Department</td>
                            <td>
                                <div id="awaitingapproval" style="display:none"> <span class="badge bg-warning rounded-pill">On leave</span> </div>
                                <div id="approved" style="display:block"> <span class="badge bg-lime rounded-pill">Present</span> </div>
                                <div id="rejected" style="display:none"> <span class="badge bg-danger rounded-pill">Absent</span></div>
                            </td>
                            <td>8.10am</td>
                            <td>17.30pm</td>
                            <td>Putrajaya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @include('modal.timesheet.addEventRealtimeModal')
            <!-- MODAL VIEW LOG -->
            @include('modal.timesheet.viewLogRealtimeModal')
            <!--END MODAL EDIT LOG -->
        </div>
    </div>
    @endsection
