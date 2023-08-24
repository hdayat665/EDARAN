<?php

namespace App\Service;

use id;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\ActivityLogs;
use App\Models\holidayModel;
use App\Models\MyLeaveModel;
use App\Mail\Mail as MailMail;
use App\Models\leavetypesModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\leaveEntitlementModel;
use Symfony\Component\Console\Input\Input;


class MyleaveService
{
    public function myleaveView()
    {

        $today = Carbon::now();

        $data = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.up_user_id', Auth::user()->id)
            ->where(function ($query) use ($today) {
                $query->whereDate('myleave.leave_date', '>=', $today)
                    ->orWhere(function ($subquery) {
                        $subquery->where('myleave.status_final', '=', 1)
                                ->orWhere('myleave.status_final', '=', 2);
                    });
            })
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc')
            ->get();

        return $data;


    }

    public function myleaveHistoryView()
    {
        $today = Carbon::now();

        $data = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.up_user_id', '=', Auth::user()->id)
            ->whereDate('myleave.leave_date', '<', $today)
            ->where(function ($query) {
                $query->where('myleave.status_final', '=', 3)
                    ->orWhere('myleave.status_final', '=', 4);
            })
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc')
            ->get();

        return $data;
    }

    public function searcmyleavehistory($r)
    {
        $input = $r->input();

        $today = Carbon::now();

        $query = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.up_user_id', '=', Auth::user()->id)
            ->whereDate('myleave.leave_date', '<', $today)
            ->where(function ($query) {
                $query->where('myleave.status_final', '=', 3)
                    ->orWhere('myleave.status_final', '=', 4);
            })
            ->select('myleave.*', 'leave_types.leave_types as type')
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc');


        if ($input['applydate']) {
            $applydate = $input['applydate'];
            $query->where('myleave.applied_date', '=', $applydate);
        }

        if ($input['typelist']) {
            $typelist = $input['typelist'];
            $query->where('leave_types.id', '=', $typelist);
        }

        if ($input['status']) {
            $status = $input['status'];
            $query->where('myleave.status_final', '=', $status);
        }

        $data = $query->get();
        return $data;
    }

    public function searchmyleaveView($r)
    {
        $input = $r->input();

        $today = Carbon::now();

        $query = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.up_user_id', '=', Auth::user()->id)
            ->where(function ($query) use ($today) {
                $query->whereDate('myleave.leave_date', '>=', $today)
                    ->orWhere(function ($subquery) {
                        $subquery->where('myleave.status_final', '=', 1)
                                ->orWhere('myleave.status_final', '=', 2);
                    });
            })
            ->select('myleave.*', 'leave_types.leave_types as type')
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc');


        if ($input['applydatemy']) {
            $applydate = $input['applydatemy'];
            $query->where('myleave.applied_date', '=', $applydate);
        }

        if ($input['typelistmy']) {
            $typelist = $input['typelistmy'];
            $query->where('leave_types.id', '=', $typelist);
        }

        if ($input['statusmy']) {
            $status = $input['statusmy'];
            $query->where('myleave.status_final', '=', $status);
        }

        $data = $query->get();
        return $data;
    }

    public function datatype()
    {
        $data =
            leavetypesModel::where('tenant_id', Auth::user()->tenant_id)
            ->where('status', '=', 1)
            ->get();
        return $data;
    }

    public function datatypesick()
    {
        $data =
            leavetypesModel::where('tenant_id', Auth::user()->tenant_id)
            ->where('status', '=', 1)
            ->where('leave_types_code', '=', 'SL')
            ->first();
        return $data;
    }

    public function datapie()
    {

        // $data =
        // leavetypesModel::where('tenant_id', Auth::user()->tenant_id)
        //                 ->where('status', '=', 1)
        //                 ->get();
        // return $data;

        $data = leaveEntitlementModel::where('leave_Entitlement.tenant_id', Auth::user()->tenant_id)
            ->rightJoin('myleave', 'leave_entitlement.id_userProfile', '=', 'myleave.up_user_id')
            ->where('up_rec_status', '4')
            ->where('up_app_status', '4')
            ->where('up_user_id', Auth::user()->id)
            ->select('current_entitlement', 'current_entitlement_balance', DB::raw('SUM(total_day_applied) as total_day_applied'))
            ->first();

        return $data;
    }


