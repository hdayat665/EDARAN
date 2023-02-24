<div class="modal fade" id="addLogModal" tabindex="-1" ariaect value-labelledby="add-children" aria-hidden="true">
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
                                <option class="form-label" value="5" selected>Please Choose</option>
                                <option class="form-label" value="1">Home</option>
                                <option class="form-label" value="2">Office</option>
                                <option class="form-label" value="3">My Project</option>
                                <option class="form-label" value="4">Others</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" >Date*</label>
                            <div class="">
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="date" id="dateaddlog" />
                                <!-- <div class="input-group-text"><i class="fa fa-calendar"></i></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="myproject" style="display:none">
                            <label for="Office-Log" class="form-label">My Project*</label>
                            <select class="form-select" id="myProject" name="project_id" aria-label="Default select example">
                                <option class="form-label" value="">Please Choose</option>
                                <?php $projects = project_memberaddl($user_id) ?>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6" id="officelog" style="display:none">
                            <label for="Office-Log" class="form-label">Office Log*</label>
                            <select class="form-select" id="officelog2" name="office_log" aria-label="Default select example">
                                <option class="form-label" value="" selected>Please Choose</option>
                                <option class="form-label" value="1">My Project</option>
                                <option class="form-label" value="2">Activity</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-4">
                            <label for="issuing-country" class="form-label">Start Time*</label>
                            {{-- <div class="input-group"> --}}
                                <input id="starttime" type="text" name="start_time" class="form-control" placeholder="START TIME" style=" background: #ffffff;" />
                                <!-- <div class="input-group-text"><i class="fa fa-clock"></i></div> -->
                            {{-- </div> --}}
                        </div>
                        <div class="col-sm-4 ">
                            <label for="issuing-country" class="form-label">End Time*</label>
                            {{-- <div class="input-group"> --}}
                                <input id="endtime" type="text" name="end_time" class="form-control" placeholder="END TIME"  style=" background: #ffffff;"/>
                                <!-- <div class="input-group-text"><i class="fa fa-clock"></i></div> -->
                            {{-- </div> --}}
                        </div>
                        <div class="col-sm-4">
                            <label for="issuing-country" class="form-label">Total Hours</label>
                            <input type="text" readonly id="logduration" name="total_hours" value="" name="" class="form-control" aria-describedby="dob">
                        </div>
                    </div>
                    
                    
                    <div class="row p-2" id="activity_locationadd">
                        <div class="col-sm-6" id="activityByProjectHide" style="display: none">
                            <label for="issuing-country" class="form-label">Activity Name*</label>
                            <select class="form-select" id="activity_names" name="activity_name">
                                <option class="form-label" value="">Please Choose</option>
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

                        {{-- <div class="col-sm-6" id="activityByHomeShow">
                            <label for="issuing-country" class="form-label">Activity Name*</label>
                            <select class="form-select" id="activityLogs" name="activity_home_show" >

                            </select>
                        </div> --}}
                        <div class="col-sm-6" id="locationByProjectHide" style="display: none"> 
                            <label for="issuing-country" class="form-label">Project Location*</label>
                            <select class="selectpicker form-select" id="projectlocsearch" name="project_location" aria-label="Default select example">
                                <option value="" selected>Please Choose</option>
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
                    </div>
                    
                    <div class="row p-2">
                        <div class="col-sm-6" id="listproject" style="display:none">
                            <label for="Office-Log" class="form-label">My Project*</label>
                            <select class="form-select" id="officeLogProject" name="office_log_project" aria-label="Default select example">
                                <option class="form-label" value="">Please Choose</option>
                                <?php $projects = project_memberaddl($user_id) ?>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row p-2">
                        <div class="col-sm-6">
                          <label for="gender" class="form-label">Description</label>
                          <textarea class="form-control" name="desc" rows="5"></textarea>
                        </div>
                    </div>
                    {{-- only for total duration purpose --}}
                    <div class="row p-2">
                        <div id="" style="display: none">
                            <div class="row p-2">
                                <div class="col-md-4">
                                    <label class="form-label" >Start date</label>
                                </div>
                                <div class="col-md-3">
                                    <input  type="text" id="daystart" class=" form-control" value="">
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label">End date</label>
                                </div>
                                <div class="col-md-3">
                                    <input  type="text" id="dayend" class=" form-control">
                                </div>
                            </div>
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
