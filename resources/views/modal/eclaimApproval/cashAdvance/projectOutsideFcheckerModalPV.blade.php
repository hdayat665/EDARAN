<!-- Modal add PV Number -->
<div class="modal fade" id="modalAddPv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Claim PV Number</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addPVNumberF">
                <div class="modal-body">
                    <div class="row p-2">
                        <div class="col-md-4">
                        <label for="inputEmail3" class="col-form-label">Claim PV Number</label>
                        <input type="hidden" id="" value="{{ $ca->id ?? '-' }}" name="ca_id">
                        <input type="hidden" id="" value="{{ $ca->user_id?? '-' }}" name="user_id">
                        </div>
                        <div class="col">
                        <input type="text" value="" class="form-control" name="pv_number">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                        <label for="inputEmail3" class="col-form-label">Amount Paid</label>
                        </div>
                        <div class="col">
                        <input type="text" value="" class="form-control" name="amount_paid">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="savePVNumber" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

