@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Approval Configuration</h1>
        <div class="row" id="approvalConfigJs">
            <div class="col-xl-15">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Monthly Claim</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-2" id="tab2" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">General Claim</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-3" id="tab3" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 3</span>
                            <span class="d-sm-block d-none">Cash Advance</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content panel m-0 rounded-0 p-3">
                    @include('pages.setting.eclaim.monthlyClaimTab')
                    @include('pages.setting.eclaim.generalClaimTab')
                    @include('pages.setting.eclaim.cashAdvanceTab')
                    <div class="row">
                        <div class="col align-self-start">
                            <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
