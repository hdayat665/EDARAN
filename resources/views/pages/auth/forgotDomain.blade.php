@extends('layouts.login')

@section('content')
<div class="container" id="forgotDomain">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form id="submitForm">
                <div class="card card-login card-hidden">
                    <div class="card-header card-header-info text-center">
                        <h4 class="card-title">Forgot Domain?</h4>
                        <div class="social-line">
                        </div>
                    </div>
                    <div class="card-body ">
                        <p class="card-description text-center">A domain name will be sent to your email. If you don't get an email within a few minutes, please re-try.
                        </p>
                        <span class="bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="Email..." required>
                            </div>
                        </span>
                    </div>
                    <div class="card-footer justify-content-center">
                    </div>
                </div>
            </form>
            <div class="card card-login card-hidden" style="margin-top: -3rem">
                <div class="card-footer justify-content-center">
                    <span id="submit" class="btn btn-info btn-link btn-lg">Submit</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
