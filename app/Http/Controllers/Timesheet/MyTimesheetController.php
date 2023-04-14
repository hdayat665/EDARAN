<?php

namespace App\Http\Controllers\Timesheet;

use App\Service\MyTimeSheetService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyTimesheetController extends Controller
{
    // public function myTimesheetView()
    // {
    //     $mts = new MyTimeSheetService;
    
    //     $data = $mts->myTimesheetView();
    //     $data['user_id'] = Auth::user()->id;
    //     $data['employee_id'] = $data['employee']->id;
    //     $data['department_id'] = $data['employee']->department;
    //     $data['eleaveapprover'] = $data['employee']->eleaveapprover;
    //     $data['status_appeal'] = $data['employee']->status_appeal;

    //     // $data['employees'] = $mts->getTimesheetEvents();
        
    //     return view('pages.timesheet.myTimesheet', $data);
    // }

    public function myTimesheetView()
    {
        $mts = new MyTimeSheetService;
    
        $data = $mts->myTimesheetView();
        $data['user_id'] = Auth::user()->id;
        // $data['employee_id'] = $data['employee']->id;
        // $data['department_id'] = $data['employee']->department;
        // $data['eleaveapprover'] = $data['employee']->eleaveapprover;
        // $data['status_appeal'] = $data['employee']->status_appeal;

        // $data['employees'] = $mts->getTimesheetEvents();

        if ($data['employee'] !== null) {
            $data['employee_id'] = $data['employee']->id;
            $data['department_id'] = $data['employee']->department;
            $data['eleaveapprover'] = $data['employee']->eleaveapprover;
            $data['status_appeal'] = $data['employee']->status_appeal;
            $data['appeal_Date'] = $data['employee']->appeal_date;
        } else {
            $data['employee_id'] = null;
            $data['department_id'] = null;
            $data['eleaveapprover'] = null;
            $data['appeal_Date'] = null;
        }
        
        return view('pages.timesheet.myTimesheet', $data);
    }
    

    public function createLog(Request $r)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->createLog($r);

        return response()->json($result);
    }

    public function createAppeal(Request $r)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->createAppealTimesheet($r);

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
        $result['leaves'] = $ss->getLeaves();
        $result['holidays'] = $ss->getHolidays();
        // dd($result['holidays']);
        
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

    public function getActivityNamebyLogsId($project_id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getActivityNamebyLogsId($project_id);

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
        $data['months'] = '';

        return view('pages.timesheet.timesheetApproval', $data);
    }

    //TIMESHEET SUMMARY
    public function timesheetSummaryView()
    {   
        
        $ss = new MyTimeSheetService;
        
        $data['timesheets'] = $ss->timesheetSummaryView();

        return view('pages.timesheet.summarytimesheet', $data);
    }

    public function deleteTimesheet($id)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->deleteTimesheet($id);

        return response()->json($result);
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
        $data['employee_id'] = $input['employee_name'];

        $data['months'] = $input['month'];

        return view('pages.timesheet.timesheetApproval', $data);
    }

    public function approveAllTimesheet(Request $r)
    {
        $ss = new MyTimeSheetService;

        $result = $ss->approveAllTimesheet($r);

        return response()->json($result);
    }

    // public function viewTimesheet($id = '', $userId = '')
    // {
    //     // $ss = new MyTimeSheetService;

    //     $data['id'] = $id;
    //     $data['userId'] = $userId;
        
    //     return view('pages.timesheet.viewTimesheet', $data);
    // }

    public function viewTimesheet($id = '', $userId = '')
{
    $ss = new MyTimeSheetService;

    $data['id'] = $id;
    $data['userId'] = $userId;
    $data['employee_name'] = $ss->getemployeeNamelog($id);


    return view('pages.timesheet.viewTimesheet', $data);
}


    //SUMMARRY TIMESHEET
   

    public function getTimesheetById($id = '', $userId = '')
    {
        // pr($id);
        $ss = new MyTimeSheetService;

        $getIds =  $ss->getTimesheetById($id, $userId);
        // pr($getIds->event_id);

        $result['events'] = [];
        $result['logs'] = [];
        $result['leaves'] = [];
        $result['holidays'] = [];

        if ($getIds) {
            $result['events'] = $ss->getEventsByLotId($getIds->event_id);
            $result['logs'] = $ss->getLogsByLotId($getIds->log_id);
            $result['leaves'] = $ss->getLeavesByLotId($getIds->leave_id);
            $result['holidays'] = $ss->getHolidaysByLotId($getIds->holiday_id);
            // dd($result['holidays']);
        }

        return response()->json($result);
    }

    public function getProjectByidTimesheet($project_id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getProjectByidTimesheet($project_id);

        return response()->json($result);
    }

    public function getActivityNameById($project_id = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getActivityNameById($project_id);

        return response()->json($result);
    }

    public function updateAttendStatus($id = '', $status = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->updateAttendStatus($id, $status);

        return response()->json($result);
    }

    public function getAttendanceById($eventId = '', $userId = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getAttendanceById($eventId, $userId);

        return response()->json($result);
    }

    public function getAttendanceByEventId($eventId = '')
    {
        $ss = new MyTimeSheetService;

        $result = $ss->getAttendanceByEventId($eventId);

        return response()->json($result);
    }

    public function realtimeEventTimesheetView()
    {
        // $data = [];
        $input = [];
        $ss = new MyTimeSheetService;
        $data['events'] = $ss->getRealtimeEvents($input);

        $data['employeeId'] = '';
        $data['eventId'] = '';
        return view('pages.timesheet.realtimeTimesheet',$data);

    }

    public function searchRealtimeEventTimesheet(Request $r)
    {
        $data = [];
        $input = $r->input();
        $ss = new MyTimeSheetService;
        $data['events'] = $ss->getRealtimeEvents($input);
        $data['employeeId'] = $input['employee_name'];
        $data['eventId'] = $input['event_name'];
        
        return view('pages.timesheet.realtimeTimesheet',$data);

    }

    public function realtimeEmployeeTimesheetView()
    {
        $data = [];

        return view('pages.timesheet.employeeRealtime', $data);
    }


    public function getTimesheetamendById($id)
    {
        $ss = new MyTimeSheetService;

        $data = $ss->gettimesheetid($id);

        return response()->json($data);
    }


    public function updatereason(Request $r)
    {
        $ps = new MyTimeSheetService;

        $result = $ps->addamendreasons($r);

        return response()->json($result);
    }


    public function getConfirmSubmitById($id)
    {
        $ss = new MyTimeSheetService;

        $data = $ss->getConfirmSubmitById($id);

        return response()->json($data);
    }



    // public function getParticipantNameById($participant = '')
    // {
    //     $ss = new MyTimeSheetService;

    //     $result = $ss->getParticipantNameById($participant);

    //     return response()->json($result);
    // }


}
