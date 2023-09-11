<style>
    @media screen and (min-width: 1000px) {
        .modal-dialog {
            max-width: 800px;
            /* New width for default modal */
        }
    }

    table {
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
                    <a href="#current-member" data-bs-toggle="tab" id="current_mem" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Current Member</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#previous-member" data-bs-toggle="tab" id="previous_mem" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">Previous Member</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content panel m-0 rounded-0 p-3">
                <div class="tab-pane fade active show" id="current-member">
                    <div class="panel-heading-btn">
                        <br>
                        @if (!in_array('pmc', $role_permission))
                            <a href="javascript:;" data-bs-toggle="modal" id="addProjectMemberButton"
                                data-id="{{ $project->id }}" class="btn btn-primary">+ Add Project Member</a>
                            <a href="javascript:;" data-bs-toggle="modal" id="assignProjectMemberButton"
                                class="btn btn-primary">+ Assign Location</a>
                        @endif
                    </div>
                    <br>
                    <div class="panel-body">
                        <table id="projectMemberTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
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
                                    @foreach ($projectMembers as $key => $projectMember)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td width="1%">
                                                @if (!in_array('pmc', $role_permission))
                                                    <a data-bs-toggle="modal" data-id="{{ $projectMember->id }}"
                                                        id="editProjectMemberButton" class="btn btn-primary"><i
                                                            class="fa fa-cogs"></i> Edit</a>
                                                @endif
                                            </td>
                                            <td>{{ $projectMember->employeeName }}</td>
                                            <td>{{ $projectMember->designation ? getDesignation($projectMember->designation)->designationName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->department ? getDepartment($projectMember->department)->departmentName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->branch ? getBranch($projectMember->branch)->branchName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->unit ? getUnit($projectMember->unit)->unitName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->joined_date }}</td>
                                            <!-- <td><a href="/projectAssignView/{{ $projectMember->id }}">view</a></td> -->
                                            <td><a href="/projectAssignView/{{ $projectMember->id }}"
                                                    class="btn btn-primary"> View </a></td>

                                        </tr>
                                    @endforeach
                                @endif

                                <!-- if dont want duplicate
                            @if ($projectMembers)
@foreach ($projectMembers->unique('employee_id') as $projectMember)
<tr>
                                        <td width="1%">
                                            <a data-bs-toggle="modal" data-id="{{ $projectMember->id }}" id="editProjectMemberButton" class="btn btn-outline-green">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td>{{ $projectMember->employeeName }}</td>
                                        <td>{{ $projectMember->designation ? getDesignation($projectMember->designation)->designationName ?? '-' : '-' }}</td>
                                        <td>{{ $projectMember->department ? getDepartment($projectMember->department)->departmentName ?? '-' : '-' }}</td>
                                        <td>{{ $projectMember->branch ? getBranch($projectMember->branch)->branchName ?? '-' : '-' }}</td>
                                        <td>{{ $projectMember->unit ? getUnit($projectMember->unit)->unitName ?? '-' : '-' }}</td>
                                        <td>{{ $projectMember->joined_date }}</td>
                                        <td><a href="/projectAssignView/{{ $projectMember->id }}" class="btn btn-primary"> View </a></td>
                                    </tr>
@endforeach
@endif -->
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="previous-member">
                    <br>
                    <div class="panel-body">
                        <table id="projectMemberPrevTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
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
                                    @foreach ($previousProjectMembers as $key => $projectMember)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $projectMember->employeeName }}</td>
                                            <td>{{ $projectMember->designation ? getDesignation($projectMember->designation)->designationName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->department ? getDepartment($projectMember->department)->departmentName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->branch ? getBranch($projectMember->branch)->branchName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->unit ? getUnit($projectMember->unit)->unitName ?? '-' : '-' }}
                                            </td>
                                            <td>{{ $projectMember->joined_date }}</td>
                                            <td>{{ $projectMember->exit_project_date }}</td>
                                            <td><a href="/projectAssignView/{{ $projectMember->id }}">View</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-white me-5px btnPrevious">Previous</a>
                    <!-- {{-- <a href="javascript:;" class="btn btn-primary btnNext">Save</a> --}} -->
                    <!-- <button id="submitMember" class="btn btn-primary btnNext">vhh</button> -->

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
