<div class="modal fade" id="travelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Daily Travelling Log</h5>
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
                                <input type="text" id="date" class="form-control" readonly value=''>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="addForm">

                <table id="tableTravelling" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Action</th>
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
            <tbody id="tableRowTravelling">

            </tbody>
            
        </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="subsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Daily Subsistence Allowance & Accommodation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row p-2">
                            <div class="row p-2">
                                <label class="form-label">Travel date and time</label>
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
                                                    <input type="text" id="start_date_update" class="form-control" readonly value=''>
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
                                                <input  type="text" class="form-control" readonly value="{{ $food[0]['breakfast'] }}" id="BFUpdate">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="form-label">X</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="" readonly value="0" id="DBFUpdate">
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
                                                <input type="text" name="lunch" class="form-control" readonly value="0" id="DLHUpdate">
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
                                                <input type="text" name="dinner" class="form-control" readonly value="0" id="DDNUpdate">
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
                                                <input readonly type="text" name="total_subs" class="form-control" value="0" id="TSUpdate">
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
                                                    <input type="number" class="form-control" value="" id="hotelcvUpdate" />
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
                                                    <input type="text" name="hotel" class="form-control" id="hnTotal" value="0">
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
                                                    <input type="text" name="lodging" class="form-control" value="0" id="lnUpdate">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="hotel" class="form-control" id="lnTotal" value="0">
                                                </div>
                                            </div>
                                            
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <input type="file" class="form-control-file" name="file_upload[]" id="supportdocument" multiple>
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
                                                
                                                <div class="col-md-8">
                                                    <label class="form-label">Total Subsistence Allowance & Accommodation (A+B)</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">=</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input readonly type="text" name="total" class="form-control" value="" id="total2Update">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Subsistence
                                    Allowance:</label>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Breakfast</label>
                            </div>
                            <div class="col-md-2">
                                <input  type="text" class="form-control" readonly value="{{ $food[0]['breakfast'] }}" id="BF">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X day</label>
                            </div>
                            <div class="col-md-2"> 
                                <input type="text" class="form-control" name="breakfast" value="0" id="DBF">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4"> </div>
                            <div class="col-md-2">
                                <label class="form-label">Lunch</label>
                            </div>
                            <div class="col-md-2">
                                <input  type="text" class="form-control" readonly value="{{ $food[0]['lunch'] }}" id="LH">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X day</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="lunch" class="form-control" value="0" id="DLH">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Dinner</label>
                            </div>
                            <div class="col-md-2">
                                <input  type="text" class="form-control" readonly value="{{ $food[0]['dinner'] }}" id="DN">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X day</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="dinner" class="form-control" value="0" id="DDN">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2"> </div>
                            <div class="col-md-2"> </div>
                            <div class="col-md-2">
                                (A) Total Subsistence
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" name="total_subs" class="form-control" value="0" id="TS">
                            </div>
                        </div> -->
                        <!-- <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Accommodation:</label>
                            </div>
                            <div class="col-md-2" id="hotelc">
                                <input class="form-check-input" type="checkbox" value="{{ $food[0]['local_hotel_value'] }}" id="htv" />
                                <label class="form-label">Hotel</label>
                            </div>
                            <div class="col-md-2">
                                <input  type="text" readonly class="form-control" id="hotelcv">
                            </div>
                            <div class="col-md-2" style="display: none">
                                <input  type="text" class="form-control"  id="hotelcv1" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X Night</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="hotel" class="form-control" id="hn" disabled value="0">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label"></label>
                            </div>
                            <div class="col-md-2" id="lodgingc">
                                <input class="form-check-input" type="checkbox" value="{{ $food[0]['lodging_allowance_value'] }}" id="ldgv" />
                                <label class="form-label">Lodging</label>
                            </div>
                            <div class="col-md-2">
                                <input  type="text" readonly class="form-control" id="lodgingcv">
                            </div>
                            <div class="col-md-2" style="display: none">
                                <input readonly type="text" class="form-control" id="lodgingcv1" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X Night</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="lodging" class="form-control" value="0" id="ln" disabled>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label"></label>
                            </div>
                            <div class="col-md-2"> <label class="form-label"></label>
                            </div>
                            <div class="col-md-2"> </div>
                            <div class="col-md-2">
                                <label class="form-label">(B) Total Accomodation</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" name="total_acc" class="form-control" value="0" id="TAV">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label"></label>
                            </div>
                            <div class="col-md-2"> <label class="form-label"></label>
                            </div>
                            <div class="col-md-2"> </div>
                            <div class="col-md-2">
                                <label class="form-label">(A+B) TOTAL</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" name="total" class="form-control" value="" id="total2">
                            </div>
                        </div> -->
                        <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                            <button type="submit" id="subsSaveButton" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="othersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Others</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Claim Category</label>
                            </div>
                            <div class="col-md-8">
                                <input readonly type="text" name="total" class="form-control" value="" id="claim_category_update">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Amount</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="total" class="form-control" value="" id="amount_other_update">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" id="desc_other_update" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">File Upload</label>
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control-file" name="file_upload[]" id="" multiple>
                            </div>
                        </div>

                        <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                            <button type="submit" id="subsSaveButton" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>