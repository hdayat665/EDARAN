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
                                <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                <option class="form-label" value="1">HOME</option>
                                <option class="form-label" value="2">OFFICE</option>
                                <option class="form-label" value="3">MY PROJECT</option>
                                <option class="form-label" value="4">OTHERS</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" >Date*</label>
                            <div class="">
                                <input type="text" class="form-control" placeholder="YYYY/MM/DD" name="date" id="dateaddlog" value="<?php echo date('Y-m-d'); ?>" />
                                <!-- <div class="input-group-text"><i class="fa fa-calendar"></i></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="myproject" style="display:none">
                            <label for="Office-Log" class="form-label">My Project*</label>
                            <select class="form-select" id="myProject" name="project_id" aria-label="Default select example">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <?php $projects = project_memberaddl($data['user_id']); ?>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6" id="officelog" style="display:none">
                            <label for="Office-Log" class="form-label">Office Log*</label>
                            <select class="form-select" id="officelog2" name="office_log" aria-label="Default select example">
                                <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                <option class="form-label" value="1">MY PROJECT</option>
                                <option class="form-label" value="2">ACTIVITY</option>
                            </select>
                        </div>
                        
                            <div class="col-sm-6" id="listproject" style="display:none">
                                <label for="Office-Log" class="form-label">My Project*</label>
                                <select class="form-select" id="officeLogProject" name="office_log_project" aria-label="Default select example">
                                    <option class="" value="">PLEASE CHOOSE</option>
                                    <?php $projects = project_memberaddl($data['user_id']) ?>
                                    @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Start Time*</label>
                            {{-- <div class="input-group"> --}}
                                <input id="starttime" type="text" name="start_time" class="form-control" placeholder="START TIME" style=" background: #ffffff;" />
                                <!-- <div class="input-group-text"><i class="fa fa-clock"></i></div> -->
                            {{-- </div> --}}
                        </div>
                        <div class="col-sm-6 ">
                            <label for="issuing-country" class="form-label">End Time*</label>
                            {{-- <div class="input-group"> --}}
                                <input id="endtime" type="text" name="end_time" class="form-control" placeholder="END TIME"  style=" background: #ffffff;"/>
                                <!-- <div class="input-group-text"><i class="fa fa-clock"></i></div> -->
                            {{-- </div> --}}
                        </div>
                        {{-- <div class="col-sm-4">
                           
                        </div> --}}
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="Office-Log" class="form-label">Lunch Break</label>
                                <select class="form-select" id="lunchBreak" name="lunch_break" aria-label="Default select example">
                                    <option class="" value="">PLEASE CHOOSE</option>
                                    <option class="" value="1">YES</option>
                                    <option class="" value="2">NO</option>
                                </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Total Hours</label>
                            <input type="text" readonly id="logduration" name="total_hour" value="" name="" class="form-control" aria-describedby="dob">
                        </div>
                    </div>
                    
                    
                    <div class="row p-2" id="activity_locationadd">
                        <div class="col-sm-6" id="activityByProjectHide" style="display: none">
                            <label for="issuing-country" class="form-label">Activity Name*</label>
                            <select class="form-select" id="activity_names" name="activity_name">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <?php $activitys = activityName($data['department_id']); ?>
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
                        <div class="col-sm-6" id="locationByProjectHide" style="display: none"> 
                            <label for="issuing-country" class="form-label">Project Location*</label>
                            <select class="selectpicker form-select" id="projectlocsearch" name="project_location" aria-label="Default select example">
                                <option value="" selected>PLEASE CHOOSE</option>
                                <option value="OFFICE" >OFFICE</option>
                                <?php $projectLocations = projectLocation() ?>
                                @foreach ($projectLocations as $projectLocation)
                                <option value="{{$projectLocation->id}}">{{$projectLocation->location_name}}</option>
                                @endforeach
                                <option value="OTHERS" >OTHERS</option>
                            </select> 
                        </div>
                        <div class="col-sm-6" id="locationByProjectShow" style="display: none">
                            <label for="issuing-country" class="form-label">Project Location*</label>
                            <select class="selectpicker form-select" id="projectLocationOffice" name="project_location_office" aria-label="Default select example">
                        
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                          <label for="gender" class="form-label">Description</label>
                          <textarea class="form-control" name="desc" rows="5" maxlength="225"></textarea>
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