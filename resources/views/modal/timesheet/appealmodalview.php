<div class="modal fade" id="appealmodalview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"  >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Log Appeal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addappeal">
                    <div class="row p-2" >
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Log ID</label>

                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="log_idv" name="logid" readonly/>
                            <input type="hidden" id="applieddatev" name="applied_date">
                            <input type="hidden" class="form-control" id="idP" name="id" >
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2">
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Status</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="Statusv" name="status" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2">
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Year</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="yearappealv" name="year" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2">
                    <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Month</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="monthappealv" name="month" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2"> 
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Day</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" id="dayappealv" name="day" readonly/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row p-2"> 
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label">Log Appeal Approver</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text"  class="form-control" id="approverview" name="" readonly/>
                        </div>
                        
                    </div>
                    <div class="row p-2"> 
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Reason</label>
                        </div>
                        <div class="col-md-6">
                        <textarea class="form-control" id="reasonappealv"  name="reasonv" rows="3" readonly></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-5">
                            <label class="form-label">Supporting Document</label>
                        </div>
                        <div class="col-md-7">
                            
                            <span id="filedownloadappeal"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button href="javascript:;" id="addappealb" class="btn btn-primary">SUBMIT</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


