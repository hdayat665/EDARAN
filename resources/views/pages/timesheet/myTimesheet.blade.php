@extends('layouts.dashboardTenant')
@section('content')
    {{-- timepicker --}}
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

	<link href="../assets/plugins/timepicker/css/mdtimepicker.css" rel="stylesheet" type="text/css">

    <style>
/* .fc-disabled-day {
    background-color: #eee !important;
    color: #888 !important;
} */

    </style>


<div id="content" class="app-content">
    {{-- <h1 class="page-header">Calendar</h1> --}}
    <h1 class="page-header"> Timesheet <small>| My Timesheet  </small></h1>
    <div class="row" id="myTimesheetJs">

        <div class="col-lg">
            <div id="calendar" class="calendar"></div>
        </div>
    </div>
   <div style="height: 80px; display: flex; align-items: center; justify-content: center;">
        <div class="d-grid gap-2 col-6 mx-auto">
            <input type="hidden" id="userIdForApproval" value="{{$user_id}}">
             {{-- <button class="btn btn-primary" type="button" id="submitTimesheetApproval">Submit</button> --}}
             <button class="btn btn-primary" type="button" id="confirmsubmitb" data-bs-toggle="modal">Submit</button>
        </div>
    </div>
    <div style="height: 80px; display: flex; align-items: center; justify-content: center; visibility: hidden;">
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary"  type="button" id="cancelTimesheetApproval">Cancel</button>
        </div>
    </div>
</div>
{{-- timpicker --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
<script src="../assets/plugins/timepicker/js/mdtimepicker.js"></script>
@include('modal.timesheet.addEventModal')
@include('modal.timesheet.editEventModal')
@include('modal.timesheet.addLogModal')
@include('modal.timesheet.editLogModal')
@include('modal.timesheet.confirmsubmitmodal')
@endsection
