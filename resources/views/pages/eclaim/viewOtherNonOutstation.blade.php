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
                        <input readonly type="text" class="form-control">
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
</div>
