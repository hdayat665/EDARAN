{{-- start modal edit others education --}}
<div class="modal fade " id="editmodalothers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Others Education</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="othersModalEdit">
           <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="datepicker-othersu" placeholder="YYYY/MM/DD" name="othersDate1" >
                    </div>
                </div>
           </div>
           <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Professional Qualification Details</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="PROFESSIONAL QUALIFICATION DETAILS" name="othersPQDetails1">
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Attachments</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control-file" id="" name="othersDoc1">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="editOthers">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
{{-- end modal edit others --}}