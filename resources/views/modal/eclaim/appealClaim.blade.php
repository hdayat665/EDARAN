<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appeal</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="addAppealForm">
                <div class="row p-2">
                    <div class="col-md-4">
                        <label class="form-label">Year</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" readonly name="year" value="" id="appeal-year">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-4">
                        <label class="form-label">Month</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" readonly name="month" value="" id="appeal-month">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-4">
                        <label class="form-label">State Reason</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" id="appeal-reason" name="reason" rows="3"></textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-4">
                        <label class="form-label">Supporting Document</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" class="form-control-file" name="uploadFile" id="appeal-document">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="saveAppeal">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div> 

