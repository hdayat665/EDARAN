@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim </small></h1>
        <div class="panel panel" id="myClaimJs">
            <div class="panel-body">
                <div class="form-control">
                    <h3>Claim Overview</h3>
                    <br>
                    <div class="row p-2">
                        <div class="col-sm-2">
                            <h3 class="text-center">Total Pending Claim Approval:</h3>
                            <h3 class="text-center text-primary ">2</h3>
                        </div>
                        <div class="col-sm-2">
                            <h3 class="text-center">Total Amount Pending Claims:</h3>
                            <h3 class="text-center text-primary">MYR 100.00</h3>
                        </div>
                        <div class="col-sm-2">
                            <h3 class="text-center">Total Amount Paid Claims:</h3>
                            <h3 class="text-center text-primary">MYR 600.00</h3>
                        </div>
                        <div class="col-sm-2">
                            <h3 class="text-center">Total Amount Rejected Claims:</h3>
                            <h3 class="text-center text-primary">MYR 0.00</h3>
                        </div>
                        <div class="col-sm-2">
                            <h3 class="text-center"> Total Pending Cash Advance:</h3>
                            <h3 class="text-center text-primary">2</h3>
                        </div>
                        <div class="col-sm-2">
                            <h3 class="text-center">Total Amount Cash Advance:</h3>
                            <h3 class="text-center text-primary">MYR 0.00</h3>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <div class="panel-body">
                        <div class="row p-2">
                            <div class="col-sm-4">
                                <div class="card text-center border-0">
                                    <div class="card-header">
                                        <ul class="nav nav-pills card-header-pills">
                                            <li class="nav-item" style="margin-left: 5px;"><a href="/generalClaimView" class="btn btn-primary">+
                                                    General Claim</a></li>
                                            <li class="nav-item" style="margin-left: 5px;"><a href="/cashAdvanceView" class="btn btn-primary">+ Cash
                                                    Advance</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content p-0 m-0">
                                            <div class="tab-pane fade active show">
                                                <table id="generalclaim" class="table table-striped table-bordered align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-nowrap">Year</th>
                                                            <th class="text-nowrap">Month</th>
                                                            <th class="text-nowrap">Status</th>
                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="odd gradeX">
                                                            <td>2022</td>
                                                            <td>SEPTEMBER</td>
                                                            <td><span class="badge bg-lime">Open</span></td>
                                                            <td><a href="/eclaim/applyclaim" type="button" class="btn btn-primary btn-sm">+ Apply</a></td>
                                                        </tr>
                                                        <tr class="even gradeC">
                                                            <td>2022</td>
                                                            <td>AUGUST</td>
                                                            <td><span class="badge bg-lime">Open</span></td>
                                                            <td><a href="/eclaim/updatemontly" type="button" class="btn btn-primary btn-sm">Update</a></td>
                                                        </tr>
                                                        <tr class="even gradeC">
                                                            <td>2022</td>
                                                            <td>JULY</td>
                                                            <td><span class="badge bg-danger">Expired</span></td>
                                                            <td><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">+
                                                                    Appeal</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END card -->
                            </div>
                            <div class=" col-sm-8">
                                <!-- BEGIN card -->
                                <div class="card text-center border-0">
                                    <div class="card-header">
                                        <ul class="nav nav-pills card-header-pills">
                                            <li class="nav-item"><a class="nav-link active " data-bs-toggle="tab" href="#card-pill-1" id="claimnav">Claim</a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#card-pill-2" id="cashnav">Cash Advance</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content p-0 m-0">
                                            @include('pages.eclaim.tabClaim')
                                            @include('pages.eclaim.tabCashAdvance')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.eclaim.appealClaim')
@endsection
