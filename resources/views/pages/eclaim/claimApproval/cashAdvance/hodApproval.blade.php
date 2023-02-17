@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <!-- BEGIN breadcrumb -->
        <!-- BEGIN breadcrumb -->

        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">eClaim | Cash Advance Approval | Head Of Department</h1>
        <div class="panel panel">
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
                                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link ">Approved</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link ">Rejected</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link ">Closed</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <button class="btn btn-primary" type="button">Skip the Queue</button>&nbsp;
                                        <button class="btn btn-primary" type="button">Approve All</button>&nbsp;
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
                            <div class="tab-pane fade active show" id="default-tab-1">
                                <!-- {{-- claim approval --}} -->
                                <table id="active" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false"></th>
                                            <th data-orderable="false">Action</th>
                                            <th class="text-nowrap">Claim ID</th>
                                            <th class="text-nowrap">Requested By</th>
                                            <th class="text-nowrap">Type of Cash Advance</th>
                                            <th class="text-nowrap">Request Date</th>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap"> Amount (RM)</th>
                                            <th class="text-nowrap">Status Date</th>
                                            <th class="text-nowrap">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" id="" name="" value=""></td>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        PO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            <td>201</td>
                                            <td>Marimar</td>
                                            <td>Project (Outstation)</td>
                                            <td>20/7/2022</td>
                                            <td>24/7/2022</td>
                                            <td>MYR130</td>
                                            <td>Pending</td>
                                            <td>21/7/2022</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" id="" name="" value=""></td>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> View
                                                        PNO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Project (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Pending</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" id="" name="" value=""></td>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        OO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Pending</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" id="" name="" value=""></td>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        ONO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-ban" aria-hidden="true"></i> Reject</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Pending</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="default-tab-2">
                                <table id="approved" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Action</th>
                                            <th class="text-nowrap">Claim ID</th>
                                            <th class="text-nowrap">Requested By</th>
                                            <th class="text-nowrap">Type of Cash Advance</th>
                                            <th class="text-nowrap">Request Date</th>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap"> Amount (RM)</th>
                                            <th class="text-nowrap">Status Date</th>
                                            <th class="text-nowrap">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        PO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            <td>201</td>
                                            <td>Marimar</td>
                                            <td>Project (Outstation)</td>
                                            <td>20/7/2022</td>
                                            <td>24/7/2022</td>
                                            <td>MYR130</td>
                                            <td>Pending</td>
                                            <td>21/7/2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> View
                                                        PNO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Project (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Pending</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        OO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Pending</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        ONO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Pending</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="default-tab-3">
                                <table id="rejected" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Action</th>
                                            <th class="text-nowrap">Claim ID</th>
                                            <th class="text-nowrap">Requested By</th>
                                            <th class="text-nowrap">Type of Cash Advance</th>
                                            <th class="text-nowrap">Request Date</th>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap"> Amount (RM)</th>
                                            <th class="text-nowrap">Status Date</th>
                                            <th class="text-nowrap">Status</th>
                                            <th class="text-nowrap">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        PO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            <td>201</td>
                                            <td>Marimar</td>
                                            <td>Project (Outstation)</td>
                                            <td>20/7/2022</td>
                                            <td>24/7/2022</td>
                                            <td>MYR130</td>
                                            <td>Rejected</td>
                                            <td>21/7/2022</td>
                                            <td>Not Enough</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> View
                                                        PNO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Project (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Rejected</td>
                                            <td>21/07/2022</td>
                                            <td>Not Enough</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        OO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Rejected</td>
                                            <td>21/07/2022</td>
                                            <td>Not Enough</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        ONO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>Rejected</td>
                                            <td>21/07/2022</td>
                                            <td>Not Enough</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="default-tab-4">
                                <table id="closed" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Action</th>
                                            <th class="text-nowrap">Claim ID</th>
                                            <th class="text-nowrap">Requested By</th>
                                            <th class="text-nowrap">Type of Cash Advance</th>
                                            <th class="text-nowrap">Request Date</th>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap"> Amount (RM)</th>
                                            <th class="text-nowrap">Cleared Date</th>
                                            <th class="text-nowrap">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        PO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            <td>201</td>
                                            <td>Marimar</td>
                                            <td>Project (Outstation)</td>
                                            <td>20/7/2022</td>
                                            <td>24/7/2022</td>
                                            <td>MYR130</td>
                                            <td>PAID</td>
                                            <td>21/7/2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewprojectnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> View
                                                        PNO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Project (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>PAID</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        OO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>PAID</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i
                                                        class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="/claimapproval/viewothersnoneoutstation" id="" data-id="" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        View
                                                        ONO</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:;" id="" data-id="" class="dropdown-item"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                                                </div>
                                            </td>
                                            <td>202</td>
                                            <td>Syqfiq</td>
                                            <td>Others (Non-Outstation)</td>
                                            <td>14/7/2022</td>
                                            <td>23/7/2022</td>
                                            <td>MYR250.00</td>
                                            <td>PAID</td>
                                            <td>21/07/2022</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
