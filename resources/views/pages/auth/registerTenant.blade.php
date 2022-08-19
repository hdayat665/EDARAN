@extends('layouts.login')

@section('content')
<div class="row bg-white " id="registerTenant" style="min-height:98vh ;">
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-image: url({{env('ASSETS_URL')}}/img/orbit/bh.png);background-repeat: no-repeat; background-size: cover;">
        <div class="mx-auto" style="width: 60rem;">
            <div class="text-center">
                <img src="{{env('ASSETS_URL')}}/img/orbit/orbithrm-logo.png"  width="500rem" alt="Orbit" class="img-fluid">
            </div>
            <h3 class="text-primary text-center">
                Streamline and automate HR processes with OrbitHRM
            </h3>
            <div class="text-center">
                <img src="{{env('ASSETS_URL')}}/img/orbit/meeting.png" width="500rem" alt="Orbit" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="mx-auto" style="width: 30rem;">
            <div class="card-body bg-white">
                <div class="login-header mb-30px">
                    <div class="brand">
                    </div>
                    <div class="brand">
                        <h1>Tenant SignUp</h1>
                    </div>
                    <h4>Edition : <spna> {{$package}} </spna></h4>
                </div>

                <form id="form-register" class="fs-13px">
                    <h4>Tenant Information</h4>
                    <div class="form-floating mb-15px">
                        <input type="text" name="tenant" class="form-control h-45px fs-13px" placeholder="Email Address" id="tenancyName" />
                        <label for="tenancyName" class="d-flex align-items-center fs-13px text-gray-600">Tenant Name</label>
                    </div>
                    <div class="form-floating mb-15px">
                        <input type="text" name="tenancy" class="form-control h-45px fs-13px" placeholder="Email Address" id="tenantName" />
                        <label for="tenantName" class="d-flex align-items-center fs-13px text-gray-600">Tenancy Name</label>
                    </div>
                    <h4>Account settings</h4>
                    <div class="form-floating mb-15px">
                        <input type="text" name="username" class="form-control h-45px fs-13px" placeholder="Email Address" id="adminEmail" />
                        <label for="adminEmail" class="d-flex align-items-center fs-13px text-gray-600">Admin email</label>
                    </div>
                    <div class="form-floating mb-15px">
                        <input type="password" name="password" class="form-control h-45px fs-13px" placeholder="Password" id="password" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
                    </div>
                    <div class="form-floating mb-15px">
                        <input type="password" name="confirm_password" class="form-control h-45px fs-13px" placeholder="Password" id="password" />
                        <input type="hidden" name="package" value="{{$package}}" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Confirm Password</label>
                    </div>
                </form>
                <div class="mb-15px" style="display:flex;">
                    <a href="/selectPackage" class="btn btn-info d-block h-45px w-100 btn-lg fs-14px m-2">Back</a>
                    <a id="register" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px m-2">Submit</a>
                </div>

                <div class="text-gray-600 text-center  mb-0">
                    &copy; OrbitHRM
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Switch tenant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tenancy name :</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
@endsection
