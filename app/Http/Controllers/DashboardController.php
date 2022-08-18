<?php

namespace App\Http\Controllers;

use App\Service\LoginService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    // function __construct()
    // {
    //     Users::
    // }

    public function dashboardTenant()
    {
        return view('pages.dashboard.tenant');
    }

    public function dashboardHost()
    {
        return view('pages.dashboard.host');
    }
}
