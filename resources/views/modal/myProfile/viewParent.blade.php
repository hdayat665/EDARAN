<div class="modal fade" id="view-parent" tabindex="-1" aria-labelledby="add-parent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="add-parent">View Parent Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" id="firstNameP" name="firstName" class="form-control" aria-describedby="firstname" placeholder="FIRST NAME">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" id="lastNameP" name="lastName" class="form-control" aria-describedby="lastname" placeholder="LAST NAME">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label" >Full Name</label>
                            <input type="text" id="" name="" class="form-control" aria-describedby="firstname" placeholder="FULL NAME">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" >Old Identification Number</label>
                            <input type="text" id="lastNameP" name="lastName" class="form-control" aria-describedby="lastname" placeholder="0000000">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input " value="" type="checkbox" name=""  id="">
                                        <label class="form-check-label" for="citizen" >
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">New Identification Number</label>
                                    <input type="number" id="" name="" value="" class="form-control" placeholder="000000000000">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" >ID Attachment</label>
                                    <input type="file" id="" name="" class="form-control" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="passport" class="form-label">Passport Number</label>
                                  
                                    <input type="text" id="passportview" name="passport"  class="form-control" aria-describedby="passport" placeholder="PASSPORT NUMBER">
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-3">
                                    <label for="expirydate" class="form-label">Expiry Date</label>
                                    <input type="text" id="expiryDateChild" name="expiryDate"  placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" style="pointer-events: none;" readonly>
                                  
                                </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Issuing Country</label>
                            <select class="form-select" name="issuingCountry" id="" style="text-transform:uppercase">
                            <option value="MY" label="Malaysia" selected ></option>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}">{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-3">
                            <label for="dob" class="form-label">Date Of Birth</label>
                            <input type="date" id="DOBP" name="DOB" class="form-control" aria-describedby="dob" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-sm-3">
                            <label for="dob" class="form-label" >Age</label>
                            <input type="text" id="" name="" class="form-control" aria-describedby="" placeholder="AGE">
                        </div>
                        <div class="col-sm-6">
                            <label for="expirydate" class="form-label">Relationship</label>
                            <select class="form-select" name="relationship" id="relationshipP">
                                    <?php $relationship = relationshipFamily() ?>
                                    <option value="0" label="PLEASE CHOOSE"  ></option>
                                    @foreach ($relationship as $key => $status)
                                    <option value="{{$key}}"> {{$status}}</option>
                                    @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input " value="" type="checkbox" name=""  id="">
                                        <label class="form-check-label" for="citizen" >
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6" >
                                    <label for="lastname" class="form-label">OKU Card Number*</label>
                                    <input type="number" id="" name="" value="" class="form-control" placeholder="OKU CARD NUMBER" >
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6" >
                                    <label for="dob" class="form-label">OKU Attachment*</label>
                                    <input type="file" id="" name="" class="form-control" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="passport" class="form-label">Contact Number</label>
                            <input type="text" id="contactNoP" name="contactNo" class="form-control" aria-describedby="passport" placeholder="00000000000">
                        </div>
                         <div class="col-sm-6">
                            <label for="age" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="genderP">
                                <option value="0" label=" PLEASE CHOOSE"></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <h4 class="col-sm-6 p-2">Address</h4>
                        <div class="col-sm-6">
                            <br><div class="form-check">
                                <input class="form-check-input" type="checkbox" id="same-address2" name="sameaspermanent" style="text-transform:uppercase">
                                <label class="form-check-label" for="same-address2">
                                    Same as Permanent Address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address-1" class="form-label">Address 1</label>
                            <input type="text" id="address1P" name="address1" class="form-control" aria-describedby="address-1" placeholder="ADDRESS 1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2P" name="address2" class="form-control" aria-describedby="address-2" placeholder="ADDRESS 2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode</label>
                            <input type="text" id="postcodeP" name="postcode" class="form-control" aria-describedby="postcode" placeholder="00000">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-select" name="city" id="cityP" placeholder="CITY">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" id="stateP" name="state">
                                <?php $state = state() ?>
                                <option value="0" label="PLEASE CHOOSE"  ></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countryP">
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}" >{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="viewParent">Save</button>
            </div>
        </div>
    </div>
</div>