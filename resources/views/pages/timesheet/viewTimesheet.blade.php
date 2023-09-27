@extends('layouts.dashboardTenant')@section('content')
<style>
.fc-prev-button, .fc-next-button {
    display: none;
}
</style>

<div id="content" class="app-content">
    @php
    $previousUrl = URL::previous();
    $parsedUrl = parse_url($previousUrl);
    $path = pathinfo($parsedUrl['path']);
    $previousPage = $path['basename'];
    @endphp
    @if ($previousPage === 'timesheetApproval')
        {{-- <h4 class="">Timesheet : Timesheet Approval</h4> --}}
        <h1 class="page-header">Timesheet <small>| Timesheet Approval </small></h1>
    @elseif ($previousPage === 'summarytimesheet')
        <h1 class="page-header">My Timesheet <small>| Summary </small></h1>
    @else
    <h1 class="page-header">My Timesheet <small>| Status Report </small></h1>
    @endif
    <h4 class="">{{ $employee_name }}</h4>
    
    <div class="row" id="viewTimesheetJs">
        <div class="col-lg">
            <div id="calendar" class="calendar"></div>
            <input type="hidden" id="timesheetApprovalId" value="{{$id}}">
            <input type="hidden" id="timesheetApprovalUserId" value="{{$userId}}">
            <input type="hidden" id="month" value="{{ request('month', 'default_value') }}">
            <input type="hidden" id="year" value="{{ request('year', 'default_value') }}">
        </div>
    </div>
    <div class="row p-2">
        <div class=" col d-flex justify-content-end">
            <button class="btn btn-primary" onclick="window.history.back()">Back</button>
        </div>
    </div>
</div>
@include('modal.timesheet.editLogModalView')
@include('modal.timesheet.editEventModalView')
@endsection
