<?php

namespace App\Service;

use App\Mail\Mail as MailMail;
use App\Models\DomainList;
use Illuminate\Support\Facades\Mail;
use App\Models\Employee;
use App\Models\leavetypesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Log;
use DateTime;

class MailService
{
    public function emailToSupervisorClaimGNC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', Auth::user()->id)->first()->toArray();
        $supervisor = Employee::where('user_id', $user['eclaimapprover'])->first()->toArray();

        $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        foreach ($receivers['workingEmail'] as $email) {
            $receiver = $email;
            $response['typeEmail'] = 'GNCSubmit';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = Auth::user()->username;
            $response['subject'] = 'General Claim | Month';
            $response['title'] = 'General Claim | Month';
            $response['supervisor'] = $supervisor['employeeName'];
            $response['employeeName'] = $user['employeeName'];
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }


    public function emailToSupervisorClaimMTC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', Auth::user()->id)->first()->toArray();
        $supervisor = Employee::where('user_id', $user['eclaimrecommender'])->first()->toArray();

        $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        foreach ($receivers['workingEmail'] as $email) {
            $receiver = $email;
            $response['typeEmail'] = 'MTCSubmit';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = Auth::user()->username;
            $response['subject'] = 'Monthly Claim | ' . $data->month;
            $response['title'] = 'Monthly Claim | ' . $data->month;
            $response['supervisor'] = $supervisor['employeeName'];
            $response['employeeName'] = $user['employeeName'];
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }
    public function emailToHodClaimMTC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', Auth::user()->id)->first()->toArray();

        $supervisor = Employee::where('user_id', $user['eclaimapprover'])->first()->toArray();
        // $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        // foreach ($user as $email) {
        // $receiver = $supervisor->workingEmail;
        // $response['typeEmail'] = 'hodApproval';
            
        // $response['from'] = env('MAIL_FROM_ADDRESS');
        // $response['nameFrom'] = Auth::user()->username;
        // $response['subject'] = 'Monthly Claim | ' . $data->month;
        // $response['title'] = 'Monthly Claim | ' . $data->month;
        // $response['supervisor'] = $supervisor->employeeName;
        // $response['employeeName'] = $user->employeeName;
        // $response['data'] = $data;

        // Mail::to($receiver)->send(new MailMail($response));
        // }
        $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        foreach ($receivers['workingEmail'] as $email) {
            $receiver = $email;
            $response['typeEmail'] = 'hodApproval';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = Auth::user()->username;
            $response['subject'] = 'Monthly Claim | ' . $data->month;
            $response['title'] = 'Monthly Claim | ' . $data->month;
            $response['supervisor'] = $supervisor['employeeName'];
            $response['employeeName'] = $user['employeeName'];
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }

    public function approvalEmailMTC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', $data->user_id)->first();
        $supervisor = Employee::where('user_id', $user->eclaimapprover)->first();

