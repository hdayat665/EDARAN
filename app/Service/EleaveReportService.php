<?php

namespace App\Service;
use App\Models\Employee;
use App\Models\MyLeaveModel;
use App\Models\leavetypesModel;
use Carbon\Carbon;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EleaveReportService

{
    public function LeaveEntitlementView()
    {
        
        $data['employee'] = Employee::where([['tenant_id', Auth::user()->tenant_id], ['user_id', Auth::user()->id]])->first();

        return $data;
    }

    public function datatype(){

        $data = 
        leavetypesModel::where('tenant_id', Auth::user()->tenant_id)
                        ->where('status', '=', 1)
                        ->get();
        return $data;

    }
    public function dataemployer(){

        $data = 
        MyLeaveModel::select('userprofile.user_id', 'userprofile.fullName')
        ->join('leave_entitlement', 'myleave.up_user_id', '=', 'leave_entitlement.id_userprofile')
        ->join('department', 'leave_entitlement.id_department', '=', 'department.id')
        ->join('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
        ->where('myleave.tenant_id', Auth::user()->tenant_id)
        ->groupBy('userprofile.user_id')
        ->get();
        return $data;

    }
    public function datadepartment(){

        $data = 
        MyLeaveModel::select('department.id', 'department.departmentName')
        ->join('leave_entitlement', 'myleave.up_user_id', '=', 'leave_entitlement.id_userprofile')
        ->join('department', 'leave_entitlement.id_department', '=', 'department.id')
        ->join('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
        ->where('myleave.tenant_id', Auth::user()->tenant_id)
        ->groupBy('department.departmentName')
        ->get();
        return $data;

    }

    public function searchEleaveReport($r)
    {
       $input = $r->input();
        $query = MyLeaveModel::select('myleave.*', 'userprofile.fullName as employer_name','leave_types.leave_types as type')
        ->join('leave_entitlement', 'myleave.up_user_id', '=', 'leave_entitlement.id_userprofile')
        ->join('department', 'leave_entitlement.id_department', '=', 'department.id')
        ->join('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
        ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
        ->where('myleave.tenant_id', Auth::user()->tenant_id)
        ->orderBy('myleave.applied_date', 'desc');

        if ($input['date_range']) {
            $dateRange = explode(' - ', $input['date_range']);
            $startDate = date("Y-m-d", strtotime( $dateRange[0]));
            $endDate = date("Y-m-d", strtotime( $dateRange[1]));
            $query->whereBetween('myleave.start_date', [$startDate, $endDate])
            ->whereBetween('myleave.end_date', [$startDate, $endDate])
            ->whereRaw('myleave.start_date <= myleave.end_date');

        }


        if ($input['typelist']) {
            $typelist = $input['typelist'];
            $query->where('leave_types.id', '=', $typelist);
        }

        if ($input['employer']) {
            $id = $input['employer'];
            $query->where('myleave.up_user_id', '=', $id);
        }

        if ($input['department']) {
            $iddepartment = $input['department'];
            $query->where('leave_entitlement.id_department', '=', $iddepartment);
        }

        if ($input['status']) {
            $status = $input['status'];
            $query->where('myleave.status_final', '=', $status);
        }

        $data = $query->get();
        return $data;
    }

}