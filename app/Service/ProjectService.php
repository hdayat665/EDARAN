<?php

namespace App\Service;

use App\Models\Attachments;
use App\Models\Employee;
use App\Models\JobHistory;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectLocation;
use App\Models\ProjectMember;
use App\Models\Subscription;
use App\Models\UserAddress;
use App\Models\UserChildren;
use App\Models\UserCompanion;
use App\Models\UserEmergency;
use App\Models\UserParent;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\UsersDetails;
use App\Models\UserSibling;
use App\Models\Vehicle;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProjectService
{

    public function projectInfoView($status_request = '')
    {
        $tenant_id = Auth::user()->tenant_id;
        $cond[1] = ['a.tenant_id', '=', $tenant_id];

        if ($status_request) {
            $cond[2] = ['a.status_request', '=', $status_request];
        }

        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->select('a.*', 'b.customer_name')
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }


        return $data;
    }

    public function createProject($r)
    {
        $input = $r->input();
        $input['tenant_id'] = Auth::user()->tenant_id;
        $input['LOA_date'] = date_format(date_create($input['LOA_date']), 'Y-m-d');
        $input['contract_start_date'] = date_format(date_create($input['contract_start_date']), 'Y-m-d');
        $input['contract_end_date'] = date_format(date_create($input['contract_end_date']), 'Y-m-d');
        $input['warranty_end_date'] = date_format(date_create($input['warranty_end_date']), 'Y-m-d');
        $input['warranty_start_date'] = date_format(date_create($input['warranty_start_date']), 'Y-m-d');
        $input['bank_guarantee_expiry_date'] = date_format(date_create($input['bank_guarantee_expiry_date']), 'Y-m-d');
        $input['status_request'] = 'new';
        Project::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Project';

        return $data;
    }

    public function getProjectById($id)
    {

        $tenant_id = Auth::user()->tenant_id;

        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->select('a.*', 'b.customer_name')
            ->where([['a.tenant_id', $tenant_id], ['a.id', $id]])
            ->first();

        if (!$data) {
            $data = [];
        }


        return $data;
    }

    public function updateProject($r, $id)
    {
        $input = $r->input();

        Project::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Project';

        return $data;
    }

    public function createProjectLocation($r)
    {
        $input = $r->input();

        ProjectLocation::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Project Location';

        return $data;
    }

    public function getProjectLocation()
    {
        $tenant_id = Auth::user()->tenant_id;

        $data = ProjectLocation::where([['tenant_id', $tenant_id]])->get();

        if (!$data) {
            $data = [];
        }


        return $data;
    }

    public function getProjectLocationById($id)
    {
        $tenant_id = Auth::user()->tenant_id;

        $data = ProjectLocation::where([['tenant_id', $tenant_id], ['id', $id]])->first();

        if (!$data) {
            $data = [];
        }


        return $data;
    }

    public function updateProjectLocation($r, $id)
    {
        $input = $r->input();

        ProjectLocation::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Project Location';

        return $data;
    }

    public function deleteProjectLocation($id)
    {

        $ProjectLocation = ProjectLocation::find($id);

        if (!$ProjectLocation) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'ProjectLocation not found';
        } else {
            $ProjectLocation->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Project Location';
        }

        return $data;
    }

    public function createProjectMember($r)
    {
        $input = $r->input();
        $input['joined_date'] = date_format(date_create($input['joined_date']), 'Y-m-d');
        if ($input['exit_project'] == 'on') {
            $input['exit_project_date'] = date_format(date_create(), 'Y-m-d');
        }
        ProjectMember::create($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create Project Member';

        return $data;
    }

    public function getProjectMember($exit_project = '')
    {
        $tenant_id = Auth::user()->tenant_id;

        $cond[1] = ['a.tenant_id', '=', $tenant_id];
        $cond[2] = ['exit_project', '=', null];

        if ($exit_project) {
            $cond[2] = ['exit_project', '=', $exit_project];
        }

        $data = DB::table('project_member as a')
            ->leftJoin('employment as b', 'a.employee_id', '=', 'b.id')
            ->select('a.*', 'b.employeeName')
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }


        return $data;
    }

    public function getProjectMemberById($id)
    {
        $tenant_id = Auth::user()->tenant_id;

        $data = ProjectMember::where([['tenant_id', $tenant_id], ['id', $id]])->first();

        if (!$data) {
            $data = [];
        }


        return $data;
    }

    public function updateProjectMember($r, $id)
    {
        $input = $r->input();
        $input['joined_date'] = date_format(date_create($input['joined_date']), 'Y-m-d');

        if (isset($input['exit_project'])) {
            $input['exit_project_date'] = date_format(date_create(), 'Y-m-d');
        }
        $input['location'] = implode(',', $input['location']);

        ProjectMember::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Project Member';

        return $data;
    }

    public function assignProjectMember($r)
    {
        $input = $r->input();

        foreach ($input['employee_id'] as $employee_id) {
            $id = $employee_id;
            $update['location'] = implode(',', $input['location']);
            // pr($update);
            ProjectMember::where('id', $id)->update($update);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Assign Project Member';

        return $data;
    }

    public function addRequestProject($r, $project_id)
    {
        $input = $r->input();
        $input['status_request'] = 'pending';
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        $projectMember = ProjectMember::where([['project_id', '=', $project_id], ['employee_id', '=', $employee->id], ['status', '=', 'approve']])->first();

        if ($projectMember) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'You are already in this project';
        } else {
            $input['employee_name'] = $employee->employeeName;
            $input['employee_id'] = $employee->id;
            $input['tenant_id'] = Auth::user()->tenant_id;
            $input['project_id'] = $project_id;
            $input['status'] = 'pending';
            $input['requested_date'] = date_format(date_create(), 'Y-m-d');

            ProjectMember::create($input);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success update Project Request';
        }

        return $data;
    }

    public function projectApprovalData()
    {
        $tenant_id = Auth::user()->tenant_id;
        $cond[1] = ['a.tenant_id', '=', $tenant_id];
        $cond[2] = ['a.status', '=', 'pending'];

        $data = DB::table('project_member as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('customer as d', 'b.customer_id', '=', 'd.id')
            ->leftJoin('employment as e', 'a.employee_id', '=', 'e.id')
            ->leftJoin('department as c', 'e.department', '=', 'c.id')
            ->select('a.*', 'b.project_name', 'b.project_code', 'd.customer_name', 'c.departmentName', 'e.employeeName')
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        // pr($data);
        return $data;
    }

    public function updateStatusProjectMember($r, $id, $status)
    {
        $input = $r->input();
        $input['status'] = $status;

        ProjectMember::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success ' . $status . ' Project Member';

        return $data;
    }

    public function projectRequestView()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        // pr($employee->id);
        $projectMember = ProjectMember::select('project_id')->where('employee_id', '=', $employee->id)->groupBy('project_id')->get();

        foreach ($projectMember as $project) {
            $projectId[] = $project->project_id;
        }

        // $projectIds = implode(',', $projectId);

        // $data = DB::table('project_member as a')
        //     ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
        //     ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')
        //     ->select('b.*', 'c.customer_name')
        //     ->where([['a.employee_id', '!=', $employee->id]])
        //     ->groupBy('b.id')
        //     ->get();

        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->select('a.*', 'b.customer_name')
            ->whereNotIn('a.id', $projectId)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function myProjectView()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        // pr($employee->id);
        $projectMember = ProjectMember::select('project_id')->where('employee_id', '=', $employee->id)->groupBy('project_id')->get();

        foreach ($projectMember as $project) {
            $projectId[] = $project->project_id;
        }

        $data = DB::table('project_member as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')
            ->select('a.location', 'b.*', 'c.customer_name')
            ->where([['a.employee_id', '=', $employee->id]])
            ->get();

        // $data = DB::table('project as a')
        //     ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
        //     ->select('a.*', 'b.customer_name')
        //     ->whereIn('a.id', $projectId)
        //     ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