        // $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        // foreach ($user as $email) {
        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'MTCApproval';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'Monthly Claim | ' . $data->month;
        $response['title'] = 'Monthly Claim | ' . $data->month;
        $response['supervisor'] = $supervisor->employeeName;
        $response['employeeName'] = $user->employeeName;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
        // }
    }

    public function approvalEmailMTCForAdmin($data)
    {
        // get supervisor detail
        // $user = Employee::where('user_id', $data->user_id)->first();
        $admin = DomainList::where([['type', 'monthlyClaim'], ['category_role', 'admin']])->orderBy('id', 'DESC')->first();
        $user = Employee::where('user_id', $admin->approver)->first();

        // $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        // foreach ($user as $email) {
        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'AdminMonthlyClaim';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'Monthly Claim | ' . $data->month;
        $response['title'] = 'Monthly Claim | ' . $data->month;
        // $response['supervisor'] = $supervisor->employeeName;
        $response['employeeName'] = $user->employeeName;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
        // }
    }

    public function rejectEmailMTC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', $data->user_id)->first();

        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'rejectMtcEmail';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'Monthly Claim | ' . $data->month;
        $response['title'] = 'Monthly Claim | ' . $data->month;
        $response['employeeName'] = $user->employeeName;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
    }

    public function amendEmailMTC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', $data->user_id)->first();

        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'amendMtcEmail';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'Monthly Claim | ' . $data->month;
        $response['title'] = 'Monthly Claim | ' . $data->month;
        $response['employeeName'] = $user->employeeName;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
    }

    public function paidEmailMTC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', $data->user_id)->first();

        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'paidEmailMTC';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'Monthly Claim | ' . $data->month;
        $response['title'] = 'Monthly Claim | ' . $data->month;
        $response['employeeName'] = $user->employeeName;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
    }

    public function submitCAEmail($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', $data->user_id)->first();
        $domain = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'cash_advance']])->orderBy('id', 'DESC')->first();
        $HOD = Employee::where('user_id', $domain->approver)->first();

        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'submitEmailCA';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'Cash Advance';
        $response['title'] = 'Cash Advance';
        $response['HOD'] = $HOD;
        $response['employee'] = $user;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
    }

    public function approvalEmailCA($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', $data->user_id)->first();
        $supervisor = Employee::where('user_id', $user->eclaimapprover)->first();

        // $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        // foreach ($user as $email) {
        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'CAApproval';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'General Claim | Month';
        $response['title'] = 'General Claim | Month';
        $response['supervisor'] = $supervisor;
        $response['employee'] = $user;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
        // }
    }

    public function approvalEmailCAFinanceApprover($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', $data->user_id)->first();
        $approver = Employee::where('user_id', Auth::user()->id)->first();
        $admin = DomainList::where([['type', 'monthlyClaim'], ['category_role', 'admin']])->orderBy('id', 'DESC')->first();
        $finance = Employee::where('user_id', $admin->approver)->first();

        // $receivers = array_merge_recursive($user, $supervisor);
        //  $user->merge($supervisor);

        // foreach ($user as $email) {
        $receiver = $user->workingEmail;
        $response['typeEmail'] = 'approvalCAFinanceApproval';

        $response['from'] = env('MAIL_FROM_ADDRESS');
        $response['nameFrom'] = Auth::user()->username;
        $response['subject'] = 'General Claim | Month';
        $response['title'] = 'General Claim | Month';
        $response['finance'] = $finance;
        $response['approver'] = $approver;
        $response['employee'] = $user;
        $response['data'] = $data;

        Mail::to($receiver)->send(new MailMail($response));
        // }
    }


    //email leave RecommenderLeave

    public function emailToRecommenderLeave($data)
    {
        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $recommenderLeave =
        Employee::where([
            ['user_id', '=', $data->up_recommendedby_id],
            ['tenant_id', '=', Auth::user()->tenant_id],

        ])->first();

        if($user && $recommenderLeave){

            $receiver = $recommenderLeave->workingEmail;
            $response['cc'] = $user->workingEmail;
            $response['typeEmail'] = 'emailToRecommenderLeave';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $user->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['recommender'] = $recommenderLeave->employeeName;
            $response['employeeName'] = $user->employeeName;
            $response['departmentName'] = $user->departmentName;
            $response['designationName'] = $user->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }

    }

    public function emailToApproveLeaveNoCommender($data)
    {
        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $approvedbyLeave =
        Employee::where([
            ['user_id', '=', $data->up_approvedby_id],
            ['tenant_id', '=', Auth::user()->tenant_id],

        ])->first();

        if($user && $approvedbyLeave){

            $receiver = $approvedbyLeave->workingEmail;
            $response['typeEmail'] = 'emailToApproveLeaveNoCommender';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $user->employeeName;
            $response['subject'] = 'Leave Application';
            $response['cc'] = $user->workingEmail;
            $response['title'] = 'Leave Application';
            $response['approvedby'] = $approvedbyLeave->employeeName;
            $response['employeeName'] = $user->employeeName;
            $response['departmentName'] = $user->departmentName;
            $response['designationName'] = $user->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }

    }

    public function emailToApproverLeave($data)
    {
        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $recommendedby = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_recommendedby_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $approvedbyLeave =
        Employee::where([
            ['user_id', '=', $data->up_approvedby_id],
            ['tenant_id', '=', Auth::user()->tenant_id],

        ])->first();

        if($user && $approvedbyLeave){

            $receiver = $approvedbyLeave->workingEmail;
            $response['cc'] = $recommendedby->workingEmail;
            $response['typeEmail'] = 'emailToApproverLeave';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $recommendedby->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['eleaveapprover'] = $approvedbyLeave->employeeName;
            $response['employeeNamex'] = $user->employeeName;
            $response['employeeName'] = $recommendedby->employeeName;
            $response['departmentName'] = $recommendedby->departmentName;
            $response['designationName'] = $recommendedby->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }

    public function emailToRejectedLeave($data)
    {
        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $userRecommender = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_recommendedby_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        if($user && $userRecommender){

            $receiver = $user->workingEmail;
            $response['cc'] = $userRecommender->workingEmail;
            $response['typeEmail'] = 'emailToRejectedLeave';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $userRecommender->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['employeeNamex'] = $user->employeeName;
            $response['usertoreject'] = $user->employeeName;
            $response['employeeName'] = $userRecommender->employeeName;
            $response['departmentName'] = $userRecommender->departmentName;
            $response['designationName'] = $userRecommender->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }


    }

    public function emailToRejectedLeaveHod($data)
    {
        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $approvedby = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_approvedby_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        if($user && $approvedby){

            $receiver = $user->workingEmail;
            $response['cc'] = $approvedby->workingEmail;

            $response['typeEmail'] = 'emailToRejectedLeaveHod';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $approvedby->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['employeeNamex'] = $user->employeeName;
            $response['employeeName'] = $approvedby->employeeName;
            $response['departmentName'] = $approvedby->departmentName;
            $response['designationName'] = $approvedby->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }


    }

    public function emailToApprovedLeave($data)
    {

        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $approvedby = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_approvedby_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        if($user && $approvedby){

            $receiver = $user->workingEmail;
            $response['cc'] = $approvedby->workingEmail;
            $response['typeEmail'] = 'emailToApprovedLeave';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $approvedby->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['employeeNamex'] = $user->employeeName;
            $response['employeeName'] = $approvedby->employeeName;
            $response['departmentName'] = $approvedby->departmentName;
            $response['designationName'] = $approvedby->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }

    public function emailToApproverAppeal($data)
    {

        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $approvedby = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $user->tsapprover)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        if($user && $approvedby){

            $receiver = $approvedby->workingEmail;
            $response['cc'] = $user->workingEmail;
            $response['typeEmail'] = 'emailToApprovedAppeal';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $user->employeeName;
            $response['subject'] = 'Timesheet Appeal Application';
            $response['title'] = 'Timesheet Appeal Application';
            $response['link'] = env('APP_URL') . '/appealtimesheet';
            $response['employeeNamex'] = $approvedby->employeeName;
            $response['employeeName'] = $user->employeeName;
            $response['departmentName'] = $user->departmentName;
            $response['designationName'] = $user->designationName;
            // $response['randomnumber'] = $data->generaterandom; 
            $response['approveApp'] = env('APP_URL') . "/approveAppealEmail/" . $data->generaterandom;
            $response['rejectApp'] = env('APP_URL') . "/viewRejectAppealEmail/" . $data->generaterandom;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }

    public function emailToEmployeeAppeal($data)
    {

        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $approvedby = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $user->tsapprover)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        if($user && $approvedby){

            $receiver = $user->workingEmail;
            $response['cc'] = $approvedby->workingEmail;
            $response['typeEmail'] = 'emailToEmployeeAppeal';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $approvedby->employeeName;
            $response['subject'] = 'Timesheet Appeal Application Status';
            $response['title'] = 'Timesheet Appeal Application Status';
            $response['employeeNamex'] = $user->employeeName;
            $response['employeeName'] = $approvedby->employeeName;
            $response['departmentName'] = $approvedby->departmentName;
            $response['designationName'] = $approvedby->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }

    public function getEmailData($data)
    {
        {

            $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                    ->join('designation', 'employment.designation', '=', 'designation.id')
                    ->join('department', 'employment.department', '=', 'department.id')
                    ->where('employment.user_id', $data->user_id)
                    ->where('employment.tenant_id', Auth::user()->tenant_id)
                    ->first();

            $approvedby = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                    ->join('designation', 'employment.designation', '=', 'designation.id')
                    ->join('department', 'employment.department', '=', 'department.id')
                    ->where('employment.user_id', $user->tsapprover)
                    ->where('employment.tenant_id', Auth::user()->tenant_id)
                    ->first();

            if($user && $approvedby){

                $receiver = $user->workingEmail;
                $response['typeEmail'] = 'emailToEmployeeAppeal';

                $response['from'] = env('MAIL_FROM_ADDRESS');
                $response['nameFrom'] = $approvedby->employeeName;
                $response['subject'] = 'Timesheet Appeal Application Status';
                $response['title'] = 'Timesheet Appeal Application Status';
                $response['employeeNamex'] = $user->employeeName;
                $response['employeeName'] = $approvedby->employeeName;
                $response['departmentName'] = $approvedby->departmentName;
                $response['designationName'] = $approvedby->designationName;
                $response['data'] = $data;

                Mail::to($receiver)->send(new MailMail($response));
            }
        }
    }

    public function emailLogMissedForToday()
    {
        $now = now();
        $sendtoday = 0;

        $today = $now->subDays($sendtoday)->format('Y-m-d');

                
        $users = Employee::leftJoin('timesheet_event', function ($join) use ($today) {
            $join->on('employment.user_id', '=', 'timesheet_event.user_id')
                ->leftJoin('attendance_event', function ($join) {
                    $join->on('timesheet_event.id', '=', 'attendance_event.event_id')
                        ->where('attendance_event.status', '=', 'attend');
                })
                ->whereDate('timesheet_event.start_date', '=', $today)
                ->groupBy('timesheet_event.user_id');
        })
        ->leftJoin('timesheet_log', function ($join) use ($today) {
            $join->on('employment.user_id', '=', 'timesheet_log.user_id')
                ->whereDate('timesheet_log.date', '=', $today)
                ->groupBy('timesheet_log.user_id');
        })
        ->groupBy('employment.user_id', 'employment.employeeName', 'employment.workingEmail', 'employment.branch')
        ->select(
            'employment.user_id',
            'employment.employeeName',
            'employment.workingEmail',
            'employment.branch',
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(timesheet_event.duration))) AS total_event_hours"),
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(timesheet_log.total_hour))) AS total_log_hours")
        )
        // ->where('employment.user_id', 180)
        ->whereIn('employment.user_id', [180,219,220,324,217])
        // ->whereIn('employment.user_id', [180,219,])
        ->get();

            foreach ($users as $user) {

                $getstate = DB::table('employment as a')
                ->leftJoin('branch as b', 'a.branch', '=', 'b.id')
                ->leftJoin('location_cities as c', 'b.ref_cityid', '=', 'c.id')
                ->where('a.user_id', $user->user_id)
                ->select('c.state_id')
                ->first();
                $stateId = $getstate->state_id;

                $receiver = $user->workingEmail;

                //get when is weekend
                $getweekend = DB::table('leave_weekend as a')
                ->where('a.state_id', $stateId)
                ->whereNull('a.start_time')
                ->pluck('a.day_of_week')
                ->toArray();
                

                $today_day_of_week = date('w', strtotime($today));

                // If today's day of the week is in $getweekend, skip sending the email
                if (in_array($today_day_of_week, $getweekend)) {
                    continue; // Skip to the next iteration of the loop
                }

                //check for public
                $getPublicHolidays = DB::table('leave_holiday as a')
                ->select('start_date as start_dateP', 'end_date as end_dateP', 'state_id')
                // ->find_in_set()
                // ->whereRaw("FIND_IN_SET($participantId, a.participant)")
                ->whereRaw("FIND_IN_SET($stateId, state_id)")
                ->get();

                $allDatesP = [];

                foreach ($getPublicHolidays as $publicHoliday) {
                $start_dateP = new \DateTime($publicHoliday->start_dateP);
                $end_dateP = new \DateTime($publicHoliday->end_dateP);
                $intervalP = new \DateInterval('P1D'); // 1 day interval

                $daterangeP = new \DatePeriod($start_dateP, $intervalP, $end_dateP->modify('+1 day')); // Include the end_date

                foreach ($daterangeP as $dateP) {
                $allDatesP[] = $dateP->format('Y-m-d');
                }
                }

                // Remove duplicate dates if any
                $allDatesP = array_unique($allDatesP);

                //makesre if holiday, not send email
                if (in_array($today, $allDatesP)) {
                    continue; // Skip to the next iteration of the loop
                }

                //check for leave
                $getLeave= DB::table('myleave as a')
                ->select('start_date as start_dateL', 'end_date as end_dateL')
                ->where('status_final',4)
                ->where('up_user_id',180)
                ->where('day_applied', '!=', 0.5)
                ->get();

                // print_r($getLeave);

                $allDatesL = [];

                foreach ($getLeave as $leaveH) {
                $start_dateL = new \DateTime($leaveH->start_dateL);
                $end_dateL = new \DateTime($leaveH->end_dateL);
                $intervalL = new \DateInterval('P1D'); // 1 day interval

                $daterangeL = new \DatePeriod($start_dateL, $intervalL, $end_dateL->modify('+1 day')); // Include the end_date

                foreach ($daterangeL as $dateL) {
                $allDatesL[] = $dateL->format('Y-m-d');
                }
                }

                // Remove duplicate dates if any
                $allDatesL = array_unique($allDatesL);

                // print_r($allDates1);

                //makesre if holiday, not send email
                if (in_array($today, $allDatesL)) {
                    continue; // Skip to the next iteration of the loop
                }



                $eventHours = new DateTime($user->total_event_hours ?? '00:00:00');
                $logHours = new DateTime($user->total_log_hours ?? '00:00:00');
                $combinedHours = $eventHours->diff($logHours)->format('%H:%I:%S');

                $working_hour = '08:00:00';

                $data = [
                    'nameFrom' => $user->employeeName,
                    'user_id' => $user->user_id,
                    'total_event_hours' => $user->total_event_hours,
                    'total_log_hours' => $user->total_log_hours,
                    'test' => $combinedHours,
                    "date" => $today,
                    'mailtime' => $sendtoday,
                ];

                $response = [
                    'subject' => 'Timesheet Appeal Application Status',
                    'typeEmail' => 'emailmissedtimesheet',
                    'from' => env('MAIL_FROM_ADDRESS'),
                    'nameFrom' => $user->employeeName,
                    'test' => $combinedHours,
                    'date' => $today,
                    'user_id' => $user->user_id,
                    'mailtime' => $sendtoday,
                ];


                if ($combinedHours < $working_hour || $combinedHours === '00:00:00') {
                    Mail::to($receiver)->send(new MailMail($response, $data));
                }
            }
    }

    public function emailLogMissedForYesterday()
    {
        $now = now();
        $sendtoday = 1;

        $today = $now->subDays($sendtoday)->format('Y-m-d');

                
        $users = Employee::leftJoin('timesheet_event', function ($join) use ($today) {
            $join->on('employment.user_id', '=', 'timesheet_event.user_id')
                ->leftJoin('attendance_event', function ($join) {
                    $join->on('timesheet_event.id', '=', 'attendance_event.event_id')
                        ->where('attendance_event.status', '=', 'attend');
                })
                ->whereDate('timesheet_event.start_date', '=', $today)
                ->groupBy('timesheet_event.user_id');
        })
        ->leftJoin('timesheet_log', function ($join) use ($today) {
            $join->on('employment.user_id', '=', 'timesheet_log.user_id')
                ->whereDate('timesheet_log.date', '=', $today)
                ->groupBy('timesheet_log.user_id');
        })
        ->groupBy('employment.user_id', 'employment.employeeName', 'employment.workingEmail', 'employment.branch')
        ->select(
            'employment.user_id',
            'employment.employeeName',
            'employment.workingEmail',
            'employment.branch',
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(timesheet_event.duration))) AS total_event_hours"),
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(timesheet_log.total_hour))) AS total_log_hours")
        )
        // ->where('employment.user_id', 180)
        ->whereIn('employment.user_id', [180,219,220,324,217])
        ->get();

            foreach ($users as $user) {

                $getstate = DB::table('employment as a')
                ->leftJoin('branch as b', 'a.branch', '=', 'b.id')
                ->leftJoin('location_cities as c', 'b.ref_cityid', '=', 'c.id')
                ->where('a.user_id', $user->user_id)
                ->select('c.state_id')
                ->first();
                $stateId = $getstate->state_id;

                $receiver = $user->workingEmail;

                //get when is weekend
                $getweekend = DB::table('leave_weekend as a')
                ->where('a.state_id', $stateId)
                ->whereNull('a.start_time')
                ->pluck('a.day_of_week')
                ->toArray();
                

                $today_day_of_week = date('w', strtotime($today));

                // If today's day of the week is in $getweekend, skip sending the email
                if (in_array($today_day_of_week, $getweekend)) {
                    continue; // Skip to the next iteration of the loop
                }

                //check for public
                $getPublicHolidays = DB::table('leave_holiday as a')
                ->select('start_date as start_dateP', 'end_date as end_dateP', 'state_id')
                // ->find_in_set()
                // ->whereRaw("FIND_IN_SET($participantId, a.participant)")
                ->whereRaw("FIND_IN_SET($stateId, state_id)")
                ->get();

                $allDatesP = [];

                foreach ($getPublicHolidays as $publicHoliday) {
                $start_dateP = new \DateTime($publicHoliday->start_dateP);
                $end_dateP = new \DateTime($publicHoliday->end_dateP);
                $intervalP = new \DateInterval('P1D'); // 1 day interval

                $daterangeP = new \DatePeriod($start_dateP, $intervalP, $end_dateP->modify('+1 day')); // Include the end_date

                foreach ($daterangeP as $dateP) {
                $allDatesP[] = $dateP->format('Y-m-d');
                }
                }

                // Remove duplicate dates if any
                $allDatesP = array_unique($allDatesP);

                //makesre if holiday, not send email
                if (in_array($today, $allDatesP)) {
                    continue; // Skip to the next iteration of the loop
                }

                //check for leave
                $getLeave= DB::table('myleave as a')
                ->select('start_date as start_dateL', 'end_date as end_dateL')
                ->where('status_final',4)
                ->where('up_user_id',180)
                ->where('day_applied', '!=', 0.5)
                ->get();

                // print_r($getLeave);

                $allDatesL = [];

                foreach ($getLeave as $leaveH) {
                $start_dateL = new \DateTime($leaveH->start_dateL);
                $end_dateL = new \DateTime($leaveH->end_dateL);
                $intervalL = new \DateInterval('P1D'); // 1 day interval

                $daterangeL = new \DatePeriod($start_dateL, $intervalL, $end_dateL->modify('+1 day')); // Include the end_date

                foreach ($daterangeL as $dateL) {
                $allDatesL[] = $dateL->format('Y-m-d');
                }
                }

                // Remove duplicate dates if any
                $allDatesL = array_unique($allDatesL);

                // print_r($allDates1);

                //makesre if holiday, not send email
                if (in_array($today, $allDatesL)) {
                    continue; // Skip to the next iteration of the loop
                }



                $eventHours = new DateTime($user->total_event_hours ?? '00:00:00');
                $logHours = new DateTime($user->total_log_hours ?? '00:00:00');
                $combinedHours = $eventHours->diff($logHours)->format('%H:%I:%S');

                $working_hour = '08:00:00';

                $data = [
                    'nameFrom' => $user->employeeName,
                    'user_id' => $user->user_id,
                    'total_event_hours' => $user->total_event_hours,
                    'total_log_hours' => $user->total_log_hours,
                    'test' => $combinedHours,
                    "date" => $today,
                    'mailtime' => $sendtoday,
                ];

                $response = [
                    'subject' => 'Timesheet Appeal Application Status',
                    'typeEmail' => 'emailmissedtimesheet',
                    'from' => env('MAIL_FROM_ADDRESS'),
                    'nameFrom' => $user->employeeName,
                    'test' => $combinedHours,
                    'date' => $today,
                    'user_id' => $user->user_id,
                    'mailtime' => $sendtoday,
                ];


                if ($combinedHours < $working_hour || $combinedHours === '00:00:00') {
                    Mail::to($receiver)->send(new MailMail($response, $data));
                }
            }
    }

    public function emailLogMissedFor2daysAgo()
    {
        $now = now();
        $sendtoday = 2;

        $today = $now->subDays($sendtoday)->format('Y-m-d');

                
        $users = Employee::leftJoin('timesheet_event', function ($join) use ($today) {
            $join->on('employment.user_id', '=', 'timesheet_event.user_id')
                ->leftJoin('attendance_event', function ($join) {
                    $join->on('timesheet_event.id', '=', 'attendance_event.event_id')
                        ->where('attendance_event.status', '=', 'attend');
                })
                ->whereDate('timesheet_event.start_date', '=', $today)
                ->groupBy('timesheet_event.user_id');
        })
        ->leftJoin('timesheet_log', function ($join) use ($today) {
            $join->on('employment.user_id', '=', 'timesheet_log.user_id')
                ->whereDate('timesheet_log.date', '=', $today)
                ->groupBy('timesheet_log.user_id');
        })
        ->groupBy('employment.user_id', 'employment.employeeName', 'employment.workingEmail', 'employment.branch')
        ->select(
            'employment.user_id',
            'employment.employeeName',
            'employment.workingEmail',
            'employment.branch',
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(timesheet_event.duration))) AS total_event_hours"),
            DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(timesheet_log.total_hour))) AS total_log_hours")
        )
        // ->where('employment.user_id', 180)
        ->whereIn('employment.user_id', [180,219,220,324,217])
        ->get();

            foreach ($users as $user) {

                $getstate = DB::table('employment as a')
                ->leftJoin('branch as b', 'a.branch', '=', 'b.id')
                ->leftJoin('location_cities as c', 'b.ref_cityid', '=', 'c.id')
                ->where('a.user_id', $user->user_id)
                ->select('c.state_id')
                ->first();
                $stateId = $getstate->state_id;

                $receiver = $user->workingEmail;

                //get when is weekend
                $getweekend = DB::table('leave_weekend as a')
                ->where('a.state_id', $stateId)
                ->whereNull('a.start_time')
                ->pluck('a.day_of_week')
                ->toArray();
                

                $today_day_of_week = date('w', strtotime($today));

                // If today's day of the week is in $getweekend, skip sending the email
                if (in_array($today_day_of_week, $getweekend)) {
                    continue; // Skip to the next iteration of the loop
                }

                //check for public
                $getPublicHolidays = DB::table('leave_holiday as a')
                ->select('start_date as start_dateP', 'end_date as end_dateP', 'state_id')
                // ->find_in_set()
                // ->whereRaw("FIND_IN_SET($participantId, a.participant)")
                ->whereRaw("FIND_IN_SET($stateId, state_id)")
                ->get();

                $allDatesP = [];

                foreach ($getPublicHolidays as $publicHoliday) {
                $start_dateP = new \DateTime($publicHoliday->start_dateP);
                $end_dateP = new \DateTime($publicHoliday->end_dateP);
                $intervalP = new \DateInterval('P1D'); // 1 day interval

                $daterangeP = new \DatePeriod($start_dateP, $intervalP, $end_dateP->modify('+1 day')); // Include the end_date

                foreach ($daterangeP as $dateP) {
                $allDatesP[] = $dateP->format('Y-m-d');
                }
                }

                // Remove duplicate dates if any
                $allDatesP = array_unique($allDatesP);

                //makesre if holiday, not send email
                if (in_array($today, $allDatesP)) {
                    continue; // Skip to the next iteration of the loop
                }

                //check for leave
                $getLeave= DB::table('myleave as a')
                ->select('start_date as start_dateL', 'end_date as end_dateL')
                ->where('status_final',4)
                ->where('up_user_id',180)
                ->where('day_applied', '!=', 0.5)
                ->get();

                // print_r($getLeave);

                $allDatesL = [];

                foreach ($getLeave as $leaveH) {
                $start_dateL = new \DateTime($leaveH->start_dateL);
                $end_dateL = new \DateTime($leaveH->end_dateL);
                $intervalL = new \DateInterval('P1D'); // 1 day interval

                $daterangeL = new \DatePeriod($start_dateL, $intervalL, $end_dateL->modify('+1 day')); // Include the end_date

                foreach ($daterangeL as $dateL) {
                $allDatesL[] = $dateL->format('Y-m-d');
                }
                }

                // Remove duplicate dates if any
                $allDatesL = array_unique($allDatesL);

                // print_r($allDates1);

                //makesre if holiday, not send email
                if (in_array($today, $allDatesL)) {
                    continue; // Skip to the next iteration of the loop
                }



                $eventHours = new DateTime($user->total_event_hours ?? '00:00:00');
                $logHours = new DateTime($user->total_log_hours ?? '00:00:00');
                $combinedHours = $eventHours->diff($logHours)->format('%H:%I:%S');

                $working_hour = '08:00:00';

                $data = [
                    'nameFrom' => $user->employeeName,
                    'user_id' => $user->user_id,
                    'total_event_hours' => $user->total_event_hours,
                    'total_log_hours' => $user->total_log_hours,
                    'test' => $combinedHours,
                    "date" => $today,
                    'mailtime' => $sendtoday,
                ];

                $response = [
                    'subject' => 'Timesheet Appeal Application Status',
                    'typeEmail' => 'emailmissedtimesheet',
                    'from' => env('MAIL_FROM_ADDRESS'),
                    'nameFrom' => $user->employeeName,
                    'test' => $combinedHours,
                    'date' => $today,
                    'user_id' => $user->user_id,
                    'mailtime' => $sendtoday,
                ];


                if ($combinedHours < $working_hour || $combinedHours === '00:00:00') {
                    Mail::to($receiver)->send(new MailMail($response, $data));
                }
            }
    }

    public function emailEventReminder()
    {
        $today = date('Y-m-d');

        $users = Employee::leftJoin('timesheet_event', function($join) {
            $join->whereRaw("FIND_IN_SET(employment.user_id, timesheet_event.participant)");
        })
        ->leftJoin('attendance_event', function($join) {
            $join->on('employment.user_id', '=', 'attendance_event.user_id')
                ->on('timesheet_event.id', '=', 'attendance_event.event_id');
        })
        ->select(
            'employment.user_id',
            'employment.employeeName',
            'employment.workingEmail',
            'employment.branch',
            'timesheet_event.duration',
            'timesheet_event.start_time',
            'timesheet_event.end_time',
            'timesheet_event.reminder',
            'timesheet_event.event_name',
            'timesheet_event.start_date',
            'timesheet_event.venue',

        )
        ->whereNotNull('timesheet_event.reminder')
        ->whereDate('timesheet_event.start_date', '=', $today) // Filtering rows for current date
        ->where('attendance_event.status', '=', 'attend') // Filtering rows for attendees only
        ->get();


        foreach ($users as $user) {
            $startTime = strtotime($user->start_time);
            $currentTime = strtotime(date('H:i'));

            $reminder = $user->reminder;

            if($reminder == 1) {
                $oneHourBefore = strtotime('-5 minutes', $startTime);
            }
            else if($reminder == 2) {
                $oneHourBefore = strtotime('-10 minutes', $startTime);
            }
            else if($reminder == 3) {
                $oneHourBefore = strtotime('-15 minutes', $startTime);
            }
            else if($reminder == 4) {
                $oneHourBefore = strtotime('-20 minutes', $startTime);
            }
            else if($reminder == 5) {
                $oneHourBefore = strtotime('-30 minutes', $startTime);
            }
            else {
                $oneHourBefore = strtotime('-1 hour', $startTime);
            }

            // If current time is exactly 1 hour before the start time, then send the email
            if ($currentTime == $oneHourBefore) {
                $receiver = $user->workingEmail;

                $data = [
                    'nameFrom' => $user->employeeName,
                    'user_id' => $user->user_id,
                    'duration' => $user->duration,
                    'start_time' => $user->start_time,
                    'reminder' => $user->reminder,
                    'event_name' => $user->event_name,
                    'date' => $user->start_date,
                    'start_time' => $user->start_time,
                    'end_time' => $user->end_time,
                    'venue' => $user->venue,
                    // Include any other data required for the email content
                ];

                $response = [
                    'subject' => 'Event Reminder',
                    'typeEmail' => 'emaileventreminder',
                    'from' => env('MAIL_FROM_ADDRESS'),
                    'nameFrom' => $user->employeeName,
                    'duration' => $user->duration,
                    'start_time' => $user->start_time,
                    'reminder' => $user->reminder,
                    'event_name' => $user->event_name,
                    'date' => $user->start_date,
                    'end_time' => $user->end_time,
                    'venue' => $user->venue,
                    // Include any other data required for the email content
                ];

                // Now, send the email
                Mail::to($receiver)->send(new MailMail($response, $data));
            }
        }
    }   
}




