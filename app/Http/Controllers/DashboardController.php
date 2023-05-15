<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Service\LoginService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Service\DashboardService;

class DashboardController extends Controller
{

    public function dashboardTenant()
    {
        $ss = new DashboardService;
        $result['news'] = $ss->newsView();
        $result['events'] = $ss->eventView();
        $result['numberOfObjects'] = $ss->myProject();
        $result['allproject'] = $ss->allproject();
        $result['allEmployee'] = $ss->allEmployee();
        //pr($result);
        return view('pages.dashboard.tenant', $result);
    }

    public function dashboardHost()
    {
        return view('pages.dashboard.host');
    }
}