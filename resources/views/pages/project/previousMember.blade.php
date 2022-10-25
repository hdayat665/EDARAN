<style>

@media screen and (min-width: 1000px) {
    .modal-dialog {
        max-width: 800px;
        /* New width for default modal */
    }
}

table{
    width: 100% !important
}

.part {
    display: none;
}
</style>
<div class="tab-pane fade" id="tab4">
    <div class="row">
        <div class="col-xl-15 bg-light"><br>
            <ul class="nav nav-tabs">
                <li class="nav-item bg-light">
                    <a href="#current-member" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Current Member</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#previous-member" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">Previous Member</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content panel m-0 rounded-0 p-3">
                <div class="tab-pane fade active show" id="current-member">
                    <div class="panel-heading-btn">
                        <br>
                        <a href="javascript:;" data-bs-toggle="modal" id="addProjectMemberButton" class="btn btn-primary">+ Add Project Member</a>
                        <a href="javascript:;" data-bs-toggle="modal" id="assignProjectMemberButton" class="btn btn-primary">+ Assign Location</a>
                    </div>
                    <br>
                    <div class="panel-body">
                        <table id="projectMemberTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%" data-orderable="false" class="align-middle">Action</th>
                                    <th class="text-nowrap">Project Member Name</th>
                                    <th class="text-nowrap">Designation</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Branch</th>
                                    <th class="text-nowrap">Unit</th>
                                    <th class="text-nowrap">Joined Date</th>
                                    <th class="text-nowrap">Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($projectMembers)
                                    @foreach ($projectMembers as $projectMember)
                                        <tr>
                                            <td width="1%"><a data-bs-toggle="modal" data-id="{{$projectMember->id}}" id="editProjectMemberButton" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a></td>
                                            <td>{{$projectMember->employeeName}}</td>
                                            <td>{{$projectMember->designation}}</td>
                                            <td>{{$projectMember->department}}</td>
                                            <td>{{$projectMember->branch}}</td>
                                            <td>{{$projectMember->unit}}</td>
                                            <td>{{$projectMember->joined_date}}</td>
                                            <td><a href="/projectAssignView/{{$projectMember->id}}">view</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-white btnPrevious">Back</a>
                        <a class="btn btn-primary btnNext">Next</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="previous-member">
                    <br>
                    <div class="panel-body">
                        <table id="projectMemberPrevTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%" data-orderable="false" class="align-middle">Action</th>
                                    <th class="text-nowrap">Project Member Name</th>
                                    <th class="text-nowrap">Designation</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Branch</th>
                                    <th class="text-nowrap">Unit</th>
                                    <th class="text-nowrap">Joined Date</th>
                                    <th class="text-nowrap">Exit Date</th>
                                    <th class="text-nowrap">Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($previousProjectMembers)
                                @foreach ($previousProjectMembers as $projectMember)
                                    <tr>
                                        <td width="1%"><a data-bs-toggle="modal" data-id="{{$projectMember->id}}" id="editPreviousProjectMemberButton" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a></td>
                                        <td>{{$projectMember->employeeName}}</td>
                                        <td>{{$projectMember->designation}}</td>
                                        <td>{{$projectMember->department}}</td>
                                        <td>{{$projectMember->branch}}</td>
                                        <td>{{$projectMember->unit}}</td>
                                        <td>{{$projectMember->joined_date}}</td>
                                        <td>{{$projectMember->exit_project_date}}</td>
                                        <td><a href="/projectAssignView/{{$projectMember->id}}">view</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-white btnPrevious">Back</a>
                        <a class="btn btn-primary btnNext">Next</a>

                    </div>

                </div>

            </div>
            <br><br>
        </div>

    </div>
</div>

@include('modal.project.addMemberProject')
@include('modal.project.assignProjectLocation')
@include('modal.project.updateProjectMember')
@include('modal.project.viewAssignCurrentMemberLocation')
@include('modal.project.viewAssignPreviousMemberLocation')
