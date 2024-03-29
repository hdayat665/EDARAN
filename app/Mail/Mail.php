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
    // public $response;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // public function __construct($data, $response)
    // {
    //     $this->data = $data;
    //     $this->response = $response;
    // }

    // public function setResponse(array $response)
    // {
    //     $this->response = $response;
    //     return $this;
    // }
   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        // $response = $this->response;

        if ($data['typeEmail'] == 'register') {
            $view = 'emails.register';
        } else if ($data['typeEmail'] == 'forgotPass') {
            $view = 'emails.forgotPass';
        } else if ($data['typeEmail'] == 'activateAcc') {
            $view = 'emails.activationEmail';
        } else if ($data['typeEmail'] == 'activateAcc2') {
            $view = 'emails.activationEmail2';
        } else if ($data['typeEmail'] == 'tempPass') {
            $view = 'emails.temparoryPasswordEmail';
        } else if ($data['typeEmail'] == 'projectReqEmail') {
            $view = 'emails.projectRequestEmail';
        } else if ($data['typeEmail'] == 'projectReqStatus') {
            $view = 'emails.projectRequestStatusEmail';
        } else if ($data['typeEmail'] == 'projectCancelReq') {
            $view = 'emails.projectCancelRequestEmail';
        } else if ($data['typeEmail'] == 'eventInviation') {
            $view = 'emails.eventInvitationEmail';
        } else if ($data['typeEmail'] == 'eventUpdate') {
            $view = 'emails.eventUpdateEmail';
        } else if ($data['typeEmail'] == 'eventDelete') {
            $view = 'emails.eventDeleteEmail';
        } else if ($data['typeEmail'] == 'GNCSubmit') {
            $view = 'emails.claim.GNCSubmitEmail';
        } else if ($data['typeEmail'] == 'MTCSubmit') {
            $view = 'emails.claim.MTCSubmitEmail';
        } else if ($data['typeEmail'] == 'MTCApproval') {
            $view = 'emails.claim.MTCApprovalEmail';
        }else if ($data['typeEmail'] == 'hodApproval') {
            $view = 'emails.claim.hodApprovalEmail';
        } else if ($data['typeEmail'] == 'AdminMonthlyClaim') {
            $view = 'emails.claim.AdminMTC';
        } else if ($data['typeEmail'] == 'rejectMtcEmail') {
            $view = 'emails.claim.rejectMtcEmail';
        } else if ($data['typeEmail'] == 'amendMtcEmail') {
            $view = 'emails.claim.amendMtcEmail';
        } else if ($data['typeEmail'] == 'paidEmailMTC') {
            $view = 'emails.claim.paidEmailMTC';
        } else if ($data['typeEmail'] == 'submitEmailCA') {
            $view = 'emails.claim.submitEmailCA';
        } else if ($data['typeEmail'] == 'CAApproval') {
            $view = 'emails.claim.CAApproval';
        } else if ($data['typeEmail'] == 'approvalCAFinanceApproval') {
            $view = 'emails.claim.approvalCAFinanceApproval';
        }else if ($data['typeEmail'] == 'emailToRecommenderLeave') {
            $view = 'emails.leave.viewRecommenderLeave';
        }else if ($data['typeEmail'] == 'emailToApproveLeaveNoCommender') {
            $view = 'emails.leave.emailToApproveLeaveNoCommender';
        }else if ($data['typeEmail'] == 'emailToApproverLeave') {
            $view = 'emails.leave.viewApproverLeave';
        }else if ($data['typeEmail'] == 'emailToRejectedLeave') {
            $view = 'emails.leave.viewRejectedLeave';
        }else if ($data['typeEmail'] == 'emailToRejectedLeaveHod') {
            $view = 'emails.leave.viewRejectedLeaveHod';
        }else if ($data['typeEmail'] == 'emailToApprovedLeave') {
            $view = 'emails.leave.viewApprovedLeave';
        }else if ($data['typeEmail'] == 'emailToApprovedAppeal') {
            $view = 'emails.timesheet.viewtimesheetappeal';
        }else if ($data['typeEmail'] == 'emailToEmployeeAppeal') {
            $view = 'emails.timesheet.emailToEmployeeAppeal';
        }else if ($data['typeEmail'] == 'forgotDomain') {
            $view = 'emails.forgotDomain';
        }
        else if ($data['typeEmail'] == 'emailmissedtimesheet') {
            $view = 'emails.timesheet.emailmissedtimesheet';
        }
        else if ($data['typeEmail'] == 'emaileventreminder') {
            $view = 'emails.timesheet.emaileventreminder';
        }
        // if ($data['typeEmail'] == 'emailmissedtimesheet' || (isset($response['typeEmail']) && $response['typeEmail'] == 'emailmissedtimesheet')) {
        //     $view = 'emails.timesheet.emailmissedtimesheet';
        // }
        
         
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
        } else {
            return $this->view($view)
                ->from($data['from'], $data['nameFrom'])
                ->subject($data['subject'])
                ->cc($data['cc'] ?? null)
                ->with($data);
        }
    }
}
