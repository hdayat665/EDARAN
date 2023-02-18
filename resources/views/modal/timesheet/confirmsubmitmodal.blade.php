<!-- Modal -->
<div class="modal fade" id="confirmsubmit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row p-2">
                <div class="col-sm-3">
                    <label for="inputPassword6" class="col-form-label">Name</label>
                </div>
                <div class="col-sm-5">
                    {{-- <input type="text" id="" value="{{$profile->fullName ?? ''}}" class="form-control" aria-describedby="passwordHelpInline" readonly> --}}
                    <input type="text" id="fullname" value="" class="form-control" aria-describedby="passwordHelpInline" readonly>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-3">
                    <label for="inputPassword6" class="col-form-label">Year</label>
                </div>
                <div class="col-sm-5">
                    <input type="text" id="year" class="form-control" aria-describedby="passwordHelpInline" readonly>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-3">
                    <label for="inputPassword6" class="col-form-label">Month</label>
                </div>
                <div class="col-sm-5">
                    <input type="text" id="month" class="form-control" aria-describedby="passwordHelpInline" readonly>
                    <input type="hidden"  class="form-control" id="idtv" name="id" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="submitTimesheetApproval" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>