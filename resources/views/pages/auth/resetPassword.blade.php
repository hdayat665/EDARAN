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
            </h5><br>

            <div class="card-body bg-white">
                <h3>Reset Password</h3>
                <br>
                <form id="resetPassForm" class="fs-13px">
                    <div class="form-floating mb-15px">
                        <input type="password" name="password" class="form-control h-45px fs-13px"  id="password" />
                        <input type="hidden" name="user_id" value="{{$user_id}}" class="form-control h-45px fs-13px" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
                    </div>
                    <div class="form-floating mb-15px">
                        <input type="password" name="confirm_password" class="form-control h-45px fs-13px"  id="password" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Confirm Password</label>
                    </div>
                    <div class="mb-15px">
                        <button type="submit" id="resetPass" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @include('pages.auth.tenantName');
@include('pages.auth.forgotPasswordTenant');
@include('pages.auth.emailActivationTenant'); --}}

@endsection

