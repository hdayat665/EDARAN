@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Timesheet <small>| Appeal Approval </small></h1>
        <div class="panel panel" id="appealTimesheetsJs">
            <div class="panel-body">
                <div class="hljs-wrapper">
                    <div class="mb-3">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                                    <span class="d-sm-none">Tab 1</span>
                                    <span class="d-sm-block d-none">Active</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">Tab 2</span>
                                    <span class="d-sm-block d-none">History</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content panel m-0 rounded-0 p-3">
                            <!-- BEGIN tab-pane -->
                            <div class="tab-pane fade active show" id="default-tab-1">
                                <div class="row p-2 col-md-2" >
                                   <a href="javascript:;" id="approveAllButton" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Approve All</a>	&nbsp;&nbsp;&nbsp;
                               </div>
                                <form id="approveAllForm">
                                    <table id="appealtable" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th width="1%">&nbsp;</th>
                                                <th width="1%">No</th>
                                                <th width="2%">Action</th>
                                                <th width="8%">Appeal Date</th>
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
                                                        <td width="1%" class="fw-bold text-dark"><input class="form-check-input" value="{{$app->id}}" name="id[]" type="checkbox" id="checkbox1" /></td>
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
                                                        <td>{{ $app->created_at }}</td>
                                                        <td>{{ $app->employeeName }}</td>
                                                        <td>{{ $app->applied_date }}</td>
                                                        <td>{{ $app->reason }}</td>
                                                        {{-- <td>{{ $app->file ?? '-' }}</td> --}}
                                                        <td><a href="{{ route('download', ['filename' => $app->file ?? '-']) }}">{{$app->file ?? '' }}</a></td>
                                                        {{-- <td>
                                                            @php
                                                              $file = $app->file ?? '-';
                                                              $route = $file !== '-' ? route('download', ['filename' => $file]) : null;
                                                            @endphp
                                                            <a href="{{ $route }}">{{ $file }}</a>
                                                          </td> --}}
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
                                </form>
                            </div>
                            
                            <div class="tab-pane fade" id="default-tab-2">
                               
                                <table id="appealtablehistory" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th width="text-nowrap">Action</th>
                                            <th width="text-nowrap">Appeal Date</th>
                                            <th class="text-nowrap"> Name</th>
                                            <th width="text-nowrap">Log Date</th>
                                            <th width="text-nowrap">Reason</th>
                                            <th class="text-nowrap">Attachment</th>
                                            <th class="text-nowrap">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        
                                        @if ($appealapprovershistory)
                                            @foreach ($appealapprovershistory as $app)
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
                                                    <td>{{ $app->created_at }}</td>
                                                    <td>{{ $app->employeeName }}</td>
                                                    <td>{{ $app->applied_date }}</td>
                                                    <td>{{ $app->reason }}</td>
                                                    {{-- <td>{{ $app->file ?? '-' }}</td> --}}
                                                    <td><a href="{{ route('download', ['filename' => $app->file ?? '-']) }}">{{$app->file ?? '' }}</a></td>
                                                    {{-- <td>
                                                        @php
                                                          $file = $app->file ?? '-';
                                                          $route = $file !== '-' ? route('download', ['filename' => $file]) : null;
                                                        @endphp
                                                        <a href="{{ $route }}">{{ $file }}</a>
                                                      </td> --}}
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
                </div>
            </div>
        </div>
    </div>    
            @include('modal.timesheet.appealmodalviewapprover')
            
        @endsection
