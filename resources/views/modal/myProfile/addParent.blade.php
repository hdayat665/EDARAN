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
                        {{-- full name --}}
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label" style="color: red">Full Name</label>
                            <input type="text" id="" name="" class="form-control" aria-describedby="" readonly style="text-transform:uppercase" >
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" style="color: red;">Old Identification Number</label>
                            <input type="text" id="" name="lastName" class="form-control" aria-describedby="lastname" style="text-transform:uppercase" >
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck8" value="" type="checkbox" name=""  id="">
                                        <label class="form-check-label" for="citizen" style="color: red">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" style="color: red">New Identification Number*</label>
                                    <input type="number" id="idnumber6" name="idNo" value="" class="form-control" >
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            {{-- new --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" style="color: red;">ID Attachment</label>
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
                                  
                                    <input type="text" id="passportparent" name="passport"  class="form-control" aria-describedby="passport">
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
                            <label for="dob" class="form-label">Date Birth*</label>
                            <input type="text" id="dob6" name="DOB" class="form-control" aria-describedby="dob" readonly>
                        </div>
                        <div class="col-sm-3" style="color: red">
                            <label for="dob" class="form-label">Age</label>
                            <input type="text" id="age6" name="" class="form-control" aria-describedby="" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Relationship</label>
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
                            <label for="passport" class="form-label">Contact Number</label>
                            <input type="text" id="contactNoparent" name="contactNo" class="form-control" aria-describedby="passport">
                        </div>
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Gender*</label>
                            <select class="form-select" name="gender" id=""  style="text-transform:uppercase">
                                <option value="" label="Please Choose "></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- new --}}
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input okuCheck5 " value="" type="checkbox" name=""  id="">
                                        <label class="form-check-label" for="citizen" style="color: red;">
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" style="color: red;">OKU Card Number*</label>
                                    <input type="number" id="okucard5" name="" value="" class="form-control" readonly >
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" style="color: red;">OKU Attachment</label>
                                    <input type="file" id="okuattach4" name="" class="form-control" style="pointer-events: none" aria-describedby="" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
