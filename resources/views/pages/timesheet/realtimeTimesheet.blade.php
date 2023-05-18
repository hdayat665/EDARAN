@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Timesheet <small>| Realtime Activity | Event Realtime Activity </small></h1>
        <div class="panel panel" id="eventRealtimeJs">
            <div class="panel-body">
                <div class="row p-2">
                    <div class="col-sm-6">
                        <a data-bs-toggle="modal" data-bs-target="#neweventmodal" class="btn btn-primary">New Event</a>
                        <a href="/realtimeEmployeeTimesheet" class="btn btn-primary">View Employee</a>
                    </div>
                    <div class="col-sm-6" style="display: flex; justify-content: flex-end">
                        <a id="filter" class="btn btn-default btn-icon btn-lg">
                            <i class="fa fa-filter"></i>
                        </a>
                    </div>
                </div><br>
                {{-- <div class="form-control" id="filterform" style="display:none"> --}}
                    <form action="/searchRealtimeEventTimesheet" method="POST">
                        @csrf
                        <div class="row p-2" id="filterform" style="display:none">
                            <h4>Filter</h4>
                            <div class="col-sm-2">
                                <label for="emergency-firstname" class="form-label">Employee Name</label>
                                {{-- <select class="form-select" id="employeesearch" name="employee_name" data-default-value="">
                                    <option class="form-label" value="">Please Select</option>
                                    <?php $employees = getEmployee(); ?>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->user_id }}">{{ $employee->employeeName }}</option>
                                    @endforeach
                                </select> --}}
                                <select class="form-select" id="employeesearch" name="employee_name"  data-default-value="">
                                    <option class="form-label" value="" >Please Select</option>
                                    <?php $employees = getEmployee() ?>
                                    @foreach ($employees as $employee)
                                    <option value="{{$employee->user_id}}" {{($employeeId == $employee->user_id) ? 'selected="selected"' : ''}}>{{$employee->employeeName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="emergency-firstname" class="form-label">Event Name</label>
                                <select class="form-select" id="eventsearch" name="event_name" data-default-value="">
                                    <option class="form-label" value="">Please Select</option>
                                    <?php $timesheets = getEventTimesheet(); ?>
                                    @foreach ($timesheets as $timesheet)
                                        {{-- <option value="{{ $timesheet->event_name }}">{{ $timesheet->event_name }}</option> --}}
                                        <option value="{{$timesheet->event_name}}" {{($eventId == $timesheet->event_name) ? 'selected="selected"' : ''}}>{{$timesheet->event_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="emergency-firstname" class="form-label">Date Range</label>
                                <input type="text" id="daterange" class="form-control" name="date_range" value=""
                                    placeholder="click to select the date range" />
                            </div>
                            <div class="col-sm-2">
                                <label for="emergency-firstname" class="form-label">&nbsp;</label>
                                <button class="btn btn-primary form-control" type="submit"> <i
                                        class="fas fa-magnifying-glass"></i> Search</button>
                            </div>
                            <div class="col-sm-2">
                                <label for="emergency-firstname" class="form-label">&nbsp;</label>
                                <a href="#" class="btn btn-primary form-control" id="reset"> <i class="fas fa-repeat"></i>
                                    Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                {{-- <div class="form-control"> --}}
                    <div class="panel-body">
                        <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Action</th>
                                    <th class="text-nowrap">Event Name</th>
                                    <th width="10%">Date</th>
                                    <th class="text-nowrap">Time</th>
                                    <th class="text-nowrap">Venue</th>
                                    <th class="text-nowrap">Description</th>
                                    <th class="text-nowrap">Participant</th>
                                    <th class="text-nowrap">Created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                               
                                @if ($events)
                                    @foreach ($events as $event)
                                        <tr class="odd gradeX">
                                            <td>{{ $no++ }}</td>
                                            <td style="text-align: center" width="7%"><a href="javascript:;" data-bs-toggle="modal"
                                                    data-id="{{ $event->id }}" id="buttonViewEvent"
                                                    class="btn btn-primary"></i> View</a></td>
                                            <td>{{ $event->event_name }}</td>
                                            <td>{{ $event->start_date }} - {{ $event->end_date }}</td>
                                            <td>{{ $event->start_time }} - {{ $event->end_time }}</td>
                                            <td>{{ $event->venue ?? '-' }}</td>
                                            {{-- <td>{{ $event->location ? getProjectLocation($event->location)->location_name : '-' }} --}}
                                            </td>
                                            <td>{{ $event->desc ? $event->desc : '-' }}</td>
                                            @php
                                                $names = explode(',', $event->participant);
                                            @endphp
                                            <td style="text-align: center" width="7%"><a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal"
                                                    data-id="{{ $event->id }}" id="buttonnViewParticipant"></i>  {{ count($names) }}</a></td>
                                                    {{-- data-id="{{ $event->id }}" id="buttonnViewParticipant"></i> view</a></td> --}}
                                            <td>{{ $event->employeeName ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                {{-- </div> --}}
            </div>
            @include('modal.timesheet.addEventRealtimeModal')
            @include('modal.timesheet.viewEventRealtimeModal')
            @include('modal.timesheet.viewParticipantRealtimeModal')    
        @endsection
