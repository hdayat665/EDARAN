<div class="modal fade" id="addProjectMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add project Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProjectMemberForm">

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Joined Date</label>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-6">Project Member Name*</label>
                        </div>


                    </div>

                    <div class="row mb-15px">

                        <div class="col-md-6">
                            <input type="hidden" value="{{$project->id}}" name="project_id" style="text-transform: upppercase;">
                            <input type="hidden" value="{{$project->tenant_id}}" name="tenant_id">
                            <input type="text" class="form-control" name="joined_date" id="datepicker-joineddate" placeholder="dd/mm/yyyy" />

                        </div>

                        <div class="col-md-6">
                            <select class="selectpicker form-control" id="employee_id" name="employee_id" style="text-transform: upppercase;">
                                <option value="" label="PLEASE CHOOSE">PLEASE CHOOSE</option>
                              @foreach ($employeeInfos as $employee)
                                <option value="{{$employee->id}}">{{$employee->employeeName}}</option>
                              @endforeach
                            </select>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Designation</label>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Department</label>
                        </div>


                    </div>
                    <div class="row mb-15px">

                        <div class="col-md-6">
                            <select class="form-select" name="designation" id="designation" style="text-transform: upppercase;">
                                <option value="" label="PLEASE CHOOSE">SELECT DESIGNATION</option>
                                <?php $Designations = getDesignation() ?>
                                @foreach ($Designations as $Designation)
                                <option value="{{$Designation->id}}" >{{$Designation->designationName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select class="form-select" id="department" name="department" style="text-transform: upppercase;">
                                <option value="" label="PLEASE CHOOSE">SELECT DEPARTMENT</option>
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
                            <select class="form-select" name="branch" id="branchs">
                                <option value="" label="PLEASE CHOOSE ">SELECT BRANCH </option>
                                <?php $Branchs = getBranch() ?>
                                @foreach ($Branchs as $Branch)
                                <option value="{{$Branch->id}}" >{{$Branch->branchName}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-6">
                            <select class="form-select" name="unit" id="unit" style="text-transform: upppercase;">
                                <option value="" label="PLEASE CHOOSE">SELECT UNIT</option>
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
                            <select class="default-select2 form-control" name="location[]" id="location-search" multiple >
                            
                                <?php $locations = projectLocation() ?>
                                @foreach ($locations as $location)
                                <option value="{{$location->id}}" >{{$location->location_name}}</option>
                                @endforeach
                            </select>

                        </div>


                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveProjectMember">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
