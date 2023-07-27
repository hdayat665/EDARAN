@extends('layouts.dashboardTenant')
@section('content')

<div id="content" class="app-content">
    <h1 class="page-header" id="newRoleJs">System Role <small>| Update System Role</small></h1>
    
    <div class="row">
        <!-- <div class="col-md-12 panel panel"> -->
                <div class="panel-heading mt-15px">
                <h1 class="panel-title" style="font-size: 15px;">1. Role Details</h1>
            </div> 
        <!-- </div> -->
    </div>

    <div class="row">
        <div class="col-lg-12 panel panel">
            <div class="panel-body">
                <form id="">
                    <div class="row p-2">
                        <div class="col-sm-2">
                            <label class="form-label col-form-label col-md-5">Role Name*</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mb-5px" name="" placeholder="ROLE NAME" value=""/>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-2">
                            <label class="form-label col-form-label col-md-5">Description*</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control mb-5px" rows="4" name="" maxlength="255" placeholder="DESCRIPTION"></textarea>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input excludeFromAllAccess" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Default - Assign to new users by default</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel-heading mt-15px">
            <h1 class="panel-title" style="font-size: 15px;">2. Access Details</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 panel panel">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <input class="form-check-input" type="checkbox" value="" id="allAccessCheckbox">
                </div>
                <div class="col-auto">
                    <p class="col-form-label" style="font-size: 15px;">ALL ACCESS</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== Row 1 ================== -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="panel panel">
                <!-- ================== Dashboard ================== -->
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">Dashboard</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Top Menu</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Announcements</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Events</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Live Clock In Activities</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Leave Employee Report</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Attendance Summary Report</p>
                            </div>
                        </div>
                    </div>
                </div><br><br><br><br>
            </div>
		</div>
        
        <!-- ================== HRMIS ================== -->
        <div class="col-xl-3 col-md-6">
            <div class="panel panel">
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">HRMIS</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">My Profile</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Employee<br>Information
                                    &nbsp;
                                    <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Register New Employee</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Edit Employee
                                    &nbsp;
                                    <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Activate /<br>Deactivate Employee</p>
                            </div>
                        </div>
                    </div>
                </div><br><br><br><br>
            </div>
		</div>
        
        <!-- ================== eAttendance ================== -->
        <div class="col-xl-3 col-md-6">
            <div class="panel panel">
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">eAttendance</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">My Attendance</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Attendance<br>Information
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ================== General Info ================== -->
            <div class="panel panel">
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">General Information</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Phone Directory</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Organization Chart</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Policy & SOP's</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        
        <!-- ================== eLeave ================== -->
        <div class="col-xl-3 col-md-6">
            <div class="panel panel">
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">eLeave</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">My Leave</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Leave Approval</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Department Recommender</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Department Approver</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="mb-6 child-element2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Reject Leave</p>
                            </div>
                        </div>
                    </div> -->
                </div><br><br><br><br><br><br><br><br>
            </div>
		</div>
    </div>

    <!-- ================== Row 2 ================== -->
    <div class="row">
        <div class="col-xl-6 col-md-6">
            <!-- ================== Timesheet ================== -->
            <div class="panel panel">
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">Timesheet</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">My Timesheet</p>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Summary</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Week</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Day</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">New Log</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">New Event</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Submit (Timesheet Approval)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Cancel (Timesheet Approval)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Submission Status</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Timesheet Approval</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">View Timesheet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Approve Timesheet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Amend Timesheet</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Realtime Activities</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Apeal Approval</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================== Project Management ================== -->
            <div class="panel panel">
                <div class="panel-body">
                    <div class="mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">Project Management</p>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Customer
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Information
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Account Manager
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Information
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Previous Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Location
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Member</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 child-element4">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Current<br>Member
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 child-element5">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Assign Location</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element4">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Member</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Approval
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">My Project</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Request</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Request</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Cancel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br><br><br><br><br>
            </div>
        </div>

        <!-- ================== eClaim ================== -->
        <div class="col-xl-6 col-md-12">
            <div class="panel panel">
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">eClaim</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">My Claim
                                    &nbsp;
                                    <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                    <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">General Claim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Cash Advance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Monthly Claim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Claim Table</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Cash Advance Table</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Claim Approval
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 1 - Department Recommender
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 1 - Department Approver
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 2 - Checker
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 2 - Recommender
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 2 - Approver
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 3 - Checker
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 3 - Recommender
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 3 - Approver
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 4 - Checker
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 4 - Recommender
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 4 - Approver
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 5 - Finance Checker
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 5 - Finance Recommender
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Level 5 - Finance Approver
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 child-element">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label">Cash Advance Approver
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Department Approver
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Finance Checker
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Finance Recommender
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Finance Approver
                                        &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-check" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-close" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- ================== Row 3 ================== -->
    <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="panel panel">
                <!-- ================== Report ================== -->
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">Report</p>
                            </div>
                        </div>
                    </div>
                    <!-- Timesheet -->
                    <div class="row p-2">
                        <div class="col-sm-3">
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Timesheet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Status Report</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Employee Report</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Overtime Report</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- eAttendance -->
                        <div class="col-sm-2">
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">eAttendance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Daily Report</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Status Report</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- eLeave -->
                        <div class="col-sm-2">
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">eleave</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project Management -->
                        <div class="col-sm-3">
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Project Management</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Daily Report</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Status Report</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- eClaim -->
                        <div class="col-sm-2">
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">eClaim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Claim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Cash Advance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== Row 3 ================== -->
    <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="panel panel">
                <!-- ================== Settings ================== -->
                <div class="panel-body">
                    <div class="mb-6">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="">
                            </div>
                            <div class="col-auto">
                                <p class="col-form-label" style="font-size: 15px;">Settings</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row p-2">
                        <div class="col-sm-3">
                            <!-- General -->
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">General
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">System Role
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">System User
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Company
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Department
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Unit
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Branch
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Location
                                            nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Job Grade
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Designation
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Employment Type
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Policy's & SOP's
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">News
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <!-- eAttendance -->
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">eAttendance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Clock In Types
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Working Patterns
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Location
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div><br>

                            <!-- Timesheet -->
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Timesheet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Timesheet Administrator <br> & Timesheet Period
                                            &nbsp;&nbsp;&nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Timesheet Group
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Type Of Logs
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <!-- eLeave -->
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">eLeave</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Leave Entitlement
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Staff Leave<br>Entitlement
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Weekend Entitlement
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Leave Types
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Holiday
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <!-- eClaim -->
                            <div class="mb-6 child-element">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">eClaim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">General
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Claim Date
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Entitlement Group
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Cash Advance <br> Controller
                                            &nbsp;&nbsp;&nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 child-element2">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-check-input" type="checkbox" value="" id="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">Approval Role
                                            &nbsp;
                                            <input class="form-check-input rounded-circle fa fa-plus" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-pencil" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-trash" type="checkbox" checked>
                                            <input class="form-check-input rounded-circle fa fa-eye" type="checkbox" checked>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">
            <button type="submit" id="" class="btn btn-primary">Save</button>
        </div>
    </div>

    <style>
        .child-element {
            margin-left: 20px; /* Adjust the indentation or spacing as desired */
        }
        .child-element2 {
            margin-left: 35px; /* Adjust the indentation or spacing as desired */
        }
        .child-element3 {
            margin-left: 50px; /* Adjust the indentation or spacing as desired */
        }
        .child-element4 {
            margin-left: 65px; /* Adjust the indentation or spacing as desired */
        }
        .child-element5 {
            margin-left: 80px; /* Adjust the indentation or spacing as desired */
        }
        .rounded-circle {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 1px solid #F5F5F5;
            background-color: #DCDCDC;
        }
        .rounded-circle:checked {
            background-color: #7FFF00;
            border: 1px solid #7FFF00;
        }
        .rounded-circle:checked[type=checkbox] {
            background-image: none; /* Remove the background image for rounded-circle checkboxes */
        }
        .fa.fa-eye {
            color: #A9A9A9; /* Change the color to your desired color */
            font-size: 13px; /* Change the font size to your desired size */
        }
        .fa.fa-plus {
            color: #A9A9A9; /* Change the color to your desired color */
            font-size: 13px; /* Change the font size to your desired size */
        }
        .fa.fa-pencil {
            color: #A9A9A9; /* Change the color to your desired color */
            font-size: 13px; /* Change the font size to your desired size */
        }
        .fa.fa-trash {
            color: #A9A9A9; /* Change the color to your desired color */
            font-size: 13px; /* Change the font size to your desired size */
        }
        .fa.fa-check {
            color: #A9A9A9; /* Change the color to your desired color */
            font-size: 13px; /* Change the font size to your desired size */
        }
        .fa.fa-close {
            color: #A9A9A9; /* Change the color to your desired color */
            font-size: 13px; /* Change the font size to your desired size */
        }

    </style>
</div>

@endsection