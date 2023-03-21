<?php

namespace App\Service;
use App\Models\ApprovelRoleGeneral;
use App\Models\CashAdvanceDetail;
use App\Models\DomainList;
use App\Models\EclaimGeneralSetting;
use App\Models\Employee;
use App\Models\EmploymentType;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use App\Models\PersonalClaim;
use App\Models\TravelClaim;
use Illuminate\Support\Facades\Auth;

class CORService
{

    public function getdatabyemployee()
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
        // $cond[2] = ['c.project_name', '!=', null];

        

        $data = DB::table('employment as a')
        // ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
        // ->leftJoin('project as c', 'a.project_id', '=', 'c.id')
        // ->leftJoin('department as d', 'b.department', '=', 'd.id')
        ->select('a.*')
        ->where($cond)
        // ->groupBy('c.project_name')
        ->get();

        return $data;
    }
    
}