@extends('layouts.dashboardTenant')
@section('content')

        <div id="content" class="app-content">		
            <h1 class="page-header">My Timesheet <small>| Summary</small></h1>
            
            <!-- BEGIN panel -->
            <div class="panel panel">
                
                <!-- BEGIN panel-heading -->              
                <div class="panel-heading">
                    <div class="col-md-6">
                        <a href="/myTimesheet" class="btn btn-primary">+ Add Logs</a>
                    </div>
                    <h4 class="panel-title"></h4>
                    
                </div>
                <!-- END panel-heading -->

                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <tr>
                            <th>Total Days of This Month</th>
                            <td>31 Days</td>
                            <th>Weekdays</th>
                            <td>22 Days</td>
                        </tr>
                        <tr>
                            <th >Weekend</th>
                            <td>9 Days</td>
                            <th>Working Days</th>
                            <td>19 Days</td>
                        </tr>
                        <tr>
                            <th>Public Holidays</th>
                            <td>5 Days</td>
                            <th>Worked Days</th>
                            <td>19 Days</td>
                        </tr>
                        <tr>
                            <th>Eligible Public Holidays</th>
                            <td>3 Days</td>
                            <th>Remaining TSR</th>
                            <td>0 Days</td>
                        </tr>
                    </table>
                </div>

                <!-- BEGIN panel-body -->
                <div class="panel-body">
                    
                    <table id="timesheetapproval" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="1%">&nbsp;</th>
                                <th class="text-nowrap">Action</th>
                                <th class="text-nowrap">Submitted Date</th>
                                <th class="text-nowrap">Employee Name</th>
                                <th class="text-nowrap">Month</th>
                                <th class="text-nowrap">Designation</th>
                                <th class="text-nowrap">Department</th>
                                <th width="9%" data-orderable="false" class="align-middle">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($timesheets)
                            @foreach ($timesheets as $timesheet)
                            <tr class="odd gradeX">
                                <td width="1%" class="fw-bold text-dark"><input class="form-check-input" value="{{$timesheet->id}}" name="id[]" type="checkbox" id="checkbox1" /></td>
                                <td>
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-menu">
                                        @if ($timesheet->status == 'approve' || $timesheet->status == 'amend')
                                        <div class="viewtimesheet">
                                            <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}" class="dropdown-item" data-id="{{$timesheet->id}}" id="viewtimesheet">View Timesheet</a>
                                        </div>
                                        {{-- <div class="canceltimesheet">
                                            <div class="dropdown-divider "></div>
                                            <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="cancel" id="statusButton">Cancel Timesheet</a>
                                        </div> --}}
                                        @else
                                        <div class="viewtimesheet">
                                            <a href="/viewTimesheet/{{$timesheet->id}}/{{$timesheet->user_id}}" class="dropdown-item" data-id="{{$timesheet->id}}" id="viewtimesheet">View Timesheet</a>
                                        </div>
                                        <div class="approvereject">
                                            <div class="dropdown-divider "></div>
                                            <div class="approvetimesheet">
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="approve" id="statusButton">Approve Timesheet</a>
                                            </div>
                                            {{-- <div class="rejecttimesheet">
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="reject" id="statusButton">Reject Timesheet</a>
                                            </div> --}}
                                        </div>
                                        <div class="amendtimesheet">
                                            <div class="dropdown-divider "></div>
                                            <div class="amendtimesheet">
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="amend" id="amendreasonmodal" data-bs-toggle="modal"
                                                    id="amendreasonmodal">Amend Timesheet</a>
                                            </div>
                                            {{-- <div class="rejecttimesheet">
                                                <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="reject" id="statusButton">Reject Timesheet</a>
                                            </div> --}}
                                        </div>
                                        {{-- <div class="canceltimesheet">
                                            <div class="dropdown-divider "></div>
                                            <a  class="dropdown-item" data-id="{{$timesheet->id}}" data-status="cancel" id="statusButton">Cancel Timesheet</a>
                                        </div> --}}
                                        @endif
                                    </div>
                                </td>
                                <td>{{$timesheet->created_at}}</td>
                                <td>{{$timesheet->employee_name ?? '-'}}</td>
                                <td>{{$timesheet->month}}</td>
                                <td>{{$timesheet->designation ?? '-'}}</td>
                                <td>{{$timesheet->department}}</td>
                                <td>
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
                                </td>
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