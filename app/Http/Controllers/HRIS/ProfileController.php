<?php

namespace App\Http\Controllers\HRIS;

use App\Models\UsersDetails;
use App\Service\LoginService;
use App\Service\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

    public function updateProfilePicture(Request $r)
    {
        $input = $r->input();

        $input['uploadFile'] = upload($r, 'uploadFile');

        $ps = new ProfileService;

        $result = $ps->updateData($input);

        return response()->json($result['msg']);
    }

    public function updateMyProfile(Request $r)
    {
        $input = $r->input();

        $ps = new ProfileService;

        $result = $ps->updateMyProfile($input);

        return response()->json($result['msg']);
    }

    public function updateAddress(Request $r)
    {
        $input = $r->input();

        $ps = new ProfileService;

        $result = $ps->updateAddress($input);

        return response()->json($result['msg']);
    }

    public function updateEmergency(Request $r)
    {
        $input = $r->input();

        $ps = new ProfileService;

        $result = $ps->updateEmergency($input);

        return response()->json($result['msg']);
    }

    public function updateCompanion(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateCompanion($r);

        return response()->json($result['msg']);
    }

    public function updateChildren(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateChildren($r);

        return response()->json($result['msg']);
    }

    public function getSibling()
    {
        $ps = new ProfileService;

        $result = $ps->getSibling();

        return response()->json($result);
    }

    public function getParent($user_id = '')
    {
        $ps = new ProfileService;

        $result = $ps->getParent($user_id);

        return response()->json($result);
    }

    public function addSibling(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addSibling($r);

        return response()->json($result['msg']);
    }

    public function addParent(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addParent($r);

        return response()->json($result['msg']);
    }

    public function updateEmployee(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateEmployee($r);

        return response()->json($result['msg']);
    }

    public function updatePass(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService;

        $result = $ls->resetPassword($input);

        return response()->json($result['msg']);
    }

    public function addVehicle(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->addVehicle($r);

        return response()->json($result['msg']);
    }

    public function updateVehicle(Request $r)
    {
        $ps = new ProfileService;

        $result = $ps->updateVehicle($r);

        return response()->json($result['msg']);
    }

    public function deleteVehicle($id)
    {
        $ps = new ProfileService;

        $result = $ps->deleteVehicle($id);

        return response()->json($result['msg']);
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

        return response()->json($result['msg']);
    }

    public function getVehicle()
    {
        $ps = new ProfileService;

        $result = $ps->getVehicle();

        return response()->json($result);
    }
}
