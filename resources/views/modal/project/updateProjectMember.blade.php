<div class="modal fade" id="updateprojectmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Project Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Joined Date*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-6">Project Member Name*</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="datepicker-updatejoineddate" placeholder="dd/mm/yyyy" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" readonly class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Designation*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Department*</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <select class="form-select" disabled>
                                <option value="0" label="Select State " selected="selected">Select State </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" disabled>
                                <option value="0" label="Select State " selected="selected">Select State </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Branch*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Unit/Base*</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <select class="form-select" disabled>
                                <option value="0" label="Select State " selected="selected">Select State </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" disabled>
                                <option value="0" label="Select State " selected="selected">Select State </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label col-form-label col-md-12">Select Location*</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-12">
                            <select class="selectpicker form-control" id="location-search-update" multiple>
                                <option value="1">Kuala Lumpur</option>
                                <option value="2">Selangor</option>
                                <option value="3">Petaling Jaya</option>
                                <option value="4">Cyberjaya</option>
                                <option value="5">Dungun</option>
                                <option value="6">Kerteh</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check form-switch">
                                <input type="checkbox" value="exitproject2" class="form-check-input partCheck"></input>
                                <label class="form-label" for="checkbox1">Exit Project?</label><br>
                            </div>
                        </div>
                    </div>
                    <div id="exitproject2" class="part">
                        <div class="col-md-12">
                            <br>
                            <input type="text" class="form-control" id="datepicker-updateexitdate" placeholder="dd/mm/yyyy" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
