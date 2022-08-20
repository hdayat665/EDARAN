<?php

namespace App\Http\Controllers;

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


}
