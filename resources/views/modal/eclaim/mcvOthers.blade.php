<div class="modal fade" id="othersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Others</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="updateOtherMtc">
                <div class="">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Claim Category</label>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" name="id" class="form-control" value="" id="claim_id_other">
                            <input type="hidden" name="general_id" class="form-control" value="" id="general_id_other">
                            <input readonly type="text"  class="form-control" value="" id="claim_category_update">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Amount</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="amount" class="form-control" value="" id="amount_other_update">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="claim_desc" id="desc_other_update" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">File Upload</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="form-control-file" name="file_upload[]" id="" multiple>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary">Reset</button> -->
                        {{-- <button type="submit" id="updateOtherMtcBtn" class="btn btn-primary">Update</button> --}}
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
