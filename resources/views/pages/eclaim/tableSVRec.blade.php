    <br>
    <div class="row p-2 tab-pane fade active show" id="default-tab-1">
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
                        <a id="" class="dropdown-item"> View</a>
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
{{-- </div> --}}
{{-- @include('views.modal.eclaim.SVRecmodal') --}}

