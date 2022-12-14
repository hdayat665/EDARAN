@extends('layouts.login')

@section('content')

<div class="row bg-white " id="registerTenant" style="height: 100%;">

    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; background-image: url(/assets/img/orbit/bh.png);background-repeat: no-repeat; background-size: cover;">
        <div class="mx-auto" style="width: 55rem;">
            <div class="text-center">
                <img src="/assets/img/orbit/orbithrm-logo1.png"  width="500rem" alt="Orbit" class="img-fluid">
            </div>
            <h3 class="text-primary text-center">
                Streamline and automate HR processes with OrbitHRM
            </h3>
            <div class="text-center">
                <img src="/assets/img/orbit/meeting.png" width="500rem" alt="Orbit" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center;">
        <div class="mx-auto" style="width: 30rem; height: 100%;" >
            <div class="card-body bg-white" style="height: 100%;">
                <div class="login-header mb-30px">
                    <div class="brand">
                    </div>
                    <div class="brand">
                        <h1>Domain SignUp</h1>
                    </div>
                    <h4>Edition : <spna> {{$package}} </spna></h4>
                </div>

                <form id="form-register" class="fs-13px">
                    <h4>Domain Information</h4><br>
                    <div class="form mb-15px">
                        <input type="text"class="form-control h-45px fs-13px" name="firstName" placeholder="FIRST NAME" id="firstname" style="text-transform:uppercase"/>
                    </div>
                    <div class="form mb-15px">
                        <input type="text"class="form-control h-45px fs-13px" name="lastName" placeholder="LAST NAME" id="lastname" style="text-transform:uppercase"/>
                    </div>
                    <div class="form mb-15px">
                        <input type="text" name="workingEmail" class="form-control h-45px fs-13px" placeholder="EMAIL ADDRESS" id="adminEmail" />
                    </div>
                    <div class="form mb-15px">
                        <input type="text" name="tenant" class="form-control h-45px fs-13px" placeholder="DOMAIN NAME" id="tenancyName" style="text-transform:uppercase"/>
                    </div>
                    <div class="form mb-15px">
                        <input type="text" name="tenancy" class="form-control h-45px fs-13px" placeholder="COMPANY NAME" id="tenantName" style="text-transform:uppercase"/>
                    </div>
                    <div class="form mb-15px">
                        <input type="text"class="form-control h-45px fs-13px" name="phoneNo" placeholder="PHONE NUMBER" id="phonenumber" />
                        <input type="hidden" name="package" value="{{$package}}" />
                    </div>

                    <div class="form-group form-check mb-15px">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<p  class="form-check-label" for="exampleCheck1">Your data will be allocated in Malaysia </a> </p>
					</div>
                    <div class="mb-15px">
                        <select class="form-select">
                            <option value="Malaysia"  label="Malaysia" selected="selected">Malaysia </option>
                            <option value="Singapore" label="Singapore">Singapore</option>
                            <option value="Brunei" label="Brunei">Brunei</option>
                        </select>
                    </div>
                    {{-- <div class="form-floating mb-15px">
                        <input type="password" name="password" class="form-control h-45px fs-13px" placeholder="Password" id="password" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
                    </div>
                    <div class="form-floating mb-15px">
                        <input type="password" name="confirm_password" class="form-control h-45px fs-13px" placeholder="Password" id="password" />
                        <input type="hidden" name="package" value="{{$package}}" />
                        <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Confirm Password</label>
                    </div> --}}
                    <div class="form-group form-check mb-15px">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <p  class="form-check-label" for="exampleCheck1">I agree to terms of <a href="#"> service & privacy policy </a> </p>
                    </div>
                    <div class="mb-15px" style="display:flex;">
                        <a href="/selectPackage" class="btn btn-info d-block h-45px w-100 btn-lg fs-14px m-2">Back</a>
                        <button type="submit" id="register" class="btn btn-primary d-block h-45px w-100 btn-lg fs-14px m-2">Submit</button>
                    </div>
                </form>

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
                        <label for="recipient-name" class="col-form-label">Domain name :</label>
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
