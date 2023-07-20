<div class="modal fade" id="travelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1200px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Daily Travelling Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row p-2">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-12">
                        <div class="row p-2">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2 d-flex justify-content-end">
                                <label class="form-label">Date</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="travel_date" class="form-control" readonly value=''>
                            </div>
                        </div>
                    </div>
                </div>

                <table id="tableTravelling" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr style="text-align:center">
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Start Time</th>
                            <th class="text-nowrap">End Time</th>
                            <th class="text-nowrap">Start Location</th>
                            <th class="text-nowrap">Destination</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Type Of Transport </th>
                            <th class="text-nowrap">Mileage (KM)</th>
                            <th class="text-nowrap">Petrol/fares</th>
                            <th class="text-nowrap">Tolls&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th class="text-nowrap">Parking&nbsp;&nbsp;</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align:center">
                            <td>
                                <input class="form-check-input" type="checkbox" id="checkbox1" checked />   
                            </td>
                            <td id="start_time">00:00:00</td>
                            <td id="end_time">00:00:00</td>
                            <td id="location_start" style="cursor:pointer;" title="Start Address data">Edaran Office</td>
                            <td id="location_address" style="cursor:pointer;" title="Destination Address data">KLIA 2</td>
                            <td id="desc">meeting with client</td>
                            <td id="type_transport">Personal Car</td>
                            <td id="millage">167.5KM</td>
                            <td id="petrol">RM50.00</td>
                            <td id="toll">RM50.00</td>
                            <td id="parking">RM50.00</td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a id="" class="dropdown-item"> Edit</a>
                                <a id="" class="dropdown-item"> Delete</a>
                                <a id="" class="dropdown-item"> Challenge Route</a>
                            </td>
                        </tr>
                        <tr style="text-align:center">
                            <td>
                                <input class="form-check-input" type="checkbox" id="checkbox1" checked />   
                            </td>
                            <td id="start_time">00:00:00</td>
                            <td id="end_time">00:00:00</td>
                            <td id="location_start" style="cursor:pointer;" title="Start Address data">Edaran Office</td>
                            <td id="location_address" style="cursor:pointer;" title="Destination Address data">KLIA 2</td>
                            <td id="desc">meeting with client</td>
                            <td id="type_transport">Personal Car</td>
                            <td id="millage">167.5KM</td>
                            <td id="petrol">RM50.00</td>
                            <td id="toll">RM50.00</td>
                            <td id="parking">RM50.00</td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a id="" class="dropdown-item"> Edit</a>
                                <a id="" class="dropdown-item"> Delete</a>
                                <a id="" class="dropdown-item"> Challenge Route</a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Check</button>
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
                                        <th class="text-nowrap">No</th>
                                        <th class="text-nowrap">File Name</th>
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
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

