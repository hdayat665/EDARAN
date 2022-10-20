<?php

namespace App\Service;

use App\Models\DepartmentTree;
use App\Models\OrganizationChart;
use App\Models\PhoneDirectory;
use App\Models\Project;
use App\Models\TimesheetApproval;
use App\Models\TimesheetLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TimesheetReportService
{
    public function statusReportView($input = [])
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        if (isset($input['employeeName'])) {
            $cond[2] = ["employee_name", $input["employeeName"]];
        }

        if (isset($input['designation'])) {
            $cond[3] = ['designation', $input['designation']];
        }

        if (isset($input['department'])) {
            $cond[4] = ['department', $input['department']];
        }

        if (isset($input['status'])) {
            $cond[5] = ['status', $input['status']];
        }

        $data = TimesheetApproval::where($cond)->get();

        return $data;
    }

    public function getDataEmployeeSummary($input = [])
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];

        // pr($input);
        if (isset($input['project'])) {
            $cond[2] = ['a.project_id', $input['project']];
        }

        if (isset($input['department'])) {
            $cond[3] = ['d.departmentName', $input['department']];
        }

        if (isset($input['designation'])) {
            $cond[5] = ['e.designationName', $input['designation']];
        }

        if (isset($input['employeeName'])) {
            $cond[6] = ['a.user_id', $input['employeeName']];
        }

        // if (isset($input['month'])) {
        //     $cond[6] = ["MONTH("."a.date".")", $input['month']];
        //     // $month = $input['month'];
        // }

        // if (isset($input['year'])) {
        //     $year = $input['year'];
        // }


        $data = DB::table('timesheet_log as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.user_id', '=', 'c.user_id')
            ->leftJoin('department as d', 'c.department', '=', 'd.id')
            ->leftJoin('designation as e', 'c.designation', '=', 'e.id')
            ->select('a.*', 'b.project_name', 'c.employeeName', 'd.departmentName', 'e.designationName')
            ->where($cond)
            // ->whereMonth('a.date', $month)
            // ->whereYear('a.date', $year)
            ->get();

        return $data;
    }


}
