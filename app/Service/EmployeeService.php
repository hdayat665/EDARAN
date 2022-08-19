<?php

namespace App\Service;

use App\Models\Employee;
use App\Models\JobHistory;
use App\Models\Subscription;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeeService
{
    public function addProfile($r)
    {
        $input = $r->input();

        $user = Users::where('username', $r['username'])->first();

        if ($user) {
            $data['status'] = false;
            $data['msg'] = 'email already exist';
        }else{
            $input['type'] = 'employee';
            $input['status'] = 'not verified';

            Users::create($input);

            $user = Users::where('username', $r['username'])->first();

            $input['user_id'] = $user->id;

            UserProfile::create($input);

            $data['status'] = true;
            $data['msg'] = 'Success create user profile';
            $data['data'] = UserProfile::where('user_id', $user->id)->first();
        }

        return $data;
    }

    public function addAddress($r)
    {
        $input= $r->input();

        UserAddress::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create address';
        $data['data'] = UserAddress::where('user_id', $r->input()['user_id'])->first();

        return $data;
    }

    public function addEmployment($r)
    {
        $input= $r->input();

        Employee::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create user employment';
        $data['data'] = Employee::where('user_id', $input['user_id'])->first();

        return $data;
    }

    public function getEmployee()
    {
        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success get user employment';
        $data['data'] = Employee::all();

        return $data;
    }

    public function terminateEmployment($r)
    {
        $input = $r->input();
        $status['status'] = $input['status'];
        // update status users and employment $table
        Users::where('id', $input['user_id'])->update($status);

        Employee::where('user_id', $input['user_id'])->update($status);

        // add data in jobHistory
        $input['updatedBy'] = Auth::user()->username;
        unset($input['status']);

        JobHistory::create($input);

        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success terminate user employment';

        return $data;
    }
}
