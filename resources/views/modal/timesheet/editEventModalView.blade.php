<div class="modal fade" id="editeventmodal" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dateevent"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="row p-2">
                        <table id="" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Event Name</th>
                                    <th class="text-nowrap">Start Date</th>
                                    <th class="text-nowrap">End Date</th>
                                    <th class="text-nowrap">Start Time</th>
                                    <th class="text-nowrap">End Time</th>
                                    <th class="text-nowrap">Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td id="event_name"></td>
                                    <td id="start_date"></td>
                                    <td id="end_date"></td>
                                    <td id="start_time_event"></td>
                                    <td id="end_time_event"></td>
                                    <td id="duration"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row p-2">
                        <table id="" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Location</th>
                                    <th class="text-nowrap">Project</th>
                                    <th class="text-nowrap">Priority</th>
                                    {{-- <th class="text-nowrap">Recurring</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td id="location_event"></td>
                                    <td id="project_event"></td>
                                    <td id="priority"></td>
                                    {{-- <td id="recurring"></td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <label for="issuing-country" class="form-label">Description*</label>
                            <textarea class="form-control" id="desc_event" rows="3" readonly></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-2">
                            <label for="firstname" class="form-label">Status: <td><span id="attendStatus"></span></td></label>
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label">Attach File:</label><br>
                            <span id="file_upload"></span>
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label">Reminder:</label>
                            <label class="form-label" id="reminder"></label>
                        </div>
                    </div>
                    <div class="row p-2">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
