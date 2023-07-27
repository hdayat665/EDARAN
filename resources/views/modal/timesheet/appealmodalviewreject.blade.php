<div class="modal fade" id="viewreject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"  >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason of Appeal Rejection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rejectform">
                    <div class="row p-2"> 
                        <div class="col-md-4">
                            <label class="form-label ">Reason</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="reason_reject"  name="reasonreject" rows="3" maxlength = "225" ></textarea>
                            <input type="hidden" class="form-control" id="idtr" name="id" >
                            <input type="hidden" id="applieddater" name="applied_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button href="javascript:;" id="addreasonr" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


