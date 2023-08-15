{{-- CASH ADVANCE LESS MODAL --}}
<div class="modal fade" id="CAlessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1400px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Cash Advance (Less)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="">
                <div class="">
                    <div class="row p-2">
                        <div class="">
                            <table id="" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr style="text-align:center">
                                        <th class="text-nowrap">Checked</th>
                                        <th class="text-nowrap">No</th>
                                        <th class="text-nowrap">Form ID</th>
                                        <th class="text-nowrap">Type of Cash</th>
                                        <th class="text-nowrap">Travel Date</th>
                                        <th class="text-nowrap">Applied Amount</th>
                                        <th class="text-nowrap">Used Amount</th>
                                        <th class="text-nowrap">Final Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center">
                                        <!-- <td>
                                            <input class="form-check-input" type="checkbox" id="checkbox1" checked />   
                                        </td> -->
                                        <td>
                                            <input class="form-check-input" type="checkbox" id="checkbox1" checked/>   
                                        </td>
                                        <td>1</td>
                                        <td>OTHER (NON OUTSTATION)</td>
                                        <td>30/05/20223 - 01/06/2023</td>
                                        <td>RM 1000</td>
                                        <td>RM 0</td>
                                        <td>RM 0</td>
                                        <td>RM 0</td>
                                    </tr>
                                    <tr style="text-align:center">
                                        <td>
                                            <input class="form-check-input" type="checkbox" id="checkbox1" checked/>   
                                        </td>
                                        <td>1</td>
                                        <td>OTHER (NON OUTSTATION)</td>
                                        <td>30/05/20223 - 01/06/2023</td>
                                        <td>RM 1000</td>
                                        <td>RM 0</td>
                                        <td>RM 0</td>
                                        <td>RM 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

{{-- TRAVEL MODAL --}}
<div class="modal fade" id="travelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1400px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Daily Travelling Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row p-2">
            <form id="checkedform"> 
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
                                <input type="text" id="date" class="form-control" readonly value=''>
                                <input type="hidden" id="id" class="form-control" readonly value=''>
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
                        <!-- <tbody id="tableRowTravelling">

                        </tbody> -->
                        <tbody id="tableRowTravelling">

                        </tbody>

                    </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                <a  class="btn btn-primary" id="checkedBtn" data-bs-dismiss="modal">Check</a>
                </form>
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
                                        <th>Action</th>
                                        <th class="text-nowrap">File Name</th>
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($travelAttachments)
                                        @foreach ($travelAttachments as $attachment)
                                        <tr>    
                                            <td>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                                <div class="dropdown-menu">
                                                <a  id="deleteButtonTravelAttachment" data-id="{{ $attachment->id }}" class="dropdown-item">Delete</a>
                                            </td>
                                            <td>
                                                @if(!empty($attachment->file_upload))
                                                @php
                                                $filenames = explode(',', $attachment->file_upload);
                                                @endphp
                                                @foreach($filenames as $filename)
                                                <a href="/storage/MtcAttachment/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                                @endforeach
                                                    @endif
                                            </td>
                                            <td>{{ $attachment->desc ?? 'N/A' }}</td>
                                        </tr> 
                                        @endforeach
                                    @endif
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </form>
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
                <!-- <div class="row p-2" >
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
                </div> -->
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
                                                    <input type="hidden" name="id" id="claim_id" class="form-control" readonly value=''>
                                                    <input type="text" id="start_date_update" class="form-control" readonly value=''>
                                                    <input type="hidden" name="general_id" class="form-control" value="" id="general_id_subs">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">Start Time</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" id="start_time_update" class="form-control" readonly value=''>
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
                                                    <input type="text" id="end_date_update" class="form-control" readonly value=''>
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">End Time</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" id="end_time_update" class="form-control" readonly value=''>
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
                                            <input type="text" id="travel_duration_update" class="form-control" readonly value=''>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <label class="form-label">Project</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="project_update" class="form-control" readonly value=''>
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
                                                <input  type="text" class="form-control" readonly value="{{ $food[0]['breakfast'] }}" readonly value="" id="BFUpdate">
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
                                                <input  type="text" class="form-control" readonly value="{{ $food[0]['lunch'] }}" id="LHUpdate">
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
                                                <input  type="text" class="form-control" readonly value="{{ $food[0]['dinner'] }}" id="DNUpdate">
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
                                                <input readonly type="text" class="form-control" value="0" id="TSUpdate">
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
                                                <div class="col-md-2" id="hotelc">
                                                    <label class="form-label">Hotel</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input  type="hidden" class="form-control" value="{{ $food[0]['local_hotel_value'] }}" id="hotelcvUpdateHide">
                                                    <input type="number"  readonly id="hotelCvModal" class="form-control" value="{{ $food[0]['local_hotel_value'] }}"  />
                                                </div>
                                                
                                                <div class="col-md-1">
                                                    <label class="form-label">X</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="hotel" class="form-control" readonly id="hnUpdate" value="0">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="hotel_value" class="form-control"  id="hotelcvUpdate" value="0">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-2" id="lodgingc">
                                                    <label class="form-label">Lodging</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" class="form-control" readonly value="{{ $food[0]['lodging_allowance_value'] }}" id="lodgingcvUpdate" />
                                                </div>
                                                <div class="col-md-2" style="display: none">
                                                    <input readonly type="text" class="form-control" id="lodgingcv1" value="0">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">X</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="lodging" readonly class="form-control" value="0" id="lnUpdate">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="lodging_value"  class="form-control" id="lnTotalUpdate" value="0">
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
                                                    <input readonly type="text" name="total_acc" class="form-control" value="0" id="TAVUpdate">
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
                                            <!-- <div class="row p-2">
                                                <div class="col md-3">
                                                    <label for="file">Supporting Document</label>
                                                </div><div class="col md-3">
                                                    <label for="file"></label>
                                                    <br>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2"  id="laundrydivUpdate">
                                <div class="row">
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
                                                    <input type="number" name="laundry_amount" id="laundry_amount_update"class="form-control" placeholder="0.00">
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
                                                <!-- <div class="row p-2">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Supporting Document</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control-file" name="file_laundry[]" id="" multiple>
                                                        <a id="file_laundry_updat  </form>e" href="#"></a>
                                                    </div> 
                                                </div> -->
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" style="color: black" data-bs-dismiss="modal">Back</button>
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Edit</button> -->
                        {{-- <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Check</button> --}}
                        <button type="submit" id="updateSubsMtcBtn" class="btn btn-primary">Update</button>
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
                                    <?php $id = 0 ?>
                                        @if ($travelAttachments)
                                            @foreach ($travelAttachments as $attachment)
                                            <?php $id++ ?>
                                            <tr>    
                                                <td>{{$id}}</td>
                                                <td>
                                                    @if(!empty($attachment->file_upload))
                                                    @php
                                                    $filenames = explode(',', $attachment->file_upload);
                                                    @endphp
                                                    @foreach($filenames as $filename)
                                                    <a href="/storage/MtcAttachment/{{ $filename }}" target="_blank">{{ $filename }}</a><br>
                                                    @endforeach
                                                        @endif
                                                </td>
                                                <td>{{ $attachment->desc ?? 'N/A' }}</td>
                                            </tr> 
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

