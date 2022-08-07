@extends('layouts.login')

@section('content')
<div class="container" id="register">
    <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-10">
            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-5">
                <div class="card-body p-5">
                    <!-- Auth header with logo image-->
                    <div class="text-center">
                        <img class="mb-3" src="/public/assets/img/img/icons/background.svg" alt="..." style="height: 48px" />
                        <h1 class="display-5 mb-0">Create New Account</h1>
                        <div class="subheading-1 mb-5">to continue to app</div>
                    </div>
                    <!-- Register new account form-->
                    <form id="submitForm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <mwc-textfield class="w-100" label="First Name" name="first_name" outlined></mwc-textfield>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <mwc-textfield class="w-100" label="Last Name" name="last_name" outlined></mwc-textfield>
                            </div>
                        </div>
                        <div class="mb-4">
                            <mwc-textfield class="w-100" label="Email Address" name="email" outlined></mwc-textfield>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <mwc-textfield class="w-100" label="Domain Name" name="domain" outlined></mwc-textfield>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <mwc-textfield class="w-100" label="Company Name" name="company" outlined></mwc-textfield>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <mwc-textfield class="w-100" label="Phone Number" name="phone" outlined></mwc-textfield>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <mwc-textfield class="w-100" type="password" label="Password" name="password" outlined></mwc-textfield>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <mwc-textfield class="w-100" type="password" label="Confirm Password" name="confirm_password" outlined></mwc-textfield>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                            <mwc-formfield label="Your data will be allocated in Malaysia" ><mwc-checkbox name="allocated_malaysia"></mwc-checkbox></mwc-formfield>

                            </div>
                            <div class="col-sm-6 mb-4">
                                <mwc-select outlined class="w-100" label="Location" name="location">
                                    <mwc-list-item></mwc-list-item>
                                    <mwc-list-item value="0">Item 0</mwc-list-item>
                                    <mwc-list-item value="1">Item 1</mwc-list-item>
                                    <mwc-list-item value="2">Item 2</mwc-list-item>
                                    <mwc-list-item value="3">Item 3</mwc-list-item>
                                </mwc-select>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <mwc-formfield label="I agree to the website terms and conditions"><mwc-checkbox name="terms"></mwc-checkbox></mwc-formfield>
                        </div>
                    </form>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small fw-500 text-decoration-none" href="app-auth-login-basic.html">Sign in instead</a>
                        <span class="btn btn-primary" id="submit">Create Account</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

