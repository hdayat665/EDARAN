@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| Claim Approval | Supervisor | View Monthly Claim </small></h1>
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
                                    <input readonly type="text" class="form-control" value="Kamil">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Designation</label>
                                </div>
                                <div class="col-md-8">
                                    <input readonly type="text" class="form-control" value="Scrum Master">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Department</label>
                                </div>
                                <div class="col-md-8">
                                    <input readonly type="text" class="form-control" value="Service Delivery Department">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label">Office Base</label>
                                </div>
                                <div class="col-md-8">
                                    <input readonly type="text" value="Headquarters" class="form-control" height="30px"; overflow= "hidden";>
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
                                    <input readonly type="text" value="2023" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Claim ID</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="MTC {{ $general->id ?? '-' }}" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Month</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="January" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Claim Type</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="{{ $general->claim_type ?? '-' }}" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="{{ $general->status ?? '-' }}" class="form-control btn btn-primary">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Applied Date</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="" class="form-control">
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
                        <!-- <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                                <a class="btn btn-secondary" data-id="{{ $general->id }}" style="color: black; width:60%" type="submit"> Cancel</a>
                            </div>
                        </div> -->
                        @if ($general->supervisor == 'recommend')
                        @else
                        <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                                <a href="javascript:;" class="btn btn-warning" style="color: black; width:60%" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a>
                                <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%">Print</button> --}} -->
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                                <a href="javascript:;" class="btn btn-danger" style="color: black; width:60%" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a>
                                <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%"> Back</button> --}} -->
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                                <a class="btn btn-lime" id="approveButton" data-id="{{ $general->id }}" style="color: black" type="submit">Recommend</a>
                                <!-- {{-- <button class="btn btn-primary" id="" type="submit" style="width: 100%"> Back</button> --}} -->
                            </div>
                        </div>
                        @endif
                        <div class="row p-2">
                            <div class="col d-flex justify-content-end">
                                <a class="btn btn-secondary" data-id="{{ $general->id }}" style="color: black; width:60%" type="submit"> Print</a>
                                <!-- {{-- <button class="btn btn-primary" id="" type="submit">Cancel</button> --}} -->
                            </div>
                        </div>
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
                                            <input readonly type="text" value="Dept. Recommender" name="claim-id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Approver</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="Dept. Approver" name="claim_type" class="form-control">
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
                                            <input readonly type="text" value="Admin Recommender" name="claim-id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Approver</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="Admin Approver" name="claim_type" class="form-control">
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
                                            <input readonly type="text" value="Finance Checker 1" name="claim-id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Checker 2</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text"  value="Finance Checker 2" name="claim-id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Checker 3</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="Finance Checker 3" name="claim-id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Recommender</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="Finance Recommender" name="claim-id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Approver</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input readonly type="text" value="Finance Approver" name="claim-id" class="form-control">
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
                                            <input type="text" class="form-control" readonly value='RM 0.00'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Petrol/Fare</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM 0.00' id="petrol">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Toll</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM 0.00' id="toll">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Parking</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM 0.00' id="parking">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Subsistence Allowance</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM 0.00'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Accommodation & Lodging</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM 0.00'>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Laundry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM 0.00'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Bill</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM '>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Entertainment</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM '>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Others</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly value='RM '>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            <label class="form-label">Total</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" readonly value="MYR {{ $general->total_amount ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            <label class="form-label">Cash Advance (Less)<a href="#" class="btn btn-link">View</a></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input readonly type="text" value="RM0.00" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-8">
                                            <label class="form-label">Balance Due to/(From) Employee</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input readonly type="text" value="RM0.00" name="" class="form-control">
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
                                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link ">Subsistence</a>
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


                