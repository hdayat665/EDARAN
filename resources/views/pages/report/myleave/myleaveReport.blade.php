@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content" >
    <h1 class="page-header">Reporting | Eleave Report</h1>
    <div class="row" id="eleavereportjs">
        <div class="col-xl-15">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Eleave Report</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content panel m-0 rounded-0 p-3">
                <div class="tab-pane fade active show" id="default-tab-1">
                    <form action="/searchEleaveReport" method="POST">
                        <div class="panel-body">
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Select Date</label>
                                    <input type="text" id="daterange" class="form-control" value="" name="date_range" placeholder="click to select the date range" />

                                </div>
                            </div>
                            <div class="row p-2" id="rowproject">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Select Type of Leave</label>
                                    <select class="form-select" name="typelist">
                                        <option value="" label="PLEASE CHOOSE "></option>
                                            @foreach($types as $dt)
                                                <option value="{{ $dt->id }}" {{ old('typeofleave') == $dt->id ? 'selected' : '' }}>{{ $dt->leave_types }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Select By :</label>
                                    <select class="form-select" id="reportby" name="">
                                        <option value="" selected>PLEASE CHOOSE</option>
                                        <option value="1">Department</option>
                                        <option value="2">Employee Name</option>
                                    </select>
                                </div>
                            </div>
                             <div class="row p-2" id="menu1"  style="display: none" >
                                <div class="col-sm-3" >
                                    <label for="emergency-firstname" class="form-label">Department</label>
                                    <select class="form-select" name="department" id="department">
                                        <option value="" label="PLEASE CHOOSE "></option>
                                            @foreach($department as $d)
                                                <option value="{{ $d->id }}" {{ old('department') == $d->id ? 'selected' : '' }}>{{ $d->departmentName }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="row p-2" id="menu2" style="display: none">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Select Employer</label>
                                    <select class="form-select" name="employer" id="employer">
                                        <option value="" label="PLEASE CHOOSE "></option>
                                            @foreach($employer as $de)
                                                <option value="{{ $de->user_id }}" {{ old('employer') == $de->user_id ? 'selected' : '' }}>{{ $de->fullName }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2" id="rowdepartment">
                                <div class="col-sm-3">
                                    <label for="emergency-firstname" class="form-label">Select Status: </label>
                                    <select class="form-select" name="status">
                                        <option value="">PLEASE CHOOSE</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Pending To Approved</option>
                                        <option value="3">Reject</option>
                                        <option value="4">Approved</option>
                                        
                                    </select>
                                </div>
                            </div>

                            
                            <div class="row p-2">
                                <div class="col-sm-12" style="display: flex; justify-content: flex-end" >
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
    <div class="row p-2">
        <div class="col align-self-start">
            <a href="/setting" class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

</div>
</div>

@endsection
