<?php

namespace App\Service;

use App\Exceptions\CustomException;
use App\Models\ActivityLogs;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmploymentType;
use App\Models\JobGrade;
use App\Models\News;
use App\Models\PhoneDirectory;
use App\Models\Policy;
use App\Models\Role;
use App\Models\SOP;
use App\Models\Subscription;
use App\Models\TypeOfLogs;
use App\Models\Unit;
use App\Models\Users;
use App\Models\UsersDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingService
{

    public function getRole()
    {
        $data = [];
        $data['data'] = Role::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success get roles';

        return $data;
    }

    public function createRole($r)
    {
        $input = $r->input();
        $user = Auth::user();

        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = $user->username;
        $input['addedTime'] = date('Y-m-d h:m:s');
        Role::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create role';

        return $data;
    }

    public function updateRole($r, $id)
    {
        $input = $r->input();

        $user = Auth::user();
        unset($input['id']);

        $input['modifiedBy'] = $user->username;
        $input['modifiedTime'] = date('Y-m-d h:m:s');

        Role::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update role';

        return $data;
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);

        if (!$role) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'role not found';
        } else {
            $role->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Role';
        }

        return $data;
    }

    public function getCompany()
    {
        $data = [];
        $data['data'] = Company::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success get roles';

        return $data;
    }

    public function createCompany($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = Company::where('companyCode', $input['companyCode'])->first();
        if ($etData) {
            $data['msg'] = 'Company code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $user = Auth::user();
        $input['addedBy'] = $user->username;
        $input['tenant_id'] = Auth::user()->tenant_id;

        Company::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create company';

        return $data;
    }

    public function updateCompany($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('d-m-y h:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Company::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);

        if (!$company) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'company not found';
        } else {
            $company->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete company';
        }

        return $data;
    }

    public function getDepartment()
    {
        $data = [];
        $data['data'] = Department::with('company')->get();
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success get department';

        return $data;
    }

    public function createDepartment($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = Department::where('departmentCode', $input['departmentCode'])->first();
        if ($etData) {
            $data['msg'] = 'Department code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }
        $user = Auth::user();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = $user->username;

        Department::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create department';

        return $data;
    }

    public function updateDepartment($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('d-m-y h:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Department::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update department';

        return $data;
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);

        if (!$department) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'department not found';
        } else {
            $department->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete department';
        }

        return $data;
    }

    public function getUnit()
    {
        $data = [];
        $data['data'] = Unit::with('company')->get();

        $data['msg'] = 'Success get unit';

        return $data;
    }

    public function createUnit($r)
    {
        $input = $r->input();


        date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = Unit::where('unitCode', $input['unitCode'])->first();
        if ($etData) {
            $data['msg'] = 'Unit code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }
        $user = Auth::user();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = $user->username;

        Unit::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create unit';

        return $data;
    }

    public function updateUnit($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('d-m-y h:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Unit::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update unit';

        return $data;
    }

    public function deleteUnit($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'unit not found';
        } else {
            $unit->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
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

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = Branch::where('branchName', $input['branchName'])->first();
        if ($etData) {
            $data['msg'] = 'Branch name already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $user = Auth::user();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = $user->username;

        Branch::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Branch';

        return $data;
    }

    public function updateBranch($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('d-m-y h:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Branch::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Branch';

        return $data;
    }

    public function deleteBranch($id)
    {
        $Branch = Branch::find($id);

        if (!$Branch) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Branch not found';
        } else {
            $Branch->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Branch';
        }

        return $data;
    }

    public function getJobGrade()
    {
        $data = [];
        $data['data'] = JobGrade::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = true;
        $data['msg'] = 'Success get Job Grade';

        return $data;
    }

    public function createJobGrade($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = JobGrade::where('jobGradeCode', $input['jobGradeCode'])->first();
        if ($etData) {
            $data['msg'] = 'Code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $user = Auth::user();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = $user->username;

        JobGrade::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Job Grade';

        return $data;
    }

    public function updateJobGrade($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('d-m-y h:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;
        JobGrade::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Job Grade';

        return $data;
    }

    public function deleteJobGrade($id)
    {
        $JobGrade = JobGrade::find($id);

        if (!$JobGrade) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Job Grade not found';
        } else {
            $JobGrade->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Job Grade';
        }

        return $data;
    }

    public function getDesignation()
    {
        $data = [];
        $data['data'] = Designation::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = true;
        $data['msg'] = 'Success get Designation';

        return $data;
    }

    public function createDesignation($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = Designation::where('designationCode', $input['designationCode'])->first();
        if ($etData) {
            $data['msg'] = 'Code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $user = Auth::user();
        $input['addedBy'] = $user->username;
        $input['tenant_id'] = Auth::user()->tenant_id;
        Designation::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Designation';

        return $data;
    }

    public function updateDesignation($r, $id)
    {
        $input = $r->input();
        $user = Auth::user();
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('d-m-y h:i:s');
        $input['modifiedBy'] = $user->username;
        Designation::where('id', $id)->update($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Designation';

        return $data;
    }

    public function deleteDesignation($id)
    {
        $Designation = Designation::find($id);

        if (!$Designation) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Designation not found';
        } else {
            $Designation->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Designation';
        }

        return $data;
    }

    public function getSOP()
    {
        $data = [];
        $data['data'] = SOP::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = true;
        $data['msg'] = 'Success get SOP';

        return $data;
    }

    public function createSOP($r)
    {
        $input = $r->input();
        $user = Auth::user();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $sopData = SOP::where('SOPCode', $input['SOPCode'])->first();

        if ($sopData) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'SOP code already exist';

            return $data;
        }
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = $user->username;
        SOP::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create SOP';

        return $data;
    }

    public function updateSOP($r, $id)
    {
        $input = $r->input();
        $user = Auth::user();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $input['modifiedBy'] = $user->username;
        $input['modified_at'] = date('d-m-y h:i:s');
        SOP::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update SOP';

        return $data;
    }

    public function deleteSOP($id)
    {
        $SOP = SOP::find($id);

        if (!$SOP) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'SOP not found';
        } else {
            $SOP->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete SOP';
        }

        return $data;
    }

    public function getPolicy()
    {
        $data = [];
        $data['data'] = Policy::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success get Policy';

        return $data;
    }

    public function createPolicy($r)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }
        $user = Auth::user();
        $input['addedBy'] = $user->username;
        $input['tenant_id'] = $user->tenant_id;

        Policy::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Policy';

        return $data;
    }

    public function updatePolicy($r, $id)
    {
        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Policy::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Policy';

        return $data;
    }

    public function deletePolicy($id)
    {
        $Policy = Policy::find($id);

        if (!$Policy) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Policy not found';
        } else {
            $Policy->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Policy';
        }

        return $data;
    }

    public function getNews()
    {
        $data = [];
        $data['data'] = News::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success get News';

        return $data;
    }

    public function createNews($r)
    {
        $input = $r->input();
        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $newsData = News::where('title', $input['title'])->first();
        if ($newsData) {
            $data['msg'] = 'Title already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $user = Auth::user();
        $input['tenant_id'] = $user->tenant_id;
        $input['addedBy'] = $user->username;

        News::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create News';

        return $data;
    }

    public function updateNews($r, $id)
    {

        $input = $r->input();

        if ($_FILES['file']['name']) {
            $payslip = upload($r->file('file'));
            $input['file'] = $payslip['filename'];

            if (!$input['file']) {
                unset($input['file']);
            }
        }

        $user = Auth::user();
        $input['modifiedBy'] = $user->username;
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $input['modified_at'] = date('d-m-y h:i:s');

        News::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update News';

        return $data;
    }

    public function deleteNews($id)
    {
        $News = News::find($id);

        if (!$News) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'News not found';
        } else {
            $News->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete News';
        }

        return $data;
    }

    public function getEmploymentType()
    {
        $data = [];
        $data['data'] = EmploymentType::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success get EmploymentType';

        return $data;
    }

    public function createEmploymentType($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = EmploymentType::where('type', $input['type'])->first();
        if ($etData) {
            $data['msg'] = 'Type already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $user = Auth::user();
        $input['addedBy'] = $user->username;
        $input['tenant_id'] = $user->tenant_id;

        EmploymentType::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create EmploymentType';

        return $data;
    }

    public function updateEmploymentType($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $user = Auth::user();
        $input['modified_at'] = date('d-m-y h:i:s');
        $input['modifiedBy'] = $user->username;

        EmploymentType::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update EmploymentType';

        return $data;
    }

    public function deleteEmploymentType($id)
    {
        $EmploymentType = EmploymentType::find($id);

        if (!$EmploymentType) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'EmploymentType not found';
        } else {
            $EmploymentType->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete EmploymentType';
        }

        return $data;
    }

    public function roleView()
    {
        $data['roles'] = Role::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function companyView()
    {
        $data['companies'] = Company::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function branchView()
    {
        $data['branchs'] = DB::table('branch as a')
            ->leftJoin('unit as b', 'a.unitId', '=', 'b.id')
            ->select('a.*', 'b.unitName')
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();

        return $data;
    }

    public function unitView()
    {
        $data['units'] = DB::table('unit as a')
            ->leftJoin('department as b', 'a.departmentId', '=', 'b.id')
            ->select('a.*', 'b.departmentCode', 'b.departmentName')
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();

        return $data;
    }

    public function departmentView()
    {
        $data['departments'] = DB::table('department as a')
            ->leftJoin('company as b', 'a.companyId', '=', 'b.id')
            ->select('a.*', 'b.companyName', 'b.companyCode')
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();

        return $data;
    }

    public function sopView()
    {
        $data['SOPs'] = SOP::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['policys'] = Policy::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function jobGradeView()
    {
        $data['jobGrades'] = JobGrade::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function designationView()
    {
        $data['designations'] = Designation::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function newsView()
    {
        $data['news'] = News::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function employmentTypeView()
    {
        $data['employmentTypes'] = EmploymentType::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function getRoleById($id)
    {
        $data = Role::find($id);

        return $data;
    }

    public function getCompanyById($id)
    {
        $data = Company::find($id);

        return $data;
    }

    public function getDepartmentById($id)
    {
        $data = Department::find($id);

        return $data;
    }

    public function getUnitById($id)
    {
        $data = Unit::find($id);

        return $data;
    }

    public function getBranchById($id)
    {
        $data = Branch::find($id);

        return $data;
    }

    public function getJobGradeById($id)
    {
        $data = JobGrade::find($id);

        return $data;
    }

    public function getDesignationById($id)
    {
        $data = Designation::find($id);

        return $data;
    }

    public function getPolicyById($id)
    {
        $data = Policy::find($id);

        return $data;
    }

    public function getSOPById($id)
    {
        $data = SOP::find($id);

        return $data;
    }

    public function getNewsById($id)
    {
        $data = News::find($id);

        return $data;
    }

    public function getEmploymentTypeById($id)
    {
        $data = EmploymentType::find($id);

        return $data;
    }

    public function getTypeOfLogsView()
    {
        $data = [];
        // $data['data'] = TypeOfLogs::where('tenant_id', Auth::user()->tenant_id)->get();
        $data = DB::table('type_of_logs as a')
        ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
        ->leftJoin('activity_logs as c', 'a.id', '=', 'c.logs_id')
        ->leftJoin('department as d', 'a.department', '=', 'd.id')
        ->select('a.*', 'b.project_name', 'd.departmentName')
        ->where('a.tenant_id', Auth::user()->tenant_id)
        ->get();
        // pr($data);
        return $data;
    }

    public function createTypeOfLogs($r)
    {
        $input = $r->input();
        $user = Auth::user();

        if(isset($input['project_id']))
        {
            $logsData['project_id'] = $input['project_id'];
        }
        $logsData['department'] = $input['department'];
        $logsData['type_of_log'] = $input['type_of_log'];
        $logsData['tenant_id'] = $user->tenant_id;
        // $logsData['activity_name'] = implode(', ', $input['activity_name']);
        // pr($input);

        TypeOfLogs::create($logsData);

        $typeOfLog = TypeOfLogs::orderby('created_at', 'desc')->first();

        if (isset($input['activity_name'])) {

            foreach ($input['activity_name'] as $activity) {
                $activityData['department'] = $input['department'];
                $activityData['activity_name'] = $activity;
                $activityData['project_id'] = $input['project_id'];
                $activityData['logs_id'] = $typeOfLog->id;
                $activityData['tenant_id'] = $user->tenant_id;

                ActivityLogs::create($activityData);
            }
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create type of logs';

        return $data;
    }

    public function updateTypeOfLogs($r, $id)
    {
        $input = $r->input();
        $user = Auth::user();

        if(isset($input['project_id']))
        {
            $logsData['project_id'] = $input['project_id'];
        }

        if($input['type_of_log'] == 'Non-Project')
        {
            $logsData['project_id'] = null;
        }

        $logsData['department'] = $input['department'];
        $logsData['type_of_log'] = $input['type_of_log'];
        $logsData['tenant_id'] = $user->tenant_id;
        $logsData['activity_name'] = implode(', ', $input['activity_name']);

        TypeOfLogs::where('id', $id)->update($logsData);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update role';

        return $data;
    }

    public function deleteTypeOfLogs($id)
    {
        $logs = TypeOfLogs::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'logs not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete log';
        }

        return $data;
    }

    public function getLogsById($id)
    {
        $data = TypeOfLogs::find($id);

        return $data;
    }
}
