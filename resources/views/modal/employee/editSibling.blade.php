<div class="modal fade" id="edit-sibling" tabindex="-1" aria-labelledby="edit-sibling" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add Sibling Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSiblingForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNameS" name="firstName" class="form-control" aria-describedby="firstname">
                            <input type="hidden" id="idSA" name="id" class="form-control" aria-describedby="firstname">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameS" name="lastName" class="form-control" aria-describedby="lastname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" id="DOBS" name="DOB" class="form-control" aria-describedby="dob">
                        </div>
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="genderS" name="gender">
                                <option value="0" label="PLEASE CHOOSE"  ></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}"  >{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Contact Number*</label>
                            <input type="text"  name="contactNo" id="contactNo" class="form-control" aria-describedby="lastname">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Relationship</label>
                            <select class="form-select" name="relationship" id="relationshipS">
                                <option value="0" label="PLEASE CHOOSE" ></option>
                                @foreach ($relationships as $key => $relationship)
                                <option value="{{$key}}"  >{{$relationship}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Address</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="form-check form-switch align-right">
                                <input class="form-check-input" type="checkbox" name="sameAddress" id="same-address">
                                <label class="form-check-label" for="same-address">
                                    Same as permenant address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address-1" class="form-label">Address 1*</label>
                            <input type="text" id="address1S" class="form-control" name="address1" aria-describedby="address-1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2S" class="form-control" name="address2" aria-describedby="address-2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <input type="text" id="postcodeS" class="form-control" name="postcode" aria-describedby="postcode">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <select class="form-select" name="city" id="cityS">
                                <option value="0" label="PLEASE CHOOSE"  ></option>
                                @foreach ($citys as $key => $city)
                                <option value="{{$key}}"  >{{$city}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" name="state" id="stateSA">
                                <option value="0" label="PLEASE CHOOSE"  ></option>
                                @foreach ($states as $key => $state)
                                <option value="{{$key}}"  >{{$state}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countrySA">
                                <option value="0" label="PLEASE CHOOSE"  ></option>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}"  >{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}"  >{{$asia}}</option>
                                    @endforeach
                                </optgroup>

                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="editSibling">Save</button>
            </div>
        </div>
    </div>
</div>
