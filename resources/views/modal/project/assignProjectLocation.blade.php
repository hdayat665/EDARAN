<div class="modal fade" id="assignProjectMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Project Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="assignProjectMemberForm">

                    <div class="mb-3">
                        <label class="form-label">Project Member Name : </label><br><br>
                        <select class="selectpicker form-control" name="employee_id[]" id="projectmember" multiple>
                            @foreach ($projectMembers as $employee)
                              <option value="{{$employee->id}}">{{$employee->employeeName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Project Location Name : </label><br><br>
                        <select class="selectpicker form-control" name="location[]" id="projectlocation" multiple>
                                <?php $locations = projectLocation() ?>
                                @foreach ($locations as $location)
                                <option value="{{$location->id}}" >{{$location->location_name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="assignProjectMember">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
