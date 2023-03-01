<!-- UPDATE CHILDREN DETAILS -->
<div class="modal fade" id="edit-children" tabindex="-1" aria-labelledby="add-children" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-children">Update Children Details</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editChildrenForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="firstName1" name="firstName" value="" class="form-control" placeholder="FIRST NAME" aria-describedby="firstname">
                            <input type="hidden" id="id1" name="id" value="{{$user_id}}" >
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
                            <input type="text" id="" name="" value=""  class="form-control" aria-describedby="" placeholder="0000000" >
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label" >Birth of Certificate</label>
                            <input type="text" id="" name="" value=""  class="form-control" aria-describedby="" >
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-check form-switch align-right">
                                        <input class="form-check-input partCheck5" type="checkbox" id="nonCitizen1" name="nonCitizen1" {{($children->nonCitizen1 ?? '') ? 'checked' : ''}}>
                                       
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
                                <div class="col-sm-6">
                                    <label for="" class="form-label" >ID Attachment</label>
                                    <input type="file" id="" name="" value="" class="form-control" aria-describedby="">
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
                            <select class="form-select" name="issuingCountry" id="issuingCountry1">
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
                                        <input class="form-check-input okuCheck4" type="checkbox" id="" name="">
                                        <label class="form-check-label" for="citizen" >
                                            OKU?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label" >OKU Card Number*</label>
                                    <input type="text" id="okucard4" name="" value="" class="form-control" readonly aria-describedby="" placeholder="OKU CARD NUMBER" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="dob" class="form-label" >OKU Attachment*</label>
                                    <input type="file" id="okuattach4" name="" class="form-control" style="pointer-events: none" aria-describedby="">
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
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address1" class="form-label" >Address 1</label>
                            <input type="text" id="address1_1" name="address1_1" value="" class="form-control" aria-describedby="address1" placeholder="ADDRESS 1" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="address2" class="form-label" >Address 2</label>
                            <input type="text" id="address2_1" name="address2_1" value="" class="form-control" aria-describedby="address2" placeholder="ADDRESS 2" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label" >Postcode</label>
                            <input type="number" id="postcode1" name="postcode1" value="" class="form-control" placeholder="00000" style="text-transform:uppercase">
                        </div>
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label" >City</label>
                            <input type="text" id="city1" name="city1" value="" class="form-control" placeholder="CITY" style="text-transform:uppercase">
                        </div>
                        
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label" >State</label>
                            <select class="form-select" name="state1" id="state1" value="{{ $companion->state ?? '' }}" style="text-transform:uppercase" >
                                <?php $state = state() ?>
                                <option value="" label="PLEASE CHOOSE"  ></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}" >{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label" >Country</label>
                            <select class="form-select" name="country1" id="country1" value="{{ $companion->country ?? '' }}" style="text-transform:uppercase" >
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="editChildren">Update</button>
            </div>
        </div>
    </div>
</div>
