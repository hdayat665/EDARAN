<div class="tab-pane fade" id="tab2">
    <h3 class="mt-10px"></i>Previous Project Manager</h3>
    <div class="panel-body">
            <table id="data-table-prevproject" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">No.</th>
                        <th class="text-nowrap">Project Manager Name</th>
                        <th class="text-nowrap">Designation</th>
                        <th class="text-nowrap">Department</th>
                        <th class="text-nowrap">Branch</th>
                        <th class="text-nowrap">Unit</th>
                        <th class="text-nowrap">Joined Date</th>
                        <th class="text-nowrap">Exit Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($previousProjectManagers)
                    @foreach ($previousProjectManagers as $key => $previousProjectManager)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$previousProjectManager->employeeName}}</td>
                        <td>{{($previousProjectManager->designation) ? getDesignation($previousProjectManager->designation)->designationName : '-' }}</td>
                        <td>{{($previousProjectManager->department) ? getDepartment($previousProjectManager->department)->departmentName : '-' }}</td>
                        <td>{{($previousProjectManager->branch) ? getBranch($previousProjectManager->branch)->branchName : '-' }}</td>
                        <td>{{($previousProjectManager->unit) ? getUnit($previousProjectManager->unit)->unitName : '-' }}</td>
                        <td>{{$previousProjectManager->join_date}}</td>
                        <td>{{$previousProjectManager->exit_date}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
    </div>

    <div class="modal-footer">
         <a class="btn btn-white me-5px btnPrevious">Previous</a>
            <a class="btn btn-white me-5px btnNext">Next</a>
    </div>
</div>


@include('modal.project.viewAssignPreviousMemberLocation')
