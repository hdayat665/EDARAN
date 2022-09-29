<div class="modal fade" id="editlogmodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">View | Update Logs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addChildrenForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">Type Of Log*</label>
                            <select class="form-select" id="typeoflogedit" aria-label="Default select example">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">Home</option>
                                <option class="form-label" value="2">Office</option>
                                <option class="form-label" value="3">My Project</option>
                                <option class="form-label" value="4">Others</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Date*</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="dateaddlogedit" />
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="officelogedit" style="display:none">
                            <label for="Office-Log" class="form-label">Office Log</label>
                            <select class="form-select" id="officelog2edit" aria-label="Default select example">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">My Project</option>
                                <option class="form-label" value="2">Activity</option>
                            </select>
                        </div>
                        <div class="col-sm-6" id="myprojectedit" style="display:none">
                            <label for="Office-Log" class="form-label">My Project</label>
                            <select class="form-select" id="" aria-label="Default select example">
                                <option class="form-label" value="" selected>List all project</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="listprojectedit" style="display:none">
                            <label for="Office-Log" class="form-label">My Project</label>
                            <select class="form-select" id="" aria-label="Default select example">
                                <option class="form-label" value="" selected>List All Project</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Activity Name</label>
                            <select class="form-select" id="" >
                                <option class="form-label" value="" selected>List All Activity Name</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">End Time</label>
                            <div class="input-group">
                                <input id="starttimeedit" type="text" class="form-control" />
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Project Location</label>
                            <select class="selectpicker form-select" id="projectlocsearch" aria-label="Default select example">
                                <option class="form-label" value="" selected>List All Project location</option>
                            </select>
                        </div>
                        <div class="col-sm-6 ">
                            <label for="issuing-country" class="form-label">End Time</label>
                            <div class="input-group">
                                <input id="endtimeedit" type="text" class="form-control" />
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Description</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Total Hours</label>
                            <input type="text" readonly id="" value="Auto calculate (End time - Start time), default 00:00" name="" class="form-control" aria-describedby="dob">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" >Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <had type="button" class="btn btn-primary formSave" id="addChildren">Save</had>
            </div>
        </div>
    </div>
</div>
