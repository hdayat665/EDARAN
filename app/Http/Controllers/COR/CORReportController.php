<?php

namespace App\Http\Controllers\COR;
use App\Http\Controllers\Controller;
use App\Service\CORService;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class CORReportController extends Controller
{
    public function corlisting()
    {
        $data = [];
        $data['employeeId'] = '';

        return view('pages.report.cor.correporting', $data);
    }

    public function searchEmployeeTimesheetReport(Request $r)
    {
        $data = [];
        $trs = new CORService;
        $input = $r->input();
        
        // $requiredKeys = ['category', 'date_range'];
        // if(array_diff($requiredKeys, array_keys($input))) {
        //     return redirect()->back()->withErrors(['message' => 'Please select all dropdown values']);
        // }
    

        if ($input['selectAS'] == '1') {
            $data['employees'] = $trs->getdatabyemployee();
            $view = 'pages.report.cor.employeeReportAll';
        }
        else if ($input['category'] == '') {  
            $data['summary'] = $trs->getdatabyemployee();
            $view = 'pages.report.timesheet.employeeReportBySummary';
        }else if($input['category'] == 'Project'){
            $data['projects'] = $trs->getDataEmployeeSummary($input);
            // if (empty($data['projects'])) {
            //     // $data['project_name'] = $data['projects'][0]->project_name;
            //     $data['project_name'] = $trs->getDataEmployeeSummary($input);
            // }
            $data['date_range'] = $input['date_range'];

            $view = 'pages.report.timesheet.employeeReportByProject';
        }else if($input['category'] == 'Department'){
            $data['departments'] = $trs->getDataEmployeeSummary($input);
            $data['date_range'] = $input['date_range'];

            // $data['department'] = '';
            // if (isset($input['department'])) {
            //     $data['department'] = getDepartment($input['department'])->departmentName;
            // }

            $view = 'pages.report.timesheet.employeeReportByDepartment';
        }else if($input['category'] == 'Employee'){
            // return app('App\Http\Controllers\Timesheet\MyTimesheetController')->viewTimesheet('1',$input['user_id']);
            $data['employees'] = $trs->getDataEmployeeSummary($input);
            $data['date_range'] = $input['date_range'];
            $view = 'pages.report.timesheet.employeeReportByName';
        }

        return view($view, $data);
    }

}
