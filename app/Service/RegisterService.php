<?php

namespace App\Service;

use App\Models\Subscription;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterService
{
    public function saveRegisterTenant($r)
    {
        $data = [];
        $data['title'] = 'Success!';
        $data['type'] = 'success';
        $data['msg'] = 'Succesfully Register';

        if ($r['password'] != $r['confirm_password']) {
            // show error not same
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'password and confirm password not match';

            return $data;
        }
        // checking existing domain/user
        $user = Users::where('username', $r['username'])->first();

        if ($user) {
            // show error user exists
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Email already Exists';

            return $data;
        }

        $param['username'] = $r['username'];
        $param['status'] = 'not verified';
        $param['tenant'] = $r['tenant'];
        $param['package'] = $r['package'];
        $param['type'] = 'tenant';
        $param['password'] = Hash::make($r['password']);

        Users::create($param);

        $user = Users::where([['username', '=', $r['username']]])
        ->first()->toArray();

        // remove confirm_password element
        // unset($r['confirm_password']);
        // unset($r['tenancy']);

        // $r['user_id'] = $user['id'];
        // $r['status'] = $user['status'];

        // UsersDetails::create($r);

        return $data;

    }
}
