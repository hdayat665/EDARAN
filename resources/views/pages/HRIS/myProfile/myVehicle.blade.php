<div class="tab-pane fade" id="v-pills-vehicledetails" role="tabpanel" aria-labelledby="v-pills-vehicledetails-tab">
    <div class="card">
        <div class="card-header bg-white bg-gray-100">
            <h4 class="fw-bold">
                Vehicle Details
            </h4>
            <p class="fw-light">
                Update your vehicle information
            </p>
         </div>
        <div class="card-body">
            <button type="button"  data-bs-toggle="modal" data-bs-target="#add-vehicle"  class="btn btn-white mt-3 mb-3"><i class="fa fa-plus"></i> Add Vehicle</button>
            <table id="data-table-default" style="width: 100%" class="table table-striped align-middle">
                <thead>
                        <th width="1%" data-orderable="false">Action</th>
                        <th class="text-nowrap">Vehicle Type</th>
                        <th class="text-nowrap">Plate Number</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    <a href="javascript:;" class="dropdown-item">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" class="dropdown-item">View</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" class="dropdown-item">Delete</a>
                                </div>
                        </td>
                        <td>Car</td>
                        <td>BGH9234</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modal.myProfile.addVehicle')
