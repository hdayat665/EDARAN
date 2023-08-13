@extends('layouts.dashboardTenant')@section('content')
<div id="content" class="app-content">
    <h3 class="page-header">Setting <small>| Show and change application settings</small></h3>
    <div class="panel panel">
        <div class="panel-body">
            <h3 class="mt-10px"></i> General Setting</h3><br>
            <div class="row text-center">
                <div class="col-lg-2">
                    <a class="mb-10px" href="/role"><i class="fas fa-circle-user fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Role</h5>
                </div>
            </div><br><br><br>
            <div class="row text-center">
                <div class="col-lg-2">
                    <a class="mb-10px" href="/newRole"><i class="fas fa-user fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">System Role</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/systemUser"><i class="fas fa-circle-user fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">System User</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/company"><i class="fas fa-building fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Company</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/department"><i class="fas fa-network-wired fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Department</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/unit"><i class="fas fa-sitemap fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Unit</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/branch"><i class="fa fa-boxes-stacked fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Branch</h5>
                </div>
            </div><br><br><br>
            <div class="row text-center">
                <div class="col-lg-2">
                    <a class="mb-10px" href="/location"><i class="fa fa-globe fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Location</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/jobGrade"><i class="fas fa-id-badge fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Job Grade</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/designation"><i class="fas fa-id-card-clip fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Designation</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/employmentType"><i
                            class="fa fa-address-book fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Employment Type</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/sop"><i class="fa fa-clipboard-list fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">SOP</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/news"><i class="fa fa-newspaper fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">News</h5>
                </div>
            </div>
            <br>
            <h3 class="mt-10px"></i> e-Attendance Settings</h3> <br>
            <div class="row text-center">
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i
                            class="fas fa-clock-rotate-left fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Clock In Types</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fas fa-chart-line fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Working Patterns</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fa fa-map-location fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Location</h5>
                </div>
            </div><br>
            <h3 class="mt-10px"></i> Timesheets Setting</h3> <br>
            <div class="row text-center">
                {{-- <div class="col-lg-2">
                    <a class="mb-10px" href="/timesheetperiod"><i class="fas fa-calendar-days fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Timesheets Administrator and Timesheets Period</h5>
                </div> --}}
                {{-- <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fas fa-user-group fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Timesheets Group</h5>
                </div> --}}
                <div class="col-lg-2">
                    <a class="mb-10px" href="/typeOfLogs"><i
                            class="fa fa-pen-to-square fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Type of Log</h5>
                </div>
            </div>
            <br>
            <h3 class="mt-10px"></i> eLeave Setting</h3> <br>
            <div class="row text-center">
                <div class="col-lg-2">
                    <a class="mb-10px" href="/leaveAnnual"><i class="fas fa-calendar fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Leave Entitlement</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/leaveEntitlement"><i class="fas fa-calendar-week fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Staff Leave Entitlement</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/weekendEntitlement"><i class="fas fa-calendar-day fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Weekend Entitlement</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/leavetypes"><i class="fa fa-calendar fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Leave Type</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/holidaylist"><i class="fas fa-plane-departure fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Holiday</h5>
                </div>
                </div>


            <br>
            <h3 class="mt-10px"></i> eClaim Setting</h3> <br>
            <div class="row text-center">
                <div class="col-lg-2">
                    <a class="mb-10px" href="/setting/eclaimGeneralView"><i
                            class="fa fa-gear fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">General</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/setting/eclaimDateView"><i
                            class="fas fa-calendar-check fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Claim Date</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/setting/eclaimCategoryView"><i
                            class="fa fa-money-check-dollar fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Claim Category</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/setting/eclaimEntitleGroupView"><i
                            class="fa fa-paste fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Entitlement <br> Group</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/setting/cashAdvanceView"><i
                            class="fa fa-receipt fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Cash Advanced <br> Controller</h5>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-lg-2">
                    <a class="mb-10px" href="/setting/approvalConfigView"><i
                            class="fa fa-wrench fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Approval Configuration </h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/setting/approvalRoleView"><i
                            class="fa fa-gears fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Approval Role </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
