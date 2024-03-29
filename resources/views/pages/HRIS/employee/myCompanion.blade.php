<div class="tab-pane fade" id="default-tab-5">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add New Companion
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form id="addCompanionForm">
                        <input type="hidden" value="{{$user_id}}" name="user_id" id="user_id">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Information</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" value="on" {{ ($companion->mainCompanion ?? 1) ? 'checked' : '' }} name="mainCompanion" value="{{ $companion->mainCompanion ?? '' }}" type="checkbox" role="switch" id="set-main" checked>
                                    <label class="form-check-label" for="set-main">Set as Main Companion</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstnamemc" name="firstName" value="{{ $companion->firstName ?? '' }}" placeholder="FIRST NAME" class="form-control" aria-describedby="firstname">
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastnamemc" name="lastName" value="{{ $companion->lastName ?? '' }}" placeholder="LAST NAME" class="form-control" aria-describedby="lastname">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" id="fullnamemc" name="fullName" readonly value="{{ $companion->fullName ?? '' }}" class="form-control" aria-describedby="fullname">
                            </div>
                            <div class="col-sm-6">
                                <label for="oldic" class="form-label">Old Identification Number</label>
                                <input type="text" id="" name="oldIdNo"  value="" class="form-control" aria-describedby="oldic" placeholder="0000000">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check form-switch">
                                            <label for="citizen" class="form-label">Non-Citizen?</label>
                                            <input class="form-check-input partCheck2" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="nonNetizen1" value="on" type="checkbox" role="switch" id="citizen">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="passport-number" class="form-label">New Identification Number*</label>
                                        <input type="text" name="idNo"  value="{{ $companion->idNo ?? '' }}" id="idnumber2" placeholder="000000000000" class="form-control" aria-describedby="passport-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="idattachement" class="form-label" >ID Attachment</label>
                                <input type="file" name="idFile" value="" id="" class="form-control" aria-describedby="idattach">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="passport" class="form-label">Passport Number</label>
                                        <input type="text" id="passportmc" name="passport" value="{{ $companion->passport ?? '' }}" placeholder="PASSPORT NUMBER" class="form-control" aria-describedby="passport"   >
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="expirydate" class="form-label">Expiry Date*</label>
                                        <input type="text" id="expirydatemc" name="expiryDate" value="{{ $companion->expiryDate ?? '' }}" placeholder="YYYY/MM/DD" class="form-control" aria-describedby="expirydate" style= "pointer-events: none;" disabled readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="issuing-country" class="form-label">Issuing Country* </label>
                                <select class="form-select" name="issuingCountry" id="issuingCountry2" value="{{ $companion->issuingCountry ?? '' }}" style= "pointer-events: none;" disabled readonly>
                                <option value="" label="PLEASE CHOOSE" selected ></option>
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
                            <div class="col-sm-3">
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input type="text" id="dobmc" name="DOB" value="{{ $companion->DOB ?? '' }}" class="form-control" aria-describedby="dob" readonly placeholder="YYYY/MM/DD">
                            </div>
                        </div>
                        <div class="row p-2">
                                <div class="col-sm-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" id="age2" name="age" value="{{ $companion->age ?? '' }}" class="form-control" aria-describedby="age"  placeholder="AGE">
                                </div>
                                <div class="col-sm-3">
                                    <label for="dom" class="form-label">Date Marriage</label>
                                    <input type="txt " id="dommc" name="DOM" value="{{ $companion->DOM ?? '' }}" class="form-control" aria-describedby="dom" placeholder="YYYY/MM/DD">
                                </div>
                                <div class="col-sm-3">
                                    <label for="marriage-cert col-md-6" class="form-label">Marriage Certificate</label>
                                    <input type="file" name="marrigeCert" id="marrige-cert" class="form-control" aria-describedby="dob">
                                </div>
                                <div class="col-sm-3">
                                    <label for="marriage-status" class="form-label">Marriage Status</label>
                                    <select class="form-select" name="marrigeStatus" >
                                        <?php $maritialStatus = getMaritalStatus() ?>
                                        <option value="0" label="PLEASE CHOOSE"  ></option>
                                        @foreach ($maritialStatus as $key => $status)
                                        <option value="{{$key}}" >{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="contact-number" class="form-label">Phone Number</label>
                                <input type="text" id="contact-number" name="contactNo" value="{{ $companion->contactNo ?? '' }}" placeholder="00000000000" class="form-control" aria-describedby="contact-number">
                            </div>
                            <div class="col-sm-6">
                                <label for="contact-number" class="form-label" >Home Number</label>
                                <input type="text" id="" name="homeNo" value="" class="form-control" aria-describedby="" placeholder="000000000">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-check form-switch align-right">
                                            <input class="form-check-input okuCheck1"  id="citizen" value="{{ $companion->okuStatus ?? '' }}" type="checkbox" name="okuStatusc"  >
                                            <label class="form-check-label" for="citizen" >
                                                OKU?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label" >OKU Card Number*</label>
                                        <input type="text" id="okucard1" disabled name="okuCardNum" value="" class="form-control" readonly placeholder="OKU CARD NUMBER">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="dob" class="form-label">OKU Attachment*</label>
                                        <input type="file" id="okuattach1"  disabled name="okuattach" class="form-control" aria-describedby="" style= "pointer-events: none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="same-address6" name="sameAsPermenant">
                                    <input type="hidden" id="user" value="<?php echo $user_id; ?>" >
                                    <label class="form-check-label" for="same-address">
                                        Same as Employee Permanent Address
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text" id="address-1c" name="address1" value="{{ $companion->address1 ?? '' }}" placeholder="ADDRESS 1" class="form-control" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address-2c" name="address2" value="{{ $companion->address2 ?? '' }}" class="form-control" placeholder="ADDRESS 2" aria-describedby="address2">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country*</label>
                                <select class="form-select" name="country" id="countryc" value="{{ $companion->country ?? '' }}" style="text-transform:uppercase">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($country->sortBy('country_name') as $ct)
                                        <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                    @endforeach
                                </select>
                                <div id="countryc-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="state" id="statec" value="{{ $companion->state ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($state->sortBy('state_name') as $st)
                                        <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                    @endforeach
                                </select>
                                <div id="statec-err" class="error"></div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="city" class="form-label">City*</label>
                                <select class="form-select" name="city" id="cityc"value="{{ $companion->city ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($city->sortBy('name') as $cty)
                                        <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                    @endforeach
                                </select>
                                <div id="cityc-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="postcode" class="form-label">Postcode*</label>
                                <select class="form-select" name="postcode" id="postcodec" value="{{ $companion->postcode ?? '' }}"  style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($postcode->sortBy('postcode') as $pc)
                                        <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                    @endforeach
                                </select>
                                <div id="postcodec-err" class="error"></div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Employment Details</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch align-right">
                                    <input class="form-check-input partCheck3" type="checkbox" role="switch" id="set-main">
                                    <label class="form-check-label" for="set-main">Working ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="Designation-name" class="form-label">Designation*</label>
                                <input type="text" id="designationmc" readonly disabled name="designation"  class="form-control" placeholder="DESIGNATION"  style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="company-name" class="form-label">Company Name</label>
                                <input type="text" id="companyNamemc" readonly name="companyName" value="{{ $companion->companyName ?? '' }}" placeholder="COMPANY NAME" class="form-control" aria-describedby="company-name">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="date-joined-company" class="form-label">Date Joined Company</label>
                                <input type="date" readonly  id="dateJoinedmc" name="dateJoined" value="{{ $companion->dateJoined ?? '' }}" class="form-control" placeholder="YYYY/MM/DD" aria-describedby="date-joined-company">
                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Income Tax Number</label>
                                <input type="text" readonly id="income-tax-number" name="incomeTax" value="{{ $companion->incomeTax ?? '' }}" class="form-control" placeholder="000000000000" aria-describedby="income-tax-number">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="extension-number" class="form-label">Monthly Salary</label>
                                <input type="text" readonly id="payslipmc" name="payslip"  class="form-control" placeholder="MONTHLY SALARY">
                                <input type="file" name="payslip"  hidden aria-describedby="dob">
                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Office Number</label>
                                <input type="text" readonly id="officeNomc" name="officeNo" value="{{ $companion->officeNo ?? '' }}" placeholder="000000000" class="form-control" aria-describedby="income-tax-number">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1</label>
                                <input type="text" readonly id="address1mc" name="address1E" value="{{ $companion->address1E ?? '' }}" class="form-control" placeholder="ADDRESS 1" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" readonly id="address2mc" name="address2E" value="{{ $companion->address2E ?? '' }}" class="form-control" placeholder="ADDRESS 2" aria-describedby="address2">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country*</label>
                                <select class="form-select" name="countryE" id="countryEmc" value="{{ $companion->countryE ?? '' }}" style="text-transform:uppercase">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($country->sortBy('country_name') as $ct)
                                        <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                    @endforeach
                                </select>
                                <div id="countryEmc-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="stateE" id="stateEmc" value="{{ $companion->stateE ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($state->sortBy('state_name') as $st)
                                        <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                    @endforeach
                                </select>
                                <div id="stateEmc-err" class="error"></div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="city" class="form-label">City*</label>
                                <select class="form-select" name="cityE" id="cityEmc"value="{{ $companion->city ?? '' }}"  style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($city->sortBy('name') as $cty)
                                        <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                    @endforeach
                                </select>
                                <div id="cityEmc-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="postcode" class="form-label">Postcode*</label>
                                <select class="form-select" name="postcodeE" id="postcodeEmc"value="{{ $companion->postcode ?? '' }}"  style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($postcode->sortBy('postcode') as $pc)
                                        <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                    @endforeach
                                </select>
                                <div id="postcodeEmc-err" class="error"></div>
                            </div>
                        </div>
                        <p class="text-end mb-0 mt-3">
                        <button href="javascript:;" id="addCompanion" class="btn btn-primary">Save</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        @if ($companions)
        @foreach ($companions as $companion)
        <span style="display: none">{{$no = $idRun++}}</span>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{$companion->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$companion->id}}" aria-expanded="false" aria-controls="collapse{{$companion->id}}">
                    {{$companion->fullName ?? ''}}
                </button>
            </h2>
            <div id="collapse{{$companion->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$companion->id}}" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-white">
                    <form id="updateCompanionForm{{$no}}">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Information 2</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="mainCompanion" value="{{ $companion->mainCompanion ?? '' }}" type="checkbox" role="switch" id="set-main" >
                                    <label class="form-check-label" for="set-main">Set as Main Companion</label>
                                    <input type="hidden" name="id" value="{{$companion->id}}">
                                    <input type="hidden" name="user_id" value="{{$user_id}}">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstname" name="firstName" value="{{ $companion->firstName ?? '' }}" placeholder="FIRST NAME" class="form-control" aria-describedby="firstname">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastname" name="lastName" value="{{ $companion->lastName ?? '' }}" class="form-control" placeholder="LAST NAME" aria-describedby="lastname">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" id="fullname" name="fullName" value="{{ $companion->fullName ?? '' }}" class="form-control" placeholder="FULL NAME" aria-describedby="fullname">
                            </div>
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label" >Old Identification Number</label>
                                <input type="text" id="" name="" value="" class="form-control" aria-describedby="" placeholder="000000000">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check form-switch">
                                            <label for="citizen" class="form-label">Non-Citizen ?</label>
                                            <input class="form-check-input partCheck2s" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="nonNetizen1" value="{{ $companion->nonCitizen ?? '' }}" type="checkbox" role="switch" id="citizen">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="passport-number" class="form-label">New Identification Number*</label>
                                        <input type="text"name="idNo" value="{{ $companion->idNo ?? '' }}" id="idnumber2s" class="form-control"placeholder="000000000000" aria-describedby="passport-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label" >ID Attachment</label>
                                <input type="file" name="idFile" value="" id="" class="form-control" aria-describedby="">
                                @if ($companion->idFile)
                                Click <a href="{{ route('view', ['filename' => $companion->idFile ?? '']) }}" target="_blank">here</a> to see the ID Attachment.
                                @endif
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="passport" class="form-label">Passport Number 2</label>
                                        <input type="text" id="passportmcs" name="passport" value="{{ $companion->passport ?? '' }}" class="form-control" placeholder="PASSPORT NUMBER" aria-describedby="passport" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="expirydate" class="form-label">Expiry Date*</label>
                                        <input type="text" id="expirydatemcs" name="expiryDate" value="{{ ($companion->expiryDate !== null) ? date_format(date_create($companion->expiryDate), 'Y-m-d') : '' }}" class="form-control" readonly placeholder="YYYY/MM/DD" aria-describedby="expirydate">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="issuing-country" class="form-label">Issuing Country*</label>
                                <select class="form-select" name="issuingCountry" id="issuingCountry2s" value="{{ $companion->issuingCountry ?? '' }}">
                                    <option value="" label="PLEASE CHOOSE" selected ></option>

                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $companion->issuingCountry) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $companion->issuingCountry) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="text" id="dobs" name="DOB" value="{{ date_format(date_create($companion->DOB), 'Y-m-d') }}" class="form-control" aria-describedby="dob" placeholder="YYYY/MM/DD">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" id="age2s" name="age" value="{{ $companion->age ?? '' }}" class="form-control" aria-describedby="age" placeholder="AGE">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="dom" class="form-label">Date of Marriage</label>
                                       <input type="text" id="dom" name="DOM" value="{{ ($companion->DOM !== null) ? date_format(date_create($companion->DOM), 'Y-m-d') : '' }}" class="form-control" aria-describedby="dom" placeholder="YYYY/MM/DD">
                                   </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <label for="marriage-cert" class="form-label">Marriage Certificate</label>
                                        <input type="file" name="marrigeCert" id="marriage-cert" class="form-control" aria-describedby="dob">
                                        @if ($companion->marrigeCert)
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="marriage-status" class="form-label">Marital Status</label>
                                        <select class="form-select" name="marrigeStatus" >
                                            <?php $maritialStatus = getMaritalStatus() ?>
                                            <option value="0" label="PLEASE CHOOSE"  ></option>
                                            @foreach ($maritialStatus as $key => $status)
                                            <option value="{{$key}}" <?php echo ($key == $companion->marrigeStatus) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row p-2">
                             <div class="col-sm-6">
                                <label for="contact-number" class="form-label">Phone Number</label>
                                <input type="text" id="contact-number" name="contactNo" value="{{ $companion->contactNo ?? '' }}" class="form-control" placeholder="00000000000" aria-describedby="contact-number">
                            </div>
                            <div class="col-sm-6" >
                                <label for="" class="form-label">Home Number</label>
                                <input type="text" id="" name="" value="" class="form-control" aria-describedby="" placeholder="000000000">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-check form-switch align-right">
                                            <input class="form-check-input okuCheck1s" id="okuStatus2" value="on" {{($companion->okuStatus ?? '') ? 'checked' : ''}} type="checkbox" name="okuStatus">

                                            <label class="form-check-label" for="citizen" >
                                                OKU?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label" >OKU Card Number*</label>
                                        <input type="number" id="okucard1s" name="okuNumber" value="{{ $companion->okuNumber ?? '' }}" class="form-control" readonly placeholder="OKU CARD NUMBER">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="dob" class="form-label" >OKU Attachment*</label>
                                <input type="file" id="okuattach1s" disabled name="okuID" class="form-control" aria-describedby="">
                                    @if ($companion->okuID )
                                    Click <a href="{{ route('view', ['filename' => $companion->okuID ?? '']) }}" target="_blank">here</a> to see the OKU Attachment.
                                    @endif
                            </div>
                        </div>
                        <br>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="same-address6" name="sameAsPermenant">
                                    <label class="form-check-label" for="same-address">
                                        Same as Employee Permanent Address
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text" id="address-1c" name="address1" value="{{ $companion->address1 ?? '' }}" class="form-control" placeholder="ADDRESS 1" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address-2c" name="address2" value="{{ $companion->address2 ?? '' }}" class="form-control" placeholder="ADDRESS 2" aria-describedby="address2">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country*</label>
                                <select class="form-select" name="country" id="countryUC" value="{{$companion->country ?? '' }}" style="text-transform:uppercase">
                                    <option value="" label="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($country->sortBy('country_name') as $ct)
                                        <option value="{{ $ct->country_id }}" {{ ($companion->country ?? '') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                    @endforeach
                                </select>
                                <div id="countryUC-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="state" id="stateUC" value="{{ $companion->state ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($state->sortBy('state_name') as $st)
                                        <option value="{{ $st->id }}" {{ ($companion->state ?? '') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                    @endforeach
                                </select>
                                <div id="stateUC-err" class="error"></div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">City*</label>
                                <select class="form-select" name="city" id="cityUC" value="{{ $companion->city ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($city->sortBy('name') as $cty)
                                        <option value="{{ $cty->name }}" {{ ($companion->city ?? '') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                    @endforeach
                                </select>
                                <div id="cityUC-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode*</label>
                                <select class="form-select" name="postcode" id="postcodeUC" value="{{ $companion->postcode ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($postcode->sortBy('postcode') as $pc)
                                        <option value="{{ $pc->postcode }}" {{ ($companion->postcode ?? '') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                    @endforeach
                                </select>
                                <div id="postcodeUC-err" class="error"></div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Employment Details</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch align-right">
                                    <input class="form-check-input partChecks" type="checkbox" role="switch" id="set-main" >
                                    <label class="form-check-label" for="set-main">Working ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="Designation-name" class="form-label">Designation*</label>
                                <input type="text" id="designationmc"   disabled name="designation"  class="form-control mcdetaildesignation"  placeholder="DESIGNATION" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="company-name" class="form-label">Company Name</label>
                                <input type="text" id="phone-number" readonly name="companyName" value="{{ $companion->companyName ?? '' }}" placeholder="COMPANY NAME" class="form-control mcdetail" aria-describedby="company-name">
                            </div>

                        </div>
                        <div class="row p-2">
                         <div class="col-sm-6">
                                <label for="date-joined-company" class="form-label">Date Joined Company</label>
                                <input type="text" id="date-joined-company" readonly name="dateJoined" value="{{ date_format(date_create($companion->dateJoined), 'd-m-Y') }}" class="form-control mcdetail" placeholder="YYYY/MM/DD" aria-describedby="date-joined-company">
                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Income Tax Number</label>
                                <input type="text" id="income-tax-number" readonly name="incomeTax" value="{{ $companion->incomeTax ?? '' }}" class="form-control mcdetail" aria-describedby="income-tax-number" placeholder="000000000000">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="extension-number" class="form-label">Monthly Salary</label>
                                <input type="text" readonly id="payslipmc" readonly name="salary"  class="form-control mcdetail" placeholder="MONTHLY SALARY">
                                <input type="file" id="extension-number" name="payslip" value="{{ $companion->salary ?? '' }}" class="form-control" hidden aria-describedby="0000">

                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Office Number</label>
                                <input type="text" id="income-tax-number" readonly name="officeNo" value="{{ $companion->officeNo ?? '' }}" placeholder="000000000" class="form-control mcdetail" aria-describedby="income-tax-number">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1</label>
                                <input type="text" id="address1" readonly name="address1E" value="{{ $companion->address1E ?? '' }}" placeholder="ADDRESS 1" class="form-control mcdetail" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address2" readonly name="address2E" value="{{ $companion->address2E ?? '' }}" class="form-control mcdetail" placeholder="ADDRES 2" aria-describedby="address2">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country*</label>
                                <select class="form-select" name="countryE" id="countryCEdit" value="{{ $companion->countryE ?? '' }}" style="text-transform:uppercase">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($country->sortBy('country_name') as $ct)
                                        <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                    @endforeach
                                </select>
                                <div id="countryCEdit-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="stateE" id="stateCEdit" value="{{ $companion->stateE ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($state->sortBy('state_name') as $st)
                                        <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                    @endforeach
                                </select>
                                <div id="stateCEdit-err" class="error"></div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="city" class="form-label">City*</label>
                                <select class="form-select" name="cityE" value="{{ $companion->city ?? '' }}" id="cityCEdit" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($city->sortBy('name') as $cty)
                                        <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                    @endforeach
                                </select>
                                <div id="cityCEdit-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="postcode" class="form-label">Postcode*</label>
                                <select class="form-select" name="postcodeE" value="{{ $companion->postcode ?? '' }}" id="postcodeCEdit" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($postcode->sortBy('postcode') as $pc)
                                        <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                    @endforeach
                                </select>
                                <div id="postcodeCEdit-err" class="error"></div>
                            </div>
                        </div>
                    <p class="text-end mb-0 mt-3">
                        <button id="updateCompanion{{$no}}" class="btn btn-primary">Save</button>
                    </p>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="row p-2">
            <div class="modal-footer">
                <a class="btn btn-white me-5px btnPrevious">Previous</a>

                <a class="btn btn-white me-5px btnNext">Next</a>
            </div>
        </div>
</div>
