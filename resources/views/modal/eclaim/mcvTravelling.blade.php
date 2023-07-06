<div class="modal fade" id="travelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Daily Travelling Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <div class="col-md-12">
                        <div class="row p-2  d-flex justify-content-end">
                            <div class="col-md-2 d-flex justify-content-end">
                                <label class="form-label">Date</label>
                            </div>
                            <div class="col-md-2">
                                    <input type="text" class="form-control" readonly value='YYYY-MM-DD'>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            {{-- <th>Action</th> --}}
                            <th class="text-nowrap">Start Time</th>
                            <th class="text-nowrap">End Time</th>
                            <th class="text-nowrap">Start Location</th>
                            <th class="text-nowrap">Destination</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Type Of Transport </th>
                            <th class="text-nowrap">Mileage( KM )</th>
                            <th class="text-nowrap">Petrol/fares</th>
                            <th class="text-nowrap">Tolls</th>
                            <th class="text-nowrap">Parking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a href="javascript:;" id="travelBtn" data-id="" class="dropdown-item"> Update</a>
                            </td> --}}
                            <td>00:00:00</td>
                            <td>00:00:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>RM0.00</td>
                            <td>RM0.00</td>
                            <td>RM0.00</td>
                            <td>RM0.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" style="text-align:right">Total</td>
                            <td>167KM</td>
                            <td>RM60.00</td>
                            <td>RM30.00</td>
                            <td>RM14.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

{{-- FILE ATTACHMENT MODAL --}}

<div class="modal fade" id="travellingAttachment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Travelling Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="">
                <div class="">
                    <div class="row p-2">
                        <div class="">
                            <table id="" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">File Name</th>
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="" target="_blank"></a><br>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

