<?php

namespace App\Service;

use App\Models\ActivityLogs;
use App\Models\ApprovelRoleGeneral;
use App\Models\Branch;
use App\Models\ClaimCategory;
use App\Models\ClaimCategoryContent;
use App\Models\ClaimDateSetting;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\DomainList;
use App\Models\EclaimGeneral;
use App\Models\EmploymentType;
use App\Models\EntitleGroup;
use App\Models\JobGrade;
use App\Models\News;
use App\Models\Policy;
use App\Models\Role;
use App\Models\SOP;
use App\Models\TransportMillage;
use App\Models\TypeOfLogs;
use App\Models\Unit;
use App\Models\leaveEntitlementModel;
use App\Models\UserProfile;
use App\Models\holidayModel;
use App\Models\leavetypesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
        $etData = Company::where([['companyCode', $input['companyCode']], ['tenant_id', Auth::user()->tenant_id]])->first();
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

        $input['modified_at'] = date('Y-m-d H:i:s');
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
        $etData = Department::where([['departmentCode', $input['departmentCode']], ['tenant_id', Auth::user()->tenant_id]])->first();
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

        $input['modified_at'] = date('Y-m-d H:i:s');
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
        $etData = Unit::where([['unitCode', $input['unitCode']], ['tenant_id', Auth::user()->tenant_id]])->first();
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

        $input['modified_at'] = date('Y-m-d H:i:s');
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
        $etData = Branch::where([['branchName', $input['branchName']], ['tenant_id', Auth::user()->tenant_id]])->first();
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

        $input['modified_at'] = date('Y-m-d H:i:s');
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
        $etData = JobGrade::where([['jobGradeCode', $input['jobGradeCode']], ['tenant_id', Auth::user()->tenant_id]])->first();
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

        $input['modified_at'] = date('Y-m-d H:i:s');
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
        $etData = Designation::where([['designationCode', $input['designationCode']], ['tenant_id', Auth::user()->tenant_id]])->first();
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

        $input['modified_at'] = date('Y-m-d H:i:s');
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

        $sopData = SOP::where([['SOPCode', $input['SOPCode']], ['tenant_id', Auth::user()->tenant_id]])->first();

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
        $input['modified_at'] = date('Y-m-d H:i:s');
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
        $newsData = News::where([['title', $input['title']], ['tenant_id', Auth::user()->tenant_id]])->first();
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
        $input['modified_at'] = date('Y-m-d H:i:s');

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
        $etData = EmploymentType::where([['type', $input['type']], ['tenant_id', Auth::user()->tenant_id]])->first();
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
        $data['msg'] = 'Success create Employment Type';

        return $data;
    }

    public function updateEmploymentType($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $user = Auth::user();
        $input['modified_at'] = date('Y-m-d H:i:s');
        $input['modifiedBy'] = $user->username;

        EmploymentType::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Employment Type';

        return $data;
    }

    public function deleteEmploymentType($id)
    {
        $EmploymentType = EmploymentType::find($id);

        if (!$EmploymentType) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Employment Type not found';
        } else {
            $EmploymentType->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Employment Type';
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
            // ->leftJoin('activity_logs as c', 'a.id', '=', 'c.logs_id')
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

        if (isset($input['project_id'])) {
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
        $data['msg'] = 'Successfully create type of logs';

        return $data;
    }

    public function updateTypeOfLogs($r, $id)
    {
        $input = $r->input();
        $user = Auth::user();

        if (isset($input['project_id'])) {
            $logsData['project_id'] = $input['project_id'];
        }

        if ($input['type_of_log'] == 'Non-Project') {
            $logsData['project_id'] = null;
        }

        $logsData['department'] = $input['department'];
        $logsData['type_of_log'] = $input['type_of_log'];
        $logsData['tenant_id'] = $user->tenant_id;
        $logsData['activity_name'] = implode(', ', $input['activity_name']);

        TypeOfLogs::where('id', $id)->update($logsData);

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
        $data['msg'] = 'Success update type of log';

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
            $data['msg'] = 'Successfully delete type of log';
        }

        return $data;
    }

    public function getLogsById($id)
    {
        $data = TypeOfLogs::find($id);

        return $data;
    }

    public function departmentByCompanyId($id = '')
    {
        $data = Department::where([['tenant_id', Auth::user()->tenant_id], ['companyId', $id]])->get();

        return $data;
    }

    public function unitByDepartmentId($id = '')
    {
        $data = Unit::where([['tenant_id', Auth::user()->tenant_id], ['departmentId', $id]])->get();
        return $data;
    }

    public function branchByUnitId($id = '')
    {
        $data = Branch::where([['tenant_id', Auth::user()->tenant_id], ['unitId', $id]])->get();

        return $data;
    }

    public function getActivityNamesById($id = '')
    {
        $data = ActivityLogs::where([['tenant_id', Auth::user()->tenant_id], ['logs_id', $id]])->get();

        return $data;
    }

    public function eclaimGeneralView()
    {
        $data = EclaimGeneral::where([['tenant_id', Auth::user()->tenant_id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function getEclaimGeneralById($id = '')
    {
        $data = EclaimGeneral::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }

    public function createSubsistance($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $newsData = EclaimGeneral::where([['tenant_id', Auth::user()->tenant_id], ['area_name', $input['area_name']]])->first();
        if ($newsData) {
            $data['msg'] = 'Subsistance already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $user = Auth::user();
        $input['tenant_id'] = $user->tenant_id;
        $input['user_id'] = $user->id;

        EclaimGeneral::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Subsistance';

        return $data;
    }

    public function updateSubsistance($r, $id)
    {

        $input = $r->input();

        // $user = Auth::user();
        // $input['modifiedBy'] = $user->username;
        // date_default_timezone_set("Asia/Kuala_Lumpur");
        // $input['modified_at'] = date('Y-m-d H:i:s');

        EclaimGeneral::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Subsistance';

        return $data;
    }

    public function eclaimCategoryView()
    {
        $data = ClaimCategory::where([['tenant_id', Auth::user()->tenant_id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function createClaimCategory($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $newsData = ClaimCategory::where([['tenant_id', Auth::user()->tenant_id], ['claim_catagory', $input['claim_catagory']]])->first();
        if ($newsData) {
            $data['msg'] = 'Subsistance already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        if ($input['claim_type']) {
            $claimCategory['claim_type'] = implode(',', $input['claim_type']);
        }

        $user = Auth::user();
        $claimCategory['tenant_id'] = $user->tenant_id;
        $claimCategory['user_id'] = $user->id;
        $claimCategory['claim_catagory_code'] = $input['claim_catagory_code'];
        $claimCategory['claim_catagory'] = $input['claim_catagory'];

        ClaimCategory::create($claimCategory);

        $category = ClaimCategory::where('tenant_id', $user->tenant_id)->orderBy('created_at', 'DESC')->first();

        if ($input['content']) {
            foreach ($input['content'] as $content) {
                $dataContent[] = [
                    'content' => $content,
                    'category_id' => $category->id,
                    'label' => $input['label'],
                    'updated_at' => date_format(date_create(date("Y-m-d H:i:s")), "Y-m-d H:i:s"),
                    'created_at' => date_format(date_create(date("Y-m-d H:i:s")), "Y-m-d H:i:s"),
                ];
            }

            ClaimCategoryContent::insert($dataContent);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Claim Category';

        return $data;
    }

    public function updateClaimCategory($r, $id)
    {

        $input = $r->input();

        // $user = Auth::user();
        // $input['modifiedBy'] = $user->username;
        // date_default_timezone_set("Asia/Kuala_Lumpur");
        // $input['modified_at'] = date('Y-m-d H:i:s');
        if ($input['claim_type']) {
            $input['claim_type'] = implode(',', $input['claim_type']);
        }

        ClaimCategory::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Claim Category';

        return $data;
    }

    public function editClaimView($id = '')
    {
        $data = ClaimCategory::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }

    public function deleteClaimCategory($id)
    {
        $logs = ClaimCategory::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Category not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Category';
        }

        return $data;
    }

    public function eclaimEntitleGroupView()
    {
        $data = EntitleGroup::where([['tenant_id', Auth::user()->tenant_id]])->get();

        return $data;
    }

    public function createEntitleGroup($r)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $newsData = EntitleGroup::where([['tenant_id', Auth::user()->tenant_id], ['group_name', $input['group_name']]])->first();
        if ($newsData) {
            $data['msg'] = 'Entitle Group already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $entitleData['group_name'] =  $input['group_name'];
        $entitleData['job_grade'] =  $input['job_grade'];
        $entitleData['local_travel'] =  $input['local_travel'];
        $entitleData['oversea_travel'] =  $input['oversea_travel'];
        $entitleData['local_hotel_allowance'] =  $input['local_hotel_allowance'];
        $entitleData['local_hotel_value'] =  $input['local_hotel_value'];
        $entitleData['lodging_allowance'] =  $input['lodging_allowance'];
        $entitleData['lodging_allowance_value'] =  $input['lodging_allowance_value'];
        $entitleData['breakfast'] =  $input['breakfast'];
        $entitleData['lunch'] =  $input['lunch'];
        $entitleData['dinner'] =  $input['dinner'];

        $entitleData['tenant_id'] = Auth::user()->tenant_id;
        EntitleGroup::create($entitleData);

        $entitle = EntitleGroup::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at')->first();

        if ($input['car_price']) {
            foreach ($input['car_price'] as $key => $data) {
                if ($input['car_price'][$key] || $input['car_km'][$key]) {
                    $car[] = [
                        'price' => $input['car_price'][$key],
                        'km' => $input['car_km'][$key],
                        'type' => 'car',
                        'entitle_id' => $entitle->id,
                        'tenant_id' => Auth::user()->tenant_id,
                        'user_id' => Auth::user()->id,
                    ];
                }
            }
        }

        if ($input['motor_price']) {
            foreach ($input['motor_price'] as $key => $data) {
                if ($input['motor_price'][$key] || $input['motor_km'][$key]) {
                    $motor[] = [
                        'price' => $input['motor_price'][$key],
                        'km' => $input['motor_km'][$key],
                        'type' => 'motor',
                        'entitle_id' => $entitle->id,
                        'tenant_id' => Auth::user()->tenant_id,
                        'user_id' => Auth::user()->id,
                    ];
                }
            }
        }

        TransportMillage::insert($car);
        TransportMillage::insert($motor);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Entitle Group';

        return $data;
    }

    public function eclaimEntitleGroupEditView($id = '')
    {
        $data = EntitleGroup::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }

    public function getTransportMillage($entitle_id = '')
    {
        $data = TransportMillage::where([['tenant_id', Auth::user()->tenant_id], ['entitle_id', $entitle_id]])->get();

        return $data;
    }

    public function updateEntitleGroup($r, $id)
    {

        $input = $r->input();

        if ($input['car_price']) {
            foreach ($input['car_price'] as $key => $data) {
                if ($input['car_price'][$key] || $input['car_km'][$key]) {
                    $car = [
                        'price' => $input['car_price'][$key],
                        'km' => $input['car_km'][$key],
                        'type' => 'car',
                        'id' => $input['car_id'][$key],
                        'tenant_id' => Auth::user()->tenant_id,
                        'user_id' => Auth::user()->id,
                    ];
                    TransportMillage::where('id', $car['id'])->update($car);
                }
            }
        }

        if ($input['motor_price']) {
            foreach ($input['motor_price'] as $key => $data) {
                if ($input['motor_price'][$key] || $input['motor_km'][$key]) {
                    $motor = [
                        'price' => $input['motor_price'][$key],
                        'km' => $input['motor_km'][$key],
                        'type' => 'motor',
                        'id' => $input['motor_id'][$key],
                        'tenant_id' => Auth::user()->tenant_id,
                        'user_id' => Auth::user()->id,
                    ];

                    TransportMillage::where('id', $motor['id'])->update($motor);
                }
            }
        }

        unset($input['car_km']);
        unset($input['car_price']);
        unset($input['motor_km']);
        unset($input['motor_price']);
        unset($input['motor_id']);
        unset($input['car_id']);

        EntitleGroup::where('id', $id)->update($input);

        $result['status'] = config('app.response.success.status');
        $result['type'] = config('app.response.success.type');
        $result['title'] = config('app.response.success.title');
        $result['msg'] = 'Success update Entity Group';

        return $result;
    }

    public function updateStatusEntitleGroup($id, $status)
    {
        $update['status'] = $status;

        EntitleGroup::where('id', $id)->update($update);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
    }

    public function deleteEntitleGroup($id)
    {
        $logs = EntitleGroup::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Category not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Entitle Category';
        }

        return $data;
    }

    public function createGeneralApprover($r)
    {
        $input = $r->input();
        $input['user_id'] = Auth::user()->id;
        $input['tenant_id'] = Auth::user()->tenant_id;

        date_default_timezone_set("Asia/Kuala_Lumpur");

        ApprovelRoleGeneral::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function approvalRoleView()
    {
        $data = ApprovelRoleGeneral::where([['tenant_id', Auth::user()->tenant_id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function createDomainList($r)
    {
        $input = $r->input();
        $input['user_id'] = Auth::user()->id;
        $input['tenant_id'] = Auth::user()->tenant_id;

        DomainList::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function leaveEntitlementView()
    {
        $data['leave'] = leaveEntitlementModel::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function leaveNameStaff()
    {
        $data['nameStaff'] = UserProfile::where('userprofile.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('employment', 'userprofile.user_id', '=', 'employment.user_id')
            ->leftJoin('department', 'employment.department', '=', 'department.id')
            ->select('userprofile.user_id', 'userprofile.fullname', 'department.departmentName')
            ->get();
        return $data;
    }

    public function createLeaveEntitlement($r)
    {
        $input = $r->input();

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = leaveEntitlementModel::where([['id_userprofile', $input['employerName']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'User already exists in list leave.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $data1 = $input['employerName'];
        $data2 = $input['employerName'];
        $data3 = $input['employerName'];
        $data4 = Auth::user()->tenant_id;
        $data5 = $input['lapsed'];

        $input = [
            'id_userprofile' => $data1,
            'id_employment' => $data2,
            'id_department' => $data3,
            'tenant_id' => $data4,
            'lapse' => $data5
        ];

        leaveEntitlementModel::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create company';

        return $data;
    }

    public function getcreateLeaveEntitlement($id)
    {
        $data = leaveEntitlementModel::find($id);

        return $data;
    }

    public function updateleaveEntitlement($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        // $input['modified_at'] = date('Y-m-d H:i:s');
        // $user = Auth::user();
        // $input['modifiedBy'] = $user->username;

        $data1 = $input['CurrentEntitlementBalance'];
        $data2 = $input['SickLeaveEntitlement'];
        $data3 = $input['CarryForward'];
        $data4 = $input['CurrentForwardBalance'];
        $data5 = $input['LapsedDate'];
        $data6 = $input['Lapsed'];


        $input = [
            'current_entitlement_balance' => $data1,
            'sick_leave_entitlement' => $data2,
            'carry_forward' => $data3,
            'carry_forward_balance' => $data4,
            'lapsed_date' => $data5,
            'lapse' => $data6
        ];

        leaveEntitlementModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

    public function holidaylistView()
    {
        $data['holiday'] = holidayModel::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function createholidaylist($r)
    {
        $input = $r->input();

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = holidayModel::where([['holiday_title', $input['holiday_title']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'Title already exists in list holiday.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $data1 = $input['holiday_title'];
        $data2 = $input['start_date'];
        $data3 = $input['end_date'];
        $data4 = $input['annual_date'];
        $data5 = Auth::user()->tenant_id;
        $data6 = 1;

        $input = [
            'holiday_title' => $data1,
            'start_date' => $data2,
            'end_date' => $data3,
            'annual_date' => $data4,
            'tenant_id' => $data5,
            'status' => $data6
        ];

        holidayModel::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create company';

        return $data;
    }

    public function getcreateLeaveholiday($id)
    {
        $data = holidayModel::find($id);

        return $data;
    }

    public function updateLeaveholiday($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $data1 = $input['holidaytitle'];
        $data2 = $input['start_date'];
        $data3 = $input['enddate'];
        $data4 = $input['flexRadioDefault'];


        $input = [
            'holiday_title' => $data1,
            'start_date' => $data2,
            'end_date' => $data3,
            'annual_date' => $data4,
        ];

        holidayModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

    public function deleteLeaveholiday($id)
    {
        $logs = holidayModel::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Leave holiday not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Leave holiday';
        }

        return $data;
    }

    public function updateStatusleaveholiday($id, $status)
    {
        $update['status'] = $status;

        holidayModel::where('id', $id)->update($update);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
    }


    public function leavetypesView()
    {
        $data['types'] = leavetypesModel::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }


    public function createtypes($r)
    {
        $input = $r->input();

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = leavetypesModel::where([['leave_types_code', $input['leave_types_code']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'Title already exists in list holiday.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $data1 = $input['leave_types_code'];
        $data2 = $input['leave_types'];
        $data3 = $input['day'];
        $data5 = Auth::user()->tenant_id;

        $input = [
            'leave_types_code' => $data1,
            'leave_types' => $data2,
            'day' => $data3,
            'tenant_id' => $data5
        ];

        leavetypesModel::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create company';

        return $data;
    }

    public function getcreateLeavetypes($id)
    {
        $data = leavetypesModel::find($id);

        return $data;
    }


    public function updateLeaveleavetypes($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $data1 = $input['leavetypescode'];
        $data2 = $input['leavetypes'];
        $data3 = $input['day'];


        $input = [
            'leave_types_code' => $data1,
            'leave_types' => $data2,
            'day' => $data3,
        ];

        leavetypesModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

    public function deleteLeavetypes($id)
    {
        $logs = leavetypesModel::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Leave holiday not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Leave holiday';
        }

        return $data;
    }

    public function updateStatusleavetypes($id, $status)
    {
        $update['status'] = $status;

        leavetypesModel::where('id', $id)->update($update);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
    }

    public function updateClaimDate($r)
    {
        $input = $r->input();

        $ecData = ClaimDateSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['user_id'] = Auth::user()->id;
        if ($ecData) {

            ClaimDateSetting::where('id', $ecData->id)->update($input);
            $data['msg'] = 'Success update claim date setting';
        } else {
            ClaimDateSetting::create($input);
            $data['msg'] = 'Success update claim date setting';
        }

        return $data;
    }
}