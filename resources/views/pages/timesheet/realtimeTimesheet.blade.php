@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Timesheet <small>| Realtime Activity | Event Realtime Activity </small></h1>
    <div class="panel panel" id="eventRealtimeJs">
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-6">
                    <a data-bs-toggle="modal" data-bs-target="#neweventmodal" class="btn btn-primary">New Event</a>
                    <a href="/realtimeEmployeeTimesheet"  class="btn btn-primary">View Employee</a>
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
                        <label for="emergency-firstname" class="form-label">Employee Name</label>
                        <select class="form-select" id="" >
                            <option class="form-label" value="" selected>Please Select</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Event Name</label>
                        <select class="form-select" id="" >
                            <option class="form-label" value="" selected>Please Select</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="emergency-firstname" class="form-label">Date Range</label>
                        <input type="text" id="daterange" class="form-control" value="" placeholder="click to select the date range" />
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
            <br>
            <div class="form-control">
                <div class="panel-body">
                    <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Action</th>
                                <th class="text-nowrap">Event Name</th>
                                <th class="text-nowrap">Date</th>
                                <th class="text-nowrap">Time</th>
                                <th class="text-nowrap">Location</th>
                                <th class="text-nowrap">Description</th>
                                <th class="text-nowrap">Participant</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($events)
                            @foreach ($events as $event)
                            <tr class="odd gradeX">
                                <td width="5%"><a href="javascript:;" data-bs-toggle="modal" data-id="{{$event->id}}" id="buttonViewEvent" class="btn btn-primary">View</a></td>
                                <td>{{$event->event_name}}</td>
                                <td>{{$event->start_date}} - {{$event->end_date}}</td>
                                <td>{{$event->start_time}} - {{$event->end_time}}</td>
                                <td>{{$event->location}}</td>
                                <td>{{$event->desc}}</td>
                                <td width="5%"><a href="javascript:;" data-bs-toggle="modal" data-id="{{$event->id}}" id="buttonnViewParticipant" >view</a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('modal.timesheet.addEventRealtimeModal');
        @include('modal.timesheet.viewEventRealtimeModal');
        @include('modal.timesheet.viewParticipantRealtimeModal');
        @endsection
