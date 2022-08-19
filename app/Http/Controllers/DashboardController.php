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

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect('/login');
        }
    }

    public function dashboardTenant()
    {
        return view('pages.dashboard.tenant');
    }

    public function dashboardHost()
    {
        return view('pages.dashboard.host');
    }
}
