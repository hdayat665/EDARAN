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
            $data['status'] = config('app.response.error.status');;
            $data['title'] = config('app.response.error.title');
            $data['type'] = config('app.response.error.type');
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

            if ($input['username']) {

                $username['username'] = $input['username'];

                Users::where('id', $user_id)->update($username);
            }

            UserProfile::where('user_id', $user_id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['title'] = config('app.response.success.title');
            $data['type'] = config('app.response.success.type');
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
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
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
            $sameAsPermenant = $input['sameAsPermenant'] ?? '';

            if ($sameAsPermenant) {
                $input['address1c'] = $input['address1'];
                $input['address2c'] = $input['address2'];
                $input['postcodec'] = $input['postcode'];
                $input['cityc'] = $input['city'];
                $input['countryc'] = $input['country'];
                $input['statec'] = $input['state'];
            }
            unset($input['sameAsPermenant']);

            UserAddress::where('user_id', $user_id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
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
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            if(!$input['address2'])
            {
                unset($input['address2']);
            }

            UserEmergency::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Emergency Contact';

        }

        return $data;
    }

    public function updateCompanion($r)
    {
        $input = $r->input();

        $id = Auth::user()->id;

        $user = UserCompanion::where('user_id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            if ($_FILES['payslip']['name'])
            {
                $payslip = upload($r->file('payslip'));
                $input['payslip'] = $payslip['filename'];

                if (!$input['payslip']) {
                    unset($input['payslip']);
                }
            }

            if ($_FILES['marrigeCert']['name'])
            {
                $marrigeCert = upload($r->file('marrigeCert'));
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

            $input['dateJoined'] = "'".dateFormatInput($input['dateJoined'])."'";
            $input['expiryDate'] = "'".dateFormatInput($input['expiryDate'])."'";
            $input['DOM'] = "'".dateFormatInput($input['DOM'])."'";
            $input['DOB'] = "'".dateFormatInput($input['DOB'])."'";

            UserCompanion::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Companion';
        }

        return $data;

    }

    public function addCompanion($r)
    {
        $input = $r->input();

        $id = Auth::user()->id;

        $companion = UserCompanion::where('user_id', $id)->count();

        if ($companion >= 4) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Max Companion can add only 4';
        }else{

            if ($_FILES['payslip']['name'])
            {
                $payslip = upload($r->file('payslip'));
                $input['payslip'] = $payslip['filename'];

                if (!$input['payslip']) {
                    unset($input['payslip']);
                }
            }

            if ($_FILES['marrigeCert']['name'])
            {
                $marrigeCert = upload($r->file('marrigeCert'));
                $input['marrigeCert'] = $marrigeCert['filename'];

                if (!$input['marrigeCert']) {
                    unset($input['marrigeCert']);
                }
            }

            $input['user_id'] = $id;
            $input['dateJoined'] = dateFormat($input['dateJoined']);
            $input['expiryDate'] = dateFormat($input['expiryDate']);
            $input['DOM'] = dateFormat($input['DOM']);
            $input['DOB'] = dateFormat($input['DOB']);
            UserCompanion::create($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success add Companion';
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
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
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

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
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

    public function getParentByUserId($user_id = '')
    {
        $user_id = Auth::user()->id;
        $data['data'] = UserParent::where('user_id', $user_id)->get();
        $data['msg'] = 'Success get parent data';

        return $data;
    }

    public function addSibling($r)
    {
        $input = $r->input();
        $input['user_id'] = Auth::user()->id;

        UserSibling::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add Sibling';

        return $data;
    }

    public function addParent($r)
    {
        $input = $r->input();
        $sameAddress = $input['sameAddress'] ?? null;
        if ($sameAddress) {
            $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();

            $input['address1'] = $userProfile->address1;
            $input['address2'] = $userProfile->address2;
            $input['city'] = $userProfile->city;
            $input['state'] = $userProfile->state;
            $input['country'] = $userProfile->country;
            unset($input['sameAddress']);
        }
        $input['user_id'] = Auth::user()->id;
        UserParent::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add Parent';

        return $data;
    }

    public function updateParent($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;

        $user = UserParent::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{
            unset($input['sameAddress']);
            UserParent::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Parent';
        }

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

        $id = $input['id'];

        $user = Vehicle::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{

            Vehicle::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Vehicle';
        }

        return $data;

    }

    public function addVehicle($r)
    {
        $input = $r->input();
        $input['user_id'] = Auth::user()->id;
        Vehicle::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add Vehicle';

        return $data;
    }

    public function deleteVehicle($id)
    {

        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'vehicle not found';
        } else {
            $vehicle->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
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

    public function profileView()
    {
        $data['user_id'] = Auth::user()->id;

        $data['profile'] = UserProfile::where('user_id', $data['user_id'])->first();
        $data['address'] = UserAddress::where('user_id', $data['user_id'])->first();
        $data['emergency'] = UserEmergency::where('user_id', $data['user_id'])->first();
        $data['companions'] = UserCompanion::where('user_id', $data['user_id'])->get();
        $data['childrens'] = UserChildren::where('user_id', $data['user_id'])->get();
        $data['parents'] = UserParent::where('user_id', $data['user_id'])->get();
        $data['siblings'] = UserSibling::where('user_id', $data['user_id'])->get();
        $data['employment'] = Employee::where('user_id', $data['user_id'])->first();
        $data['jobHistorys'] = JobHistory::where('user_id', $data['user_id'])->first();
        $data['vehicles'] = Vehicle::where('user_id', $data['user_id'])->get();

        $childId[] = '';
        if ($data['childrens']) {
            foreach ($data['childrens'] as $child) {
                $childId[] = $child->id ?? null;
            }
        }

        $siblingId[] = '';
        if ($data['siblings']) {
            foreach ($data['siblings'] as $sibling) {
                $siblingId[] = $sibling->id ?? null;
            }
        }

        $parentId[] = '';
        if ($data['parents']) {
            foreach ($data['parents'] as $parent) {
                $parentId[] = $parent->id ?? null;
            }
        }

        $data['siblingId'] = implode(',', $siblingId);

        $data['parentId'] = implode(',', $parentId);

        $data['childId'] = implode(',', $childId);

        $data['idRun'] = 1;

        $data['username'] = Auth::user()->username;

        $data['user_id'] = Auth::user()->id;

        $data['gender'] = gender();
        $data['maritalStatus'] = getMaritalStatus();
        $data['educationLevel'] = educationLevel();
        $data['educationType'] = educationType();
        $data['states'] = state();
        $data['relationships'] = relationship();
        $data['citys'] = city();
        $data['americass'] = americas();
        $data['asias'] = asias();

        return $data;
    }

    public function getChildren($id = '')
    {
        $data['data'] = UserChildren::where('id', $id)->first();
        $data['msg'] = 'Success get children data';

        return $data;
    }

    public function getParentById($id = '')
    {
        $data['data'] = UserParent::where('id', $id)->first();
        $data['msg'] = 'Success get Parent data';

        return $data;
    }

    public function getSiblingById($id = '')
    {
        $data['data'] = UserSibling::where('id', $id)->first();
        $data['msg'] = 'Success get sibling data';

        return $data;
    }

    public function addChildren($r)
    {
        $input = $r->input();

        if ($_FILES['supportDoc']['name']) {
            $payslip = upload($r->file('supportDoc'));
            $input['supportDoc'] = $payslip['filename'];

            if (!$input['supportDoc']) {
                unset($input['supportDoc']);
            }
        }

        $input['user_id'] = Auth::user()->id;
        UserChildren::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success add children';

        return $data;
    }

    public function deleteChildren($id = '')
    {
        $child = UserChildren::where('id',$id)->first();

        if(!$child)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Children not found';
        }else{
            UserChildren::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Children deleted';
        }

        return $data;
    }

    public function deleteParent($id = '')
    {
        $child = UserParent::where('id',$id)->first();

        if(!$child)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Parent not found';
        }else{
            UserParent::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Parent deleted';
        }

        return $data;
    }

    public function deleteSibling($id = '')
    {
        $child = UserSibling::where('id',$id)->first();

        if(!$child)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Sibling not found';
        }else{
            UserSibling::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Sibling deleted';
        }

        return $data;
    }

    public function updateSibling($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;

        $user = UserSibling::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{
            $sameAddress = $input['sameAddress'] ?? null;
            if ($sameAddress) {
                $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();

                $input['address1'] = $userProfile->address1;
                $input['address2'] = $userProfile->address2;
                $input['city'] = $userProfile->city;
                $input['state'] = $userProfile->state;
                $input['country'] = $userProfile->country;
                unset($input['sameAddress']);
            }

            UserSibling::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Sibling';
        }

        return $data;

    }

    public function getVehicleById($id = '')
    {
        $data['data'] = Vehicle::where('id', $id)->first();
        $data['msg'] = 'Success get Vehicle data';

        return $data;
    }
}