{{-- SUBSISTENCE MODAL --}}
<div class="modal fade" id="subsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Daily Subsistence Allowance & Accommodation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2" >
                    <div class="col-md-3">
                        <label class="form-label">Claim for</label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="listofCA" name="">
                            <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                            <option value="1">With Cash Advance</option>
                            <option value="2">Without Cash Advance</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="lists" style="display:none">
                    <div class="form-control">
                        <div class="row p-2">
                            <div class="col">
                                <label class="form-label">List of Cash Advance</label>
                            </div>
                        </div>
                        <div class="row p-2">
                            <table class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Checked</th>
                                        <th>Form ID</th>
                                        <th>Type of Cash Advance</th>
                                        <th>Travel Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center">
                                        <td>
                                            <input class="form-check-input" type="checkbox" id="checkbox1" checked />   
                                        </td>
                                        <td>CA 13</td>
                                        <td>Project (Outstation)</td>
                                        <td>2023-01-07 - 2023-01-09</td>
                                        <td>RM 400.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br> 
                <form id="updateSubsMtc">
                    <div class="form-control">
                        <div class="row p-2">
                            <div class="row p-2">
                                <label class="form-label">Travel Date and Time</label>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">Start Date</label>
                                                </div>
                                                <div class="col">
                                                    <!-- <input type="hidden" name="id" id="claim_id" class="form-control" readonly value=''> -->
                                                    <input type="text" id="" class="form-control" readonly value=''>
                                                    <!-- <input type="hidden" name="general_id" class="form-control" value="" id="general_id_subs"> -->
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">Start Time</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" readonly value=''>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">End Date</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" id="" class="form-control" readonly value=''>
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">End Time</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" id="time2" class="form-control" readonly value=''>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Travel Duration</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="" class="form-control" readonly value=''>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Project</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="project1" class="form-control" readonly value=''>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Description</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="desc_update" readonly rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-control">
                                        <div class="row p-2">
                                            <label class="form-label">Subsistence Allowance</label>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-2">
                                                <label class="form-label">Breakfast</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input  type="text" class="form-control" readonly value="" id="breakfast">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">X</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" readonly value="0" id="DBFUpdate">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">=</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly id="totalbfUpdate">
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-2">
                                                <label class="form-label">Lunch</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input  type="text" class="form-control" readonly value="" id="lunch">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">X</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" readonly value="0" id="DLHUpdate">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">=</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly id="totallhUpdate">
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-2">
                                                <label class="form-label">Dinner</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input  type="text" class="form-control" readonly value="" id="dinner">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">X</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" readonly value="0" id="DDNUpdate">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">=</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly id="totaldnUpdate">
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Total (A)</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">=</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input readonly type="text" class="form-control" value="0" id="total_subs">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-control">
                                            <div class="row p-2">
                                                <label class="form-label">Accommodation</label>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-2">
                                                    <label class="form-label">Hotel</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" class="form-control" value="" id="hotel" />
                                                </div>

                                                <div class="col-md-1">
                                                    <label class="form-label">X</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="hotel" class="form-control" id="hnUpdate" value="0">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" readonly id="hnTotalUpdate" value="0">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-2" id="lodgingc">
                                                    <label class="form-label">Lodging</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" class="form-control" readonly value="" id="lodging" />
                                                </div>
                                                <div class="col-md-2" style="display: none">
                                                    <input readonly type="text" class="form-control" id="lodgingcv1" value="0">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">X</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="lodging" class="form-control" value="0" id="lnUpdate">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" readonly class="form-control" id="lnTotalUpdate" value="0">
                                                </div>
                                            </div>

                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-1">

                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Total (B)</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input readonly type="text" class="form-control" value="0" id="total_acc">
                                                </div>
                                            </div>
                                            <div class="row p-2">

                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Total (A+B)</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input readonly type="text" name="total" class="form-control" value="" id="total2Update">
                                                </div>
                                            </div>
                                            
                                            <div class="row p-2">
                                                <div class="col md-3">
                                                    <label for="file">Supporting Document</label>
                                                </div><div class="col md-3">
                                                    <label for="file"></label>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"  id="laundrydivUpdate">
                                <div class="col-md-6">
                                    <div class="form-control">
                                        <div class="row p-2">
                                            <label class="form-label">Laundry Allowance</label>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Amount</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" name="" id="laundry_amount_update"class="form-control" placeholder="0.00">
                                            </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Description</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" name="" id="laundry_desc_update" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" style="color: black" data-bs-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Check</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- FILE ATTACHMENT MODAL --}}

<div class="modal fade" id="subsistenceAttachment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subsistence Allowance & Accommodation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="updateSubsAttachment">
                    <div class="">

                        <div class="row p-2">
                            <div class="">
                                <table id="" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">File Name</th>
                                            <th class="text-nowrap">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
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

{{-- OTHERS --}}
<div class="modal fade" id="othersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Others</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="updateOtherMtc">
                <div class="">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Claim Category</label>
                        </div>
                        <div class="col-md-8">
                            <input readonly type="text" class="form-control" value="" id="claim_category">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Amount</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="RM0.00" id="amount">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="claim_desc" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Supporting Document</label>
                        </div>
                        <div class="col-md-8">
                            <a href="#" class="btn btn-link" id="file_upload2">File</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" style="color: black" data-bs-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Check</button>
                        </form>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////// -->


<!-- Modal amend -->
<div class="modal fade" id="modalamend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for Amendment</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="supervisorAmendForm">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State reason</label><br>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remark" placeholder="input reason"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="amendButton" data-id="{{ $general->id }}" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal reject -->
<div class="modal fade" id="modalreject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="supervisorRejectForm">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">State Reason</label><br>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="remark" rows="3" placeholder="input reason"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="rejectButton" data-id="{{ $general->id }}" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
