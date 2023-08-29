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
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Information</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="mainCompanion" id="set-main" value="on" {{ ($companion->mainCompanion ?? 0) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="set-main">Set as Main Companion</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstnamemc" name="firstName" value="{{ $companion->firstName ?? '' }}" class="form-control" placeholder="FIRST NAME" aria-describedby="firstname" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastnamemc" name="lastName" value="{{ $companion->lastName ?? '' }}" class="form-control" aria-describedby="lastname" placeholder="LAST NAME" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" id="fullnamemc" name="fullName" readonly value="{{ $companion->fullName ?? '' }}" class="form-control" placeholder="FULL NAME" aria-describedby="fullname" style="text-transform:uppercase">
                            </div>
                            {{-- new --}}
                            <div class="col-sm-6">
                                 <div class="row">
                                     <div class="col-sm-12">
                                        <label for="passport-number" class="form-label" >Old Identification Number</label>
                                        <input type="text" name="oldIDNo" value="{{ $companion->oldIDNo ?? '' }}" id="oldidnomc" class="form-control" aria-describedby="" placeholder="0000000">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-check form-switch">
                                            <label for="citizen" class="form-label">Non-Citizen ?</label>
                                            <input class="form-check-input partCheck2" {{ ($companion->nonCitizen ?? '') ? 'checked' : '' }} name="nonCitizen" value="on" type="checkbox" role="switch" id="citizen2">
                                        </div>
                                    </div>
                                <div class="col-sm-6">
                                        <label for="passport-number" class="form-label">New Identification Number*</label>
                                        <input type="text" name="idNo" value="{{ $companion->idNo ?? '' }}" id="idnumber2" class="form-control" placeholder="000000000000" aria-describedby="passport-number">
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="id-attachment" class="form-label" >ID Attachment</label>
                                <input type="file" id="id-attachment" name="idFile" class="form-control" aria-describedby="idAttachment" >
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-3">
                                <label for="passport" class="form-label">Passport Number</label>
                                <input type="text" id="passportmc" name="passport" value="{{ $companion->passport ?? '' }}" class="form-control" aria-describedby="passport" placeholder="PASSPORT NUMBER">
                            </div>
                            <div class="col-sm-3">
                                        <label for="expirydate" class="form-label">Expiry Date*</label>
                                        <input type="text" id="expirydatemc" name="expiryDate" placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" style= "pointer-events: none;" disabled readonly>
                                    </div>
                            <div class="col-sm-3">
                                <label for="issuing-country" class="form-label">Issuing Country*</label>
                                <select class="form-select" name="issuingCountry" id="issuingCountryAddCompanion" value="{{ $companion->issuingCountry ?? '' }}" style="text-transform:uppercase" disabled >
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
                                <input type="text" id="dobAddCompanion" name="DOB" class="form-control" aria-describedby="dob" placeholder="YYYY/MM/DD" readonly>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" id="ageAddCompanion" name="age" value="{{ $companion->age ?? '' }}" class="form-control" aria-describedby="age" readonly placeholder="AGE">
                            </div>
                            <div class="col-sm-3">
                                <label for="dom" class="form-label">Date of Marriage</label>
                                <input type="text" id="dommc" name="DOM" value="{{ $companion->DOM ?? '' }}" class="form-control" aria-describedby="dom" placeholder="YYYY/MM/DD">
                            </div>
                            <div class="col-sm-6">
                                <label for="marriage-cert" class="form-label">Marriage Certificate</label>
                                <input type="file" name="marrigeCert" id="marrige-cert" class="form-control" aria-describedby="dob">
                            </div>
                        </div>
                        {{-- new --}}
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="contact-number" class="form-label">Phone Number</label>
                                <input type="text" id="contact-number" name="contactNo" value="{{ $companion->contactNo ?? '' }}" placeholder="00000000000" class="form-control" aria-describedby="contact-number">
                            </div>
                            {{-- new --}}
                            <div class="col-sm-6">
                                <label for="contact-number" class="form-label" >Home Number</label>
                                <input type="text" id="home-number" name="homeNo" value="{{ $companion->homeNo ?? '' }}" class="form-control" aria-describedby="" placeholder="000000000">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-check form-switch align-right">
                                            <input class="form-check-input okuCheck1"  id="okuStatus1" value="{{ $companion->okuStatus ?? '' }}" type="checkbox" name="okuStatus">
                                            <label class="form-check-label" for="citizen" >
                                                OKU?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label" > OKU Card Number*</label>
                                        <input type="number" id="okucard1" disabled name="okuNumber" value="" class="form-control" readonly  placeholder="OKU CARD NUMBER">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                        <label for="dob" class="form-label" > OKU Attachment*</label>
                                        <input type="file" id="okuattach1" disabled name="okuID" class="form-control" aria-describedby="" style="pointer-events: none">
                            </div>
                        </div>

                        <br>
                    <div id="addressPddrofile">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="same-address" name="sameAsPermanent">
                                    <label class="form-check-label" for="same-address">
                                        Same as Employee Permanent Address
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text" id="address-1c" name="address1" value="{{ $companion->address1 ?? '' }}" class="form-control" placeholder="ADDRESS 1" aria-describedby="address1" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address-2c" name="address2" value="{{ $companion->address2 ?? '' }}" class="form-control" placeholder="ADDRESS 2" aria-describedby="address2" style="text-transform:uppercase">
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
                            </div>
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="state" id="statec" value="{{ $companion->state ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($state->sortBy('state_name') as $st)
                                        <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="city" class="form-label">City*</label>
                                <select class="form-select" name="city" value="{{ $companion->city ?? '' }}" id="cityc" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($city->sortBy('name') as $cty)
                                        <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="postcode" class="form-label">Postcode*</label>
                                <select class="form-select" name="postcode" value="{{ $companion->postcode ?? '' }}" id="postcodec" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($postcode->sortBy('postcode') as $pc)
                                        <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                                <label for="company-name" class="form-label">Designation*</label>
                                <input type="text" id="designationmc" name="designation" class="form-control" placeholder="DESIGNATION" style="text-transform:uppercase" disabled>
                                <input type="hidden" name="designation_hidden" id="designation_hidden">

                                <script>
                                    const form = document.querySelector('form');
                                    form.addEventListener('submit', function() {
                                        const designationInput = document.getElementById('designationmc');
                                        const designationHiddenInput = document.getElementById('designation_hidden');
                                        designationHiddenInput.value = designationInput.value;
                                    });
                                </script>
                            </div>
                            <div class="col-sm-6">
                                <label for="company-name" class="form-label">Company Name</label>
                                <input type="text" id="companyNamemc" readonly name="companyName" placeholder="COMPANY NAME" value="{{ $companion->companyName ?? '' }}" class="form-control" aria-describedby="company-name" style="text-transform:uppercase">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="date-joined-company" class="form-label">Date Joined Company</label>
                                <input type="text" readonly  id="dateJoinedmc" name="dateJoined" placeholder="YYYY/MM/DD" class="form-control" aria-describedby="date-joined-company" >
                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Income Tax Number</label>
                                <input type="text" readonly id="income-tax-number" name="incomeTax" value="{{ $companion->incomeTax ?? '' }}" placeholder="000000000000" class="form-control" aria-describedby="income-tax-number">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="extension-number" class="form-label">Monthly Salary</label>
                                <input type="text" readonly id="payslipmc" name="salary"  class="form-control" placeholder="MONTHLY SALARY">
                                {{-- <input type="file" name="payslip"  hidden aria-describedby="dob"> --}}
                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Office Number</label>
                                <input type="text" readonly id="officeNomc" name="officeNo" value="{{ $companion->officeNo ?? '' }}" placeholder="000000000" class="form-control" aria-describedby="income-tax-number">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1</label>
                                <input type="text" readonly id="address1mc" name="address1E" value="{{ $companion->address1E ?? '' }}" placeholder="ADDRESS 1" class="form-control" aria-describedby="address1" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" readonly id="address2mc" name="address2E" value="{{ $companion->address2E ?? '' }}" class="form-control" placeholder="ADDRESS 2" aria-describedby="address2" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode</label>
                                <input type="number" readonly id="postcodeEmc" name="postcodeE" value="{{ $companion->postcodeE ?? '' }}" class="form-control" placeholder="00000" aria-describedby="lastname" maxlength="5" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">City</label>
                                <input type="text" readonly id="cityEmc" name="cityE" value="{{ $companion->cityE ?? '' }}" class="form-control" aria-describedby="firstname" placeholder="CITY" style="text-transform:uppercase">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State</label>
                                {{-- <select class="form-select" id="stateEmc" name="stateE" readonly value="{{ $companion->stateE ?? '' }}" style="text-transform:uppercase">
                                    <?php $state = state() ?>
                                    <option value="" label="Please Choose"  ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}" >{{$status}}</option>
                                    @endforeach
                                </select> --}}
                                <select class="form-select" id="stateEmc" name="stateE" readonly style="text-transform:uppercase">
                                    <option value="" label="Please Choose"></option>
                                    @foreach (state() as $key => $status)
                                        <option value="{{ $key }}" {{ isset($companion) && $companion->stateE == $key ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="countryEmc" name="countryE" readonly value="{{ $companion->countryE ?? '' }}" style="text-transform:uppercase">
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
                                <h4>Companion Information</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" {{ ($companion->mainCompanion ?? '') ? 'checked' : '' }} name="mainCompanion" value="{{ $companion->mainCompanion ?? '' }}" type="checkbox" role="switch" id="set-main" checked>
                                    <label class="form-check-label" for="set-main">Set as Main Companion</label>
                                    <input type="hidden" name="id" value="{{$companion->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstnameEditComp" name="firstName" value="{{ $companion->firstName ?? '' }}" placeholder="FIRST NAME" class="form-control" aria-describedby="firstname">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastnameEditComp" name="lastName" value="{{ $companion->lastName ?? '' }}" placeholder="LAST NAME" class="form-control" aria-describedby="lastname">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" id="fullnameEditComp" name="fullName" value="{{ $companion->fullName ?? '' }}" placeholder="FULL NAME" class="form-control" aria-describedby="fullname" readonly>
                            </div>
                            {{-- new --}}
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <label for="fullname" class="form-label" >Old Identification Number</label>
                                    <input type="text" name="oldIDNo" value="{{ $companion->oldIDNo ?? '' }}" id="oldidnomc" class="form-control" aria-describedby="" placeholder="0000000">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-check form-switch">
                                        <label for="citizen" class="form-label">Non-Citizen ?</label>
                                        <input class="form-check-input partCheck6" {{ ($companion->nonCitizen ?? '') ? 'checked' : '' }} name="nonCitizen" value="{{ $companion->nonCitizen ?? '' }}" type="checkbox" role="switch" id="citizen2">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="passport-number" class="form-label">New Identification Number*</label>
                                    <input type="text" name="idNo" value="{{ $companion->idNo ?? '' }}" id="idnumber3" class="form-control" placeholder="000000000000" aria-describedby="passport-number">
                                </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="marriage-cert" class="form-label" >ID Attachment</label>
                                <input type="file" name="idFile" id="id-attachment" class="form-control" aria-describedby="">
                                @if ($companion->idFile)
                                Click <a href="{{ route('view', ['filename' => $companion->idFile]) }}" target="_blank">here</a> to see the ID Attachment.
                                @endif
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="passport" class="form-label">Passport Number</label>
                                        <input type="text" id="passportUpdateCompanion" name="passport" value="{{ $companion->passport ?? '' }}" class="form-control" placeholder="PASSPORT NUMBER" aria-describedby="passport">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="expirydate" class="form-label">Expiry Date*</label>
                                        <input type="text" id="expiryDateUpdateCompanion" name="expiryDate" value="{{ ($companion->expiryDate !== null) ? date_format(date_create($companion->expiryDate), 'Y-m-d') : '' }}" placeholder="YYYY/MM/DD" class="form-control" aria-describedby="expirydate">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="issuing-country" class="form-label">Issuing Country*</label>
                                <select class="form-select" name="issuingCountry" id="issuingCountryUpdateCompanion"  value="{{ $companion->issuingCountry ?? '' }}">
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
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input type="text" id="dobuc" name="DOB" value="{{ ($companion->DOB !== null) ? date_format(date_create($companion->DOB), 'Y-m-d') : '' }}" class="form-control" aria-describedby="dob" placeholder="YYYY/MM/DD">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" id="age3" name="age" value="{{ $companion->age ?? '' }}" class="form-control" aria-describedby="age" placeholder="AGE">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="dom" class="form-label">Date Marriage</label>
                                        <input type="text" id="dom" name="DOM" value="{{ ($companion->DOM !== null) ? date_format(date_create($companion->DOM), 'Y-m-d') : '' }}" class="form-control" aria-describedby="dom" placeholder="YYYY/MM/DD">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="marriage-cert" class="form-label">Marriage Certificate</label>
                                <input type="file" name="marrigeCert" id="marriage-cert" class="form-control" aria-describedby="dob">
                                @if ($companion->marrigeCert)
                                Click <a href="{{ route('download', ['filename' => $companion->marrigeCert]) }}">here</a> to see marriage cert.
                                @endif
                            </div>
                        </div>
                        {{-- new --}}
                        <div class="row p-2">
                             <div class="col-sm-6">
                                <label for="contact-number" class="form-label">Phone Number</label>
                                <input type="text" id="contact-number" name="contactNo" value="{{ $companion->contactNo ?? '' }}" placeholder="00000000000" class="form-control" aria-describedby="contact-number">
                            </div>
                            {{-- new --}}
                            <div class="col-sm-6">
                                <label for="contact-number" class="form-label" >Home Number</label>
                                <input type="text" id="home-number" name="homeNo" value="{{ $companion->homeNo ?? '' }}" class="form-control" aria-describedby="contact-number" placeholder="000000000">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-check form-switch align-right">
                                            <input class="form-check-input okuCheck2" id="okuStatus2" value="on" {{($companion->okuStatus ?? '') ? 'checked' : ''}} type="checkbox" name="okuStatus">
                                            <label class="form-check-label" for="OKU" >
                                                OKU?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="lastname" class="form-label" >OKU Card Number*</label>
                                        <input type="number" id="okucard2" name="okuNumber" value="{{ $companion->okuNumber ?? '' }}" class="form-control" readonly placeholder="OKU CARD NUMBER">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="dob" class="form-label"  >OKU Attachment*</label>
                                <input type="file" id="okuattach2" name="okuID" class="form-control" aria-describedby="" style="pointer-events: none" readonly>
                                @if ($companion->okuID )
                                Click <a href="{{ route('view', ['filename' => $companion->okuID]) }}" target="_blank">here</a> to see the OKU Attachment.
                                @endif
                            </div>
                        </div>
                    <div id="addressPddrofile">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="same-addressUC" name="sameAsPermanent" {{ ($companion->sameAsPermanent ?? '') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="same-addressUC">
                                        Same as Employee Permanent Address
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1*</label>
                                <input type="text" id="address1UC" name="address1" value="{{ $companion->address1 ?? '' }}" class="form-control" placeholder="ADDRESS 1" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" id="address2UC" name="address2" value="{{ $companion->address2 ?? '' }}" class="form-control" placeholder="ADDRESS 2" aria-describedby="address2">
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
                            </div>
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State*</label>
                                <select class="form-select" name="state" id="stateUC" value="{{ $companion->state ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($state->sortBy('state_name') as $st)
                                        <option value="{{ $st->id }}" {{ ($companion->state ?? '') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                    @endforeach
                                </select>
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
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode*</label>
                                <select class="form-select" name="postcode" id="postcodeUC" value="{{ $companion->postcode ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($postcode->sortBy('postcode') as $pc)
                                        <option value="{{ $pc->postcode }}" {{ ($companion->postcode ?? '') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                        <hr class="mt-5">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <h4>Companion Employment Details</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check form-switch align-right">
                                    <input class="form-check-input partCheckEditCompanion" type="checkbox" role="switch">
                                    <label class="form-check-label" for="set-main">Working ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="company-name" class="form-label">Designation*</label>
                                <input type="text" disabled id="designationCEdit" name="designation"  class="form-control" placeholder="DESIGNATION" value="{{ $companion->designation ?? '' }}" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="company-name" class="form-label">Company Name</label>
                                <input type="text" readonly id="companyNameCEdit" name="companyName" placeholder="COMPANY NAME" value="{{ $companion->companyName ?? '' }}" class="form-control" aria-describedby="company-name" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="date-joined-company" class="form-label">Date Joined Company</label>
                                <input type="text" readonly id="dateJoinedCEdit" name="dateJoined" value="{{ $companion->dateJoined ?? '' }}" placeholder="YYYY/MM/DD" class="form-control" aria-describedby="date-joined-company" >
                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Income Tax Number</label>
                                <input type="text" readonly id="income-tax-numberCEdit" name="incomeTax" value="{{ $companion->incomeTax ?? '' }}" placeholder="000000000000" class="form-control" aria-describedby="income-tax-number">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="extension-number" class="form-label">Monthly Salary</label>
                                <input type="text" readonly id="payslipCEdit" name="salary" value="{{ $companion->salary ?? '' }}" class="form-control" placeholder="MONTHLY SALARY">
                            </div>
                            <div class="col-sm-6">
                                <label for="income-tax-number" class="form-label">Office Number</label>
                                <input type="text" readonly id="officeNoCEdit" name="officeNo" value="{{ $companion->officeNo ?? '' }}" placeholder="000000000" class="form-control" aria-describedby="income-tax-number">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="address1" class="form-label">Address 1</label>
                                <input type="text" readonly id="address1CEdit" name="address1E" value="{{ $companion->address1E ?? '' }}" class="form-control" placeholder="ADDRESS 1" aria-describedby="address1">
                            </div>
                            <div class="col-sm-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" readonly id="address2CEdit" name="address2E" value="{{ $companion->address2E ?? '' }}" class="form-control" placeholder="ADDRESS 2" aria-describedby="address2">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Postcode</label>
                                <input type="text" readonly id="postcodeCEdit" name="postcodeE" value="{{ $companion->postcodeE ?? '' }}" class="form-control" placeholder="00000" aria-describedby="lastname">
                            </div>
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">City</label>
                                <input type="text" readonly id="cityCEdit" name="cityE" value="{{ $companion->cityE ?? '' }}" class="form-control" placeholder="CITY" aria-describedby="firstname">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="state" class="form-label">State</label>
                                {{-- <select class="form-select" id="stateCEdit" disabled name="stateE" value="{{ $companion->stateE ?? '' }}" style="text-transform:uppercase">
                                    <?php $state = state() ?>
                                    <option value="" label="PLEASE CHOOSE" ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}"  <?php echo ($key == $companion->stateE) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select> --}}
                                <select class="form-select" id="stateEmc" name="stateE" readonly style="text-transform:uppercase">
                                    <option value="" label="Please Choose"></option>
                                    @foreach (state() as $key => $status)
                                        <option value="{{ $key }}" {{ isset($companion) && $companion->stateE == $key ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" disabled id="countryCEdit" name="countryE" value="{{ $companion->countryE ?? '' }}">
                                    <option value="" label="PLEASE CHOOSE" selected ></option>
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $companion->countryE) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $companion->countryE) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    <p class="text-end mb-0 mt-3">
                        <a href="javascript:;" id="deleteCompanion" data-id="{{ $companion->id }}" class="btn btn-danger">Delete</a>

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
<!-- $('#updateCompanion').click(functiion({

    var key = $(this).attr("data-id");

    $('#form+''key' input['name']').value();
})) -->

