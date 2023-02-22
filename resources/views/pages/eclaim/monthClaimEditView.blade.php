@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | Update Monthly Claim</small></h1> <!-- END page-header -->
        <div class="panel panel" id="monthlyClaimJs">
            <div class="panel-body">
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="form-control">
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Claim ID</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="{{ $GNC->claim_id }}" name="claim-id" class="form-control">
                                    <input type="hidden" id="idG" value="{{ $GNC->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Claim Type</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="{{ $GNC->claim_type }}" name="claim_type" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="Draft"class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Total Amount</label>
                                </div>
                                <div class="col-md-3">
                                    <input readonly type="text" value="{{ $GNC->total_amount }}" name="claim_type" class="form-control">
                                </div>
                            </div>
                            <div class="row p-2">
                                <br>
                            </div>
                            @include('pages.eclaim.accordianMonthlyClaim')
                        </div>
                    </div>
                    <div class="col-md-6">
                        @include('pages.eclaim.tableListMonthlyClaim')
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <input type="text" value="{{ Request::segment(4) }}" id="generalId">
                    <button class="btn btn-light" id="editSubmitButton" style="color: black" type="submit"><i class="fa fa-save"></i>
                        Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
