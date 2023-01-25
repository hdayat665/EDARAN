<div class="">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button bg-white-500 text-black px-3 py-10px pointer-cursor " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <label class="form-label">Personal Claims</label>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-gray-100 text-black">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Applied Date</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="datepickerpc">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Claim Category</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="" readonly>
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                            </select>
                        </div>
                    </div>
                    {{-- akan tarik data dari  labelling name dlam setting add claim --}}
                    <div class="row p-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="labellingname" id="" readonly value="">
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="" readonly>
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Amount</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Supporting Document</label>
                        </div>
                        <div class="col-md-8"> <input type="file" class="form-control-file" id="">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button bg-white-500 text-black px-3 py-10px pointer-cursor collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <label class="form-label">Travelling</label>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-gray-100 text-black">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Travel Date</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text " class="form-control" id="datepickertc">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Start Time</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="timestart" class=" form-control" value="" placeholder="choose time">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">End Time</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="timeend" class=" form-control" placeholder="choose time">
                        </div>
                    </div>
                    <div id="" style="display: none">
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Start date</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="daystart" class=" form-control" value="">
                            </div>
                            <div class="col-md-2" style="display: none">
                                <label class="form-label">End date</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="dayend" class=" form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Total Hours</label>
                        </div>
                        <div class="col-md-8">
                            <input readonly type="text" id="totalduration" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Reason using Web</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Type of Transport</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="">
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                                <option class="form-label" value=""> Personal
                                    Car</option>
                                <option class="form-label" value="">Personal
                                    Motocycle</option>
                                <option class="form-label" value=""> Public
                                    Transport</option>
                                <option class="form-label" value="">Company Car
                                </option>
                                <option class="form-label" value=""> Carpool
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Location Start</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="ls">
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                                <option class="form-label" value="">Home
                                </option>
                                <option class="form-label" value="">Office
                                </option>
                                <option class="form-label" value="3"> My Project
                                </option>
                                <option class="form-label" value="">Others
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2" id="project" style="display: none">
                        <div class="col-md-4">
                            <label class="form-label">Project</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="">
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Address Start</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Destination</label>
                        </div>
                        <div class="col-md-8">
                            {{-- <input readonly type="text" class="form-control"> --}}
                            <select class="form-select" id="dest">
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                                <option class="form-label" value="">Home
                                </option>
                                <option class="form-label" value="">Office
                                </option>
                                <option class="form-label" value="3">My Project
                                </option>
                                <option class="form-label" value="4">Others
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2" id="projectdest" style="display: none">
                        <div class="col-md-4">
                            <label class="form-label">Project</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="dest">
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2" id="logname" style="display: none">
                        <div class="col-md-4">
                            <label class="form-label">Log Name</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="">
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Destination Address</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Mileage</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Petrol/Fares</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Toll</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Parking</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Supporting Document</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="form-control-file" id="">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button bg-white-500 text-black px-3 py-10px pointer-cursor collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    <label class="form-label">Subsistence Allowance &
                        Accommodation</label>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-gray-100 text-black">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Claim For</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" id="ca">
                                <option class="form-label" value="" selected>
                                    Please Select</option>
                                <option class="form-label" value="1">With Cash
                                    Advance</option>
                                <option class="form-label" value="2">Without Cash
                                    Advance</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Supporting Document</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="form-control-file" id="">
                        </div>
                    </div>
                    <div class="WC" style="display:none">
                        <div class="row p-2">
                            <table id="claimtable" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>-</th>
                                        <th class="text-nowrap">No</th>
                                        <th class="text-nowrap">Form ID</th>
                                        <th class="text-nowrap">Type of Cash Advance
                                        </th>
                                        <th class="text-nowrap">Travel Date</th>
                                        <th class="text-nowrap">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" /></td>
                                        <td>1</td>
                                        <td>Form ID 1</td>
                                        <td>Type of Cash Advance 1</td>
                                        <td>1/1/2022</td>
                                        <td>MYR200</td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" /></td>
                                        <td>2</td>
                                        <td>Form ID 2</td>
                                        <td>Type of Cash Advance 2</td>
                                        <td>1/2/2022</td>
                                        <td>MYR201</td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" /></td>
                                        <td>3</td>
                                        <td>Form ID 3</td>
                                        <td>Type of Cash Advance 3</td>
                                        <td>2/3/2022</td>
                                        <td>MYR22</td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" /></td>
                                        <td>4</td>
                                        <td>Form ID 4</td>
                                        <td>Type of Cash Advance 4</td>
                                        <td>3/5/2022</td>
                                        <td>MYR220</td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" /></td>
                                        <td>5</td>
                                        <td>Form ID 5</td>
                                        <td>Type of Cash Advance 5</td>
                                        <td>3/6/2022</td>
                                        <td>MYR230</td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" /></td>
                                        <td>6</td>
                                        <td>Form ID 6</td>
                                        <td>Type of Cash Advance 6</td>
                                        <td>1/8/2022</td>
                                        <td>MYR250</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="WOC" style="display:none">
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
                                                    <label class="form-label">Start</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Date" id="date1">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">Start</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Time" id="time1">
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
                                                    <label class="form-label">End</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Date" id="date2">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">End</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Time" id="time2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Travel Duration</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="result1" readonly>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Project</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select">
                                    <option class="form-label" value="" selected>Please Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Subsistence
                                    Allowance:</label>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Breakfast</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" value="15" id="BF">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X day =</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" value="0" id="DBF">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4"> </div>
                            <div class="col-md-2">
                                <label class="form-label">Lunch</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" value="15" id="LH">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X day =</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" value="0" id="DLH">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Dinner</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" value="15" id="DN">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X day =</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" value="0" id="DDN">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2"> </div>
                            <div class="col-md-2"> </div>
                            <div class="col-md-2">
                                Total Subsistence
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" value="0" id="TS">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label">Accommodation:</label>
                            </div>
                            <div class="col-md-2" id="hotelc">
                                <input class="form-check-input" type="checkbox" value="85" id="htv" />
                                <label class="form-label">Hotel</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" id="hotelcv">
                            </div>
                            <div class="col-md-2" style="display: none">
                                <input readonly type="text" class="form-control" id="hotelcv1" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X Night =</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="hn" disabled value="0">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <label class="form-label"></label>
                            </div>
                            <div class="col-md-2" id="lodgingc">
                                <input class="form-check-input" type="checkbox" value="100" id="ldgv" />
                                <label class="form-label">Lodging</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" id="lodgingcv">
                            </div>
                            <div class="col-md-2" style="display: none">
                                <input readonly type="text" class="form-control" id="lodgingcv1" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">X Night =</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" value="0" id="ln" disabled>
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
                                <label class="form-label">Total Accomodation</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" value="0" id="TAV">
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
                                <label class="form-label">TOTAL</label>
                            </div>
                            <div class="col-md-2">
                                <input readonly type="text" class="form-control" value="" id="total2">
                            </div>
                        </div>
                        <div class="modal-footer"> <button type="button" class="btn btn-secondary">Reset</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
