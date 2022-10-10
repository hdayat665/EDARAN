<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use App\Service\EmployeeService;
use App\Service\ProjectReportService;
use App\Service\ProjectService;
use Illuminate\Http\Request;


class TimesheetReportController extends Controller
{
    public function statusReportView()
    {
        $data = [];


        return view('pages.report.timesheet.statusReport', $data);
    }

    public function employeeReportView()
    {
        $data = [];


        return view('pages.report.timesheet.employeeReport', $data);
    }

    public function overtimeReportView()
    {
        $data = [];


        return view('pages.report.timesheet.overtimeReport', $data);
    }
}
