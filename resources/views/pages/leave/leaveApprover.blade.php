@extends('layouts.dashboardTenant')

@section('content')

    <style>

        .custom-dropdown-menu {
            position: static ;
            height: auto ;
            max-height: none ;
            overflow: visible ;
        }

    </style>

    <div id="content" class="app-content">
        <h1 class="page-header" id="leaveHodJs"> | Leave Approval | Approver</h1>
        <div class="row p-2">
            <div class="col-xl-15">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Active Leave</span>
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
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <div class="panel-body">
                            <div class="row p-2">
                                <div class="form-control">
                                    <div class="row p-2">
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <a id="filter" class="btn btn-default btn-icon btn-lg">
                                                    <i class="fa fa-filter"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form action="/leaveApprover#default-tab-1" method="POST">
                                            <div id="filterleave" style="display: none">
                                                <h5>Filter</h5><br>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="row p-1">
                                                            <label for="date">Apply Date</label>
                                                            <input type="text" class="form-control" placeholder="YYYY/MM/DD" name="applydate" value="<?php echo $applydate; ?>" id="datepicker-date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row p-1">
                                                            <label for="text">Employee Name</label>
                                                            <select class="form-select" name="idemployer" id="idemployer">
                                                                <option value="">ALL</option>
                                                                @foreach($employer as $idem)
                                                                    <option value="{{ $idem->user_id }}" {{ old('idemployer') == $idem->user_id ? 'selected' : ($idemployer == $idem->user_id ? 'selected' : '') }}>{{ $idem->fullName }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row p-1">
                                                            <label for="text">Type of Leave</label>
                                                            <select class="form-select" name="type" id="type">
                                                                <option value="">ALL</option>
                                                                @foreach($types as $dt)
                                                                    <option value="{{ $dt->id }}" {{ old('typelist') == $dt->id ? 'selected' : ($type == $dt->id ? 'selected' : '') }}>{{ $dt->leave_types }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <br>
                                                        <!-- <div class="row"> -->
                                                            <button class="btn btn-primary" type="submit" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                            &ensp;
                                                            <button  id="reset" class="btn btn-primary">Reset</button>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row p-2">
                                        <table id="leaveApproval" class="table table-striped table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="1%">No.</th>
                                                    <th width="1%" data-orderable="false">Action</th>
                                                    <th>Applied Date</th>
                                                    <th>Employee Name</th>
                                                    <th>Type of Leave</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Total Days Applied</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id = 0 ?>
                                                        @if ($leaveApproverListActive)
                                                        @foreach ($leaveApproverListActive as $l)
                                                <?php $id++ ?>

                                                <tr class="odd gradeX">
                                                    <td>{{ $id }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div>
                                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                                            </div>
                                                            <ul class="dropdown-menu custom-dropdown-menu test" >
                                                                <li><a class="dropdown-item" href="/viewTimesheetLeave/{{$l->up_user_id}}">View Calendar</a></li>
                                                                <div class="dropdown-divider"></div>
                                                                <li><a href="javascript:;" id="viewbutton" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#viewmodal" class="btn">View Leave</a></li>
                                                                @if ($l->up_app_status != '4')
                                                                    <div class="dropdown-divider"></div>
                                                                    <li><a href="javascript:;" id="editButton2" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#approveModal-tab-1" class="btn">Approve Leave</a></li>
                                                                @endif
                                                                @if ($l->up_app_status != '3')
                                                                    <div class="dropdown-divider"></div>
                                                                    <li><a href="javascript:;" id="editButton3" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#rejectModal-tab-1" class="btn">Reject Leave</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>{{$l->applied_date}}</td>
                                                    <td>{{$l->fullName}}</td>
                                                    <td>{{$l->type}}</td>
                                                    <td>{{$l->start_date}}</td>
                                                    <td>{{$l->end_date}}</td>
                                                    <td>{{$l->total_day_applied}}</td>
                                                    <td>
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            <?php
                                                                switch ($i) {
                                                                    case 1:
                                                                        $status = 'Pending Approval';
                                                                        break;
                                                                    case 2:
                                                                        $status = 'Pending Approval';
                                                                        break;
                                                                    case 3:
                                                                        $status = 'Rejected';
                                                                        break;
                                                                    case 4:
                                                                        $status = 'Approved';
                                                                        break;
                                                                    default:
                                                                        $status = 'Unknown';
                                                                }
                                                            ?>
                                                            @if ($l->up_app_status == $i)
                                                                @php
                                                                    echo $status;
                                                                    break;
                                                                @endphp
                                                            @endif
                                                        @endfor
                                                    </td>
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
                    <div class="tab-pane fade" id="default-tab-2">
                        <h3 class="mt-10px"></i></h3>
                        <div class="panel-body">
                            <div class="form-control">
                                <div class="row p-2">
                                    <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <a id="filter" class="btn btn-default btn-icon btn-lg">
                                                <i class="fa fa-filter"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <form action="/leaveApprover#default-tab-2" method="POST">
                                        <div id="filterleave" style="display: none">
                                            <h5>Filter</h5><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="row p-1">
                                                        <label for="date">Apply Date</label>
                                                        <input type="text" class="form-control" placeholder="YYYY/MM/DD" name="applydateH" value="<?php echo $applydate; ?>" id="datepicker-date">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row p-1">
                                                        <label for="text">Employee Name</label>
                                                        <select class="form-select" name="idemployerH" id="idemployerH">
                                                            <option value="">ALL</option>
                                                            @foreach($employer as $idem)
                                                                <option value="{{ $idem->user_id }}" {{ old('idemployerH') == $idem->user_id ? 'selected' : ($idemployerH == $idem->user_id ? 'selected' : '') }}>{{ $idem->fullName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row p-1">
                                                        <label for="text">Type of Leave</label>
                                                        <select class="form-select" name="typeH" id="typeH">
                                                            <option value="">ALL</option>
                                                            @foreach($types as $dt)
                                                                <option value="{{ $dt->id }}" {{ old('typelist') == $dt->id ? 'selected' : ($typeH == $dt->id ? 'selected' : '') }}>{{ $dt->leave_types }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <br>
                                                    <!-- <div class="row"> -->
                                                        <button class="btn btn-primary" type="submit" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                        &ensp;
                                                        <button  id="reset" class="btn btn-primary">Reset</button>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row p-2">
                                    <table id="leaveApprovalHistory" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th width="1%">No.</th>
                                                <th width="1%" data-orderable="false">Action</th>
                                                <th>Applied Date</th>
                                                <th>Employee Name</th>
                                                <th>Type of Leave</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Total Days Applied</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 0 ?>
                                                    @if ($leaveApproverListHistory)
                                                    @foreach ($leaveApproverListHistory as $l)
                                            <?php $id++ ?>

                                            <tr class="odd gradeX">
                                                <td>{{ $id }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <div>
                                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                                        </div>
                                                        <ul class="dropdown-menu custom-dropdown-menu test" >
                                                            <li><a class="dropdown-item" href="/viewTimesheetLeave/{{$l->up_user_id}}">View Calendar</a></li>
                                                            <div class="dropdown-divider"></div>
                                                            <li><a href="javascript:;" id="viewbutton" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#viewmodal" class="btn">View Leave</a></li>
                                                            @if ($l->up_app_status != '4')
                                                                <div class="dropdown-divider"></div>
                                                                <li><a href="javascript:;" id="editButton2" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#approveModal-tab-1" class="btn">Approve Leave</a></li>
                                                            @endif
                                                            @if ($l->up_app_status != '3')
                                                                <div class="dropdown-divider"></div>
                                                                <li><a href="javascript:;" id="editButton3" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#rejectModal-tab-1" class="btn">Reject Leave</a></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>{{$l->applied_date}}</td>
                                                <td>{{$l->fullName}}</td>
                                                <td>{{$l->type}}</td>
                                                <td>{{$l->start_date}}</td>
                                                <td>{{$l->end_date}}</td>
                                                <td>{{$l->total_day_applied}}</td>
                                                <td>
                                                    @for ($i = 1; $i <= 4; $i++)
                                                        <?php
                                                            switch ($i) {
                                                                case 1:
                                                                    $status = 'Pending Approval';
                                                                    break;
                                                                case 2:
                                                                    $status = 'Pending Approval';
                                                                    break;
                                                                case 3:
                                                                    $status = 'Rejected';
                                                                    break;
                                                                case 4:
                                                                    $status = 'Approved';
                                                                    break;
                                                                default:
                                                                    $status = 'Unknown';
                                                            }
                                                        ?>
                                                        @if ($l->up_app_status == $i)
                                                            @php
                                                                echo $status;
                                                                break;
                                                            @endphp
                                                        @endif
                                                    @endfor
                                                </td>
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
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
        @include('modal.eleave.approver.approverModelView')
        @include('modal.eleave.approver.approverModelApproved')
        @include('modal.eleave.approver.approverModelRejected')
    </div>

@endsection
