@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim | Cash Advance Approval | Finance Checker</h1>
        <div class="panel panel" id="financeCheckerCaJs">
            <div class="panel-body">
                <div class="form-control">

                    <div class="form-control">
                        <div class="row p-2">
                            <h3>Cash Advance Overview</h3>
                            <div class="row p-2">
                                <div class="col-sm-3">
                                    <h3 class="text-center">Total <br> Cash Advance:</h3>
                                    <h3 class="text-center text-primary ">2</h3>
                                </div>

                                <div class="col-sm-3">

                                    <h3 class="text-center">Total Pending Cash <br> Advance: </h3>
                                    <h3 class="text-center text-primary">3</h3>
                                </div>

                                <div class="col-sm-3">

                                    <h3 class="text-center">Total Rejected <br> Cash Advance:</h3>
                                    <h3 class="text-center text-primary">6</h3>
                                </div>

                                <div class="col-sm-3">
                                    <h3 class="text-center">Total Closed <br> Cash Advance:</h3>
                                    <h3 class="text-center text-primary">5</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
                                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link ">In Process</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-6" data-bs-toggle="tab" class="nav-link ">Generate PV</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-7" data-bs-toggle="tab" class="nav-link ">Payment</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link ">Paid</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link ">Rejected</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-5" data-bs-toggle="tab" class="nav-link ">Closed</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <button class="btn btn-primary" type="button" id="filter"> <i class="fa fa-filter" aria-hidden="true"></i></button>&nbsp;
                                        <button class="btn btn-primary" type="button"> <i class='far fa-file-pdf'></i></button>&nbsp;
                                    </div>
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
                            @include('pages.eclaim.claimApproval.cashAdvance.finance.checker.tab1')
                            @include('pages.eclaim.claimApproval.cashAdvance.finance.checker.tab2')
                            @include('pages.eclaim.claimApproval.cashAdvance.finance.checker.tab3')
                            @include('pages.eclaim.claimApproval.cashAdvance.finance.checker.tab4')
                            @include('pages.eclaim.claimApproval.cashAdvance.finance.checker.tab5')
                            @include('pages.eclaim.claimApproval.cashAdvance.finance.checker.tab6')
                            @include('pages.eclaim.claimApproval.cashAdvance.finance.checker.tab7')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.eclaimApproval.cashAdvance.caApprover')
@endsection
