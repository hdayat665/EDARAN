@extends('layouts.dashboardTenant')
@section('content')

        <div id="content" class="app-content">		
            <h1 class="page-header">My Timesheet <small>| Summary</small></h1>
            
            <!-- BEGIN panel -->
            <div class="panel panel" id="timesheetSummaryJs">
                
                <!-- BEGIN panel-heading -->              
                <div class="panel-heading">
                    {{-- <div class="col-md-6">
                        <a href="/myTimesheet" class="btn btn-primary">+ Add Logs</a>
                    </div> --}}
                    <div class="row p-2">
                        <h4>Current Month: {{ date('F') }}</h4>
                        <h4>Current Year: {{ date('Y') }}</h4>
                    </div>
                    <h4 class="panel-title"></h4>
                    
                </div>
                <!-- END panel-heading -->

                {{-- <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <tr>
                            <th>Total Days of This Month</th>
                            <td><label id=""> {{ $timesheetsday['totalDays'] }} days</label></td>

                            <th>Weekdays</th>
                            <td><label id=""> {{ $timesheetsday['weekdays'] }} days</label></td>
                        </tr>
                        <tr>
                            <th >Weekend</th>
                            <td><label id="">{{ $timesheetsday['weekends'] }} days</label></td>
                            <th>Working Days</th>
                            <td>{{ $timesheetsday['workingDays'] }} days</td>
                        </tr>
                        <tr>
                            <th>Public Holidays</th>
                            <td>{{ $timesheetsday['holidays'] }} days</td>
                            <th>Worked Days</th>
                            <td>{{ $timesheetsday['workedDays'] }} days</td>
                        </tr>
                        <tr>
                            <th>Eligible Public Holidays</th>
                            <td>{{ $timesheetsday['holidays'] }} days</td>
                            <th>Remaining TSR</th>
                            <td>{{ $timesheetsday['remaininingtsr'] }} days</td>
                            
                        </tr>
                    </table>
                </div> --}}

                <!-- BEGIN panel-body -->
                <div class="panel-body">
                    
                    <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="8%" class="text-nowrap">Action</th>
                                <th class="text-nowrap">Year</th>
                                <th class="text-nowrap">Month</th>
                                <!-- <th width="9%" data-orderable="false" class="align-middle">Status</th> -->
                                <th width="9%" data-orderable="false" class="align-middle">TSR Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($timesheets)
                            @foreach ($timesheets as $timesheet)
                            <tr class="odd gradeX">
                                <td>
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-menu">
                                        <?php
                                            $monthNumber = DateTime::createFromFormat('M', $timesheet->month)->format('m');
                                        ?>
                                        @if ($timesheet->status == 'approve' || $timesheet->status == 'amend')
                                            <div class="viewtimesheet">
                                                <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}?year={{ $timesheet->year }}&month={{$monthNumber}}" class="dropdown-item" id="viewtimesheet">View123</a>
                                            </div>
                                        @else 
                                            <div class="viewtimesheet">
                                            <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}?year={{ $timesheet->year }}&month={{$monthNumber}}" class="dropdown-item" id="viewtimesheet">View123</a>
                                            </div>
                                            {{-- <div class="canceltimesheet">
                                                <div class="dropdown-divider "></div>
                                                <a class="dropdown-item" data-id="{{$timesheet->id}}" id="cancelTimesheet">Cancel Timesheet</a>
                                            </div> --}}
                                        @endif

                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($timesheet->created_at)->format('Y') }}</td>
                                <td>{{$timesheet->month}}</td>
                                <!-- <td>
                                    @if ($timesheet->status == 'pending')
                                    <div id="awaitingapproval"> <span class="badge bg-warning rounded-pill">Awaiting Approval</span> </div>
                                    @endif

                                    @if ($timesheet->status == 'approve')
                                    <div id="approved"> <span class="badge bg-lime rounded-pill">Approved</span> </div>
                                    @endif

                                    {{-- @if ($timesheet->status == 'reject')
                                    <div id="rejected"> <span class="badge bg-danger rounded-pill">Rejected</span></div>
                                    @endif --}}

                                    @if ($timesheet->status == 'amend')
                                    <div id="amended"> <span class="badge bg-danger rounded-pill" data-toggle="tooltipamend"  data-placement="bottom" title="{{$timesheet->amendreason}}">Amended</span> </div>
                                    @endif
                                </td> -->

                                <td>{{ $timesheetsday['workedDays'] }} / {{ $timesheetsday['workingDays'] }} days</td>
                            </tr>
                            @endforeach 
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="row p-2">
                    <div class="col align-self-start">
                        <a href="#" class="btn btn-primary" onclick="window.history.back(); return false;"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
@endsection

