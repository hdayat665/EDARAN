<?php

namespace App\Service;

use App\Mail\Mail;
use App\Models\ActivityLogs;
use App\Models\AttendanceEvent;
use App\Models\Employee;
use App\Models\Project;
use App\Models\TimesheetAppeals;
use App\Models\ProjectLocation;
use App\Models\TimesheetApproval;
use App\Models\TimesheetEvent;
use App\Models\TimesheetLog;
use App\Models\MyLeaveModel;
use App\Models\holidayModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;
// use App\Service\Carbon;
use Carbon\Carbon;

class MyTimeSheetService
{
    public function myTimesheetView()
    {
        // $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
        // $cond[2] = ['b.user_id', Auth::user()->id];

        // $data = DB::table('project_member as a')
        // ->leftJoin('employment as b', 'a.employee_id', '=', 'b.id')
        // // ->leftJoin('project as c', 'a.project_id', '=', 'c.id')
        // ->select('b.id', 'b.employeeName as name')
        // ->where($cond)
        // ->get();

        $data['employee'] = Employee::where([['tenant_id', Auth::user()->tenant_id], ['user_id', Auth::user()->id]])->first();
        // $data['employee'] = Employee::join('appeal_timesheet', 'employment.user_id', '=', 'appeal_timesheet.user_id')
        // ->where([
        //     ['employment.tenant_id', Auth::user()->tenant_id],
        //     ['employment.user_id', Auth::user()->id]
        // ])
        // ->first();

        return $data;
    }

//     public function getTimesheetEvents()
// {
//     $employee = Employee::where([
//         ['tenant_id', Auth::user()->tenant_id],
//         ['user_id', Auth::user()->id]
//     ])->first();

//     $timesheet_events = TimesheetEvent::whereRaw("FIND_IN_SET($employee->user_id, participant) > 0")->get();

//     $employees = Employee::where('tenant_id', Auth::user()->tenant_id)->get();

//     $participant_ids = [];
//     foreach ($timesheet_events as $event) {
//         $ids = explode(",", $event->participant);
//         $participant_ids = array_merge($participant_ids, $ids);
//     }
//     $participant_ids = array_unique($participant_ids);

//     return collect([
//         'employees' => $employees,
//         'participant_ids' => $participant_ids
//     ]);
// }


    public function createLog($r)
{
    $input = $r->input();
    $user = Auth::user();

    $input['user_id'] = $user->id;
    $input['tenant_id'] = $user->tenant_id;
    $input['date'] = date_format(date_create($input['date']), 'Y/m/d');



    $startTime = date('Y-m-d H:i:s', strtotime($input['start_time']));
    $endTime = date('Y-m-d H:i:s', strtotime($input['end_time']));

    if (isset($input['office_log_project'])) {
        $input['project_id'] = $input['office_log_project'];
    }

    if (isset($input['activity_office'])) {
        $input['activity_name'] = $input['activity_office'];
    }

    if (isset($input['project_location_office'])) {
        $input['project_location'] = $input['project_location_office'];
    }

    $totaltime = strtotime($input['end_time']) - strtotime($input['start_time']);

    $h = intval($totaltime / 3600);
    $totaltime = $totaltime - ($h * 3600);
    $m = intval($totaltime / 60);
    $s = $totaltime - ($m * 60);
    $input['total_hour'] = "$h:$m:$s";

    if ($input['lunch_break'] == 1) {
        $h -= 1;
        $input['total_hour'] = "$h:$m:$s";
    }

    $existingLogs = TimesheetLog::where('user_id', $user->id)
    ->where('date', $input['date'])
    ->where(function ($query) use ($startTime, $endTime) {
        $query->where(function ($query) use ($startTime, $endTime) {
            $query->whereRaw("STR_TO_DATE(start_time, '%H:%i') <= ? AND STR_TO_DATE(end_time, '%H:%i') > ?", [$endTime, $startTime]);
        })->orWhere(function ($query) use ($startTime, $endTime) {
            $query->whereRaw("STR_TO_DATE(start_time, '%H:%i') >= ? AND STR_TO_DATE(start_time, '%H:%i') < ?", [$startTime, $endTime]);
        })->orWhere(function ($query) use ($startTime, $endTime) {
            $query->whereRaw("STR_TO_DATE(end_time, '%H:%i') > ? AND STR_TO_DATE(end_time, '%H:%i') <= ?", [$startTime, $endTime]);
        });
    })
    ->get();



if ($existingLogs->isNotEmpty()) {
    $data['status'] = config('app.response.error.status');
    $data['type'] = config('app.response.error.type');
    $data['title'] = config('app.response.error.title');
    $data['msg'] = 'Unable to add log due to overlapped time';
    return $data;
}


    // $dayOfWeek = date('N', strtotime($input['date']));

    // if ($dayOfWeek == 6 || $dayOfWeek == 7) { // Saturday = 6, Sunday = 7
    //     $data['status'] = config('app.response.error.status');
    //     $data['type'] = config('app.response.error.type');
    //     $data['title'] = config('app.response.error.title');
    //     $data['msg'] = 'Cannot Apply Log On Weekend';
    //     return $data;
    // }

    TimesheetLog::create($input);
    $data['status'] = config('app.response.success.status');
    $data['type'] = config('app.response.success.type');
    $data['title'] = config('app.response.success.title');
    $data['msg'] = 'Success Create Timesheet Logs';
    return $data;
}

