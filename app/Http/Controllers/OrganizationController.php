<?php

namespace App\Http\Controllers;

use App\Service\EmployeeService;

use App\Service\OrganizationService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{

    public function getPhoneDirectory()
    {
        $ss = new OrganizationService;

        $result = $ss->getPhoneDirectory();

        return response()->json($result);
    }

    public function getOrganizationChart()
    {
        $ss = new OrganizationService;

        $result = $ss->getOrganizationChart();

        return response()->json($result);
    }

    public function getDepartmentTree()
    {
        $ss = new OrganizationService;

        $result = $ss->getDepartmentTree();

        return response()->json($result);
    }

    public function phoneDirectoryView()
    {
        // return view('pages.org.phone');
        $ps = new OrganizationService;

        $data['phoneDirectoryInfos'] = $ps->getPhoneDirectoryInfo()['data'];

        return view('pages.org.phone',$data);
    }

    public function policysopView()
    {
        $ss = new OrganizationService;

        $result = $ss->sopView();

        // return view('pages.setting.sop', $result);
        return view('pages.org.soppolicy', $result);
    }

    public function chartView()
    {
        return view('pages.org.chart');
    }

    public function treeView()
    {
        return view('pages.org.departmentTree');
    }


}
