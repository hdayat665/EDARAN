<div class="modal fade" id="editSubsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addUpdateForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subsistence Allowance</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="subsistence allowance" class="col-sm-2 col-form-label">Subsistence
                            Allowance</label><br>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="area_name" name="area_name" placeholder=""
                                readonly>
                            <input type="hidden" name="" id="idAddSubs">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="unlimited subsistence" class="col-sm-2 col-form-label">Value</label><br>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="value" id="valuesubsistence"
                                placeholder="value">
                            <input type="checkbox" class="unlimited" value="unlimited"> unlimited
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addUpdateSubs" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
