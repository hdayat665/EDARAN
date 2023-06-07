{{-- modal add holiday --}}
<div class="modal fade" id="addleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Holiday</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="row p-2">
                        <div class="col md-6">
                            <div class="mb-3">
                                <label for="holidaytitle" class="form-label">Holiday Title* </label>
                                <input type="text" class="form-control" name="holiday_title" id="holiday_title" placeholder="HOLIDAY TITLE" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="mb-3">
                                <div class="row ">
                                    <span class="form-label">Set as Annual Holiday</span>
                                </div>
                                <div></div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" value="1" type="radio" name="annual_date" id="radioyes">
                                    <label class="form-check-label" for="radioyes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" value="2" type="radio" name="annual_date" id="radiono" checked>
                                    <label class="form-check-label" for="radiono">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Start Date* </label>
                                <input type="text" class="form-control" name="start_date" placeholder="YYYY/MM/DD" id="datepickerstart">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">End Date* </label>
                                <input type="text" class="form-control" name="end_date" placeholder="YYYY/MM/DD" id="datepickerend" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="saveButton">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal updateleave type --}}
<div class="modal fade" id="updateleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Holiday</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <div class="row p-2">
                        <div class="col md-6">
                            <div class="mb-3">
                                <label for="holiday_title" class="form-label">Holiday Title* </label>
                                <input type="text" class="form-control" id="holidaytitle" name="holidaytitle" placeholder="HOLIDAY TITLE" style="text-transform:uppercase">
                                <input type="hidden" id="idholiday" class="form-control" name="idholiday" placeholder="">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="mb-3">
                                <div class="row ">
                                    <span class="form-label">Set as Annual Holiday</span>
                                </div>
                                <div></div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="1" name="flexRadioDefault" id="uradioyes" value="1">
                                    <label class="form-check-label" for="uradioyes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="2" name="flexRadioDefault" id="uradiono" value="2">
                                    <label class="form-check-label" for="uradiono">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Start Date* </label>
                                <input type="text" class="form-control" name="start_date" placeholder="YYYY/MM/DD" id="udatepickerstart">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">End Date* </label>
                                <input type="text" class="form-control" name="enddate" placeholder="YYYY/MM/DD" id="udatepickerend" />
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="updateButton">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal bulk --}}
<div class="modal fade" id="uploadbulk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bulk Upload Holiday</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="uploadBulkForm">
                <div class="modal-body">
                    <div class="row p-2">
                        <a href="" download="Holiday.xlsx">Holiday.xlx</a>
                    </div>
                    <div class="row p-2">
                        <div class="file-upload-wrapper">
                            <input type="file" id="input-file-now" name="fileHolidayExcel" class="file-upload" />
                        </div>
                    </div>

                    {{-- <div id="dropzone">
                        <form action="/upload" class="dropzone needsclick" id="demo-upload">
                        <div class="dz-message needsclick">
                            Drop files <b>here</b> or <b>click</b> to upload.<br />
                            <span class="dz-note needsclick">
                            (This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)
                            </span>
                        </div>
                        </form>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="bulkUploadHoliday" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
