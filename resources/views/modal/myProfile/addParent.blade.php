<div class="modal fade" id="add-parent" tabindex="-1" aria-labelledby="add-parent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-parent">Add Parent Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addParentForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" aria-describedby="firstname" style="text-transform:uppercase" >
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="" name="lastName" class="form-control" aria-describedby="lastname" style="text-transform:uppercase" >
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">Full Name</label>
                            <input type="text" readonly id="fullName" name="fullName" class="form-control" aria-describedby="fullname" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12 oldidnumber">
                                    <label for="lastname" class="form-label">Old Identification Number*</label>
                                    <input type="text" name="oldidNo" id="oldidnumber" class="form-control" aria-describedby="lastname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck" value="door3" type="checkbox" name="nonNetizen" id="citizen">
                                        <label class="form-label" for="citizen">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="passport" class="form-label">New Identification Number*</label>
                                    <input type="text" id="passportfam" name="passport" class="form-control" aria-describedby="passport" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">ID Attachment* </label>
                            <input id="iDfileupload" type="file" name="file" multiple="multiple" ></input>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input type="text" id="passportfam" name="passport" class="form-control" aria-describedby="passport" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="expirydate" class="form-label">Expiry Date</label>
                            <input type="text" id="expirydatefam" name="expiryDate" placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" style="pointer-events: none;" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Issuing Country</label>
                            <select class="form-select" name="issuingCountry" style="text-transform:uppercase">
                                <option value="MY" label="Malaysia" selected></option>
                                    <?php
                                    $americass = americas();
                                    $asias = asias();
                                    ?>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}" <?php echo ($key == $profile->issuingCountry) ? 'selected="selected"' : '' ?>>{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}" <?php echo ($key == $profile->issuingCountry) ? 'selected="selected"' : '' ?>>{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-3">
                            <label for="dob" class="form-label">Date of Birth*</label>
                            <input type="text" id="DOBparent" name="DOB" class="form-control" aria-describedby="dob">
                        </div>
                        <div class="col-sm-3">
                            <label for="age" class="form-label">Age*</label>
                            <input type="text" id="agefam" name="age" class="form-control" aria-describedby="age">
                        </div>
                        <div class="col-sm-6">
                            <label for="expirydate" class="form-label">Relationship</label>
                            <select class="form-select" name="relationship" id="relationshipparent" style="text-transform:uppercase">
                                <?php $relationship = relationship() ?>
                                <option value="" label="Please Choose"  ></option>
                                @foreach ($relationship as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck" value="door3" type="checkbox" name="oku" id="oku">
                                        <label class="form-label" for="oku">
                                            OKU
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="okucard" class="form-label">OKU Card Number</label>
                                    <input type="text" id="okucardnofam" name="okucard" class="form-control" aria-describedby="okucard" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">OKU Attachment* </label>
                            <input id="okufileupload" type="file" name="file" multiple="multiple" ></input>
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
                            <label for="address-1" class="form-label">Address 1*</label>
                            <input type="text" id="address1parent" name="address1" class="form-control" aria-describedby="address-1" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2parent" name="address2" class="form-control" aria-describedby="address-2" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <input type="text" id="postcodeparent" name="postcode" class="form-control" aria-describedby="postcode">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-control" name="city" id="cityparent" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" id="stateparent" name="state" style="text-transform:uppercase">
                                <?php $state = state() ?>
                                <option value="" label="Please Choose"></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countryparent" style="text-transform:uppercase">
                                <option value="MY" label="Malaysia" Selected></option>
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

                
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button href="javascript:;" id="addParent" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@include('modal.myProfile.editParent')
@include('modal.myProfile.viewParent')
