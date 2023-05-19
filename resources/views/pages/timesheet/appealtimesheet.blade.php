@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Timesheet <small>| Appeal Approval </small></h1>
        <div class="panel panel" id="appealTimesheetsJs">
            <div class="panel-body">
                <table id="appealtable" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th width="5%">Action</th>
                            <th class="text-nowrap"> Name</th>
                            <th width="10%">Log Date</th>
                            <th width="10%">Reason</th>
                            <th class="text-nowrap">Attachment</th>
                            <th class="text-nowrap">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        
                        @if ($appealapprovers)
                            @foreach ($appealapprovers as $app)
                                <tr class="odd gradeX">
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                            @if ($app->status == 'Locked')
                                            <div class="viewtimesheet">
                                                <a href="javascript:;" id="viewappealb" data-id="{{$app->id}}" class="dropdown-item"> View Log Appeal</a> 
                                            </div>
                                            <div class="approvetimesheet">
                                                <a  class="dropdown-item" data-id="{{$app->id}}" data-status="Approved" id="statusButton"> Approve Log Appeal</a>
                                            </div>
                                            <div class="approvetimesheet">
                                                <a  class="dropdown-item" data-id="{{$app->id}}" data-status="Rejected" id="statusButton">Reject Log Appeal</a>
                                            </div>
                                            @else
                                            <div class="viewtimesheet">
                                                <a href="javascript:;" id="viewappealb" data-id="{{$app->id}}" class="dropdown-item"> View Log Appeal</a> 
                                            </div>
                                           
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $app->employeeName }}</td>
                                    <td>{{ $app->applied_date }}</td>
                                    <td>{{ $app->reason }}</td>
                                    <td>{{ $app->file ?? '-' }}</td>
                                    {{-- <td><a href="{{ route('download', ['filename' => $app->file]) }}">{{$app->file}}</a></td>   --}}

                                    <?php
                                    if ($app->status === "Locked") {
                                        $app->status = "Pending";
                                    }
                                    ?>
                                    
                                    <td>{{ $app->status }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
            @include('modal.timesheet.appealmodalview')
        @endsection
