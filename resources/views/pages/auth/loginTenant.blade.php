@extends('layouts.login')

@section('content')
<div class="row bg-white " id="tenantLogin" style="min-height:98vh ;">
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-image: url(/public/assets/img/orbit/bh.png);background-repeat: no-repeat; background-size: cover;">
        <div class="mx-auto" style="width: 60rem;">

            <div class="text-center">
                <img src="/public/assets/img/orbit/meeting.png" width="500rem" alt="Orbit" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="mx-auto" style="width: 30rem;">
            <div class="text-center">
                <img src="/public/assets/img/orbit/orbithrm-logo.png"  width="500rem" alt="Orbit" class="img-fluid">
            </div>
            <h5 class="text-primary text-center">
                Streamline and automate HR processes with OrbitHRM
            </h5>
            <div class="card-body bg-white">
                <div class="login-header mb-30px">
                    <div class="brand">
                        <p>Current tenant <span id="tenant">not selected</span> .
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-primary"> Change here.</a>
                        </p>

                    </div>
                    <div class="brand">
                        <h1>Login</h1>
                    </div>
                </div>

                <form id="loginForm" class="fs-13px">
                    @csrf
                    <div class="form-floating mb-15px">
                        <input type="text" name="username" class="form-control h-45px fs-13px" placeholder="Email Address" id="emailAddress" />
                        <input type="hidden" name="tenant" id="tenantInput" />
                        <label for="emailAddress" class="d-flex align-items-center fs-13px text-gray-600">Email Address</label>
                    </div>
                    <div class="form-floating mb-15px">
                        <input type="password" name="password" class="form-control h-45px fs-13px" placeholder="Password" id="password" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
                    </div>
                    <div class="form-check mb-30px">
                        <input class="form-check-input" type="checkbox" value="1" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">
                            Remember Me
                        </label>
                    </div>
                </form>
                <div class="mb-15px">
                    <button type="button" id="login" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px">Log in</button>
                </div>
                <div class="mb-40px pb-40px text-dark">
                    Not a member yet?
                    <br>
                    <a href="/selectPackage" class="text-primary">New tenant</a> |
                    <a href="register_v3.html" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="text-primary"> Email Activation</a> |
                    <a href="register_v3.html" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="text-primary"> Forgot Password</a>
                </div>
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

