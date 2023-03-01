<div class="modal fade" id="add-children" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-children">Add Children Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addChildrenForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstNameChild" name="firstName" value="" class="form-control" aria-describedby="firstname" placeholder="FIRST NAME" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="lastNameChild" name="lastName" value=""  class="form-control" aria-describedby="lastname" placeholder="LAST NAME" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" id="fullNameChild" readonly name="fullName" value=""  class="form-control" aria-describedby="fullname" placeholder="FULL NAME" style="text-transform:uppercase">
                        </div>
                        {{-- new --}}
                        <div class="col-md-3">
                            <label for="" class="form-label" >Old Identification Number</label>
                            <input type="text" id="oldIdNumber"  name="oldIDNo" value="{{$profile->oldIDNo ?? ''}}"  class="form-control" style="text-transform:uppercase" placeholder="0000000">
                        </div>
                        {{-- new --}}
                        <div class="col-md-3">
                            <label for="" class="form-label" >Birth of Certificate</label>
                            <input type="file" id=""  name="" value=""  class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                    <!-- <input class="form-check-input partCheck" value="door3" type="checkbox" name="nonNetizen" {{($profile->nonNetizen ?? '') ? 'checked' : ''}} id="citizen"> -->
                                        <input class="form-check-input partCheck7" value="" type="checkbox" name="nonCitizen" {{($children->nonCitizen ?? '') ? 'checked' : ''}} id="citizen">
                                        <label class="form-check-label" for="citizen">
                                            Non-Citizen?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">New Identification Number*</label>
                                    <input type="number" id="idnumber4" name="idNo" value="" class="form-control" placeholder="000000000000">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                {{-- new --}}
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" >ID Attachment</label>
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
                                  
                                    <input type="text" id="passportChild" name="passport"  class="form-control" aria-describedby="passport" placeholder="PASSPORT NUMBER">
                                </div>
                                {{-- <div class="col-sm-6">
                                    <label for="expirydate" class="form-label">Expiry Date*</label>
                                    <input type="text" id="expiryDateChild" name="expiryDate"  placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" style="pointer-events: none;" readonly>
                                
                                </div> --}}
                            </div>
                        </div>
                          <div class="col-sm-3">
                                    <label for="expirydate" class="form-label">Expiry Date*</label>
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
                            <label for="dob" class="form-label">Date Of Birth</label>
                            <input type="text" id="dob4" name="DOB" class="form-control" aria-describedby="dob" readonly placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-sm-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" id="age4" name="age" class="form-control" aria-describedby="age" readonly placeholder="AGE">
                        </div>

                        <div class="col-sm-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="childgender" style="text-transform:uppercase">
                            <?php $childgender = gender() ?>
                                <option value="" label="PLEASE CHOOSE" selected="selected"></option>
                                @foreach ($childgender as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="issuing-country" class="form-label">Marital Status</label>
                            <select class="form-select" name="maritalStatus" id="" style="text-transform:uppercase">
                                <option value="" label="PLEASE CHOOSE"></option>
                                @foreach ($maritalStatus as $key => $status)
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
                                        <input class="form-check-input okuCheck3" type="checkbox" id="nonCitizen1" name="nonCitizen1" {{($children->nonCitizen1 ?? '') ? 'checked' : ''}}>
                                       
                                        <label class="form-check-label" for="citizen" >
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" >OKU Card Number*</label>
                                    <input type="text" id="okucard3" name=""  value="" class="form-control" aria-describedby="" placeholder="OKU CARD NUMBER" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" >OKU Attachment*</label>
                                    <input type="file" id="okuattach3" name="" class="form-control" style="pointer-events: none" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Education Information</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="education-type" class="form-label">Education Type</label>
                            <select class="form-select" name="educationType" id="" style="text-transform:uppercase">
                                <option value="0" label=" PLEASE CHOOSE"></option>
                                @foreach ($educationType as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-level" class="form-label">Education Level</label>
                            <select class="form-select" name="educationLevel" id="" style="text-transform:uppercase">
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
                            <input type="text" name="instituition" id="" class="form-control" aria-describedby="institution-name" placeholder="INSTITUITION NAME" style="text-transform:uppercase">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Supporting Documents</label>
                            <input type="file"  class="form-control" name="supportDoc">
                        </div>
                    </div>
                    


                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address1" class="form-label" >Address 1*</label>
                            <input type="text" id="" name="address1" value="" class="form-control" aria-describedby="address1" placeholder="ADDRESS 1" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="address2" class="form-label" >Address 2</label>
                            <input type="text" id="" name="address2" value="" class="form-control" aria-describedby="address2" placeholder="ADDRESS 2" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" >Postcode*</label>
                            <input type="number" id="" name="postcode" value="" class="form-control" style="text-transform:uppercase" placeholder="00000">
                        </div>
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label" >City*</label>
                            <input type="text" id="" name="city" value="" class="form-control" style="text-transform:uppercase" placeholder="CITY">
                        </div>
                        
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label" >State*</label>
                            <select class="form-select" name="state" id="statecom" value="{{ $companion->state ?? '' }}" style="text-transform:uppercase" >
                                <?php $state = state() ?>
                                <option value="" label="PLEASE CHOOSE"  ></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}" >{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label" >Country*</label>
                            <select class="form-select" name="country" id="countrycom" value="{{ $companion->country ?? '' }}" style="text-transform:uppercase" >
                                <option value="MY" label="Malaysia" selected ></option>
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
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button href="javascript:;" id="addChildren" class="btn btn-primary">Save</button>
               
            </div>
            </form>
        </div>
    </div>
</div>

@include('modal.myProfile.editChildren')
@include('modal.myProfile.viewChildren')
