<div class="modal fade" id="appealmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"  >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log Appeal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addappeal">
                    <div class="row p-2" style="display:none;" >
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Log ID</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="" name="" readonly/>
                            <input type="hidden" id="applieddate" name="applied_date">
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2">
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Status</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="Status" name="status" value="Locked" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2">
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Year</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="yearappeal" name="year" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2">
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Month</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="monthappeal" name="month" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2"> 
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Day</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="dayappeal" name="day" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2"> 
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label">Log Appeal Approver</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text"  class="form-control" id="appealapproverc" name="" readonly/>
                        </div>
                       
                    </div>
                    <div class="row p-2"> 
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Reason</label>
                        </div>
                        <div class="col-md-6">
                        <textarea class="form-control" id="reasonappeal"  name="reason" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-5">
                            <label class="form-label">Supporting Document</label>
                        </div>
                        <div class="col-md-7">
                            <input type="file"  class="form-control" id="file" name="file" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button href="javascript:;" id="addappealb" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


