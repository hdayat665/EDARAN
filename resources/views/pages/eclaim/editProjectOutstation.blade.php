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
                    <input type="text" class="form-control" readonly value="{{ getCashAdvanceType($cashClaim->type) }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Cash Advance ID:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="cash[id]" value="{{ $cashClaim->id }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Claim Type :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="Cash Advance">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Mode of Transport :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" readonly value="{{ getModeOfTransport($cashClaim->mode_of_transport->tranport_type) }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Travel Date :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="datefilter3" class="form-control" name="cash[travel_date]" value="{{ $cashClaim->travel_date }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Project :</label>
                </div>
                <div class="col-md-9">
                    <select class="form-select" id="project2" name="cash[project_id]">
                        <?php $projects = project(); ?>
                        <option class="form-label" value="">Please Select</option>
                        @foreach ($projects as $project)
                            <option class="form-label" {{ $cashClaim->project_id == $project->id ? 'selected' : '' }} value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Destination :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="cash[destination]" value="{{ $cashClaim->destination ?? '' }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label col-form-label">Purpose :</label>
                </div>
                <div class="col-md-9">
                    <textarea type="text" class="form-control" name="cash[purpose]" rows="3" maxlength="255">{{ $cashClaim->purpose ?? '-' }}</textarea>
                    <input type="hidden" class="form-control" name="mot[id]" value="{{ $cashClaim->mode_of_transport->id }}">
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
                    <input type="text" class="form-control" name="mot[subs_allowance_total]" value="{{ $cashClaim->mode_of_transport->subs_allowance_total }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Accommodation :</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="mot[accommadation_total]" value="{{ $cashClaim->mode_of_transport->accomodation_total }}">
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
                    <input type="text" class="form-control" name="mot[fuel]" value="{{ $cashClaim->mode_of_transport->fuel }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3"> </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Toll/Parking :</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="mot[toll]" value="{{ $cashClaim->mode_of_transport->toll }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3"> </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Entertainment :</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="mot[entertainment]" value="{{ $cashClaim->mode_of_transport->entertainment }}">
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
                    <input type="text" class="form-control" name="mot[total]" value="{{ $cashClaim->mode_of_transport->total }}">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-3"> </div>
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                    <label class="form-label col-form-label">Maximum Paid Out (75%) :</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="mot[max_total]" value="{{ $cashClaim->mode_of_transport->max_total }}">
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
