@extends('layouts.dashboardTenant')
@section('content')
    {{-- timepicker --}}
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

	<link href="../assets/plugins/timepicker/css/mdtimepicker.css" rel="stylesheet" type="text/css">

    <style>
.fc-disabled-day {
    background-color: #eee !important;
    color: #888 !important;
}

/* Hide vertical scrollbar */
/* .fc-scroller {
            overflow-y: hidden !important;
        }

        /* Hide horizontal scrollbar */
        /* .fc-scroller {
            overflow-x: hidden !important;
        } */


    </style>


<div id="" class="app-content">
    {{-- <h1 class="page-header">Calendar</h1> --}}
    <h1 class="page-header"> Timesheet <small>| My Timesheet  </small></h1>
    <div class="panel-body">
        <div class="form-control">
            <table id="data-table-default" class="table table-striped table-bordered">
                <tr>
                    <th>Total Days of This Month</th>
                    <td><label id="">{{ optional($data['timesheetsday'])['totalDays'] ?? 'N/A' }} days</label></td>
            
                    <th>Weekdays</th>
                    <td><label id="">{{ optional($data['timesheetsday'])['weekdays'] ?? 'N/A' }} days</label></td>
                </tr>
                <tr>
                    <th>Weekend</th>
                    <td><label id="">{{ optional($data['timesheetsday'])['weekends'] ?? 'N/A' }} days</label></td>
            
                    <th>Working Days</th>
                    <td>{{ optional($data['timesheetsday'])['workingDays'] ?? 'N/A' }} days</td>
                </tr>
                <tr>
                    <th>Public Holidays</th>
                    <td>{{ optional($data['timesheetsday'])['holidays'] ?? 'N/A' }} days</td>
            
                    <th>Worked Days</th>
                    <td>{{ optional($data['timesheetsday'])['workedDays'] ?? 'N/A' }} days</td>
                </tr>
                <tr>
                    <th>Eligible Public Holidays</th>
                    <td>{{ optional($data['timesheetsday'])['holidays'] ?? 'N/A' }} days</td>
            
                    <th>Remaining TSR</th>
                    <td>{{ optional($data['timesheetsday'])['remaininingtsr'] ?? 'N/A' }} days</td>
                </tr>
            </table>
        </div>
        
        </div>
        <br>

    <div class="row" id="myTimesheetJs">
    
        <div class="col-lg">
            <div id="calendar" class="calendar"></div>
        </div>
    </div>
    <br>
    <div class="col d-flex justify-content-start">
    <div class="note note-light">
        <div class="note-icon"></div>
            <div class="note-content" >
                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #348FE2;"> </a> &nbsp;Log&nbsp;

                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #2AAA8A;"> </a>&nbsp;Event&nbsp;

                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #FFFADF;"> </a>&nbsp;Today&nbsp;

                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #B3CCFF;"> </a>&nbsp;Weekend&nbsp;
                
                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #D9EDF7;"> </a>&nbsp;Leave&nbsp;

                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #FFD480;"> </a>&nbsp;Holiday&nbsp;

                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #80FF80;"> </a>&nbsp;Complete log for the day&nbsp;

                <a href="#" class="btn btn-default btn-icon " style="pointer-events: none; background-color: #FF8080;">  </a>&nbsp;Incomplete log for the day&nbsp;
            </div>
        </div>
    </div>
    <br>
   <div class="col d-flex justify-content-end">
        <div class="">
            <input type="hidden" id="userIdForApproval" value="{{ $data['user_id'] }}">
            <input type="hidden" id="state_id" value="{{ $stateData->state_id }}">
            <input type="hidden" id="joinneddate" value="{{ $data['joined_date'] }}">

             {{-- <button class="btn btn-primary" type="button" id="submitTimesheetApproval">Submit</button> --}}
             {{-- <button class="btn btn-primary" type="button" id="confirmsubmitb" data-bs-toggle="modal">Submit</button> --}}

             <button class="btn btn-primary" type="button" onclick="window.history.back()">Back</button>&nbsp&nbsp

             {{-- <button class="btn btn-primary" type="button" id="confirmsubmitb" data-bs-toggle="modal">Submit</button> --}}
        </div>
    </div>
    {{-- <div class="row p-2">
        <div class=" col d-flex justify-content-end ">
            <button class="btn btn-primary" type="button" onclick="window.history.back()">Back</button>&nbsp&nbsp

            <button class="btn btn-primary" type="button" id="confirmsubmitb" data-bs-toggle="modal">Submit</button>
        </div>
    </div> --}}
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
@include('modal.timesheet.appealmodal')
@include('modal.timesheet.appealmodalview')
@endsection