<?php

namespace App\Service;

use App\Models\TimesheetEvent;
use App\Models\TimesheetLog;
use Illuminate\Support\Facades\Auth;

class MyTimeSheetService
{
    public function myTimesheetView()
    {
        $data = [];

        return $data;
    }

    public function createLog($r)
    {
        $input = $r->input();
        $user = Auth::user();

        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        $input['date'] = date_format(date_create($input['date']), 'Y/m/d');
        // $input['total_hour'] = $input['start_time'] - $input['end_time'];
        // pr($input);
        TimesheetLog::create($input);

        // $typeOfLog = TypeOfLogs::orderby('created_at', 'desc')->first();

        // if (isset($input['activity_name'])) {

        //     foreach ($input['activity_name'] as $activity) {
        //         $activityData['activity_name'] = $activity;
        //         $activityData['logs_id'] = $typeOfLog->id;

        //         ActivityLogs::create($activityData);
        //     }
        // }

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

        if(isset($input['project_id']))
        {
            $logsData['project_id'] = $input['project_id'];
        }

        if($input['type_of_log'] == 'Non-Project')
        {
            $logsData['project_id'] = null;
        }

        $logsData['department'] = $input['department'];
        $logsData['type_of_log'] = $input['type_of_log'];
        $logsData['tenant_id'] = $user->tenant_id;
        $logsData['activity_name'] = implode(', ', $input['activity_name']);

        TypeOfLogs::where('id', $id)->update($logsData);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update role';

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
        $data = TypeOfLogs::find($id);

        return $data;
    }

    public function createEvent($r)
    {
        $input = $r->input();
        $user = Auth::user();

        $input['user_id'] = $user->id;
        $input['tenant_id'] = $user->tenant_id;
        $input['type_recurring'] = implode(',', $input['type_recurring']);
        if (isset($input['set_reccuring'])) {
            $input['set_reccuring'] = implode(',', $input['set_reccuring']);
        }

        $input['start_date'] = date_format(date_create($input['start_date']), 'Y/m/d');
        $input['end_date'] = date_format(date_create($input['end_date']), 'Y/m/d');

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

        if(isset($input['project_id']))
        {
            $logsData['project_id'] = $input['project_id'];
        }

        if($input['type_of_log'] == 'Non-Project')
        {
            $logsData['project_id'] = null;
        }

        $logsData['department'] = $input['department'];
        $logsData['type_of_log'] = $input['type_of_log'];
        $logsData['tenant_id'] = $user->tenant_id;
        $logsData['activity_name'] = implode(', ', $input['activity_name']);

        TypeOfLogs::where('id', $id)->update($logsData);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update role';

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
        $data = TypeOfLogs::find($id);

        return $data;
    }
}
