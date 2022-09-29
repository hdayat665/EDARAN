<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Type of Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="mb-3">
                        <label class="form-label">Department* </label>
                        <select class="form-select" name="department" aria-label="Default select example">
                            <?php $departments = getDepartment() ?>
                            <option class="form-label" value="">Select department</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->departmentName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type of Log* </label>
                        <select class="form-select" id="addtypeoflog" name="type_of_log" aria-label="Default select example">
                            <option class="form-label" value="" selected>Select Type of Log</option>
                            <option class="form-label" value="Non-Project" >Non-Project</option>
                            <option class="form-label" value="Project" >Project</option>
                        </select>
                    </div>
                    <div class="mb-3" id="addtypeoflogproject" style="display:none">
                        <label class="form-label">Project* </label>
                        <select class="form-select" id="" name="project_id" aria-label="Default select example">
                            <?php $projects = project() ?>
                            <option class="form-label" value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-10" id="" >
                            <label for="firstname" class="form-label">Activity Name*</label>
                            <input type="text" class="form-control" value="saya buat apa 1" name="activity_name[]" />
                            <input type="text" class="form-control" value="saya buat apa 2" name="activity_name[]" />
                        </div>
                        <div class="col-sm-2" id="" >
                            <label for="firstname" class="form-label">&nbsp;</label><br>
                            <a href="#" class="btn btn-primary btn-sm">+ Add</a>
                        </div>
                    </div>
                    <div class="row p-2">
                        <table id="activityname" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th class="text-nowrap">Department</th>
                                    <th width="9%" data-orderable="false" class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="1%">1</td>
                                    <td >Corrective Maintenance</td>
                                    <td width="1%"><a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="saveButton" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
