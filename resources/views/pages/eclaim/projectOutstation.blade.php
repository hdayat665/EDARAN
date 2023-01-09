<div class="PO" style="display:none">
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Cash Advance ID</label>
        </div>
        <div class="col-md-8">
            <input readonly type="text" class="form-control">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Travel Date</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="datefilter1" value="">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Project</label>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="" readonly>
                <option class="form-label" value="" selected>Please Select
                </option>
            </select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Destination</label>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="" readonly>
                <option class="form-label" value="" selected>Please Select
                </option>
            </select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <label class="form-label">Purpose</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row p-2">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary">Reset</button>
            <button type="button" class="btn btn-primary">Add</button>
        </div>
    </div>
    <div class="row p-2">
        <h4>Project Table List :</h4>
    </div>
    <div class="row p-2">
        <table id="projectTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Action</th>
                    <th class="text-nowrap">Travel Date</th>
                    <th class="text-nowrap">Project</th>
                    <th class="text-nowrap">Destination</th>
                    <th class="text-nowrap">Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <td>1/1/2022 - 3/1/2022</td>
                    <td>Orbit</td>
                    <td>Kuala Lumpur</td>
                    <td>Meeting</td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <td>5/1/2022 - 7/1/2022</td>
                    <td>Payje</td>
                    <td>Putrajaya</td>
                    <td>Project Discussion</td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <td>2/2/2022 - 3/2/2022</td>
                    <td>Orbit</td>
                    <td>Kuala Lumpur</td>
                    <td>Meeting</td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <td>5/2/2022 - 7/5/2022</td>
                    <td>MyVM</td>
                    <td>Selangor</td>
                    <td>Meeting</td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <td>8/5/2022 - 10/5/2022</td>
                    <td>Payje</td>
                    <td>Kuala Lumpur</td>
                    <td>Meeting</td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <td>12/5/2022 - 15/5/2022</td>
                    <td>Orbit</td>
                    <td>Kajang</td>
                    <td>Meeting</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
