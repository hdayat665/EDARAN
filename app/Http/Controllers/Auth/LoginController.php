<?php

namespace App\Http\Controllers\Auth;

use App\Service\LoginService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function loginView()
    {
        return view('pages.auth.login');
    }

    public function domainView()
    {
        return view('pages.auth.domain');
    }

    public function about()
    {
        return view('about');
    }

    public function registerView()
    {
        $data = [];
        $data['countrys'] = getCountryRegisterDomain();
        return view('pages.auth.register', $data);
    }

    public function verifiedView($id = '')
    {

        $ls = new LoginService();

        $ls->verifiedAcc($id);

        return view('pages.auth.verified');
    }

    public function sendEmailRegister()
    {
        $receiver = '';
         // send email
         $data['typeEmail'] = 'register';
         $data['name'] = '';
         $data['from'] = "no-reply@pr1ma.my";
         $data['nameFrom'] = "PRIMA";
         $data['subject'] = "Your have new inquiry from PR1MA website";
         $data['receiver'] = $receiver ?? null;
         $data['cc'] = "pr1ma.wwwmaster@gmail.com";
         $data['typeAttachment'] = "application/pdf";
         $data['file'] = \public_path()."/assets/frontend/docs/gambar.jpg";

         \Mail::to($receiver)->send(new Mail($data));
    }

    public function forgotPassView()
    {
        return view('pages.auth.forgotPassword');
    }
}
