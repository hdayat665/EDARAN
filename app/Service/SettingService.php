<?php

namespace App\Service;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\JobGrade;
use App\Models\PhoneDirectory;
use App\Models\Policy;
use App\Models\Role;
use App\Models\SOP;
use App\Models\Subscription;
use App\Models\Unit;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingService
{

    public function getRole()
    {
        $data = [];
        $data['data'] = Role::all();
        $data['status'] = true;
        $data['msg'] = 'Success get roles';

        return $data;
    }

    public function createRole($r)
    {
        $input = $r->input();

        Role::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create role';

        return $data;
    }

    public function updateRole($r, $id)
    {
        $input = $r->input();

        Role::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update role';

        return $data;
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);

        if (!$role) {
            $data['status'] = 404;
            $data['msg'] = 'role not found';
        }else{
            $role->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete Role';
        }

        return $data;
    }

    public function getCompany()
    {
        $data = [];
        $data['data'] = Company::all();
        $data['status'] = true;
        $data['msg'] = 'Success get roles';

        return $data;
    }

    public function createCompany($r)
    {
        $input = $r->input();

        Company::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create role';

        return $data;
    }

    public function updateCompany($r, $id)
    {
        $input = $r->input();

        Company::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update role';

        return $data;
    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);

        if (!$company) {
            $data['status'] = 404;
            $data['msg'] = 'company not found';
        }else{
            $company->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete company';
        }

        return $data;
    }

    public function getDepartment()
    {
        $data = [];
        $data['data'] = Department::with('company')->get();
        $data['status'] = true;
        $data['msg'] = 'Success get department';

        return $data;
    }

    public function createDepartment($r)
    {
        $input = $r->input();

        Department::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create department';

        return $data;
    }

    public function updateDepartment($r, $id)
    {
        $input = $r->input();

        Department::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update department';

        return $data;
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);

        if (!$department) {
            $data['status'] = 404;
            $data['msg'] = 'department not found';
        }else{
            $department->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete department';
        }

        return $data;
    }

    public function getUnit()
    {
        $data = [];
        $data['data'] = Unit::with('company')->get();
        $data['status'] = true;
        $data['msg'] = 'Success get unit';

        return $data;
    }

    public function createUnit($r)
    {
        $input = $r->input();

        Unit::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create unit';

        return $data;
    }

    public function updateUnit($r, $id)
    {
        $input = $r->input();

        Unit::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update unit';

        return $data;
    }

    public function deleteUnit($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            $data['status'] = 404;
            $data['msg'] = 'unit not found';
        }else{
            $unit->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete unit';
        }

        return $data;
    }

    public function getBranch()
    {
        $data = [];
        $data['data'] = Branch::with('unit')->get();
        $data['status'] = true;
        $data['msg'] = 'Success get Branch';

        return $data;
    }

    public function createBranch($r)
    {
        $input = $r->input();

        Branch::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create Branch';

        return $data;
    }

    public function updateBranch($r, $id)
    {
        $input = $r->input();

        Branch::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update Branch';

        return $data;
    }

    public function deleteBranch($id)
    {
        $Branch = Branch::find($id);

        if (!$Branch) {
            $data['status'] = 404;
            $data['msg'] = 'Branch not found';
        }else{
            $Branch->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete Branch';
        }

        return $data;
    }

    public function getJobGrade()
    {
        $data = [];
        $data['data'] = JobGrade::all();
        $data['status'] = true;
        $data['msg'] = 'Success get Job Grade';

        return $data;
    }

    public function createJobGrade($r)
    {
        $input = $r->input();

        JobGrade::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create Job Grade';

        return $data;
    }

    public function updateJobGrade($r, $id)
    {
        $input = $r->input();

        JobGrade::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update Job Grade';

        return $data;
    }

    public function deleteJobGrade($id)
    {
        $JobGrade = JobGrade::find($id);

        if (!$JobGrade) {
            $data['status'] = 404;
            $data['msg'] = 'Job Grade not found';
        }else{
            $JobGrade->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete Job Grade';
        }

        return $data;
    }

    public function getDesignation()
    {
        $data = [];
        $data['data'] = Designation::all();
        $data['status'] = true;
        $data['msg'] = 'Success get Designation';

        return $data;
    }

    public function createDesignation($r)
    {
        $input = $r->input();

        Designation::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create Designation';

        return $data;
    }

    public function updateDesignation($r, $id)
    {
        $input = $r->input();

        Designation::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update Designation';

        return $data;
    }

    public function deleteDesignation($id)
    {
        $Designation = Designation::find($id);

        if (!$Designation) {
            $data['status'] = 404;
            $data['msg'] = 'Designation not found';
        }else{
            $Designation->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete Designation';
        }

        return $data;
    }

    public function getSOP()
    {
        $data = [];
        $data['data'] = SOP::all();
        $data['status'] = true;
        $data['msg'] = 'Success get SOP';

        return $data;
    }

    public function createSOP($r)
    {
        $input = $r->input();

        SOP::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create SOP';

        return $data;
    }

    public function updateSOP($r, $id)
    {
        $input = $r->input();

        SOP::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update SOP';

        return $data;
    }

    public function deleteSOP($id)
    {
        $SOP = SOP::find($id);

        if (!$SOP) {
            $data['status'] = 404;
            $data['msg'] = 'SOP not found';
        }else{
            $SOP->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete SOP';
        }

        return $data;
    }

    public function getPolicy()
    {
        $data = [];
        $data['data'] = Policy::all();
        $data['status'] = true;
        $data['msg'] = 'Success get Policy';

        return $data;
    }

    public function createPolicy($r)
    {
        $input = $r->input();

        Policy::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create Policy';

        return $data;
    }

    public function updatePolicy($r, $id)
    {
        $input = $r->input();

        Policy::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update Policy';

        return $data;
    }

    public function deletePolicy($id)
    {
        $Policy = Policy::find($id);

        if (!$Policy) {
            $data['status'] = 404;
            $data['msg'] = 'Policy not found';
        }else{
            $Policy->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete Policy';
        }

        return $data;
    }

    public function getNews()
    {
        $data = [];
        $data['data'] = News::all();
        $data['status'] = true;
        $data['msg'] = 'Success get News';

        return $data;
    }

    public function createNews($r)
    {
        $input = $r->input();

        if ($input['fileUpload']) {
            $input['fileUpload'] = $input['fileUpload']['filename'];
        }

        News::create($input);

        $data['status'] = true;
        $data['msg'] = 'Success create News';

        return $data;
    }

    public function updateNews($r, $id)
    {
        $input = $r->input();

        if ($input['fileUpload']) {
            $input['fileUpload'] = $input['fileUpload']['filename'];
        }

        News::where('id', $id)->update($input);

        $data['status'] = true;
        $data['msg'] = 'Success update News';

        return $data;
    }

    public function deleteNews($id)
    {
        $News = News::find($id);

        if (!$News) {
            $data['status'] = 404;
            $data['msg'] = 'News not found';
        }else{
            $News->delete();

            $data['status'] = 200;
            $data['msg'] = 'Success delete News';
        }

        return $data;
    }

}
