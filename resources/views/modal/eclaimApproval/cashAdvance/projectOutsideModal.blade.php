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
            <form id="amendForm">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State reason</label><br>
                        <div class="col-sm-10">
                            <input type="hidden" id="rejectId">
                            <textarea class="form-control" name="remark" id="exampleFormControlTextarea1" rows="3" placeholder="input reason"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="amendButton" class="btn btn-primary">Save</button>
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
            <form id="rejectForm">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State Reason</label><br>
                        <div class="col-sm-10">
                            <input type="hidden" id="rejectId">
                            <textarea class="form-control" name="remark" id="exampleFormControlTextarea1" rows="3" placeholder="input reason"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="amendButton" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal view -->
<div class="modal fade" id="modal-view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Claim Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Applied Date</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control" name="customer_name" placeholder="">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Claim Category</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control" name="customer_name" placeholder="">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Amount</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control" name="customer_name" placeholder="">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Description</label>
                    </div>
                    <div class="col-md-6">
                        <textarea type="text" readonly class="form-control" name="customer_name" placeholder="" rows="3" maxlength="255"></textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Supporting Document</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control" name="customer_name" placeholder="">
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
