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
    public function __construct()
    {
        //
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
            ->cc($data['cc'])
            ->with($data);
        }

    }
}
