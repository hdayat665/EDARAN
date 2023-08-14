@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Approval Role</h1>
        <div class="row" id="approveRoleJs">
            <div class="col-xl-15">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">General</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Domain</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">Company</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 3</span>
                            <span class="d-sm-block d-none">Domain 2</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content panel m-0 rounded-0 p-3">
                    @include('pages.setting.eclaim.approvalRoleGeneralTab')
                    @include('pages.setting.eclaim.approvalRoleDomainTab')
                    @include('pages.setting.eclaim.approvalRoleCompanyTab')
                    @include('pages.setting.eclaim.approvalRoleDomainTab1')
                    <div class="row p-2">
                        <div class="col align-self-start">
                            <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
