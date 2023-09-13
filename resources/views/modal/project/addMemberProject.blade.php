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
                            <label class="form-label col-form-label col-md-6">Project Member Name*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Joined Date</label>
                        </div>
                    </div>

                    <div class="row mb-15px">
                        <div class="col-md-6">    
                            <select class="form-select select1" id="employee_id" name="employee_id" style="text-transform: uppercase;">
                                <option value="" label="PLEASE CHOOSE" selected="selected"></option>
                                <?php
                                    $id = $project->id;
                                    $employees = getEmployeeNotInProject($id);
                                    if ($employees) {
                                        // Sort employees by name alphabetically
                                        $sortedEmployees = $employees->sortBy('employeeName');
                                        foreach ($sortedEmployees as $employee) {
                                            echo '<option value="' . $employee->user_id . '">' . $employee->employeeName . '</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <input type="hidden" id="employeeIdDiv" name="" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" value="{{$project->id}}" name="project_id" style="text-transform: upppercase;">
                            <input type="hidden" value="{{$project->tenant_id}}" name="tenant_id">
                            <input type="text" class="form-control" name="joined_date" id="datepicker-joineddate" placeholder="YYYY/MM/DD" />
                        </div>
                    </div>
                    <!-- TRY -->
                    <div class="row" style="display: none;">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-6">Project Start</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Employee Join</label>
                        </div>
                    </div>
                    <div class="row mb-15px" style="display: none;">
                        <div class="col-md-6">    
                            <input type="text" class="form-control" value="" name="startProject" id="projectStart" style="text-transform: upppercase;" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="" name="joinDate" id="employeeJoin" style="text-transform: upppercase;" placeholder="YYY/MM/DD">
                        </div>
                    </div>
                    <!-- TRY -->
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
                            <select class="form-select" name="designation" id="designation"  style="pointer-events: none; touch-action: none; background: #e9ecef;">
                                <option value="" label=""></option>
                                <?php $Designations = getDesignation() ?>
                                @foreach ($Designations as $Designation)
                                <option value="{{$Designation->id}}" >{{$Designation->designationName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select class="form-select" id="department" name="department" style="pointer-events: none; touch-action: none; background: #e9ecef;">
                                <option value="" label=""></option>
                                <?php $departments = getDepartment() ?>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}" >{{$department->departmentName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Branch</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Unit</label>
                        </div>
                    </div>

                    <div class="row mb-15px">

                        <div class="col-md-6">
                            <select class="form-select" name="branch" id="branchs" style="pointer-events: none; touch-action: none; background: #e9ecef;">
                                <option value="" label=""></option>    
                                <?php $branch = getBranchProject() ?>
                                @foreach ($branch as $branchs)
                                <option value="{{$branchs->id}}" >{{$branchs->branchName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select class="form-select" name="unit" id="unit" style="pointer-events: none; touch-action: none; background: #e9ecef;">
                                <option value="" label=""></option>
                                <?php $Units = getUnitProject() ?>
                                @foreach ($Units as $Unit)
                                <option value="{{$Unit->id}}" >{{$Unit->unitName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="form-label col-form-label col-md-12">Select Location</label>
                    </div>

                    <div class="row mb-15px">
                        <div class="col-md-12">
                        <select class="default-select2 form-control" name="location[]" id="location-search" multiple>
                            <?php $projectLocations = projectLocation($project->id) ?>
                            @foreach ($projectLocations as $projectLocation)
                                <option value="{{$projectLocation->id}}">{{$projectLocation->location_name}}</option>
                            @endforeach
                        </select>


                        </div>


                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveProjectMember">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
