<?php

namespace App\Service;

use App\Exceptions\CustomException;
use App\Mail\Mail as MailMail;
use App\Models\Subscription;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginService
{
    public function saveRegister($params)
    {
        if ($params['password'] != $params['confirm_password']) {
            // show error not same
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'password and confirm password not match';

            return $data;
        }
        // checking existing domain/user
        $user = Users::where([['username', '=',  "'".$params['email']."'"]])
        ->first();

        if ($user) {
            // show error user exists
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Email already Exists';

            return $data;
        }

        $param['username'] = $params['email'];
        $param['status'] = 'not verified';
        $param['type'] = 'domain';
        $param['password'] = Hash::make($params['password']);

        $saveUser = Users::create($param);

        $user = Users::where([['username', '=', $params['email']]])
        ->first()->toArray();

        // $subsData = [];
        // $subsData['user_id'] = $user['id'];
        // $subsData['subcribe_type'] = $params['subscribe'];
        // $subsData['status'] = 'active';

        // // save subscription
        // Subscription::create($subsData);

        // remove confirm_password element
        unset($params['confirm_password']);

        $params['user_id'] = $user['id'];
        $params['status'] = $user['status'];

        $saveUser = UsersDetails::create($params);


        if ($saveUser) {
            $data['title'] = 'Success!';
            $data['type'] = 'success';
            $data['msg'] = 'Success register';
        }else{
            $data['title'] = 'Error';
            $data['type'] = 'error';
            $data['msg'] = 'Error register';
        }

        return $this->response($saveUser);
    }

    public function verifiedAcc($id = '')
    {
        $user = Users::where('id', $id)
        ->update(['status' => 'active']);
            // dd($user);

        if (!$user) {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Error while processing';

            return $data;
        }

        $data['title'] = 'Success!';
        $data['type'] = 'success';
        $data['msg'] = 'Your Account have been verified';

        return $data;

    }

    public function ajaxLogin($input, $type = '')
    {
        // check tenant exist or not
        if ($type == 'tenant') {
            $tenant = UsersDetails::where([['tenant', '=', $input['tenant']]])
            ->first();

            if (!$tenant) {
                $data['title'] = 'Error!';
                $data['type'] = 'error';
                $data['msg'] = 'Tenant does not exist';

                return $data;
            }
        }

        // check username n password
        $user = Users::where([['username', '=', $input['username']], ['type', '=', $type]])->first();

        if (!$user) {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Username / Email not exist';

            return $data;
        }

        $password = Hash::check($input['password'], $user['password']);
        if (!$password) {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Password and Username not match';

            if ($type == 'admin') {
                $count = 1;
                if ($user->failLogin) {

                    Users::where('username', $input['username'])
                    ->update(['failLogin' =>  $user->failLogin+1 ]);
                } else  {
                    Users::where('username', $input['username'])
                    ->update(['failLogin' =>  $count ]);
                }

                //   if more than 3 attemps lock acc
                if($user->failLogin >= 3){
                    Users::where('username', $input['username'])
                    ->update(['status' =>  'lock' ]);

                    // sending email

                    $data['title'] = 'Error!';
                    $data['type'] = 'error';
                    $data['msg'] = 'Your account have been lock.';

                    return $data;

                }
            }

            return $data;
        }

        // verified acc
        if ($user['status'] == 'not verified') {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Please verified your account by clicking link in email we provided';

            return $data;
        }

        if ($user['status'] == 'lock') {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Your account have been lock.';

            return $data;
        }

        Users::where('username', $input['username'])
                    ->update(['failLogin' =>  0]);

        $data['title'] = 'Success!';
        $data['type'] = 'success';
        $data['msg'] = 'Success';

        return $data;
    }

    public function checkEmail($email = '')
    {
        $checkEmail = UsersDetails::where('email', $email)->first();

        if(!$checkEmail)
        {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'You email does not exist!';
        }else {
            $data['title'] = 'Success!';
            $data['type'] = 'success';
            $data['msg'] = 'You email have been send!';
            $data['email'] = $checkEmail->email;
            $data['domain'] = $checkEmail->domain;
            $data['data'] = $checkEmail;

        }

        return $data;
    }

    public function resetPassword($input = [])
    {
        // check pass n confirm pass same
        if ($input['password'] != $input['confirm_password']) {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'password and confirm password not match';

            return $data;
        }

        $password = Hash::make($input['password']);

        $update = Users::where('id', $input['user_id'])
                    ->update(['password' =>  $password ]);

        if (!$update) {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Something Wrong!';

            return $data;
        }

        $data['title'] = 'Success!';
        $data['type'] = 'success';
        $data['msg'] = 'Reset password Success';

        return $data;

    }

    public function login($r, $type = '')
    {
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Authorized!';

        $user = $r->input();

        $r->authenticate();
        $r->session()->regenerate();

        Auth::attempt($user);

        $user_id = Auth::user()->id;

        Users::where('id', $user_id)->update(['is_login' => 'yes']);

        if ($type == 'tenant') {
            $userDetail = Users::where([['id', $user_id], ['tenant', $r->input()['tenant']]])->first();

            if (!$userDetail) {
                $data['msg'] = 'Credential not match with tenant name!';

                throw new CustomException($data['msg']);
            }

            if ($userDetail->status == 'not verified') {
                $data['msg'] = 'Your account is not verified.';

                throw new CustomException($data['msg']);
            }

        }

        return $data;
    }

    public function checkTenantName($input)
    {
        $tenant = Users::where('tenant', $input['tenant'])->first();

        return $tenant;
    }

    public function forgotPassEmail($input)
    {
        $user = Users::where('username', $input['username'])->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Email not found';
        }else{
            $receiver = 'hdayat665@gmail.com';
            $response['typeEmail'] = 'forgotPass';
            $response['title'] = 'Orbit Reset Password';
            $response['content1'] = 'This email is sent you to reset your password.';
            $response['domain'] = $user->tenant;
            $response['username'] = $user->username;
            $response['content2'] = 'Please click the button below to reset your password:';
            $response['resetPassLink'] = env('APP_URL') . '/resetPassView/'.$user->id;
            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = 'Claim';
            $response['subject'] = 'Orbit Reset Password';
            // $response['typeAttachment'] = "application/pdf";
            //  $response['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

            Mail::to($receiver)->send(new MailMail($response));

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Email have been send to your email';
        }

        return $data;

    }

    public function activationEmail($input)
    {
        $user = Users::where('tenant', $input['tenant'])->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Email not found';
        } else {
            $receiver = $input['workingEmail'];
            $response['typeEmail'] = 'activateAcc';
            $response['title'] = 'Orbit Activation Link';
            $response['content1'] = 'This email is sent you to activate your account.';
            $response['domain'] = $user->tenant;
            $response['username'] = $user->username;
            $response['content2'] = 'Please click the button below to activate your account:';
            $response['resetPassLink'] = env('APP_URL') . '/activateView/' . $user->id;
            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = 'Claim';
            $response['subject'] = 'Orbit Activation Link';
            // $response['typeAttachment'] = "application/pdf";
            //  $response['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

            Mail::to($receiver)->send(new MailMail($response));

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Email have been send to your email';
        }

        return $data;
    }

    public function temporaryPasswordEmail($input)
    {
        $user = Users::where('id', $input['user_id'])->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Email not found';
        } else {
            $receiver = 'hdayat665@gmail.com';
            $response['typeEmail'] = 'tempPass';
            $response['title'] = 'Orbit Temporary Password';
            $response['content1'] = 'This email is sent you to show your temporary credential.';
            $response['domain'] = $user->tenant;
            $response['username'] = $user->username;
            $response['password'] = 'password';
            $response['content2'] = 'Your credential to login as above:';
            $response['resetPassLink'] = env('APP_URL') . '/';
            $response['from'] = env('MAIL_FROM_ADDRESS');
            $response['nameFrom'] = 'Claim';
            $response['subject'] = 'Orbit Temporary Password';
            // $response['typeAttachment'] = "application/pdf";
            //  $response['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

            Mail::to($receiver)->send(new MailMail($response));

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Email have been send to your email';
        }

        return $data;
    }

    public function activateLink($user_id = '')
    {
        Users::where('id', $user_id)->update(['status' => 'active']);
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Your account have been activate';
        return $data;
    }
}
