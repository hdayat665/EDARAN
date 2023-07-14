<?php

namespace App\Service;

use Carbon\Carbon;
use App\Models\SOP;
use App\Models\News;
use App\Models\Role;
use App\Models\Unit;
use App\Models\State;
use App\Models\Users;
use App\Models\Branch;
use App\Models\Policy;
use App\Models\Company;
use App\Models\Country;
use App\Models\Employee;
use App\Models\JobGrade;
use App\Models\Location;
use App\Models\UserRole;
use App\Models\Department;
use App\Models\DomainList;
use App\Models\TypeOfLogs;
use App\Models\Designation;
use App\Models\UserProfile;
use App\Models\ActivityLogs;
use App\Models\EntitleGroup;
use App\Models\holidayModel;
use App\Models\ClaimCategory;
use App\Models\EclaimGeneral;
use App\Models\ApprovalConfig;
use App\Models\EmploymentType;
use App\Models\PermissionRole;
use App\Models\leavetypesModel;
use App\Models\ClaimDateSetting;
use App\Models\TransportMillage;
use App\Models\leaveWeekendModel;
use App\Models\EntitleSubsBenefit;
use Illuminate\Support\Facades\DB;
use App\Models\ApprovelRoleGeneral;
use App\Models\leaveSicKleaveModel;
use App\Models\ClaimCategoryContent;
use App\Models\EclaimGeneralSetting;
use App\Models\leaveAnualLeaveModel;
use Illuminate\Support\Facades\Auth;
use App\Models\leaveEntitlementModel;
use App\Models\leaveCarryForwordModel;
use Illuminate\Support\Facades\Validator;
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
        $data['msg'] = 'Success Get Roles';

        return $data;
    }

    public function createRole($r)
    {
        $input = $r->input();
        $user = Auth::user();
        //pr($input);
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['addedBy'] = $user->username;
        $input['addedTime'] = date('Y-m-d h:m:s');
        Role::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Role is Created';

        return $data;
    }

    public function updateRole($r, $id)
    {
        $modifiedBy = Auth::user()->username;
        $modifiedTime = date('Y-m-d h:m:s');

        $input = $r->input();


        $updateData['roleName'] = $r['roleName'];
        $updateData['modifiedBy'] = $modifiedBy;
        $updateData['modifiedTime'] = $modifiedTime;
        //pr($updateData);
        // $updateData = [
        //     'modifiedBy' => $modifiedBy,
        //     'modifiedTime' => $modifiedTime
        // ];

        Role::where('id', $id)->update($updateData);

        if (!empty($input['permissions'])) {

            PermissionRole::where('role_id', $id)->delete();

            $permissions = explode(',', $input['permissions']);

            foreach ($permissions as $permission) {
                $permissionRole = [
                    'tenant_id' => Auth::user()->tenant_id,
                    'role_id' => $id,
                    'permission_code' => $permission,
                    'modified_by' => $modifiedBy,
                    'modified_time' => $modifiedTime
                ];

                PermissionRole::create($permissionRole);
            }
        }

        if ($r->input('userName')) {
            $data1 = $r->input('userName');
            $data2 = date('Y-m-d h:m:s');
            $data3 = $r->input('id');

            $insertData = [
                'tenant_id' => Auth::user()->tenant_id,
                'up_user_id' => $data1,
                'added_time' => $data2,
                'role_id' => $data3,
                'added_by' => Auth::user()->id,
                'modified_by' => '',
                'modified_time' => ''
            ];

            UserRole::create($insertData);

            $usersData = [
                'role_id' => $data3,
            ];

            Users::where('id', $data1)->update($usersData);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Role is Updated';

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
            $data['msg'] = 'Role is Deleted';
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
        $data['msg'] = 'Success Get Company';

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
        $data['msg'] = 'Company is Created';

        return $data;
    }

    public function updateCompany($r, $id)
    {
        $input = $r->input();
        $companyCode = $input['companyCode'];

        $existingCompany = Company::where('companyCode', $companyCode)
            ->where('id', '!=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingCompany) {
            $data['msg'] = 'Company code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('Y-m-d H:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Company::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Company is Updated';

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
            $data['msg'] = 'Company is Deleted';
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
        $data['msg'] = 'Success Get Department';

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
        $data['msg'] = 'Department is Created';

        return $data;
    }
    public function updateDepartment($r, $id)
    {
        $input = $r->input();
        $departmentCode = $input['departmentCode'];

        $existingDepartment = Department::where('departmentCode', $departmentCode)
            ->where('id', '!=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingDepartment) {
            $data['msg'] = 'Company code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('Y-m-d H:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Department::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Department is Updated';

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
            $data['msg'] = 'Department is Deleted';
        }

        return $data;
    }

    public function getUnit()
    {
        $data = [];
        $data['data'] = Unit::with('company')->get();

        $data['msg'] = 'Success Get Unit';

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
        $data['msg'] = 'Unit is Created';

        return $data;
    }
    public function updateUnit($r, $id)
    {
        $input = $r->input();
        $unitCode = $input['unitCode'];

        $existingUnit = Unit::where('unitCode', $unitCode)
            ->where('id', '!=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingUnit) {
            $data['msg'] = 'Unit code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('Y-m-d H:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Unit::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Unit is Updated';

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
            $data['msg'] = 'Unit is Deleted';
        }

        return $data;
    }

    public function getBranch()
    {
        $data = [];
        $data['data'] = Branch::with('unit')->get();
        $data['status'] = true;
        $data['msg'] = 'Success Get Branch';

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

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $user = Auth::user();

        $getid = Location::select('id')
        ->where('country_id','=', $input['ref_country'])
        ->where('state_id','=', $input['ref_state'])
        ->where('name','=', $input['location_cityid'])
        ->where('postcode','=', $input['ref_postcode'])
        ->first();



        $user = Auth::user();

        $input = [
            'companyId' => $input['companyId'],
            'branchName' => $input['branchName'],
            'branchType' => $input['branchType'],
            'address' => $input['address'],
            'address2' => $input['address2'],

            'location_cityid' => $getid->id,
            'tenant_id' => Auth::user()->tenant_id,
            'addedBy' => $user->username,
            'addedBy' => date('Y-m-d H:i:s'),

        ];

        Branch::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Branch is Created';

        return $data;

    }
    public function updateBranch($r, $id)
    {
        $input = $r->input();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $branchName = $input['branchName'];

        $existingBranch = Branch::where('branchName', $branchName)
            ->where('id', '=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingBranch) {
            $data['msg'] = 'Branch name already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $user = Auth::user();

        $getid = Location::select('id')
        ->where('country_id','=', $input['ref_country'])
        ->where('state_id','=', $input['ref_state'])
        ->where('name','=', $input['location_cityid'])
        ->where('postcode','=', $input['ref_postcode'])
        ->first();

        $input = [
            'companyId' => $input['companyId'],
            'branchName' => $input['branchName'],
            'branchType' => $input['branchType'],
            'address' => $input['address'],
            'address2' => $input['address2'],

            'location_cityid' => $getid->id,
            'tenant_id' => Auth::user()->tenant_id,
            'modifiedBy' => $user->username,
            'modified_at' => date('Y-m-d H:i:s'),
        ];

        Branch::where('id', $id)->update($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Branch is Updated';

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
            $data['msg'] = 'Branch is Deleted';
        }

        return $data;
    }

    public function getLocation()
    {
        $data = [];
        $data['data'] = Location::with('location')->get();
        $data['status'] = true;
        $data['msg'] = 'Success Get Location';

        return $data;
    }

    public function createLocation($r)
    {
        $input = $r->input();


        $input = [
            'country_id' => $input['country_id'],
            'state_id' => $input['state_name'],
            'name' => $input['city_name'],
            'postcode' => $input['postcode'],


        ];

        Location::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create State Postcode';

        return $data;
    }

    public function deleteLocation($id)
    {
        $Location = Location::find($id);

        if (!$Location) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Location not found';
        } else {

            $Location->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete Location';
        }

        return $data;


    }

    public function getStateCountry($id)
    {
        $data = [];
        $data['data'] = State::where('id', $id)->first();
        $data['status'] = true;
        $data['msg'] = 'Success Get State Country';

        return $data;
    }

    public function createStateCountry($r)
    {
        $input = $r->input();

        $etData = State::where([['state_name', $input['state_name']]])->first();
        if ($etData) {
            $data['msg'] = 'State name already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $input = [
            'country_id' => $input['country_id'],
            'state_name' => $input['state_name'],
            'state_code' => $input['state_code'],


        ];

        State::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create State and Countries';

        return $data;
    }


    public function deleteStateCountry($id)
    {
        $State = State::where('stateCode', $id)->first();

        if (!$State) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'State not found';
        } else {
            $State->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete State Country';
        }

        return $data;
    }

    public function getJobGrade()
    {
        $data = [];
        $data['data'] = JobGrade::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = true;
        $data['msg'] = 'Success Get Job Grade';

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
        $data['msg'] = 'Job Grade is Created';

        return $data;
    }

    public function updateJobGrade($r, $id)
    {
        $input = $r->input();
        $jobGradeCode = $input['jobGradeCode'];

        $existingJobGrade = JobGrade::where('jobGradeCode', $jobGradeCode)
            ->where('id', '!=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingJobGrade) {
            $data['msg'] = 'JobGrade Code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('Y-m-d H:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        JobGrade::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Job Grade is Updated';

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
            $data['msg'] = 'Job Grade is Deleted';
        }

        return $data;
    }

    public function getDesignation()
    {
        $data = [];
        $data['data'] = Designation::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = true;
        $data['msg'] = 'Success Get Designation';

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
        $data['msg'] = 'Designation is Created';

        return $data;
    }
    public function updateDesignation($r, $id)
    {
        $input = $r->input();
        $designationCode = $input['designationCode'];

        $existingdesignationCode = Designation::where('designationCode', $designationCode)
            ->where('id', '!=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingdesignationCode) {
            $data['msg'] = 'Designation Code already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('Y-m-d H:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        Designation::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Designation is Updated';

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
            $data['msg'] = 'Designation is Deleted';
        }

        return $data;
    }

    public function getSOP()
    {
        $data = [];
        $data['data'] = SOP::where('tenant_id', Auth::user()->tenant_id)->get();
        $data['status'] = true;
        $data['msg'] = 'Success Get SOP';

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
        $data['msg'] = 'SOP is Created';

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
        $data['msg'] = 'SOP is Updated';

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
            $data['msg'] = 'SOP is Deleted';
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
        $data['msg'] = 'Success Get Policy';

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
        $data['msg'] = 'Policy is Created';

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
        $data['msg'] = 'Policy is Updated';

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
            $data['msg'] = 'Policy is Deleted';
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
        $data['msg'] = 'Success Get News';

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
        $data['msg'] = 'News is Created';

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
        $data['msg'] = 'News is Updated';

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
            $data['msg'] = 'News is Deleted';
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
        $data['msg'] = 'Success Get EmploymentType';

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
        $data['msg'] = 'Success Create Employment Type';

        return $data;
    }

    public function updateEmploymentType($r, $id)
    {
        $input = $r->input();
        $type = $input['type'];

        $existingtype = EmploymentType::where('type', $type)
            ->where('id', '!=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingtype) {
            $data['msg'] = 'Employment Type already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('Y-m-d H:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        EmploymentType::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Employment Type';

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
            $data['msg'] = 'Success Delete Employment Type';
        }

        return $data;
    }

    public function roleView()
    {
        $data = Role::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();

        return $data;
    }
    public function myrolestaff()
    {
        $data =
            UserProfile::where('userProfile.tenant_id', Auth::user()->tenant_id)
            ->whereNull('role_user.up_user_id')
            ->leftJoin('employment', 'userProfile.user_id', '=', 'employment.user_id')
            ->leftJoin('role_user', 'userProfile.user_id', '=', 'role_user.up_user_id')
            ->select('userProfile.user_id', 'userProfile.fullname')
            ->get();


        return $data;
    }
    // public function listuserrole()
    // {
    //     $data = UserRole::where('role_user.tenant_id', Auth::user()->tenant_id)
    //         ->leftJoin('userprofile', 'role_user.up_user_id', '=', 'userprofile.user_id')
    //         ->leftJoin('users as au', 'role_user.added_by', '=', 'au.id')
    //         ->leftJoin('users as mu', 'role_user.modified_by', '=', 'mu.id')
    //         ->leftJoin('role as rolee', 'rolee.id', '=', 'role_user.role_id')
    //         ->select('role_user.*', 'userprofile.fullname', 'au.username as username1', 'mu.username as username2')
    //         ->get();

    //     return $data;
    // }

    public function companyView()
    {
        $data['companies'] = Company::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();

        return $data;
    }

    public function branchView()
    {
        $data = DB::table('branch as a')
            ->leftJoin('company as b', 'a.companyId', '=', 'b.id')
            ->select('a.*', 'b.companyName')
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'desc')
            ->get();

        return $data;
    }

    public function branchCountry()
    {
        $data = Country::all();

        return $data;
    }

    public function branchState()
    {
        $data = State::all();

        return $data;
    }

    public function branchCity()
    {
        $data = Location::all();

        return $data;
    }

    public function branchPostcode()
    {
        $data = Location::all();

        return $data;
    }

    public function getStatebyCountry($id = '')
    {
        $data = Country::join('location_states', 'location_states.country_id', '=', 'location_country.country_id')
        ->where('location_states.country_id', $id)
        ->get();


        return $data;
    }

    public function getCitybyState($id = '')
    {

        $data = State::join('location_cities', 'location_states.id', '=', 'location_cities.state_id')
        ->where('location_cities.state_id', $id)
        ->groupBy('location_cities.name')
        ->get();


        return $data;
    }

    public function getPostcodeByCity($id = '')
    {

        $data = Location::select('*')
                ->where('name', $id)
                ->get();


        return $data;
    }


    public function locationView()
    {
        $data = Location::select('location_cities.id','location_country.country_name','location_states.state_name','location_cities.postcode')
            ->join('location_country', 'location_cities.country_id', '=', 'location_country.country_id')
            ->join('location_states', 'location_cities.state_id', '=', 'location_states.id')
            ->orderBy('location_cities.id', 'desc')
            ->get();

            return $data;
    }

    public function unitView()
    {
        $data['units'] = DB::table('unit as a')
            ->leftJoin('department as b', 'a.departmentId', '=', 'b.id')
            ->select('a.*', 'b.departmentCode', 'b.departmentName')
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'desc')
            ->get();

        return $data;
    }

    public function departmentView()
    {
        $data['departments'] = DB::table('department as a')
            ->leftJoin('company as b', 'a.companyId', '=', 'b.id')
            ->select('a.*', 'b.companyName', 'b.companyCode')
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'desc')
            ->get();

        return $data;
    }

    public function sopView()
    {
        $data['SOPs'] = SOP::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();
        $data['policys'] = Policy::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();
        // dd($data);

        return $data;
    }

    public function jobGradeView()
    {
        $data['jobGrades'] = JobGrade::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();

        return $data;
    }

    public function designationView()
    {
        $data['designations'] = Designation::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();

        return $data;
    }

    public function newsView()
    {
        $data['news'] = News::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();

        return $data;
    }

    public function employmentTypeView()
    {
        $data['employmentTypes'] = EmploymentType::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();

        return $data;
    }

    public function getRoleById($id)
    {
        $data = UserRole::where('role_user.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('userprofile', 'role_user.up_user_id', '=', 'userprofile.user_id')
            ->leftJoin('users as au', 'role_user.added_by', '=', 'au.id')
            ->leftJoin('users as mu', 'role_user.modified_by', '=', 'mu.id')
            ->leftJoin('role as rolee', 'role_user.role_id', '=', 'rolee.id')
            ->select('role_user.*', 'userprofile.fullname', 'au.username as username1', 'mu.username as username2', 'rolee.id as roleeid', 'rolee.roleName as rolename')
            ->where('role_user.role_id', '=', $id)
            ->get();

        return $data;
    }

    public function getRoleBy($id)
    {
        $data1 = Role::find($id);

        return $data1;
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

        $data = Branch::join('location_cities as lc', 'branch.location_cityid', '=', 'lc.id')
        ->where('branch.id', $id)
        ->first();



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
            ->orderBy('a.id', 'desc')
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
    $logsData['activity_name'] = implode(', ', $input['activity_name']); // Convert the array into a string

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
    $data['msg'] = 'Success Create Type of Logs';

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

    if (isset($input['activity_name'])) {
        foreach ($input['activity_name'] as $activity) {
            $activityData['department'] = $input['department'];
            $activityData['activity_name'] = $activity;
            $activityData['project_id'] = $input['project_id'];
            $activityData['logs_id'] = $id; // Use the $id variable instead of $typeOfLog->id
            $activityData['tenant_id'] = $user->tenant_id;

            // Check if a record with the same activity_name and logs_id exists
            $existingActivity = ActivityLogs::where('activity_name', $activity)
                ->where('logs_id', $id) // Use the $id variable instead of $typeOfLog->id
                ->first();

            if ($existingActivity) {
                // If the record already exists, update its other fields
                $existingActivity->update($activityData);
            } else {
                // Otherwise, create a new record
                ActivityLogs::create($activityData);
            }
        }

        // Remove activity names that are not present in the updated type_of_logs record
        $existingActivities = ActivityLogs::where('logs_id', $id)->get();
        $existingActivityNames = $existingActivities->pluck('activity_name')->toArray();
        $deletedActivities = array_diff($existingActivityNames, $input['activity_name']);

        if (!empty($deletedActivities)) {
            ActivityLogs::where('logs_id', $id)
                        ->whereIn('activity_name', $deletedActivities)
                        ->delete();
        }
    }

    $data['status'] = config('app.response.success.status');
    $data['type'] = config('app.response.success.type');
    $data['title'] = config('app.response.success.title');
    $data['msg'] = 'Success Update Type of Log';

    return $data;
}





    public function deleteTypeOfLogs($id)
    {
        $logs = TypeOfLogs::find($id);
        $logsid = ActivityLogs::where('logs_id', $id);


        if (!$logs && !$logsid) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'logs not found';
        } else {
            $logs->delete();
            $logsid->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete Type of Log';
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
        $data = Branch::where([['tenant_id', Auth::user()->tenant_id], ['companyId', $id]])->get();

        return $data;
    }

    public function branchByCountry($id = '')
    {
        $data = Branch::where([['tenant_id', Auth::user()->tenant_id], ['country', $id]])->get();
        return $data;
    }

    public function getActivityNamesById($id = '')
    {
        $data = ActivityLogs::where([['tenant_id', Auth::user()->tenant_id], ['logs_id', $id]])->get();

        return $data;
    }

    public function eclaimGeneralView()
    {
        $data['subs'] = EclaimGeneral::where([['tenant_id', Auth::user()->tenant_id]])->get();
        $data['general'] = EclaimGeneralSetting::where([['tenant_id', Auth::user()->tenant_id]])->orderBy('id', 'DESC')->first();

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

        // update data subs tied to entitile group
        $entitleData = EntitleGroup::where('tenant_id', Auth::user()->tenant_id)->get();

        foreach ($entitleData as $entitle) {
            $subsData = [
                'tenant_id' => Auth::user()->tenant_id,
                'user_id' => Auth::user()->id,
                'entitle_id' => $entitle->id,
                'type' => 'subs',
                'area' => $input['area_name'],
            ];

            EntitleSubsBenefit::create($subsData);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create Subsistance';

        return $data;
    }
    public function updateSubsistance($r, $id)
    {
        $input = $r->input();
        $area_name = $input['area_name'];

        $existingAreaName = EclaimGeneral::where('area_name', $area_name)
            ->where('id', '!=', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->first();

        if ($existingAreaName) {
            $data['msg'] = 'Area Name already exists.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $input['modified_at'] = date('Y-m-d H:i:s');
        $user = Auth::user();
        $input['modifiedBy'] = $user->username;

        EclaimGeneral::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Subsistence Allowance Area Updated';

        return $data;
    }
    public function deleteSubsistance($id)
    {
        $logs = EclaimGeneral::find($id);

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
            $data['msg'] = 'Success Delete Category';
        }

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


        if (isset($input['content']) && isset($input['label'])) {
            $dataContent = [];
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

        // update data subs tied to entitile group
        $entitleData = EntitleGroup::where('tenant_id', Auth::user()->tenant_id)->get();

        foreach ($entitleData as $entitle) {
            $subsData = [
                'tenant_id' => Auth::user()->tenant_id,
                'user_id' => Auth::user()->id,
                'entitle_id' => $entitle->id,
                'type' => 'category',
                'area' => $input['claim_catagory'],
            ];

            EntitleSubsBenefit::create($subsData);
        }


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create Claim Category';

        return $data;
    }

    public function updateClaimCategory($r, $id)
    {
        $input = $r->input();

        // insert content data
        if (!empty($input['content'])) {
            foreach ($input['content'] as $content) {
                $contentData = [
                    'content' => $content,
                    'category_id' => $id,
                ];

                ClaimCategoryContent::create($contentData);
            }
            unset($input['content']);
        }

        if ($input['claim_type']) {
            $input['claim_type'] = implode(',', $input['claim_type']);
        }

        ClaimCategory::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Claim Category';

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
            $data['msg'] = 'Success Delete Category';
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
        $entitle = EntitleGroup::where([['tenant_id', Auth::user()->tenant_id], ['group_name', $input['group_name']]])->first();
        if ($entitle) {
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

        $entitle = EntitleGroup::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();

        if ($input['car_price']) {
            foreach ($input['car_price'] as $key => $data) {
                if ($input['car_price'][$key] || $input['car_km'][$key]) {
                    $car = [
                        'price' => $input['car_price'][$key],
                        'km' => $input['car_km'][$key],
                        'order_km' => $input['order_km'][$key],
                        'type' => 'car',
                        'entitle_id' => $entitle->id,
                        'tenant_id' => Auth::user()->tenant_id,
                        'user_id' => Auth::user()->id,
                    ];
                    TransportMillage::create($car);
                }
            }
        }

        if ($input['motor_price']) {
            foreach ($input['motor_price'] as $key => $data) {
                if ($input['motor_price'][$key] || $input['motor_km'][$key]) {
                    $motor = [
                        'price' => $input['motor_price'][$key],
                        'km' => $input['motor_km'][$key],
                        'order_km' => $input['order_km'][$key],
                        'type' => 'motor',
                        'entitle_id' => $entitle->id,
                        'tenant_id' => Auth::user()->tenant_id,
                        'user_id' => Auth::user()->id,
                    ];
                    TransportMillage::create($motor);
                }
            }
        }

        if ($input['subs']) {
            foreach ($input['subs']['area'] as $key => $subs) {
                $subssData = [
                    'tenant_id' => Auth::user()->tenant_id,
                    'user_id' => Auth::user()->id,
                    'entitle_id' => $entitle->id,
                    'area' => $subs,
                    'value' => $input['subs']['value'][$key],
                    'type' => $input['subs']['type'][$key],
                ];

                EntitleSubsBenefit::create($subssData);
            }
        }



        $return['status'] = config('app.response.success.status');
        $return['type'] = config('app.response.success.type');
        $return['title'] = config('app.response.success.title');
        $return['msg'] = 'Success Create Entitle Group';

        return $return;
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
    public function getAllTransportMillage()
    {
        $data = TransportMillage::where([['tenant_id', Auth::user()->tenant_id]])->get();

        return $data;
    }
    public function updateEntitleGroup($r, $id)
    {

        $input = $r->input();

        if (!empty($input['car_price'])) {
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

        if (!empty($input['motor_price'])) {
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
        $result['msg'] = 'Success Update Entitle Group';

        return $result;
    }

    public function updateStatusEntitleGroup($id, $status)
    {
        $update['status'] = $status;

        EntitleGroup::where('id', $id)->update($update);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Status Entitlement Group';

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
            $data['msg'] = 'Success Delete Entitle Category';
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
        $currentDateObj = Carbon::now();
        $checkdate = $currentDateObj->format('Y');

        $data =
            leaveEntitlementModel::select('leave_entitlement.*', 'userprofile.fullname', 'department.departmentName', 'jobgrade.jobGradeName')
            ->leftJoin('userprofile', 'leave_entitlement.id_userprofile', '=', 'userprofile.user_id')
            ->leftJoin('employment', 'leave_entitlement.id_employment', '=', 'employment.user_id')
            ->leftJoin('department', 'leave_entitlement.id_department', '=', 'department.id')
            ->leftJoin('jobgrade', 'leave_entitlement.id_jobgrade', '=', 'jobgrade.id')
            ->where('leave_entitlement.tenant_id', Auth::user()->tenant_id)
            ->whereYear('leave_entitlement.le_year', '=', $checkdate)
            ->orderBy('id', 'desc')->get();
        return $data;
    }

    public function leaveNameStaff()
    {
        $data =
            Employee::where('employment.tenant_id', Auth::user()->tenant_id)
            ->whereNull('leave_entitlement.id_employment')
            ->leftJoin('userprofile', 'employment.user_id', '=', 'userprofile.user_id')
            ->leftJoin('department', 'employment.department', '=', 'department.id')
            ->leftJoin('leave_entitlement', 'employment.user_id', '=', 'leave_entitlement.id_employment')
            ->select('userprofile.user_id', 'userprofile.fullname', 'department.id')
            ->get();
        return $data;
    }

    public function createLeaveEntitlement($r)
    {
        $input = $r->input();

        $currentDate = $input['generatedate'];
        $currentDateObj = Carbon::parse($currentDate);
        $checkdate = $currentDateObj->format('Y');

        $currentYear = date('Y');

        if ($checkdate < $currentYear) {
            $data['msg'] = 'Unable to Generate Previous Year';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        if ($checkdate > $currentYear + 1) {
            $data['msg'] = 'The Year '.$checkdate.' is more than two years in the future';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            return $data;
        }

        $check = leaveEntitlementModel::select('leave_entitlement.*')
            ->where('leave_entitlement.tenant_id','=', Auth::user()->tenant_id)
            ->whereYear('leave_entitlement.le_year','=', $checkdate)
            ->get();

        if($check->isEmpty()){

            $getEmployer = Employee::select('employment.*')
            ->where('employment.tenant_id', Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('employment.status', '=', 'Active')
                    ->orWhere('employment.status', '=', 'active');
            })
            ->where(function ($query) {
                $query->where('employment.employmentType', '=', '1')
                    ->orWhere('employment.employmentType', '=', '2');
            })
            ->orderBy('employment.user_id', 'asc')
            ->get();


            foreach ($getEmployer as $employer) {

                $joinDate = $employer->joinedDate;
                $joinDateCarbon = Carbon::parse($joinDate);
                $currentDateCarbon = Carbon::now();
                $diff = $joinDateCarbon->diff($currentDateCarbon);
                $totalYears = $diff->y;
                $totalMonths = $diff->m;

                $getAnual = leaveAnualLeaveModel::select('leave_anualleave.*','jobgrade.jobGradeName')
                    ->where('leave_anualleave.tenant_id', Auth::user()->tenant_id)
                    ->where('leave_anualleave.jobgrade_id', '=', $employer->jobGrade) // Use $employer->jobGrade
                    ->leftJoin('jobgrade', 'leave_anualleave.jobgrade_id', '=', 'jobgrade.id')
                    ->orderBy('id', 'asc')->first();

                $getSickLeave = leaveSicKleaveModel::select('leave_sickleave.*','leave_types.leave_types')
                    ->leftJoin('leave_types', 'leave_sickleave.type_sickleave', '=', 'leave_types.id')
                    ->where('leave_sickleave.tenant_id', Auth::user()->tenant_id)
                    ->orderBy('id', 'asc')->get();

                $getCarryForward = leaveCarryForwordModel::select('leave_carryforward.*')
                    ->where('leave_carryforward.tenant_id', Auth::user()->tenant_id)
                    ->orderBy('id', 'asc')->first();

                if ($totalYears < 2 && $employer->employmentType == 2) {
                    // Kode untuk jika $totalYears kurang dari 2
                    $data1 = $getAnual->permenant_01;
                } elseif ($totalYears >= 2 && $totalYears < 5 && $employer->employmentType == 2) {
                    // Kode untuk jika $totalYears antara 2 hingga 5
                    $data1 = $getAnual->permenant_02;
                } elseif ($totalYears >= 5 && $employer->employmentType == 2) {
                    // Kode untuk jika $totalYears lebih dari 5
                    $data1 = $getAnual->permenant_03;
                } elseif ($employer->employmentType == 1) {
                    // Kode untuk kasus jika employmentType == 1
                    $data1 = $getAnual->contract;
                }


                $data2 = [];

                foreach ($getSickLeave as $sickLeave) {
                    if ($totalYears < 2 && $employer->employmentType == 2) {
                        $data2[] = $sickLeave->permenant_01;
                    } elseif ($totalYears >= 2 && $totalYears < 5 && $employer->employmentType == 2) {
                        $data2[] = $sickLeave->permenant_02;
                    } elseif ($totalYears >= 5 && $employer->employmentType == 2) {
                        $data2[] = $sickLeave->permenant_03;
                    } elseif ($totalYears <= 2 && $employer->employmentType == 1) {
                        $data2[] = $sickLeave->contract_01;
                    } elseif ($totalYears >= 2 && $totalYears < 5 && $employer->employmentType == 1) {
                        $data2[] = $sickLeave->contract_02;
                    } elseif ($totalYears >= 5 && $employer->employmentType == 1) {
                        $data2[] = $sickLeave->contract_03;
                    }
                }

                $data4 = $getCarryForward->lapsed_date;
                $data5 = $getCarryForward->max_duration;
                $data6 = $currentDateCarbon->format('Y-m-d');
                $data7 = Auth::user()->tenant_id;

                // dd($employer->user_id,$data1,$data2[0],$data2[1],$data4,$data5,$data6);
                // die;

                $input = [
                    'id_userprofile' => $employer->user_id,
                    'id_employment' => $employer->user_id,
                    'id_department' => $employer->department,
                    'id_jobgrade' => $employer->jobGrade,
                    'current_entitlement' => $data1,
                    'current_entitlement_balance' => $data1,
                    'sick_leave_entitlement' => $data2[0],
                    'sick_leave_entitlement_balance' => $data2[0],
                    'hospitalization_entitlement' => $data2[1],
                    'hospitalization_entitlement_balance' => $data2[1],
                    'carry_forward' => $data5,
                    'carry_forward_balance' => $data5,
                    'lapsed_date' => $data4,
                    'le_year' => $currentDate,
                    'tenant_id' => $data7,
                ];

                leaveEntitlementModel::create($input);


            }

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Successfully save entitlement';

            return $data;



        }else{

            $data['msg'] = 'The Year '.$checkdate.' Has Already Generated';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;


        }

    }

    public function getcreateLeaveEntitlement($id)
    {
        // $data = leaveEntitlementModel::find($id);

        // return $data;

        $data =
            leaveEntitlementModel::where('leave_entitlement.tenant_id', Auth::user()->tenant_id)
            ->where('leave_entitlement.id', '=', $id)
            ->leftJoin('userprofile', 'leave_entitlement.id_userprofile', '=', 'userprofile.user_id')
            ->leftJoin('employment', 'leave_entitlement.id_employment', '=', 'employment.user_id')
            ->leftJoin('department', 'leave_entitlement.id_department', '=', 'department.id')
            ->select('leave_entitlement.*', 'userprofile.fullname', 'department.departmentName')
            ->orderBy('id', 'desc')->first();
        return $data;
    }

    public function updateleaveEntitlement($r, $id)
    {
        $input = $r->input();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $data1 = $input['CurrentEntitlementBalance'];
        $data2 = $input['SickLeaveEntitlementBalance'];
        $data3 = $input['CurrentForwardBalance'];

        $input = [

            'current_entitlement_balance' => $data1,
            'sick_leave_entitlement_balance' => $data2,
            'carry_forward_balance' => $data3,
        ];

        leaveEntitlementModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Successfully update entitlement';

        return $data;
    }

    public function holidaylistView() {

        $dataallstate = holidayModel::select('*')
            ->where('tenant_id', '=', Auth::user()->tenant_id)
            ->orderBy('id', 'desc')
            ->get();

        $data = [];

        foreach ($dataallstate as $state) {
            $stateIds = explode(',', $state->state_id); // Separate the string into an array based on commas
            $totalStateIds = count(array_filter($stateIds)); // Filter out empty values before counting

            $state->total = $totalStateIds; // Add new 'total' property to the object

            $data[] = $state;
        }

        $dataallstate = state::select('*')
            ->where('country_id', '=', $dataallstate[0]->country_id)
            ->orderBy('id', 'desc')
            ->get();

        $totalAll = count($dataallstate);

        foreach ($data as $state) {
            if ($state->total === $totalAll) {
                $state->total = "ALL";
            }
        }

        return $data;






    }




    public function country() {

        $data = Country::all();
        return $data;

    }

    public function createholidaylist($r)
    {
        $input = $r->input();

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = holidayModel::where([['holiday_title', $input['holiday_title']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'Title Already Exists';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }
        $data1 = strtoupper($input['holiday_title']);
        $data2 = date('Y-m-d', strtotime($input['start_date']));
        $data3 = date('Y-m-d', strtotime($input['end_date']));
        $data4 = $input['annual_date'];
        $data5 = Auth::user()->tenant_id;
        $data6 = 1;
        $data7 = strtoupper($input['country_id']);
        $data8 = implode(',', array_filter($input['selected_state_ids'], function ($value) {
            return $value !== null;
        }));


        $input = [
            'holiday_title' => $data1,
            'start_date' => $data2,
            'end_date' => $data3,
            'annual_date' => $data4,
            'tenant_id' => $data5,
            'status' => $data6,
            'country_id' => $data7,
            'state_id' => $data8,

        ];

        holidayModel::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Holiday is created';

        return $data;
    }

    public function updateholidaystate($r)
    {
        $input = $r->input();


        $id = $input['idstate'];
        $datastate = implode(',', array_filter($input['selected_state_ids'], function ($value) {
            return $value !== null;
        }));


        $input = [
            'state_id' => $datastate,
        ];

        holidayModel::where('id', $id)->update($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Holiday is created';

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

        $data1 = strtoupper($input['holidaytitle']);
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
        $data['msg'] = 'Holiday is updated';

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
            $data['msg'] = 'Successfully delete holiday';
        }

        return $data;
    }

    public function updateStatusleaveholiday($id, $status)
    {
        $update['status'] = $status;

        holidayModel::where('id', $id)->update($update);

        if ($status == 1) {
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Holiday is activated';
            return $data;
        } else {

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Holiday is deactivated';
            return $data;
        }
    }


    public function leavetypesView()
    {
        $tenant = Auth::user()->tenant_id;
        $input = [
            [$tenant, 'AL', 'ANNUAL LEAVE'],
            [$tenant, 'SL', 'SICK LEAVE'],
            [$tenant, 'HL', 'HOSPITALIZATION']
        ];

        foreach ($input as $data) {
            $record = leavetypesModel::updateOrCreate(
                [
                    'tenant_id' => $data[0],
                    'leave_types_code' => $data[1],
                    'leave_types' => $data[2],

                ],
                [
                ]
            );
        }


        $data['types'] = leavetypesModel::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'ASC')->get();

        return $data;
    }


    public function createtypes($r)
    {
        $input = $r->input();

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = leavetypesModel::where([['leave_types_code', $input['leave_types_code']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'Leave type code already exists';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $etData = leavetypesModel::where([['leave_types', $input['leave_types']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'Leave type already exists';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $data1 = strtoupper($input['leave_types_code']);
        $data2 = strtoupper($input['leave_types']);
        $data3 = $input['day'];
        $data4 = $input['duration'];
        $data5 = Auth::user()->tenant_id;

        $input = [
            'leave_types_code' => $data1,
            'leave_types' => $data2,
            'day' => $data3,
            'duration' => $data4,
            'tenant_id' => $data5,
            'status' => 1
        ];

        leavetypesModel::create($input);


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Successfully create leave type';

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
        $existingLeaveType = leavetypesModel::where('id', $id)
        ->where('tenant_id', '=', Auth::user()->tenant_id)
        ->first();

        $data1 = strtoupper($input['leavetypescode']);
        $data2 = strtoupper($input['leavetypes']);
        $data3 = $input['day'];

        if ($existingLeaveType->leave_types_code === $data1 && $existingLeaveType->leave_types === $data2) {
            $existingLeaveType->day = $data3;
            $existingLeaveType->save();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave type day updated successfully.';
            return $data;
        } else {

            $check = [
                ['AL', 'ANNUAL LEAVE'],
                ['SL', 'SICK LEAVE'],
                ['HL', 'HOSPITALIZATION']
            ];

            foreach ($check as $row) {
                if ($existingLeaveType->leave_types_code === $row[0] && $existingLeaveType->leave_types === $row[1]) {
                    $data['status'] = config('app.response.error.status');
                    $data['type'] = config('app.response.error.type');
                    $data['title'] = config('app.response.error.title');
                    $data['msg'] = 'Cannot update leave type code and leave type.';
                    return $data;
                }
            }

            $existingLeaveType->leave_types_code = $data1;
            $existingLeaveType->leave_types = $data2;
            $existingLeaveType->day = $data3;
            $existingLeaveType->save();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave type updated successfully.';
            return $data;
        }
    }

    public function deleteLeavetypes($id)
    {
        $existingLeaveType = leavetypesModel::where('id', $id)
        ->where('tenant_id', '=', Auth::user()->tenant_id)
        ->first();

        $check = [
            ['AL', 'ANNUAL LEAVE'],
            ['SL', 'SICK LEAVE'],
            ['HL', 'HOSPITALIZATION']
        ];

        $matchFound = false;

        foreach ($check as $row) {
            if ($existingLeaveType->leave_types_code === $row[0] && $existingLeaveType->leave_types === $row[1]) {
                $matchFound = true;
                break;
            }
        }

        if ($matchFound) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Cannot Delete leave type code and leave type.';
        } else {
            $existingLeaveType->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Successfully delete leave type';
        }

        return $data;


    }

    public function updateStatusleavetypes($id, $status)
    {
        $update['status'] = $status;

        leavetypesModel::where('id', $id)->update($update);

        if ($status == 1) {
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave type status is actived';
            return $data;
        } else {
            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave type status is deactivated';
            return $data;
        }
    }

    public function updateClaimDate($r)
    {
        $input = $r->input();

        $ecData = ClaimDateSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['user_id'] = Auth::user()->id;

        $data = getResponseSuccessAjax();

        if ($ecData) {

            ClaimDateSetting::where('id', $ecData->id)->update($input);
            $data['msg'] = 'Success Update Claim Date Setting';
        } else {
            ClaimDateSetting::create($input);
            $data['msg'] = 'Success Update Claim Date Setting';
        }

        return $data;
    }

    public function getDateClaim()
    {
        $data = ClaimDateSetting::where('tenant_id', Auth::user()->tenant_id)->first();

        return $data;
    }

    public function updateEclaimSettingGeneral($r)
    {
        $input = $r->input();

        $input['general_setting']['tenant_id'] = Auth::user()->tenant_id;
        $input['general_setting']['user_id'] = Auth::user()->id;
        if ($input['general_id']) {
            EclaimGeneralSetting::where('id', $input['general_id'])->update($input['general_setting']);
        } else {
            EclaimGeneralSetting::create($input['general_setting']);
        }

        $generalData = EclaimGeneralSetting::orderBy('id', 'DESC')->first();

        // insert general id in subs setting
        foreach ($input['subs_id'] as $subs_id) {
            $subsData = [
                'general_setting_id' => $generalData->id
            ];

            EclaimGeneral::where('id', $subs_id)->update($subsData);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update eclaim general setting';

        return $data;
    }

    public function deleteClaimCategoryContent($id)
    {
        $logs = ClaimCategoryContent::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'data not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Delete Content';
        }

        return $data;
    }

    public function updateStatusClaimCategory($id, $status)
    {
        $logs = ClaimCategory::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'data not found';
        } else {
            $contentData = [
                'status' => $status,
            ];

            $logs->update($contentData);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Update Content';
        }

        return $data;
    }

    public function getClaimEntitleById($id = '', $type = '')
    {
        $data = EntitleSubsBenefit::where([['tenant_id', Auth::user()->tenant_id], ['type', $type], ['entitle_id', $id]])->get();

        return $data;
    }

    public function getEntitleClaimDetailById($id = '')
    {
        $data = EntitleSubsBenefit::find($id);

        return $data;
    }

    public function updateEntitleDetail($r, $id = '')
    {
        $input = $r->input();

        $detailData = [
            'area' => $input['area_name'] ?? $input['claim_catagory'],
            'value' => $input['value'] ?? $input['claim_value'],
        ];

        EntitleSubsBenefit::find($id)->update($detailData);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update eclaim general setting';

        return $data;
    }

    public function eclaimApprovalConfig()
    {
        $data = ApprovalConfig::where([['tenant_id', Auth::user()->tenant_id]])->get();

        return $data;
    }

    public function updateApprovalConfig($r, $id)
    {
        $input = $r->input();
        $status = $input['status'];
        $logs = ApprovalConfig::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'data not found';
        } else {

            if (in_array($input['role'], ['SUPERVISOR - RECOMMENDER', 'HOD / CEO - APPROVER', 'ADMIN - RECOMMENDER', 'ADMIN - APPROVER', 'FINANCE - RECOMMENDER', 'FINANCE - APPROVER'])) {
                $contentData = [
                    'status' => $status,
                    'approve' => $status,
                    'reject' => $status,
                    'amend' => $status,
                    'cancel' => $status,

                ];
            }

            if ($input['role'] == 'ADMIN - CHECKER') {
                $contentData = [
                    'status' => $status,
                    'approve' => $status,
                    'amend' => $status,
                    'cancel' => $status,
                    'check1' => $status,
                    'check2' => $status,
                    'check3' => $status,
                ];
            }

            if ($input['role'] == 'FINANCE - CHECKER') {
                $contentData = [
                    'status' => $status,
                    'approve' => $status,
                    'amend' => $status,
                    'cancel' => $status,
                    'check1' => $status,
                    'generate_pv1' => $status,
                    'payment1' => $status,
                    'paid1' => $status,
                    'check2' => $status,
                    'check3' => $status,
                ];
            }

            $logs->update($contentData);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Update Status';
        }

        return $data;
    }

    public function updateApprovalConfigDetail($r, $id)
    {
        $input = $r->input();
        $status = $input['status'];
        $field = $input['field'];
        $logs = ApprovalConfig::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'data not found';
        } else {

            $contentData = [
                $field => $status,
            ];

            $logs->update($contentData);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success Update Status';
        }

        return $data;
    }

    public function getUserByRoleId($id = '')
    {
        $data = UserRole::with('userProfile', 'addedBy', 'modifydBy')->where([['tenant_id', Auth::user()->tenant_id], ['role_id', $id]])->get();

        return $data;
    }

    public function getPermissionByRoleId($id = '')
    {
        $data = PermissionRole::where([['tenant_id', Auth::user()->tenant_id], ['role_id', $id]])->get();

        return $data;
    }


    // anual leave

    public function leaveAnnualView()
    {

        $tenant = Auth::user()->tenant_id;

        $getJobgrade = JobGrade::select('jobgrade.*')
        ->where('jobgrade.tenant_id', Auth::user()->tenant_id)
        ->orderBy('id', 'asc')->get();

        foreach ($getJobgrade as $data) {

            $record = leaveAnualLeaveModel::updateOrCreate(
                [
                    'tenant_id' => $tenant,
                    'jobgrade_id' => $data->id,
                ],
                [

                ]
            );
        }

        $data =
        leaveAnualLeaveModel::select('leave_anualleave.*','jobgrade.jobGradeName')
            ->where('leave_anualleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('jobgrade', 'leave_anualleave.jobgrade_id', '=', 'jobgrade.id')
            ->orderBy('id', 'asc')->get();
        return $data;
    }
    public function sickLeaveView()
    {
        $tenant = Auth::user()->tenant_id;

        $getTypeSick = leavetypesModel::select('leave_types.*')
            ->where('leave_types.tenant_id', '=',Auth::user()->tenant_id)
            ->where(function ($query) {
                $query->where('leave_types.leave_types_code', '=','SL')
                    ->orWhere('leave_types.leave_types_code', '=','HL');
            })
            ->orderBy('id', 'asc')->get();

        foreach ($getTypeSick as $data) {

            $record = leaveSicKleaveModel::updateOrCreate(
                [
                    'tenant_id' => $tenant,
                    'type_sickleave' => $data->id,
                ],
                [

                ]
            );
        }

        $data =
        leaveSicKleaveModel::select('leave_sickleave.*','leave_types.leave_types')
            ->leftJoin('leave_types', 'leave_sickleave.type_sickleave', '=', 'leave_types.id')
            ->where('leave_sickleave.tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'asc')->get();
        return $data;
    }
    public function carryForwardView()
    {
        $tenant = Auth::user()->tenant_id;
        $input = [
            [$tenant, 'CARRY FORWARD'],
        ];

        foreach ($input as $data) {
            $record = leaveCarryForwordModel::updateOrCreate(
                [
                    'tenant_id' => $data[0],
                    'type_carryforward' => $data[1],
                ],
                [
                ]
            );
        }

        $data =
        leaveCarryForwordModel::select('leave_carryforward.*')
            ->where('leave_carryforward.tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'asc')->get();
        return $data;
    }

    public function updateAnualLeave($r)
    {
        $input = $r->input('permenant');

        foreach ($input as $id => $data) {
            $record = leaveAnualLeaveModel::find($id);

            if ($record) {
                $record->permenant_01 = $data['permenant_01'];
                $record->permenant_02 = $data['permenant_02'];
                $record->permenant_03 = $data['permenant_03'];
                $record->contract = $data['contract'];

                $record->save();
            }
        }


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Successfully update Anual Leave';

        return $data;
    }

    public function updateweekend($r){
        $input = $r->input();

        foreach ($input as $key => $value) {
            if (strpos($key, 'id_') === 0) {
                $day = substr($key, 3); // Mengambil nama hari berdasarkan kunci
                $id = $value;
                $start_time = $input['start_time_' . $day];
                $end_time = $input['end_time_' . $day];
                $duration = $input['duration_' . $day];

                $record = leaveWeekendModel::find($id);

                if ($record) {
                    $record->start_time = $start_time;
                    $record->end_time = $end_time;
                    $record->total_time = $duration;

                    $record->save();
                }
            }
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Successfully update Weekend';

        return $data;
    }

    public function createleaveweekend($r){

        $input = $r->input();
        $tenant = Auth::user()->tenant_id;
        $input = [

            [$tenant, $input['state_id'], 1, '07:00', '19:00'],
            [$tenant, $input['state_id'], 2, '07:00', '19:00'],
            [$tenant, $input['state_id'], 3, '07:00', '19:00'],
            [$tenant, $input['state_id'], 4, '07:00', '19:00'],
            [$tenant, $input['state_id'], 5, '07:00', '19:00' ],
            [$tenant, $input['state_id'], 6, null, null],
            [$tenant, $input['state_id'], 0, null, null]
        ];

        foreach ($input as $data) {
            $record = leaveWeekendModel::updateOrCreate(
                [
                    'tenant_id' => $data[0],
                    'state_id' => $data[1],
                    'day_of_week' => $data[2],

                ],
                [
                    'start_time' => $data[3],
                    'end_time' => $data[4],

                ]
            );
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Successfully Create State';

        return $data;
    }

    public function getweekend($id){

        $data = leaveWeekendModel::select(
            'leave_weekend.*',
            'states.stateName',
        )
        ->where('leave_weekend.tenant_id', Auth::user()->tenant_id)
        ->where('leave_weekend.state_id',  '=', $id)
        ->join('states', 'leave_weekend.state_id', '=', 'states.id')
        ->orderBy('leave_weekend.id', 'asc')
        ->get();

        return $data;
    }

    public function updateSickLeave($r)
    {
        $input = $r->input('sickpermenant');

        foreach ($input as $id => $data) {
            $record = leaveSicKleaveModel::find($id);

            if ($record) {
                $record->permenant_01 = $data['permenant_01'];
                $record->permenant_02 = $data['permenant_02'];
                $record->permenant_03 = $data['permenant_03'];
                $record->contract_01 = $data['contract_01'];
                $record->contract_02 = $data['contract_02'];
                $record->contract_03 = $data['contract_03'];

                $record->save();
            }
        }


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Successfully update Sick Leave';

        return $data;
    }

    public function updateCarryForward($r)
    {
        $input = $r->input('carryforward');

        foreach ($input as $id => $data) {
            $record = leaveCarryForwordModel::find($id);

            if ($record) {
                $record->max_duration = $data['max_duration'];
                $record->lapsed_date = $data['lapsed_date'];

                $record->save();
            }
        }


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Successfully update Carry Forward';

        return $data;
    }

    public function weekendview()
    {
        $data = leaveWeekendModel::select(
            'leave_weekend.state_id',
            'location_states.state_name',
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '1' THEN leave_weekend.start_time END)
            ) AS monday_start"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '1' THEN leave_weekend.end_time END)
            ) AS monday_end"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '2' THEN leave_weekend.start_time END)
            ) AS tuesday_start"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '2' THEN leave_weekend.end_time END)
            ) AS tuesday_end"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '3' THEN leave_weekend.start_time END)
            ) AS webnesday_start"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '3' THEN leave_weekend.end_time END)
            ) AS webnesday_end"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '4' THEN leave_weekend.start_time END)
            ) AS thursday_start"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '4' THEN leave_weekend.end_time END)
            ) AS thursday_end"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '5' THEN leave_weekend.start_time END)
            ) AS friday_start"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '5' THEN leave_weekend.end_time END)
            ) AS friday_end"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '6' THEN leave_weekend.start_time END)
            ) AS saturday_start"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '6' THEN leave_weekend.end_time END)
            ) AS saturday_end"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '0' THEN leave_weekend.start_time END)
            ) AS sunday_start"),
            DB::raw("CONCAT(
                MAX(CASE WHEN leave_weekend.day_of_week = '0' THEN leave_weekend.end_time END)
            ) AS sunday_end"),
        )
        ->where('leave_weekend.tenant_id', Auth::user()->tenant_id)
        ->Join('location_states', 'leave_weekend.state_id', '=', 'location_states.id')
        ->groupBy('leave_weekend.state_id')
        ->get();

        return $data;

    }

    public function getstate(){

        $data = State::select('location_states.id', 'location_states.state_name')
        // ->where('leave_weekend.tenant_id', Auth::user()->tenant_id)
        ->whereNull('leave_weekend.state_id')
        ->leftJoin('leave_weekend', 'location_states.id', '=', 'leave_weekend.state_id')
        ->orderBy('location_states.id', 'asc')
        ->get();

        // dd($data);
        // die;


        return $data;

    }

    // public function newRole()
    // {
    //     $data = [];

    //     return $data;
    // }

    public function getstateholiday($id)
    {
        $data = State::select('*')
        ->where('country_id', '=', $id)
        ->orderBy('id', 'asc')
        ->get();

        return $data;
    }

    public function getstateholidaydetail($id)
    {

        $getHoliday = holidayModel::select('*')
            ->where('id', '=', $id)
            ->first();

        $stateIds = explode(',', $getHoliday->state_id); // Memisahkan string menjadi array berdasarkan koma

        $statesFromIds = []; // Array untuk menyimpan data state dari state_id

        foreach ($stateIds as $id) {
            $record = State::find($id); // Mengambil data state berdasarkan ID

            if ($record) {
                $statesFromIds[$record->id] = $record; // Menyimpan data state ke dalam array $statesFromIds dengan kunci ID
            }
        }

        $statesFromQuery = State::select('*')
            ->where('country_id', '=', $getHoliday->country_id)
            ->get(); // Mengambil data state dari query berdasarkan country_id

        $data = []; // Array untuk menyimpan data state

        foreach ($statesFromQuery as $state) {
            if (isset($statesFromIds[$state->id])) {
                $state->checked = true; // Menandai state yang memiliki ID yang sama sebagai tercentang
            }
            $data[] = $state; // Menambahkan state ke dalam array $data
        }

        // dd($data);
        // die;

        return $data;
    }

}


