<div class="modal fade" id="assignProjectMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Project Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="assignProjectMemberModal2">
                <form id="assignProjectMemberForm">
                    <div class="mb-3">
                        <label class="form-label">Project Member Name:</label><br><br>
                        <select class="selectpicker form-select" name="employee_id[]" id="projectmember" aria-label="Default select example" multiple>
                        {{-- <select class="form-select" id="projectmember" name="employee_id[]" multiple="multiple"> --}}
                            @php
                                $sortedProjectMembers = $projectMembers->sortBy('employeeName');
                            @endphp
                            @foreach ($sortedProjectMembers as $employee)
                                <option value="{{$employee->id}}">{{$employee->employeeName}}</option>
                            @endforeach
                        </select>
                        <div hidden id="projectmember-err" class="error" ></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Project Location Name : </label><br><br>
                        <select class="selectpicker form-control" name="location[]" id="projectlocation" multiple>
                            <?php $projectLocations = projectLocation($project->id) ?>
                            @foreach ($projectLocations as $projectLocation)
                                <option value="{{$projectLocation->id}}">{{$projectLocation->location_name}}</option>
                            @endforeach
                        </select>
                        <div hidden id="projectlocation-err" class="error" ></div>
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
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
        padding-left: 18px; /* Adjust the padding as needed */
}
</style>
