@extends('layouts.dashboardTenant')


@section('content')
    <style>
        .specific-radio[type="radio"]:checked {
            background-color: gray !important;
            border-color: gray !important;
        }

        .custom-dropdown-menu {
            position: static ;
            height: auto ;
            max-height: none ;
            overflow: visible ;
        }

        .upperReason {
            text-transform: uppercase;
        }

    </style>

    <div id="content" class="app-content">
        <h1 class="page-header" id="myleaveJs"> eLeave | My Leave</h1>
        <div class="row p-2">
            <div class="col-xl-15">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Leave Info</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">Leave History</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ Apply Leave</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel-heading mt-15px">
                                        <h5 class="panel-title">Leave Entitlement</h5>
                                    </div>
                                    <div class="panel-body">
                                        <div id="chart-wrapper" style="display: flex; justify-content: center;">
                                            <canvas id="myChart"  style="width:100%;max-width:500px" > </canvas>
                                        </div>
                                        <br>
                                        <div id="EarnedLeave" class="form-control">Earned Leave to Date:  Days</div>
                                        <br>
                                        <div id="totalNoPaidLeave" class="form-control">Total Days for No Paid Leave: 0</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel-heading mt-15px">
                                        <h5 id = "yearLeave" class="panel-title">Leave Carried Foward 2022</h5>
                                    </div>
                                    <div class="panel-body">
                                        <div id="chart-wrapper" style="display: flex; justify-content: center;">
                                            <canvas id="myChart2"style="width:100%;max-width:500px"></canvas>
                                        </div>
                                        <br>
                                        <div id = "LapseLeave" class="form-control "> Lapsed: 0 Days </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row p-2">
                                <div class="form-control">
                                    <h4> Active Leave </h4><br>
                                    <div class="row p-2">
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <a id="filtermy" class="btn btn-default btn-icon btn-lg">
                                                    <i class="fa fa-filter"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form action="/myleave#default-tab-1" method="POST">
                                            <div id="filterleavemy" style="display: none">
                                                <div class="row p-2">
                                                    <h5>Filter</h5>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Apply Date</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="applydatemy" value="<?php echo $applydatemy; ?>" id="datepicker-filtermy" placeholder="YYYY/MM/DD"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Type of Leave</label>
                                                        <select class="form-select" name="typelistmy" id = "typelistmy">
                                                            <option value="">PLEASE CHOOSE</option>
                                                            @foreach($types as $dt)
                                                                <option value="{{ $dt->id }}" {{ old('typelistmy') == $dt->id ? 'selected' : ($typelistmy == $dt->id ? 'selected' : '') }}>{{ $dt->leave_types }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select" id = "status_searchingmy" name="statusmy">
                                                            <option value="">PLEASE CHOOSE</option>
                                                            <option value="4" {{ old('statusmy') == '4' || $status_searchingmy == '4' ? 'selected' : '' }}>Approved</option>
                                                            <option value="3" {{ old('statusmy') == '3' || $status_searchingmy == '3' ? 'selected' : '' }}>Rejected</option>
                                                            <option value="2" {{ old('statusmy') == '2' || $status_searchingmy == '2' ? 'selected' : '' }}>Pending</option>
                                                            <option value="1" {{ old('statusmy') == '1' || $status_searchingmy == '1' ? 'selected' : '' }}>Pending Approval</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-2"></div>

                                                    <div class="col">
                                                        <div class="row-p-2">
                                                            <label for="test"></label>
                                                        </div>
                                                        <div class="row">
                                                            <button class="btn btn-primary" type="submit" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                        </div>
                                                    </div>&nbsp;
                                                    <div class="col">
                                                        <div class="row-p-2">
                                                            <label for="test"></label>
                                                        </div>
                                                        <div class="row">
                                                            <a href="#" class="btn btn-primary form-control" id="resetmy"> <i class="fas fa-repeat"></i> Reset</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-2"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row p-2">
                                        <table id="table-leave" class="table table-striped table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="1%">No.</th>
                                                    <th width="1%" data-orderable="false">Action</th>
                                                    <th width="1%">Applied Date</th>
                                                    <th>Type of Leave</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Total Days Applied</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $id = 0 ?>
                                                @if ($myleave)
                                                @foreach ($myleave as $m)
                                                <?php
                                                    $id++;
                                                    $applied_date = new DateTime($m->applied_date);
                                                    $start_date = new DateTime($m->start_date);
                                                    $end_date = new DateTime($m->end_date);
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td>{{ $id }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div>
                                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                                                    <i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i>
                                                                </a>
                                                            </div>

                                                            <div class="dropdown-menu custom-dropdown-menu test">
                                                                <div class="viewleave">
                                                                    <a href="javascript:;" id="editButton" data-id="{{ $m->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View Leave</a>
                                                                </div>
                                                                <div class="dropdown-divider "></div>
                                                                <div class="cancelleave">
                                                                    <a href="javascript:;" id="deleteButton" data-id="{{ $m->id }}" class="dropdown-item" ><i class="fa fa-trash" aria-hidden="true"></i> Cancel Leave</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$applied_date->format('Y-m-d') }}</td>
                                                    <td>{{$m->type}}</td>
                                                    <td>{{$start_date->format('Y-m-d') }}</td>
                                                    <td>{{$end_date->format('Y-m-d') }}</td>
                                                    <td>{{$m->total_day_applied. ' day'}}</td>
                                                    <td>@for ($i = 1; $i <= 4; $i++)
                                                            <?php
                                                                switch ($i) {
                                                                    case 1:
                                                                        $status = 'Pending';
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
                                                            @if ($m->status_final == $i)
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
                                <h3>Leave History</h3>
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
                                    <form action="/myleave#default-tab-2" method="POST">
                                        <div id="filterleave" style="display: none">
                                            <div class="row p-2">
                                                <h5>Filter</h5>
                                                <br>
                                                <br>
                                                <div class="col-md-2">
                                                    <label class="form-label">Apply Date</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="applydate" value="<?php echo $applydate; ?>" id="datepicker-filter" placeholder="YYYY/MM/DD"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Type of Leave</label>
                                                    <select class="form-select" name="typelist" id = "typelist">
                                                        <option value="">PLEASE CHOOSE</option>
                                                        @foreach($types as $dt)
                                                            <option value="{{ $dt->id }}" {{ old('typelist') == $dt->id ? 'selected' : ($typelist == $dt->id ? 'selected' : '') }}>{{ $dt->leave_types }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select" id = "status_searching" name="status">
                                                        <option value="">PLEASE CHOOSE</option>
                                                        <option value="4" {{ old('status') == '4' || $status_searching == '4' ? 'selected' : '' }}>Approved</option>
                                                        <option value="3" {{ old('status') == '3' || $status_searching == '3' ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col">
                                                    <div class="row-p-2">
                                                        <label for="test"></label>
                                                    </div>
                                                    <div class="row">
                                                        <button class="btn btn-primary" type="submit" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                    </div>
                                                </div>&nbsp;
                                                <div class="col">
                                                    <div class="row-p-2">
                                                        <label for="test"></label>
                                                    </div>
                                                    <div class="row">
                                                        <a href="#" class="btn btn-primary form-control" id="reset"> <i class="fas fa-repeat"></i> Reset</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <table id="tableleavedua" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th data-orderable="false">Action</th>
                                                <th width="1%">Applied Date</th>
                                                <th>Type of Leave</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Total Days Applied</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 0 ?>
                                                @if ($myleaveHistory)
                                                @foreach ($myleaveHistory as $mh)
                                            <?php
                                                $id++;
                                                $applied_date = new DateTime($mh->applied_date);
                                                $start_date = new DateTime($mh->start_date);
                                                $end_date = new DateTime($mh->end_date);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td style="width: 1%;">{{ $id }}</td>
                                                <td style="width: 1%;">
                                                    <div class="btn-group">
                                                        <div>
                                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                                                <i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i>
                                                            </a>
                                                        </div>

                                                        <div class="dropdown-menu custom-dropdown-menu test">
                                                            <div class="viewleave">
                                                                <a href="javascript:;" id="editButton2" data-id="{{ $mh->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="dropdown-item">View Leave</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$applied_date->format('Y-m-d') }}</td>
                                                <td>{{$mh->type}}</td>
                                                <td>{{$start_date->format('Y-m-d') }}</td>
                                                <td>{{$end_date->format('Y-m-d') }}</td>
                                                <td>{{$mh->total_day_applied. ' day'}}</td>
                                                <td>@for ($i = 1; $i <= 4; $i++)
                                                        <?php
                                                            switch ($i) {
                                                                case 1:
                                                                    $status = 'Pending';
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
                                                        @if ($mh->status_final == $i)
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
                    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </div>
        </div>
        @include('modal.eleave.myleave.active.leaveMyleaveModelStore')
        @include('modal.eleave.myleave.active.leaveMyleaveModelView')
        @include('modal.eleave.myleave.history.leaveMyleaveModelView')
    </div>
@endsection
