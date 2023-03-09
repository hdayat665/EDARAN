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

class MailService
{
    public function emailToSupervisorClaimGNC()
    {
        // get supervisor detail
        $user = Employee::where('user_id', Auth::user()->id)->first();
        $supervisor = Employee::where('user_id', $user->supervisor)->first();

        $receivers = $user->merge($supervisor);

        foreach ($receivers as $receiver) {
        }
    }
}