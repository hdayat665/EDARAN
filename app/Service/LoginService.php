<?php

namespace App\Service;

use App\Models\Subscription;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Support\Facades\Hash;

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

        $subsData = [];
        $subsData['user_id'] = $user['id'];
        $subsData['subcribe_type'] = $params['subscribe'];
        $subsData['status'] = 'active';

        // save subscription
        Subscription::create($subsData);

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

        return $data;
    }

    public function checkLogin($input)
    {
        $user = Users::where([['username', '=', $input['username']]])->first();

        if (!$user) {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Username / Email not exist';

            return $data;
        }

        if ($user['status'] == 'not verified') {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Please verified your account by clicking link in email we provided';

            return $data;
        }

        $password = Hash::check($input['password'], $user['password']);
        // var_dump($password);die;
        if (!$password) {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'password and Username not match';

            return $data;
        }

        // $userDetails = UsersDetails::where([['user_id', '=', $user['id']]]);
        $data['title'] = 'Success!';
        $data['type'] = 'success';
        $data['msg'] = 'Welcome ';

        return $data;

        // dd($password);
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

    public function ajaxDomainLogin($input)
    {
        // check domain exist or not
        $domain = UsersDetails::where('domain', $input['domain'])
        ->first();

        $data['title'] = 'Success!';
        $data['type'] = 'success';
        $data['msg'] = 'Success';

        if(!$domain)
        {
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Domain does not exist';
        }

        return $data;
    }
}
