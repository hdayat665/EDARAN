<?php

namespace App\Http\Controllers\Timesheet;

use App\Service\MyTimeSheetService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyTimesheetController extends Controller
{
    public function myTimesheetView()
    {
        $mts = new MyTimeSheetService;

        $data = $mts->myTimesheetView();
        $data['user_id'] = Auth::user()->id;
        $data['employee_id'] = $data['employee']->id;
        $data['department_id'] = $data['employee']->department;

        return view('pages.timesheet.myTimesheet', $data);
    }

    public function createLog(Request $r)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->createLog($r);

        return response()->json($result);
    }

    public function deleteLog($id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->deleteLog($id);

        return response()->json($result);
    }

    public function getLogsById($id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getLogsById($id);

        return $result;
    }

    public function updateTimesheetLog(Request $r, $id)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->updateLog($r, $id);

        return response()->json($result);
    }

    public function createEvent(Request $r)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->createEvent($r);

        return response()->json($result);
    }

    public function deleteEvent($id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->deleteEvent($id);

        return response()->json($result);
    }

    public function getEventById($id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getEventById($id);

        return $result;
    }

    public function updateTimesheetEvent(Request $r, $id)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->updateEvent($r, $id);

        return response()->json($result);
    }

    public function getLogs()
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getLogs();

        return response()->json($result);
    }

    public function getEvents()
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getEvents();

        return response()->json($result);
    }

    public function submitForApproval($userId = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->submitForApproval($userId);

        return response()->json($result);
    }

    public function getTimesheet()
    {
        $ss = new MyTimeSheetService;

        $result['events'] = $ss->getEvents();
        $result['logs'] = $ss->getLogs();

        return response()->json($result);
    }

    public function getLocationByProjectId($project_id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getLocationByProjectId($project_id);

        return response()->json($result);
    }

    public function getActivityByProjectId($project_id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getActivityByProjectId($project_id);

        return response()->json($result);
    }

    public function timesheetApprovalView()
    {
        $ss = new MyTimeSheetService;

        $data['timesheets'] = $ss->timesheetApprovalView();
        $data['statusId'] = '';
        $data['departmentId'] = '';
        $data['deisgnationId'] = '';
        $data['employeeId'] = '';

        return view('pages.timesheet.timesheetApproval', $data);
    }

    public function updateStatusTimesheet($id = '', $status = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->updateStatusTimesheet($id, $status);

        return response()->json($result);
    }

    public function searchTimesheet(Request $r)
    {
        $ss = new MyTimeSheetService;
        $input = $r->input();

        $data['timesheets'] = $ss->searchTimesheet($r);
        $data['statusId'] = $input['status'];
        $data['departmentId'] = $input['department'];
        $data['deisgnationId'] = $input['designation'];
        $data['employeeId'] = $input['employee_name'];

        return view('pages.timesheet.timesheetApproval', $data);
    }


}
