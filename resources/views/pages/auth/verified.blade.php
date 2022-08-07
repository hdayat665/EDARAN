@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Error message content-->
            <div class="text-center my-5 mt-sm-10">
                <img class="img-fluid mb-4" src="/public/assets/img/img/illustrations/create.svg" style="max-width: 30rem" />
                <p class="lead text-white">Your account has been verified.</p>
                <a class="btn btn-primary" href="/loginView">
                    <i class="material-icons leading-icon">arrow_back</i>
                    Return to Login Pages
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
