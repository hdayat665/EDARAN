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
                    <input readonly type="text" class="form-control" value="{{ getCashAdvanceType($cashClaim->type) }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Cash Advance ID:</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->id }}">
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
                    <input readonly type="text" class="form-control" value="{{ getModeOfTransport($cashClaim->mode_of_transport->tranport_type) }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Travel Date :</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->travel_date }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Project :</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{ getProjectById($cashClaim->project_id)->project_name }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Destination :</label>
                </div>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{ getProjectLocation($cashClaim->project_location_id)->location_name ?? '-' }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Purpose :</label>
                </div>
                <div class="col-md-9">
                    <textarea type="text" readonly class="form-control" rows="3" maxlength="255">{{ $cashClaim->purpose ?? '-' }}</textarea>
                </div>
            </div>
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
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->mode_of_transport->subs_allowance_total }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Accommodation :</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->mode_of_transport->subs_allowance_total }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Travel Expenses :</label>
                </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Fuel Parking :</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->mode_of_transport->fuel }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3"> </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Toll/Parking :</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->mode_of_transport->toll }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3"> </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Entertainment :</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->mode_of_transport->entertainment }}">
                </div>
            </div>
            <div class="row p-2"> </div>
            <div class="row p-2">
                <div class="col-md-3"> </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Total :</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->mode_of_transport->total }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3"> </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Maximum Paid Out (75%) :</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" value="{{ $cashClaim->mode_of_transport->max_total }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
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
    </div>
</div>
