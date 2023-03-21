<?php

namespace App\Http\Controllers\HRIS;

use App\Models\UserAddress;
use App\Models\UserChildren;
use App\Models\UserCompanion;
use App\Models\UserEmergency;
use App\Models\UserProfile;
use App\Models\UsersDetails;
use App\Service\LoginService;
use App\Service\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profile()
    {
        $data = [];

        return view('pages.HRIS.profile',$data);
    }

    public function profileData($user_id = '')
    {
        $ps = new ProfileService;

        $user_id = 10;

        $data['profile'] = $ps->getProfileData(($user_id));

        return response()->json($data);
    }

    public function updateProfile_Picture(Request $r)
    {
        $input = $r->input();
        

        $ps = new ProfileService;

        $result = $ps->updateData($input);

        return response()->json($result);
    }

    public function updateMyProfile(Request $r)
    {
        $input = $r->input();

        $ps = new ProfileService;

        $result = $ps->updateMyProfile($input);

        return response()->json($result);
    }

    public function updateAddress(Request $r)
    {
        $input = $r->input();

        $ps = new ProfileService;

        $result = $ps->updateAddress($input);

        return response()->json($result);
    }

    public function updateEmergency(Request $r)
    {
        $input = $r->input();

        $ps = new ProfileService;

        $result = $ps->updateEmergency($input);

        return response()->json($result);
    }

    public function updateCompanion(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateCompanion($r);

        return response()->json($result);
    }

    public function addCompanion(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addCompanion($r);

        return response()->json($result);
    }

    public function addChildren(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addChildren($r);

        return response()->json($result);
    }

    public function updateChildren(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateChildren($r);

        return response()->json($result);
    }

    public function getSibling($user_id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getSibling($user_id);

        return response()->json($result);
    }

    public function getParent($user_id = '')
    {
        $ps = new ProfileService;

        $result = $ps->$this->getParent($user_id);

        return response()->json($result);
    }

    public function addSibling(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addSibling($r);

        return response()->json($result);
    }

    public function addParent(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addParent($r);

        return response()->json($result);
    }

    public function updateParent(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateParent($r);

        return response()->json($result);
    }

    public function updateEmployee(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateEmployee($r);

        return response()->json($result);
    }

    public function updatePass(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService;

        $result = $ls->resetPassword($input);

        return response()->json($result);
    }

    public function addVehicle(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addVehicle($r);

        return response()->json($result);
    }

    public function updateVehicle(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateVehicle($r);

        return response()->json($result);
    }

    public function deleteVehicle($id)
    {
        $ps = new ProfileService;

        $result = $ps->deleteVehicle($id);

        return response()->json($result);
    }

    public function getJobHistory()
    {
        $ps = new ProfileService;

        $result = $ps->getJobHistory();

        return response()->json($result);
    }

    public function addJobHistory(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addJobHistory($r);

        return response()->json($result);
    }

    public function getVehicle()
    {
        $ps = new ProfileService;

        $result = $ps->getVehicle();

        return response()->json($result);
    }

    public function myProfileView()
    {

        $ps = new ProfileService;

        $data = $ps->profileView();
        // pr($data['employment']);
        return view('pages.HRIS.myProfile.index', $data);
    }

    public function getChildren($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getChildren($id);

        return response()->json($result);
    }

    public function deleteChildren($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->deleteChildren($id);

        return response()->json($result);
    }

    public function getParentById($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getParentById($id);

        return response()->json($result);
    }

    public function getSiblingById($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getSiblingById($id);

        return response()->json($result);
    }

    public function updateSibling(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateSibling($r);

        return response()->json($result);
    }

    public function deleteParent($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->deleteParent($id);

        return response()->json($result);
    }

    public function deleteSibling($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->deleteSibling($id);

        return response()->json($result);
    }

    public function resetPassword(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService;

        $result = $ls->resetPassword($input);

        return response()->json($result);

    }

    public function getVehicleById($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getVehicleById($id);

        return response()->json($result);
    }

    public function addEducation(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addEducation($r);

        return response()->json($result);
    }

    public function getEducation($user_id = '')
    {
        $ps = new ProfileService;

        $result = $ps->$this->getEducation($user_id);

        return response()->json($result);
    }

    public function getEducationById($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getEducation($id);

        return response()->json($result);
    }

    public function updateEducation(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateEducation($r);

        return response()->json($result);
    }

    public function deleteEducation($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->deleteEducation($id);

        return response()->json($result);
    }


    public function addOthers(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addOthers($r);

        return response()->json($result);
    }

    public function getOthers($user_id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getOthers($user_id);

        return response()->json($result);
    }

    public function updateOthers(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateOthers($r);

        return response()->json($result);
    }

    public function deleteOthers($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->deleteOthers($id);

        return response()->json($result);
    }



    public function getAddressDetails(Request $request)
    {
        $ps = new ProfileService;

        $result = $ps->getAddressDetails($request->id);

        return response()->json($result);
    }

    public function addAddressDetails(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addAddressDetails($r);

        return response()->json($result);
    }

    public function updateAddressDetails(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateAddressDetails($r);

        return response()->json($result);
    }

    public function deleteAddressDetails($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->deleteAddressDetails($id);

        return response()->json($result);
    }

    public function getAddressforCompanion(Request $request)
    {
        $ps = new ProfileService;

        $userId = Auth::user()->id;
        $addressType = [1, 3];

        $result = $ps->getAddressforCompanion($userId, $addressType);

        return response()->json($result);
    }

    public function deleteCompanion($id = '')
    {
        $ps = new ProfileService;

        $result = $ps->deleteCompanion($id);

        return response()->json($result);
    }


}
