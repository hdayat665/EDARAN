
    <div class="modal fade" id="updateleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Leave Type</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm">
                        <div class="mb-3">
                        <label for="leavetype" class="form-label">Leave Type Code*</label>
                        <input type="text" class="form-control" id="leavetypescode"  name="leavetypescode" placeholder="LEAVE CODE" style="text-transform:uppercase">
                        <input type="hidden" id="idtypes" class="form-control" name="idtypes" placeholder="">
                        </div>
                        <div class="mb-3">
                        <label for="Leavetype" class="form-label">Leave Type*</label>
                        <input type="text" class="form-control" id="leavetypes"  name="leavetypes" placeholder="LEAVE TYPE" style="text-transform:uppercase">
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration*</label>
                            <input type="text" class="form-control" id="durationU" name="duration" value = "0">
                        </div>

                        <div class="mb-3">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input class="form-check-input" type="checkbox" value="" id="ucheckallowrequest" checked>
                                </div>

                                    <div class="col-auto">
                                        <p class="col-form-label">To be Applied</p>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="uallowrequest" name="day" value="" class="form-control"  disabled>
                                    </div>
                                    <div class="col-auto">
                                        <p class="col-form-label">days in advanced</p>
                                    </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="updateButton">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
