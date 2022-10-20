<?php

namespace App\Http\Controllers\Timesheet;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyTimesheetController extends Controller
{
    public function timesheetApprovalView()
    {
        $data = [];

        return view('pages.timesheet.timesheetApproval');
    }
}
