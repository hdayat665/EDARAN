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
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">My Profile</span>
                        <span class="d-sm-block d-none">My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Qualification</span>
                        <span class="d-sm-block d-none">Qualification</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Address Details</span>
                        <span class="d-sm-block d-none">Address Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Emergency Contact</span>
                        <span class="d-sm-block d-none">Emergency Contact</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-5" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Companion</span>
                        <span class="d-sm-block d-none">Companion</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-6" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Children</span>
                        <span class="d-sm-block d-none">Children</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-7" data-bs-toggle="tab" class="nav-link">
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
                                <input type="email" id="email" name="personalEmail" value="{{$profile->personalEmail ?? ''}}" class="form-control" aria-describedby="email" placeholder="email@gmail.com">
                            </div>

                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First Name*</label>
                                <input type="text" id="firstname" name="firstName" value="{{$profile->firstName ?? ''}}" class="form-control" aria-describedby="firstname" placeholder="FIRST NAME" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last Name*</label>
                                <input type="text" id="lastname" name="lastName" value="{{$profile->lastName ?? ''}}" class="form-control" aria-describedby="lastname" placeholder="LAST NAME" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">Full Name</label>
                                <input type="text" readonly id="fullName" name="fullName" value="{{$profile->fullName ?? ''}}" class="form-control" aria-describedby="firstname" placeholder="FULL NAME" style="text-transform:uppercase">
                            </div>
                            {{-- new --}}
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12 idnumber">
                                        <label for="" class="form-label">Old Identification Number </label>
                                        <input type="text" value="{{$profile->oldIDNo ?? ''}}" name="oldIDNo" id="oldidnumber" class="form-control" placeholder="0000000">
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
                                     <div class="col-sm-6">
                                    <div class="row">

                                    <div class="col-sm-12 idnumber">
                                        <label for="lastname" class="form-label">New Identification Number*</label>
                                        <input type="text" value="{{$profile->idNo ?? ''}}" name="idNo" id="idnumber" class="form-control" aria-describedby="lastname" placeholder="000000-00-0000">
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                            {{-- new --}}
                            <div class="col-sm-3 part">
                                <label for="idattach" class="form-label" style="color: red;">ID Attachment</label>
                                <input type="file" class="form-control-file" id="">
                            </div> 
                        </div>

                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12 part">
                                        <label for="passport" class="form-label">Passport Number</label>
                                        <input type="text" id="passportmyprofile" name="passport" value="{{ $profile->passport ?? '' }}" class="form-control" aria-describedby="passport" placeholder="A00000000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 part">
                                <label for="expirydate" class="form-label">Expiry Date*</label>
                                <input type="text" id="expirydatemyprofile" name="expiryDate" value="{{ date_format(date_create($profile->expiryDate ?? null), 'Y-m-d') ?? '' }}" placeholder="YYYY-MM-DD" class="form-control" aria-describedby="expirydate" style="pointer-events: none;" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="issuing-country" class="form-label">Issuing Country*</label>
                                <select class="form-select" name="issuingCountry" style="text-transform:uppercase">
                                    <option value="MY" label="Malaysia" selected></option>
                                    <?php
                                    $americass = americas();
                                    $asias = asias();
                                    ?>
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $profile->issuingCountry) ? 'selected="selected"' : '' ?>>{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $profile->issuingCountry) ? 'selected="selected"' : '' ?>>{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div> 
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="dob" class="form-label">Date Of Birth</label>
                                        <input type="text" name="DOB" id="dob" value="{{ date_format(date_create($profile->DOB ?? null), 'Y-m-d') ?? '' }}" placeholder="YYYY/MM/DD" class="form-control" aria-describedby="dob" style="pointer-events: none;" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="gender" class="form-label">Gender*</label>
                                        <select class="form-select" name="gender" id="gender" style="text-transform:uppercase">
                                            <?php $gender = gender() ?>
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($gender as $key => $status)
                                            <option value="{{$key}}" <?php echo ($key == $profile->gender) ? 'selected="selected"' : '' ?>>{{$status}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="issuing-country" class="form-label">Marital Status*</label>
                                <select class="form-select" name="maritialStatus" id="maritialStatus" >
                                    <?php $MaritalStatus = getMaritalStatus() ?>
                                    <option value="" label="PLEASE CHOOSE"></option>
                                    @foreach ($MaritalStatus as $key => $status)
                                    <option value="{{$key}}" <?php echo ($key == $profile->maritialStatus) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="religion" class="form-label">Religion</label>
                                <select class="form-select" name="religion" id="religion" style="text-transform:uppercase">
                                    <?php $religion = religion() ?>
                                    <option value="" label="PLEASE CHOOSE"></option>
                                    @foreach ($religion as $key => $status)
                                    <option value="{{$key}}" <?php echo ($key == $profile->religion) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="race" class="form-label">Race</label>
                                <select class="form-select" name="race" id="race" style="text-transform:uppercase">
                                    <?php $race = race() ?>
                                    <option value="" label="PLEASE CHOOSE"></option>
                                    @foreach ($race as $key => $status)
                                    <option value="{{$key}}" <?php echo ($key == $profile->race) ? 'selected="selected"' : '' ?>>{{$status}}</option>
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
                                            <input class="form-check-input okuCheck" {{($profile->okuStatus ?? '') ? 'checked' : ''}} type="checkbox" name="okuStatus"  id="OKU">
                                            <label class="form-label" for="OKU" style="color: red;">
                                                OKU?
                                            </label>
                                        </div>
                                    </div>
                                     <div class="col-sm-6">
                                    <div class="row">

                                    <div class="col-sm-12 idnumber">
                                        <label for="" class="form-label" style="color: red;">OKU Card Number*</label>
                                        <input type="text" value="" name="" id="okucard" class="form-control" readonly placeholder="OKU CARD NUMBER">
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                            <div class="col-sm-3 part">
                                <label for="idattach" class="form-label" style="color: red;">OKU Attachment*</label>
                                <input type="file" class="form-control-file" id="okuattach" style="pointer-events: none">
                            </div> 
                        </div>
                        <hr class="mt-5">
                        <h4 class="p-2">Contact Details</h4>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="col p-2">
                                    <label for="phone-number" class="form-label">Phone Number*</label>
                                    <input type="text" id="phone-number" name="phoneNo" value="{{$profile->phoneNo ?? ''}}" class="form-control" aria-describedby="phone-number" placeholder="000-00000000">
                                </div>
                            </div>
                            {{-- new --}}
                            <div class="col-md-6">
                                <div class="col p-2">
                                    <label for="phone-number2" class="form-label">Phone Number 2</label>
                                    <input type="text" id="phone-number" name="phoneNo2" value="{{$profile->phoneNo2 ?? ''}}" class="form-control" aria-describedby="" placeholder="000-00000000">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="col p-2">
                                    <label for="home-number" class="form-label">Home Number</label>
                                    <input type="text" id="home-number" name="homeNo" value="{{$profile->homeNo ?? ''}}" class="form-control" aria-describedby="home-number" placeholder="00-0000000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col p-2">
                                    <label for="extension-number" class="form-label">Extension Number</label>
                                    <input type="text" id="extension-number" name="extensionNo" value="{{$profile->extensionNo ?? ''}}" class="form-control" aria-describedby="extension-number" placeholder="0000">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="modal-footer">
                                <button type="submit" id="saveProfile" class="btn btn-primary">Update</button>
                                
                                <a class="btn btn-white btnNext" >Next</a>
                            </div>
                        </div>
                    </form>
                </div>

                @include('pages.HRIS.myProfile.qualification')

                @include('pages.HRIS.myProfile.myAddress')

                @include('pages.HRIS.myProfile.myEC')

                @include('pages.HRIS.myProfile.myCompanion')

                @include('pages.HRIS.myProfile.myChildren')

                @include('pages.HRIS.myProfile.myFamily')
            </div>


        </div>
    </div>


</div>