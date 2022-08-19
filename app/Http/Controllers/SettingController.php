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

}
