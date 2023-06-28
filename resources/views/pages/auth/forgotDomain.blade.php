@extends('layouts.login')

@section('content')
<div class="row bg-white" id="tenantLogin" style="min-height:98vh ;">
    <a href="" class="menu-link"></a>
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-image: url(/assets/img/orbit/bh13.png);background-repeat: no-repeat; background-size: cover;">
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
            <br><br><br>
            <div class="card-body bg-white">
                <h3 class="text-center">
                    Forgot Domain
                </h3>
                <br><br><br>
                <p>Your forgotten domain will be sent to your email. If you don't get an email within a few minutes, please re-try.</p>
                <br>
                <form id="forgotDomainForm" class="fs-13px">
                    <div class="form mb-15px">
                        <input type="text" class="form-control h-45px fs-13px" name="username" placeholder="Email Address*">
                    </div>
                    <br><br>
                    <div class="mb-15px" style="display: flex; justify-content: space-between;">
                        <a href="/domainName" type="submit" class="btn btn-light d-block h-35px w-25 btn-lg fs-12px" style="color: black;"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a>
                        <button id="forgotDomainEmail" class="btn btn-primary d-block h-35px w-25 btn-lg fs-12px"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>  Submit</button>
                    </div>
                </form>
    
                <br><br><br>
                <hr class="bg-gray-600 opacity-2" />
                <div class="text-gray-600 text-center  mb-0">
                    &copy; OrbitHRM
                </div>



            </div>
        </div>
    </div>
</div>

@include('pages.auth.tenantName');
@include('pages.auth.forgotPasswordTenant');
@include('pages.auth.emailActivationTenant');

@endsection

