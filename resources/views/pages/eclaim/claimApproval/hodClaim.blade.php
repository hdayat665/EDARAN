@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim | Claim Approval | Supervisor</h1>
        <div class="panel panel" id="hodClaimJs">
            <div class="panel-body">
                <!-- <div class="form-control">
                    <h3>Claim Overview</h3>
                    <div class="row p-2">
                        <div class="col-sm-3">
                            <h3 class="text-center">Total <br> Claims:</h3>
                            <h3 class="text-center text-primary ">2</h3>
                        </div>

                        <div class="col-sm-3">

                            <h3 class="text-center">Total <br> Pending Claims:</h3>
                            <h3 class="text-center text-primary">3</h3>
                        </div>

                        <div class="col-sm-3">

                            <h3 class="text-center">Total <br> Rejected Claims</h3>
                            <h3 class="text-center text-primary">6</h3>
                        </div>

                        <div class="col-sm-3">

                            <h3 class="text-center">Total <br> Closed Claims:</h3>
                            <h3 class="text-center text-primary">0</h3>
                        </div>
                    </div>
                </div>
                <br> -->

                <div class="form-control">
                    <div class="row p-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col d-flex justify-content-start">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link ">Recommended</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link ">Bucket</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link ">Rejected</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="#default-tab-5" data-bs-toggle="tab" class="nav-link ">Amended</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="col d-flex justify-content-end">
                                    <button class="btn btn-primary" type="button">Skip the Queue</button>&nbsp;
                                    <button class="btn btn-primary" type="button">Approve All</button>&nbsp;
                                    <button class="btn btn-primary" type="button" id="filter"> <i class="fa fa-filter" aria-hidden="true"></i></button>&nbsp;
                                    <button class="btn btn-primary" type="button"> <i class='far fa-file-pdf'></i></button>&nbsp;
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="filteronoff" style="display: none">
                        <div class="form-control">
                            <div class="row p-2">
                                <div class="col-md-2">
                                    <label for="employee name" class="form-label">Employee Name</label>
                                    <select class="form-select form-select-lg mb-2" aria-label=".form-select-lg example">
                                        <option selected value="all_employee">All Employee</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="employee name" class="form-label">Month</label>
                                    <select class="form-select form-select-lg mb-2" aria-label=".form-select-lg example">
                                        <option selected value="all_employee">Select Month</option>
                                        <option value="all_employee">January</option>
                                        <option value="all_employee">February</option>
                                        <option value="all_employee">Mac</option>
                                        <option value="all_employee">April</option>
                                        <option value="all_employee">Mei</option>
                                        <option value="all_employee">June</option>
                                        <option value="all_employee">July </option>
                                        <option value="all_employee">August</option>
                                        <option value="all_employee">September</option>
                                        <option value="all_employee">October</option>
                                        <option value="all_employee">November</option>
                                        <option value="all_employee">Disember</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="employee name" class="form-label">Claim Type</label>
                                    <select class="form-select form-select-lg mb-2" aria-label=".form-select-lg example">
                                        <option selected value="all_employee">Select Claim Type</option>
                                        <option value="all_employee">MTC </option>
                                        <option value="all_employee">GNC </option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="employee name" class="form-label">Status</label>
                                    <select class="form-select form-select-lg mb-2" aria-label=".form-select-lg example">
                                        <option selected value="">Select Status</option>
                                        <option value="">Pending</option>
                                        <option value="">Approved</option>
                                        <option value="">Rejected</option>
                                        <option value="">Amended</option>
                                        <option value="">Cancelled</option>
                                    </select>
                                </div>

                                <div class="col-md-2"></div>

                                <div class="col">
                                    <div class="row-p-2">
                                        <label for="test"></label>
                                    </div>

                                    <div class="row">
                                        <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                    </div>
                                </div>&nbsp;

                                <div class="col">
                                    <div class="row-p-2">
                                        <label for="test"></label>
                                    </div>

                                    <div class="row">
                                        <button class="btn btn-primary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content panel p-3 rounded">
                        @include('pages.eclaim.claimApproval.hodTab1')
                        @include('pages.eclaim.claimApproval.hodTab2')
                        @include('pages.eclaim.claimApproval.hodTab3')
                        @include('pages.eclaim.claimApproval.hodTab4')
                        @include('pages.eclaim.claimApproval.hodTab5')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.eclaimApproval.hodModal')
@endsection
