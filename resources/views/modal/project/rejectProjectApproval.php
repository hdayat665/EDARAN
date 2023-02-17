<div class="modal fade" id="rejectProjectApproval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 780px!important;" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Project Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rejectForm">
                 <div class="row p-2">
                        <div class="col-md-12">
                            <h5 class="form-label">Requestor Information</h5>
                        </div>
                </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Employee ID:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" id="employeeIdR" />
                            <input type="hidden" readonly class="form-control" id="idReject" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Employee Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" readonly id="employeeNameR" class="form-control" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Working Email:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" id="workingEmailR" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Department:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" id="departmentR" />
                        </div>
                    </div>
                    <div class="row p-2">
                            <div class="col-md-12">
                                <h5 class="form-label">Project Information</h5>
                            </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Customer Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" id="customerNameR" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Project Code:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" id="projectCodeR" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Project Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" id="projectNameR" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-3">
                            <label class="form-label col-md-6">Reason*</label>
                        </div>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="5" style="text-transform: uppercase;" name="reason" placeholder="Reason"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="rejectButton" class="btn btn-danger">Reject</button>
            </div>
        </div>
    </div>
</div>
