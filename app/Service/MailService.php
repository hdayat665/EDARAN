<?php

namespace App\Service;

use App\Mail\Mail as MailMail;
use App\Models\DomainList;
use Illuminate\Support\Facades\Mail;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailService
{
    public function emailToSupervisorClaimGNC($data)
    {
        // get supervisor detail
        $user = Employee::where('user_id', Auth::user()->id)->first()->toArray();
        $supervisor = Employee::where('user_id', $user['eclaimrecommender'])->first()->toArray();

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
}