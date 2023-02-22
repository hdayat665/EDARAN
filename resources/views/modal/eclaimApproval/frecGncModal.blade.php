<div class="modal fade" id="modal-gnc-view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text" class="form-control" readonly value="{{ $gnc->year ?? '-' }}">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Month</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" readonly value="{{ $gnc->month ?? '-' }}">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Applied Date</label>
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" name="" class="form-control" value="{{ date('Y-m-d', strtotime($gnc->created_at)) ?? '-' }}" readonly />
                            {{-- <div class="input-group-text"><i class="fa fa-calendar"></i></div> --}}
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Claim Category</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" readonly value="{{ $gnc->claim_catagory_name ?? '-' }}" id="">
                    </div>
                </div>
                {{-- akan tarik data dari  labelling name dlam setting add claim --}}
                <!-- <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" value="test" class="form-control" name="labellingname" id="label" readonly>
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" disabled>
                            <option class="form-label" value="Please Select" selected>Please Select</option>
                        </select>
                    </div>
                </div> -->
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Amount (MYR)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" value="{{ $gnc->amount ?? '-' }}" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Description</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="3" readonly>{{ $gnc->gnc_desc ?? '-' }}</textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label">Supporting Document</label>
                    </div>
                    <div class="col-md-9">
                        <a href="/storage/{{ $gnc->file_upload }}" download>{{ $gnc->file_upload ?? '-' }}</a>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal amend -->
<div class="modal fade" id="modalamend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for Amendment</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="supervisorAmendForm">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State reason</label><br>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remark" placeholder="input reason"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="amendButton" data-id="{{ $general->id }}" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal reject -->
<div class="modal fade" id="modalreject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="supervisorRejectForm">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State Reason</label><br>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="remark" rows="3" placeholder="input reason"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="rejectButton" data-id="{{ $general->id }}" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