    public function createtmyleave($r) {

        $input = $r->input();

        $typeofleave = $r->input('typeofleave'); // Get the input value

        $checkType = leavetypesModel::select('leave_types.id')
            ->where('leave_types.tenant_id', Auth::user()->tenant_id)
            ->whereIn('leave_types.leave_types_code', ['AL', 'EL'])
            ->get();

        $checkTypeIds = $checkType->pluck('id')->toArray();

        // Check if the input typeofleave is in the allowed leave type IDs
        if (in_array($typeofleave, $checkTypeIds)) {
            $currentYearbalance = Carbon::now()->format('Y');
            $checkleavebalance = leaveEntitlementModel::select('current_entitlement_balance')
                ->where('id_employment', Auth::user()->id)
                ->whereYear('le_year', '=', $currentYearbalance)
                ->first();

            $currentYear = Carbon::now()->format('Y');

            $checkleavepending = MyLeaveModel::select(DB::raw('SUM(total_day_applied) as total_day_applied'))
                ->where('myleave.tenant_id', Auth::user()->tenant_id)
                ->where('myleave.status_final', '!=', 3)
                ->where(function ($query) {
                    $query->where('myleave.status_final', '=', 1)
                        ->orWhere('myleave.status_final', '=', 2);
                })
                ->where(function ($query) {
                    $query->where('myleave.calculate', '=', null)
                        ->orWhere('myleave.calculate', '=', '');
                })
                ->whereIn('myleave.lt_type_id', $checkTypeIds)
                ->where('myleave.up_user_id', Auth::user()->id)
                ->whereYear('myleave.applied_date', '=', $currentYear)
                ->first();

            if ($checkleavebalance->current_entitlement_balance <= 0) {
                $data = [
                    'msg' => 'You have exceeded your leave entitlement.',
                    'status' => config('app.response.error.status'),
                    'type' => config('app.response.error.type'),
                    'title' => config('app.response.error.title')
                ];

                return $data;
            }

            if ($checkleavebalance && $checkleavepending) {
                $totalbalance = $checkleavebalance->current_entitlement_balance - $checkleavepending->total_day_applied;

                $wan = $totalbalance - $r->input('total_day_appied'); // Assuming 'total_day_appied' is the number of days applied

                if ($wan < 0) {
                    $data = [
                        'msg' => 'You have exceeded your leave entitlement',
                        'status' => config('app.response.error.status'),
                        'type' => config('app.response.error.type'),
                        'title' => config('app.response.error.title')
                    ];

                    return $data;
                }
            }
        }

        $checkleavetype = leavetypesModel::where([
            ['id', '=', $input['typeofleave']],
            ['tenant_id', '=', Auth::user()->tenant_id]
        ])->first();


        if ($checkleavetype && $checkleavetype->day != 0) {
            $startDate = Carbon::now()->addDays($checkleavetype->day - 1);
            $currentDate = Carbon::now();
            $currentDateTime = $currentDate->format('Y-m-d');

            if ($r->input('leave_date')) {
                $leaveDate = Carbon::parse($input['leave_date']);

                if ($leaveDate->between($currentDate, $startDate) || $leaveDate->lt($currentDate)) {
                    $data = [
                        'msg' => 'The application cannot be submitted. You must apply ' . $checkleavetype->leave_types . ' - ' . $checkleavetype->day . ' days from today ',
                        'status' => config('app.response.error.status'),
                        'type' => config('app.response.error.type'),
                        'title' => config('app.response.error.title')
                    ];

                    return $data;
                }
            }

            if ($r->input('start_date')) {
                $leaveDateOther = Carbon::parse($input['start_date']);

                if ($leaveDateOther->between($currentDate, $startDate) || $leaveDateOther->lt($currentDate)) {
                    $data = [
                        'msg' => 'The application cannot be submitted. You must apply ' . $checkleavetype->leave_types . ' - ' . $checkleavetype->day . ' days from today ',
                        'status' => config('app.response.error.status'),
                        'type' => config('app.response.error.type'),
                        'title' => config('app.response.error.title')
                    ];

                    return $data;
                }
            }
        }

        $getdata = Employee::where('tenant_id', Auth::user()->tenant_id)
            ->where('user_id', '=', Auth::user()->id)
            ->first();

        if (empty($getdata->eleaveapprover) && empty($getdata->eleaverecommender)) {
            $data['msg'] = 'The eLeave approver or recommender is empty. Please contact the admin for assistance';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            return $data;
        }


        if ($r->input('leave_date')) {


            if ($input['availability'] == 2) {

                $checkAL = leavetypesModel::select('leave_types.*')
                    ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
                    ->where('leave_types.leave_types_code', '=', 'AL')
                    ->first();

                $getDateSameOther = MyLeaveModel::where([
                    ['start_date', '<=', $input['leave_date']],
                    ['end_date', '>=',  $input['leave_date']],
                    ['tenant_id', '=', Auth::user()->tenant_id],
                    ['up_user_id', '=', Auth::user()->id],
                    ['lt_type_id', '=', $checkAL->id],
                    ['status_final', '=', 4],
                    ['calculate', '=', 1],
                ])->first();

                if (empty($getDateSameOther)) {
                    $data['msg'] = 'There is Pending Leave Application for the Selected Date';
                    $data['status'] = config('app.response.error.status');
                    $data['type'] = config('app.response.error.type');
                    $data['title'] = config('app.response.error.title');
                    return $data;
                }
            } else {
                $getDateSame = MyLeaveModel::where([

                    ['start_date', '<=', $input['leave_date']],
                    ['end_date', '>=', $input['leave_date']],
                    ['tenant_id', '=', Auth::user()->tenant_id],
                    ['up_user_id', '=', Auth::user()->id]

                ])->first();

                if ($getDateSame) {

                    $data['msg'] = 'There is an Existing Application for the Selected Date';
                    $data['status'] = config('app.response.error.status');
                    $data['type'] = config('app.response.error.type');
                    $data['title'] = config('app.response.error.title');

                    return $data;
                }
            }
        }



        if ($r->input('start_date')) {

            if ($input['availability'] == 2) {

                $checkAL = leavetypesModel::select('leave_types.*')
                    ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
                    ->where('leave_types.leave_types_code', '=', 'AL')
                    ->first();

                $getDateSameOther = MyLeaveModel::where([
                    ['start_date', '<=', $input['start_date']],
                    ['end_date', '>=',  $input['start_date']],
                    ['tenant_id', '=', Auth::user()->tenant_id],
                    ['up_user_id', '=', Auth::user()->id],
                    ['lt_type_id', '=', $checkAL->id],
                    ['status_final', '=', 4],
                    ['calculate', '=', 1],
                ])->first();

                if (empty($getDateSameOther)) {
                    $data['msg'] = 'You Have Pending Leave to be Approved for the Selected Date';
                    $data['status'] = config('app.response.error.status');
                    $data['type'] = config('app.response.error.type');
                    $data['title'] = config('app.response.error.title');
                    return $data;
                }
            } else {
                $getDateSameOther = MyLeaveModel::where([
                    ['start_date', '<=', $input['start_date']],
                    ['end_date', '>=',  $input['start_date']],
                    ['tenant_id', '=', Auth::user()->tenant_id],
                    ['up_user_id', '=', Auth::user()->id]
                ])->first();

                if ($getDateSameOther) {
                    $data['msg'] = 'There is an Existing Application for the Selected Date';
                    $data['status'] = config('app.response.error.status');
                    $data['type'] = config('app.response.error.type');
                    $data['title'] = config('app.response.error.title');

                    return $data;
                }
            }
        }



        $getDateHoliday = holidayModel::where([
            ['start_date', '=', $input['leave_date']],
            ['tenant_id', '=', Auth::user()->tenant_id]
        ])->first();

        if ($getDateHoliday) {
            $data['msg'] = 'The selected date cannot be chosen as it is a public holiday for ' . $getDateHoliday->holiday_title . '.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        if ($r->input('leave_date')) {

            $leaveDate = Carbon::createFromFormat('Y-m-d', $input['leave_date']);
            $dayOfWeek = $leaveDate->dayOfWeek;

            if ($dayOfWeek === Carbon::SATURDAY) {
                $dayOfWeekName = 'SATURDAY';
            } elseif ($dayOfWeek === Carbon::SUNDAY) {
                $dayOfWeekName = 'SUNDAY';
            }

            if (isset($dayOfWeekName)) {
                $formattedDate = $leaveDate->format('d M Y');
                $data['msg'] = 'The selected date (' . $formattedDate . ' - ' . $dayOfWeekName . ') cannot be chosen as it is a weekend.';
                $data['status'] = config('app.response.error.status');
                $data['type'] = config('app.response.error.type');
                $data['title'] = config('app.response.error.title');

                return $data;
            }
        }

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK && $_FILES['file']['size'] > 0) {
            $myleave = upload($r->file('file'));
            $input['file'] = $myleave['filename'];
        } else {

            $input['file'] = null;
        }

