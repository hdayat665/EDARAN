<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;

        if ($data['typeEmail'] == 'register') {
            $view = 'emails.register';
        }else if($data['typeEmail'] == 'forgotPass')
        {
            $view = 'emails.forgotPass';
        }else if ($data['typeEmail'] == 'activateAcc') {
            $view = 'emails.activationEmail';

        }else if ($data['typeEmail'] == 'tempPass') {
            $view = 'emails.temparoryPasswordEmail';

        }else if ($data['typeEmail'] == 'projectReqEmail') {
            $view = 'emails.projectRequestEmail';

        }else if ($data['typeEmail'] == 'projectReqStatus') {
            $view = 'emails.projectRequestStatusEmail';

        }else if ($data['typeEmail'] == 'projectCancelReq') {
            $view = 'emails.projectCancelRequestEmail';

        }else if ($data['typeEmail'] == 'eventInviation') {
            $view = 'emails.eventInvitationEmail';

        }else if ($data['typeEmail'] == 'eventUpdate') {
            $view = 'emails.eventUpdateEmail';

        }else if ($data['typeEmail'] == 'eventDelete') {
            $view = 'emails.eventDeleteEmail';

        }
        // $address = 'janeexampexample@example.com';
        // $subject = 'This is a demo!';
        // $name = 'Jane Doe';

        if (isset($data['file'])) {
            return $this->view($view)
            ->from($data['from'], $data['nameFrom'])
            ->subject($data['subject'])
            ->cc($data['cc'])
            ->attach($data['file'], ['mime' => $data['typeAttachment']])
            ->with($data);
        }else {
            return $this->view($view)
            ->from($data['from'], $data['nameFrom'])
            ->subject($data['subject'])
            ->cc($data['cc'] ?? null)
            ->with($data);
        }

    }
}
