<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use App\Service\EmployeeService;
use App\Service\ProjectReportService;
use App\Service\ProjectService;
use App\Service\TimesheetReportService;
use Illuminate\Http\Request;


class TimesheetReportController extends Controller
{
    public function statusReportView()
    {
        $data = [];
        $trs = new TimesheetReportService;
        $input = [];
        $data['statusReports'] = $trs->statusReportView($input);

        return view('pages.report.timesheet.statusReport', $data);
    }

    public function searchStatusReport(Request $r)
    {
        $data = [];
        $input = $r->input();
        $trs = new TimesheetReportService;

        $data['statusReports'] = $trs->statusReportView($input);

        return view('pages.report.timesheet.statusReport', $data);
    }

    public function employeeReportView()
    {
        $data = [];
        return view('pages.report.timesheet.employeeReport', $data);
    }

    public function searchEmployeeTimesheetReport(Request $r)
    {
        $data = [];
        $trs = new TimesheetReportService;
        $input = $r->input();

        if ($input['category'] == 'Summary') {
            $data['summarys'] = $trs->getDataEmployeeSummary();
            $data['date_range'] = $input['date_range'];
            $view = 'pages.report.timesheet.employeeReportBySummary';
        }else if($input['category'] == 'Project'){
            $data['projects'] = $trs->getDataEmployeeSummary($input);
            if (empty($data['projects'])) {
                $data['project_name'] = $data['projects'][0]->project_name;
            }
            $data['date_range'] = $input['date_range'];

            $view = 'pages.report.timesheet.employeeReportByProject';
        }else if($input['category'] == 'Department'){
            $data['departments'] = $trs->getDataEmployeeSummary($input);
            $data['date_range'] = $input['date_range'];

            $data['department'] = getDepartment($input['department'])->departmentName;

            $view = 'pages.report.timesheet.employeeReportByDepartment';
        }else if($input['category'] == 'Employee'){
            return app('App\Http\Controllers\Timesheet\MyTimesheetController')->viewTimesheet('1',$input['user_id']);
        }

        return view($view, $data);
    }

    public function searchEmployeeReport(Request $r)
    {
        $data = [];

        $trs = new TimesheetReportService;
        $data['logs'] = $trs->getReportTimesheetLog($r);

        return view('pages.report.timesheet.employeeReportAll', $data);
    }



    public function overtimeReportView()
    {
        $data = [];
        $trs = new TimesheetReportService;

        $data['overtimes'] = $trs->getDataEmployeeSummary();

        return view('pages.report.timesheet.overtimeReport', $data);
    }

    public function searchOvertimeReport(Request $r)
    {
        $data = [];
        $input = $r->input();
        $trs = new TimesheetReportService;

        $data['overtimes'] = $trs->getDataEmployeeSummary($input);

        return view('pages.report.timesheet.overtimeReport', $data);
    }

}


