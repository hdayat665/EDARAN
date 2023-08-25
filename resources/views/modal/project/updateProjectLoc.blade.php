<script>
    initMap2();
    </script>
<div class="modal fade" id="updateProjectLocModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Project Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProjectLocForm">
                    <div class="row">
                        <label class="form-label col-form-label col-md-4">Location Name*</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-12">
                            <input type="text" class="form-control mb-5px" id="" name="" placeholder="LOCATION NAME" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Address 1*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Address 2</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="address" id="address" placeholder="ADDRESS 1" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="address2" id="address1"placeholder="ADDRESS 2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Postcode*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">City*</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="postcode" id="" placeholder="00000" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="city" id="" placeholder="CITY"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">State*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Country*</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <select class="form-select" name="state" id="state">
                                <option label="PLEASE CHOOSE">Select State </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" >
                                <option value="Malaysia" label="Malaysia"></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label col-form-label col-md-12">Select Location*</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-12">
                                <div style="position: relative;">
                                    <input id="location_google_2" class="form-control mb-5px" type="text" name="location_google_2" placeholder="Enter a location">
                                    <div id="autocomplete-dropdown-2"></div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="map_2"></div>    
                        <input type="hidden" class="form-control mb-5px" name="longitude_2" id="longitude_2" >
                        <input type="hidden" class="form-control mb-5px" name="latitude_2" id="latitude_2">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateProjectLoc">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
console.log(document.getElementById("tenant_id").value);

</script>