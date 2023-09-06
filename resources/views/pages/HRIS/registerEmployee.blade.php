@extends('layouts.dashboardTenant')

$@section('content')
<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">HRMIS <small>| Register Employee</small></h1>

    <div class="row" id="registerEmployee">
        <!-- BEGIN col-6 -->
        <div class="col-xl-15">
            <!-- BEGIN nav-tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Employee Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">Address Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 3</span>
                        <span class="d-sm-block d-none">Employment Details</span>
                    </a>
                </li>
            </ul>
            <!-- END nav-tabs -->
            <!-- BEGIN tab-content -->
            <div class="tab-content panel m-0 rounded-0 p-3">
                <!-- BEGIN tab-pane -->
                @include('pages.HRIS.employeeProfileForm')
                        <!-- END tab-pane -->
                        <!-- BEGIN tab-pane -->
                @include('pages.HRIS.addressDetailForm')
                        <!-- END tab-pane -->
                        <!-- BEGIN tab-pane -->
                @include('pages.HRIS.employementDetailForm')
            </div>
            <!-- END tab-pane -->
        </div>
        <!-- END col-4 -->
    </div>
    <!-- END row -->
</div>

<link href="{{env('ASSETS_URL')}}/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
<script src="{{env('ASSETS_URL')}}/plugins/switchery/dist/switchery.min.js"></script>
@endsection
