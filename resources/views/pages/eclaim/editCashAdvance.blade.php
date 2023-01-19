@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">eClaim <small>| My Claim | View Cash Advance | Project ( Outstation )</small></h1>
        <div class="panel panel" id="editCashAdvanceJs">
            <div class="panel-body">
                <form id="saveForm">
                    @if ($cashClaim->type == 1)
                        @include('pages.eclaim.editProjectOutstation')
                    @elseif($cashClaim->type == 2)
                        @include('pages.eclaim.editProjectNonOutstation')
                    @elseif($cashClaim->type == 3)
                        @include('pages.eclaim.editOtherOutstation')
                    @elseif($cashClaim->type == 4)
                        @include('pages.eclaim.editOtherNonOutstation')
                    @endif
                    <div class="row p-2">
                        <div class="col align-self-start">
                            <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-light" id="saveButton" style="color: black" type="submit"><i class="fa fa-save"></i> Save</button>&nbsp;
                            <button class="btn btn-light" id="submitButton" style="color: black" type="submit"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
