
<div class="modal fade" id="edit-children" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="add-children">Update Children</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editformchildren">
                <form id="editChildrenForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstName1" name="firstName" value="" class="form-control" placeholder="FIRST NAME" aria-describedby="firstname">
                            <input type="hidden" id="idChildren" name="id">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastName1" name="lastName" value=""  class="form-control" placeholder="LAST NAME" aria-describedby="lastname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullName1" name="fullName" value=""  class="form-control" placeholder="FULL NAME" aria-describedby="fullname" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label" >Old Identification Number</label>
                            <input type="text" id="oldIdNumber1" name="oldIDNo" value=""  class="form-control" aria-describedby="" placeholder="0000000" >
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label" >Birth of Certificate</label>
                            <input type="file" id="birthCert"  name="birthID" class="form-control">
                            @if ($children->birthID)
                                Click <a href="{{ route('download', ['filename' => $children->birthID]) }}">here</a> to see birth of certificate attachment.
                            @endif
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck5" value="on" type="checkbox" id="nonCitizen1" name="nonCitizen" {{($children->nonCitizen ?? '') ? 'checked' : ''}}>

                                        <label class="form-check-label" for="citizen">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label"> New Identification Number*</label>
                                    <input type="text" id="idNo1" name="idNo"  value="{{$children->idNo ?? ''}}" class="form-control" aria-describedby="lastname" placeholder="000000000000">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="" class="form-label" >ID Attachment</label>
                                    <input type="file" id="id-attachment" name="idFile" class="form-control" aria-describedby="">
                                    @if ($children->idFile)
                                        Click <a href="{{ route('download', ['filename' => $children->idFile]) }}">here</a> to see ID Attachment.
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input type="text" id="passports1" name="passport" value="{{ $children->passport ?? '' }}" class="form-control" placeholder="PASSPORT NUMBER" aria-describedby="passport">
                                </div>

                            </div>
                        </div>
                         <div class="col-sm-3">
                                    <label for="expirydate" class="form-label">Expiry Date*</label>
                                    <input type="text" id="expiryDate1" name="expiryDate"  value="{{ date_format(date_create($children->expiryDate ?? null), 'Y-m-d') ?? '' }}" placeholder="YYYY/MM/DD"  class="form-control" aria-describedby="expirydate" style="pointer-events: none;" readonly>
                                </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Issuing Country*</label>
                            <select class="form-select"  name="issuingCountry" id="issuingCountry1">
                                <option value="" label="PLEASE CHOOSE" selected></option>
                                        <?php
                                            $americass = americas();
                                            $asias = asias();
                                        ?>

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
                                    <input type="text" id="DOB1" name="DOB" class="form-control" aria-describedby="dob" style="pointer-events: none;" placeholder="YYYY/MM/DD" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" id="age1" name="age" value="{{$children->age ?? ''}}" class="form-control" aria-describedby="age" placeholder="AGE">
                                </div>
                        <div class="col-sm-3">
                            <label for="gender" class="form-label">Gender</label>

                            <select class="form-select" name="gender" id="gender1">
                                <option value="" label=" PLEASE CHOOSE"></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Marital Status</label>
                            <select class="form-select" name="maritalStatus" id="maritalStatus1">
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
                                        <input class="form-check-input okuCheck4" type="checkbox" value="on" {{($children->okuStatus ?? '') ? 'checked' : ''}} id="OKUchildren1" name="okuStatus">
                                        <label class="form-check-label" for="citizen" >
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" >OKU Card Number*</label>
                                    <input type="text" id="okucard4" disabled name="okuNo" value="{{$children->okuNo ?? ''}}" class="form-control" readonly placeholder="OKU CARD NUMBER" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="dob" class="form-label" >OKU Attachment*</label>
                                    <input type="file" id="okuattach4" name="okuFile" class="form-control" style="pointer-events: none" aria-describedby="" disabled>
                                    @if ($children->okuFile)
                                        Click <a href="{{ route('download', ['filename' => $children->okuFile]) }}">here</a> to see OKU ID Attachment.
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Education Information</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="education-type" class="form-label">Education Type</label>
                            <select class="form-select" name="educationType" id="educationType1">
                                <option value="0" label=" PLEASE CHOOSE"></option>
                                @foreach ($educationType as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-level" class="form-label">Education Level</label>
                            <select class="form-select" name="educationLevel" id="educationLevel1">
                                <option value="0" label="PLEASE CHOOSE"></option>
                                @foreach ($educationLevel as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="institution-name" class="form-label">Institution Name</label>
                            <input type="text" name="instituition" id="instituition1" class="form-control" aria-describedby="institution-name" placeholder="INSTITUITION NAME">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Supporting Document</label>
                            <input type="file" name="supportDoc" id="" class="form-control" aria-describedby="">
                            @if ($children->supportDoc)
                                Click <a href="{{ route('download', ['filename' => $children->supportDoc]) }}">here</a> to see supporting document attachment.
                            @endif
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address1" class="form-label" >Address 1</label>
                            <input type="text" id="address1_1" name="address1" value="" class="form-control" aria-describedby="address1" placeholder="ADDRESS 1" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="address2" class="form-label" >Address 2</label>
                            <input type="text" id="address2_1" name="address2" value="" class="form-control" aria-describedby="address2" placeholder="ADDRESS 2" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="country1" value="{{ $companion->country ?? '' }}" style="text-transform:uppercase">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($country->sortBy('country_name') as $ct)
                                    <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" name="state" id="state1" value="{{ $companion->state ?? '' }}" style="text-transform: uppercase;">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($state->sortBy('state_name') as $st)
                                    <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">City</label>
                            <select class="form-select" name="city" id="city1" style="text-transform: uppercase;">
                                <option type="text" value="" label="" selected="selected">Please Choose</option>
                                @foreach($city->sortBy('name') as $cty)
                                    <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Postcode</label>
                            <select class="form-select" name="postcode" id="postcode1" style="text-transform: uppercase;">
                                <option type="text" value="" label="" selected="selected">Please Choose</option>
                                @foreach($postcode->sortBy('postcode') as $pc)
                                    <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button  class="btn btn-primary" id="editChildren">Update</button>
            </form>
            </div>
        </form>
        </div>
    </div>
</div>
