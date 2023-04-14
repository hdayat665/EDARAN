<div class="modal fade" id="appealmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 780px!important;" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appeal Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addappeal">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Reason Appeal</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="" name="reason"/>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Date want to Appeal</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="" name="appeal_date"/>
                            <input type="hidden"  class="form-control" id="" name="user_id"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                        <button href="javascript:;" id="addappealb" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


