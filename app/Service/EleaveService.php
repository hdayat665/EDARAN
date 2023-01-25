<?php

namespace App\Service;

use App\Mail\Mail;
use App\Models\ActivityLogs;
use App\Models\AttendanceEvent;
use App\Models\Employee;
use App\Models\Project;
use App\Models\ProjectLocation;
use App\Models\TimesheetApproval;
use App\Models\TimesheetEvent;
use App\Models\TimesheetLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EleaveService
{
    public function LeaveEntitlementView()
    {
        
        $data['employee'] = Employee::where([['tenant_id', Auth::user()->tenant_id], ['user_id', Auth::user()->id]])->first();

        return $data;
    }

}