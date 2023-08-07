<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\MenuPermissionImport;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Service\LoginService;
use App\Mail\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use Maatwebsite\Excel\Facades\Excel;

class AjaxController extends Controller
{
    public function ajaxRegisterSave(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $save = $ls->saveRegister($input);

        echo json_encode($save);
    }

    public function ajaxLoginDomain(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $check = $ls->ajaxLogin($input, 'domain');

        echo json_encode($check);
    }

    public function ajaxLoginTenant(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $check = $ls->ajaxLogin($input, 'tenant');

        echo json_encode($check);
    }

    public function ajaxLoginAdmin(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        // $credentials = $r->only('username', 'password');

        // if (Auth::attempt($credentials)) {
        //     $check = $ls->ajaxLogin($input, 'admin');

        //     echo json_encode($check);
        // }

        $check = $ls->ajaxLogin($input, 'admin');

        echo json_encode($check);
    }

    public function ajaxForgotPass(Request $r)
    {
        $input = $r->input();

        $email = $input['username'] ?? null;

        $ls = new LoginService;

        // check email exist
        $checkEmail = $ls->checkEmail($email);

        if ($checkEmail['type'] == 'error') {
            echo json_encode($checkEmail);
            die;
        }

        // send email
        $data['typeEmail'] = 'forgotPass';
        $data['title'] = 'Orbit Reset Password';
        $data['content1'] = 'This email is sent you to reset your password.';
        $data['domain'] = $checkEmail['domain'];
        $data['username'] = $checkEmail['data']->username;
        $data['content2'] = 'Please click the button below to reset your password:';
        $data['resetPassLink'] = env('APP_URL') . '/resetPassword/' . $checkEmail['data']->user_id;
        $data['from'] = env('MAIL_USERNAME');
        $data['nameFrom'] = 'Claim';
        $data['subject'] = 'Orbit Reset Password';
        $data['typeAttachment'] = "application/pdf";
        //  $data['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

        // \Mail::to($receiver)->send(new Mail($data));

        $result = [];
        $result['msg'] = 'Your reset password link have been send';
        $result['title'] = 'Reset Password!';
        $result['type'] = 'Success';

        echo json_encode($result);
    }

    public function ajaxForgotDomain(Request $r)
    {
        $input = $r->input();

        $email = $input['email'] ?? null;

        $ls = new LoginService;

        // check email exist
        $checkEmail = $ls->checkEmail($email);

        if ($checkEmail['type'] == 'error') {
            echo json_encode($checkEmail);
            die;
        }

        // send email
        $data['typeEmail'] = 'forgotDomain';
        $data['domain'] = $checkEmail['domain'];
        $data['from'] = env('MAIL_USERNAME');
        $data['nameFrom'] = 'Claim';
        $data['subject'] = 'Orbit Reset Password';
        $data['typeAttachment'] = "application/pdf";
        //  $data['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

        // \Mail::to($receiver)->send(new Mail($data));

        $result = [];
        $result['msg'] = 'Your reset password link have been send';
        $result['title'] = 'Reset Password!';
        $result['type'] = 'Success';

        echo json_encode($result);
    }

    public function ajaxResetPass(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService;
        $resetPass = $ls->resetPassword($input);

        return response()->json($resetPass);
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

    public function ajaxCheckTenantName(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService;

        $tenantName = $ls->checkTenantName($input);

        return \response()->json([
            'title' => 'success',
            'type' => 'success',
            'msg' => 'Tenant found!',
            'data' => $tenantName
        ], 200);
    }



    public function seeder()
    {
        try {
            Excel::import(new MenuPermissionImport, 'storage/seeder/menu_permission_code.xlsx');
            return response()->json('success', 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
