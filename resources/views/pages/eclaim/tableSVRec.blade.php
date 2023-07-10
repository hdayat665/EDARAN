<div class="form-control">
    <div class="row p-2">
        <div class="col-md-6">
            <h4>Travelling Table List</h4>
        </div>
        <div class="col md-3 d-flex justify-content-end">
            <label class="form-label">Total</label>
        </div>
        <div class="col md-3 d-flex justify-content-end">
            <input type="text" class="form-control" readonly value='RM0.00'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col d-flex justify-content-end">
            <div class="col-md-6">
                <div class="row p-2">
                    <div class="col d-flex justify-content-end">
                        <a id="btnTAttachment" class="btn btn-primary"></i> Supporting Documents</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col md-12">
            <table id="travelling" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">Travel Date</th>
                        <th class="text-nowrap">Mileage</th>
                        <th class="text-nowrap">Petrol/Fares</th>
                        <th class="text-nowrap">Tolls</th>
                        <th class="text-nowrap">Parking</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tr>
                    <td>YYYY-MM-DD</td>
                    <td>167KM</td>
                    <td>RM0.00</td>
                    <td>RM0.00</td>
                    <td>RM0.00</td>
                    <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                        <a id="mcvTravelling" class="dropdown-item"> View</a>
                    </td>
                </tr>
                <tr>
                    <td>YYYY-MM-DD</td>
                    <td>167KM</td>
                    <td>RM0.00</td>
                    <td>RM0.00</td>
                    <td>RM0.00</td>
                    <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                        <a id="mcvTravelling" class="dropdown-item"> View</a>
                        {{-- <a href="javascript:;" id="travelBtn" data-id="" class="dropdown-item"> View</a> --}}
                    </td>
                </tr>
                <tfoot>
                    <tr>
                        <td style="text-align:right">Total</td>
                        <td>167KM</td>
                        <td>RM60.00</td>
                        <td>RM30.00</td>
                        <td>RM14.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Travelling</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='KM'>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='RM '>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <label for="file" class=""> Supporting Document</label>
                {{-- <input type="file" class="form-control-file" name="" id="" multiple> --}}
            {{-- </div>
        </div>
    </div> --}}
    {{-- <div class="row p-2">
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <label class="form-label">Petrol/Fare</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value='RM'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
<div class="row p-2">

</div>
<div class="form-control">
    <div class="row p-2">
        <div class="col-md-6">
            <h4>Subsistence Allowance & Accommodation Table List</h4>
        </div>
        <div class="col md-3 d-flex justify-content-end">
            <label class="form-label">Total</label>
        </div>
        <div class="col md-3 justify-content-end">
            <input type="text" class="form-control" readonly value='RM'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col md-6 d-flex justify-content-end">
            <div class="col-md-6">
                <div class="row p-2">
                    <div class="col d-flex justify-content-end">
                        <a id="btnSAttachment" class="btn btn-primary"></i> Supporting Documents</a>
                        {{-- <a href="#" data-bs-toggle="dropdown" class="btn btn-primary"></i> Supporting Documents</a> --}}
                        {{-- <label class="form-label">Total</label> --}}
                    </div>
                    {{-- <div class="col d-flex justify-content-end">
                        <input type="text" class="form-control" readonly value='RM'>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row p-2">
        <div class="">
            <table id="subsistence" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">Start Date</th>
                        <th class="text-nowrap">End Date</th>
                        <th class="text-nowrap">Subsistence Allowance</th>
                        <th class="text-nowrap">Accommodation</th>
                        <th class="text-nowrap">Laundry</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>YYYY-MM-DD</td>
                        <td>YYYY-MM-DD</td>
                        <td>RM20.00</td>
                        <td>RM15.00</td>
                        <td>RM10.00</td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a id="mcvSubsistence" class="dropdown-item"> View</a>
                            {{-- <a href="javascript:;" id="subsBtn" data-id="" class="dropdown-item"> View</a> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>YYYY-MM-DD</td>
                        <td>YYYY-MM-DD</td>
                        <td>RM20.00</td>
                        <td>RM15.00</td>
                        <td>RM10.00</td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" aria-rowspan="2" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a id="mcvSubsistence" class="dropdown-item"> View</a>
                            {{-- <a href="javascript:;" id="subsBtn" data-id="" class="dropdown-item"> View</a> --}}
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="text-align:right">Total</td>
                        <td>RM40.00</td>
                        <td>RM30.00</td>
                        <td>RM20.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="form-control">
                <div class="col-md-12 justify-content-end">
                    <div class="row p-2">
                        <div class="col-md-5">
                            <label class="form-label">Less Cash Advance </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="RM0.00" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row p-2">
    <div class="form-control">
        <div class="row p-2">
            <div class="col-md-6">
                <h4>Others Table List</h4>
            </div>
            <div class="col md-3 d-flex justify-content-end">
                <label class="form-label">Total</label>
            </div>
            <div class="col md-3 justify-content-end">
                <input type="text" class="form-control" readonly value='RM0.00'>
            </div>
        </div>
        {{-- <div class="row p-2">
            <div class="col d-flex justify-content-end">
                <div class="col-md-6">
                    <div class="row p-2">
                        <div class="col d-flex justify-content-end">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary"></i> Supporting Documents</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row p-2">
            <div class="col md-6">
                <table id="" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Claim Category</th>
                            <th class="text-nowrap">Project Code</th>
                            <th class="text-nowrap">Project Name</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Amount</th>
                            <th class="text-nowrap">Attachment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Phone</td>
                        <td>ORBIT001</td>
                        <td>Orbit</td>
                        <td>Bil Telefon</td>
                        <td>RM0.00</td>
                        <td></td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a id="mcvOthers" class="dropdown-item"> View</a>
                            {{-- <a href="javascript:;" id="subsBtn" data-id="" class="dropdown-item"> View</a> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>ORBIT001</td>
                        <td>Orbit</td>
                        <td>Bil Telefon</td>
                        <td>RM0.00</td>
                        <td></td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a id="mcvOthers" class="dropdown-item"> View</a>
                            {{-- <a href="javascript:;" id="subsBtn" data-id="" class="dropdown-item"> View</a> --}}
                        </td>
                    </tr>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align:right">Total</td>
                            <td>RM0.00</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('modal.eclaim.mcvTravelling')
    @include('modal.eclaim.mcvSubsistence')
    @include('modal.eclaim.mcvOthers')
</div>

