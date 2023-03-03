{{-- modal add education --}}
<div class="modal fade " id="modalladded" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Education</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addEducation">
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">From Date</label>
                        <input type="text" class="form-control" id="datepicker-fromdate" placeholder="YYYY/MM/DD" name="fromDate" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">To Date</label>
                        <input type="text" class="form-control" id="datepicker-todate" placeholder="YYYY/MM/DD" name="toDate" value="">
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Institute Name</label>
                        <input type="text" class="form-control" id="instituteName" placeholder="INSTITUTE NAME" name="instituteName" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Highest Level Attained</label>
                        <input type="text" class="form-control" id="highestLevelAttained" placeholder="HIGHEST LEVEL ATTAINED" name="highestLevelAttained" value="">
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Result</label>
                        <input type="text" class="form-control" id="result" placeholder="RESULT" name="result" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Education Attachments</label>
                        <input type="file" class="form-control-file" id="" name="supportDoc">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
          <button class="btn btn-primary" id="saveEducation">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
{{-- end modal add education --}}