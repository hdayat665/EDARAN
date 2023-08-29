<div class="modal fade" id="rejectModal-tab-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave Approval</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updatereject">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label row-md-6">Employee Name:</label>
                                <input type="text" style="pointer-events: none;" class="form-control-plaintext" id="datafullname2" value="" readonly>
                                <input type="hidden" readonly class="form-control-plaintext" id="iddata2" >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label row-md-6">Submitted Date:</label>
                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="applieddate2" value="">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label row-md-6">Type of Leave:</label>
                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="type2" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label row-md-6">No of Day(s) Applied:</label>
                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="dayapplied2" value="">
                            </div>

                        </div>
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <label class="form-label row-md-6">Duration:</label>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label row-md-6"> </label>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label row-md-6">Start Date:</label>
                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="startdate2" value="">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label row-md-6">End Date:</label>
                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="enddate2" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label row-md-6">Total Days Applied:</label>
                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="totaldayapplied2" value="">
                            </div>
                        </div>
                         <div class="row">
                        <div class="col-md-4">
                            <label class="form-label row-md-6">Reason:</label>
                            </div>

                            <div class="col-md-8">
                                <textarea class="form-control" id="reasonreject" name="reasonreject" maxlength="225"></textarea>
                            </div>
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="updateButtonreject">Reject</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
