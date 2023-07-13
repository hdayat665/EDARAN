<div class="row p-2">
    <div class="form-control tab-pane fade show" id="default-tab-3">
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
</div>
@include('modal.eclaim.SVRecmodal')
