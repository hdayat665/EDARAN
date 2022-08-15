<?php

namespace App\Http\Controllers\hris;

use Illuminate\Routing\Controller;

class ProfileController extends Controller
{

    public function profile()
    {
        $data = [];

        return view('pages.HRIS.profile',$data);
    }
}
