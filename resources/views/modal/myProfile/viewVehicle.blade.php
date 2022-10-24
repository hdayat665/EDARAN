
<div class="modal fade" id="view-vehicle" tabindex="-1" aria-labelledby="add-vehicle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="add-parent">New </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Vehicle Type*</label>
                        <select class="form-select" id="vehicleType1" name="vehicle_type">
                            <?php $vehicleTypes = getVehicle() ?>
                            <option value="0" label="Please Choose " selected="selected"></option>
                            @foreach ($vehicleTypes as $key => $vehicle)
                                <option value="{{$key}}">{{$vehicle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="lastname" class="form-label">Plate Number*</label>
                        <input type="text" id="plateNo1" name="plateNo1" class="form-control" aria-describedby="lastname">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-primary">Save</button> --}}
            </div>
        </div>
    </div>
</div>
