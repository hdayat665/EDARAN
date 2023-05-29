<div class="modal fade" id="editlogmodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">View | Update Logs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editLogForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">Type Of Log*</label>
                            <select class="form-select" id="typeoflogedit" name="type_of_log" aria-label="Default select example" style="pointer-events:none;background:#e9ecef;">
                                <option class="form-label" value="" selected>PLEASE CHOOSE </option>
                                <option class="form-label" value="1">HOME</option>
                                <option class="form-label" value="2">OFFICE</option>
                                <option class="form-label" value="3">MY PROJECT</option>
                                <option class="form-label" value="4">OTHERS</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Date*</label>
                            <div class="">
                                <input type="text" class="form-control" name="date" id="dateaddlogedit" />
                                <!-- <div class="input-group-text"><i class="fa fa-calendar"></i></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="officelogedit" style="display:none">
                            <label for="Office-Log" class="form-label">Office Log*</label>
                            <select class="form-select" id="officelog2edit" name="office_log" aria-label="Default select example" style="pointer-events:none;background:#e9ecef;">
                                <option class="form-label" value="" selected>PLEASE CHOOSE*</option>
                                <option class="form-label" value="1">MY PROJECT</option>
                                <option class="form-label" value="2">ACTIVITY</option>
                            </select>
                        </div>
                        <div class="col-sm-6" id="myprojectedit" style="display:none">
                            <label for="Office-Log" class="form-label">My Project*</label>
                            <select class="form-select" id="project_id_edit" name="project_id" aria-label="Default select example" style="pointer-events:none;background:#e9ecef;">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <?php $projects = project_memberaddl($user_id) ?>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Start Time*</label>
                                <input id="starttimeedit" name="start_time" type="text" class="form-control"  style=" background: #ffffff;"/>
                                {{-- <div class="input-group-text"><i class="fa fa-clock"></i></div> --}}
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">End Time*</label>
                            <input id="endtimeedit" name="end_time" type="text" class="form-control" style=" background: #ffffff;" />
                            {{-- <div class="input-group-text"><i class="fa fa-clock"></i></div> --}}
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="Office-Log" class="form-label">Lunch Break</label>
                                    <select class="form-select" id="lunchBreakedit" name="lunch_break" aria-label="Default select example">
                                        <option class="" value="">PLEASE CHOOSE</option>
                                        <option class="" value="1">YES</option>
                                        <option class="" value="2">NO</option>
                                    </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="issuing-country" class="form-label">Total Hours</label>
                                <input type="text" readonly id="total_hour_edit" name="total_hour" class="form-control" aria-describedby="dob">
                                <input type="hidden" readonly id="id" class="form-control" aria-describedby="dob">
                            </div>
                        </div>
                        <div class="row p-2" id="activity_location_edit">
                            <div class="col-sm-6" id="activityByProjectEditHide" style="display: none">
                                <label for="issuing-country" class="form-label">Activity Name*</label>
                                <select class="form-select" id="activity_name_edit1" name="activity_name">
                                    <option class="form-label" value="">PLEASE CHOOSE </option>
                                    <?php $activitys = activityName($department_id) ?> 
                                    @foreach ($activitys as $activity)
                                    <option value="{{$activity->id}}">{{$activity->activity_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="col-sm-6" id="activityByProjectEditHide1" style="display: none">
                                <label for="issuing-country" class="form-label">Activity Name*</label>
                                <select class="form-select" id="activity_name_edit2" name="activity_name">
                                    <option class="form-label" value="">PLEASE CHOOSE </option>
                                    <?php $activitys = activityName1($department_id) ?> 
                                    @foreach ($activitys as $activity)
                                    <option value="{{$activity->id}}">{{$activity->activity_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            {{-- <div class="col-sm-6" id="activityByProjectEditShow">
                                <label for="issuing-country" class="form-label">Activity Name*</label>
                                <select class="form-select" id="activityOfficeEdit" name="activity_office" >
    
                                </select>
                            </div> --}}

                            <div class="col-sm-6" id="locationByProjectEditHide" style="display: none">
                                <label for="issuing-country" class="form-label">Project Location*</label>
                                <select class="form-select" id="projectlocsearchedit" name="project_location" aria-label="Default select example">
                                    <option class="form-label" value="">PLEASE CHOOSE</option>
                                    <option class="" value="OFFICE">OFFICE</option>
                                    <?php $projectLocations = projectLocation() ?>
                                    @foreach ($projectLocations as $projectLocation)
                                    <option value="{{$projectLocation->id}}">{{$projectLocation->location_name}}</option>
                                    @endforeach
                                    <option value="OTHERS" >OTHERS</option>
                                </select>
                            </div>
                            <div class="col-sm-6" id="locationByProjectEditShow" style="display: none">
                                <label for="issuing-country" class="form-label">Project Location*</label>
                                <select class="selectpicker form-select" id="projectLocationOfficeEdit" name="project_location_office" aria-label="Default select example">
    
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row p-2" id="listprojectedit" style="display:none">
                        <div class="col-sm-6" >
                            <label for="Office-Log" class="form-label">My Project*</label>
                            <select class="form-select" id="officeLogProjectEdit" name="office_log_project" aria-label="Default select example">
                                <option class="form-label" value="">PLEASE CHOOSE</option>
                                <?php $projects = project_memberaddl($user_id) ?>
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}} - {{$project->project_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row p-2" style="display: none">
                            {{-- duration purpose --}}
                            <div id="" >
                                <div class="row p-2">
                                    <div class="col-md-4">
                                        <label class="form-label" >Start date</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input  type="text" id="daystartedit" class=" form-control" value="">
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="form-label">End date</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input  type="text" id="dayendedit" class=" form-control">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" id="desc" rows="5"></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteLogButton" >Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary formSave" id="updateLogButton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
