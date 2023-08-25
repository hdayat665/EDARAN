<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exit Employment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form id="submitTerminateForm">
                        <div class="mb-5">
                            <label for="recipient-name" class="col-form-label">Employee ID</label>
                            <input type="text" name="employeeId" id="employeeId" class="form-control" readonly>
                            <input type="hidden" name="user_id"  id="userId" >
                            <label for="recipient-name" class="col-form-label">Employee Name</label>
                            <input type="text" name="employeeName" id="employeeName" class="form-control" readonly>
                            <label for="recipient-name" class="col-form-label">Employee Email</label>
                            <input type="text" name="employeeEmail" id="employeeEmail" class="form-control" readonly>
                            <label for="recipient-name" class="col-form-label">Report To</label>
                            <input type="text" name="report_to" id="reportTo" class="form-control" readonly>

                        </div>
                        <div class="mb-5">
                            <label for="recipient-name" class="col-form-label">Exit Date*</label>
                            <input type="text" name="effectiveFrom" class="form-control" id="exitdate" placeholder="YYYY/MM/DD" />
                            <label for="recipient-name" class="col-form-label">Exit Type*</label>
                            <select class="form-select" name="employmentDetail">
                                <option value="" label="PLEASE CHOOSE" selected="selected">PLEASE CHOOSE </option>
                                <option value="DECEASED" label="DECEASED"></option>
                                <option value="DISMISSED" label="DISMISSED"></option>
                                <option value="RETRENCHED" label="RETRENCHED"></option>
                                <option value="END OF CONTRACT" label="END OF CONTRACT"></option>
                                <option value="RESIGNED" label="RESIGNED"></option>
                                <option value="RETIREMENT" label="RETIREMENT"></option>
                                <option value="OTHERS" label="OTHERS"></option>
                            </select>
                            <label for="recipient-name" class="col-form-label">Remarks</label>
                            <textarea class="form-control" name="remarks" placeholder="Remarks" rows="3"></textarea>

                            <label for="recipient-name" class="col-form-label">Attachments*</label><br>
                            <input type="file" class="form-control" name="files[]" multiple>

                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button id="submitTerminate" class="btn btn-primary">Submit</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
    </div>
    <!-- END row -->
</div>

