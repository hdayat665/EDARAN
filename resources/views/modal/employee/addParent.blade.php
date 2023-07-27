<div class="modal fade" id="add-parent" tabindex="-1" aria-labelledby="add-parent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-parent">New Family</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addParentForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNameP" name="firstName" class="form-control" aria-describedby="firstname"  placeholder="FIRST NAME">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameP" name="lastName" class="form-control" aria-describedby="lastname" placeholder="LAST NAME">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="fullname" class="form-label" >Full Name</label>
                            <input type="text" id="fullNameP" name="fullName" class="form-control" aria-describedby="fullname" readonly placeholder="FULL NAME">
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label" >Old Identification Number</label>
                            <input type="text" id="" name="oldIDNo" class="form-control" aria-describedby="" placeholder="0000000"></div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck6" value="on" type="checkbox" name="non_citizen" id="non_citizen2">
                                        <label class="form-check-label" for="citizen" >
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">New Identification Number*</label>
                                    <input type="text" id="idno6" name="idNo" value="" class="form-control" aria-describedby="" placeholder="000000000000">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="lastname" class="form-label" >ID Attachment</label>
                            <input type="file" id="idAttachment" name="idFile" value="" class="form-control" aria-describedby="">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="passport" class="form-label" >Passport Number</label>


                                    <input type="text" id="passport6" name="passport"  class="form-control" aria-describedby="passport" placeholder="PASSPORT NUMBER">
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-3">
                                    <label for="expirydate" class="form-label" >Expiry Date*</label>
                                    <input type="text" id="expirydate6" name="expiryDate" placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate"  style="pointer-events: none;" readonly>

                                </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label" >Issuing Country*</label>
                            <select class="form-select" name="issuingCountry" id="issuingCountry6" style="pointer-events: none; text-transform:uppercase" readonly disabled>
                                <option value="" label="PLEASE CHOOSE" selected="selected"></option>
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
                            <label for="dob" class="form-label">Date Of Birth*</label>
                            <input type="text" id="DOBaddparent" name="DOB" readonly class="form-control" aria-describedby="dob" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="form-label" >Age*</label>
                            <input type="text" id="age6" name="age" readonly class="form-control" aria-describedby="" placeholder="AGE">
                        </div>
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender6" style="pointer-events: none">
                                <option value="" label="PLEASE CHOOSE"></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="passport" class="form-label">Phone Number</label>
                            <input type="text" id="" name="contactNo" class="form-control" aria-describedby="passport" placeholder="00000000000">
                        </div>
                        <div class="col-sm-6">
                            <label for="expirydate" class="form-label">Relationship*</label>
                            <select class="form-select" name="relationship" id="relationship1">
                                <?php $relationship = relationshipFamily() ?>
                                <option value="" label="PLEASE CHOOSE"  ></option>
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
                                        <input class="form-check-input okuCheck5" value="on" type="checkbox" name="oku_status" id="oku_status2">
                                        <label class="form-check-label" for="citizen">
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <label for="lastname" class="form-label" >OKU Card Number*</label>
                                    <input type="text" disabled readonly id="okucard5" name="okuCardNum" value="" class="form-control" aria-describedby="" placeholder="OKU CARD NUMBER">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" >OKU Attachment*</label>
                                    <input type="file" id="okuattach5" disabled name="okuFile" style="pointer-events: none"  class="form-control" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="col-sm-6 p-2">Address</h4>
                        <div class="col-sm-6">
                            <br><div class="form-check">
                                <input class="form-check-input" type="checkbox" id="same-address2" name="sameaspermanent" style="text-transform:uppercase">
                                <input type="hidden" id="user" value="<?php echo $user_id; ?>" >
                                <label class="form-check-label" for="same-address2">
                                    Same as Permanent Address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address-1" class="form-label">Address 1*</label>
                            <input type="text" id="address1parent" name="address1" class="form-control" aria-describedby="address-1" placeholder="ADDRESS 1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2parent" name="address2" class="form-control" aria-describedby="address-2" placeholder="ADDRESS 2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <input type="text" id="postcodeparent" name="postcode" class="form-control" aria-describedby="postcode" placeholder="00000">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-select" name="city" id="cityparent" placeholder="CITY">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" id="stateparent" name="state">
                                <?php $state = state() ?>
                                <option value="" label="PLEASE CHOOSE"  ></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countryparent">
                                <option value="" label="PLEASE CHOOSE"  ></option>

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
@include('modal.employee.editParent')
@include('modal.employee.viewParent')
