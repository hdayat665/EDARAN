<!-- Modal -->
<div class="modal fade" id="confirmsubmit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Timesheet Submission</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row p-2">
                <div class="col-sm-3">
                    <label for="inputPassword6" class="col-form-label">Name</label>
                </div>
                <div class="col-sm-9">
                     <input type="text" id="" value="{{$employee->employeeName ?? ''}}" class="form-control" aria-describedby="passwordHelpInline" readonly> 
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-3">
                    <label for="inputPassword6" class="col-form-label">Year</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="yearsub" class="form-control" aria-describedby="passwordHelpInline" readonly>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-3">
                    <label for="inputPassword6" class="col-form-label">Month</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="monthsub" class="form-control" aria-describedby="passwordHelpInline" readonly>
                    <input type="hidden"  class="form-control" id="idtv" name="id" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
          <button type="button" id="submitTimesheetApproval" class="btn btn-primary">SUBMIT</button>
        </div>
      </div>
    </div>
  </div>