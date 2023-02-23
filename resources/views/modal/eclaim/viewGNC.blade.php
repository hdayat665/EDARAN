<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Claim Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Year</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{ $GNC->year }}" readonly>

                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Month</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{ $GNC->month }}" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Applied Date</label>
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" name="" id="created_at" value="{{ date('Y-m-d', strtotime($GNC->created_at)) }}" class="form-control" value="" readonly />
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Claim Category</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{ $detail->claim_catagory }}" readonly>
                    </div>
                </div>
                {{-- akan tarik data dari  labelling name dlam setting add claim --}}
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label" id="label"></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="contents" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Amount (MYR)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="amount" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Description</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="3" id="desc" readonly></textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Supporting Document</label>
                    </div>
                    <div class="col-md-9">
                        <div id="file_upload"></div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
