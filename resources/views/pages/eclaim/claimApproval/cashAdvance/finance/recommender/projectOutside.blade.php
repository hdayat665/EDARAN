@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| Recommender | View Cash Advance | Project ( Outstation )</small></h1>
        <div class="panel panel" id="frecDetailCaJs">
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
                                    <input readonly type="text" class="form-control" value="{{ getModeOfTransport($ca->mode_of_transport->tranport_type) }}">
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
                                    </tbody>
                                </table>
                            </div> --}}

                        </div>
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

                </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/cashAdvanceApproverView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col d-flex justify-content-end">
                    @if ($ca->f_recommender == 'recommend')
                    @else
                    <a class="btn btn-secondary" style="color: black" type="submit"> Cancel</a> &nbsp;
                    <a href="javascript:;" class="btn btn-warning" style="color: black" data-bs-toggle="modal" data-bs-target="#modalamend">Amend</a> &nbsp;
                    <a href="javascript:;" class="btn btn-danger" style="color: black" data-bs-toggle="modal" data-bs-target="#modalreject"> Reject</a> &nbsp;
                    <a class="btn btn-lime" id="approveButton" data-id="{{ $ca->id }}" style="color: black" type="submit"> Approve</a>
                    @endif 
                </div>
            </div>
        </div>
    </div>
    @include('modal.eclaimApproval.cashAdvance.projectOutsideModal')
@endsection
