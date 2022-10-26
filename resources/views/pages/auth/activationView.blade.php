@extends('layouts.login')

@section('content')
<div class="row bg-white " id="resetPassJs" style="min-height:98vh ;">
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-image: url(/assets/img/orbit/bh.png);background-repeat: no-repeat; background-size: cover;">
        <div class="mx-auto" style="width: 60rem;">
        <div class="text-center">
                <img src="/assets/img/orbit/orbithrm-logo1.png"  width="250rem" alt="Orbit" class="img-fluid">
            </div>
            <div class="text-center">
                <img src="/assets/img/orbit/meeting.png" width="500rem" alt="Orbit" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="mx-auto" style="width: 30rem;">
            <div class="text-center">
                <img src="/assets/img/orbit/orbithrm-logo.png"  width="500rem" alt="Orbit" class="img-fluid">
            </div>
            <h5 class="text-primary text-center">
                Streamline and automate HR processes with OrbitHRM
            </h5>
            <div class="card-body bg-white">
                Your Account have been activate. click <a href="/">here</a> to redirect to login page
            </div>
        </div>
    </div>
</div>

{{-- @include('pages.auth.tenantName');
@include('pages.auth.forgotPasswordTenant');
@include('pages.auth.emailActivationTenant'); --}}

@endsection

