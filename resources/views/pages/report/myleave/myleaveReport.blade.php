@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content" >
    <h1 class="page-header">Reporting <small>| E-leave</small></h1>
    <div class="row" id="eleavereportjs">
        <div class="col-xl-15">
            <div class="tab-content panel m-0 rounded-0 p-3">
                <div class="tab-pane fade active show" id="default-tab-1">
                    <form action="/searchEleaveReport" method="POST">
                        <div class="panel-body">
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Date</label>
                                    <input type="text" id="daterange" class="form-control" value="" name="date_range" placeholder="click to select the date range" />

                                </div>
                            </div>
                            <div class="row p-2" id="rowproject">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Type of Leave</label>
                                    <select class="form-select" name="typelist">
                                        <option value="" label="ALL"></option>
                                            @foreach($types as $dt)
                                                <option value="{{ $dt->id }}" {{ old('typeofleave') == $dt->id ? 'selected' : '' }}>{{ $dt->leave_types }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">By :</label>
                                    <select class="form-select" id="reportby" name="">
                                        <option value="" selected>ALL</option>
                                        <option value="1">DEPARTMENT</option>
                                        <option value="2">EMPLOYEE NAME</option>
                                    </select>
                                </div>
                            </div>
                             <div class="row p-2" id="menu1"  style="display: none" >
                                <div class="col-sm-3" >
                                    <label for="emergency-firstname" class="form-label">Department</label>
                                    <select class="form-select" name="department" id="department">
                                        <option value="" label="ALL"></option>
                                            @foreach($department as $d)
                                                <option value="{{ $d->id }}" {{ old('department') == $d->id ? 'selected' : '' }}>{{ $d->departmentName }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="row p-2" id="menu2" style="display: none">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Employee Name</label>
                                    <select class="form-select" name="employer" id="employer">
                                        <option value="" label="ALL"></option>
                                            @foreach($employer as $de)
                                                <option value="{{ $de->user_id }}" {{ old('employer') == $de->user_id ? 'selected' : '' }}>{{ $de->fullName }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2" id="rowdepartment">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Status: </label>
                                    <select class="form-select" name="status">
                                        <option value="">ALL</option>
                                        <option value="1">PENDING</option>
                                        <option value="2">PENDING APPROVAL</option>
                                        <option value="3">REJECTED</option>
                                        <option value="4">APPROVED</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row p-2">
                                <div class="col-sm-12" >
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
</div>

@endsection
