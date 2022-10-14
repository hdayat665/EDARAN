@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Calendar</h1>
    <div class="row" id="myTimesheetJs">
        <div class="col-lg">
            <div id="calendar" class="calendar"></div>
        </div>
    </div>
   <div style="height: 80px; display: flex; align-items: center; justify-content: center;">
        <div class="d-grid gap-2 col-6 mx-auto">
            <input type="hidden" id="userIdForApproval" value="{{$user_id}}">
             <button class="btn btn-primary" type="button" id="submitTimesheetApproval">Submit</button>
        </div>
    </div>
    <div style="height: 80px; display: flex; align-items: center; justify-content: center; visibility: hidden;">
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="button" id="cancelTimesheetApproval">Cancel</button>
        </div>
    </div>
</div>
@include('modal.timesheet.addEventModal')
@include('modal.timesheet.editEventModal')
@include('modal.timesheet.addLogModal')
@include('modal.timesheet.editLogModal')
@endsection
