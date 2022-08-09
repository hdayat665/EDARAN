<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Service\LoginService;
use App\Mail\Mail;

class AjaxController extends Controller
{
    public function ajaxRegisterSave(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $save = $ls->saveRegister($input);

        echo json_encode($save);
    }

    public function ajaxLogin(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $check = $ls->checkLogin($input);

        echo json_encode($check);
    }

    public function ajaxDomainLogin(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $check = $ls->ajaxDomainLogin($input);

        echo json_encode($check);
    }

    public function sendEmailRegister()
    {
        $receiver = 'hidayat@thelorry.com';
         // send email
         $data['typeEmail'] = 'register';
         $data['first_name'] = 'asda';
         $data['last_name'] = 'asdas';
         $data['domain'] = 'asdasd';
         $data['username'] = 'asdasd';
         $data['password'] = 'asdasd';
         $data['id'] = '8';
         $data['from'] = env('MAIL_USERNAME');
         $data['nameFrom'] = "s";
         $data['subject'] = "Your have new inquiry from s website";
         $data['receiver'] = 'hidayat@thelorry.com';
         $data['cc'] = "";
         $data['typeAttachment'] = "application/pdf";
        //  $data['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

         \Mail::to($receiver)->send(new Mail($data));
    }
}
