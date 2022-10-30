<div class="modal fade" id="editProjectMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update project Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProjectMemberForm">

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
                            <input type="hidden" value="{{$project->id}}" name="project_id">
                            <input type="hidden" id="idPM">
                            <input type="hidden" value="{{$project->tenant_id}}" name="tenant_id">
                            <input type="text" class="form-control" name="joined_date" id="joined_date" id="datepicker-joineddate" placeholder="dd/mm/yyyy" />

                        </div>

                        <div class="col-md-6">
                            <select class="selectpicker form-control" id="employee_idE" name="employee_id">
                                <option >Please Select..</option>
                              @foreach ($employeeInfos as $employee)
                                <option value="{{$employee->id}}">{{$employee->employeeName}}</option>
                              @endforeach
                            </select>
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
                            <select class="form-select" name="designation" id="designationE">
                                <option label="Select State ">Select State </option>
                                <?php $Designations = getDesignation() ?>
                                @foreach ($Designations as $Designation)
                                <option value="{{$Designation->id}}" >{{$Designation->designationName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select class="form-select" id="departmentE" name="department">
                                <option label="Select State ">Select State </option>
                                <?php $departments = getDepartment() ?>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}" >{{$department->departmentName}}</option>
                                @endforeach
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
                            <select class="form-select" name="branch" id="branchE">
                                <option label="Select State ">Select State </option>
                                <?php $Branchs = getBranch() ?>
                                @foreach ($Branchs as $Branch)
                                <option value="{{$Branch->id}}" >{{$Branch->branchName}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-6">
                            <select class="form-select" name="unit" id="unitE">
                                <option label="Select State ">Select State </option>
                                <?php $Units = getUnit() ?>
                                @foreach ($Units as $Unit)
                                <option value="{{$Unit->id}}" >{{$Unit->unitName}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <div class="row">
                        <label class="form-label col-form-label col-md-12">Select Location*</label>
                    </div>

                    <div class="row mb-15px">
                        <div class="col-md-12">
                            <select class="selectpicker form-control" name="location[]" id="location-search" multiple >
                                <option label="Select State ">Select Location </option>
                                <?php $locations = projectLocation() ?>
                                @foreach ($locations as $location)
                                <option value="{{$location->id}}" >{{$location->location_name}}</option>
                                @endforeach
                            </select>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check form-switch">
                                <input type="checkbox" name="exit_project" id="exit_project" class="form-check-input partCheck"></input>
                                <label class="form-label" for="checkbox1">Exit Project?</label><br>
                            </div>

                        </div>

                    </div>
                    <div >
                    <div class="row">
                        <div class="col-md-6">

                            <input type="text" class="form-control" id="datepicker-exitdate" name="exit_project_date" placeholder="dd/mm/yyyy" />
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateProjectMember">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
