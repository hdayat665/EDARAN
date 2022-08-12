<?php

namespace App\Http\Controllers\Auth;

use App\Service\LoginService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function loginView()
    {
        $data['admin'] = 'active';
        return view('pages.auth.loginTenant', $data);
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
}
