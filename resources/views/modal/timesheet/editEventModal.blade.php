<div class="modal fade" id="editeventmodal" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">View | Update  Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm">
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <label for="firstname" class="form-label">Event Name*</label>
                            <input type="text" class="form-control" id="event_name" name="event_name" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Start Date*</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="start_date" id="starteventdateedit" />
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">End Date*</label>
                            <div class="input-group">
                                <input type="text" name="end_date" class="form-control" id="endeventdateedit" />
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Start Time*</label>
                            <div class="input-group">
                                <input id="starteventtimeedit" name="start_time" type="text" class="form-control" value="00:00 AM"/>
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">End Time*</label>
                            <div class="input-group">
                                <input id="endeventtimeedit" name="end_time" type="text" class="form-control" value="00:00 AM"/>
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Duration</label>
                            <select class="form-select" id="duration" name="duration" aria-label="Default select example">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">30 Minute</option>
                                <option class="form-label" value="2">1 Hour</option>
                                <option class="form-label" value="3">1 Hour 30 Minute</option>
                                <option class="form-label" value="4">2 Hour</option>
                                <option class="form-label" value="5">2 Hour 30 Minute</option>
                                <option class="form-label" value="6">3 Hour</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <div style="padding-top:20px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"  type="checkbox"  name="type_recurring[]" id="addeventalldayedit" value="allday" >
                                    <label class="form-label" >All Day</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="addeventrecurringedit" type="checkbox"  name="type_recurring[]" value="recurring" >
                                    <label class="form-label" >Recurring</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <label for="issuing-country" class="form-label">Priority</label>
                            <div style="padding-top:10px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="inlineRadio11" value="low">
                                    <label class="form-label" for="inlineRadio1">Low</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="inlineRadio22" value="medium">
                                    <label class="form-label" for="inlineRadio2">Medium</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="inlineRadio33" value="high">
                                    <label class="form-label" for="inlineRadio3">High</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="addneweventrecurringedit" style="display:none">
                            <label for="firstname" class="form-label">Recurring*</label>
                            <select class="form-select" name="recurring" id="addneweventselectrecurringedit" aria-label="Default select example">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">Every Weekday</option>
                                <option class="form-label" value="2">Daily</option>
                                <option class="form-label" value="3">Weekly</option>
                                <option class="form-label" value="4">Monthly</option>
                                <option class="form-label" value="5">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="addneweventsetreccurringedit" style="display: none">
                            <label for="firstname" class="form-label">Set Reccurrence*</label>
                            <div class="form-check form-check-inline">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sunedit" value="sunday" name="set_reccuring[]">
                                    <label class="form-label" for="inlineCheckbox1">Sun</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="monedit" value="monday" name="set_reccuring[]">
                                    <label class="form-label" for="inlineCheckbox2">Mon</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tueedit" value="tuesday" name="set_reccuring[]">
                                    <label class="form-label" for="inlineCheckbox3">Tue</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="wededit" value="wednesday" name="set_reccuring[]">
                                    <label class="form-label" for="inlineCheckbox3">Wed</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="thuedit" value="thursday" name="set_reccuring[]">
                                    <label class="form-label" for="inlineCheckbox3">Thu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="friedit" value="friday" name="set_reccuring[]">
                                    <label class="form-label" for="inlineCheckbox3">Fri</label>
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="satedit" value="saturday" name="set_reccuring[]">
                                    <label class="form-label" for="inlineCheckbox3">Sat</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2" id="setrecurringmontlyedit" style="display:none">
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Set Reccurrence</label><br>
                            <div class="form-control">
                                <div class="form-check">
                                    <input class="form-check-input" id="ondaycheckedit" type="checkbox"   >
                                    <label class="form-check-label" >On Day</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" id="ondayselectedit" style="display: none">
                            <label for="" class="form-label">&nbsp;</label>
                            <select class="form-select" aria-label="Default select example" id="set_reccuring_date_month" name="set_reccuring_date_month">
                                <option class="form-label" value="" >Please Select</option>
                                <option class="form-label" value="1">1 </option>
                                <option class="form-label" value="2">2</option>
                                <option class="form-label" value="3">3 </option>
                                <option class="form-label" value="4">4</option>
                                <option class="form-label" value="5">5 </option>
                                <option class="form-label" value="6">6</option>
                                <option class="form-label" value="7">7 </option>
                                <option class="form-label" value="8">8</option>
                                <option class="form-label" value="9">9 </option>
                                <option class="form-label" value="10">10</option>
                                <option class="form-label" value="11">11</option>
                                <option class="form-label" value="12">12</option>
                                <option class="form-label" value="13">13</option>
                                <option class="form-label" value="14">14</option>
                                <option class="form-label" value="15">15</option>
                                <option class="form-label" value="16">16</option>
                                <option class="form-label" value="17">17</option>
                                <option class="form-label" value="18">18</option>
                                <option class="form-label" value="19">19</option>
                                <option class="form-label" value="20">20</option>
                                <option class="form-label" value="21">21</option>
                                <option class="form-label" value="22">22</option>
                                <option class="form-label" value="23">23</option>
                                <option class="form-label" value="24">24</option>
                                <option class="form-label" value="25">25</option>
                                <option class="form-label" value="26">26</option>
                                <option class="form-label" value="27">27</option>
                                <option class="form-label" value="28">28</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2" id="setrecurringyearlyedit" style="display:none">
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Set Reccurrence</label><br>
                            <div class="form-control">
                                <div class="form-check">
                                    <input class="form-check-input" id="ondayyearlycheckedit" type="checkbox"  name="inlineRadioOptions" >
                                    <label class="form-check-label" >On</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" id="recurringmonthyearlyedit" style="display:none">
                            <label for="" class="form-label">Month</label>
                            <select class="form-select" id="set_reccuring_month_yearly" aria-label="Default select example" name="set_reccuring_month_yearly">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">January</option>
                                <option class="form-label" value="2">February</option>
                                <option class="form-label" value="3">March</option>
                                <option class="form-label" value="4">April</option>
                                <option class="form-label" value="5">May</option>
                                <option class="form-label" value="6">Jun</option>
                                <option class="form-label" value="7">July</option>
                                <option class="form-label" value="8">August</option>
                                <option class="form-label" value="9">September</option>
                                <option class="form-label" value="10">October</option>
                                <option class="form-label" value="11">November</option>
                                <option class="form-label" value="12">December</option>
                            </select>
                        </div>
                        <div class="col-sm-3" id="recurringdayyearlyedit" style="display:none">
                            <label for="" class="form-label">Day</label>
                            <select class="form-select" id="set_reccuring_date_yearly" aria-label="Default select example" name="set_reccuring_date_yearly">
                                <option class="form-label" value="">Please Select</option>
                                <option class="form-label" value="1">1 </option>
                                <option class="form-label" value="2">2</option>
                                <option class="form-label" value="31">31</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2" id="setrecurringontheyearlyedit" style="display:none">
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Set Reccurrence Yearly*</label><br>
                            <div class="form-control">
                                <div class="form-check">
                                    <input class="form-check-input" id="ontheyearlycheckedit" type="checkbox"  name="inlineRadioOptions" >
                                    <label class="form-check-label" >On The</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" id="recurringselectyearlyedit" style="display:none">
                            <label for="" class="form-label">&nbsp;</label>
                            <select class="form-select" id="set_reccuring_week_yearly" aria-label="Default select example" name="set_reccuring_week_yearly">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">First</option>
                                <option class="form-label" value="2">Second</option>
                                <option class="form-label" value="3">Third</option>
                                <option class="form-label" value="4">Fourth</option>
                            </select>
                        </div>
                        <div class="col-sm-2" id="recurringonthedayyearlyedit" style="display:none">
                            <label for="" class="form-label">&nbsp;</label>
                            <select class="form-select" id="set_reccuring_day_yearly" aria-label="Default select example" name="set_reccuring_day_yearly">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">Sunday </option>
                                <option class="form-label" value="2">Monday</option>
                                <option class="form-label" value="3">Tuesday</option>
                                <option class="form-label" value="4">Wednesday</option>
                                <option class="form-label" value="5">Thursday</option>
                                <option class="form-label" value="6">Friday</option>
                                <option class="form-label" value="7">Saturday</option>
                            </select>
                        </div>
                        <div class="col-sm-1" id="recurringontheofedit" style="padding-top:30px;display:none" >
                            <label for="" class="form-label" >&nbsp;of</label>
                        </div>
                        <div class="col-sm-3" id="recurringonthemonthyearlyedit" style="display:none">
                            <label for="" class="form-label">&nbsp;</label>
                            <select class="form-select" id="set_reccuring_month_yearly2" aria-label="Default select example" name="set_reccuring_month_yearly2">
                                <option class="form-label" value="" selected>Please Select</option>
                                <option class="form-label" value="1">January </option>
                                <option class="form-label" value="2">February</option>
                                <option class="form-label" value="3">March</option>
                                <option class="form-label" value="4">May</option>
                                <option class="form-label" value="5">Jun</option>
                                <option class="form-label" value="6">July</option>
                                <option class="form-label" value="7">August</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2" id="setrecurringonmontlyedit" style="display:none">
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Set Reccurrence</label><br>
                            <div class="form-control">
                                <div class="form-check">
                                    <input class="form-check-input" id="onthecheckedit" type="checkbox"  name="inlineRadioOptions" >
                                    <label class="form-check-label" >On The</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" id="recurringselectontheedit" style="display:none">
                            <label for="" class="form-label">&nbsp;</label>
                            <select class="form-select" id="set_reccuring_week_month" aria-label="Default select example" name="set_reccuring_week_month">
                                <option class="form-label" value="">Please Select</option>
                                <option class="form-label" value="1">First </option>
                                <option class="form-label" value="2">Second</option>
                                <option class="form-label" value="3">Third</option>
                                <option class="form-label" value="4">Fourth</option>
                            </select>
                        </div>
                        <div class="col-sm-4" id="recurringselectwhatdayedit" style="display:none">
                            <label for="" class="form-label">&nbsp;</label>
                            <select class="form-select" id="set_reccuring_day_month" aria-label="Default select example" name="set_reccuring_day_month">
                                <option class="form-label" value="">Please Select</option>
                                <option class="form-label" value="1">Sunday </option>
                                <option class="form-label" value="2">Monday</option>
                                <option class="form-label" value="3">Tuesday</option>
                                <option class="form-label" value="4">Wednesday</option>
                                <option class="form-label" value="5">Thursday</option>
                                <option class="form-label" value="6">Friday</option>
                                <option class="form-label" value="7">Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="locationByProjectEditEventHide">
                            <label for="firstname" class="form-label">Location*</label>
                            <select class="selectpicker form-select" id="addneweventprojectlocsearchedit" name="location" aria-label="Default select example">
                                <option class="form-label" value="">Please Select</option>
                                <?php $projectLocations = projectLocation() ?>
                                @foreach ($projectLocations as $projectLocation)
                                <option class="form-label" value="{{$projectLocation->id}}">{{$projectLocation->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6" id="locationByProjectEditEventShow">
                            <label for="issuing-country" class="form-label">Location</label>
                            <select class="selectpicker form-select" id="location_by_project" name="location_by_project" aria-label="Default select example">

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Project*</label>
                            <select class="selectpicker form-select" id="addneweventselectprojectedit" aria-label="Default select example" name="project_id">
                                <option class="form-label" value="">Please Select</option>
                                <?php $projects = project() ?>
                                @foreach ($projects as $project)
                                <option class="form-label" value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">Participant*</label>
                            <select class="selectpicker form-select" id="addneweventparticipantedit" aria-label="Default select example" multiple name="participant[]">
                                <option class="form-label" value="">Please Select</option>
                                <?php $employees = getEmployee() ?>
                                @foreach ($employees as $employee)
                                <option class="form-label" value="{{$employee->user_id}}">{{$employee->employeeName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Description*</label>
                            <textarea class="form-control" id="descE" name="desc" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-2">
                            <button type="button" id="addreminderedit" class="btn btn-primary btn-xs">Add Reminder</button>
                        </div>
                        <div class="col-sm-4">
                            <input type="hidden" id="idEvent" name="id">
                            <select class="form-select" id="addeventreminderedit" aria-label="Default select example" name="reminder" style="display: none">
                                <option class="form-label" value="">Please Select</option>
                                <option class="form-label" value="1">5 Minute Before</option>
                                <option class="form-label" value="2">10 Minute Before</option>
                                <option class="form-label" value="1">15 Minute Before</option>
                                <option class="form-label" value="2">20 Minute Before</option>
                                <option class="form-label" value="1">30 Minute Before</option>
                                <option class="form-label" value="1">1 Hour Before</option>
                            </select>
                        </div>
                        <div class="col-sm-4" id="attendHide">
                            <div class="btn-group w-100">
                                <a class="btn btn-lime" id="attendEvent" data-status="attend">Attend</a>
                                <a class="btn btn-danger" id="attendEvent" data-status="not attend" >Reject</a>

                            </div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="issuing-country" class="form-label">Attach File:</label>
                            <input type="file" class="btn" name="file_upload"></input>
                            <p id="fileView"></p>
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-lime fade show" id="attendShow"  style=" display: none; align-items: center;  justify-content: center;">
                                <h3 class='form-label'>Attend</h3>
                            </div>
                            <div class="alert alert-yellow fade show" id="attendNoResponse" style=" display: flex; align-items: center;  justify-content: center; ">
                                <h3 class='form-label'>No Respond</h3>
                            </div>
                            <div class="alert alert-danger fade show" id="attendNotAttend" style=" display: none; align-items: center;  justify-content: center;">
                                <h3 class='form-label'>Not Attend</h3>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" id="deleteEventButton" class="btn btn-danger" >Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateEventButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
