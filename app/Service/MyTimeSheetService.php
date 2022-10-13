<?php

namespace App\Service;

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

        return $data;
    }

    public function createLog($r)
    {
        $input = $r->input();
        $user = Auth::user();

        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        $input['date'] = date_format(date_create($input['date']), 'Y/m/d');

        $start_time = strtotime($input['start_time']);
        $end_time = strtotime($input['end_time']);
        $totaltime = $end_time - $start_time;

        if (isset($input['office_log_project'])) {
            $input['project_id'] = $input['office_log_project'];
        }

        if (isset($input['activity_office'])) {
            $input['activity_name'] = $input['activity_office'];
        }

        if (isset($input['project_location_office'])) {
            $input['project_location'] = $input['project_location_office'];
        }

        $h = intval($totaltime / 3600);

        $totaltime = $totaltime - ($h * 3600);

        // Minutes is obtained by dividing
        // remaining total time with 60
        $m = intval($totaltime / 60);

        // Remaining value is seconds
        $s = $totaltime - ($m * 60);

        // Printing the result
        $input['total_hour'] = "$h:$m:$s";

        TimesheetLog::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create logs';

        return $data;
    }

    public function updateLog($r, $id)
    {
        $input = $r->input();
        $user = Auth::user();

        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        $input['date'] = date_format(date_create($input['date']), 'Y/m/d');

        $start_time = strtotime($input['start_time']);
        $end_time = strtotime($input['end_time']);
        $totaltime = $end_time - $start_time;

        if (isset($input['office_log_project'])) {
            $input['project_id'] = $input['office_log_project'];
            unset($input['office_log_project']);
        }

        if (isset($input['activity_office'])) {
            $input['activity_name'] = $input['activity_office'];
            unset($input['activity_office']);
        }

        if (isset($input['project_location_office'])) {
            $input['project_location'] = $input['project_location_office'];
            unset($input['project_location_office']);
        }

        $h = intval($totaltime / 3600);

        $totaltime = $totaltime - ($h * 3600);

        // Minutes is obtained by dividing
        // remaining total time with 60
        $m = intval($totaltime / 60);

        // Remaining value is seconds
        $s = $totaltime - ($m * 60);

        // Printing the result
        $input['total_hour'] = "$h:$m:$s";

        TimesheetLog::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update timesheet log';

        return $data;
    }

    public function deleteLog($id)
    {
        $logs = TypeOfLogs::find($id);

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
            $data['msg'] = 'Success delete log';
        }

        return $data;
    }

    public function getLogsById($id)
    {
        $data = TimesheetLog::find($id);

        return $data;
    }

    public function createEvent($r)
    {
        $input = $r->input();
        $user = Auth::user();

        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        if (isset($input['type_recurring'])) {
            $input['type_recurring'] = implode(',', $input['type_recurring']);
        }
        if (isset($input['set_reccuring'])) {
            $input['set_reccuring'] = implode(',', $input['set_reccuring']);
        }
        if (isset($input['participant'])) {
            $input['participant'] = implode(',', $input['participant']);
        }

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
        $input['total_hour'] = "$h:$m:$s";

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

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create event';

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

        if (isset($input['participant'])) {
            $input['participant'] = implode(',', $input['participant']);
        }

        $input['start_date'] = date_format(date_create($input['start_date']), 'Y/m/d');
        $input['end_date'] = date_format(date_create($input['end_date']), 'Y/m/d');
        unset($input['inlineRadioOptions']);

        if ($input['location_by_project']) {
            $input['location'] = $input['location_by_project'];
            unset($input['location_by_project']);
        }

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

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update event';

        return $data;
    }

    public function deleteEvent($id)
    {
        $logs = TypeOfLogs::find($id);

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
            $data['msg'] = 'Success delete log';
        }

        return $data;
    }

    public function getEventById($id)
    {
        $data = TimesheetEvent::find($id);

        return $data;
    }

    public function getLogs()
    {
        $data = TimesheetLog::where([['tenant_id', Auth::user()->tenant_id], ['user_id', Auth::user()->id]])->get();

        return $data;
    }

    public function getEvents()
    {
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        $cond[2] = ['user_id', Auth::user()->id];
        $data = TimesheetEvent::where($cond)
        ->orWhere([['participant', 'like', '%' . Auth::user()->id . '%']])
        ->get();

        return $data;
    }

    public function getLocationByProjectId($project_id = '')
    {
        $data = ProjectLocation::where([['tenant_id', Auth::user()->tenant_id], ['project_id', $project_id]])->get();

        return $data;
    }

    public function getActivityByProjectId($project_id = '')
    {
        $data = ActivityLogs::where([['tenant_id', Auth::user()->tenant_id], ['project_id', $project_id]])->get();

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

        foreach ($logs as $log) {
            $log_id[] = $log->id;
        }

        foreach ($events as $event) {
            $event_id[] = $event->id;
        }
        // pr($log_id);
        $employee =  DB::table('employment as a')
            ->leftJoin('designation as b', 'a.designation', '=', 'b.id')
            ->leftJoin('department as c', 'a.department', '=', 'c.id')
            ->select('a.id', 'c.departmentName', 'b.designationName', 'a.employeeName')
            ->where([['user_id', $userId]])
            ->first();
        // pr($employee);
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['user_id'] = $userId;
        $input['month'] = date('M');
        if (isset($input['log_id'])) {
            $input['log_id'] = implode(',', $log_id);
        }
        $input['event_id'] = implode(',', $event_id);
        $input['employee_id'] = $employee->id;
        $input['employee_name'] = $employee->employeeName;
        $input['department'] = $employee->departmentName;
        $input['designation'] = $employee->designationName;
        $input['status'] = 'pending';

        TimesheetApproval::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success submit request';

        return $data;
    }

    public function timesheetApprovalView()
    {
        $data = TimesheetApproval::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->get();

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
            $data['msg'] = 'Please checked at least 1 data';

            return $data;
        }

        $ids = $input['id'];
        $status['status'] = 'approve';

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        TimesheetApproval::where($cond)->whereIn('id', $ids)->update($status);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success approve timesheet';

        return $data;
    }

    public function getTimesheetById($id = '', $userId = '')
    {

        if ($userId) {
            $data = TimesheetApproval::where('user_id', $userId)->first();
        }else{
            $data = TimesheetApproval::find($id);
        }


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

        $data = TimesheetLog::whereIn('id', $ids)->get();

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
        $data = AttendanceEvent::where([['event_id', $eventId], ['user_id', $userId]])->orderBy('created_at','DESC')->first();

        return $data;
    }

    public function getAttendanceByEventId($eventId = '')
    {
        $data = DB::table('attendance_event as a')
        ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
        ->select('b.employeeName', 'a.status')
        ->where('a.event_id', $eventId)
        ->orderBy('b.employeeName','ASC')
        ->get();

        return $data;
    }

    public function getRealtimeEvents($input = [])
    {

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];
        if (isset($input['employee_name'])) {
            $cond[2] = ["participant",'like', "%".$input["employee_name"]."%"];
        }

        if (isset($input['event_name'])) {
            $cond[3] = ['event_name', $input['event_name']];
        }

        if (isset($input['date_range'])) {
            $date_range = explode(' - ',$input['date_range']);
            $cond[4] = ['start_date','>=', date_format(date_create($date_range[0]), 'Y-m-d')];
            $cond[5] = ['end_date','<=', date_format(date_create($date_range[1]), 'Y-m-d')];
        }

        $data = TimesheetEvent::where($cond)
        ->get();
        // pr($data);
        // pr();
        return $data;
    }


}
