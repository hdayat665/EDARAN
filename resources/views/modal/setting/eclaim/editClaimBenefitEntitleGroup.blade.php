<div class="modal fade" id="editClaimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addUpdateClaimCatForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Claims Benefit</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Area</label><br>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="claim_catagory" name="claim_catagory"
                                    placeholder="" readonly>
                                <input type="hidden" id="idAddClaim">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Value</label><br>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="claim_value" id="valueclaim"
                                    placeholder="value">
                                <input type="checkbox" class="unlimited1" value="unlimited">unlimited
                                <input type="hidden" name="claim_type" name="" id="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addUpdateClaimCatButton" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
