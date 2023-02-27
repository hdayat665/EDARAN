<?php

namespace App\Service;

use App\Models\Employee;
use App\Models\CashAdvanceDetail;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use App\Models\ModeOfTransport;
use App\Models\PersonalClaim;
use App\Models\TravelClaim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EclaimReportService

{
    public function searchReportAll()
{
    $data = [];

    $data['general_claims'] = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->get();

    $data['cash_advance'] = CashAdvanceDetail::where('tenant_id', Auth::user()->tenant_id)->get();
    //pr($data['cash_advance']);
    if (!$data['general_claims']) {
        $data['general_claims'] = [];
    }

    if (!$data['cash_advance']) {
        $data['cash_advance'] = [];
    }

    //pr($data);

    return $data;
}







}
