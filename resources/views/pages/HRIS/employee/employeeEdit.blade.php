@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content"> {{--  --}}
    <h1 class="page-header">HRIS | Edit Employee</h1>
    <div class="row"> 
        <div class="col-xl-3"> 
            <div class="card"> 
                <div class="card-body">
                    <div class="profile-pic m-3"> 
                        <img src="../assets/img/user/user-13.jpg" width="100px" class="rounded d-block" alt="Profile Picture" data-bs-toggle="modal" data-bs-target="#modal-dialog">
                        <h4 class="mt-3 mb-0 fw-bold">{{$profile->fullName ?? 'Admin Tenant'}}</h4>
                        <p>{{$username ?? ''}}</p> 
                        <span class="badge bg-success d-block p-2">Active</span>
                        <div class="input-group mb-2 mt-2">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-briefcase fa-fw me-2"></i></span>
                            <input type="text" class="form-control bg-white" value="{{$userDetails->designationName ?? '-'}}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-2 mt-2">
                            <span class="input-group-text fw-light" id="basic-addon1"><i class="fas fa-address-card fa-fw me-2"></i></span>
                            <input type="text" class="form-control bg-white" value="{{$employment->workingEmail ?? '-'}}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-2 mt-2">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square fa-fw me-2"></i></span>
                            <input type="text" class="form-control bg-white" value="{{$profile->phoneNo ?? '-'}}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>

                        <!-- Tabs navs -->
                        <div class="align-items-start mt-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active text-start border border-1 mt-1 mb-1" id="v-pills-myprofile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-myprofile1" type="button" role="tab" aria-controls="v-pills-myprofile" aria-selected="true">
                                    <i class="fas fa-circle-user fa-fw"></i>
                                    My Profile
                                </button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-employment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-employment" type="button" role="tab" aria-controls="v-pills-employment" aria-selected="false"><i class="fas fa-comment-dots fa-fw"></i> Employment Details</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-vehicledetails-tab" data-bs-toggle="pill" data-bs-target="#v-pills-vehicledetails" type="button" role="tab" aria-controls="v-pills-vehicledetails" aria-selected="false"><i class="fas fa-car-side fa-fw"></i> Vehicle Details</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-eleave-tab" data-bs-toggle="pill" data-bs-target="#v-pills-eleave" type="button" role="tab" aria-controls="v-pills-eleave" aria-selected="false"><i class="fas fa-calendar-days fa-fw"></i> eLeave</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-eclaim-tab" data-bs-toggle="pill" data-bs-target="#v-pills-eclaim" type="button" role="tab" aria-controls="v-pills-eclaim" aria-selected="false"><i class="fas fa-calendar-days fa-fw"></i> eClaim</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-cashadvance-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cashadvance" type="button" role="tab" aria-controls="v-pills-cashadvance" aria-selected="false"><i class="fas fa-calendar-days fa-fw"></i> Cash Advance</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-entitlement-tab" data-bs-toggle="pill" data-bs-target="#v-pills-entitlement" type="button" role="tab" aria-controls="v-pills-entitlement" aria-selected="false"><i class="fas fa-calendar-days fa-fw"></i> Entitlement</button>
                            </div>
                        </div>
                        <!-- Tabs navs -->
                    </div> 
                </div> 
            </div> 
        </div> 
        <div class="col-xl-9"> 
            <div class="tab-pane fade show active" id="v-pills-myprofile" role="tabpanel" aria-labelledby="v-pills-myprofile-tab"> 
                <div class="card"> 
                    <div class="tab-content" id="v-pills-tabContent"> 
                        <div class="tab-pane fade show active" id="v-pills-myprofile1" role="tabpanel" aria-labelledby="v-pills-myprofile-tab"> 
                            <div class="card-header bg-white bg-gray-100"> 
                                <h4 class="fw-bold">
                                    Personal Information
                                </h4>
                                <p class="fw-light">
                                    Update Employee personal information
                                </p>
                            </div> 
                            <ul class="nav nav-tabs" id="myTab"> 
                                <li class="nav-item" >
                                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                                        <span class="d-sm-none">My Profile</span>
                                        <span class="d-sm-block d-none">My Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Qualification</span>
                                        <span class="d-sm-block d-none">Qualification</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Address Details</span>
                                        <span class="d-sm-block d-none">Address Details</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Emergency Contact</span>
                                        <span class="d-sm-block d-none">Emergency Contact</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#default-tab-5" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Companion</span>
                                        <span class="d-sm-block d-none">Companion</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#default-tab-6" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Children</span>
                                        <span class="d-sm-block d-none">Children</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#default-tab-7" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Family </span>
                                        <span class="d-sm-block d-none">Family</span>
                                    </a>
                                </li>
                            </ul> 
                            <div class="card"> 
                                <div class="card-body" id="editEmployeeJs"> 
                                    <div class="tab-content panel m-0 rounded-0 p-3"> 
                                        <div class="tab-pane fade active show" id="default-tab-1">
                                            <h4 class="mt-10px">Employee Details</h4>
                                            <br>
                                            <form id="formProfile">
                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <label for="username" class="form-label">Username*</label>
                                                        <input type="text" id="username" name="username" value="{{$username ?? ''}}" class="form-control" aria-describedby="username">
                                                        <div class="form-text">
                                                            Cannot change the username of the admin.
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="email" class="form-label">Personal Email</label>
                                                        <input type="email" id="email" name="personalEmail" value="{{$profile->personalEmail ?? ''}}" class="form-control" aria-describedby="email">
                                                        <input type="hidden" value="{{$user_id}}" name="user_id">
                                                    </div>
                            
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <label for="firstname" class="form-label">First Name*</label>
                                                        <input type="text" id="firstname" name="firstName" value="{{$profile->firstName ?? ''}}" class="form-control" aria-describedby="firstname">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="lastname" class="form-label">Last Name*</label>
                                                        <input type="text" id="lastname" name="lastName" value="{{$profile->lastName ?? ''}}" class="form-control" aria-describedby="lastname">
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <label for="firstname" class="form-label">Full Name</label>
                                                        <input type="text" id="fullname" name="fullName" value="{{$profile->fullName ?? ''}}" class="form-control" aria-describedby="firstname" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="firstname" class="form-label" style="color: red">Old Identification Number</label>
                                                        <input type="text" id="" name="" value="" class="form-control" aria-describedby="" >
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
                                                                <label for="lastname" class="form-label">New Identification Number*</label>
                                                                <input type="text" value="{{$profile->idNo ?? ''}}" name="idNo" id="idNo" class="form-control" aria-describedby="lastname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="idattach" class="form-label" style="color: red">ID Attachment</label>
                                                        <input type="file" value="" name="" id="" class="form-control" aria-describedby="">
                                                    </div>
                                                </div>
                            
                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label for="passport" class="form-label">Passport Number</label>
                                                                <input type="text" id="passport" name="passport" value="{{ $profile->passport ?? '' }}" class="form-control" aria-describedby="passport" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-3">
                                                                <label for="expirydate" class="form-label">Expiry Date</label>
                                                                <input type="text" id="expirydate" name="expiryDate" value="{{ date_format(date_create($profile->expiryDate ?? null), 'Y-m-d') ?? '' }}" class="form-control" style= "pointer-events: none;" readonly>
                                                            </div>
                                                    <div class="col-sm-3">
                                                        <label for="issuing-country" class="form-label">Issuing Country</label>
                                                        <select class="form-select" name="issuingCountry">
                                                            <option value="" label="PLEASE CHOOSE" ></option>
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
                                                                <label for="dob" class="form-label">Date Birth</label>
                                                                <input type="text" id="dob" name="DOB" value="{{ date_format(date_create($profile->DOB ?? null), 'Y-m-d') ?? '' }}" class="form-control" aria-describedby="dob" style= "pointer-events: none;" readonly>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="gender" class="form-label">Gender</label>
                                                                <select class="form-select" name="gender" id="gender">
                                                                    <?php $gender = gender() ?>
                                                                    <option value="" label="PLEASE CHOOSE" selected disabled></option>
                                                                    @foreach ($gender as $key => $status)
                                                                    <option value="{{$key}}" <?php echo ($key == $profile->gender) ? 'selected="selected"' : '' ?> >{{$status}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="issuing-country" class="form-label">Marital Status</label>
                                                        <select class="form-select" name="maritialStatus">
                                                            <?php $MaritalStatus = getMaritalStatus() ?>
                                                            <option value="" label="PLEASE CHOOSE"  selected disabled></option>
                                                            @foreach ($MaritalStatus as $key => $status)
                                                            <option value="{{$key}}" <?php echo ($key == $profile->maritialStatus) ? 'selected="selected"' : '' ?> >{{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <label for="religion" class="form-label">Religion</label>
                                                        <select class="form-select" name="religion">
                                                            <?php $religion = religion() ?>
                                                            <option value="" label="PLEASE CHOOSE"  ></option>
                                                            @foreach ($religion as $key => $status)
                                                            <option value="{{$key}}"  <?php echo ($key == $profile->religion) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="race" class="form-label">Race</label>
                                                        <select class="form-select" name="race">
                                                            <?php $race = race() ?>"PLEASE CHOOSE""Please Choose"  ></option>
                                                            @foreach ($race as $key => $status)
                                                            <option value="{{$key}}"  <?php echo ($key == $profile->race) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-6 ">
                                                                <div class="form-check form-switch align-right">
                                                                    <input class="form-check-input okuCheck" value="" type="checkbox" name=""  id="">
                                                                    <label class="form-label" for="OKU" style="color: red;">
                                                                        OKU?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                             <div class="col-sm-6">
                                                            <div class="row">
                        
                                                            <div class="col-sm-12 idnumber">
                                                                <label for="" class="form-label" style="color: red;">OKU Card Number*</label>
                                                                <input type="text" value="" name="" id="okucard" class="form-control" readonly >
                                                            </div>
                                                        </div>
                                                    </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 part">
                                                        <label for="idattach" class="form-label" style="color: red;">OKU Attachment</label>
                                                        <input type="file" class="form-control-file" id="okuattach" style="pointer-events: none">
                                                    </div> 
                                                </div>
                                                <hr class="mt-5">
                                                <h4 class="row p-2">Contact Details</h4>

                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <label for="phone-number" class="form-label">Phone Number*</label>
                                                        <input type="text" id="phone-number" name="phoneNo" value="{{$profile->phoneNo ?? ''}}" class="form-control" aria-describedby="phone-number">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="phone-number2" class="form-label" style="color: red">Phone Number 2</label>
                                                        <input type="text" id="" name="" value="" class="form-control" aria-describedby="phone-number2">
                                                    </div>
                                                </div>

                                                <div class="row p-2">
                                                    <div class="col-sm-6">
                                                        <label for="home-number" class="form-label">Home Number</label>
                                                        <input type="text" id="home-number" name="homeNo" value="{{$profile->homeNo ?? ''}}" class="form-control" aria-describedby="home-number">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="extension-number" class="form-label">Extension Number</label>
                                                        <input type="text" id="extension-number" name="extensionNo"value="{{$profile->extensionNo ?? ''}}" class="form-control" aria-describedby="extension-number">
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="modal-footer">
                                                        <button href="javascript:;" id="saveProfile" class="btn btn-primary">Update</button>
                                                            
                                                            <a class="btn btn-white btnNext" >Next</a>
                                                    </div>
                                                </div>
                                        
                                            </form>
                                        </div> 

                                        @include('pages.HRIS.employee.qualification')

                                        @include('pages.HRIS.employee.myAddress')

                                        @include('pages.HRIS.employee.myEC')

                                        @include('pages.HRIS.employee.myCompanion')

                                        @include('pages.HRIS.employee.myChildren')

                                        @include('pages.HRIS.employee.myFamily')

                                    </div>
                                </div>
                            </div>
                           
                        </div> 
                        
                        @include('pages.HRIS.employee.myEmployment')

                        @include('pages.HRIS.employee.myVehicle')

                        @include('pages.HRIS.employee.eleave')

                        @include('pages.HRIS.employee.eclaim')

                        @include('pages.HRIS.employee.cashadvance')

                        @include('pages.HRIS.employee.entitlement')

                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
@endsection
