<?php

namespace App\Service;

use App\Models\News;
use App\Models\TimesheetEvent;
use App\Models\Employee;
use App\Models\GeneralClaim;
use App\Models\Project;
use App\Models\ProjectLocation;
use App\Models\ProjectMember;
use App\Models\holidayModel;
use App\Models\KnowledgeLibrary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Service\Carbon;

class DashboardService
{

    public function newsView()
    {
        $data['news'] = News::where('tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'desc')
            ->get();

        if ($data['news']->isEmpty()) {
            $data['news'] = collect(); // Set an empty collection if there are no news items
        }

        return $data;
    }

    public function eventView()
{
    if (!Auth::check()) {
        // Participant is not logged in, return empty array or redirect to login page
        return [];
    }

    $participantId = Auth::user()->id;

    $data = DB::table('timesheet_event as a')
        ->leftJoin('employment as b', 'a.user_id', '=', 'b.user_id')
        ->select('a.*', 'b.employeeName')
        ->whereRaw("FIND_IN_SET($participantId, a.participant)")
        ->orderBy('a.start_date', 'asc')
        ->get();

    return $data;
}


    public function myProject()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        // pr(Auth::user()->id);
        $projectMember = ProjectMember::select('project_id')->where('employee_id', '=', $employee->id)->groupBy('project_id')->get();

        foreach ($projectMember as $project) {
            $projectId[] = $project->project_id;
        }

        $data2 = DB::table('project_member as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')
            ->select('a.id as member_id', 'a.status as request_status', 'a.location', 'a.id as memberId', 'b.*', 'c.customer_name')
            ->where([['a.employee_id', '=', $employee->id], ['a.status', 'approve'], ['b.status', '!=', 'CLOSED']])
            ->get();


        $data['numberOfObjects'] = count($data2);

        if (!$data) {
            $data = [];
        }
        //pr($data['numberOfObjects']);
        return $data;
    }