    public function updateLog($r, $id)
    {
        $input = $r->input();
        $user = Auth::user();

        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        $input['date'] = date_format(date_create($input['date']), 'Y/m/d');

        // $start_time = strtotime($input['start_time']);
        // $end_time = strtotime($input['end_time']);
        // $totaltime = $end_time - $start_time;





        $startTime = date('Y-m-d H:i:s', strtotime($input['start_time']));
        $endTime = date('Y-m-d H:i:s', strtotime($input['end_time']));

        if (isset($input['office_log_project'])) {
            $input['project_id'] = $input['office_log_project'];
            unset($input['office_log_project']);
        }
        unset($input['office_log_project']);

        if (isset($input['activity_office'])) {
            $input['activity_name'] = $input['activity_office'];
            unset($input['activity_office']);
        }

        if (isset($input['project_location_office'])) {
            $input['project_location'] = $input['project_location_office'];
            unset($input['project_location_office']);
        }



        // $totaltime = $totaltime - ($h * 3600);
        $totaltime = strtotime($input['end_time']) - strtotime($input['start_time']);
        $h = intval($totaltime / 3600);
        $totaltime = $totaltime - ($h * 3600);

       

        // Minutes is obtained by dividing
        // remaining total time with 60
        $m = intval($totaltime / 60);

        // Remaining value is seconds
        $s = $totaltime - ($m * 60);

        // Printing the result
        $input['total_hour'] = "$h:$m:$s";

        if ($input['lunch_break'] == 1) {
            $h -= 1;
            $input['total_hour'] = "$h:$m:$s";
        }

        $existingLogs = TimesheetLog::where('user_id', $user->id)
    ->where('date', $input['date'])
    ->where(function ($query) use ($startTime, $endTime, $id) {
        $query->where(function ($query) use ($startTime, $endTime) {
            $query->whereRaw("STR_TO_DATE(start_time, '%H:%i') <= ? AND STR_TO_DATE(end_time, '%H:%i') > ?", [$endTime, $startTime]);
        })->orWhere(function ($query) use ($startTime, $endTime) {
            $query->whereRaw("STR_TO_DATE(start_time, '%H:%i') >= ? AND STR_TO_DATE(start_time, '%H:%i') < ?", [$startTime, $endTime]);
        })->orWhere(function ($query) use ($startTime, $endTime) {
            $query->whereRaw("STR_TO_DATE(end_time, '%H:%i') > ? AND STR_TO_DATE(end_time, '%H:%i') <= ?", [$startTime, $endTime]);
        });
    })
    ->where('id', '<>', $id)
    ->get();



if ($existingLogs->isNotEmpty()) {
    $data['status'] = config('app.response.error.status');
    $data['type'] = config('app.response.error.type');
    $data['title'] = config('app.response.error.title');
    $data['msg'] = 'Unable to update log due to overlapped time';
    return $data;
}


        TimesheetLog::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Timesheet Log';

        return $data;
    }

    public function deleteLog($id)
    {
        $logs = TimesheetLog::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'logs not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete Log';
        }

