
<div class="modal fade" id="addleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Leave Type</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="leavetype" class="form-label">Leave Type Code*</label>
                        <input type="text" class="form-control" name="leave_types_code" id="leave_types_code" placeholder="LEAVE CODE" style="text-transform:uppercase">
                    </div>
                    <div class="mb-3">
                        <label for="Leavetype" class="form-label">Leave Type*</label>
                        <input type="text" class="form-control" id="leave_types" name="leave_types" placeholder="LEAVE TYPE" style="text-transform:uppercase">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration*</label>
                        <input type="text" class="form-control" id="duration" name="duration" value = "0">
                    </div>
                    <div class="mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input class="form-check-input" type="checkbox" value="" id="checkallowrequest" checked>
                            </div>

                                <div class="col-auto">
                                    <p class="col-form-label">To be Applied</p>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" id="allowrequest" value="0" name="day" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <p class="col-form-label">days in advanced</p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="saveButton">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
