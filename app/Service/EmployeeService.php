<?php

namespace App\Service;

use App\Models\Attachments;
use App\Models\Employee;
use App\Models\JobHistory;
use App\Models\Subscription;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $data['title'] = 'Error';
            $data['type'] = 'error';
            $data['msg'] = 'email already exist';
        }else{
            $user['type'] = 'employee';
            $user['status'] = 'not verified';
            $user['username'] = $r['username'];
            $user['type'] = 'employee';

            Users::create($user);

            $user = Users::where('username', $r['username'])->first();

            $input['user_id'] = $user->id;
            $input['DOB'] = date_format(date_create($input['DOB']),"Y/m/d H:i:s");
            $input['expiryDate'] = date_format(date_create($input['expiryDate']),"Y/m/d H:i:s");
            // pr($input);
            UserProfile::create($input);

            $data['status'] = true;
            $data['title'] = 'Success';
            $data['type'] = 'success';
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
        $data['title'] = 'Success';
        $data['type'] = 'success';
        $data['msg'] = 'Success create address';
        $data['data'] = UserAddress::where('user_id', $input['user_id'])->first();

        return $data;
    }

    public function addEmployment($r)
    {
        $input= $r->input();
        $input['joinedDate'] = date_format(date_create($input['joinedDate']), "Y/m/d H:i:s");

        Employee::create($input);

        $data['status'] = true;
        $data['title'] = 'Success';
        $data['type'] = 'success';
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

        $status['status'] = 'inactive';

        // check attachment
        // pr($r->file());
        if ($r->hasfile('file')) {
            foreach ($r->file('file') as $file) {
                $nameFile = upload($file);
                $attch['user_id'] = $input['user_id'];
                $attch['type'] = 'termination';
                $attch['file'] = $nameFile['filename'];
                Attachments::create($attch);
            }
        }

        // update status users and employment $table
        Users::where('id', $input['user_id'])->update($status);

        Employee::where('user_id', $input['user_id'])->update($status);

        // add data in jobHistory
        $input['updatedBy'] = Auth::user()->username;
        unset($input['status']);

        $jobHistory = [];
        $jobHistory['user_id'] = $input['user_id'];
        $jobHistory['employmentDetail'] = $input['employmentDetail'];
        $jobHistory['effectiveDate'] = date_format(date_create($input['effectiveFrom']),"Y/m/d H:i:s");
        $jobHistory['updatedBy'] = $input['updatedBy'];

        JobHistory::create($jobHistory);

        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success terminate user employment';
        $data['title'] = 'Success!';
        $data['type'] = 'success';

        return $data;
    }

    public function getEmployeeInfo()
    {
        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success get user employment';
        $data['data'] = DB::table('employment as a')
        ->join('userProfile as b', 'a.user_id', '=', 'b.user_id')
        ->select('a.employeeId', 'a.user_id', 'b.firstName', 'b.lastName', 'b.email', 'b.phoneNo', 'a.department', 'a.supervisor', 'a.status')
        ->get();


        return $data;
    }
}