        if (isset($_FILES['fileuploadsick']) && $_FILES['fileuploadsick']['error'] === UPLOAD_ERR_OK && $_FILES['fileuploadsick']['size'] > 0) {
            $myleave = upload($r->file('fileuploadsick'));
            $input['fileuploadsick'] = $myleave['filename'];
        } else {

            $input['fileuploadsick'] = null;
        }


        $data1 = date('Y-m-d', strtotime($input['applied_date']));
        $data2 = $input['typeofleave'];
        $data3 = $input['noofday'];
        $data8 = $input['file'];
        $data8a = $input['fileuploadsick'];

        if (!empty($data8)) {
            $fileDocument = $data8;
        } elseif (!empty($data8a)) {
            $fileDocument = $data8a;
        } else {
            $fileDocument = null;
        }

        $data9 = strtoupper($input['reason']);


        $dataavailability = $input['availability'];

        if ($r->input('noofday') == 1) {
            $data3 = $input['noofday'];
            $data4 = $input['total_day_appied'];
            $data5 = date('Y-m-d', strtotime($input['leave_date']));
            $data6 = date('Y-m-d', strtotime($input['leave_date']));
            $data7 = date('Y-m-d', strtotime($input['leave_date']));
        } else if ($r->input('noofday') == 0.5) {
            $data3 = $input['noofday'];
            $data4 = $input['total_day_appied'];
            $data5 = date('Y-m-d', strtotime($input['leave_date']));
            $data6 = date('Y-m-d', strtotime($input['leave_date']));
            $data7 = date('Y-m-d', strtotime($input['leave_date']));
        } else {
            $data3 = $input['total_day_appied'];
            $data4 = $input['total_day_appied'];
            $data5 = date('Y-m-d', strtotime($input['start_date']));
            $data6 = date('Y-m-d', strtotime($input['start_date']));
            $data7 = date('Y-m-d', strtotime($input['end_date']));
        }

        if ($r->input('flexRadioDefault')) {
            $data10 = $input['flexRadioDefault'];
        } else {
            $data10 = null;
        }

