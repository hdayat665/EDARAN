<?php

namespace App\Http\Controllers\HRIS;

use App\Service\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function addEmployee(Request $r)
    {
        $ps = new EmployeeService;

        $result = $ps->addEmployee($r);

        return response()->json($result['msg']);
    }
}
