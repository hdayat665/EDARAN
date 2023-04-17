<div class="modal fade" id="add-vehicle" tabindex="-1" aria-labelledby="add-vehicle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="add-parent">New Vehicle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addVehicleForm">
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Vehicle Type*</label>
                        <select class="form-select" name="vehicle_type">
                            <?php $vehicleTypes = getVehicle() ?>
                            <option label=" PLEASE CHOOSE" selected="selected"></option>
                            @foreach ($vehicleTypes as $key => $vehicle)
                                <option value="{{$key}}">{{$vehicle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="lastname" class="form-label">Plate Number*</label>
                        <input type="text" id="lastname" name="plate_no" class="form-control" aria-describedby="lastname" placeholder="Plate Number" >
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary" id="saveVehicle">Save</button> --}}
                <button href="javascript:;" id="saveVehicle" class="btn btn-primary">Save</button>
                
            </form>
            </div>
        </div>
    </div>
</div>
