<div class="modal fade" id="rejectModal-tab-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave Rejection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updatereject">
                    <div class="row row-cols-lg-auto g-3 mb-3">
                        <div class="col-12" style="width:50%">
                            <label class="form-label row-md-6">Employee Name:</label>
                            <input type="text" style="pointer-events: none;" class="form-control-plaintext" id="datafullname2" value="" readonly>
                            <input type="hidden" readonly class="form-control-plaintext" id="iddata2">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label class="form-label row-md-6">Submitted Date:</label>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="applieddate2" value="">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label class="form-label row-md-6">Type of Leave:</label>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="type2" value="">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label class="form-label row-md-6">No of Day(s) Applied:</label>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="dayapplied2" value="">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label class="form-label row-md-6">Start Date:</label>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="startdate2" value="">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label class="form-label row-md-6">End Date:</label>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="enddate2" value="">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label class="form-label row-md-6">Total Days Applied:</label>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="totaldayapplied2" value="">
                        </div>
                        <div class="col-12" style="width:50%" id="viewmenu01r">
                            <label class="form-label row-md-6">Leave Session</label><br>
                            <div></div>
                            <div id="leavesession2r" style="font-weight: lighter;"></div>
                        </div>
                        <div class="col-12"  style="width:50%">
                            <label class="form-label row-md-6">Supporting Document*</label><br>
                            <span id="fileDownloadPolicya2r" style="font-weight: lighter;"></span>
                        </div>
                        <div class="col-12" id= "expend" style="width:50%">
                            <label class="form-label row-md-6">Reason*</label><br>
                            <textarea rows="4" cols="50" readonly class="form-control-plaintext" id="reason1r"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label row-md-6">Reason:</label>
                        </div>

                        <div class="col-md-8">
                            <textarea class="form-control upperReason" rows="3" id="reasonreject" name="reasonreject" maxlength="225"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="updateButtonreject">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
