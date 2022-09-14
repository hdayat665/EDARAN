<?php

namespace App\Service;

use App\Models\DepartmentTree;
use App\Models\OrganizationChart;
use App\Models\PhoneDirectory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProjectReportService
{
    public function projectListingView()
    {
        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->select('a.*', 'b.customer_name')
            // ->whereNotIn('a.id', $projectId)
            ->where('a.tenant_id', Auth::user()->tenant_id)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function detailsProject($id)
    {
        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->select('a.*', 'b.customer_name')
            // ->whereNotIn('a.id', $projectId)
            ->where([['a.tenant_id', Auth::user()->tenant_id], ['a.id', $id]])
            ->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function projectMemberList($project_id)
    {

        $auth = Auth::user();
        $cond[1] = ['a.tenant_id', '=', $auth->tenant_id];
        $cond[2] = ['a.project_id', '=', $project_id];

        $data = DB::table('project_member as a')
            ->leftJoin('employment as b', 'a.employee_id', '=', 'b.id')
            ->leftJoin('designation as c', 'b.designation', '=', 'c.id')
            ->leftJoin('unit as e', 'b.unit', '=', 'e.id')
            ->leftJoin('branch as d', 'b.branch', '=', 'd.id')
            ->leftJoin('department as f', 'b.department', '=', 'f.id')
            ->select('a.*', 'b.employeeName', 'c.designationName', 'd.branchName', 'e.unitName', 'f.departmentName')
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
}
