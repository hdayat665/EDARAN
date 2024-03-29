<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Service\LoginService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
        $result['knowledgeLib'] = $ss->knowledgeLib();
        $result['numberOfObjects'] = $ss->myProject();
        $result['allproject'] = $ss->allproject();
        $result['allEmployee'] = $ss->allEmployee();
        $result['allEmployee'] = $ss->allEmployee();
        $result['unlogdate'] = $ss->getunlogdate();
        // sendGeneralNotification(Auth::user()->id, 'testing send to self');

        // dd($result['allEmployee']);
        return view('pages.dashboard.tenant', $result);
    }

    public function dashboardHost()
    {
        return view('pages.dashboard.host');
    }
}