        if (!$getdata->eleaverecommender && $getdata->eleaveapprover) {

            $input = [
                'applied_date' => $data1,
                'lt_type_id' => $data2,
                'day_applied' => $data3,
                'total_day_applied' => $data4,
                'leave_date' => $data5,
                'start_date' => $data6,
                'end_date' => $data7,
                'file_document' => $fileDocument,
                'reason' => $data9,
                'leave_session' => $data10,
                'up_approvedby_id' => $getdata->eleaveapprover,
                'status_user' => '2',
                'up_rec_status' => '4',
                'up_app_status' => '2',
                'status_final' => '1',
                'tenant_id' => Auth::user()->tenant_id,
                'up_user_id' => Auth::user()->id,
                'availability' => $dataavailability

            ];

            MyLeaveModel::create($input);

            $settingEmail = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
                ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                ->where('myleave.tenant_id', Auth::user()->tenant_id)
                ->orderBy('myleave.created_at', 'DESC')
                ->first();

            if ($settingEmail) {

                $ms = new MailService;
                $ms->emailToApproveLeaveNoCommender($settingEmail);
            }



            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave Application is Applied';

            return $data;
        } else {

            $input = [
                'applied_date' => $data1,
                'lt_type_id' => $data2,
                'day_applied' => $data3,
                'total_day_applied' => $data4,
                'leave_date' => $data5,
                'start_date' => $data6,
                'end_date' => $data7,
                'file_document' => $data8,
                'reason' => $data9,
                'leave_session' => $data10,
                'up_recommendedby_id' => $getdata->eleaverecommender,
                'up_approvedby_id' => $getdata->eleaveapprover,
                'status_user' => '2',
                'up_rec_status' => '2',
                'up_app_status' => '2',
                'status_final' => '1',
                'tenant_id' => Auth::user()->tenant_id,
                'up_user_id' => Auth::user()->id,
                'availability' => $dataavailability
            ];

            MyLeaveModel::create($input);

            $settingEmail = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
                ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                ->where('myleave.tenant_id', Auth::user()->tenant_id)
                ->orderBy('myleave.created_at', 'DESC')
                ->first();

            if ($settingEmail) {

                $ms = new MailService;
                $ms->emailToRecommenderLeave($settingEmail);
            }


            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave Application is Applied';



            return $data;
        }
    }


    public function getcreatemyleave($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userProfile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userProfile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->select('myleave.*', 'au.fullName as username1', 'mu.fullName as username2')
            ->get();

        return $data;
    }

    public function deletemyleave($id)
    {
        $logs = MyLeaveModel::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'your leave not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave Application Is Cancelled';
        }

        return $data;
    }

    public function checkLeaveEntitlement()
    {
         $currentDateEntitlement = Carbon::now();

        $leave_entitlement = leaveEntitlementModel::select('*')
        ->where('id_employment', '=', Auth::user()->id)
        ->where('le_year', '=', $currentDateEntitlement->year)
        ->first();

        if (empty($leave_entitlement)) {
            $data = [
                'msg' => 'You are not entitled to apply the leave or kindly set up the leave entitlement.',
                'status' => config('app.response.error.status'),
                'type' => config('app.response.error.type'),
                'title' => config('app.response.error.title')
            ];
            return $data;
        }
    }


    //sepervisor

    public function leaveRecommenderActive()
    {

        $data =
            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userProfile', 'myleave.up_user_id', '=', 'userProfile.user_id')
            ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
            ->where(function ($query) {
                $query->where('myleave.up_rec_status', '=', '1')
                    ->orWhere('myleave.up_rec_status', '=', '2');
            })
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc')
            ->get();

        return $data;
    }

    public function leaveRecommenderHistory()
    {

        $data =
            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userProfile', 'myleave.up_user_id', '=', 'userProfile.user_id')
            ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
            ->where(function ($query) {
                $query->where('myleave.up_rec_status', '=', '3')
                    ->orWhere('myleave.up_rec_status', '=', '4');
            })
            ->groupBy('userProfile.user_id')
            ->get();

        return $data;
    }
    public function idemployerhod()
    {
        $data =
            MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userProfile', 'myleave.up_user_id', '=', 'userProfile.user_id')
            ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
            ->where('myleave.up_rec_status', '=', 4)
            ->select('userProfile.user_id', 'userProfile.fullName')
            ->groupBy('userProfile.user_id')
            ->get();

        return $data;
    }

    public function searchleaveRecommenderActive($r)
    {

        $input = $r->input();

        $query =

            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.tenant_id', '=', Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('myleave.up_rec_status', '=', '1')
                    ->orWhere('myleave.up_rec_status', '=', '2');
            })
            ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc');

        if ($input['applydate']) {
            $applydate = $input['applydate'];
            $query->where('myleave.applied_date', '=', $applydate);
        }

        if ($input['idemployer']) {
            $idemployer = $input['idemployer'];
            $query->where('myleave.up_user_id', '=', $idemployer);
        }

        if ($input['type']) {
            $type = $input['type'];
            $query->where('myleave.lt_type_id', '=', $type);
        }

        $data = $query->get();
        return $data;
    }

    public function activeleaveRecomenderHistory($r)
    {

        $input = $r->input();

        $query =

            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.tenant_id', '=', Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('myleave.up_rec_status', '=', '3')
                    ->orWhere('myleave.up_rec_status', '=', '4');
            })
            ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc');

        if ($input['applydateH']) {
            $applydate = $input['applydateH'];
            $query->where('myleave.applied_date', '=', $applydate);
        }

        if ($input['idemployerH']) {
            $idemployer = $input['idemployerH'];
            $query->where('myleave.up_user_id', '=', $idemployer);
        }

        if ($input['typeH']) {
            $type = $input['typeH'];
            $query->where('myleave.lt_type_id', '=', $type);
        }

        $data = $query->get();
        return $data;
    }

    public function updateRecommender($r, $id)
    {

        $input = $r->input();
        $input = [
            'up_rec_status' => 4,
            'up_rec_reason' => '',
            'status_final' => 2,
        ];

        MyLeaveModel::where('id', $id)->update($input);
        $settingEmail = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
            ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', $id)
            ->where('myleave.up_rec_status', '4')
            ->orderBy('myleave.created_at', 'DESC')
            ->first();
        if ($settingEmail) {
            $ms = new MailService;
            $ms->emailToApproverLeave($settingEmail);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Approved';

        return $data;
    }

    public function updateRecommenderReject($r, $id)
    {

        $input = $r->input();
        $data1 = $input['reasonreject'];
        $input = [
            'up_rec_status' => 3,
            'up_rec_reason' => $data1,
            'status_final' => 3,
        ];

        MyLeaveModel::where('id', $id)->update($input);

        $settingEmail = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
            ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', $id)
            ->where('myleave.up_rec_status', '3')
            ->orderBy('myleave.created_at', 'DESC')
            ->first();

        if ($settingEmail) {

            $ms = new MailService;
            $ms->emailToRejectedLeave($settingEmail);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Rejected';

        return $data;
    }

    public function getuserRecommender($id)
    {

        $data =
            MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*', 'ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }

    public function getuserRecommenderView($id)
    {

        $data =
            MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*', 'ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }

    public function idemployer()
    {

        $data =
            MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
            ->select('userprofile.user_id', 'userprofile.fullName')
            ->groupBy('userprofile.user_id')
            ->get();

        return $data;
    }

    public function idemployerhods()
    {

        $data =
            MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
            ->where('myleave.up_rec_status', '=', 4)
            ->select('userprofile.user_id', 'userprofile.fullName')
            ->groupBy('userprofile.user_id')
            ->get();

        return $data;
    }









    //hod

    public function leaveApproverActive()
    {

        $data =
            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
            ->where('myleave.up_rec_status', '=', 4)
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('myleave.up_app_status', '=', '1')
                    ->orWhere('myleave.up_app_status', '=', '2');
            })
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc')
            ->get();

        return $data;
    }

    public function leaveApproverHistory()
    {

        $data =
            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
            ->where('myleave.up_rec_status', '=', 4)
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('myleave.up_app_status', '=', '3')
                    ->orWhere('myleave.up_app_status', '=', '4');
            })
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc')
            ->get();

        return $data;
    }

    public function searchleaveApproverActive($r)
    {

        $input = $r->input();

        $query =

            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->Join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->Join('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
            ->where('myleave.up_rec_status', '=', 4)
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('myleave.up_app_status', '=', '1')
                    ->orWhere('myleave.up_app_status', '=', '2');
            })
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc');

        if ($input['applydate']) {
            $applydate = $input['applydate'];
            $query->where('myleave.applied_date', '=', $applydate);
        }

        if ($input['idemployer']) {
            $idemployer = $input['idemployer'];
            $query->where('myleave.up_user_id', '=', $idemployer);
        }

        if ($input['type']) {
            $type = $input['type'];
            $query->where('myleave.lt_type_id', '=', $type);
        }

        $data = $query->get();
        return $data;
    }

    public function activeleaveApproverHistory($r)
    {

        $input = $r->input();

        $query =

            MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type', 'userprofile.fullName')
            ->Join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->Join('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
            ->where('myleave.up_rec_status', '=', 4)
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('myleave.up_app_status', '=', '3')
                    ->orWhere('myleave.up_app_status', '=', '4');
            })
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc');

        if ($input['applydateH']) {
            $applydate = $input['applydateH'];
            $query->where('myleave.applied_date', '=', $applydate);
        }

        if ($input['idemployerH']) {
            $idemployer = $input['idemployerH'];
            $query->where('myleave.up_user_id', '=', $idemployer);
        }

        if ($input['typeH']) {
            $type = $input['typeH'];
            $query->where('myleave.lt_type_id', '=', $type);
        }

        $data = $query->get();
        return $data;
    }



    public function updatehod($r, $id)
    {

        $input = $r->input();

        $input = [
            'up_app_status' => 4,
            'up_app_reason' => '',
            'status_final' => 4,
        ];

        MyLeaveModel::where('id', $id)->update($input);

        $settingEmail = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
            ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', $id)
            ->where('myleave.up_app_status', '4')
            ->orderBy('myleave.created_at', 'DESC')
            ->first();

        $checkAL = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_types.id', '=', $settingEmail->lt_type_id)
            ->where(function ($query) {
                $query->where('leave_types.leave_types_code', '=', 'AL')
                    ->orWhere('leave_types.leave_types_code', '=', 'EL');
            })
            ->first();

        $checkSL = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_types.id', '=', $settingEmail->lt_type_id)
            ->where('leave_types.leave_types_code', '=', 'SL')
            ->first();

        $checkHL = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_types.id', '=', $settingEmail->lt_type_id)
            ->where('leave_types.leave_types_code', '=', 'HL')
            ->first();

        if ($settingEmail) {

            $ms = new MailService;
            $ms->emailToApprovedLeave($settingEmail);
        }

        if ($settingEmail->up_app_status == '4' && (($checkAL && $checkAL->leave_types_code == 'AL') || ($checkAL && $checkAL->leave_types_code == 'EL'))) {

            $today = Carbon::now();

            $check = leaveEntitlementModel::select('leave_entitlement.*')
                ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
                ->where('leave_entitlement.id_employment', '=', $settingEmail->up_user_id)
                ->first();

            if ($today <= $check->lapsed_date) {

                if ($check->carry_forward_balance >= $settingEmail->total_day_applied) {

                    $balance1 = $check->carry_forward_balance - $settingEmail->total_day_applied;

                } else {

                    $balance1 = 0;
                    $remainingFromEntitlement = $settingEmail->total_day_applied - $check->carry_forward_balance;

                }

                if (isset($remainingFromEntitlement)) {
                    if ($check->current_entitlement_balance >= $remainingFromEntitlement) {
                        $leave = $check->current_entitlement_balance - $remainingFromEntitlement;
                    } else {
                        $leave = 0;
                    }
                } else {
                    $leave = $check->current_entitlement_balance;
                }

                $input = [
                    'carry_forward_balance' => $balance1,
                    'current_entitlement_balance' => $leave,
                ];

                $inputCalculate = [
                    'calculate' => 1,
                ];

                leaveEntitlementModel::where('id', $check->id)->update($input);

                MyLeaveModel::where('id', $id)->update($inputCalculate);

            } else {

                $leave = $check->current_entitlement_balance - $settingEmail->total_day_applied;

                $input = [
                    'current_entitlement_balance' => $leave,
                ];

                $inputCalculate = [
                    'calculate' => 1,
                ];

                leaveEntitlementModel::where('id', $check->id)->update($input);

                MyLeaveModel::where('id', $id)->update($inputCalculate);
            }
        }


        if ($settingEmail->up_app_status == '4' && $checkSL &&  $checkSL->leave_types_code == 'SL') {

            $check = leaveEntitlementModel::select('leave_entitlement.*')
                ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
                ->where('leave_entitlement.id_employment', '=', $settingEmail->up_user_id)
                ->first();

            $leave = $check->sick_leave_entitlement_balance - $settingEmail->total_day_applied;

            $input = [
                'sick_leave_entitlement_balance' => $leave,
            ];

            $inputCalculate = [
                'calculate' => 1,
            ];

            if ($settingEmail->availability == 2) {

                $today = Carbon::now();

                if ($today <= $check->lapsed_date) {

                    $total = $check->current_entitlement_balance + $settingEmail->total_day_applied;

                    if ($total <= $check->current_entitlement) {
                        $balance1 = 0;
                        $current_entitlement_balance = $total;
                    } else {
                        $balance1 = $total - $check->current_entitlement + $check->carry_forward_balance;
                        $current_entitlement_balance = $check->current_entitlement;
                    }

                    $input = [
                        'carry_forward_balance' => $balance1,
                        'current_entitlement_balance' => $current_entitlement_balance,
                    ];

                    leaveEntitlementModel::where('id', $check->id)->update($input);

                } else {

                    $leave1 = $check->current_entitlement_balance + $settingEmail->total_day_applied;
                    $input1 = [
                        'current_entitlement_balance' => $leave1,
                    ];
                    leaveEntitlementModel::where('id', $check->id)->update($input1);

                }

            }

            leaveEntitlementModel::where('id', $check->id)->update($input);
            MyLeaveModel::where('id', $id)->update($inputCalculate);
        }

        if ($settingEmail->up_app_status == '4' && $checkHL &&  $checkHL->leave_types_code == 'HL') {

            $check = leaveEntitlementModel::select('leave_entitlement.*')
                ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
                ->where('leave_entitlement.id_employment', '=', $settingEmail->up_user_id)
                ->first();

            $leave = $check->hospitalization_entitlement_balance - $settingEmail->total_day_applied;

            $input = [
                'hospitalization_entitlement_balance' => $leave,
            ];

            $inputCalculate = [
                'calculate' => 1,
            ];

            leaveEntitlementModel::where('id', $check->id)->update($input);
            MyLeaveModel::where('id', $id)->update($inputCalculate);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Approved';

        return $data;
    }

    public function updatehodreject($r, $id)
    {

        $input = $r->input();
        $data1 = $input['reasonreject'];

        $input = [

            'up_app_status' => 3,
            'up_app_reason' => $data1,
            'status_final' => 3,
        ];

        MyLeaveModel::where('id', $id)->update($input);

        $settingEmail = MyLeaveModel::select('myleave.*', 'leave_types.leave_types as type')
            ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', $id)
            ->where('myleave.up_app_status', '3')
            ->orderBy('myleave.created_at', 'DESC')
            ->first();

        $checkAL = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_types.id', '=', $settingEmail->lt_type_id)
            ->where(function ($query) {
                $query->where('leave_types.leave_types_code', '=', 'AL')
                    ->orWhere('leave_types.leave_types_code', '=', 'EL');
            })
            ->first();

        $checkSL = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_types.id', '=', $settingEmail->lt_type_id)
            ->where('leave_types.leave_types_code', '=', 'SL')
            ->first();

        $checkHL = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_types.id', '=', $settingEmail->lt_type_id)
            ->where('leave_types.leave_types_code', '=', 'HL')
            ->first();

        if ($settingEmail) {

            $ms = new MailService;
            $ms->emailToApprovedLeave($settingEmail);
        }

        if ($settingEmail->up_app_status == '3' && $settingEmail->calculate == '1' && (($checkAL && $checkAL->leave_types_code == 'AL') || ($checkAL && $checkAL->leave_types_code == 'EL'))) {

            $today = Carbon::now();

            $check = leaveEntitlementModel::select('leave_entitlement.*')
                ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
                ->where('leave_entitlement.id_employment', '=', $settingEmail->up_user_id)
                ->first();

            if ($today <= $check->lapsed_date) {

                $total = $check->current_entitlement_balance + $settingEmail->total_day_applied;

                if ($total <= $check->current_entitlement) {
                    $balance1 = 0;
                    $current_entitlement_balance = $total;
                } else {
                    $balance1 = $total - $check->current_entitlement + $check->carry_forward_balance;
                    $current_entitlement_balance = $check->current_entitlement;
                }

                $input = [
                    'carry_forward_balance' => $balance1,
                    'current_entitlement_balance' => $current_entitlement_balance,
                ];

                leaveEntitlementModel::where('id', $check->id)->update($input);
            } else {

                $leave = $check->current_entitlement_balance + $settingEmail->total_day_applied;

                $input = [
                    'current_entitlement_balance' => $leave,
                ];

                leaveEntitlementModel::where('id', $check->id)->update($input);
            }
        }

        if ($settingEmail->up_app_status == '3' && $checkSL &&  $checkSL->leave_types_code == 'SL' && $settingEmail->calculate == '1') {

            $check = leaveEntitlementModel::select('leave_entitlement.*')
                ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
                ->where('leave_entitlement.id_employment', '=', $settingEmail->up_user_id)
                ->first();

            $leave = $check->sick_leave_entitlement_balance + $settingEmail->total_day_applied;

            $input = [
                'sick_leave_entitlement_balance' => $leave,
            ];

            if ($settingEmail->availability == 2) {

                $today = Carbon::now();

                if ($today <= $check->lapsed_date) {

                    if ($check->carry_forward_balance >= $settingEmail->total_day_applied) {

                        $balance1 = $check->carry_forward_balance - $settingEmail->total_day_applied;

                    } else {

                        $balance1 = 0;
                        $remainingFromEntitlement = $settingEmail->total_day_applied - $check->carry_forward_balance;

                    }

                    if (isset($remainingFromEntitlement)) {
                        if ($check->current_entitlement_balance >= $remainingFromEntitlement) {
                            $leave = $check->current_entitlement_balance - $remainingFromEntitlement;
                        } else {
                            $leave = 0;
                        }
                    } else {
                        $leave = $check->current_entitlement_balance;
                    }

                    $input = [
                        'carry_forward_balance' => $balance1,
                        'current_entitlement_balance' => $leave,
                    ];

                    $inputCalculate = [
                        'calculate' => 1,
                    ];

                    leaveEntitlementModel::where('id', $check->id)->update($input);

                    MyLeaveModel::where('id', $id)->update($inputCalculate);

                } else {

                    $leave1 = $check->current_entitlement_balance - $settingEmail->total_day_applied;
                    $input1 = [
                        'current_entitlement_balance' => $leave1,
                    ];
                    leaveEntitlementModel::where('id', $check->id)->update($input1);
                }


            }

            leaveEntitlementModel::where('id', $check->id)->update($input);
        }

        if ($settingEmail->up_app_status == '3' &&  $checkHL && $checkHL->leave_types_code == 'HL' && $settingEmail->calculate == '1') {

            $check = leaveEntitlementModel::select('leave_entitlement.*')
                ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
                ->where('leave_entitlement.id_employment', '=', $settingEmail->up_user_id)
                ->first();

            $leave = $check->hospitalization_entitlement_balance + $settingEmail->total_day_applied;

            $input = [
                'hospitalization_entitlement_balance' => $leave,
            ];

            leaveEntitlementModel::where('id', $check->id)->update($input);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Rejected';

        return $data;
    }

    public function getusermyleave($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userProfile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userProfile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userProfile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->select('myleave.*', 'ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2')
            ->get();

        return $data;
    }

    public function getpieleave()
    {
        $currentYear = Carbon::now()->format('Y');
        $checktoday = Carbon::now();

        $data = leaveEntitlementModel::select('leave_entitlement.current_entitlement', 'leave_entitlement.current_entitlement_balance', 'leave_entitlement.lapsed_date', 'leave_entitlement.carry_forward', 'leave_entitlement.carry_forward_balance', 'leave_entitlement.lapsed_date')
            ->where('leave_entitlement.tenant_id', Auth::user()->tenant_id)
            ->where('leave_entitlement.id_employment', Auth::user()->id)
            ->whereYear('leave_entitlement.le_year', '=', $currentYear)
            ->first();

        $checkType = leavetypesModel::select('leave_types.id')
            ->where('leave_types.tenant_id', Auth::user()->tenant_id)
            ->whereIn('leave_types.leave_types_code', ['AL', 'EL'])
            ->get();

        $checkTypeIds = $checkType->pluck('id')->toArray();

        $datapiePending1 = MyLeaveModel::select(DB::raw('SUM(myleave.total_day_applied) as total_pending'))
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.status_final', '!=', 3)
            ->where(function ($query) {
                $query->where('myleave.status_final', '=', 1)
                    ->orWhere('myleave.status_final', '=', 2);
            })
            ->where(function ($query) {
                $query->where('myleave.calculate', '=', null)
                    ->orWhere('myleave.calculate', '=', '');
            })
            ->whereIn('myleave.lt_type_id', $checkTypeIds)
            ->where('myleave.up_user_id', Auth::user()->id)
            ->whereYear('myleave.applied_date', '=', $currentYear)
            ->first();


        if ($checktoday <= $data->lapsed_date) {

            if (0 <= $data->carry_forward_balance) {


                $datapiePendingx =  $data->carry_forward_balance - $datapiePending1->total_pending;

                if ($datapiePendingx < 0) {

                    $datatolak = -$datapiePendingx;

                    // dd($data);
                    // die;

                    $datapiePending = (object) ['total_pending' => $datatolak];
                } else {

                    $datapiePending = (object) ['total_pending' => 0];
                }
            } else {

                $datapiePending = (object) ['total_pending' => 0];
            }
        } else {

            // dd($datapiePending1);
            // die;

            // $datapiePending = (object) ['total_pending' => $datapiePending1 ];
            $datapiePending = $datapiePending1;
        }


        $datapie = [$data, $datapiePending];

        // dd($datapie);
        // die;

        return $datapie;
    }

    public function getpieleave2()
    {
        $currentYear = Carbon::now()->format('Y');
        $checktoday = Carbon::now();

        $data = leaveEntitlementModel::select('leave_entitlement.carry_forward', 'leave_entitlement.carry_forward_balance', 'leave_entitlement.lapsed_date')
            ->where('leave_entitlement.tenant_id', Auth::user()->tenant_id)
            ->where('leave_entitlement.id_employment', Auth::user()->id)
            ->whereYear('leave_entitlement.le_year', '=', $currentYear)
            ->first();

        $checkType = leavetypesModel::select('leave_types.id')
            ->where('leave_types.tenant_id', Auth::user()->tenant_id)
            ->whereIn('leave_types.leave_types_code', ['AL', 'EL'])
            ->get();

        $checkTypeIds = $checkType->pluck('id')->toArray();

        $datapiePending1 = MyLeaveModel::select(DB::raw('SUM(myleave.total_day_applied) as total_pending'))
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.status_final', '!=', 3)
            ->where(function ($query) {
                $query->where('myleave.status_final', '=', 1)
                    ->orWhere('myleave.status_final', '=', 2);
            })
            ->where(function ($query) {
                $query->where('myleave.calculate', '=', null)
                    ->orWhere('myleave.calculate', '=', '');
            })
            ->whereIn('myleave.lt_type_id', $checkTypeIds)
            ->where('myleave.up_user_id', Auth::user()->id)
            ->whereYear('myleave.applied_date', '=', $currentYear)
            ->first();



        if ($checktoday <= $data->lapsed_date) {

            if (0 <= $data->carry_forward_balance) {


                $datapiePendingx =  $data->carry_forward_balance - $datapiePending1->total_pending;

                if ($datapiePendingx < 0) {

                    $datapiePending = (object) ['total_pending' => $data->carry_forward_balance];
                } else {

                    $datapiePending = (object) ['total_pending' => $datapiePending1->total_pending];
                }
            } else {

                $datapiePending = (object) ['total_pending' => 0];
            }
        } else {

            $datapiePending = (object) ['total_pending' => 0];
        }

        $datapie2 = [$data, $datapiePending];

        // dd($datapie2);
        // die;

        return $datapie2;
    }

    public function getEarnedLeave()
    {
        $today = Carbon::now();
        $year = $today->format('Y');
        $month = $today->format('m');

        $LeaveEntitlement = leaveEntitlementModel::select('current_entitlement')
            ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_entitlement.id_userProfile', '=', Auth::user()->id)
            ->whereYear('leave_entitlement.le_year', '=', $year)
            ->first();

        $data = round(($month / 12) * $LeaveEntitlement->current_entitlement, 0);

        return $data;
    }

    public function getLapseLeave()
    {
        $today = Carbon::now();
        $checktoday = Carbon::now();
        $year = $today->format('Y');

        $previousYear = $today->subYear()->format('Y');

        $LeaveEntitlement = leaveEntitlementModel::select('leave_entitlement.*')
            ->where('leave_entitlement.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_entitlement.id_userProfile', '=', Auth::user()->id)
            ->whereYear('leave_entitlement.le_year', '=', $year)
            ->first();

        if ($checktoday <= $LeaveEntitlement->lapsed_date) {

            $lapse = $LeaveEntitlement->lapse;
        } else {

            $lapse = $LeaveEntitlement->lapse + $LeaveEntitlement->carry_forward_balance;
        }

        $data = [$lapse, $previousYear];

        return $data;
    }

    public function totalNoPaidLeave()
    {
        $today = Carbon::now();
        $checktoday = Carbon::now();
        $year = $today->format('Y');


        $getIdType = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=', Auth::user()->tenant_id)
            ->where('leave_types.leave_types_code', '=', 'NP')
            ->first();


        $data = MyLeaveModel::select(DB::raw('SUM(myleave.total_day_applied) as totalNoPay'))
            ->where('myleave.tenant_id', '=', Auth::user()->tenant_id)
            ->where('myleave.up_user_id', '=', Auth::user()->id)
            ->where('myleave.lt_type_id', '=', $getIdType->id)
            ->where('myleave.status_final', '=', '4')
            ->whereYear('myleave.applied_date', '=', $year)
            ->first();


        // dd($data);
        // die;


        return $data;
    }

    public function getuserleaveApprhod($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userProfile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userProfile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userProfile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*', 'ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }
    public function getuserleaveApprhodview($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userProfile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userProfile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userProfile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*', 'ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }


    public function approvemyleave($id)
    {
        $data1 = "";

        $input = [
            'up_recommendedby_id' => $data1,
        ];


        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
    }

    public function approvemyleaveby($id)
    {
        $data1 = 4;

        $input = [
            'up_recommendedby_id' => Auth::user()->id,
            'status' => $data1,
        ];


        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
    }


    // checking holiday

    public function myholiday($date)
    {
        $explode = explode(',', $date);
        $startDate = $explode[0];
        $endDate = $explode[1];

        $data = holidayModel::select('*')
            ->where('leave_holiday.tenant_id', Auth::user()->tenant_id)
            ->whereBetween('leave_holiday.start_date', [$startDate, $endDate])
            ->orWhereBetween('leave_holiday.end_date', [$startDate, $endDate])
            ->orderBy('leave_holiday.start_date', 'asc')

            ->get();


        $totalDaysx = 0;

        foreach ($data as $row) {

            $holidayStartDate = Carbon::createFromFormat('Y-m-d', $row->start_date);

            $holidayEndDate = Carbon::createFromFormat('Y-m-d', $row->end_date);



            $daysDiff = $holidayEndDate->diffInDays($holidayStartDate) + 1;



            for ($i = 0; $i <= $daysDiff; $i++) {
                $currentDate = $holidayStartDate->copy()->addDays($i);
                $dayOfWeek = $currentDate->dayOfWeek;


                // Jika hari adalah Sabtu atau Minggu, lewati iterasi
                if ($dayOfWeek === Carbon::SATURDAY || $dayOfWeek === Carbon::SUNDAY) {
                    continue;
                }

                if ($currentDate >= $holidayStartDate && $currentDate <= $holidayEndDate) {
                    $totalDaysx++;
                }
            }
        }


        return $totalDaysx;
    }
}