        return $data;
    }

    public function getLogsById($id)
    {
        $data = TimesheetLog::find($id);

        return
         $data;
    }

    public function employeeNamebyId($userId)
    {
        $employee = DB::table('employment')
                        ->where('user_id', $userId)
                        ->first();

        return $employee ? $employee->name : '';
    }

    public function createEvent($r)
    {
        $input = $r->input();
        $user = Auth::user();
    
        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
    
        $participants = isset($input['participant']) ? $input['participant'] : [];
        $participants[] = $user->id; // Add the logged-in user to the participants array

        $participants = array_unique($participants);
    
        $input['participant'] = implode(',', $participants);
    
        $input['start_date'] = date_format(date_create($input['start_date']), 'Y/m/d');
        $input['end_date'] = date_format(date_create($input['end_date']), 'Y/m/d');
    
        $start_time = strtotime($input['start_time']);
        $end_time = strtotime($input['end_time']);
        $totaltime = $end_time - $start_time;
    
        $h = intval($totaltime / 3600);
    
        $totaltime = $totaltime - ($h * 3600);
    
        // Minutes is obtained by dividing
        // remaining total time with 60
        $m = intval($totaltime / 60);
    
        // Remaining value is seconds
        $s = $totaltime - ($m * 60);
    
        // Printing the result
        // $input['total_hour'] = "$h:$m:$s";
    
        if ($_FILES['file_upload']['name']) {
            $file_upload = upload($r->file('file_upload'));
            $input['file_upload'] = $file_upload['filename'];
    
            if (!$input['file_upload']) {
                unset($input['file_upload']);
            }
        }
        // $input['total_hour'] = $input['start_time'] - $input['end_time'];
        // pr($input);
        TimesheetEvent::create($input);
    
        $eventDetails = TimesheetEvent::where('tenant_id', $user->tenant_id)->orderBy('created_at', 'DESC')->first();
        $departmentName = getDepartmentName($user->id);
        $employeeName = getEmployeeName($user->id);
        $venue = projectLocationById($eventDetails->location);
    
        $participants = explode(',', $eventDetails->participant);
    
        $participantDetail = Employee::whereIn('user_id', $participants)->get();

        foreach ($participantDetail as $participant) {
            $receiverEmail = $participant->workingEmail;

            $receiver = $receiverEmail;
            $response['typeEmail'] = 'eventInviation';
            $response['title'] = $eventDetails->event_name;
            $response['start_date'] = $eventDetails->start_date;
            $response['start_time'] = $eventDetails->start_time;
            $response['duration'] = $eventDetails->duration;
            $response['venue'] = $eventDetails->venue;
            $response['desc'] = $eventDetails->desc;
            $response['employeeName'] = $employeeName;
            $response['departmentName'] = $departmentName;
            $response['desc'] = $eventDetails->desc;
            $response['link'] = env('APP_URL') . '/myTimesheet';
            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = 'Event Invitation';
            $response['subject'] = 'Orbit Teams Meeting';
            // $response['typeAttachment'] = "application/pdf";
            // $response['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

            FacadesMail::to($receiver)->send(new Mail($response));
        }

        $eventid = $eventDetails->id;
        $eventpaerr= $eventDetails->participant;
        $explode = explode(',', $eventpaerr);

        foreach ($explode as $key => $participant) {
            $input = [
                'event_id' => $eventid,
                'user_id' => $participant,
                'status' => 'no response',
            ];
            AttendanceEvent::create($input);
        }




        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create Event';

        return $data;
    }

    public function updateEvent($r, $id)
    {
        $input = $r->input();
        $user = Auth::user();

        // $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        if (isset($input['type_recurring'])) {
            $input['type_recurring'] = implode(',', $input['type_recurring']);
        }
        if (isset($input['set_reccuring'])) {
            $input['set_reccuring'] = implode(',', $input['set_reccuring']);
        }

        // if (isset($input['participant'])) {
        //     $input['participant'] = implode(',', $input['participant']);
        // }

        $currentEvent = TimesheetEvent::find($id);
        $currentParticipants = explode(',', $currentEvent->participant);

        if (isset($input['participant'])) {
            $newParticipants = $input['participant'];
            $input['participant'] = implode(',', array_unique(array_merge($currentParticipants, $newParticipants)));
        } else {
            $input['participant'] = implode(',', $currentParticipants);
        }

        $input['start_date'] = date_format(date_create($input['start_date']), 'Y/m/d');
        $input['end_date'] = date_format(date_create($input['end_date']), 'Y/m/d');
        unset($input['inlineRadioOptions']);

        // if ($input['location_by_project']) {
        //     $input['location'] = $input['location_by_project'];
        //     unset($input['location_by_project']);
        // }

        if ($_FILES['file_upload']['name']) {
            $file_upload = upload($r->file('file_upload'));
            $input['file_upload'] = $file_upload['filename'];

            if (!$input['file_upload']) {
                unset($input['file_upload']);
            }
        }
        // $input['total_hour'] = $input['start_time'] - $input['end_time'];
        // pr($input);
        TimesheetEvent::where('id', $id)->update($input);

        $eventDetails = TimesheetEvent::where('id', $id)->orderBy('created_at', 'DESC')->first();
        $departmentName = getDepartmentName($user->id);
        $employeeName = getEmployeeName($user->id);
        $venue = projectLocationById($eventDetails->location);

        $participants = explode(',', $eventDetails->participant);

        if ($participants) {
            $participantDetail = Employee::whereIn('user_id', $participants)->get();

            foreach ($participantDetail as $participant) {
                $receiverEmail = $participant->workingEmail;

                $receiver = $receiverEmail;
                $response['typeEmail'] = 'eventUpdate';
                $response['title'] = $eventDetails->event_name;
                $response['start_date'] = $eventDetails->start_date;
                $response['start_time'] = $eventDetails->start_time;
                $response['duration'] = $eventDetails->duration;
                $response['venue'] = $eventDetails->venue;
                $response['desc'] = $eventDetails->desc;
                $response['employeeName'] = $employeeName;
                $response['departmentName'] = $departmentName;
                $response['desc'] = $eventDetails->desc;
                $response['link'] = env('APP_URL') . '/myTimesheet';
                $response['from'] = env('MAIL_FROM_ADDRESS');
                $response['nameFrom'] = 'Event Update';
                $response['subject'] = 'Orbit Teams Meeting';
                // $response['typeAttachment'] = "application/pdf";
                // $response['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

                FacadesMail::to($receiver)->send(new Mail($response));
            }
        }


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Event';

        return $data;
    }

    public function deleteEvent($id)
    {
        $result = TimesheetEvent::find($id);
        $user = Auth::user();

        if (!$result) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'timesheet event not found';
        } else {
            $eventDetails = TimesheetEvent::where('id', $id)->orderBy('created_at', 'DESC')->first();

            $departmentName = getDepartmentName($user->id);

            $employeeName = getEmployeeName($user->id);
            $venue = projectLocationById($eventDetails->location);

            $participants = explode(',', $eventDetails->participant);

            if ($participants) {
                $participantDetail = Employee::whereIn('user_id', $participants)->get();

                foreach ($participantDetail as $participant) {
                    $receiverEmail = $participant->workingEmail;

                    $receiver = $receiverEmail;
                    $response['typeEmail'] = 'eventDelete';
                    $response['title'] = $eventDetails->event_name;
                    $response['start_date'] = $eventDetails->start_date;
                    $response['start_time'] = $eventDetails->start_time;
                    $response['duration'] = $eventDetails->duration;
                    // $response['venue'] = $venue ?? '-';
                    $response['venue'] =  $eventDetails->venue;
                    $response['desc'] = $eventDetails->desc;
                    $response['employeeName'] = $employeeName;
                    $response['departmentName'] = $departmentName;
                    $response['desc'] = $eventDetails->desc;
                    $response['link'] = env('APP_URL') . '/myTimesheet';
                    $response['from'] = env('MAIL_FROM_ADDRESS');
                    $response['nameFrom'] = 'Event Delete';
                    $response['subject'] = 'Orbit Teams Meeting';
                    // $response['typeAttachment'] = "application/pdf";
                    // $response['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

                    FacadesMail::to($receiver)->send(new Mail($response));
                }
            }

            $result->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete Event';
        }

        return $data;
    }

    // public function getEventById($id)
    // {
    //     $data = TimesheetEvent::find($id);

    //     return $data;
    // }

    public function getEventById($id)
    {
        $event = TimesheetEvent::find($id);
    
        $event = $event->leftJoin('employment as b', 'timesheet_event.user_id', '=', 'b.user_id')
                    ->select('timesheet_event.*', 'b.employeeName')
                    ->find($id);
    
        $participantIds = explode(',', $event->participant);
    
        $employees = DB::table('employment')
                        ->whereIn('user_id', $participantIds)
                        ->get();
    
        $employeeNames = $employees->pluck('employeeName')->toArray();
    
        $event->participantNames = implode(',', $employeeNames);
    
        $nonParticipants = DB::table('employment')
                            ->whereNotIn('user_id', $participantIds)
                            ->get()
                            ->pluck('employeeName')
                            ->toArray();
    
        $event->nonParticipantNames = implode(',', $nonParticipants);

        // dd($event);
    
        return $event;
    }
    




    // public function getLogs()
    // {
    //     $data = TimesheetLog::where([['tenant_id', Auth::user()->tenant_id], ['user_id', Auth::user()->id]])->get();

    //     return $data;
    // }

        public function getHolidays()
    {
        $data = holidayModel::where([['tenant_id', Auth::user()->tenant_id]])->get();

        return $data;
    }


    public function getLeaves()
    {
           // $data = MyLeaveModel::where([['tenant_id', Auth::user()->tenant_id], ['up_user_id', Auth::user()->id]])->get();
        $data = DB::table('myleave as a')
            ->leftjoin('leave_types as b', 'a.lt_type_id', '=', 'b.id')
            ->select('a.*', 'b.leave_types')
            ->where([['a.tenant_id', Auth::user()->tenant_id], ['a.up_user_id', Auth::user()->id]])
            ->where('a.status_final', 4)
            ->get();
    
        if (!$data) {
            $data = [];
        }
    
        return $data;
    }
    


    public function getLogs()
    {
        $data = DB::table('timesheet_log as a')
        ->leftjoin('project as b', 'a.project_id', '=', 'b.id')
        ->leftjoin('activity_logs as c', 'a.activity_name', '=', 'c.id')
        ->select('a.*', 'b.project_name','c.activity_name as activitynameas')
            // ->whereNotIn('a.id', $projectId)
           -> where([['a.tenant_id', Auth::user()->tenant_id], ['a.user_id', Auth::user()->id]])
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    // public function getEvents()
    // {
    //     $cond[1] = ['tenant_id', Auth::user()->tenant_id];
    //     $cond[2] = ['user_id', Auth::user()->id];
    //     // $data = TimesheetEvent::where($cond)
    //         ->orWhere([['participant', 'like', '%' . Auth::user()->id . '%']])
    //         ->get();

    //     return $data;
    // }

    public function getEvents()
    {
        $userId = Auth::user()->id;
        $data = DB::table('timesheet_event')
            ->join('attendance_event', 'timesheet_event.id', '=', 'attendance_event.event_id')
            ->select('timesheet_event.*')
            ->whereRaw("FIND_IN_SET(timesheet_event.id, attendance_event.event_id)") // Check if the event_id is present in the attendance_event table
            ->where('attendance_event.user_id', '=', $userId) // Check if the user has attended
            // ->where('attendance_event.status', '=', 'attend') // Check the status of the attendance event
            ->where('attendance_event.status', '!=', 'attend')
            ->get();
    
        return $data;
    }

    public function getEventattend()
    {
        $userId = Auth::user()->id;
        $data = DB::table('timesheet_event')
            ->join('attendance_event', 'timesheet_event.id', '=', 'attendance_event.event_id')
            ->select('timesheet_event.*')
            ->whereRaw("FIND_IN_SET(timesheet_event.id, attendance_event.event_id)") // Check if the event_id is present in the attendance_event table
            ->where('attendance_event.user_id', '=', $userId) // Check if the user has attended
            ->where('attendance_event.status', '=', 'attend') // Check the status of the attendance event
            // ->where('attendance_event.status', '!=', 'attend')
            ->get();
    
        return $data;
    }
    
    
    
    

    

    // public function getEventattend()
    // {
    //     $cond[1] = ['a.tenant_id', Auth::user()->tenant_id];
    //     $cond[2] = ['a.user_id', Auth::user()->id];
    //     $data = DB::table('timesheet_event as a')
    //         ->leftJoin('attendance_event as b', 'a.id', '=', 'b.event_id')
    //         ->select('a.*')
    //         ->where(function ($query) use ($cond) {
    //             $query->where($cond)
    //                 ->orWhere('a.participant', 'like', '%' . Auth::user()->id . '%')
    //                 ->where('b.status', 'attend');
    //         })
    //         ->distinct()
    //         ->get();
    
    //     return $data;
    // }
    

    public function getLocationByProjectId($project_id = '')
    {
        $data = ProjectLocation::where([['tenant_id', Auth::user()->tenant_id], ['project_id', $project_id]])
        ->orderBy('location_name', 'asc')
        ->get();

        return $data;
    }

    public function getActivityByProjectId($project_id = '')
    {
        $data = ActivityLogs::where([['tenant_id', Auth::user()->tenant_id], ['project_id', $project_id]])->get();

        return $data;
    }

    public function getActivityNamebyLogsId($logs_id = '')
    {
        $data = ActivityLogs::where([['tenant_id', Auth::user()->tenant_id], ['logs_id', $logs_id]])->get();

        return $data;
    }

    public function submitForApproval($userId = '')
{
    $cond[1] = ['user_id', $userId];

    $logs = TimesheetLog::where($cond)->whereMonth('date', date('m'))->select('id')->get();

    $events = TimesheetEvent::where($cond)
        ->whereMonth('end_date', date('m'))
        ->orWhere([['participant', 'like', '%' . Auth::user()->id . '%']])
        ->select('id')
        ->get();


    $leaves = MyLeaveModel::where('up_user_id', $userId)->whereMonth('end_date', date('m'))->select('id')->get();
    $holidays = holidayModel::whereMonth('end_date', date('m'))->select('id')->get();


    $log_id = [];
    foreach ($logs as $log) {
        $log_id[] = $log->id;
    }

    $event_id = [];
    foreach ($events as $event) {
        $event_id[] = $event->id;
    }

    $leave_id = [];
    foreach ($leaves as $leave) {
        $leave_id[] = $leave->id;
    }

    $holiday_id = [];
    foreach ($holidays as $holiday) {
        $holiday_id[] = $holiday->id;
    }

    $employee =  DB::table('employment as a')
        ->leftJoin('designation as b', 'a.designation', '=', 'b.id')
        ->leftJoin('department as c', 'a.department', '=', 'c.id')
        ->select('a.id', 'c.departmentName', 'b.designationName', 'a.employeeName')
        ->where([['user_id', $userId]])
        ->first();

    $input['tenant_id'] = Auth::user()->tenant_id;
    $input['user_id'] = $userId;
    $input['month'] = date('M');
    if (isset($log_id)) {
        $input['log_id'] = implode(',', $log_id);
    }
    if (isset($event_id)) {
        $input['event_id'] = implode(',', $event_id);
    }
    if (isset($leave_id)) {
        $input['leave_id'] = implode(',', $leave_id);
    }
    if (isset($holiday_id)) {
        $input['holiday_id'] = implode(',', $holiday_id);
    }
    $input['employee_id'] = $employee->id;
    $input['employee_name'] = $employee->employeeName;
    $input['department'] = $employee->departmentName;
    $input['designation'] = $employee->designationName;

    // Add a check for existing data in TimesheetApproval with the same month
    $existing_approval = TimesheetApproval::where('user_id', $userId)->where('month', date('M'))->first();
    if ($existing_approval) {
        $data['status'] = config('app.response.error.status');
        $data['type'] = config('app.response.error.type');
        $data['title'] = config('app.response.error.title');
        $data['msg'] = 'You already submit log for this month';
        return $data;
    }

    // If there is no existing data, create a new one
    $input['status'] = 'pending';
    TimesheetApproval::create($input);

    $data['status'] = config('app.response.success.status');
    $data['type'] = config('app.response.success.type');
    $data['title'] = config('app.response.success.title');
    $data['msg'] = 'Success Sumbit Log';

    return $data;
}


    public function timesheetApprovalView()
    {
        $data = TimesheetApproval::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->get();

        return $data;
    }
    //TIMESHEET SUMMARY
    public function timesheetSummaryView()
    {
        $user = Auth::user();
        $data = TimesheetApproval::where('tenant_id', $user->tenant_id)
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'DESC')
                ->get();

        return $data;
    }

    public function timesheetSummaryViewday()
    {
        $user = Auth::user();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $totalDays = Carbon::createFromDate($currentYear, $currentMonth)->daysInMonth;
        $weekdays = 0;
        $weekends = 0;
        $holidays = 0;
        $workedDays = 0;
    
        $startOfMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfDay();
        $endOfMonth = Carbon::createFromDate($currentYear, $currentMonth, $totalDays)->endOfDay();
    
        $holidays = holidayModel::where('start_date', '>=', $startOfMonth)
                                ->where('end_date', '<=', $endOfMonth)
                                ->count();
    
        for ($day = 1; $day <= $totalDays; $day++) {
            $date = Carbon::create($currentYear, $currentMonth, $day);
            if ($date->isWeekend()) {
                $weekends++;
            } else {
                $weekdays++;
            }
        }
    
        $workedDays = TimesheetLog::where('user_id', $user->id)
                                ->where('date', '>=', $startOfMonth)
                                ->where('date', '<=', $endOfMonth)
                                ->distinct('date')
                                ->pluck('date')
                                ->count();
    
        $workingDays = $weekdays - $holidays;

        $remaininingtsr = $workingDays - $workedDays;
    
        return [
            'totalDays' => $totalDays,
            'weekdays' => $weekdays,
            'weekends' => $weekends,
            'holidays' => $holidays,
            'workedDays' => $workedDays,
            'workingDays' => $workingDays,
            'remaininingtsr' => $remaininingtsr,
        ];
    }
    
    public function deleteTimesheet($id)
    {
        $timesheetApproval = TimesheetApproval::find($id);

        if (!$timesheetApproval) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Timesheet not found';
        } else {
            $timesheetApproval->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Cancel Timesheet';
        }

        return $data;
    }
    public function updateStatusTimesheet($id = '', $status = '')
    {
        $input['status'] = $status;
        TimesheetApproval::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success ' . $status . ' Timesheet';

        return $data;
    }

    public function searchTimesheet($r)
    {
        $input = $r->input();
        // pr($input);

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        if ($input['employee_name']) {
            $cond[2] = ['employee_id', $input['employee_name']];
        }

        if ($input['month']) {
            $cond[3] = ['month', $input['month']];
        }

        if ($input['designation']) {
            $cond[4] = ['designation', $input['designation']];
        }

        if ($input['department']) {
            $cond[5] = ['department', $input['department']];
        }

        if ($input['status']) {
            $cond[6] = ['status', $input['status']];
        }

        $data = TimesheetApproval::where($cond)->get();

        return $data;
    }

    public function approveAllTimesheet($r)
    {
        $input = $r->input();

        if (!isset($input['id'])) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Please select the timesheet submission first!';

            return $data;
        }

        $ids = $input['id'];
        $status['status'] = 'approve';

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        TimesheetApproval::where($cond)->whereIn('id', $ids)->update($status);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Log Appeal is Approved';

        return $data;
    }

    public function getTimesheetById($id = '', $userId = '')
    {

        if ($userId) {
            $data = TimesheetApproval::where([['user_id', $userId], ['id', $id]])->first();
        } else {
            $data = TimesheetApproval::find($id);
        }


        return $data;
    }

    public function getTimesheetByIdLeave($userId = ''){

        if ($userId) {
            $data = Employee::where([['user_id', $userId]])->first();
        } else {
            $data = Employee::find($userId);
        }

        return $data;
    }

    // public function getemployeeNamelog($id)
    // {

    //     $data = TimesheetApproval::find($id);
    //     return $data;
    // }

    public function getemployeeNamelog($id)
    {
        $timesheetApproval = TimesheetApproval::find($id);
        if ($timesheetApproval) {
            return $timesheetApproval->employee_name;
        }
        return '';
    }

    public function getemployeeLeave($id)
    {
        $timesheetLeave = Employee::find($id);
        if ($timesheetLeave) {
            return $timesheetLeave->employeeName;
        }
        return '';
    }

    // public function getLeavesByLotId($id)
    // {
    //     $ids = explode(',', $id);

    //     $data = MyLeaveModel::whereIn('id', $ids)->get();

    //     return $data;
    // }

    public function getLeavesByLotId($id)
    {
        $ids = explode(',', $id);



        $data = DB::table('myleave as a')
        ->leftjoin('leave_types as b', 'a.lt_type_id', '=', 'b.id')
        ->select('a.*', 'b.leave_types')
        ->whereIn('a.id', $ids)
        ->get();

        return $data;
    }

    public function getLeavesByLotIdLeave($id)
    {
        $Check = Employee::select('employment.*')
            ->where('employment.user_id', $id)
            ->where('employment.tenant_id', Auth::user()->tenant_id)
            ->first();

        if($Check->eleaverecommender == Auth::user()->id){

            $data = MyLeaveModel::select('myleave.*','leave_types.leave_types', 'employment.employeeName')
            ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->join('employment', 'myleave.up_user_id', '=', 'employment.user_id')
            ->where('myleave.up_recommendedby_id', '=', $Check->eleaverecommender )
            ->where('myleave.up_user_id', '=', $id )
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->get();

            return $data;

        }

        if($Check->eleaveapprover == Auth::user()->id){

            $data = MyLeaveModel::select('myleave.*','leave_types.leave_types', 'employment.employeeName')
            ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->join('employment', 'myleave.up_user_id', '=', 'employment.user_id')
            ->where('myleave.up_approvedby_id', '=', $Check->eleaveapprover)
            ->where('myleave.up_user_id', '=', $id )
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->get();

            return $data;

        }

    }

    public function getHolidaysByLotId($id)
    {
        $ids = explode(',', $id);

        $data = holidayModel::whereIn('id', $ids)->get();

        return $data;
    }

    public function getHolidaysByLotIdLeave(){

        $data = holidayModel::all();

        return $data;
    }


    public function getEventsByLotId($id)
    {
        $ids = explode(',', $id);

        $data = TimesheetEvent::whereIn('id', $ids)->get();

        return $data;
    }

    public function getLogsByLotId($id)
    {
        $ids = explode(',', $id);

        // $data = TimesheetLog::whereIn('id', $ids)->get();

        // return $data;

        $data = DB::table('timesheet_log as a')
        ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
        ->leftJoin('activity_logs as c', 'a.activity_name', '=', 'c.id')
        ->select('a.*', 'b.project_name', 'c.activity_name as activitynameas')
        ->whereIn('a.id', $ids)
        ->get();

        return $data;
    }

    public function getProjectByidTimesheet($id)
    {
        $data = Project::find($id);

        return $data;
    }

    public function getActivityNameById($id)
    {
        $data = ActivityLogs::find($id);

        return $data;
    }

    // public function getEmployeeNameById($id,$userId)
    // {
    //     $employee = Employee::find($id,$userId);

    //     return $employee->employeeName;
    // }

    public function updateAttendStatus($id = '', $status = '')
    {
        $input['status'] = $status;
        $input['event_id'] = $id;
        $input['user_id'] = Auth::user()->id;

        AttendanceEvent::where([['user_id', $input['user_id']], ['event_id', $input['event_id']]])->delete();

        AttendanceEvent::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success ' . $status . ' Event';

        return $data;
    }

    public function getAttendanceById($eventId = '', $userId = '')
    {
        $data = AttendanceEvent::where([['event_id', $eventId], ['user_id', $userId]])->orderBy('created_at', 'DESC')->first();

        return $data;
    }

    public function getAttendanceByEventId($eventId = '')
    {
        $data = DB::table('attendance_event as a')
            ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
            ->select('b.employeeName', 'a.status')
            ->where('a.event_id', $eventId)
            ->orderBy('b.employeeName', 'ASC')
            ->get();

        return $data;
    }

    public function getRealtimeEvents($input = [])
    {

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        if (isset($input['employee_name'])) {
            $cond[2] = ["participant", 'like', "%" . $input["employee_name"] . "%"];
        }

        if (isset($input['event_name'])) {
            $cond[3] = ['event_name', $input['event_name']];
        }

        if (isset($input['date_range'])) {
            $date_range = explode(' - ', $input['date_range']);
            $cond[4] = ['start_date', '>=', date_format(date_create($date_range[0]), 'Y-m-d')];
            $cond[5] = ['end_date', '<=', date_format(date_create($date_range[1]), 'Y-m-d')];
        }

        // $data = TimesheetEvent::where($cond)
        //     ->get();

        $data = DB::table('timesheet_event as a')
        ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
        ->select('a.*', 'b.employeeName')
        ->orderBy('a.start_date', 'asc')
        ->get();
        return $data;
    }   


    public function gettimesheetid($id)
    {


        $tenant_id = Auth::user()->tenant_id;

        $data = DB::table('timesheet_approval as a')
            ->select('a.*')
            ->where([['a.tenant_id', $tenant_id], ['a.id', $id]])
            ->first();

        if (!$data) {
            $data = [];
        }


        return $data;

    }


    public function addamendreasons($r)
    {
        $input = $r->input();


        $id = $input['id'];
        $new_reason = $input['amendreason'];
        $input = [
            'status' => 'amend',
            'amendreason' => $new_reason
        ];


        $user = TimesheetApproval::where('id', $id)->first();


        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TimesheetApproval::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success save reason';
        }

        return $data;
    }

    public function getConfirmSubmitById($id)
    {
        $tenant_id = Auth::user()->tenant_id;

        $data = DB::table('timesheet_log as a')
            ->leftJoin('userprofile as b', 'a.user_id', '=', 'b.user_id')
            ->select('a.*', 'b.*')
            ->where([['a.tenant_id', $tenant_id]])
            ->first();

        if (!$data) {
            $data = [];
        }


        return $data;

    }


    // public function getAppealidList($id)
    // {
    //     $data = TimesheetAppeals::find($id);

    //     return
    //      $data;
    // }

    public function getAppealidList()
    {

        $tenant_id = Auth::user()->tenant_id;

        $data = DB::table('timesheet_appeal as a')
            ->select('a.*')
            ->where([['a.tenant_id', $tenant_id]])
            ->first();

        if (!$data) {
            $data = [];
        }


        return $data;

    }

    public function getAppeals()
    {


    $data = DB::table('timesheet_appeal as a')
    ->select('a.*')
       -> where([['a.tenant_id', Auth::user()->tenant_id], ['a.user_id', Auth::user()->id]])
        ->get();

    if (!$data) {
        $data = [];
    }

    return $data;
    }

    public function createAppealTimesheet($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }
        $user = Auth::user();
        // dd($user);

        $employment = Employee::where('user_id', $user->id)->first();

        if ($employment) {
            $tsapprover = $employment->tsapprover;
            $input['approver'] = $tsapprover;
        } else {
            // Handle the case when employment data for the user is not found
        }

        $logids = TimesheetAppeals::pluck('logid')->toArray();
        if (empty($logids)) {
            $nextLogid = 'LA-0001';
        } else {
            $highestLogid = max($logids);
            $numericPart = intval(substr($highestLogid, 3));
            $nextNumericPart = $numericPart + 1;
            $nextLogid = substr($highestLogid, 0, 3) . sprintf('%04d', $nextNumericPart);
        }

        // dd($nextLogid);

        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        $input['logid'] = $nextLogid;

        $existingAppealdate = TimesheetAppeals::where('tenant_id', $user->tenant_id)
        ->where('user_id', $user->id)
        ->where('applied_date', $input['applied_date'])
        ->first();

        $existingAppeallogid = TimesheetAppeals::where('tenant_id', $user->tenant_id)
        ->where('logid', $input['logid'])
        ->first();

        if ($existingAppealdate) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Log Appeal has Already Submitted';
            return $data;
        }

        if ($existingAppeallogid) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Timesheet appeal with the same logid already exists';
            return $data;
        }

       
    
        TimesheetAppeals::create($input);


        $settingEmail = TimesheetAppeals::select('timesheet_appeal.*')
        ->where('timesheet_appeal.tenant_id', Auth::user()->tenant_id)
        ->orderBy('timesheet_appeal.id', 'DESC')
        ->first();

        if ($settingEmail) {

            $ms = new MailService;
            $ms->emailToApproverAppeal($settingEmail);
        }
    
        // Return success response
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Log Appeal is Submitted';
        return $data;
    }

    public function timesheetApprovalappealView()
    {

        $employees = Employee::where('tsapprover', Auth::user()->id)->get();
        
        $userId = [];
        foreach ($employees as $key => $employee) {
            $userId[] = $employee->user_id;
            
        }
        // pr($userId);
        $claim[0] = ['tenant_id', Auth::user()->tenant_id];

        $data = DB::table('timesheet_appeal as a')
        ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
        ->select('a.*', 'b.employeeName')
        ->where('a.tenant_id', Auth::user()->tenant_id)
        ->whereIn('a.user_id', $userId)
        ->where('a.status', '=', 'Locked')
        ->orderby('a.created_at' ,'desc')
        ->get();

        return $data;

    }


    public function timesheetApprovalappealViewhistory()
    {

        $employees = Employee::where('tsapprover', Auth::user()->id)->get();

        $userId = [];
        foreach ($employees as $key => $employee) {
            $userId[] = $employee->user_id;
        }

        $claim[0] = ['tenant_id', Auth::user()->tenant_id];

        $data = DB::table('timesheet_appeal as a')
        ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
        ->select('a.*', 'b.employeeName')
        ->where('a.tenant_id', Auth::user()->tenant_id)
        ->whereIn('a.user_id', $userId)
        ->where('a.status', '!=', 'Locked')
        ->orderby('a.created_at' ,'desc')
        ->get();

        return $data;

    }


    public function updateStatusappeal($id = '', $status = '')
    {
        $input['status'] = $status;

        TimesheetAppeals::where('id', $id)->update($input);

        $settingEmail = TimesheetAppeals::select('timesheet_appeal.*')
        ->where('timesheet_appeal.tenant_id', Auth::user()->tenant_id)
        ->where('timesheet_appeal.id', $id)
        ->first();

        if ($settingEmail) {

            $ms = new MailService;
            $ms->emailToEmployeeAppeal($settingEmail);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Log Appeal is '. $status;

        return $data;
    }

    public function getAppealById($id)
    {
        $data = TimesheetAppeals::find($id);

        return $data;
    }

    public function approveAllTimesheetAppeal($r)
    {
        $input = $r->input();

        if (!isset($input['id'])) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Please select the timesheet submission first!';

            return $data;
        }

        $ids = $input['id'];
        $status['status'] = 'Approved';

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        TimesheetAppeals::where($cond)->whereIn('id', $ids)->update($status);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Log Appeal is Approved';

        return $data;
    }

    // public function getParticipantNameById($id)
    // {
    //     $data = Employee::find($id);

    //     return $data;
    // }

    public function getemployeeNamecreator($id)
    {
        $timesheetApproval = TimesheetApproval::find($id);
        if ($timesheetApproval) {
            return $timesheetApproval->employee_name;
        }
        return '';
    }

    public function getApproverAppeal()
    {
        $user = Auth::user();
        $user_id = $user->id;
    
        $employment = DB::table('employment')
            ->select('tsapprover', 'employeeName')
            ->where('user_id', $user_id)
            ->first(); // Retrieve only the first matching record
    
        $approverName = null;
        if (!empty($employment->tsapprover)) {
            $approverName = DB::table('employment')
                ->where('user_id', $employment->tsapprover)
                ->value('employeeName');
        }
    
        return $approverName;
    }

    public function participants()
    {
        $data = Employee::where([
            ['tenant_id', Auth::user()->tenant_id],
            ['employeeid', '!=', null],
            ['status', 'active'],
        ])->get();
    
        return $data;
    }
    

    





    
    
    


    
    






}
