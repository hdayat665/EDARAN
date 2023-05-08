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
            $response['subject'] = 'General Claim | Month';
            $response['title'] = 'General Claim | Month';
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
        $response['subject'] = 'General Claim | Month';
        $response['title'] = 'General Claim | Month';
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
        $response['subject'] = 'General Claim | Month';
        $response['title'] = 'General Claim | Month';
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
        $response['subject'] = 'General Claim | Month';
        $response['title'] = 'General Claim | Month';
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
        $response['subject'] = 'General Claim | Month';
        $response['title'] = 'General Claim | Month';
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
        $response['subject'] = 'General Claim | Month';
        $response['title'] = 'General Claim | Month';
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

    public function emailToApproverLeave($data)
    {
        $user = Employee::select('employment.*', 'department.departmentName', 'designation.designationName')
                ->join('designation', 'employment.designation', '=', 'designation.id')
                ->join('department', 'employment.department', '=', 'department.id')
                ->where('employment.user_id', $data->up_user_id)
                ->where('employment.tenant_id', Auth::user()->tenant_id)
                ->first();

        $recommenderLeave =
        Employee::where([
            ['user_id', '=', $data->up_approvedby_id],
            ['tenant_id', '=', Auth::user()->tenant_id],

        ])->first();

        if($user && $recommenderLeave){

            $receiver = $user->workingEmail;
            $response['typeEmail'] = 'emailToApproverLeave';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $user->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['eleaveapprover'] = $recommenderLeave->employeeName;
            $response['employeeName'] = $user->employeeName;
            $response['departmentName'] = $user->departmentName;
            $response['designationName'] = $user->designationName;
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

        // $approvedLeave =
        // Employee::where([
        //     ['user_id', '=', $data->up_approvedby_id],
        //     ['tenant_id', '=', Auth::user()->tenant_id],

        // ])->first();

        if($user){

            $receiver = $user->workingEmail;
            $response['typeEmail'] = 'emailToRejectedLeave';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $user->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['employeeName'] = $user->employeeName;
            $response['departmentName'] = $user->departmentName;
            $response['designationName'] = $user->designationName;
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

        // $approvedLeave =
        // Employee::where([
        //     ['user_id', '=', $data->up_approvedby_id],
        //     ['tenant_id', '=', Auth::user()->tenant_id],

        // ])->first();

        if($user){

            $receiver = $user->workingEmail;
            $response['typeEmail'] = 'emailToRejectedLeaveHod';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $user->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['employeeName'] = $user->employeeName;
            $response['departmentName'] = $user->departmentName;
            $response['designationName'] = $user->designationName;
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

        if($user){

            $receiver = $user->workingEmail;
            $response['typeEmail'] = 'emailToApprovedLeave';

            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = $user->employeeName;
            $response['subject'] = 'Leave Application';
            $response['title'] = 'Leave Application';
            $response['employeeName'] = $user->employeeName;
            $response['departmentName'] = $user->departmentName;
            $response['designationName'] = $user->designationName;
            $response['data'] = $data;

            Mail::to($receiver)->send(new MailMail($response));
        }
    }
}
