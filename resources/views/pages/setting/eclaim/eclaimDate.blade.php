@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Claims Date</h1>
        <div class="panel panel" id="eclaimDateJs">
            <div class="panel-body">
                <form id="submitForm">
                    <div class="">
                        <div class="row">
                            <h3>Configure Claim Date</h3>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <div class="row p-2">
                                    <label for="submitClaim" class="col-sm-5 col-form-label">Submit Claim to Admin
                                        on Every :
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipsubmitclaim"
                                            title="Setup the claim batch date that should be moved to Admin approver">
                                        </i>
                                    </label>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="" name="submit_claim_day_admin">
                                            <option class="form-label" value="">Please Select</option>
                                            <option class="form-label" value="1">1hb</option>
                                            <option class="form-label" value="2">2hb</option>
                                            <option class="form-label" value="3">3hb</option>
                                            <option class="form-label" value="4">4hb</option>
                                            <option class="form-label" value="5">5hb</option>
                                            <option class="form-label" value="6">6hb</option>
                                            <option class="form-label" value="7">7hb</option>
                                            <option class="form-label" value="8">8hb</option>
                                            <option class="form-label" value="9">9hb</option>
                                            <option class="form-label" value="10">10hb</option>
                                            <option class="form-label" value="11">11hb</option>
                                            <option class="form-label" value="12">12hb</option>
                                            <option class="form-label" value="13">13hb</option>
                                            <option class="form-label" value="14">14hb</option>
                                            <option class="form-label" value="15">15hb</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row p-2">
                                    <label for="expiredate" class="col-sm-5 col-form-label">Open Claim Duration <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)"
                                            data-toggle="tooltipexpiredate" title="User can decide duration to open claim 
                            "></i></label>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="" name="open_claim_duration">
                                            <option class="form-label" value="">Please Select</option>
                                            <option class="form-label" value="1">1 Month</option>
                                            <option class="form-label" value="2">2 Month</option>
                                            <option class="form-label" value="3">3 Month</option>
                                            <option class="form-label" value="4">4 Month</option>
                                            <option class="form-label" value="5">5 Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row p-2">
                                    <label for="claimfinance" class="col-sm-5 col-form-label">Submit Claim to
                                        Finance on Every: <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipsubmitclaim"
                                            title="Setup the claim batch date that should be 
                            moved to Finance approver
                            "></i></label>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="" name="submit_claim_day_finance">
                                            <option class="form-label" value="">Please Select</option>
                                            <option class="form-label" value="16">16hb</option>
                                            <option class="form-label" value="17">17hb</option>
                                            <option class="form-label" value="18">18hb</option>
                                            <option class="form-label" value="19">19hb</option>
                                            <option class="form-label" value="20">20hb</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row p-2">
                                    <label for="claimsubmit" class="col-sm-5 col-form-label">Table List Display:
                                        <i class="fa fa-question-circle" style="color:rgba(0, 81, 255, 0.904)" data-toggle="tooltipclaimsubmit"
                                            title="Number of row will be display on user claim page"></i></label>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="" name="table_row_display">
                                            <option class="form-label" value="">Please Select</option>
                                            <option class="form-label" value="1">1 row</option>
                                            <option class="form-label" value="2">2 row</option>
                                            <option class="form-label" value="3">3 row</option>
                                            <option class="form-label" value="4">4 row</option>
                                            <option class="form-label" value="5">5 row</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col align-self-start">
                            <a href="/setting" class="btn btn-light" style="color: black" type="submit" name="" id=""><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-light" id="submitButton" type="submit" style="color: black" name="" id=""><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
