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
        <h1 class="page-header" id="eleaveentitlementJs"> | Staff Leave Entitlement</h1>
        <div class="row p-2">
            <div class="col-xl-15">
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
                            <span class="d-sm-block d-none">Current</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <div class="panel-body">
                            <div class="row p-2">
                                <div class="form-control">
                                    <div class="row p-2 ">
                                        <button class="btn btn-primary col-2" data-bs-toggle="modal" id="myModal1" data-bs-target="#updatelapse"> <i aria-hidden="true"></i> Generate Staff</button>
                                    </div>
                                    <div class="row p-2">
                                        {{-- <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <a id="filter" class="btn btn-default btn-icon btn-lg">
                                                    <i class="fa fa-filter"></i>
                                                </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="row">
                                        <form action="/leaveSupervisor" method="POST">
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
                                                                @foreach ($employer as $idem)
                                                                    <option value="{{ $idem->user_id }}" {{ old('idemployer') == $idem->user_id ? 'selected' : ($idemployer == $idem->user_id ? 'selected' : '') }}>
                                                                        {{ $idem->fullName }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row p-1">
                                                            <label for="text">Type of Leave</label>
                                                            <select class="form-select" name="type" id="type">
                                                                <option value="">ALL</option>
                                                                @foreach ($types as $dt)
                                                                    <option value="{{ $dt->id }}" {{ old('typelist') == $dt->id ? 'selected' : ($type == $dt->id ? 'selected' : '') }}>{{ $dt->leave_types }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                        &ensp;
                                                        <button id="reset" class="btn btn-primary">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> --}}
                                    <div class="row p-2">
                                        <table  id="tableentitlement"  class="table table-striped table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="1%">No.</th>
                                                    <th class="text-nowrap">Action</th>
                                                    <th class="text-nowrap">Employee Name</th>
                                                    <th class="text-nowrap">Department</th>
                                                    <th class="text-nowrap">Job Grade</th>
                                                    <th class="text-nowrap">Current Entitlement Balance</th>
                                                    <th class="text-nowrap">Sick Leave Entitlement Balance</th>
                                                    <th class="text-nowrap">Carry Forward Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id = 0 ?>
                                                    @if ($leave)
                                                    @foreach ($leave as $l)
                                                <?php $id++ ?>
                                                <tr class="odd gradeX">
                                                    <td>{{ $id }}</td>
                                                    <td>
                                                        <a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$l->id}}" data-bs-target="#editleave" class="btn btn-outline-blue">edit
                                                        </a>
                                                    </td>
                                                    <td>{{$l->fullname}}</td>
                                                    <td>{{$l->departmentName}}</td>
                                                    <td>{{$l->jobGradeName}}</td>
                                                    <td>{{$l->current_entitlement_balance}}</td>
                                                    <td>{{$l->sick_leave_entitlement_balance}}</td>
                                                    <td>{{$l->carry_forward_balance}}</td>
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
                                    {{-- <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <a id="filter" class="btn btn-default btn-icon btn-lg">
                                                <i class="fa fa-filter"></i>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                    <form action="/leaveSupervisor" method="POST">
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
                                                            @foreach ($employer as $idem)
                                                                <option value="{{ $idem->user_id }}" {{ old('idemployer') == $idem->user_id ? 'selected' : ($idemployer == $idem->user_id ? 'selected' : '') }}>
                                                                    {{ $idem->fullName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row p-1">
                                                        <label for="text">Type of Leave</label>
                                                        <select class="form-select" name="type" id="type">
                                                            <option value="">ALL</option>
                                                            @foreach ($types as $dt)
                                                                <option value="{{ $dt->id }}" {{ old('typelist') == $dt->id ? 'selected' : ($type == $dt->id ? 'selected' : '') }}>{{ $dt->leave_types }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <br>
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                    &ensp;
                                                    <button id="reset" class="btn btn-primary">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                                <div class="row p-2">
                                    <table  id="tableentitlement"  class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th width="1%">No.</th>
                                                <th class="text-nowrap">Action</th>
                                                <th class="text-nowrap">Employee Name</th>
                                                <th class="text-nowrap">Department</th>
                                                <th class="text-nowrap">Job Grade</th>
                                                <th class="text-nowrap">Current Entitlement Balance</th>
                                                <th class="text-nowrap">Sick Leave Entitlement Balance</th>
                                                <th class="text-nowrap">Carry Forward Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 0 ?>
                                                @if ($leave)
                                                @foreach ($leave as $l)
                                            <?php $id++ ?>
                                            <tr class="odd gradeX">
                                                <td>{{ $id }}</td>
                                                <td>
                                                    <a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$l->id}}" data-bs-target="#editleave" class="btn btn-outline-blue">edit
                                                    </a>
                                                </td>
                                                <td>{{$l->fullname}}</td>
                                                <td>{{$l->departmentName}}</td>
                                                <td>{{$l->jobGradeName}}</td>
                                                <td>{{$l->current_entitlement_balance}}</td>
                                                <td>{{$l->sick_leave_entitlement_balance}}</td>
                                                <td>{{$l->carry_forward_balance}}</td>
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
    </div>
    @include('modal.eleave.entitlement.entitlementCreateModal')
    @include('modal.eleave.entitlement.entitlementUpdateModal')
@endsection

