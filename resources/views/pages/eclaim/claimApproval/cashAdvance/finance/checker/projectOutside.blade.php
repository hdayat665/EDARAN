@extends('layouts.dashboardTenant')
@section('content')
    {{-- <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| Finance Checkers | View Cash Advance | Project ( Outstation )</small></h1>
        <div class="panel panel" id="fcheckerDetailJs">
            <div class="panel-body">
                <div class="row p-2">
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
                                    <input readonly type="text" value="{{ getCashAdvanceType($ca->type) ?? '-' }}" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Cash Advance ID:</label>

                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="CA-{{ $ca->id ?? '-' }}">
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
                                    <label class="form-label col-form-label">Mode of Transport :</label>

                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ getModeOfTransport($ca->mode_of_transport->tranport_type) ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Travel Date :</label>

                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ $ca->travel_date ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Project :</label>
                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ $ca->project->project_name ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Destination :</label>

                                </div>
                                <div class="col-md-9">
                                    <input readonly type="text" class="form-control" value="{{ getProjectLocation($ca->project_location_id)->location_name ?? $ca->destination ?? '-' }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Purpose :</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea type="text" readonly class="form-control" rows="3" maxlength="255">{{ $ca->purpose ?? '-' }}</textarea>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Checker :</label>
                                </div>
                                <div class="col-md-9">
                                    <table class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Checker</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><button type="button" class="btn btn-lime" id="checked" data-id="{{ $ca->id }}" data-stage="{{ $check }}">Check</button></td>
                                                <td>
                                                    <input type="checkbox" {{ $ca->f1 == 'check' ? 'checked' : '' }} class="form-check-input" disabled /> &nbsp;
                                                    <input type="checkbox" {{ $ca->f2 == 'check' ? 'checked' : '' }} class="form-check-input" disabled /> &nbsp;
                                                    <input type="checkbox" {{ $ca->f3 == 'check' ? 'checked' : '' }} class="form-check-input" disabled />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            {{-- <div class="row p-2">
                                <table id="claimtable" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap">Project</th>
                                            <th class="text-nowrap">Destination</th>
                                            <th class="text-nowrap">Purpose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1/1/2022</td>
                                            <td>Orbit</td>
                                            <td>Kuala Lumpur</td>
                                            <td>Meeting</td>
                                        </tr>
                                        <tr>
                                            <td>1/1/2022</td>
                                            <td>Payje</td>
                                            <td>Putrajaya</td>
                                            <td>Project Discussion</td>
                                        </tr>
                                        <tr>
                                            <td>1/1/2022</td>
                                            <td>Orbit</td>
                                            <td>Kuala Lumpur</td>
                                            <td>Meeting</td>
                                        </tr>
                                        <tr>
                                            <td>1/1/2022</td>
                                            <td>MyVM</td>
                                            <td>Selangor</td>
                                            <td>Meeting</td>
                                        </tr>
                                        <tr>
                                            <td>1/1/2022</td>
                                            <td>Payje</td>
                                            <td>Kuala Lumpur</td>
                                            <td>Meeting</td>
                                        </tr>
                                        <tr>
                                            <td>1/1/2022</td>
                                            <td>Orbit</td>
                                            <td>Kajang</td>
                                            <td>Meeting</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}

                        {{-- </div>
                        <br>
                        <div class="form-control">
                            <div class="row p-2">
                                <h4> Travel Expenses</h4>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Subsistence Allowance :</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->subs_allowance_total ?? 0 }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Accommodation :</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->accommadation_total ?? 0 }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Travel Expenses :</label>
                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Fuel Parking :</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->fuel ?? 0 }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Toll/Parking :</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->toll ?? 0 }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Entertainment :</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->entertainment ?? 0 }}">
                                </div>
                            </div>
                            <div class="row p-2">

                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Total :</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->total ?? 0 }}">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <label class="form-label col-form-label">Maximum Paid Out (75%) :</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->max_total ?? 0 }}">
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                                                                    <p class="text-muted mb-2 fw-bold">01/03/2022</p>
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

                {{-- </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="#" onclick="window.history.back();" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>  --}}
                {{-- <div class="col d-flex justify-content-end">
                    @if ( $ca->f_status != 'recommend')
                        @if ($ca->pv_number != '')
                            <!-- The pv_number is not null, so hide all buttons -->
                        @else
                            <!-- The pv_number is null, so show the buttons as before -->
                            @if ($ca->f1 == 'check' && $ca->f2 == 'check' && $ca->f3 == 'check')
                                <!-- All checkboxes are checked, so hide the Amend and Reject buttons -->
                            @else
                                <!-- At least one checkbox is not checked, so show the Amend and Reject buttons -->
                                <a class="btn btn-secondary" style="color: black" type="submit"> Cancel</a> &nbsp;
                                <a href="javascript:;" class="btn btn-warning" style="color: black" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a> &nbsp;
                                <a href="javascript:;" class="btn btn-danger" style="color: black" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a> &nbsp;
                            @endif

                            @if ($checkers == 'f1')
                                <a class="btn btn-lime" id="approveButton1" data-id="{{ $ca->id }}" style="color: black" type="submit"> Approve</a>
                            @endif
                            <!-- @if (($ca->f1 == 'check' && $ca->f2 == 'check') || ($ca->f1 == 'check' && $ca->f3 == 'check') || ($ca->f2 == 'check' && $ca->f3 == 'check'))
                                @if ($checkers == 'f1')
                                    <a class="btn btn-lime" id="approveButton1" data-id="{{ $ca->id }}" style="color: black" type="submit"> Approve</a>
                                @endif
                            @endif -->
                        @endif
                    @endif
                </div> --}}
            {{-- </div>
        </div>
    </div> --}}
    {{-- new --}}
    <div id="" class="app-content">
        <h1 class="page-header">eClaim <small>| Finance Checkers | View Cash Advance | Project ( Outstation )</small></h1>
        <div class="panel panel" id="fcheckerDetailJs">
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
                                             <input readonly type="text" class="form-control" value="{{ \Carbon\Carbon::parse($ca->created_at)->format('Y') }}">
                                         </div>
                                    </div>
                                    <div class="row p-2">
                                         <div class="col-md-6">
                                             <label class="form-label col-form-label">Month</label>
                                         </div>
                                         <div class="col-md-6">
                                             <input readonly type="text" class="form-control" value="{{ \Carbon\Carbon::parse($ca->created_at)->format('F') }}">
                                         </div>
                                     </div>
                                     <div class="row p-2">
                                         <div class="col-md-6">
                                             <label class="form-label col-form-label">Status</label>
                                         </div>
                                         <div class="col-md-6">
                                             <input readonly type="text" class="form-control" value="{{ $ca->status }}">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label col-form-label">Cash Advanced ID</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input readonly type="text" class="form-control" value="CA-{{ $ca->id ?? '-' }}">
                                            </div>
                                        </div>
                                        <div class="row p-2 break">
                                            <div class="col-md-6">
                                                <label class="form-label col-form-label">Applied Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input readonly type="text" class="form-control" value="{{ $ca->created_at->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-6">
                                                <label class="form-label col-form-label">Type of Cash Advance :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input readonly type="text" class="form-control" value="{{ getCashAdvanceType($ca->type) ?? '-' }}">
                                            </div>
                                        </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 hide-on-print"> 
                        @if ($ca->f_status != 'recommend')
                            @if ($ca->pv_number != '')
                                <!-- The pv_number is not null, so hide all buttons -->
                            @else
                                <!-- The pv_number is null, so show the buttons as before -->
                                @if ($ca->f1 == 'check' && $ca->f2 == 'check' && $ca->f3 == 'check')
                                    <!-- All checkboxes are checked, so hide the Amend and Reject buttons -->
                                @else
                                    <div class="row p-2">
                                        <!-- At least one checkbox is not checked, so show the Amend and Reject buttons -->
                                        @if ($checkers == 'f1')
                                            <a class="btn btn-lime" id="approveButton1" data-id="{{ $ca->id }}" style="color: black" type="submit"> Approve</a>&nbsp;
                                            <a href="javascript:;" class="btn btn-danger" style="color: black" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a> &nbsp;
                                        @endif
                                        <a href="/cashAdvanceFcheckerView" class="btn btn-light" style="color: black;" type="submit"> Back</a>
                                    </div>
                                    <div class="row p-2"> 
                                        <button type="button" class="btn btn-primary hide-on-print" style="color: black;" id="printButton2">Print</button>
                                    </div>
                                @endif
                            @endif
                        @else
                            <!-- f_status is 'recommend', so show the Back button in full div -->
                            <div class="row p-2">
                                <a href="/cashAdvanceFcheckerView" class="btn btn-light" style="color: black;" type="submit"> Back</a>
                            </div>
                        @endif
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
                <div class="row p-2 break">
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
                                        <input readonly type="text" class="form-control" value="{{ $ca->project->project_name ?? '-' }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label col-form-label">Date of Travel</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input readonly type="text" class="form-control" value="{{ $ca->travel_date ?? '-' }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label col-form-label">Destination</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input readonly type="text" class="form-control" value="{{ getProjectLocation($ca->project_location_id)->location_name ?? $ca->destination ?? '-' }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label col-form-label">Mode of Transport</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input readonly type="text" class="form-control" value="{{ getModeOfTransport($ca->mode_of_transport->tranport_type) ?? '-' }}">
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
                                        <textarea readonly class="form-control" name="" rows="5" maxlength="225">{{ $ca->purpose ?? '-' }}</textarea>
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
                            <div class="col-md-4">   
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Petrol/Fare</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->fuel ?? 0 }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Toll</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->toll ?? 0 }}">
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
                                <div class="row p-2 break">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Subsistence Allowance</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->subs_allowance_total ?? 0 }}">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Accommodation & Lodging</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->accommadation_total ?? 0 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label class="form-label col-form-label">Entertainment</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->entertainment ?? 0 }}">
                                    </div>
                                </div>
                               
                            </div>
                           <div class="col-md-4">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <label class="form-label col-form-label">Total Cash Advance</label>
                                </div>
                                <div class="col-md-6">
                                    <input readonly type="text" class="form-control" value="RM {{ $ca->mode_of_transport->total ?? 0 }}">
                                </div>
                            </div>
                            <form id="updateForm">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <label class="form-label col-form-label">Maximum Paid Out </label> 
                                    @if ($ca->f_status == 'recommend')
                                    
                                    @else
                                    <a href="#" id="editLink" class="hide-on-print">Edit</a>
                                    
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input readonly type="text" name="max_total" class="form-control" id="editableInput" value="{{ 'RM ' . ($ca->mode_of_transport->max_total ?? 0) }}">
                                </div>
                            </div>
                           </div>
                        </div>
                        <div class="row p-2 justify-content-end">
                            <button class="btn btn-primary col-md-2" id="cancelBtn" style="display: none" >Cancel</button>&nbsp;&nbsp;
                            <button class="btn btn-primary col-md-2" id="updateBtn" style="display: none" data-id="{{ $ca->id }}">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="form-control">
                        <div class="row p-2">
                            <div class="row p-2">
                                <h4>CLOSED CASH ADVANCE</h4>
                            </div>
                            <div class="row p-2">
                                <button class="btn btn-primary col-md-2" id="addPV" style="" >Add Claim PV Number</button>
                            </div>
                        </div>
                        <div class="row p-2 justify-content-end">
                            <button class="btn btn-primary col-md-2" id="cancelBtn" style="display: none" >Cancel</button>&nbsp;&nbsp;
                            <button class="btn btn-primary col-md-2" id="updateBtn" style="display: none" data-id="{{ $ca->id }}">Update</button>
                            </form>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <table id="" class="table table-striped table-bordered align-middle col-md-6">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th width="text-nowrap">Payment Date</th>
                                            <th width="text-nowrap">Claim PV Number</th>
                                            <th class="text-nowrap">Paid (RM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                                    
                                            @if ($PVNumber)
                                                @foreach ($PVNumber as $pv)
                                                    <tr class="odd gradeX">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $pv->date}}</td>
                                                        <td>{{ $pv->pv_number}}</td>
                                                        <td>{{ $pv->amount_paid}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <table id="" class="table table-striped table-bordered align-middle col-md-6">
                                    <thead>
                                        <tr>
                                            <th width="text-nowrap">Advance PV Number</th>
                                            <th width="text-nowrap">Cash Advance (RM)</th>
                                            <th class="text-nowrap">Total Paid (RM)</th>
                                            <th class="text-nowrap">Balance (RM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $ca->pv_number ?? '-' }}</td>
                                            <td>{{ $ca->amount ?? '0' }}</td>
                                            <td>{{ $ca->used_amount ?? '0' }}</td>
                                            <td>{{ $ca->final_amount ?? '0' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row p-2">
                    <div class="form-control">
                        <div class="row p-2">
                            <div class="row p-2">
                                <h4>SUPPROTING DOCUMENTS</h4>
                            </div>
                            <div class="row p-2">
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
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

        
        @include('modal.eclaimApproval.cashAdvance.projectOutsideFcheckerModal');
        @include('modal.eclaimApproval.cashAdvance.projectOutsideFcheckerModalPV');
    @endsection
