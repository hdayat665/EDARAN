<?php

namespace App\Service;

use App\Mail\Mail as MailMail;
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
}