@extends('layouts.dashboardTenant')
@section('content')

    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | Monthly Claim | View </small></h1>
        <div class="panel panel" id="monthlyClaimViewJs">
            <div class="panel-body"> 
        
                {{-- ROW 1 --}}
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="form-control">
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Employee Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input readonly type="text"  class="form-control" value="{{ $user->employeeName ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Designation</label>
                                </div>
                                <div class="col-md-8">
                                    <input readonly type="text" value="{{ getDesignationName($user->user_id ?? '-') }}" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Department</label>
                                </div>
                                <div class="col-md-8">
                                    <input readonly type="text" value="{{ getDepartmentName($user->user_id ?? '-') }}" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Office Base</label>
                                </div>
                                <div class="col-md-8">
                                    <input readonly type="text" value="{{ getBranchFullAddress($user->user_id ?? '-') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-control">
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Year</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->year ?? '-' }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Claim ID</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->claim_id ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Month</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->month ?? '-' }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Claim Type</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->claim_type ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                </div>
                                <div class="col-md-3 hide-on-print">
                                    <div class="d-grid"> <!-- Use d-grid to create a grid layout -->
                                        @if ($claimData->status == 'amend')
                                            <a class="btn btn-warning btn-lg btn-block" data-toggle="paidc" title="{{$claimData->status_desc}}">Amend</a>
                                        @elseif ($claimData->status == 'recommend')
                                            <a class="btn btn-success btn-lg btn-block" data-toggle="paidc" title="{{$claimData->status_desc}}">Pending</a>
                                        @elseif ($claimData->status == 'bucket')
                                            <a class="btn btn-success btn-lg btn-block" data-toggle="paidc" title="{{$claimData->status_desc}}">Pending</a>
                                        @elseif ($claimData->status == 'approved')
                                            <a class="btn btn-info btn-lg btn-block" data-toggle="paidc" title="{{$claimData->status_desc}}">Approved</a>
                                        @elseif ($claimData->status == 'paid' )
                                            <a class="btn btn-secondary btn-lg btn-block" data-toggle="paidc" title="{{$claimData->status_desc}}">Paid</a>
                                        @elseif ($claimData->status == 'draft')
                                            <a class="btn btn-warning btn-lg btn-block" data-toggle="paidc" title="Draft">Draft</a>
                                        @elseif ($claimData->status == 'reject')
                                            <a class="btn btn-danger btn-lg btn-block" data-toggle="paidc" title="{{$claimData->status_desc}}">Rejected</a>
                                        @elseif ($claimData->status == 'active')
                                            <a class="btn btn-lime btn-lg btn-block " data-toggle="paidc" title="{{$claimData->status_desc}}">In Queue</a>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Applied Date</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="{{ isset($claimData->created_at) ? $claimData->created_at->format('Y-m-d') : '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <br>
                                </div>
                            </div>
                            <div class="row p-2">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 hide-on-print">
                        @if ($claimData->status =  'active')
                        <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                            
                                <a data-id="{{ $claimData->id }}" class="btn btn-primary" id="cancelButton" type="submit" style="color: white;width:100%">Cancel</a>
                            
                            </div>
                        </div>
                        @elseif ($claimData->status !=  'active')
                        
                        @endif
                        <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-primary" id="printButton" type="submit" style="width: 100%">Print</button>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-primary" onclick="window.history.back()" style="color: white;width:100%">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    @media print{
                        .hide-on-print {
                            display: none;
                        }
                        #header {
                            display: none;
                            height: 0;
                        }
                        .page-header{
                            display: none;
                        }
                        .navbar-nav {
                            display: none;
                        }
                        .break {
                            page-break-before: always;
                        }
                        #travelling th:last-child,
                        #travelling td:last-child {
                            display: none;
                        }
                        .dataTables_wrapper .dataTables_buttons {
                            display: none;
                        }
                        .dataTables_wrapper .dataTables_paginate,
                        .dataTables_wrapper .dataTables_filter,
                        .dataTables_wrapper .dataTables_length {
                            display: none;
                        }
                        #subsTableUpdate th:last-child,
                        #subsTableUpdate td:last-child {
                            display: none;
                        }
                    }
                </style>

                {{-- ROW 2 --}}
                <div class="row p-2 break">
                    <div class="col-md-12">
                        <div class="form-control">
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <h5>Department</h5>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Recommender</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $user->eclaimrecommender ? getEmployeeNameById($user->eclaimrecommender)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Approver</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $user->eclaimapprover ? getEmployeeNameById($user->eclaimapprover)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5>Admin</h5>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Recommender</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $getadmin->recommender ? getEmployeeNameById($getadmin->recommender)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Approver</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $getadmin->approver ? getEmployeeNameById($getadmin->approver)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5>Finance</h5>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Checker 1</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $getfinance->checker1 ? getEmployeeNameById($getfinance->checker1)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Checker 2</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $getfinance->checker2 ? getEmployeeNameById($getfinance->checker2)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Checker 3</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $getfinance->checker3 ? getEmployeeNameById($getfinance->checker3)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Recommender</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $getfinance->recommender ? getEmployeeNameById($getfinance->recommender)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Approver</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="{{ $getfinance->approver ? getEmployeeNameById($getfinance->approver)->employeeName : 'N/A' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ROW 3 --}}
                <div class="row p-2">
                    <div class="col-md-12">
                        <div class="form-control">
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Travelling</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($totalcarmotor ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Petrol/Fare</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($summaryTravelling[0]->total_petrol ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2 break">
                                        <div class="col-md-6">
                                            <label class="form-label">Toll</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($summaryTravelling[0]->total_toll ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Parking</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($summaryTravelling[0]->total_parking ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Subsistence Allowance</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($summarySubs[0]->total_subs ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Accommodation & Lodging</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($summarySubs[0]->total_acc ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Laundry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($summarySubs[0]->total_laundry ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Others</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($summaryOthers[0]->total_amount ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            <label class="form-label">Total</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($sum ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            <label class="form-label">Cash Advance (Less) <a href="#" id="viewCaBtn" class="hide-on-print">View</a></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($cashAdvance ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            <label class="form-label">Balance Due to/(From) Employee</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($balance ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ROW 4 --}}
                <div class="row p-2">
                    <div class="col-md-8">
                        @include('pages.eclaim.tableMCView')
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="form-control">
                            <h3>Claim History</h3>
                            <div class="card">
                                <div class="card-body">
                                    <li class="timeline-item mb-5 ">
                                        <div class="row p-2">
                                            <div class="col md-6">
                                                <span class="">
                                                    <i class="fas fa-rocket fa-1x text-primary "></i>
                                                </span>
                                            </div>
                                            <div class="row p-2">
                                                <div class="card p-3 bg-light">
                                                    <h5>Claim has been submitted</h5>
                                                    <br>
                                                    <p>Applied Date: 2023-02-01</p>
                                                    <p>Applied By: Hana</p>
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="card p-3 bg-green">
                                                    <h5>Claim has been recommended</h5>
                                                    <br>
                                                    <p>Dept. Processing</p>
                                                    <p>Recommended Date: 2023-02-15</p>
                                                    <p>Recommended By: Dept. Recommender</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>


            </div>

        </div>
    </div>
@endsection
