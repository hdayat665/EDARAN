<div class="modal fade" id="add-parent" tabindex="-1" aria-labelledby="add-parent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="addparentmodal">
            <div class="modal-header">
                <h5 class="modal-title" id="add-parent">New Family</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form id="addParentForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNameParent" name="firstName" class="form-control" aria-describedby="firstname" style="text-transform:uppercase" placeholder="FIRST NAME">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameParent" name="lastName" class="form-control" aria-describedby="lastname" style="text-transform:uppercase" placeholder="LAST NAME">
                        </div>
                    </div>
                    <div class="row p-2">
                        {{-- full name --}}
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label" >Full Name</label>
                            <input type="text" id="fullNameParent" name="fullName" class="form-control" aria-describedby="" readonly style="text-transform:uppercase" placeholder="FULL NAME">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" >Old Identification Number</label>
                            <input type="text" id="" name="oldIDNo" class="form-control" aria-describedby="" style="text-transform:uppercase" placeholder="0000000">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck8" value="on" type="checkbox" name="non_citizen" id="non_citizen2">
                                        <label class="form-check-label" for="citizen" >
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" >New Identification Number*</label>
                                    <input type="number" id="idNoaddFamily" name="idNo" value="" class="form-control" placeholder="000000000000" >

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            {{-- new --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">ID Attachment</label>
                                    <input type="file" id="idAttachment" name="idFile" class="form-control" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input type="text" id="passportParent" name="passport"  class="form-control" aria-describedby="passport" placeholder="PASSPORT NUMBER">
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-3">
                                    <label for="expirydate" class="form-label">Expiry Date*</label>
                                    <input type="text" id="expiryDateParent" name="expiryDate"  placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" disabled readonly>

                                </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Issuing Country*</label>
                            <select class="form-select"  name="issuingCountry" id="passportcountryparent"  style="pointer-events: none; text-transform:uppercase" disabled readonly >

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
                            <input type="text" id="dob6" name="DOB" class="form-control" aria-describedby="dob" readonly placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-sm-3" >
                            <label for="dob" class="form-label">Age*</label>
                            <input type="text" id="age6" name="age" class="form-control" aria-describedby="" readonly placeholder="AGE">
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Relationship*</label>
                            <select class="form-select" name="relationship" id="relationshipparent" style="text-transform:uppercase">
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
                            <label for="passport" class="form-label">Phone Number</label>
                            <input type="text" id="contactNoparent" name="contactNo" class="form-control" aria-describedby="passport" placeholder="00000000000">
                        </div>
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="genderFamily"  style="text-transform:uppercase">
                                <option value="" label="PLEASE CHOOSE" selected></option>
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
                                        <input class="form-check-input okuCheck5" value="on" type="checkbox" name="oku_status" id="oku_status2">
                                        <label class="form-check-label" for="citizen">
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">OKU Card Number*</label>
                                    <input type="number" id="okucard5" name="okuCardNum" value="" class="form-control" readonly  placeholder="OKU CARD NUMBER">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">OKU Attachment*</label>
                                    <input type="file" id="okuattach5" name="okuFile" class="form-control" readonly  style="pointer-events: none" aria-describedby="" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                <div id="addressPddrofile">
                    <div class="row">
                        <h4 class="col-sm-6 p-2">Address</h4>
                        <div class="col-sm-6">
                            <br><div class="form-check">
                                <input class="form-check-input" type="checkbox" id="same-address2" style="text-transform:uppercase">
                                <label class="form-check-label" for="same-address2">
                                    Same as Permanent Address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address-1" class="form-label">Address 1*</label>
                            <input type="text" id="address1parent" name="address1" class="form-control" aria-describedby="address-1" style="text-transform:uppercase" placeholder="ADDRESS 1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2parent" name="address2" class="form-control" aria-describedby="address-2" style="text-transform:uppercase" placeholder="ADDRESS 2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country*</label>
                            <select class="form-select countrypar" name="country" id="countryparent" value="{{ $parent->country ?? '' }}" style="text-transform:uppercase">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($country->sortBy('country_name') as $ct)
                                    <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                @endforeach
                            </select>
                            <div id="countryparent-err" class="error"></div>
                        </div>
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <select class="form-select postcodepar" name="postcode" id="postcodeparent" style="text-transform: uppercase;">
                                <option type="text"value="" label="" selected="selected">Please Choose</option>
                                @foreach($postcode->sortBy('postcode') as $pc)
                                    <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                @endforeach
                            </select>
                            <div id="postcodeparent-err" class="error"></div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select statepar" name="state" id="stateparent" value="{{ $parent->state ?? '' }}" style="text-transform: uppercase;">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($state->sortBy('state_name') as $st)
                                    <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                @endforeach
                            </select>
                            <div id="stateparent-err" class="error"></div>
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <select class="form-select citypar" name="city" id="cityparent" style="text-transform: uppercase;">
                                <option type="text"value="" label="" selected="selected">Please Choose</option>
                                @foreach($city->sortBy('name') as $cty)
                                    <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                @endforeach
                            </select>
                            <div id="cityparent-err" class="error"></div>
                        </div>
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
