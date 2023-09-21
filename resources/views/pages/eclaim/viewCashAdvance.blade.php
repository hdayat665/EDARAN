@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        @if ($cashClaim->type == 1)
            <h1 class="page-header" id="cashAdvViewJs">eClaim <small>| My Claim | View Cash Advance | Project ( Outstation )</small></h1>
            @elseif($cashClaim->type == 2)
            <h1 class="page-header" id="cashAdvViewJs">eClaim <small>| My Claim | View Cash Advance | Project ( Non Outstation )</small></h1>
            @elseif($cashClaim->type == 3)
            <h1 class="page-header" id="cashAdvViewJs">eClaim <small>| My Claim | View Cash Advance | Others (Outstation )</small></h1>
            @elseif($cashClaim->type == 4)
            <h1 class="page-header" id="cashAdvViewJs">eClaim <small>| My Claim | View Cash Advance | Others (Non Outstation )</small></h1>
        @endif
        <div class="panel panel">
            <div class="panel-body">
                @if ($cashClaim->type == 1)
                    @include('pages.eclaim.viewProjectOutstation')
                @elseif($cashClaim->type == 2)
                    @include('pages.eclaim.viewProjectNonOutstation')
                @elseif($cashClaim->type == 3)
                    @include('pages.eclaim.viewOtherOutstation')
                @elseif($cashClaim->type == 4)
                    @include('pages.eclaim.viewOtherNonOutstation')
                @endif
                <div class="row p-2">
                    <div class="col align-self-start">
                        <a href="/myClaimView" class="btn btn-light" style="color: black;" type="submit" id="backPrint"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
