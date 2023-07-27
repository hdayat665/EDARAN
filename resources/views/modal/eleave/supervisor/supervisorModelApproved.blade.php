<div class="modal fade" id="approveModal-tab-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appproved by Supervisor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <div class="row row-cols-lg-auto g-3 mb-3">
                        <div class="col-12" style="width:50%">
                            <label>Applied Date</label><br>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="applieddate" value="">
                            <input type="hidden" readonly class="form-control-plaintext" id="iddata">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label>Type of Leave*</label><br>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="type1">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label>Number of Day(s) Applied</label><br>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="dayapplied">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label>Total Days Applied*</label><br>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="totaldayapplied">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label>Leave Date</label><br>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="leavedate">
                        </div>
                        <div class="col-12" style="width:50%">
                            <label>Reason*</label><br>
                            <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="reason1">
                        </div>
                        <div class="col-12" style="width:50%" id="menu01">
                            <label>Leave Session</label><br>
                            <div></div>
                            <div id="leavesession" style="font-weight: lighter;"></div>
                        </div>
                        <div class="col-12" style="width:50%">
                            <label>Supporting Document*</label><br>
                            <span id="fileDownloadPolicya" style="font-weight: lighter;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <div class="row p-2">
                                <label for="text">Recommended By:</label><br>
                                <div id="recommended_by" style="font-weight: lighter;"></div>
                            </div>
                            <div class="row p-2">
                            </div>
                            <div class="row p-2">
                                <label for="text">Status:</label><br>
                                <div id="status_1" style="font-weight: lighter;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="updateButton">Approve</button>
                        {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Approve</button> --}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
