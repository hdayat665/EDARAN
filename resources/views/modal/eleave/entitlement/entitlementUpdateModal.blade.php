<div class="modal fade" id="editleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Staff Entitlement</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="updateForm">
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Employee Name :</label>
                    <div class="col-md-7">
                    <input type="text" class="form-control" id="nameEmployer" name="nameEmployer" placeholder=""  readonly />
                    <input type="hidden" id="idleave" class="form-control" name="idleave" placeholder="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Current Entitlement Balance :</label>
                    <div class="col-md-7">
                    <input type="text" class="form-control" id="CurrentEntitlementBalance" name="CurrentEntitlementBalance" placeholder=""   />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Sick Leave Entitlement Balance :</label>
                    <div class="col-md-7">
                    <input type="text" class="form-control" id="SickLeaveEntitlementBalance" name="SickLeaveEntitlementBalance" placeholder=""/>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Current Forward Balance :</label>
                    <div class="col-md-7">
                    <input type="text" class="form-control" id="CurrentForwardBalance" name="CurrentForwardBalance" placeholder=""/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="updateButton">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
