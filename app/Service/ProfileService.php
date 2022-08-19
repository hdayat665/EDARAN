<?php

namespace App\Service;

use App\Models\Employee;
use App\Models\JobHistory;
use App\Models\Subscription;
use App\Models\UserAddress;
use App\Models\UserChildren;
use App\Models\UserCompanion;
use App\Models\UserEmergency;
use App\Models\UserParent;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\UsersDetails;
use App\Models\UserSibling;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileService
{
    public function getProfileData($user_id = '')
    {
        $user_id = Auth::user()->id;

        $data = UsersDetails::where('user_id', $user_id)->get();

      return $data;

    }

    public function updateData($input)
    {
        $user_id = Auth::user()->id;

        $user = UsersDetails::where('user_id', $user_id)->first();

        if(!$user)
        {
            $data['status'] = 404;
            $data['msg'] = 'user not found';
        }else{
            $updateData = [
                'profile_pic' => $input['uploadFile']['filename']
            ];

            UsersDetails::where('user_id', $user_id)->update($updateData);

            $data['status'] = 404;
            $data['msg'] = 'Success update Profile Picture';
        }

        return $data;

    }

    public function updateMyProfile($input)
    {
        $user_id = Auth::user()->id;

        $profile = UserProfile::where('user_id', $user_id)->first();

        if(!$profile)
        {
            $data['status'] = 404;
            $data['msg'] = 'Profile not found';
        }else{
            if(!$input['religion'])
            {
                unset($input['religion']);
            }

            if(!$input['race'])
            {
                unset($input['race']);

            }

            if(!$input['phoneNo'])
            {
                unset($input['phoneNo']);

            }

            if(!$input['homeNo'])
            {
                unset($input['homeNo']);

            }

            if(!$input['extensionNo'])
            {
                unset($input['extensionNo']);

            }

            UserProfile::where('user_id', $user_id)->update($input);

            $data['status'] = 200;
            $data['msg'] = 'Success update Profile';
        }

        return $data;

    }

    public function updateAddress($input)
    {
        $user_id = Auth::user()->id;

        $user = UserAddress::where('user_id', $user_id)->first();

        if(!$user)
        {
            $data['status'] = 404;
            $data['msg'] = 'user not found';
        }else{

            if(!$input['address2'])
            {
                unset($input['address2']);
            }

            if(!$input['address2c'])
            {
                unset($input['address2c']);

            }

            UserAddress::where('user_id', $user_id)->update($input);

            $data['status'] = 200;
            $data['msg'] = 'Success update Address';

        }

        return $data;
    }

    public function updateEmergency($input)
    {
        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserEmergency::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = 404;
            $data['msg'] = 'user not found';
        }else{

            if(!$input['address2'])
            {
                unset($input['address2']);
            }

            UserEmergency::where('id', $id)->update($input);

            $data['status'] = 200;
            $data['msg'] = 'Success update Emergency Contact';

        }

        return $data;
    }

    public function updateCompanion($r)
    {
        $input = $r->input();

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserCompanion::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = 404;
            $data['msg'] = 'user not found';
        }else{

            if ($_FILES['payslip']['name'])
            {
                $payslip = upload($r, 'payslip');
                $input['payslip'] = $payslip['filename'];

                if (!$input['payslip']) {
                    unset($input['payslip']);
                }
            }

            if ($_FILES['marrigeCert']['name'])
            {
                $marrigeCert = upload($r, 'marrigeCert');
                $input['marrigeCert'] = $marrigeCert['filename'];

                if (!$input['marrigeCert']) {
                    unset($input['marrigeCert']);
                }
            }

            if(!$input['DOM'])
            {
                unset($input['DOM']);
            }

            if(!$input['address2'])
            {
                unset($input['address2']);
            }

            if(!$input['companyName'])
            {
                unset($input['companyName']);
            }

            if(!$input['incomeTax'])
            {
                unset($input['incomeTax']);
            }

            if(!$input['officeNo'])
            {
                unset($input['officeNo']);
            }

            if(!$input['address2E'])
            {
                unset($input['address2E']);
            }

            UserCompanion::where('id', $id)->update($input);

            $data['status'] = 404;
            $data['msg'] = 'Success update Companion';
        }

        return $data;

    }

    public function updateChildren($r)
    {
        $input = $r->input();

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserChildren::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = 404;
            $data['msg'] = 'user not found';
        }else{

            if ($_FILES['supportDoc']['name'])
            {
                $payslip = upload($r, 'supportDoc');
                $input['supportDoc'] = $payslip['filename'];

                if (!$input['supportDoc']) {
                    unset($input['supportDoc']);
                }
            }

            UserChildren::where('id', $id)->update($input);

            $data['status'] = 200;
            $data['msg'] = 'Success update Children';
        }

        return $data;

    }

    public function getSibling($user_id = '')
    {
        $user_id = Auth::user()->id;

        $data['data'] = UserSibling::where('user_id', $user_id)->get();
        $data['msg'] = 'Success get sibling data';

        return $data;
    }

    public function getParent($user_id = '')
    {
        $user_id = Auth::user()->id;
        $data['data'] = UserParent::where('user_id', $user_id)->get();
        $data['msg'] = 'Success get parent data';

        return $data;
    }

    public function addSibling($r)
    {
        $input = $r->input();

        UserSibling::create($input);

        $data['status'] = 200;
        $data['msg'] = 'Success add Sibling';

        return $data;
    }

    public function addParent($r)
    {
        $input = $r->input();

        UserParent::create($input);

        $data['status'] = 200;
        $data['msg'] = 'Success add Parent';

        return $data;
    }

    public function updateEmployee($r)
    {
        $input = $r->input();

        $user_id = Auth::user()->id;

        $user = Employee::where('user_id', $user_id)->first();

        if(!$user)
        {
            $data['status'] = 404;
            $data['msg'] = 'user not found';
        }else{

            Employee::where('user_id', $user_id)->update($input);

            $data['status'] = 200;
            $data['msg'] = 'Success update Employee';
        }

        return $data;

    }

    public function updateVehicle($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;

        $user = Vehicle::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = 404;
            $data['msg'] = 'user not found';
        }else{

            Vehicle::where('id', $id)->update($input);

            $data['status'] = 200;
            $data['msg'] = 'Success update Vehicle';
        }

        return $data;

    }

    public function addVehicle($r)
    {
        $input = $r->input();

        Vehicle::create($input);

        $data['status'] = 200;
        $data['msg'] = 'Success add Vehicle';

        return $data;
    }

    public function deleteVehicle($id)
    {

        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            $data['status'] = 404;
            $data['msg'] = 'vehicle not found';
        }else{
            $vehicle->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete Vehicle';
        }

        return $data;
    }

    public function getJobHistory()
    {
        $user_id = Auth::user()->id;

        $data['data'] = JobHistory::where('user_id', $user_id)->get();
        $data['msg'] = 'Success get parent data';

        return $data;
    }

    public function addJobHistory($r)
    {
        $input = $r->input();

        JobHistory::create($input);

        $data['status'] = 200;
        $data['msg'] = 'Success add job history';

        return $data;
    }

    public function getVehicle()
    {
        $user_id = Auth::user()->id;

        $data['data'] = Vehicle::where('user_id', $user_id)->get();
        $data['msg'] = 'Success get vehicle data';

        return $data;
    }
}
