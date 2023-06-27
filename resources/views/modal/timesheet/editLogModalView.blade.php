<div class="modal fade" id="editlogmodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="datelog"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addChildrenForm">
                    <div class="row p-2">
                        <table id="" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Type of Log</th>
                                    <th class="text-nowrap">Date</th>
                                    <th class="text-nowrap">Start Time</th>
                                    <th class="text-nowrap">End Time</th>
                                    <th class="text-nowrap">Total Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td id="type_of_log"></td>
                                    <td id="date"></td>
                                    <td id="start_time"></td>
                                    <td id="end_time"></td>
                                    <td id="total_hour"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row p-2">
                        <table id="" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Office Log</th>
                                    <th class="text-nowrap">My Project</th>
                                    <th class="text-nowrap">Activity Name</th>
                                    <th class="text-nowrap">Project Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td id="office_log" ></td>
                                    <td id="my_project" ></td>
                                    <td id="activity_name"></td>
                                    <td id="location"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <label for="Description" class="form-label">Description</label>
                            <textarea class="form-control" id="desc" readonly rows="5"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
