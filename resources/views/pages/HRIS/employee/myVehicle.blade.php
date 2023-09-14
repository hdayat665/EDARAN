<style>
    .custom-dropdown-menu {
        position: static !important;
        height: auto !important;
        max-height: none !important;
        overflow: visible !important;
    }
</style>
<div class="tab-pane fade" id="v-pills-vehicledetails" role="tabpanel" aria-labelledby="v-pills-vehicledetails-tab">
    <div class="card" >
        <div class="card-header bg-white bg-gray-100">
            <h4 class="fw-bold">
                Vehicle Details
            </h4>
            <p class="fw-light">
                Update your vehicle information
            </p>
        </div>
        <div class="card-body">
            <button type="button"  data-bs-toggle="modal" id="addVehicleView"  class="btn btn-primary col-md-2"><i class="fa fa-plus"></i> New Vehicle</button>
            <table id="data-table-default" style="width: 100%" class="table table-striped align-middle">
                <thead>
                    <th width="1%" data-orderable="false">Action</th>
                    <th class="text-nowrap">Vehicle Type</th>
                    <th class="text-nowrap">Plate Number</th>
                </thead>
                <tbody>
                    @if ($vehicles)
                    @foreach ($vehicles as  $vehicle)
                    <tr>
                        <td>
                            <div class="btn-group">
                                <div>
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                </div>
                                <ul><div class="dropdown-menu custom-dropdown-menu vehi">
                                    <li><a href="javascript:;" id="editVehicleView" data-id="{{$vehicle->id}}" class="dropdown-item" data-bs-toggle="modal"> Edit</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;" id="deleteVehicle" data-id="{{$vehicle->id}}" class="dropdown-item" data-bs-toggle="modal"> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>{{($vehicle->vehicle_type == 1) ? 'Car' : 'Motorcycle'}}</td>
                        <td>{{$vehicle->plate_no}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modal.employee.addVehicle')
@include('modal.employee.editVehicle')
@include('modal.employee.viewVehicle')
