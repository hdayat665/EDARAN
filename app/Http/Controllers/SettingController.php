<?php

namespace App\Http\Controllers;

use App\Service\SettingService;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function getRole()
    {
        $ss = new SettingService;

        $result = $ss->getRole();

        return response()->json($result);
    }

    public function createRole(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createRole($r);

        return response()->json($result);
    }

    public function updateRole(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateRole($r, $id);

        return response()->json($result);
    }

    public function deleteRole($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteRole($id);

        return response()->json($result);
    }

    public function getCompany()
    {
        $ss = new SettingService;

        $result = $ss->getCompany();

        return response()->json($result);
    }

    public function createCompany(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createCompany($r);

        return response()->json($result);
    }

    public function updateCompany(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateCompany($r, $id);

        return response()->json($result);
    }

    public function deleteCompany($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteCompany($id);

        return response()->json($result);
    }

    public function getDepartment()
    {
        $ss = new SettingService;

        $result = $ss->getDepartment();

        return response()->json($result);
    }

    public function createDepartment(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createDepartment($r);

        return response()->json($result);
    }

    public function updateDepartment(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateDepartment($r, $id);

        return response()->json($result);
    }

    public function deleteDepartment($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteDepartment($id);

        return response()->json($result);
    }

    public function getUnit()
    {
        $ss = new SettingService;

        $result = $ss->getUnit();

        return response()->json($result);
    }

    public function createUnit(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createUnit($r);

        return response()->json($result);
    }

    public function updateUnit(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateUnit($r, $id);

        return response()->json($result);
    }

    public function deleteUnit($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteUnit($id);

        return response()->json($result);
    }

    public function getBranch()
    {
        $ss = new SettingService;

        $result = $ss->getBranch();

        return response()->json($result);
    }

    public function createBranch(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createBranch($r);

        return response()->json($result);
    }

    public function updateBranch(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateBranch($r, $id);

        return response()->json($result);
    }

    public function deleteBranch($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteBranch($id);

        return response()->json($result);
    }

    public function getJobGrade()
    {
        $ss = new SettingService;

        $result = $ss->getJobGrade();

        return response()->json($result);
    }

    public function createJobGrade(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createJobGrade($r);

        return response()->json($result);
    }

    public function updateJobGrade(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateJobGrade($r, $id);

        return response()->json($result);
    }

    public function deleteJobGrade($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteJobGrade($id);

        return response()->json($result);
    }

    public function getDesignation()
    {
        $ss = new SettingService;

        $result = $ss->getDesignation();

        return response()->json($result);
    }

    public function createDesignation(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createDesignation($r);

        return response()->json($result);
    }

    public function updateDesignation(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateDesignation($r, $id);

        return response()->json($result);
    }

    public function deleteDesignation($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteDesignation($id);

        return response()->json($result);
    }

    public function getSOP()
    {
        $ss = new SettingService;

        $result = $ss->getSOP();

        return response()->json($result);
    }

    public function createSOP(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createSOP($r);

        return response()->json($result);
    }

    public function updateSOP(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updateSOP($r, $id);

        return response()->json($result);
    }

    public function deleteSOP($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteSOP($id);

        return response()->json($result);
    }

    public function getPolicy()
    {
        $ss = new SettingService;

        $result = $ss->getPolicy();

        return response()->json($result);
    }

    public function createPolicy(Request $r)
    {
        $ss = new SettingService;

        $result = $ss->createPolicy($r);

        return response()->json($result);
    }

    public function updatePolicy(Request $r, $id)
    {
        $ss = new SettingService;

        $result = $ss->updatePolicy($r, $id);

        return response()->json($result);
    }

    public function deletePolicy($id)
    {
        $ss = new SettingService;

        $result = $ss->deletePolicy($id);

        return response()->json($result);
    }

    public function getNews()
    {
        $ss = new SettingService;

        $result = $ss->getNews();

        return response()->json($result);
    }

    public function createNews(Request $r)
    {
        $ss = new SettingService;

        $input['fileUpload'] = upload($r,'fileUpload');

        $result = $ss->createNews($r);

        return response()->json($result);
    }

    public function updateNews(Request $r, $id)
    {
        $ss = new SettingService;

        $input['fileUpload'] = upload($r,'fileUpload');

        $result = $ss->updateNews($r, $id);

        return response()->json($result);
    }

    public function deleteNews($id)
    {
        $ss = new SettingService;

        $result = $ss->deleteNews($id);

        return response()->json($result);
    }

    public function settingView()
    {
        return view('pages.setting.dashboard');
    }

    public function branchView()
    {
        return view('pages.setting.branch');
    }

    public function companyView()
    {
        return view('pages.setting.company');
    }

    public function departmentView()
    {
        return view('pages.setting.department');
    }

    public function designationView()
    {
        return view('pages.setting.designation');
    }

    public function jobGradeView()
    {
        return view('pages.setting.jobGrade');
    }

    public function newsView()
    {
        return view('pages.setting.news');
    }

    public function roleView()
    {
        return view('pages.setting.role');
    }

    public function sopView()
    {
        return view('pages.setting.sop');
    }

    public function unitView()
    {
        return view('pages.setting.unit');
    }

}
