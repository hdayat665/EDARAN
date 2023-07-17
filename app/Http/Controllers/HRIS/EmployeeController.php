<?php

namespace App\Http\Controllers\HRIS;

use App\Service\EmployeeService;
use App\Service\LoginService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function updateProfile_Picture(Request $r, $id)
    {
        $ps = new EmployeeService;

        $result = $ps->updateProfile_Picture($r, $id);

        return response()->json($result);
    }
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
    public function cancelTerminateEmployment($id)
    {
        $ss = new EmployeeService;

        $result = $ss->cancelTerminateEmployment($id);

        return response()->json($result);
    }

    public function employeeInfoView()
    {
        $ps = new EmployeeService;

        $data['employeeInfos'] = $ps->getEmployeeInfo()['data'];

        return view('pages.HRIS.employee.employeeInfo', $data);
    }

    public function registerEmployeeView()
    {
        // $ps = new EmployeeService;

        // $data['employeeInfos'] = $ps->getEmployeeInfo()['data'];

        return view('pages.HRIS.employee.registerEmployee');
    }

    public function editEmployeeView($user_id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->editEmployeeData($user_id);
        return view('pages.HRIS.employee.employeeEdit', $result);
    }

    public function updateEmployeeProfile(Request $r)
    {
        $input = $r->input();

        $ps = new EmployeeService;

        $result = $ps->updateEmployeeProfile($input);

        return response()->json($result);
    }

    public function updateEmployeeAddress(Request $r)
    {
        $input = $r->input();

        $ps = new EmployeeService;

        $result = $ps->updateEmployeeAddress($input);

        return response()->json($result);
    }

    public function updateEmployeeEmergency(Request $r)
    {
        $input = $r->input();

        $ps = new EmployeeService;

        $result = $ps->updateEmployeeEmergency($input);

        return response()->json($result);
    }

    public function updateEmployeeCompanion(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateEmployeeCompanion($r);

        return response()->json($result);
    }

    public function addEmployeeCompanion(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployeeCompanion($r);

        return response()->json($result);
    }

    public function addEmployeeChildren(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployeeChildren($r);

        return response()->json($result);
    }

    public function updateEmployeeChildren(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateEmployeeChildren($r);

        return response()->json($result);
    }

    public function getSibling($user_id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->getSibling($user_id);

        return response()->json($result);
    }

    public function getParent($user_id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->getParentByUserId($user_id);

        return response()->json($result);
    }

    public function addEmployeeSibling(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployeeSibling($r);

        return response()->json($result);
    }

    public function updateEmployeeSibling(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateEmployeeSibling($r);

        return response()->json($result);
    }

    public function addEmployeeParent(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployeeParent($r);

        return response()->json($result);
    }

    public function getEmployeeAddressforParent($id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->getEmployeeAddressforParent($id);

        return response()->json($result);
    }


    public function updateEmployeeParent(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateEmployeeParent($r);

        return response()->json($result);
    }

    public function updateEmployee(Request $r)
    {
        $ps = new EmployeeService;

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
        $ps = new EmployeeService;

        $result = $ps->addVehicle($r);

        return response()->json($result);
    }

    public function updateVehicle(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateVehicle($r);

        return response()->json($result);
    }

    public function deleteVehicle($id)
    {
        $ps = new EmployeeService;

        $result = $ps->deleteVehicle($id);

        return response()->json($result);
    }

    public function getEmployeeById($id)
    {
        $ps = new EmployeeService;

        $result = $ps->getEmployeeById($id);

        return response()->json($result);
    }

    public function getEmployeeByDepartmentId($department_id)
    {
        $ps = new EmployeeService;

        $result = $ps->getEmployeeByDepartmentId($department_id);

        return response()->json($result);
    }
    ////
    public function updateclaimhierarchy(Request $r, $id)
    {
        $ss = new EmployeeService;

        $result = $ss->updateclaimhierarchy($r, $id);

        return response()->json($result);
    }
    public function updatecashhierarchy(Request $r, $id)
    {
        $ss = new EmployeeService;

        $result = $ss->updatecashhierarchy($r, $id);

        return response()->json($result);
    }
    public function updateeleavehierarchy(Request $r, $id)
    {
        $ss = new EmployeeService;

        $result = $ss->updateeleavehierarchy($r, $id);

        return response()->json($result);
    }

    public function updatetimehierarchy(Request $r, $id)
    {
        $ss = new EmployeeService;

        $result = $ss->updatetimehierarchy($r, $id);

        return response()->json($result);
    }

    public function updatetimehierarchy2(Request $r, $id)
    {
        $ss = new EmployeeService;

        $result = $ss->updatetimehierarchy2($r, $id);

        return response()->json($result);
    }



    public function addEmployeeEducation(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployeeEducation($r);

        return response()->json($result);
    }

    public function getEmployeeEducation($user_id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->$this->getEmployeeEducation($user_id);

        return response()->json($result);
    }

     public function getEmployeeEducationById($id = '')
     {
        $ps = new EmployeeService;

        $result = $ps->getEmployeeEducation($id);
        $result = $ps->getEmployeeEducation($id);

        return response()->json($result);
    }


    public function updateEmployeeEducation(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateEmployeeEducation($r);

        return response()->json($result);
    }

    public function deleteEmployeeEducation($id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->deleteEmployeeEducation($id);

        return response()->json($result);
    }


    public function addEmployeeOthers(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployeeOthers($r);

        return response()->json($result);
    }

    public function getEmployeeOthers($id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->getEmployeeOthers($id);

        return response()->json($result);
    }

    public function updateEmployeeOthers(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateEmployeeOthers($r);

        return response()->json($result);
    }

    public function deleteEmployeeOthers($id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->deleteEmployeeOthers($id);

        return response()->json($result);
    }


    public function getEmployeeAddressDetails($user_id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->getEmployeeAddressDetails($user_id);

        return response()->json($result);
    }

    public function addEmployeeAddressDetails(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployeeAddressDetails($r);

        return response()->json($result);
    }

    public function updateEmployeeAddressDetails(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->updateEmployeeAddressDetails($r);

        return response()->json($result);
    }

    public function deleteEmployeeAddressDetails($id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->deleteEmployeeAddressDetails($id);

        return response()->json($result);
    }

    public function getEmployeeAddressforCompanion($id = '')
    {
        $ps = new EmployeeService;

        $result = $ps->getEmployeeAddressforCompanion($id);

        return response()->json($result);
    }


    public function updateAddressType(Request $r)
    {
        $ps = new EmployeeService;

            $result = $ps->updateAddressType($r);

            return response()->json($result);
    }

}
