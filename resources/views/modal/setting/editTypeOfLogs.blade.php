

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Type of Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">

                    <div class="mb-3">
                        <label class="form-label">Department* </label>
                        <select class="form-select" id="department" name="department" aria-label="Default select example">
                            <?php $departments = getDepartment() ?>
                            <option class="form-label" value="">Select department</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->departmentName}}</option>
                            @endforeach
                            <input type="hidden" id="idT" name="id">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type of Log* </label>
                        <select class="form-select" id="addtypeoflogedit" name="type_of_log" aria-label="Default select example">
                            <option class="form-label" value="" selected>Select Type of Log</option>
                            <option class="form-label" value="Non-Project" >Non-Project</option>
                            <option class="form-label" value="Project" >Project</option>
                        </select>
                    </div>
                    <div class="mb-3" id="addtypeoflogprojectedit" style="display:none">
                        <label class="form-label">Project* </label>
                        <select class="form-select" id="project" name="project_id" aria-label="Default select example">
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
                            <input type="text" class="form-control" id="" />
                        </div>
                        <div class="col-sm-2" id="" >
                            <label for="firstname" class="form-label">&nbsp;</label><br>
                            <a href="#" class="btn btn-primary btn-sm">+ Add</a>
                        </div>
                    </div>
                    <div class="row p-2">
                        <table id="activitynameedit" class="table table-striped table-bordered align-middle">
                        <thead>
							<tr>
								<th class="text-nowrap">Activity Name</th>
								<th width="1%" data-orderable="false" class="align-middle">Action</th>
                            </tr>
							</thead>
						<tr>
							<th style="display:none"></th>
							<th width="1%" style="display:none"></th>
						</tr>
						</table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updateButton" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
