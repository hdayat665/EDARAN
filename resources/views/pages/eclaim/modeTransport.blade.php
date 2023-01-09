<div class="MOT" style="display:none">
    <div class="form-control">
        <div class="row p-2">
            <div class="col-md-4">
                <label class="form-label">Mode Of Transport</label>
            </div>
            <div class="col-md-8">
                <select class="form-select" id="SMOT">
                    <option class="form-label" value="1" selected>Please Select
                    </option>
                    <option class="form-label" value="2">Personal Car</option>
                    <option class="form-label" value="3">Personal Motorcycle</option>
                    <option class="form-label" value="4">Public Transport </option>
                    <option class="form-label" value="5">Company Car</option>
                    <option class="form-label" value="6">Carpool</option>
                </select>
            </div>
        </div>
        <!-- For Personal Car/Personal Motorcycle/Company Car -->
        <div class="SAC" style="display: none">
            <div class="subacco">
                <div class="row p-2">
                    <div class="col-md-4">
                        <label class="form-label">Subsistance Allowance :</label>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-1"> </div>
                    <div class="col-md-2">
                        <label class="form-label">Day</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="day" value="0">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">X</label>
                    </div>
                    <div class="col-md-3">
                        {{-- <input readonly value="Malaysia" type="text" class="form-control"> --}}
                        <select class="form-select">
                            <option class="form-label" value="" selected>Malaysia
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="subs" value="60" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-2">
                        <label class="form-label"></label>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label"></label>
                    </div>
                    <div class="col-md-2"> </div>
                    <div class="col-md-1">
                        <label class="form-label"></label>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Total</label>
                    </div>
                    <div class="col-md-3">
                        <input readonly type="text" class="form-control" id="totalsubs" value="0">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-4">
                        <label class="form-label">Accommodation :</label>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-1"> </div>
                    <div class="col-md-2">
                        <label class="form-label">Night</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="night" value="0">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">X</label>
                    </div>
                    <div class="col-md-3">
                        {{-- <input readonly value="Hotel" type="text" class="form-control"> --}}
                        <select class="form-select">
                            <option class="form-label" value="" selected>Hotel
                            </option>
                            <option class="form-label" value="">Lodging</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="acco" value="350" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-2">
                        <label class="form-label"></label>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label"></label>
                    </div>
                    <div class="col-md-2"> </div>
                    <div class="col-md-1">
                        <label class="form-label"></label>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Total</label>
                    </div>
                    <div class="col-md-3">
                        <input readonly type="text" class="form-control" id="totalacco" value="0">
                    </div>
                </div>
            </div>
        </div>
        <div class="TE" style="display: none">
            <div class="row p-2">
                <div class="col-md-3">
                    <label class="form-label">Travel Expenses</label>
                </div>
            </div>
        </div>
        <div class="FF" style="display: none">
            <div class="row p-2">
                <div class="col-md-2">
                    <label class="form-label"></label>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Fuel/Fare</label>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="fuelfare" value="0">
                </div>
            </div>
        </div>
        <div class="TP" style="display: none">
            <div class="row p-2">
                <div class="col-md-2">
                    <label class="form-label"></label>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Toll/Parking</label>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="tollparking" value="0">
                </div>
            </div>
        </div>
        <div class="ENTT" style="display: none">
            <div class="row p-2">
                <div class="col-md-2">
                    <label class="form-label"></label>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Entertainment</label>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="ent" value="0">
                </div>
            </div>
        </div>
        <div class="TE" style="display: none">
            <div class="row p-2">
                <div class="col-md-2">
                    <label class="form-label"></label>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Total</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" id="totalexp" value="0">
                </div>
            </div>
        </div>
        <div class="MPO" style="display: none">
            <div class="row p-2">
                <div class="col-md-2">
                    <label class="form-label"></label>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Maximum Paid Out (75%)</label>
                </div>
                <div class="col-md-3">
                    <input readonly type="text" class="form-control" id="maxpaid">
                </div>
            </div>
        </div>
        {{-- <div class="SV" style="display: none">
                    <div class="row p-2">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" >Save1</button>
                        </div>
                    </div>
                </div> --}}
    </div>
    <!--  END For Carpool -->
</div>
