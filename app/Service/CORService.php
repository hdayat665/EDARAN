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
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CORService
{

    public function getdatabyemployee($input = [])
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
        // $cond[2] = ['c.project_name', '!=', null];

        $startDate = date_format(date_create(now()), 'Y').'-01-01';
        $endDate = date_format(date_create(now()), 'Y').'-12-31';
        // pr($startDate);
        if (isset($input['date_range'])) {
            $dateRange = \explode(' - ', $input['date_range']);
            $startDate = date_format(date_create($dateRange[0]), 'Y-m-d');
            $endDate = date_format(date_create($dateRange[1]), 'Y-m-d');
            // $endDate = Carbon::createFromFormat('Y-m-d', $dateRange[1])->addDay()->format('Y-m-d');
        }

        $data = DB::table('employment as a')
        ->leftJoin('designation as b', 'a.designation', '=', 'b.id')
        ->leftJoin('department as c', 'a.department', '=', 'c.id')
        ->select('a.*','b.designationName','c.departmentName')
        ->where($cond)
        ->whereBetween('a.created_at', [$startDate, date('Y-m-d', strtotime($endDate. ' + 1 day'))])
        ->get();

        return $data;
    }

    public function getDataEmployeeSummary($input = [])
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];


        if (isset($input['user_id'])) {
            $cond[2] = ['a.user_id', $input['user_id']];
        }


        $startDate = date_format(date_create(now()), 'Y').'-01-01';
        $endDate = date_format(date_create(now()), 'Y').'-12-31';
        // pr($startDate);
        if (isset($input['date_range'])) {
            $dateRange = \explode(' - ', $input['date_range']);
            $startDate = date_format(date_create($dateRange[0]), 'Y-m-d');
            $endDate = date_format(date_create($dateRange[1]), 'Y-m-d');
            // $endDate = Carbon::createFromFormat('Y-m-d', $dateRange[1])->addDay()->format('Y-m-d');
        }

        $data = DB::table('employment as a')
        ->leftJoin('designation as b', 'a.designation', '=', 'b.id')
        ->leftJoin('department as c', 'a.department', '=', 'c.id')
        // ->leftJoin('department as d', 'b.department', '=', 'd.id')
        ->select('a.*','b.designationName','c.departmentName')
        ->where($cond)
        // ->groupBy('c.project_name')
        // ->whereBetween('a.created_at', [$startDate, $endDate])
        ->whereBetween('a.effectiveFrom', [$startDate, date('Y-m-d', strtotime($endDate. ' + 1 day'))])
        ->get();

        return $data;
    }

}
