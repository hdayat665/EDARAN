<?php

namespace App\Http\Controllers\Auth;

use App\Service\LoginService;
use App\Service\RegisterService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    // function __construct()
    // {
    //     Users::
    // }

    public function registerTenant($package = '')
    {
        $data = [];
        $data['package'] = $package;
        return view('pages.auth.registerTenant', $data);
    }

    public function saveRegisterTenant(Request $r)
    {
        $input = $r->input();

        $rs = new RegisterService;

        $data = $rs->saveRegisterTenant($input);

        return response()->json($data);
    }
}
