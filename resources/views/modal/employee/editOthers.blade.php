{{-- start modal edit others education --}}
<div class="modal fade " id="editmodalothers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Others Education</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="othersModalEdit">
              <input type="hidden" id="idOthers" name="id" >

           <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="othersDate1" placeholder="YYYY/MM/DD" name="otherDate" value="{{ date_format(date_create($other->otherDate ?? ''), 'Y-m-d') }}" >
                    </div>
                </div>
           </div>
           <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Professional Qualification Details</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="PROFESSIONAL QUALIFICATION DETAILS" id="othersPQDetails1" name="otherPQDetails">
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Attachments</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control-file" id="file" name="file">
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