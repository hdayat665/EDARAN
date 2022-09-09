<?php

namespace App\Service;

use App\Models\Attachments;
use App\Models\Employee;
use App\Models\JobHistory;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectLocation;
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

    public function projectInfoView()
    {

        $tenant_id = Auth::user()->tenant_id;

        $data['projectInfos'] = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->select('a.*', 'b.customer_name')
            ->where('a.tenant_id', $tenant_id)
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

}
