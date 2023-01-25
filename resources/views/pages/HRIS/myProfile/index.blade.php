@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">HRIS | My Profile </h1>
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body"> 
                    <div class="profile-pic m-3">
                        <img src="../assets/img/user/user-13.jpg" width="100px" class="rounded d-block" alt="Profile Picture">
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
                                <button class="nav-link active text-start border border-1 mt-1 mb-1" id="v-pills-myprofile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-myprofile" type="button" role="tab" aria-controls="v-pills-myprofile" aria-selected="true">
                                    <i class="fas fa-circle-user fa-fw"></i>
                                    My Profile
                                </button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-employment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-employment" type="button" role="tab" aria-controls="v-pills-employment" aria-selected="false"><i class="fas fa-comment-dots fa-fw"></i> Employment Details</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-changepassword-tab" data-bs-toggle="pill" data-bs-target="#v-pills-changepassword" type="button" role="tab" aria-controls="v-pills-changepassword" aria-selected="false"><i class="fas fa-unlock-keyhole fa-fw"></i> Change Password</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-vehicledetails-tab" data-bs-toggle="pill" data-bs-target="#v-pills-vehicledetails" type="button" role="tab" aria-controls="v-pills-vehicledetails" aria-selected="false"><i class="fas fa-car-side fa-fw"></i> Vehicle Details</button>
                                <button class="nav-link text-start border border-1 mt-1 mb-1" id="v-pills-eleave-tab" data-bs-toggle="pill" data-bs-target="#v-pills-eleave" type="button" role="tab" aria-controls="v-pills-eleave" aria-selected="false"><i class="fas fa-calendar-days fa-fw"></i> eLeave</button>
                            </div>
                        </div>
                        <!-- Tabs navs -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="tab-content" id="v-pills-tabContent">
                @include('pages.HRIS.myProfile.myProfile')
                @include('pages.HRIS.myProfile.myEmployment')
                @include('pages.HRIS.myProfile.changePassword')
                @include('pages.HRIS.myProfile.myVehicle')
                @include('pages.HRIS.myProfile.eLeave')
            </div>
        </div>
    </div>
</div>
@endsection
