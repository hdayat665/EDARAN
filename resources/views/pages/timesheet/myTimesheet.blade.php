@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Calendar</h1>
    <div class="row" id="myTimesheetJs">
        <div class="col-lg">
            <div id="calendar" class="calendar"></div>
        </div>
    </div>
</div>
@include('modal.timesheet.addEventModal')
@include('modal.timesheet.editEventModal')
@include('modal.timesheet.addLogModal')
@include('modal.timesheet.editLogModal')
@endsection
