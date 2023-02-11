@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim | Claim Approval | Supervisor</h1>
        <div class="panel panel" id="supervisorDepartmentJs">
            <div class="panel-body">
                <div class="form-control">
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
                                            <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link ">Recommended</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link ">Amend</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link ">Rejected</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content panel p-3 rounded">
                        @include('pages.eclaim.claimApproval.supervisorTab1')
                        @include('pages.eclaim.claimApproval.supervisorTab2')
                        @include('pages.eclaim.claimApproval.supervisorTab3')
                        @include('pages.eclaim.claimApproval.supervisorTab4')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.eclaimApproval.supervisorModal');
@endsection
