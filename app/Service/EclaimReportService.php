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
    public function searchReportAll($input = [])
    
{
   
    $cond = [];

    if (isset($input['project'])) {
        $cond[1] = ['b.project_id', $input['project']];
    }

    if (isset($input['department'])) {
        $cond[2] = ['d.id', $input['department']];
    }

    if (isset($input['user_id'])) {
        $cond[3] = ['a.user_id', $input['user_id']];
    }

    if (isset($input['department'])) {
        $cond[4] = ['d.id', $input['department']];
    }

    if (isset($input['reference'])) {
        $cond[5] = ['a.cheque_number', $input['reference']];
    }

    

    $startDate = date_format(date_create(now()), 'Y').'-01-01';
    $endDate = date_format(date_create(now()), 'Y').'-12-31';

    if (isset($input['default-date'])) {
        $dateRange = \explode(' - ', $input['default-date']);
        $startDate = date_format(date_create($dateRange[0]), 'Y-m-d');
        $endDate = date_format(date_create($dateRange[1]), 'Y-m-d');
    }


    $data['general_claims'] = DB::table('general_claim as a')
    ->leftJoin('travel_claim as b', 'a.id', '=', 'b.general_id')
    ->leftJoin('employment as c', 'a.user_id', '=', 'c.user_id')
    ->leftJoin('department as d', 'c.department', '=', 'd.id')
    ->select('a.*','b.project_id','d.id', 'a.user_id')
    ->where('a.tenant_id', Auth::user()->tenant_id)
    ->where($cond)
    ->whereBetween('a.created_at', [$startDate, $endDate])
    ->get();


    return $data;
    }

}


