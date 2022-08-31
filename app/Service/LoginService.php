<?php

namespace App\Service;

use App\Exceptions\CustomException;
use App\Models\Subscription;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
        }

        return $data;
    }

    public function checkTenantName($input)
    {
        $tenant = Users::where('tenant', $input['tenant'])->first();

        return $tenant;
    }
}
