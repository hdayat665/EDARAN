<div class="tab-pane fade" id="tab2">
    <h3 class="mt-10px"></i>Previous Project Manager</h3>
    <div class="panel-body">
        <table id="data-table-prevproject" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th class="text-nowrap">Project Manager Name</th>
                    <th class="text-nowrap">Designation</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Branch</th>
                    <th class="text-nowrap">Unit</th>
                    <th class="text-nowrap">Join Date</th>
                    <th class="text-nowrap">Exit Date</th>
                </tr>
            </thead>
            <tbody>
                @if ($previousProjectManagers)
                @foreach ($previousProjectManagers as $previousProjectManager)
                <tr>
                    <th>{{$previousProjectManager->employeeName}}</th>
                    <th>{{($previousProjectManager->designation) ? getDesignation($previousProjectManager->designation)->designationName : '-' }}</th>
                    <th>{{($previousProjectManager->department) ? getDepartment($previousProjectManager->department)->departmentName : '-' }}</th>
                    <th>{{($previousProjectManager->branch) ? getBranch($previousProjectManager->branch)->branchName : '-' }}</th>
                    <th>{{($previousProjectManager->unit) ? getUnit($previousProjectManager->unit)->unitName : '-' }}</th>
                    <th>{{$previousProjectManager->join_date}}</th>
                    <th>{{$previousProjectManager->exit_date}}</th>
                    @endforeach
                </tr>
                @endif

            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a class="btn btn-white btnPrevious">Back</a>
        <a class="btn btn-primary btnNext">Next</a>
    </div>
</div>

@include('modal.project.viewAssignPreviousMemberLocation')
