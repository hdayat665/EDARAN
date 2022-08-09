@extends('layouts.login')

@section('content')
<div class="container" id="forgotPass">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                <div class="card-body p-5">
                    <!-- Auth header with logo image-->
                    <div class="text-center">
                        <img class="mb-3" src="assets/img/icons/background.svg" alt="..." style="height: 48px" />
                        <h1 class="display-5 mb-4">Reset Password</h1>
                    </div>
                    <!-- Reset password submission form-->
                    <form id="submitForm">
                        <div class="mb-4">
                            <mwc-textfield class="w-100" name="email" id="email" label="Email address" outlined helper="You will receive an email with a link to reset your password." helperPersistent required>
                                </mwc-textfield>
                            </div>
                    </form>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small fw-500 text-decoration-none" href="app-auth-login-basic.html">Return to login</a>
                        <a class="btn btn-primary" id="submit">Reset Password</a>
                    </div>
                </div>
            </div>
            <!-- Auth card message-->
            <div class="text-center mb-5"><a class="small fw-500 text-decoration-none link-white" href="app-auth-register-basic.html">Need an account? Sign up!</a></div>
        </div>
    </div>
</div>
@endsection
