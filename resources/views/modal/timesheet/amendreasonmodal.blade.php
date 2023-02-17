<div class="modal fade" id="reasonmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 780px!important;" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason  Amendment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reasonamendform">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">employee name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" id="employeename" name="employee_name1" readonly />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Reason</label>
                        </div>
                        <div class="col-md-8">
                            {{-- <input type="text"  class="form-control" id="reason" name="amendreason" /> --}}
                            <textarea class="form-control" id="reason" name="amendreason" rows="3"></textarea>
                            {{-- <input type="hidden" id="idV" name="id" class="form-control" aria-describedby="lastname"> --}}
                        </div>
                    </div>
                    <div class="row p-2">
                        {{-- <div class="col-md-4">
                            <label class="form-label col-md-6">id</label>
                        </div> --}}
                        <div class="col-md-8">
                            <input type="hidden"  class="form-control" id="idtv" name="id" />
                            {{-- <input type="hidden" id="reason" name="id" class="form-control" aria-describedby="lastname"> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addamendreasonb">Submit</button>
                        {{-- <button href="javascript:;" id="addamendreasonb" class="btn btn-primary">Save</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


