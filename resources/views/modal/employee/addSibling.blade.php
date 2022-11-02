<div class="modal fade" id="add-sibling" tabindex="-1" aria-labelledby="add-sibling" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add Sibling Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSiblingForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="" name="firstName" class="form-control" aria-describedby="firstname">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="" name="lastName" class="form-control" aria-describedby="lastname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="text" id="dobsibling" name="DOB" class="form-control" aria-describedby="dob">
                        </div>
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="" label="Please Choose " ></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}" >{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Contact Number*</label>
                            <input type="text" name="contactNo" id="" class="form-control" aria-describedby="lastname">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Relationship</label>
                            <select class="form-select" name="relationship">
                                <option value="" label="Please Choose "></option>
                                @foreach ($relationships as $key => $relationship)
                                <option value="{{$key}}" >{{$relationship}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="col-sm-6 p-2">Address</h4>
                        <div class="col-sm-6"><br>
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="checkbox" id="same-address3" name="sameAsPermenant"> --}}
                                <input class="form-check-input" type="checkbox" id="same-address4" name="sameAsPermenant" style="text-transform:uppercase">
                                <label class="form-check-label" for="same-address">
                                    Same as Permanent Address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address-1" class="form-label">Address 1*</label>
                            <input type="text" id="address1sibling" class="form-control" name="address1" aria-describedby="address-1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2sibling" class="form-control" name="address2" aria-describedby="address-2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <input type="text" id="postcodesibling" class="form-control" name="postcode" aria-describedby="postcode">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" id="citysibling" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" name="state" id="statesibling">
                                <option value="" label="Please Choose " ></option>
                                @foreach ($states as $key => $state)
                                <option value="{{$key}}"  >{{$state}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countrysibling">
                                <option value="MY" label="MALAYSIA" selected></option>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}"  >{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}" >{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button href="javascript:;" id="addSibling" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

@include('modal.myProfile.editSibling')
@include('modal.myProfile.viewSibling')
