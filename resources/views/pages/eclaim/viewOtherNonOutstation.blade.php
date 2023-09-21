{{-- <div class="row p-2">
    <div class="col-md-7">
        <div class="form-control">
            <div class="row p-2">
                <h4>Cash Advance Information</h4>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Type of Cash Advance :</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{ getCashAdvanceType($cashClaim->type) }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Cash Advance ID:</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="CA-{{ $cashClaim->id }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Claim Type :</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="Cash Advance">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Date of Cash Required :</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->date_require_cash }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Purpose :</label>
                </div>
                <div class="col-md-9">
                    <textarea type="text" readonly class="form-control" rows="3" maxlength="255">{{ $cashClaim->purpose }}</textarea>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Amount :</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->amount }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Supporting Document :</label>
                </div>
                <div class="col-md-9">
                    <a href="/storage/{{ $cashClaim->file_upload }}">{{ $cashClaim->file_upload }}</a>
                    <!-- <input readonly type="text" class="form-control"> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-5">
        <div class="form-control">
            <div class="row p-2">
                <h4>Cash Advance History</h4>
                <div class="card-body">
                    <div class="container">
                        <ul class="timeline-with-icons">
                            <li class="timeline-item mb-5 ">
                                <div class="card bg-white">
                                    <div class="row p-2">
                                        <div class="col-md-2">
                                            <i class="fas fa-circle-plus text-primary fa-xl fa-fw"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <p class="fw-bold">Siti Sarah Submitted claim</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="text-muted mb-2 fw-bold">01/03/2022
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-muted">10:24 AM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<br> --}}
{{-- new --}}

{{-- <h1 class="page-header">E-Claim | Cash Advance</h1> --}}
<div class="panel panel" id="">
    <div class="panel-body">
        <div class="row p-2">
            <div class="col-md-4">
                <div class="form-control">
                    <div class="row p-2"> 
                        <div class="col-md-5">
                            <label class="form-label col-form-label">Employee Name</label>
                        </div>
                        <div class="col-md-7">
                            <input readonly type="text" class="form-control" value="{{ $employeeInfo->employeeName }}">
                        </div>
                    </div>

                    <div class="row p-2"> 
                        <div class="col-md-5">
                                <label class="form-label col-form-label">Designation</label>
                        </div>
                        <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $employeeInfo->designationName }}">
                        </div>
                        </div>

                        <div class="row p-2"> 
                        <div class="col-md-5">
                                <label class="form-label col-form-label">Department/Project</label>
                        </div>
                        <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $employeeInfo->departmentName }}">
                        </div>
                        </div>

                        <div class="row p-2"> 
                        <div class="col-md-5">
                                <label class="form-label col-form-label">Office Base</label>
                        </div>
                        <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $employeeInfo->address2 }}">
                        </div>
                        </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-control">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Year</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="{{ \Carbon\Carbon::parse($cashClaim->created_at)->format('Y') }}">
                                    </div>
                            </div>
                            <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Month</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="{{ \Carbon\Carbon::parse($cashClaim->created_at)->format('F') }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="{{ $cashClaim->status }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Cash Advanced ID</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="CA-{{ $cashClaim->id }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Applied Date</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="{{ $cashClaim->created_at->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Type of Cash Advance :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="{{ getCashAdvanceType($cashClaim->type) }}">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row p-2"> 
                    <button type="button" class="btn btn-primary hide-on-print" id="printButton3">Print</button>
                </div>
            </div>
            <style>
                @media print{
                    .hide-on-print {
                        display: none;
                    }
                    #backPrint{
                        display: none;
                    }
                    #header {
                        display: none;
                    }
                    .page-header{
                        display: none;
                    }
                    .navbar-nav {
                        display: none;
                    }
                    #content {
                        position: absolute;
                        top: 0;
                        padding-top: 1cm;
                    }
                    @page {
                        margin-bottom: 2cm;
                    }
                }
            </style>
        </div>
        <div class="row p-2">
            <div class="form-control">
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="row p-2">
                            <h4>Department</h4>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Approver</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $deptApprover->caapprover_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row p-2">
                            <h4>Finance</h4>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Checker</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $approvalInfo->checker1Name }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                    <label class="form-label col-form-label">Checker</label>
                            </div>
                            <div class="col-md-7">
                                    <input readonly type="text" class="form-control" value="{{ $approvalInfo->checker2Name }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                    <label class="form-label col-form-label">Checker</label>
                            </div>
                            <div class="col-md-7">
                                    <input readonly type="text" class="form-control" value="{{ $approvalInfo->checker3Name }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                    <label class="form-label col-form-label">Recommender</label>
                            </div>
                            <div class="col-md-7">
                                    <input readonly type="text" class="form-control" value="{{ $approvalInfo->recommenderName }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                    <label class="form-label col-form-label">Appprover</label>
                            </div>
                            <div class="col-md-7">
                                    <input readonly type="text" class="form-control" value="{{ $approvalInfo->approverName }}">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        {{-- <div class="row p-2">
            <div class="form-control">
                <div class="row p-2 ">
                    <div class="col-md-6">
                        <div class="row p-2">
                            <h4>Project</h4>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Project</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ getProjectById($cashClaim->project_id)->project_name  ?? '-'}}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Date of Travel</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $cashClaim->travel_date }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Destination</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ getProjectLocation($cashClaim->project_location_id)->location_name ?? '-' }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Mode of Transport</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row p-2">
                            <h4></h4>
                        </div>
                        <div class="row p-2">

                        </div>
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Purpose</label>
                            </div>
                            <div class="col-md-7">
                                <textarea readonly class="form-control" name="" rows="5" maxlength="225">{{ $cashClaim->purpose ?? '-' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row p-2">
            <div class="form-control">
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Date of Required Cash</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $cashClaim->date_require_cash }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row p-2">
                            <div class="col-md-3">
                                <label class="form-label col-form-label">Purpose</label>
                            </div>
                            <div class="col-md-7">
                                <input readonly type="text" class="form-control" value="{{ $cashClaim->purpose }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="form-control">
                <div class="row p-2">
                    <div class="row p-2">
                        <h4>CASH ADVANCE</h4>
                    </div>
                    {{-- <div class="col-md-4">   
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Petrol/Fare</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="MYR {{ $cashClaim->mode_of_transport->fuel }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Toll</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="MYR {{ $cashClaim->mode_of_transport->toll }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Parking</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Subsistence Allowance</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="MYR {{ $cashClaim->mode_of_transport->subs_allowance_total }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Accommodation & Lodging</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="MYR {{ $cashClaim->mode_of_transport->accommadation_total }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Phone Bill</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Entertainment</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="MYR {{ $cashClaim->mode_of_transport->entertainment }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Laundry</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Others</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="">
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-4">
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Total Cash Advance</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="MYR {{ $cashClaim->amount }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <label class="form-label col-form-label">Maximum Paid Out</label>
                            </div>
                            <div class="col-md-6">
                                <input readonly type="text" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row p-2 justify-content-end">
                    <button class="btn btn-primary col-md-2">Button</button>
                </div> -->
            </div>
        </div>
        <div class="row p-2">
            <div class="form-control hide-on-print">
                <div class="row p-2">
                    <div class="row p-2">
                        <h4>SUPPORTING DOCUMENTS</h4>
                    </div>
                    {{-- <div class="row p-2">
                        <div class="col-md-8">
                        <table id="appealtablehistory" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="text-nowrap">File Name</th>
                                    <th width="text-nowrap">Description</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">
                                <td width="1%">1</td>
                                <td>file name</td>
                                <td>Description</td>
                                <td><button class="btn btn-primary">View</button></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div> --}}
                    <div class="row p-2">
                        <a href="/storage/{{ $cashClaim->file_upload }}" target="_blank">{{ $cashClaim->file_upload }}</a>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</div>