{{-- OTHERS --}}
<div class="modal fade" id="othersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Others</h5>
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
                                <input type="hidden" name="id" class="form-control" value="" id="claim_id_other">
                                <input type="hidden" name="general_id" class="form-control" value="" id="general_id_other">
                                <input readonly type="text"  class="form-control" value="" id="claim_category_update">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Amount</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="amount" class="form-control" value="" id="amount_other_update">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" name="claim_desc" id="desc_other_update" rows="4"></textarea>
                            </div>
                        </div>
                        <!-- <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">File Upload</label>
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control-file" name="file_upload[]" id="" multiple>
                            </div>
                        </div> -->

                        <div class="modal-footer"> 
                            <!-- <button type="button" class="btn btn-secondary">Reset</button> -->
                            <button type="submit" id="updateOtherMtcBtn" class="btn btn-primary">Update</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewCa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1200px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Cash Advance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="viewCaForm">
                    <div class="">
                        <input readonly type="hidden" value="{{ isset($GNC['id']) ? $GNC['id'] : '' }}" name="id" class="form-control">
                        <div class="row p-2">
                            <div class="">
                            <table id="claimtable" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Form ID</th>
                                            <th class="text-nowrap">Type of Cash Advance
                                            </th>
                                            <th class="text-nowrap">Travel Date</th>
                                            <th class="text-nowrap">Applied Amount</th>
                                            <th class="text-nowrap">Used Amount</th>
                                            <th class="text-nowrap">Final Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($cashAdvances as $cashAdvance)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Form ID {{ $cashAdvance->id }}</td>
                                                <td> {{ getCashAdvanceType($cashAdvance->type) }}</td>
                                                <td> {{ $cashAdvance->travel_date }}</td>
                                                <td>RM {{ $cashAdvance->amount }}</td>
                                                <td>RM {{ $cashAdvance->used_amount ?? 0}} </td>
                                                <td>RM {{ $cashAdvance->final_amount ?? 0 }}</td>
                                            </tr>
                                        @endforeach
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