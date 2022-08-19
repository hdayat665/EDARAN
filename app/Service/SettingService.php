<?php

namespace App\Service;

use App\Models\Company;
use App\Models\Department;
use App\Models\Role;
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
}
