<?php

namespace App\Service;

use App\Models\DepartmentTree;
use App\Models\OrganizationChart;
use App\Models\PhoneDirectory;
use App\Models\Project;
use App\Models\TimesheetApproval;
use App\Models\TimesheetLog;
use App\Models\Employee;
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


        if (isset($input['project'])) {
            $cond[2] = ['a.project_id', $input['project']];
        }

        if (isset($input['department'])) {
            $cond[3] = ['d.id', $input['department']];
        }

        if (isset($input['designation'])) {
            $cond[5] = ['e.designationName', $input['designation']];
        }

        if (isset($input['user_id'])) {
            $cond[6] = ['c.user_id', $input['user_id']];
        }

        $startDate = date_format(date_create(now()), 'Y').'-01-01';
        $endDate = date_format(date_create(now()), 'Y').'-12-31';
        // pr($startDate);
        if (isset($input['date_range'])) {
            $dateRange = \explode(' - ', $input['date_range']);
            $startDate = date_format(date_create($dateRange[0]), 'Y-m-d');
            $endDate = date_format(date_create($dateRange[1]), 'Y-m-d');
        }

        $data = DB::table('timesheet_log as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.user_id', '=', 'c.user_id')
            ->leftJoin('department as d', 'c.department', '=', 'd.id')
            ->leftJoin('designation as e', 'c.designation', '=', 'e.id')
            ->select('a.*', 'b.project_name', 'c.employeeName', 'd.departmentName', 'e.designationName')
            ->where($cond)
            ->whereBetween('date', [$startDate, $endDate])
            // ->whereMonth('a.date', $month)
            // ->whereYear('a.date', $year)
            ->get();

        return $data;
    }

    public function getDataEmployeeSummaryOvertime($input = [])
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
    
        if (isset($input['project'])) {
            $cond[2] = ['a.project_id', $input['project']];
        }
    
        if (isset($input['department'])) {
            $cond[3] = ['d.id', $input['department']];
        }
    
        if (isset($input['designation'])) {
            $cond[5] = ['e.designationName', $input['designation']];
        }
    
        if (isset($input['user_id'])) {
            $cond[6] = ['c.user_id', $input['user_id']];
        }
    
        $startDate = date_format(date_create(now()), 'Y').'-01-01';
        $endDate = date_format(date_create(now()), 'Y').'-12-31';
    
        if (isset($input['date_range'])) {
            $dateRange = \explode(' - ', $input['date_range']);
            $startDate = date_format(date_create($dateRange[0]), 'Y-m-d');
            $endDate = date_format(date_create($dateRange[1]), 'Y-m-d');
        }
    
        $data = DB::table('timesheet_log as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.user_id', '=', 'c.user_id')
            ->leftJoin('department as d', 'c.department', '=', 'd.id')
            ->leftJoin('designation as e', 'c.designation', '=', 'e.id')
            ->select('a.*', 'b.project_name', 'c.employeeName', 'd.departmentName', 'e.designationName')
            ->where($cond)
            ->whereBetween('date', [$startDate, $endDate])
            ->whereRaw('SEC_TO_TIME(TIME_TO_SEC(a.total_hour)) > "09:00:00"')
            ->get();
    
        return $data;
    }
    
                             
    public function employeeReportAll($input = [])
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];

        if (isset($input['department2'])) {
            $cond[2] = ['d.departmentName', $input['department2']];
        }

        if (isset($input['user_id'])) {
            $cond[3] = ['a.user_id', $input['user_id']];
        }

        if (isset($input['year2'])) {
            $year = $input['year2'];
            $cond[4] = [DB::raw('YEAR(b.date)'), '=', $year];
        }

        if (isset($input['month2'])) {
            $cond[5] = [DB::raw('MONTH(b.date)'), $input['month2']];
        }

        $data = DB::table('employment as a')
            ->leftJoin('timesheet_log as b', 'a.user_id', '=', 'b.user_id')
            ->leftJoin('designation as c', 'a.designation', '=', 'c.id')
            ->leftJoin('department as d', 'a.department', '=', 'd.id')
            ->select('a.employeeName', 'c.designationName', 'a.status', 'b.date', 'b.total_hour', 'd.departmentName')
            ->where($cond)
            // ->groupBy('c.employeeName')
            ->get();

        $pivotedData = $data->groupBy('employeeName')->map(function ($employeeLogs) {
            $result = ['employeeName' => $employeeLogs->first()->employeeName, 
                        'designationName' => $employeeLogs->first()->designationName, 
                        'status' => $employeeLogs->first()->status,
                        'departmentName' => $employeeLogs->first()->departmentName,
                        'date' => $employeeLogs->first()->date
                       ];
            foreach ($employeeLogs as $log) {
                $day = date('d', strtotime($log->date));
                $result['day_'.$day] = $log->total_hour;
            }
            return (object) $result;
        })->values();
    
        return $pivotedData;
    }
    

    public function getdatabyemployee()
    {
        $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
        $cond[2] = ['c.project_name', '!=', null];

        

        $data = DB::table('timesheet_log as a')
        ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
        ->leftJoin('project as c', 'a.project_id', '=', 'c.id')
        ->select('a.date','a.total_hour','c.project_name as projectnameas','b.COR','b.employeeName')
        ->where($cond)
        // ->groupBy('c.project_name')
        ->get();

        return $data;
    }

    


    // public function employeeReportAll()
    // {
    //     $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
    //     $data = DB::table('employment as a')
    //         ->leftJoin('timesheet_log as b', 'a.user_id', '=', 'b.user_id')
    //         ->select('a.*', 'b.*', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(b.duration))) as total_duration'))
    //         ->where($cond)
    //         // ->whereBetween('date', [$startDate, $endDate])
    //         // ->whereMonth('a.date', $month)
    //         // ->whereYear('a.date', $year)
    //         ->groupBy('a.user_id')
    //         ->get();
    
    //     return $data;
    // }
    


}
