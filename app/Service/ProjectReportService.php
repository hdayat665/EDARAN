<?php

namespace App\Service;

use App\Models\DepartmentTree;
use App\Models\OrganizationChart;
use App\Models\PhoneDirectory;
use App\Models\Project;
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
            ->orderBy('id', 'desc')
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

    public function getProjectByCustomerId($customer_id = '')
    {
        $tenant_id = Auth::user()->tenant_id;

        $data = Project::where([['tenant_id', $tenant_id], ['customer_id', $customer_id]])->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function searchReportAll()
    {
        $data = [];

        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.acc_manager', '=', 'c.id')
            ->leftJoin('employment as d', 'a.project_manager', '=', 'd.id')
            ->select('a.*', 'b.customer_name', 'c.employeeName as acc_manager_name', 'd.employeeName as project_manager_name')
            // ->whereNotIn('a.id', $projectId)
            ->where([['a.tenant_id', Auth::user()->tenant_id]])
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;

    }

    public function searchReportCustName($param)
    {
        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.acc_manager', '=', 'c.id')
            ->leftJoin('employment as d', 'a.project_manager', '=', 'd.id')
            ->select('a.*', 'b.customer_name', 'c.employeeName as acc_manager_name', 'd.employeeName as project_manager_name')
            // ->whereNotIn('a.id', $projectId)
            ->where([['a.tenant_id', Auth::user()->tenant_id],['customer_id', $param['customerName']]])
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;

    }

    public function searchReportFinYear($param)
    {

        $cond[1] = ['a.tenant_id', '=', Auth::user()->tenant_id];
        if($param['financialYear'])
        {
            $cond[2] = ['a.financial_year', '=', $param['financialYear']];
        }

        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.acc_manager', '=', 'c.id')
            ->leftJoin('employment as d', 'a.project_manager', '=', 'd.id')
            ->select('a.*', 'b.customer_name', 'c.employeeName as acc_manager_name', 'd.employeeName as project_manager_name')
            // ->whereNotIn('a.id', $projectId)
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;

    }

    public function searchReportAccManager($param)
    {

        $cond[1] = ['a.tenant_id', '=', Auth::user()->tenant_id];
        if($param['accManager'])
        {
            $cond[2] = ['a.acc_manager', '=', $param['accManager']];
        }

        if($param['projectManager'])
        {
            $cond[2] = ['a.project_manager', '=', $param['projectManager']];
        }

        if($param['statusProject'])
        {
            $cond[2] = ['a.status', '=', $param['statusProject']];
        }

        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.acc_manager', '=', 'c.id')
            ->leftJoin('employment as d', 'a.project_manager', '=', 'd.id')
            ->select('a.*', 'b.customer_name', 'c.employeeName as acc_manager_name', 'd.employeeName as project_manager_name')
            // ->whereNotIn('a.id', $projectId)
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;

    }


    public function searchReportEmpName($param)
    {
        $auth = Auth::user();
        $cond[1] = ['a.tenant_id', '=', $auth->tenant_id];

        if ($param['department']) {
            $cond[2] = ['d.department', '=', $param['department']];
            if ($param['employee']) {
                $cond[3] = ['a.employee_id', '=', $param['employee']];
            }
        }

        $data = DB::table('project_member as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')
            ->leftJoin('employment as d', 'a.employee_id', '=', 'd.id')
            ->leftJoin('branch as e', 'd.branch', '=', 'e.id')
            ->leftJoin('department as f', 'd.department', '=', 'f.id')
            ->leftJoin('unit as g', 'd.unit', '=', 'g.id')
            ->leftJoin('designation as h', 'd.designation', '=', 'h.id')
            ->select('a.*', 'b.project_name', 'b.project_code', 'b.status', 'c.customer_name', 'd.employeeName', 'e.branchName', 'f.departmentName', 'g.unitName', 'h.designationName')
            // ->whereNotIn('a.id', $projectId)
            ->where($cond)
            ->get();

        if (!$data) {
            $data = [];
        }

        return $data;

    }

    public function searchReportProjName($param)
    {
        $data = DB::table('project as a')
            ->leftJoin('customer as b', 'a.customer_id', '=', 'b.id')
            ->leftJoin('employment as c', 'a.acc_manager', '=', 'c.id')
            ->leftJoin('employment as d', 'a.project_manager', '=', 'd.id')
            ->leftJoin('branch as e', 'c.branch', '=', 'e.id')
            ->leftJoin('department as f', 'c.department', '=', 'f.id')
            ->leftJoin('branch as g', 'd.branch', '=', 'g.id')
            ->leftJoin('department as h', 'd.department', '=', 'h.id')
            ->select('a.*', 'b.customer_name',
                    'c.employeeName as acc_manager_name',
                    'e.branchName as acc_manager_branch',
                    'f.departmentName as acc_manager_department',
                    'd.employeeName as project_manager_name',
                    'g.branchName as project_manager_branch',
                    'h.departmentName as project_manager_department',
                    )
            // ->whereNotIn('a.id', $projectId)
            ->where([['a.tenant_id', Auth::user()->tenant_id],['customer_id', $param['customerNameProject']],['a.id', $param['projectName']]])
            ->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function getProjectMember($param)
    {
        $data = DB::table('project_member as a')
        ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
        ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')
        ->leftJoin('employment as d', 'a.employee_id', '=', 'd.id')
        ->leftJoin('branch as e', 'd.branch', '=', 'e.id')
        ->leftJoin('department as f', 'd.department', '=', 'f.id')
        ->leftJoin('unit as g', 'd.unit', '=', 'g.id')
        ->leftJoin('designation as h', 'd.designation', '=', 'h.id')
        ->select('a.*', 'b.project_name', 'b.project_code', 'b.status', 'c.customer_name', 'd.employeeName', 'e.branchName', 'f.departmentName', 'g.unitName', 'h.designationName')
        // ->whereNotIn('a.id', $projectId)
        ->where([['a.tenant_id', Auth::user()->tenant_id],['project_id', $param['projectName']]])
        ->get();

        if (!$data) {
            $data = [];
        }

        return $data;
    }

}
