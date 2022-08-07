<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Service\LoginService;

class AjaxController extends Controller
{
    public function ajaxRegisterSave(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $save = $ls->saveRegister($input);

        echo json_encode($save);
    }

    public function ajaxLogin(Request $r)
    {
        $input = $r->input();

        $ls = new LoginService();

        $check = $ls->checkLogin($input);

        echo json_encode($check);
    }
}
