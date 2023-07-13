<div class="form-control tab-pane fade show" id="default-tab-2">
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
                    </div>
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
