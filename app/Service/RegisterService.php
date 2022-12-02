<?php

namespace App\Service;

use App\Models\Employee;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\UserAddress;
use App\Models\UserEmergency;
use App\Models\UserProfile;
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

        // if ($r['password'] != $r['confirm_password']) {
        //     // show error not same
        //     $data['title'] = 'Error!';
        //     $data['type'] = 'error';
        //     $data['msg'] = 'password and confirm password not match';

        //     return $data;
        // }
        // checking existing domain/user
        // $user = Users::where('username', $r['username'])->first();

        // if ($user) {
        //     // show error user exists
        //     $data['title'] = 'Error!';
        //     $data['type'] = 'error';
        //     $data['msg'] = 'Email already Exists';

        //     return $data;
        // }

        $user = Users::where('tenant', $r['tenant'])->first();

        if ($user) {
            // show error user exists
            $data['title'] = 'Error!';
            $data['type'] = 'error';
            $data['msg'] = 'Tenancy name already Exists';

            return $data;
        }

        $countUser = Users::all()->count();

        $param['username'] = 'Admin';
        $param['status'] = 'not verified';
        $param['tenant_id'] = $countUser+1;
        $param['tenant'] = $r['tenant'];
        $param['package'] = $r['package'];
        $param['type'] = 'tenant';

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $length = 10;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $randomPass = uniqid();

        $password = $randomPass;

        $param['password'] = Hash::make($password);
        // print_r($password);
        Users::create($param);

        $user = Users::where([['tenant', '=', $r['tenant']]])
        ->first()->toArray();

        $userP['user_id'] = $user['id'];
        $userP['tenant_id'] = $user['tenant_id'];
        $userP['firstName'] = $r['firstName'];
        $userP['lastName'] = $r['lastName'];
        $userP['phoneNo'] = $r['phoneNo'];
        $userP['fullName'] = $r['firstName'].' '.$r['lastName'];
        UserProfile::create($userP);

        $userProfile['user_id'] = $user['id'];

        UserAddress::create($userProfile);
        UserEmergency::create($userProfile);

        $employee['workingEmail'] = $r['workingEmail'];
        $employee['user_id'] = $user['id'];
        $employee['tenant_id'] = $user['tenant_id'];

        // pr($employee);
        Employee::create($employee);

        $userProfile['tenant_id'] = $user['tenant_id'];
        $userProfile['tenant_name'] = $r['tenant'];


        Tenant::create($userProfile);

        $ls = new LoginService;
        $email['workingEmail'] = $r['workingEmail'];
        $email['tenant'] = $r['tenant'];
        $email['password'] = $password;
        // pr($password);
        $ls->activationEmail($email);


        // remove confirm_password element
        // unset($r['confirm_password']);
        // unset($r['tenancy']);

        // $r['user_id'] = $user['id'];
        // $r['status'] = $user['status'];

        // UsersDetails::create($r);

        return $data;

    }
}
