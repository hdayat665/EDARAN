@extends('layouts.dashboardTenant')@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Calendar</h1>
    <h1 class="page-header">{{ $userId }}</h1>
    <div class="row" id="viewTimesheetJs">
        <div class="col-lg">
            <div id="calendar" class="calendar"></div>
            <input type="hidden" id="timesheetApprovalId" value="{{$id}}">
            <input type="hidden" id="timesheetApprovalUserId" value="{{$userId}}">
        </div>
    </div>
</div>
@include('modal.timesheet.editLogModalView')
@include('modal.timesheet.editEventModalView')
@endsection
