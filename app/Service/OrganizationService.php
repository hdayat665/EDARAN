<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

use App\Models\DepartmentTree;
use App\Models\OrganizationChart;
use App\Models\PhoneDirectory;
use App\Models\Policy;
use App\Models\SOP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrganizationService
{
    public function getPhoneDirectory()
    {
        $data = [];
        $data['data'] = PhoneDirectory::all();
        $data['status'] = true;
        $data['msg'] = 'Success Get PhoneDirectory';

        return $data;
    }

    public function getOrganizationChart()
    {
        $data = [];
        $data['data'] = OrganizationChart::all();
        $data['status'] = true;
        $data['msg'] = 'Success Get OrganizationChart';

        return $data;
    }

    public function getDepartmentTree()
    {
        $data = [];
        $data['data'] = DepartmentTree::all();
        $data['status'] = true;
        $data['msg'] = 'Success Get DepartmentTree';

        return $data;
    }

    public function sopView()
    {
        $data['SOPs'] = SOP::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();
        $data['policys'] = Policy::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();

        return $data;
    }


    public function getPhoneDirectoryInfo()
    {
        $userId = Auth::user()->tenant_id;
        $data = [];
        $data['status'] = true;
        $data['msg'] = 'Success Get User Employment';
        $data['data'] = DB::table('employment as a')
        ->leftjoin('userProfile as b', 'a.user_id', '=', 'b.user_id')
        ->leftjoin('department as c', 'a.department', '=', 'c.id')
        ->leftjoin('designation as d', 'd.id', '=', 'a.designation')
        ->select('a.id', 'a.employeeId', 'a.user_id', 'a.department', 'a.workingEmail', 'b.firstName', 'b.lastName', 'b.personalEmail as email', 'b.phoneNo', 'b.extensionNo', 'c.departmentName as department', 'a.supervisor', 'a.report_to', 'a.status', 'd.designationName')
        ->where([['a.tenant_id', $userId], ['status', '=', 'active']])
        ->get();
        return $data;
    }

}
