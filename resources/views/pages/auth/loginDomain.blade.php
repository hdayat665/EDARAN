@extends('layouts.login')

@section('content')
<div class="container" id="loginDomain">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form id="submitForm">
                <div class="card card-login card-hidden">
                    <div class="card-header card-header-info text-center">
                        <h4 class="card-title">Login Domain</h4>
                        <div class="social-line">
                        </div>
                    </div>
                    <div class="card-body ">
                        <p class="card-description text-center">Or Be Classical</p>
                        <span class="bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="username" placeholder="Email..." required>
                            </div>
                        </span>
                        <span class="bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password..." required>
                            </div>
                        </span>
                    </div>
                    <div class="card-footer justify-content-center">
                    </div>
                </div>
            </form>
            <div class="card card-login card-hidden" style="margin-top: -3rem">
                <div class="card-footer justify-content-center">
                    <span id="submit" class="btn btn-info btn-link btn-lg">Login</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
