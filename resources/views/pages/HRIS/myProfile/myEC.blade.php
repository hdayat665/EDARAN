
<div class="tab-pane fade" id="default-tab-4">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add New Emergency Contact 1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <form id="formEmergency">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-firstname" class="form-label">First Name*</label>
                            <input type="text" id="emergency-firstname" name="firstName" value="{{ $emergency->firstName ?? '' }}" class="form-control" placeholder="FIRST NAME" aria-describedby="emergency-firstname" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-lastname" class="form-label">Last Name*</label>
                            <input type="text" id="emergency-lastname" name="lastName" value="{{ $emergency->lastName ?? '' }}" class="form-control" placeholder="LAST NAME" aria-describedby="emergency-lastname" style="text-transform:uppercase">
                            <input type="hidden" name="id" value="{{$emergency->id ?? ''}}">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-contactnumber" class="form-label">Contact Number*</label>
                            <input type="text" id="emergency-contactnumber" name="contactNo" value="{{ $emergency->contactNo ?? '' }}" class="form-control" placeholder="CONTACT NUMBER" aria-describedby="emergency-contactnumber">
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-relationship" class="form-label">Relationship*</label>
                            <select class="form-select" name="relationship" value="" id="" style="text-transform:uppercase">
                                <?php $relationship = relationshipEmergencyContact() ?>
                                <option value="" label="PLEASE CHOOSE"  ></option>
                                @foreach ($relationship as $key => $status)
                                <option value="{{$key}}" <?php echo ($key == $emergency->relationship) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                @endforeach
                            </select>
                         </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-address1" class="form-label">Address 1*</label>
                            <input type="text" id="emergency-address1" name="address1" value="{{ $emergency->address1 ?? '' }}" class="form-control" aria-describedby="emergency-address1" placeholder="ADDRESS 1" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-address1" class="form-label">Address 2</label>
                            <input type="text" id="emergency-address2" name="address2" value="{{ $emergency->address2 ?? '' }}" class="form-control" aria-describedby="emergency-address2" placeholder="ADDRESS 2" style="text-transform:uppercase">
                        </div>

                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-country" class="form-label">Country*</label>
                            <select class="form-select" name="country" id="countryEC" value="{{ $emergency->country ?? '' }}" style="text-transform:uppercase;">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($country as $ct)
                                    <option value="{{ $ct->country_id }}" {{ ($emergency->country ?? '') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                @endforeach
                            </select>
                            <div id="countryEC-err" class="error"></div>
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-state" class="form-label">State*</label>
                            <select class="form-select" name="state" id="stateEC" value="" style="text-transform: uppercase;">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($state as $st)
                                    <option value="{{ $st->id }}" {{ ($emergency->state ?? '') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                @endforeach
                            </select>
                            <div id="stateEC-err" class="error"></div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-postcode" class="form-label">Postcode*</label>
                            <select class="form-select" id="postcodeEC" name="postcode" value="{{ $emergency->postcode ?? '' }}"  style="text-transform: uppercase;">
                                <option type="text"value="" label="" selected="selected">Please Choose</option>
                                @foreach($postcode as $pc)
                                    <option value="{{ $pc->postcode }}" {{ ($emergency->postcode ?? '') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                @endforeach
                            </select>
                            <div id="postcodeEC-err" class="error"></div>
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-city" class="form-label">City*</label>
                            <select class="form-select" name="city" id="cityEC" value="" style="text-transform: uppercase;">
                                <option type="text"value="" label="" selected="selected">Please Choose</option>
                                @foreach($city as $cty)
                                    <option value="{{ $cty->name }}" {{ ($emergency->city ?? '') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                @endforeach
                            </select>
                            <div id="cityEC-err" class="error"></div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="modal-footer">
                            {{-- <a  class="btn btn-white me-5px btnPrevious">Previous</a> --}}
                            <button type="submit" id="saveEmergency" class="btn btn-primary">Update</button>
                            {{-- <a class="btn btn-white me-5px btnNext">Next</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    Add New Emergency Contact 2
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-white">
                    <form id="formEmergency2">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-firstname" class="form-label">First Name*</label>
                                <input type="text" id="emergency-firstname" name="firstName_2" value="{{ $emergency->firstName_2 ?? '' }}" class="form-control" aria-describedby="emergency-firstname" style="text-transform:uppercase" placeholder="FIRST NAME">
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-lastname" class="form-label">Last Name*</label>
                                <input type="text" id="emergency-lastname" name="lastName_2" value="{{ $emergency->lastName_2 ?? '' }}" class="form-control" aria-describedby="emergency-lastname" style="text-transform:uppercase" placeholder="LAST NAME">
                                <input type="hidden" name="id" value="{{$emergency->id ?? ''}}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-contactnumber" class="form-label">Contact Number*</label>
                                <input type="text" id="emergency-contactnumber" name="contactNo_2" value="{{ $emergency->contactNo_2 ?? '' }}" class="form-control" aria-describedby="emergency-contactnumber" placeholder="CONTACT NUMBER">
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-relationship" class="form-label">Relationship*</label>
                                <select class="form-select" name="relationship_2" value="" id="" style="text-transform:uppercase">
                                    <?php $relationship = relationshipEmergencyContact() ?>
                                    <option value="" label="PLEASE CHOOSE"  ></option>
                                    @foreach ($relationship as $key => $status)
                                    <option value="{{$key}}" <?php echo ($key == $emergency->relationship_2) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-address1" class="form-label">Address 1*</label>
                                <input type="text" id="emergency-address1" name="address1_2" value="{{ $emergency->address1_2 ?? '' }}" class="form-control" aria-describedby="emergency-address1" placeholder="ADDRESS 1" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-address1" class="form-label">Address 2</label>
                                <input type="text" id="emergency-address2" name="address2_2" value="{{ $emergency->address2_2 ?? '' }}" class="form-control" aria-describedby="emergency-address2" placeholder="ADDRESS 2" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-country" class="form-label">Country*</label>
                                <select class="form-select" name="country_2" id="countryEC2" value="{{ $emergency->country_2 ?? '' }}" style="text-transform:uppercase">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($country->sortBy('country_name') as $ct)
                                        <option value="{{ $ct->country_id }}" {{ ($emergency->country_2 ?? '') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                    @endforeach
                                </select>
                                <div id="countryEC2-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-state" class="form-label">State*</label>
                                <select class="form-select" name="state_2" id="stateEC2" value="" style="text-transform: uppercase;">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($state->sortBy('state_name') as $st)
                                        <option value="{{ $st->id }}" {{ ($emergency->state_2 ?? '') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                    @endforeach
                                </select>
                                <div id="stateEC2-err" class="error"></div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-city" class="form-label">City*</label>
                                <select class="form-select" name="city_2" id="cityEC2" value="{{ $emergency->city_2 ?? '' }}" style="text-transform: uppercase;">
                                    <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                    @foreach($city->sortBy('name') as $cty)
                                        <option value="{{ $cty->name }}" {{ ($emergency->city_2 ?? '') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                    @endforeach
                                </select>
                                <div id="cityEC2-err" class="error"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-postcode" class="form-label">Postcode*</label>
                                <select class="form-select" id="postcodeEC2" name="postcode_2" value="{{ $emergency->postcode ?? '' }}"  style="text-transform: uppercase;">
                                    <option type="text" value="" label="" selected="selected">Please Choose</option>
                                    @foreach($postcode->sortBy('postcode') as $pc)
                                        <option value="{{ $pc->postcode }}" {{ ($emergency->postcode_2 ?? '') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                    @endforeach
                                </select>
                                <div id="postcodeEC2-err" class="error"></div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="modal-footer">
                                {{-- <a  class="btn btn-white me-5px btnPrevious">Previous</a> --}}
                                <button type="submit" id="saveEmergency2" class="btn btn-primary">Update</button>
                                {{-- <a class="btn btn-white me-5px btnNext">Next</a> --}}
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="modal-footer">
            <a class="btn btn-white me-5px btnPrevious">Previous</a>

            <a class="btn btn-white me-5px btnNext">Next</a>
        </div>
    </div>
</div>
