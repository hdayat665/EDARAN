{{-- start modal others education --}}
<div class="modal fade " id="addmodalothers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Others Education</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addOthers">
           <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="datepicker-others" placeholder="DD/MM/YYYY" name="otherDate" value="">
                    </div>
                </div>
           </div>
           <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Professional Qualification Details</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="PROFESSIONAL QUALIFICATION DETAILS" name="otherPQDetails" value="">
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Attachments</label>
                    <div class="col-sm-8">
                      <input id="fileupload" type="file" name="file" multiple="multiple">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" id="saveOthers">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
{{-- end modal add others --}}