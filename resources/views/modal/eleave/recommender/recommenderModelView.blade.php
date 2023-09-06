<div class="modal fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Leave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-lg-auto g-3 mb-3">
                    <div class="col-12" style="width:50%">
                        <label class="form-label row-md-6">Applied Date</label><br>
                        <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="viewapplieddate" value="">
                        <input type="hidden" readonly class="form-control-plaintext" id="viewiddata">
                    </div>
                    <div class="col-12" style="width:50%">
                        <label class="form-label row-md-6" >Type of Leave*</label><br>
                        <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="viewtype1">
                    </div>
                    <div class="col-12" style="width:50%">
                        <label class="form-label row-md-6" >Number of Day(s) Applied</label><br>
                        <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="viewdayapplied">
                    </div>
                    <div class="col-12" style="width:50%">
                        <label class="form-label row-md-6">Total Days Applied*</label><br>
                        <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="viewtotaldayapplied">
                    </div>
                    <div class="col-12" style="width:50%">
                        <label class="form-label row-md-6">Leave Date</label><br>
                        <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="viewleavedate">
                    </div>
                    <div class="col-12" style="width:50%">
                        <label class="form-label row-md-6">Reason*</label><br>
                        <textarea rows="4" cols="50" readonly class="form-control-plaintext" id="viewreason1"></textarea>
                    </div>
                    <div class="col-12" style="width:50%" id="viewmenu01">
                        <label class="form-label row-md-6">Leave Session</label><br>
                        <div></div>
                        <div id="leavesession" style="font-weight: lighter;"></div>
                    </div>
                    <div class="col-12" style="width:50%">
                        <label class="form-label row-md-6">Supporting Document*</label><br>
                        <span id="viewfileDownloadPolicya" style="font-weight: lighter;"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <div class="row p-2">
                            <label class="form-label row-md-6" for="text">Recommended By:</label><br>
                            <div id="viewrecommended_by" style="font-weight: lighter;"></div>
                        </div>
                        <div class="row p-2">
                            <label class="form-label row-md-6" for="text">Status:</label><br>
                            <div id="viewstatus_1" style="font-weight: lighter;"></div>
                        </div>
                        <div class="row p-2" id="viewmenu02">
                            <label class="form-label row-md-6" for="text">Reason:</label><br>
                            <div id="viewreasonsv" style="font-weight: lighter; word-wrap: break-word;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
