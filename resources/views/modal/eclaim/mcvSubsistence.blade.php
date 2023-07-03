{{-- SUBSISTENCE MODAL --}}

<div class="modal fade" id="subsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Daily Subsistence Allowance & Accommodation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="">
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
                                            <input  type="text" class="form-control" readonly value="" id="BFUpdate">
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
                                            <input  type="text" class="form-control" readonly value="" id="LHUpdate">
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
                                            <input  type="text" class="form-control" readonly value="" id="DNUpdate">
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
                                                <input  type="hidden" class="form-control" value="" id="hotelcvUpdateHide">
                                                <input type="number" name="hotel_value" class="form-control" value="" id="hotelcvUpdate" />
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
                                                <input type="number" class="form-control" readonly value="" id="lodgingcvUpdate" />
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

                                            <div class="col-md-6">
                                                <a id="file_upload" href="#"></a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary">Reset</button> -->
                        <button type="submit" id="updateSubsMtcBtn" class="btn btn-primary">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
