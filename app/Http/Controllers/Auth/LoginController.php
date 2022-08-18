<?php

namespace App\Http\Controllers\Auth;

use App\Service\LoginService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // $user = Auth::check();
        // dd($user);
        return view('home');
    }

    public function loginView()
    {
        $data = [];
        return view('pages.auth.loginTenant', $data);
    }

    public function loginHostView()
    {
        $data = [];
        return view('pages.auth.loginHost', $data);
    }

    public function domainView()
    {
        $data['domain'] = 'active';
        return view('pages.auth.loginDomain', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function registerView()
    {
        $data = [];
        $data['countrys'] = getCountryRegisterDomain();
        $data['register'] = 'active';
        return view('pages.auth.register', $data);
    }

    public function verifiedView($id = '')
    {

        $ls = new LoginService();

        $ls->verifiedAcc($id);

        return view('pages.auth.verified');
    }

    public function forgotPassView()
    {
        $data = [];
        $data['forgotPass'] = 'active';
        return view('pages.auth.forgotPassword', $data);
    }

    public function resetPassView($user_id = '')
    {
        $data = [];
        $data['user_id'] = $user_id;

        return view('pages.auth.resetPassword', $data);
    }

    public function forgotDomainView()
    {
        $data = [];

        return view('pages.auth.forgotDomain', $data);
    }

    public function loginAdminView()
    {
        $data = [];

        return view('pages.auth.loginAdmin', $data);
    }

    public function loginTenant(Request $r)
    {
        $ls = new LoginService;

        $cred = $r->validate([
            'username'=>'required|email|exists:users',
            'password'=>'required|min:3',
            'tenant' => ''
        ]);

        $login = $ls->login($cred);

        return \response()->json([
            'title'=>$login['title'],
            'type'=>$login['type'],
            'msg'=>$login['msg'],
            // 'data' => $tenant ?? null
        ], 200);
    }

    public function loginHost(Request $r)
    {
        $ls = new LoginService;

        $cred = $r->validate([
            'username'=>'required|email|exists:users',
            'password'=>'required|min:3',
            'type'=>'exists:users,type'
        ]);

        $login = $ls->login($cred,'host');

        return \response()->json([
            'title'=>$login['title'],
            'type'=>$login['type'],
            'msg'=>$login['msg'],
            // 'data' => $tenant ?? null
        ], 200);
    }

    public function checkTenant(Request $r)
    {
        $input = $r->input();
        $ls = new LoginService;

        $data = $ls->checkTenantName($input);

        $title = 'Error!';
        $type = 'error';
        $msg = 'Tenant found!';

        if ($data) {
            $tenant = $data->tenant;
            $title = 'Success';
            $type = 'success';
            $msg = 'Tenant found!';
        }

        return \response()->json([
            'title'=>$title,
            'type'=>$type,
            'msg'=>$msg,
            'data' => $tenant ?? null
        ], 200);

    }

    public function logoutTenant($type = '')
    {
        if ($type == 'tenant') {
            return view('pages.auth.loginTenant');
        }else{
            return view('pages.auth.loginHost');
        }
    }

    public function selectPackage()
    {
        return view('pages.auth.package');
    }
}
