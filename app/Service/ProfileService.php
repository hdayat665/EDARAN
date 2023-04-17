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
use App\Models\UserQualificationEducation;
use App\Models\UserQualificationOthers;
use App\Models\Users;
use App\Models\UsersDetails;
use App\Models\UserSibling;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
            $data['msg'] = 'Success Update Profile Picture';
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

        } else {

            if ($input['fullName']) {
                $employee['employeeName'] = $input['fullName'];
            
                Employee::where('user_id', $user_id)->update($employee);
            }
            
            
            if(!isset($input['nonNetizen']))
            {
                $input['nonNetizen'] = null;
            }

            if(!isset($input['okuStatus']))
            {
                $input['okuStatus'] = null;
                $input['okuCardNum'] = null;
            }

            if(!isset($input['passport']))
            {
                $input['passport'] = null;
                $input['expiryDate'] = null;
                $input['issuingCountry'] = null;
            }

            if ($input['username']) {

                $username['username'] = $input['username'];

                Users::where('id', $user_id)->update($username);
            }

            if ($_FILES['fileID']['name']) {
                $payslip = upload(request()->file('fileID'));
                $input['fileID'] = $payslip['filename'];
            
                if (!$input['fileID']) {
                    unset($input['fileID']);
                }
            }

            if (isset($_FILES['okuFile']['name'])) {
                $payslip = upload(request()->file('okuFile'));
                $input['okuFile'] = $payslip['filename'];
            } else {
                $input['okuFile'] = null;
            }
            

            if(isset($input['nonNetizen']) && $input['nonNetizen'] == 'on') {
                $input['idNo'] = null;
            }

            UserProfile::where('user_id', $user_id)->update($input);
            // $profileEmployment->fill($input);
            // $profileEmployment->save();

            $data['status'] = config('app.response.success.status');
            $data['title'] = config('app.response.success.title');
            $data['type'] = config('app.response.success.type');
            $data['msg'] = 'My Profile is updated';
        }

        return $data;

    }

    public function addEducation($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $input['user_id'] = Auth::user()->id;
        UserQualificationEducation::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New Education is created';

        return $data;
    }

  

    public function getEducation($id = '')
    {
        $data['data'] = UserQualificationEducation::where('id', $id)->first();
        // pr(Storage::path($data['data']->supportDoc));
        $data['msg'] = 'Success Get Education Data';

        return $data;
    }

    public function updateEducation($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserQualificationEducation::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';

        }else{

            UserQualificationEducation::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Education is updated';
        }

        return $data;

    }

    public function deleteEducation($id = '')
    {
        $user = UserQualificationEducation::where('id',$id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Education not found';
        }else{
            UserQualificationEducation::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Education is deleted';
        }

        return $data;
    }


    public function addOthers($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $input['user_id'] = Auth::user()->id;
        UserQualificationOthers::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New Others Qualification is created';

        return $data;
    }

    public function getOthers($id = '')
    {
        $data['data'] = UserQualificationOthers::where('id', $id)->first();
        // pr(Storage::path($data['data']->supportDoc));
        $data['msg'] = 'Success Get Others Qualification';

        return $data;
    }

    public function updateOthers($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserQualificationOthers::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';

        } else {

            UserQualificationOthers::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Others Qualification is updated';
        }

        return $data;

    }

    public function deleteOthers($id = '')
    {
        $user = UserQualificationOthers::where('id',$id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Others Qualification not found';
        }else{
            UserQualificationOthers::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Others Qualification is deleted';
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
            $data['msg'] = 'User not found';
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
            $data['msg'] = 'Address Is Updated';

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
            $data['msg'] = 'Success Update Emergency Contact';

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

            if ($_FILES['idFile']['name'])
            {
                $idAttachment = upload($r->file('idFile'));
                $input['idFile'] = $idAttachment['filename'];

                if (!$input['idFile']) {
                    unset($input['idFile']);
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

            if ($_FILES['okuID']['name'])
            {
                $idOKU = upload($r->file('okuID'));
                $input['okuID'] = $idOKU['filename'];

                if (!$input['okuID']) {
                    unset($input['okuID']);
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

            if(!isset($input['okuStatus']))
            {
                $input['okuStatus'] = null;
                $input['okuNumber'] = null;
                $input['okuID'] = null;
            }

            // $input['dateJoined'] = "'".dateFormatInput($input['dateJoined'])."'";
            // $input['expiryDate'] = "'".dateFormatInput($input['expiryDate'])."'";
            // $input['DOM'] = "'".dateFormatInput($input['DOM'])."'";
            // $input['DOB'] = "'".dateFormatInput($input['DOB'])."'";
            $id = $input['id'];
            UserCompanion::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Companion is updated.';
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
    } else {
        if ($_FILES['idFile']['name']) {
            $idAttachment = upload($r->file('idFile'));
            $input['idFile'] = $idAttachment['filename'];

            if (!$input['idFile']) {
                unset($input['idFile']);
            }
        }

        if ($_FILES['marrigeCert']['name']) {
            $marrigeCert = upload($r->file('marrigeCert'));
            $input['marrigeCert'] = $marrigeCert['filename'];

            if (!$input['marrigeCert']) {
                unset($input['marrigeCert']);
            }
        }

        if ($_FILES['okuID']['name']) {
            $idOKU = upload($r->file('okuID'));
            $input['okuID'] = $idOKU['filename'];

            if (!$input['okuID']) {
                unset($input['okuID']);
            }
        }
          
        if(!isset($input['dateJoined']))
        {
            $input['dateJoined'] = NULL;
        }

        $input['user_id'] = $id;
        $input['dateJoined'] = dateFormat($input['dateJoined']);
        $input['expiryDate'] = dateFormat($input['expiryDate']);
        $input['DOM'] = dateFormat($input['DOM']);
        $input['DOB'] = dateFormat($input['DOB']);
        $input['mainCompanion'] = isset($input['mainCompanion']) ? 1 : 0;
        $companion = UserCompanion::create($input);

        // Set the main companion if the checkbox is checked
        if ($r->input('mainCompanion')) {
            // Set the mainCompanion attribute of the new companion to 1
            $companion->mainCompanion = 1;
            $companion->save();

            // Set the mainCompanion attribute of all other companions to 0
            UserCompanion::where('user_id', $id)
                ->where('id', '<>', $companion->id)
                ->update(['mainCompanion' => 0]);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New Companion is created.';
    }

    return $data;
}


    public function deleteCompanion($id = '')
    {
        $companion = UserCompanion::where('id', $id)->first();
        //dd($companion);

        if(!$companion)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Companion not found';
        }else{
            UserCompanion::where('id', $id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Companion is deleted.';
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
        } else {
            
            if ($_FILES['birthID']['name']) {
                $payslip = upload($r->file('birthID'));
                $input['birthID'] = $payslip['filename'];
    
                if (!$input['birthID']) {
                    unset($input['birthID']);
                }
            }
    
            if ($_FILES['idFile']['name']) {
                $payslip = upload($r->file('idFile'));
                $input['idFile'] = $payslip['filename'];
    
                if (!$input['idFile']) {
                    unset($input['idFile']);
                }
            }
    
            if ($_FILES['okuFile']['name']) {
                $payslip = upload($r->file('okuFile'));
                $input['okuFile'] = $payslip['filename'];
    
                if (!$input['okuFile']) {
                    unset($input['okuFile']);
                }
            }
    
    
            if ($_FILES['supportDoc']['name']) {
                $payslip = upload($r->file('supportDoc'));
                $input['supportDoc'] = $payslip['filename'];
    
                if (!$input['supportDoc']) {
                    unset($input['supportDoc']);
                }
            }

            if(!isset($input['okuStatus']))
            {
                $input['okuStatus'] = null;
                $input['okuNo'] = null;
                $input['okuFile'] = null;
            }

            if(!isset($input['passport']))
            {
                $input['passport'] = null;
                $input['expiryDate'] = null;
                $input['issuingCountry'] = null;
            }

            UserChildren::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Children is updated.';
        }

        return $data;

    }

    public function getSibling($user_id = '')
    {
        $user_id = Auth::user()->id;

        $data['data'] = UserSibling::where('user_id', $user_id)->get();
        $data['msg'] = 'Success Get Sibling Data';

        return $data;
    }

    public function getParentByUserId($user_id = '')
    {
        $user_id = Auth::user()->id;
        $data['data'] = UserParent::where('user_id', $user_id)->get();
        $data['msg'] = 'Success Get Parent Data';

        return $data;
    }

    public function addSibling($r)
    {
        $input = $r->input();
        $input['user_id'] = Auth::user()->id;
        $input['address1'] = $input['address1'] . ' ' . $input['address2'] . '' . $input['city'] . ' ' . $input['postcode'] . ' ' . $input['state'] . ' ' . $input['country'];

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
        // $sameAddress = $input['sameAddress'] ?? null;
        // $input['address1'] = $input['address1'] . ' ' . $input['address2'] . '' . $input['city'] . ' ' . $input['postcode'] .' '. $input['state'] . ' ' . $input['country'];
        // if ($sameAddress) {
        //     $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();

        //     $input['address1'] = $userProfile->address1 . ' ' . $userProfile->address2 . '' . $userProfile->city . ' ' . $userProfile->state . ' ' . $userProfile->country;
        //     $input['address2'] = $userProfile->address2;
        //     $input['city'] = $userProfile->city;
        //     $input['state'] = $userProfile->state;
        //     $input['postcode'] = $userProfile->postcode;
        //     $input['country'] = $userProfile->country;
        //     unset($input['sameAddress']);
        // }

        if ($_FILES['idFile']['name'])
        {
            $idAttachment = upload($r->file('idFile'));
            $input['idFile'] = $idAttachment['filename'];

            if (!$input['idFile']) {
                unset($input['idFile']);
            }
        }

        if ($_FILES['okuFile']['name'])
        {
            $idOKU = upload($r->file('okuFile'));
            $input['okuFile'] = $idOKU['filename'];

            if (!$input['okuFile']) {
                unset($input['okuFile']);
            }
        }

        $input['user_id'] = Auth::user()->id;
        UserParent::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New Family is created.';

        return $data;
    }

    public function updateParent($r)
    {
        $input = $r->input();

        $id = $input['id'] ?? 1;

        if ($_FILES['idFile']['name'])
        {
            $idAttachment = upload($r->file('idFile'));
            $input['idFile'] = $idAttachment['filename'];

            if (!$input['idFile']) {
                unset($input['idFile']);
            }
        }

        if ($_FILES['okuFile']['name'])
        {
            $idOKU = upload($r->file('okuFile'));
            $input['okuFile'] = $idOKU['filename'];

            if (!$input['okuFile']) {
                unset($input['okuFile']);
            }
        }

        $user = UserParent::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        }else{
            unset($input['sameAddress']);
            // $input['address1'] = $input['address1'] . ' ' . $input['address2'] . '' . $input['city'] . ' ' . $input['postcode'] . ' ' . $input['state'] . ' ' . $input['country'];
            UserParent::where('id', $id)->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Family is updated.';
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
            $data['msg'] = 'Success Update Employee';
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
            $data['msg'] = 'Vehicle is updated';
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
        $data['msg'] = 'Vehicle is created';

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
            $data['msg'] = 'Vehicle is Deleted';
        }

        return $data;
    }

    public function getJobHistory()
    {
        $user_id = Auth::user()->id;

        $data['data'] = JobHistory::where('user_id', $user_id)->get();
        $data['msg'] = 'Success Get Parent Data';

        return $data;
    }

    public function addJobHistory($r)
    {
        $input = $r->input();

        JobHistory::create($input);

        $data['status'] = 200;
        $data['msg'] = 'Success add Job History';

        return $data;
    }

    public function getVehicle()
    {
        $user_id = Auth::user()->id;

        $data['data'] = Vehicle::where('user_id', $user_id)->get();
        $data['msg'] = 'Success Get Vehicle Data';

        return $data;
    }

    public function profileView()
    {
        $data['user_id'] = Auth::user()->id;

        $data['profile'] = UserProfile::where('user_id', $data['user_id'])->first();
        $data['educations'] = UserQualificationEducation::where('user_id', $data['user_id'])->get();
        $data['others'] = UserQualificationOthers::where('user_id', $data['user_id'])->get();
        $data['address'] = UserAddress::where('user_id', $data['user_id'])->first();
        $data['addressDetails'] = UserAddress::where('user_id', $data['user_id'])->get();
        $data['emergency'] = UserEmergency::where('user_id', $data['user_id'])->first();
        $data['companions'] = UserCompanion::where('user_id', $data['user_id'])->get();
        // dd($data['companions']);
        // die;
        $data['childrens'] = UserChildren::where('user_id', $data['user_id'])->get();
        $data['parents'] = UserParent::where('user_id', $data['user_id'])->get();
        $data['siblings'] = UserSibling::where('user_id', $data['user_id'])->get();
        $data['employment'] = Employee::where('user_id', $data['user_id'])->first();
        $data['jobHistorys'] = JobHistory::where('user_id', $data['user_id'])->get();
        $data['vehicles'] = Vehicle::where('user_id', $data['user_id'])->get();
        $data['userDetails'] = DB::table('users_details as a')
        ->leftjoin('designation as b', 'a.designation', '=', 'b.id')
        ->select('a.*', 'b.designationName')
        ->first();
        // dd($data['employment']);

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

        $addressId[] = '';
        if ($data['addressDetails']) {
            foreach ($data['addressDetails'] as $address) {
                $addressId[] = $address->id ?? null;
            }
        }

        $educationId[] = '';
        if ($data['educations']) {
            foreach ($data['educations'] as $education) {
                $educationId[] = $education->id ?? null;
            }
        }

        $othersId[] = '';
        if ($data['others']) {
            foreach ($data['others'] as $others) {
                $othersId[] = $others->id ?? null;
            }
        }

        $data['siblingId'] = implode(',', $siblingId);

        $data['parentId'] = implode(',', $parentId);

        $data['childId'] = implode(',', $childId);

        $data['addressId'] = implode(',', $addressId);

        $data['educationId'] = implode(',', $educationId);

        $data['othersId'] = implode(',', $othersId);

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
        $data['addressType'] = addressType();

        return $data;
    }

    public function getChildren($id = '')
    {
        $data['data'] = UserChildren::where('id', $id)->first();
        $data['msg'] = 'Success Get Children Data';

        return $data;
    }

    public function getParentById($id = '')
    {
        $data['data'] = UserParent::where('id', $id)->first();
        $data['msg'] = 'Success Get Parent Data';

        return $data;
    }

    public function getSiblingById($id = '')
    {
        $data['data'] = UserSibling::where('id', $id)->first();
        $data['msg'] = 'Success Get Sibling Data';

        return $data;
    }

    public function addChildren($r)
    {
        $input = $r->input();

        if ($_FILES['birthID']['name']) {
            $payslip = upload($r->file('birthID'));
            $input['birthID'] = $payslip['filename'];

            if (!$input['birthID']) {
                unset($input['birthID']);
            }
        }

        if ($_FILES['idFile']['name']) {
            $payslip = upload($r->file('idFile'));
            $input['idFile'] = $payslip['filename'];

            if (!$input['idFile']) {
                unset($input['idFile']);
            }
        }

        if (isset($_FILES['okuFile']['name'])) {
            $payslip = upload(request()->file('okuFile'));
            $input['okuFile'] = $payslip['filename'];
        } else {
            $input['okuFile'] = null;
        }

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
        $data['msg'] = 'Children is created.';

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
            $data['msg'] = 'Children is deleted.';
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
            $data['msg'] = 'Family is deleted.';
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
            $data['msg'] = 'Success Update Sibling';
        }

        return $data;

    }

    public function getVehicleById($id = '')
    {
        $data['data'] = Vehicle::where('id', $id)->first();
        $data['msg'] = 'Success Get Vehicle Data';

        return $data;
    }

    public function getAddressDetails($id = '')
    {
        $data['data'] = UserAddress::where('id', $id)->first();
        $data['msg'] = 'Success Get Address Data';

        return $data;
    }

    public function addAddressDetails($r)
    {
        $input = $r->input();
        $input['user_id'] = Auth::user()->id;
        $input['addressType'] = '0';
        UserAddress::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'New address is created';

        return $data;
    }

    public function updateAddressDetails($r)
    {
        $input = $r->input();

        $user_id = Auth::user()->id;
        $id = $input['id'] ?? 1;

        $user = UserAddress::where('id', $id)->first();

        if(!$user)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Address not found';

        } else {

            $user->update($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Address Is Updated';
        }

        return $data;
    }

    // public function updateAddressType($r)
    // {
    //     $id = $r->input('id');
    //     $user_id = Auth::user()->id;
    //     $addressType = $r->input('addressType');
    //     $checked = $r->input('checked');

    //     $address = UserAddress::where('id', $id)->first();
    //     if (!$address) {
    //         $data['status'] = config('app.response.error.status');
    //         $data['type'] = config('app.response.error.type');
    //         $data['title'] = config('app.response.error.title');
    //         $data['msg'] = 'Address not found';
    //     } else {
    //         // Update the address type value based on the checkbox state
    //         if ($addressType == 'permanent' && $checked) {
    //             $address->addressType |= 1;
    //         } else if ($addressType == 'correspondent' && $checked) {
    //             $address->addressType |= 2;
    //         } else if ($addressType == 'permanent' && !$checked) {
    //             $address->addressType &= ~1;
    //         } else if ($addressType == 'correspondent' && !$checked) {
    //             $address->addressType &= ~2;
    //         }

    //         // If both permanent and correspondent are checked, set the address type to 3
    //         if ($address->addressType == 3) {
    //             $address->addressType = 3;
    //         }

    //         $address->save();

    //         $data['status'] = config('app.response.success.status');
    //         $data['type'] = config('app.response.success.type');
    //         $data['title'] = config('app.response.success.title');
    //         $data['msg'] = 'Success Update Address Type';
    //     }

    //     return $data;
    // }


    // public function updateAddressType($r)
    // {
    //     $id = $r->input('id');
    //     $addressType = $r->input('addressType');
    //     $checked = $r->input('checked');

    //     $address = UserAddress::where('id', $id)->first();
    //     if (!$address) {
    //         return response()->json(['status' => 'error', 'msg' => 'Address not found']);
    //     }

    //     $addressTypeValue = $addressType == 'permanent' ? 1 : ($addressType == 'correspondent' ? 2 : 3);
    //     $address->addressType = $checked ? $addressTypeValue : ($address->addressType & ~$addressTypeValue);
    //     $address->save();

    //     return response()->json(['status' => 'success', 'msg' => 'Address type updated']);
    // }

//     public function updateAddressType($r)
// {
//     $id = $r->input('id');
//     $user_id = Auth::user()->id;
//     $addressType = $r->input('addressType');
//     $checked = $r->input('checked');

//     $address = UserAddress::where('id', $id)->first();
//     if (!$address) {
//         $data['status'] = config('app.response.error.status');
//         $data['type'] = config('app.response.error.type');
//         $data['title'] = config('app.response.error.title');
//         $data['msg'] = 'Address not found';
//     }

//     // Update the address type value based on the checkbox state
//     if ($addressType == 'permanent' && $checked) {
//         $address->addressType |= 1;
//     } else if ($addressType == 'correspondent' && $checked) {
//         $address->addressType |= 2;
//     } else if ($addressType == 'permanent' && !$checked) {
//         $address->addressType &= ~1;
//     } else if ($addressType == 'correspondent' && !$checked) {
//         $address->addressType &= ~2;
//     }

//     // Set the address type value based on the state of the two checkboxes
//     if ($address->addressType == 3 || ($address->permanent && $address->correspondent)) {
//         $address->addressType = 3; // both are checked
//     } else if ($address->addressType == 0) {
//         $address->addressType = 4; // both are unchecked
//     }

//     $address->save();

//     $data['status'] = config('app.response.success.status');
//     $data['type'] = config('app.response.success.type');
//     $data['title'] = config('app.response.success.title');
//     $data['msg'] = 'Success Update Address Type';

//     return $data;
// }




    // public function updateAddressDetails($input)
    // {

    //     $user_id = Auth::user()->id;

    //     $user = UserAddress::where('user_id', $user_id)->first();

    //     if(!$user)
    //     {
    //         $data['status'] = config('app.response.error.status');
    //         $data['type'] = config('app.response.error.type');
    //         $data['title'] = config('app.response.error.title');
    //         $data['msg'] = 'Address not found';

    //     } else {

    //         UserAddress::where('user_id', $user_id)->update($input);

    //         $data['status'] = config('app.response.success.status');
    //         $data['type'] = config('app.response.success.type');
    //         $data['title'] = config('app.response.success.title');
    //         $data['msg'] = 'Success Update Address';
    //     }

    //     return $data;
    // }

    public function deleteAddressDetails($id = '')
    {
        $addressDetails = UserAddress::where('id', $id)->first();

        if(!$addressDetails)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Address not found';
        }else{
            UserAddress::where('id',$id)->delete();
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Address Is Deleted';
        }

        return $data;
    }

    public function getAddressforCompanion($userId, $addressType)
    {
        $addressDetails = UserAddress::where('user_id', $userId)
            ->whereIn('addressType', $addressType)
            ->select('address1', 'address2', 'postcode', 'city', 'state', 'country')
            ->first();

        if(!$addressDetails)
        {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Address not found';
        }else{
            $data['data'] = $addressDetails;
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Get Address Data';
        }

        return $data;
    }

    




}