    public function allproject()
    {
        $tenant_id = Auth::user()->tenant_id;
        $cond[1] = ['a.tenant_id', '=', $tenant_id];

        $data2 = DB::table('project as a')
            ->select('a.*')
            ->where($cond)
            ->orderBy('id', 'desc')
            ->get();

        $data['allproject'] = count($data2);

        if (!$data) {
            $data = [];
        }


        return $data;
    }
    public function allEmployee()
    {
        $userId = Auth::user()->tenant_id;
        $data2 = DB::table('employment as a')
            ->select('a.*')
            ->where([['a.tenant_id', $userId], ['status', '=', 'active']])
            ->orderBy('id', 'desc')
            ->get();

        $data['allEmployee'] = count($data2);
        //pr($data['allEmployee']);
        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function getunlogdate() 
    {
        $user = Auth::user();
        $getstate = DB::table('employment as a')
            ->leftJoin('branch as b', 'a.branch', '=', 'b.id')
            ->leftJoin('location_cities as c', 'b.ref_cityid', '=', 'c.id')
            ->where('a.user_id', $user->id)
            ->select('c.state_id')
            ->first();

        $cityId = $getstate->state_id;

        $getweekend = DB::table('leave_weekend as a')
            ->where('a.state_id', '=', $cityId)
            ->whereNull('a.total_time')
            ->select('a.day_of_week')
            ->get();

        $sortedWeekendDays = $getweekend->pluck('day_of_week')->sort();

        $higherNumber = $sortedWeekendDays->last();
        $lowerNumber = $sortedWeekendDays->first();

        $currentMonth = date('m');
        $currentYear = date('Y');
        $currentDay = date('j');

        $datesInMonth = array();
        for ($day = 1; $day <= $currentDay; $day++) {
            $date = date('Y-m-d', strtotime("$currentYear-$currentMonth-$day"));
            $dayOfWeek = date('w', strtotime($date));
            if ($dayOfWeek != $higherNumber && $dayOfWeek != $lowerNumber) {
                $datesInMonth[] = $date;
            }
        }
        
        $userId = $user->id;

        // dd($datesInMonth);
        $leaves = DB::table('myleave')
        ->where('up_user_id', $userId)
        ->whereRaw("MONTH(start_date) = ?", [$currentMonth])
        ->where('status_final', '=', '4')
        ->select('start_date', 'end_date')
        ->get();

        $leavesdate = array();

        foreach ($leaves as $leave) {
            $startDate = \Carbon\Carbon::parse($leave->start_date);
            $endDate = \Carbon\Carbon::parse($leave->end_date);

            // Generate an array of dates between the start and end dates
            $dateRange = \Carbon\CarbonPeriod::create($startDate, $endDate);

            // Populate the range between start and end dates
            foreach ($dateRange as $date) {
                $formattedDate = $date->format('Y-m-d');
                $leavesdate[$formattedDate] = [
                    'start_date' => $leave->start_date,
                    'end_date' => $leave->end_date,
                ];
            }
        }

        // dd($leavesdate);

        $datewoutwknd = array_diff($datesInMonth, array_keys($leavesdate));
        // dd($datewoutwknd);



        $holidays = DB::table('leave_holiday')
            ->where(function ($query) use ($cityId) {
                if ($cityId === null) {
                    $query->whereRaw("FIND_IN_SET(NULL, state_id)");
                } else {
                    $query->whereRaw("FIND_IN_SET($cityId, state_id)");
                }
            })
            ->whereRaw("MONTH(start_date) = ?", [$currentMonth])
            ->where('leave_holiday.tenant_id', '=',Auth::user()->tenant_id)
            ->select('start_date', 'end_date', 'state_id')
            ->get();


        $holidaybystate = array();

        foreach ($holidays as $holiday) {
            $startDate = \Carbon\Carbon::parse($holiday->start_date);
            $endDate = \Carbon\Carbon::parse($holiday->end_date);

            // Generate an array of dates between the start and end dates
            $dateRange = \Carbon\CarbonPeriod::create($startDate, $endDate);

            // Populate the range between start and end dates
            foreach ($dateRange as $date) {
                $formattedDate = $date->format('Y-m-d');
                $holidaybystate[$formattedDate] = [
                    'start_date' => $holiday->start_date,
                    'end_date' => $holiday->end_date,
                ];
            }
        }
        // dd($holidaybystate);

        $datewoutwknd = array_diff($datesInMonth, array_keys($leavesdate));
        $datewoutholiday = array_diff($datewoutwknd, array_keys($holidaybystate));

        // dd($datewoutholiday);



            $userId = $user->id;
            $logDatesInMonth = array();

            $logs = DB::table('timesheet_log')
            ->where('user_id', $userId)
            ->whereRaw("MONTH(date) = ?", [$currentMonth])
            ->select('date', 'total_hour')
            ->get();

        $logsWithTotalHours = array();

        foreach ($logs as $log) {
            $date = $log->date;
            
            // Split the total_hour time string into hours and minutes.
            list($hours, $minutes) = explode(':', $log->total_hour);
            
            // If the date already exists in the array, add the hours and minutes to the existing totals.
            if (isset($logsWithTotalHours[$date])) {
                $logsWithTotalHours[$date]['hours'] += $hours;
                $logsWithTotalHours[$date]['minutes'] += $minutes;

                // If minutes are more than 60, convert it to hours.
                if ($logsWithTotalHours[$date]['minutes'] >= 60) {
                    $extraHours = floor($logsWithTotalHours[$date]['minutes'] / 60);
                    $logsWithTotalHours[$date]['hours'] += $extraHours;
                    $logsWithTotalHours[$date]['minutes'] -= $extraHours * 60;
                }
            } else {
                // If the date doesn't exist in the array, add it with the hours and minutes.
                $logsWithTotalHours[$date] = [
                    'date' => $date,
                    'hours' => $hours,
                    'minutes' => $minutes,
                ];
            }
        }

        // Format the total hours and minutes back into 'HH:MM' format.
        foreach ($logsWithTotalHours as &$log) {
            $log['total_hour'] = sprintf('%02d:%02d', $log['hours'], $log['minutes']);
            unset($log['hours']);
            unset($log['minutes']);
        }

        // dd($logsWithTotalHours);


        $events = DB::table('timesheet_event')
            ->whereRaw("MONTH(start_date) = ?", [$currentMonth])
            ->get();

        $attendances = DB::table('attendance_event')
            ->where('user_id', $userId)
            ->where('status', 'attend')
            ->pluck('event_id')
            ->toArray();

        $eventsWithTotalHours = array();

        foreach ($events as $event) {
            $participants = explode(',', $event->participant);
            if (in_array($userId, $participants)) {
                $date = date('Y-m-d', strtotime($event->start_date));
                $dayOfWeek = date('w', strtotime($date));
                if ($dayOfWeek != 6 && $dayOfWeek != 0) {
                    if ($date <= date('Y-m-d') && in_array($event->id, $attendances)) {
                        list($hours, $minutes) = explode(':', $event->duration);
                        $hours = (int)$hours;
                        $minutes = (int)$minutes;
                        
                        // If the date already exists in the array, add the hours and minutes to the existing totals.
                        if (isset($eventsWithTotalHours[$date])) {
                            $eventsWithTotalHours[$date]['hours'] += $hours;
                            $eventsWithTotalHours[$date]['minutes'] += $minutes;
                        } else {
                            // If the date doesn't exist in the array, add it with the hours and minutes.
                            $eventsWithTotalHours[$date] = [
                                'date' => $date,
                                'hours' => $hours,
                                'minutes' => $minutes,
                            ];
                        }
                        
                        // If minutes are more than 60, convert it to hours.
                        if ($eventsWithTotalHours[$date]['minutes'] >= 60) {
                            $extraHours = floor($eventsWithTotalHours[$date]['minutes'] / 60);
                            $eventsWithTotalHours[$date]['hours'] += $extraHours;
                            $eventsWithTotalHours[$date]['minutes'] -= $extraHours * 60;
                        }
                        
                        // Format hours and minutes as 'total_hour'.
                        $eventsWithTotalHours[$date]['total_hour'] = sprintf('%02d:%02d', $eventsWithTotalHours[$date]['hours'], $eventsWithTotalHours[$date]['minutes']);
                    }
                }
            }
        }

        // Remove 'hours' and 'minutes' from the result.
        foreach ($eventsWithTotalHours as $date => $value) {
            unset($eventsWithTotalHours[$date]['hours']);
            unset($eventsWithTotalHours[$date]['minutes']);
        }




        foreach($logsWithTotalHours as $date => $value) {
            if(isset($eventsWithTotalHours[$date])) {
                // Convert total_hour to minutes for logs
                list($logHours, $logMinutes) = explode(':', $value['total_hour']);
                $logTotalMinutes = $logHours * 60 + $logMinutes;
                
                // Convert total_hour to minutes for events
                list($eventHours, $eventMinutes) = explode(':', $eventsWithTotalHours[$date]['total_hour']);
                $eventTotalMinutes = $eventHours * 60 + $eventMinutes;

                // Sum total minutes
                $totalMinutes = $logTotalMinutes + $eventTotalMinutes;

                // Convert back to hours and minutes
                $hours = floor($totalMinutes / 60);
                $minutes = $totalMinutes % 60;

                // Update total_hour in logs array
                $logsWithTotalHours[$date]['total_hour'] = sprintf('%02d:%02d', $hours, $minutes);

                // Remove the date from events array to avoid duplication
                unset($eventsWithTotalHours[$date]);
            }
        }

        // Merge the two arrays
        $finalArray = array_merge($logsWithTotalHours, $eventsWithTotalHours);



        $finalArrayFiltered = [];

        $getweekday = DB::table('leave_weekend as a')
            ->where('a.state_id', '=', $cityId)
            ->whereNotNull('a.total_time')
            ->select('a.day_of_week', 'a.total_time')
            ->get();

        $weekdayTimes = [];
        foreach ($getweekday as $day) {
            $weekdayTimes[$day->day_of_week] = $day->total_time;
        }

        $finalArrayFiltered = [];

        foreach($finalArray as $date => $value) {
            // Get the day of the week for the current date.
            $dayOfWeek = date('N', strtotime($date));

            // Set the comparison time based on the day of the week.
            if(isset($weekdayTimes[$dayOfWeek])) {
                $comparisonTime = $weekdayTimes[$dayOfWeek];
            } else {
                // You can set default comparisonTime for other days or add more conditions for other days.
                $comparisonTime = "08:00";
            }

            list($comparisonHours, $comparisonMinutes) = explode(':', $comparisonTime);

            list($hours, $minutes) = explode(':', $value['total_hour']);
            if($hours > $comparisonHours || ($hours == $comparisonHours && $minutes >= $comparisonMinutes)) {
                $finalArrayFiltered[$date] = $value;
            }
        }


        $datesNotInFinalArray = array_diff($datewoutholiday, array_keys($finalArrayFiltered));

        if ($cityId === null) {
            $datesNotInFinalArray['unlogdate'] = 0;
        } else {
            $datesNotInFinalArray['unlogdate'] = count($datesNotInFinalArray);
        }

        if (!$datesNotInFinalArray) {
            $datesNotInFinalArray = [];
        }

        return $datesNotInFinalArray;

    }

    public function knowledgeLib()
    {
        $data['knowledgeLib'] = KnowledgeLibrary::where('tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'desc')
            ->get();

        if ($data['knowledgeLib']->isEmpty()) {
            $data['knowledgeLib'] = collect(); // Set an empty collection if there are no news items
        }

        return $data;
    }

}