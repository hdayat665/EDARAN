@extends('layouts.login')

@section('content')
<div class="row bg-white"  id="tenantLogin" style="min-height:98vh ;">
    <a href="/domainName" class="menu-link"></a>
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
            <br><br>
            <div class="card-body bg-white">
                <h3 class="text-center">
                    Domain Login
                </h3>
                <br><br><br>
                <p>Please Enter Your Orbit Domain.</p>
                <form id="submitForm" class="fs-13px">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Domain name :</label>
                        <input type="text" class="form-control" name="tenant" id="recipient-name">
                    </div>
                    <div class="mb-15px" style="display: flex; justify-content: space-between;">
                        <a href="/selectPackage" class="btn btn-link d-block h-45px w-30 btn-lg fs-14px">New to Orbit?</a>
                        <a href="/forgotDomain" class="btn btn-link d-block h-45px w-30 btn-lg fs-14px">Forgot Domain?</a>
                    </div>
                    <br>
                    <div class="mb-15px">
                        <button type="button" id="tenantNameSubmit" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px">Proceed</button>
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


@endsection

