<div class="modal fade" id="add-children" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-children">New Children</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modaladd-children">
                <form id="addChildrenForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNameChild" name="firstName" value="" class="form-control" aria-describedby="firstname" placeholder="FIRST NAME">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameChild" name="lastName" value=""  class="form-control" aria-describedby="lastname" placeholder="LAST NAME">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullNameChild" readonly name="fullName" value=""  class="form-control" aria-describedby="fullname" placeholder="FULL NAME">
                        </div>
                        <div class="col-md-3">
                            <label for="fullname" class="form-label" >Old Identification Number</label>
                            <input type="text" id=""  name="oldIDNo" value=""  class="form-control" aria-describedby="" placeholder="0000000">
                        </div>
                        <div class="col-md-3">
                            <label for="fullname" class="form-label" >Birth of Certificate</label>
                            <input type="file" id=""  name="birthID" value=""  class="form-control" aria-describedby="">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck4" value="" type="checkbox" name="nonNetizen2" {{($children->nonCitizen ?? '') ? 'checked' : ''}} id="citizen">
                                        <label class="form-check-label" for="citizen">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">New Identification Number*</label>
                                    <input type="text" id="idNoaddChild"  name="idNo" value="" class="form-control" aria-describedby="lastname" placeholder="000000000000">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="lastname" class="form-label" >ID Attachment</label>
                            <input type="file" id="" name="idFile" value="" class="form-control" aria-describedby="">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input type="text"   id="passportChild" name="passport" class="form-control" aria-describedby="passport" placeholder="PASSPORT NUMBER">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="expirydate" class="form-label">Expiry Date*</label>
                            <input type="text" id="expiryDateChild" name="expiryDate" placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" disabled style="pointer-events: none;" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Issuing Country*</label>
                            <select class="form-select" name="issuingCountry" id="issuingCountryChild" disabled>
                                <option value="" label="PLEASE CHOOSE" selected="selected" ></option>
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
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">Date Birth</label>
                                    <input type="text" id="DOBChild" name="DOB" class="form-control"  aria-describedby="dob" readonly style="pointer-events: none;" placeholder="YYYY/MM/DD">
                                </div>
                                <div class="col-sm-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" id="ageChild" name="age" class="form-control" aria-describedby="age" readonly placeholder="AGE">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="childgender">
                                <option value="" label="PLEASE CHOOSE"></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Marital Status</label>
                            <select class="form-select" name="maritalStatus" id="">
                                <option value="0" label="PLEASE CHOOSE"></option>
                                @foreach ($maritalStatus as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input okuCheck3" type="checkbox" id="nonCitizen1" name="okuStatus2" {{($children->nonCitizen1 ?? '') ? 'checked' : ''}}>

                                        <label class="form-check-label" for="nonCitizen1">
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">OKU Card Number*</label>
                                    <input type="text" id="okucard3" disabled name="okuCardNum"  value="" class="form-control" aria-describedby="" readonly placeholder="OKU CARD NUMBER">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">OKU Attachment*</label>
                                    <input type="file" id="okuattach3" disabled name="okuFile" class="form-control" style="pointer-events: none;" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Education Information</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="education-type" class="form-label">Education Type</label>
                            <select class="form-select" name="educationType" id="">
                                <option value="0" label="PLEASE CHOOSE"></option>
                                @foreach ($educationType as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-level" class="form-label">Education Level</label>
                            <select class="form-select" name="educationLevel" id="">
                                <option value="0" label="PLEASE CHOOSE"></option>
                                @foreach ($educationLevel as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="institution-name" class="form-label">Institution Name</label>
                            <input type="text" name="instituition" id="" class="form-control" aria-describedby="institution-name" placeholder="INSTITUITION NAME">
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Supporting Document</label>
                            <input type="file" class="form-control" name="supportDoc">

                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address1" class="form-label" >Address 1</label>
                            <input type="text" id="" name="address2" value="" class="form-control" aria-describedby="address1" style="text-transform:uppercase" placeholder="ADDRESS 1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address2" class="form-label" >Address 2</label>
                            <input type="text" id="" name="address2" value="" class="form-control" aria-describedby="address2" style="text-transform:uppercase" placeholder="ADDRESS 2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="countryAddChild" value="{{ $companion->country ?? '' }}" style="text-transform:uppercase">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($country->sortBy('country_name') as $ct)
                                    <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode</label>
                            <select class="form-select" name="postcode" id="postcodeAddChild" style="text-transform: uppercase;">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" name="state" id="stateAddChild" value="{{ $companion->state ?? '' }}" style="text-transform: uppercase;">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select" name="city" id="cityAddChild" style="text-transform: uppercase;">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button href="javascript:;" id="addChildren" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
    </div>
</div>

@include('modal.employee.editChildren')
@include('modal.employee.viewChildren')
