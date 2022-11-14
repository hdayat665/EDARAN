<div class="modal fade" id="addLogModal" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newlogmodals">Add New Logs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addLogForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">Type Of Log*</label>
                            <select class="form-select" id="typeoflog" name="type_of_log" aria-label="Default select example">
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
                                <input type="text" class="form-control" name="date" id="dateaddlog" />
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="officelog" style="display:none">
                            <label for="Office-Log" class="form-label">Office Log*</label>
                            <select class="form-select" id="officelog2" name="office_log" aria-label="Default select example">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">My Project</option>
                                <option class="form-label" value="2">Activity</option>
                            </select>
                        </div>
                        <div class="col-sm-6" id="myproject" style="display:none">
                            <label for="Office-Log" class="form-label">My Project*</label>
                            <select class="form-select" id="myProject" name="project_id" aria-label="Default select example">
                                <option class="form-label" value="">List all project</option>
                                <?php $projects = project_member($user_id) ?>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="listproject" style="display:none">
                            <label for="Office-Log" class="form-label">My Project*</label>
                            <select class="form-select" id="officeLogProject" name="office_log_project" aria-label="Default select example">
                                <option class="form-label" value="">List all project</option>
                                <?php $projects = project_member($user_id) ?>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="activityByProjectHide">
                            <label for="issuing-country" class="form-label">Activity Name*</label>
                            <select class="form-select" id="" name="activity_name">
                                <option class="form-label" value="">List All Activity Name</option>
                                <?php $activitys = activityName($department_id) ?>
                                @foreach ($activitys as $activity)
                                <option value="{{$activity->id}}">{{$activity->activity_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6" id="activityByProjectShow">
                            <label for="issuing-country" class="form-label">Activity Name*</label>
                            <select class="form-select" id="activityOffice" name="activity_office" >

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Start Time*</label>
                            <div class="input-group">
                                <input id="starttime" type="text" name="start_time" class="form-control" />
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="locationByProjectHide">
                            <label for="issuing-country" class="form-label">Project Location*</label>
                            <select class="selectpicker form-select" id="projectlocsearch" name="project_location" aria-label="Default select example">
                                <option class="form-label" value="">List All Project location</option>
                                <?php $projectLocations = projectLocation() ?>
                                @foreach ($projectLocations as $projectLocation)
                                <option value="{{$projectLocation->id}}">{{$projectLocation->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6" id="locationByProjectShow">
                            <label for="issuing-country" class="form-label">Project Location*</label>
                            <select class="selectpicker form-select" id="projectLocationOffice" name="project_location_office" aria-label="Default select example">

                            </select>
                        </div>
                        <div class="col-sm-6 ">
                            <label for="issuing-country" class="form-label">End Time*</label>
                            <div class="input-group">
                                <input id="endtime" type="text" name="end_time" class="form-control" />
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" rows="5"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Total Hours</label>
                            <input type="text" readonly id="" name="total_hours" value="Auto calculate (End time - Start time), default 00:00" name="" class="form-control" aria-describedby="dob">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveLogButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
