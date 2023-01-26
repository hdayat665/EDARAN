<div class="modal fade" id="edit-parent" tabindex="-1" aria-labelledby="add-parent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-parent">Update Parent Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editParentForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNames1" name="firstName" class="form-control" aria-describedby="firstname">
                            <input type="hidden" id="idP" name="id" class="form-control" aria-describedby="firstname">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameP1" name="lastName" class="form-control" aria-describedby="lastname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">Full Name*</label>
                            <input type="text" id="" name="" class="form-control" aria-describedby="">
                            
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" style="color: red">Old Identification Number</label>
                            <input type="text" id="" name="" class="form-control" aria-describedby="">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck7 " value="" type="checkbox" name=""  id="">
                                        <label class="form-check-label " for="citizen" style="color: red">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" style="color: red">New Identification Number*</label>
                                    <input type="number" id="idno7" name="" value="" class="form-control" >
                                    
                                </div>
                            </div>
                        </div>
                        {{-- new --}}
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" style="color: red">ID Attachment</label>
                                    <input type="file" id="" name="" class="form-control" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="passport" class="form-label" style="color: red">Passport Number</label>
                                  
                                    <input type="text" id="passport7" name=""  class="form-control" aria-describedby="passport">
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-3">
                                    <label for="expirydate" class="form-label" style="color: red">Expiry Date</label>
                                    <input type="text" id="expirydate7" name=""  placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" style="pointer-events: none;" readonly>
                                  
                                </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label" style="color: red">Issuing Country</label>
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
                            <label for="dob" class="form-label">Date Birth</label>
                            <input type="date" id="DOBP1" name="DOB" readonly class="form-control" aria-describedby="dob">
                        </div>
                        <div class="col-sm-3">
                            <label for="dob" class="form-label" style="color: red">Age</label>
                            <input type="text" id="age7" name="" readonly class="form-control" aria-describedby="">
                        </div>
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="genderP1" style="pointer-events: none">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="passport" class="form-label">Contact Number</label>
                            <input type="text" id="contactNoP1" name="contactNo" class="form-control" aria-describedby="passport">
                        </div>
                        <div class="col-sm-6">
                            <label for="expirydate" class="form-label">Relationship</label>
                            <select class="form-select" name="relationship" id="relationshipP1">
                                <?php $relationship = relationship() ?>
                                <option value="0" label="Please Choose"  ></option>
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
                                        <input class="form-check-input  " value="" type="checkbox" name=""  id="">
                                        <label class="form-check-label" for="citizen" style="color: red">
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" style="color: red">OKU Card Number*</label>
                                    <input type="number" id="okucard6" name="" value="" class="form-control" readonly >
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" style="color: red">OKU Attachment</label>
                                    <input type="file" id="okuattach6" name="" class="form-control" style="pointer-events: none" aria-describedby="">
                                </div>
                            </div>
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
                            <input type="text" id="address1P1" name="address1" class="form-control" aria-describedby="address-1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2P1" name="address2" class="form-control" aria-describedby="address-2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <input type="text" id="postcodeP1" name="postcode" class="form-control" aria-describedby="postcode">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-select" name="city" id="cityP1">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" id="stateP1" name="state">
                                <?php $state = state() ?>
                                <option value="0" label="Please Choose"  ></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countryP1">
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
                <button type="button" class="btn btn-primary" id="editParent">Save</button>
            </div>
        </div>
    </div>
</div>
