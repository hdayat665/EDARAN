{{-- start modal edit education --}}
<div class="modal fade " id="editmodaledd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Education</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="educationModalEdit">
                <input type="hidden" id="idEdu" name="id" >
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">From Date</label>
                        <input type="date" class="form-control" id="educationFromDate1" name="fromDate" placeholder="YYYY/MM/DD" value="{{ date_format(date_create($education->fromDate ?? ''), 'Y-m-d') }}" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">To Date</label>
                        <input type="date" class="form-control" id="educationToDate1" name="toDate" placeholder="YYYY/MM/DD" value="{{ date_format(date_create($education->toDate ?? ''), 'Y-m-d') }}" >
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Institute Name</label>
                        <input type="text" class="form-control" id="educationinstituteName1" name="instituteName" value="" placeholder="INSTITUTE NAME">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Highest Level Attained</label>
                        <input type="text" class="form-control" id="educationhighestLevelAttained1" name="highestLevelAttained" value="" placeholder="HIGHEST LEVEL ATTAINED">
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Result</label>
                        <input type="text" class="form-control" id="educationResult1" name="result" value="" placeholder="RESULT">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Education Attachments</label>
                        <input id="fileupload" type="file" name="file" multiple="multiple" >
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="editEducation">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
{{-- end modal edit education --}}