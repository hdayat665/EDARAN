<div class="modal fade" id="edit-parent" tabindex="-1" aria-labelledby="add-parent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-parent">Update Family</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editParentForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNames1" name="firstName" class="form-control" aria-describedby="firstname" placeholder="FIRST NAME">
                            <input type="hidden" id="idP" name="id" class="form-control" aria-describedby="firstname">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameP1" name="lastName" class="form-control" aria-describedby="lastname" placeholder="LAST NAME">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">Full Name*</label>
                            <input type="text" id="fullNameP1" name="fullName" class="form-control" aria-describedby="" readonly placeholder="FULL NAME">

                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Old Identification Number</label>
                            <input type="text" id="oldIDNoP1" name="oldIDNo" class="form-control" aria-describedby="" placeholder="0000000">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck7" value="on" {{( $parent->non_citizen ?? '' ) ? 'checked' : ''}} type="checkbox" name="non_citizen" id="non_citizen">
                                        <label class="form-check-label " for="citizen">
                                            Non-Citizen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" >New Identification Number*</label>
                                    <input type="number" id="idno7" name="idNo" value="" class="form-control" placeholder="000000000000">

                                </div>
                            </div>
                        </div>
                        {{-- new --}}
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" >ID Attachment</label>
                                    <input type="file" id="idFile" name="idFile" class="form-control" aria-describedby="">
                                    @if ($parent->idFile ?? '')
                                        Click <a href="{{ route('download', ['filename' => $parent->idFile]) }}">here</a> to see ID Attachment.
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

                                    <input type="text" id="passportparentedit" name="passport"  class="form-control" aria-describedby="passport" placeholder="PASSPORT NUMBER">
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-3">
                                    <label for="expirydate" class="form-label" >Expiry Date</label>
                                    <input type="text" id="expirydate7" value="{{ date_format(date_create($user->expiryDate), 'Y-m-d') }}" name="expiryDate"  placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" >

                            </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label" >Issuing Country</label>
                            <select class="form-select" name="issuingCountry" id="issuingCountry7" style="text-transform:uppercase">
                            <option value="" label="PLEASE CHOOSE" selected ></option>
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
                            <input type="date" id="DOBP1" name="DOB" readonly class="form-control" aria-describedby="dob" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-sm-3">
                            <label for="dob" class="form-label" >Age</label>
                            <input type="text" id="age7" name="age" readonly class="form-control" aria-describedby="" placeholder="AGE">
                        </div>
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="genderP1" style="pointer-events: none">
                                <option value="0" label="PLEASE CHOOSE"></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="passport" class="form-label">Phone Number</label>
                            <input type="text" id="contactNoP1" name="contactNo" class="form-control" aria-describedby="passport" placeholder="00000000000">
                        </div>
                        <div class="col-sm-6">
                            <label for="expirydate" class="form-label">Relationship</label>
                            <select class="form-select" name="relationship" id="relationshipP1">
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
                                        <input class="form-check-input okuCheck6 " value="on" {{($parent->oku_status ?? '') ? 'checked' : ''}} type="checkbox" name="oku_status" id="oku_status">
                                        <label class="form-check-label" for="citizen" >
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" >OKU Card Number*</label>
                                    <input type="number" id="okucard6" name="okuCardNum" value="" class="form-control"  placeholder="OKU CARD NUMBER">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label">OKU Attachment*</label>
                                    <input type="file" id="okuattach6" name="okuFile" class="form-control"  aria-describedby="">
                                    @if ($parent->okuFile ?? '')
                                    Click <a href="{{ route('download', ['filename' => $parent->okuFile]) }}">here</a> to see OKU ID.
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Address</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="form-check form-switch align-right">
                                <input class="form-check-input" type="checkbox" name="sameAddress" id="same-addressEditParent">
                                <label class="form-check-label" for="same-addressEditParent">
                                    Same as permenant address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address-1" class="form-label">Address 1*</label>
                            <input type="text" id="address1P1" name="address1" class="form-control" aria-describedby="address-1" placeholder="ADDRESS 1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="address2P1" name="address2" class="form-control" aria-describedby="address-2" placeholder="ADDRESS 2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <input type="text" id="postcodeP1" name="postcode" class="form-control" aria-describedby="postcode" placeholder="00000">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-select" name="city" id="cityP1" placeholder="CITY">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" id="stateP1" name="state">
                                <?php $state = state() ?>
                                <option value="0" label="PLEASE CHOOSE"  ></option>
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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="editParent">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
