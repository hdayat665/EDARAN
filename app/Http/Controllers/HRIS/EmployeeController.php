<?php

namespace App\Http\Controllers\HRIS;

use App\Service\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function addProfile(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addProfile($r);

        return response()->json($result);
    }

    public function addAddress(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addAddress($r);

        return response()->json($result);
    }

    public function addEmployment(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployment($r);

        return response()->json($result);
    }

    public function getEmployee()
    {
        $ps = new EmployeeService;

        $result = $ps->getEmployee();

        return response()->json($result);
    }

    public function terminateEmployment(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->terminateEmployment($r);

        return response()->json($result);
    }

    public function employeeInfoView()
    {
        $ps = new EmployeeService;

        $data['employeeInfos'] = $ps->getEmployeeInfo()['data'];

        return view('pages.HRIS.employeeInfo',$data);
    }

    public function registerEmployeeView()
    {
        // $ps = new EmployeeService;

        // $data['employeeInfos'] = $ps->getEmployeeInfo()['data'];

        return view('pages.HRIS.registerEmployee');
    }
}
