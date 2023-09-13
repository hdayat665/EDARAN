@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | Apply Cash Advance</small></h1>
        <div class="panel panel" id="cashAdvanceClaimJs">
            <form id="saveForm">
                <div class="panel-body">
                    <div class="row">
                        <h4>Cash Advance Information</h4>
                        
                    </div>
                    <div class="row p-2">
                        <div class="col-md-7">
                            <div class="form-control">
                                <div class="row p-2">
                                    <div class="col-md-4"> 
                                        <label class="form-label">Type of Cash Advance</label>
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" id="toca" name="type">
                                            <option class="form-label" value="" selected>PLEASE CHOOSE</option>
                                            <option class="form-label" value="1">Project ( Outstation )</option>
                                            <option class="form-label" value="2">Project ( Non-Outstation )
                                            </option>
                                            <option class="form-label" value="3">Others ( Outstation )</option>
                                            <option class="form-label" value="4">Others ( Non-Outstation )
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                @include('pages.eclaim.projectOutstation')
                                @include('pages.eclaim.projectNonOustation')
                                @include('pages.eclaim.otherOutstation')
                                @include('pages.eclaim.otherNonOutstation')
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            @include('pages.eclaim.modeTransport')
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col align-self-start">
                        <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <!-- <button class="btn btn-light" style="color: black;" type="submit" id="btnPO"><i class="fa fa-save"></i>
                                Save</button>&nbsp; -->
                        <button class="btn btn-light" style="color: black" id="submitButton" type="submit"><i class="fa fa-save"></i>
                            Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
