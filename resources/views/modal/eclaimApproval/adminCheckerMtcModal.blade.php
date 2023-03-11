<!-- Modal Travel claim -->
<div class="modal fade" id="modal-view-claim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Claim Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Travel Date</label>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="form-control" id="travelId">
                        <input type="text" readonly class="form-control" id="travel_date">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label col-form-label">Start Time</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="start_time">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">End Time</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="end_time">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label col-form-label">Total Hours</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="total_hour">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Description</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" readonly class="form-control" id="desc">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Reason Using Web</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" readonly class="form-control" id="reason">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Type of Transport</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="type_of_transport">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label col-form-label">Location Start</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="location_start">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Project</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Date" id="" value="{{ $travel->project_name ?? '-' }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Log Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Address Start</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" readonly class="form-control" id="address_start">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Destination</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="location_address">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Destination Address</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" readonly class="form-control" id="destination_address">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Milleage</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="millage">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label col-form-label">Toll</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="toll">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Petrol/Fares</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="petrol">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label col-form-label">Parking</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="parking">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Supporting Documents</label>
                    </div>
                    <div class="col-md-3">
                        <a href="/storage/{{ $travel->file_upload ?? '-' }}">{{ $travel->file_upload ?? '-' }}</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="checkTravel" class="btn btn-lime">Check</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Modal view subsistence -->
<div class="modal fade" id="modal-view-subsistence" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Claim Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <div class="col-md-2">
                        <label class="form-label col-form-label">Claim For</label>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" class="form-control" id="subsId">
                        <input type="text" readonly class="form-control" id="claim_for" placeholder="">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label col-form-label">Supporting Document</label>
                    </div>
                    <div class="col-md-4">
                        <a href="/storage/{{ $travel->file_upload ?? '-' }}">{{ $travel->file_upload ?? '-' }}</a>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        {{-- <input  type="text" class="form-control"> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Start Date</label>
                                    </div>
                                    <div class="col">
                                        {{-- <input type="text" class="form-control" placeholder="Date" id="" value="{{ $travel->start_date ? date('Y-m-d', strtotime($travel->start_date)) : '-' }}" readonly> --}}
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Start Time</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Date" id="" value="{{ $travel->start_time ?? '-' }}" readonly>
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
                                        {{-- <input type="text" class="form-control" placeholder="Date" id="" value="{{ date('Y-m-d', strtotime($travel->end_date)) ?? '-' }}" readonly> --}}
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label class="form-label">End Time</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Time" id="time2" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-2">
                        <label class="form-label col-form-label">Project</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Date" id="" value="{{ $travel->project_name ?? '-' }}" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-2">
                        <label class="form-label col-form-label">Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" readonly>{{ $travel->desc ?? '-' }}</textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Subsistence Allowance :</label>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Breakfast</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="breakfast">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Lunch</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="lunch">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Dinner</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="dinner">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Total Subsistence Allowance:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" name="" placeholder="" id="total_subs">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Accommodation :</label>
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Hotel</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="hotel">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Lodging</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="lodging">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Total Accomodation</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" name="" id="total_acc" placeholder="">
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label"></label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label col-form-label">Total</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" readonly class="form-control" name="" id="total" placeholder="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="checkSubs" class="btn btn-lime">Check</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal view personal -->
<div class="modal fade" id="modal-view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Claim Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Applied Date</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control" id="" value="{{ date('Y-m-d', strtotime($personal->created_at)) ?? '-' }}">
                        <input type="hidden" class="form-control" id="personalId">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Claim Category</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control" id="" value="{{ $personal->claim_catagory_name ?? '-' }}">
                    </div>
                </div>
                <!-- <div class="row p-2">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="labellingname" id="" readonly value="">
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control">
                    </div>
                </div> -->
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Amount</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control" id="amount">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Description</label>
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" rows="3" readonly>{{ $personal->claim_desc ?? '-' }}</textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <label class="form-label col-form-label">Supporting Document</label>
                    </div>
                    <div class="col-md-6">
                        <a href="/storage/{{ $personal->file_upload ?? '-' }}">{{ $personal->file_upload ?? '-' }}</a>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="checkPersonal" class="btn btn-lime">Check</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

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
