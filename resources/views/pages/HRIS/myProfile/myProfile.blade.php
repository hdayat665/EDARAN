

<div class="tab-pane fade show active" id="v-pills-myprofile" role="tabpanel" aria-labelledby="v-pills-myprofile-tab">
    <div class="card">
        <div class="card-header bg-white bg-gray-100">
            <h4 class="fw-bold">
                Personal Information
            </h4>
            <p class="fw-light">
                Update your personal information
            </p>
        </div>
        
        <div class="card-body" id="myProfile">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">My Profile</span>
                        <span class="d-sm-block d-none">My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Address Details</span>
                        <span class="d-sm-block d-none">Address Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Emergency Contact</span>
                        <span class="d-sm-block d-none">Emergency Contact</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Companion</span>
                        <span class="d-sm-block d-none">Companion</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-5" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Children</span>
                        <span class="d-sm-block d-none">Children</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-6" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Family Particular</span>
                        <span class="d-sm-block d-none">Family Particular</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content panel m-0 rounded-0 p-3">

                <div class="tab-pane fade active show" id="default-tab-1">
                    <h4 class="mt-10px">Personal Details</h4>
                    <br>
                    <form id="formProfile">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="username" class="form-label">Username*</label>
                                <input type="text" id="username" name="username" readonly value="{{$username ?? ''}}" class="form-control" aria-describedby="username">
                                <div class="form-text">
                                    Cannot change the username of the admin.
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="form-label">Personal Email*</label>
                                <input type="email" id="email" name="personalEmail" value="{{$profile->personalEmail ?? ''}}" class="form-control" aria-describedby="email">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstname" name="firstName" value="{{$profile->firstName ?? ''}}" class="form-control" aria-describedby="firstname" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastname" name="lastName" value="{{$profile->lastName ?? ''}}" class="form-control" aria-describedby="lastname" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">Full Name</label>
                                <input type="text" readonly id="fullName" name="fullName" value="{{$profile->fullName ?? ''}}" class="form-control" aria-describedby="firstname" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    
                                    <div class="col-sm-12 idnumber">
                                        <label for="lastname" class="form-label">Identification Number*</label>
                                        <input type="text" value="{{$profile->idNo ?? ''}}" name="idNo" id="idnumber" class="form-control" aria-describedby="lastname" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                <div class="col-sm-6 ">
                                        <div class="form-check form-switch align-right">
                                            <input class="form-check-input partCheck" value="door3" type="checkbox" name="nonNetizen" {{($profile->nonNetizen ?? '') ? 'checked' : ''}} id="citizen">
                                            <label class="form-label" for="citizen">
                                                Non-Citizen
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 part" >
                                        <label for="passport" class="form-label">Passport Number</label>
                                        <input type="text" id="passportmyprofile" name="passport" value="{{ $profile->passport ?? '' }}" class="form-control" aria-describedby="passport" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 part" >
                                        <label for="expirydate" class="form-label">Expiry Date</label>
                                        <input type="text" id="expirydatemyprofile" name="expiryDate" value="{{ date_format(date_create($profile->expiryDate ?? null), 'Y-m-d') ?? '' }}" class="form-control" aria-describedby="expirydate" readonly style= "pointer-events: none;">
                                    </div>
                            <div class="col-sm-3">
                                <label for="issuing-country" class="form-label">Issuing Country</label>
                                <select class="form-select" name="issuingCountry" style="text-transform:uppercase">
                                    <option value="MY" label="Malaysia" selected ></option>
                                    <?php
                                        $americass = americas();
                                        $asias = asias();
                                    ?>
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $profile->issuingCountry) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $profile->issuingCountry) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="text"  name="DOB" id="dob"  value="{{ date_format(date_create($profile->DOB ?? null), 'Y-m-d') ?? '' }}" class="form-control" aria-describedby="dob" style= "pointer-events: none;" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" name="gender" id="gender" style="text-transform:uppercase">
                                            <?php $gender = gender() ?>
                                            <option value="" label="Please Choose"></option>
                                            @foreach ($gender as $key => $status)
                                            <option value="{{$key}}" <?php echo ($key == $profile->gender) ? 'selected="selected"' : '' ?> >{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="issuing-country" class="form-label">Marital Status</label>
                                <select class="form-select" name="maritialStatus" id="maritialStatus" style="text-transform:uppercase">
                                    <?php $MaritalStatus = getMaritalStatus() ?>
                                    <option value="" label="Please Choose" ></option>
                                    @foreach ($MaritalStatus as $key => $status)
                                    <option value="{{$key}}" <?php echo ($key == $profile->maritialStatus) ? 'selected="selected"' : '' ?> >{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="religion" class="form-label">Religion</label>
                                <select class="form-select" name="religion" id="religion" style="text-transform:uppercase">
                                    <?php $religion = religion() ?>
                                    <option value="" label="Please Choose"></option>
                                    @foreach ($religion as $key => $status)
                                    <option value="{{$key}}"  <?php echo ($key == $profile->religion) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-sm-6">
                                <label for="race" class="form-label">Race</label>
                                <select class="form-select" name="race" id="race" style="text-transform:uppercase">
                                    <?php $race = race() ?>
                                    <option value="" label="Please Choose"></option>
                                    @foreach ($race as $key => $status)
                                    <option value="{{$key}}"  <?php echo ($key == $profile->race) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <h4 class="row p-2">Contact Details</h4>
                        <div class="col p-2">
                            <label for="phone-number" class="form-label">Phone Number*</label>
                            <input type="text" id="phone-number" name="phoneNo" value="{{$profile->phoneNo ?? ''}}" class="form-control" aria-describedby="phone-number">
                        </div>
                        <div class="col p-2">
                            <label for="home-number" class="form-label">Home Number</label>
                            <input type="text" id="home-number" name="homeNo" value="{{$profile->homeNo ?? ''}}" class="form-control" aria-describedby="home-number">
                        </div>
                        <div class="col p-2">
                            <label for="extension-number" class="form-label">Extension Number</label>
                            <input type="text" id="extension-number" name="extensionNo"value="{{$profile->extensionNo ?? ''}}" class="form-control" aria-describedby="extension-number">
                        </div>
                    
                    
                    <p class="text-end mb-0 mt-3">
                        <a href="javascript:;" class="btn btn-white me-5px">Previous</a>
                        <button type="submit" id="saveProfile" class="btn btn-primary">Save</button>
                        
                    </p>
                    </form>
                </div>

                @include('pages.HRIS.myProfile.myAddress')

                @include('pages.HRIS.myProfile.myEC')

                @include('pages.HRIS.myProfile.myCompanion')

                @include('pages.HRIS.myProfile.myChildren')

                @include('pages.HRIS.myProfile.myFamily')
            </div>


        </div>
    </div>


</div>


