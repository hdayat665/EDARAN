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
    // public function statusReportView()
    // {
    //     $data = [];
    //     $trs = new TimesheetReportService;
    //     $input = [];
    //     $data['statusReports'] = $trs->statusReportView($input);

    //     return view('pages.report.timesheet.statusReport', $data);
    // }

    public function statusReportView()
    {
        // $data = [];
        $trs = new TimesheetReportService;
        // $input = [];
        $data['statusReports'] = $trs->statusReportView();
        $data['statusId'] = '';
        $data['departmentId'] = '';
        $data['deisgnationId'] = '';
        $data['employeeId'] = '';
        $data['monthId'] = '';
        $data['yearId'] = '';
        return view('pages.report.timesheet.statusReport', $data);
    }

    public function searchStatusReport(Request $r)
    {
        // $data = [];
        $input = $r->input();
        $trs = new TimesheetReportService;

        $data['statusReports'] = $trs->statusReportView1($r);
        $data['departmentId'] = $input['department'];
        $data['deisgnationId'] = $input['designation'];
        $data['employeeId'] = $input['employeeName'];
        $data['statusId'] = $input['status'];
        $data['yearId'] = $input['year'];
        $data['monthId'] = $input['month'];
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
        
        $requiredKeys = ['category', 'date_range'];
        if(array_diff($requiredKeys, array_keys($input))) {
            return redirect()->back()->withErrors(['message' => 'Please select all dropdown values']);
        }
    

        if ($input['category'] == 'Summary') {
            $data['summary'] = $trs->getdatabyemployee();
            $view = 'pages.report.timesheet.employeeReportBySummary';
        }
        else if ($input['category'] == '') {  
            $data['summary'] = $trs->getdatabyemployee();
            $view = 'pages.report.timesheet.employeeReportBySummary';
        }else if($input['category'] == 'Project'){
            $data['projects'] = $trs->getDataEmployeeSummary($input);
            $data['date_range'] = $input['date_range'];

            if (isset($input['project'])) {
                $data['projectname'] = $input['project'];
            }
            // $data['employeeName'] = $input['user_id'];

            $view = 'pages.report.timesheet.employeeReportByProject';
        }else if($input['category'] == 'Department'){
            $data['departments'] = $trs->getDataEmployeeSummary($input);
            $data['date_range'] = $input['date_range'];

            if (isset($input['department'])) {
                $data['departmentName'] = $input['department'];
            }
            $view = 'pages.report.timesheet.employeeReportByDepartment';
        }else if($input['category'] == 'Employee'){
            // return app('App\Http\Controllers\Timesheet\MyTimesheetController')->viewTimesheet('1',$input['user_id']);
            $data['employees'] = $trs->getDataEmployeeSummary($input);
            $data['date_range'] = $input['date_range'];
            if (isset($input['user_id'])) {
                $data['employeeName'] = $input['user_id'];
            }
            $view = 'pages.report.timesheet.employeeReportByName';
        }

        return view($view, $data);
    }

    public function searchEmployeeReport(Request $r)
    {

        $data = [];
        $trs = new TimesheetReportService;
        $input = $r->input();
        $data['logs'] = $trs->employeeReportAll($input);

        // to display value on table what user select in menu
        // if (isset($input['department2'])) {
        //     $data['id'] = $input['department2'];
        // }

        if (isset($input['year2'])) {
            $data['year'] = $input['year2'];
        }

        if (isset($input['month2'])) {
            $data['month'] = $input['month2'];
        }
    
        $view = 'pages.report.timesheet.employeeReportAll';
        return view($view, $data);
    }



    public function overtimeReportView()
    {
        // $data = [];
        $trs = new TimesheetReportService;

        $data['overtimes'] = $trs->getDataEmployeeSummaryOvertime();
        $data['employeeId'] = '';
        $data['yearsId'] = '';
        $data['monthId'] = '';
        $data['designationsId'] = '';
        $data['departmenstId'] = '';
        
        return view('pages.report.timesheet.overtimeReport', $data);
    }

    // public function searchOvertimeReport(Request $r)
    // {
    //     $data = [];
    //     $input = $r->input();
    //     $trs = new TimesheetReportService;

    //     $data['overtimes'] = $trs->getDataEmployeeSummaryOvertime($input);
    //     $data['employeeId'] = $input['employeeName'];
    //     return view('pages.report.timesheet.overtimeReport', $data);
    // }

    public function searchOvertimeReport(Request $r)
    {
        // $data = [];
        $input = $r->input();
        $trs = new TimesheetReportService;

        $data['overtimes'] = $trs->getDataEmployeeSummaryOvertime1($r);
        $data['employeeId'] = $input['employeeName'];
        $data['yearsId'] = $input['year'];
        $data['designationsId'] = $input['designation'];
        $data['monthId'] = $input['month'];
        $data['departmenstId'] = $input['department'];
        
        
        return view('pages.report.timesheet.overtimeReport', $data);
    }



    // public function employeeReportAll()
    // {
    //     $data = [];

    //     $trs = new TimesheetReportService;
    //     $data['logs'] = $trs->employeeReportAll();

    //     return view('pages.report.timesheet.employeeReportAll', $data);
    // }


    public function getEmployeeNamebyDepartment($id = '')
    {
        $data = getEmployeeNamebyDepartments($id);

        return response()->json($data);
    }


}


