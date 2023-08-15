@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| Claim Approval | Monthly Claim </small></h1>
        <div class="panel panel">
            <div class="panel-body" id="hodClaimDetailJs">

                {{-- ROW 1 --}}
                <div class="row p-2">
                    <div class="col-md-5">
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
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->year ?? '-' }}" style="text-align:center">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Claim ID</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->claim_id ?? '-' }}" style="text-align:center">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Month</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->month ?? '-' }}" style="text-align:center">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Claim Type</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text"  class="form-control" value="{{ $claimData->claim_type ?? '-' }}" style="text-align:center">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                </div>
                                <div class="col-md-3">
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
                                            <a class="btn btn-lime btn-lg btn-block" data-toggle="paidc" title="{{$claimData->status_desc}}">In Queue</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Applied Date</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="{{ isset($claimData->created_at) ? $claimData->created_at->format('Y-m-d') : '-' }}" style="text-align:center">
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
                    <div class="col-md-2">
                            @php
                                $allChecked = $travelClaims->every(function ($item) {
                                    return $item->sv === 'checked';
                                });
                            @endphp

                            @if ($allChecked)
                                @if ($general->supervisor == 'recommend')
                                
                                @else
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                        <a class="btn btn-lime" id="approveButton" data-id="{{ $general->id }}" style="color: black;width:100%" type="submit">Recommend</a>
                                        <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%"> Back</button> --}} -->
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href="javascript:;" class="btn btn-warning" style="color: black;width:100%" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a>
                                        <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%">Print</button> --}} -->
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href="javascript:;" class="btn btn-danger" style="color: black;width:100%" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a>
                                        <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%"> Back</button> --}} -->
                                    </div>
                                </div>
                                @endif
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                        <a class="btn btn-primary" data-id="{{ $general->id }}" style="color: black;width:100%" type="submit"> Print</a>
                                        <!-- {{-- <button class="btn btn-primary" id="" type="submit">Cancel</button> --}} -->
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                    <a href="/claimApprovalView/2" class="btn btn-light" style="color: black;width:100%" type="submit"><i class="fa fa-arrow-left"></i> Back</a>                                    </div>
                                    </div>
                                </div>
                                @else
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href="javascript:;" class="btn btn-warning" style="color: black;width:100%" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a>
                                        <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%">Print</button> --}} -->
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href="javascript:;" class="btn btn-danger" style="color: black;width:100%" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a>
                                        <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%"> Back</button> --}} -->
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                        <a class="btn btn-primary" data-id="{{ $general->id }}" style="color: black;width:100%" type="submit"> Print</a>
                                        <!-- {{-- <button class="btn btn-primary" id="" type="submit">Cancel</button> --}} -->
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col d-flex justify-content-end">
                                    <a href="/claimApprovalView/2" class="btn btn-light" style="color: black;width:100%" type="submit"><i class="fa fa-arrow-left"></i> Back</a>                                    </div>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>

                {{-- ROW 2 --}}
                <div class="row p-2">
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
                                    <div class="row p-2">
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
                                            <label class="form-label">Cash Advance (Less) <a href="#" id="viewCaBtn">View</a></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" readonly value='RM {{ number_format($lessCash[0]->totalCash ?? 0, 2) }}'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            <label class="form-label">Balance Due to/(From) Employee</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" readonly value="MYR {{ $general->total_amount ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ROW 4 --}}
                <div class="row p-2">
                    <div class="col-md-12">
                        <div class="form-control">
                            <div class="row p-2">
                                    <div class="col d-flex justify-content-start">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">Travelling</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link ">Subsistence Allowance & Accomodation</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link ">Others</a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                            @include('pages.eclaim.tableSVRec')
                        </div>
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
                {{-- <div class="row p-2">
                    <div class="col align-self-start">
                        <a href="/claimApprovalView/2" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                        <div class="col d-flex justify-content-end">
                        @if ($general->supervisor == 'recommend')
                        @else
                            <a class="btn btn-secondary" data-id="{{ $general->id }}" style="color: black" type="submit"> Cancel</a> &nbsp;
                            <a href="javascript:;" class="btn btn-warning" style="color: black" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a> &nbsp;
                            <a href="javascript:;" class="btn btn-danger" style="color: black" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a> &nbsp;
                            <a class="btn btn-lime" id="approveButton" data-id="{{ $general->id }}" style="color: black" type="submit"> Approve</a>
                        @endif
                        </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- @include('modal.eclaimApproval.hodDetailMtcModal') -->
@endsection


                