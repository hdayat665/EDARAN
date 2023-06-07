<?php

namespace App\Http\Controllers\Eleave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\EleaveService;
use Illuminate\Support\Facades\Auth;

class EleaveController extends Controller
{
    public function leaveentitlement()
    {

        return view('pages.eleave.setting.eleaveentitlement');

        // $LE = new EleaveService;

        // $data = $LE->LeaveEntitlementView();
        // $data['user_id'] = Auth::user()->id;
        // $data['employee_id'] = $data['employee']->id;
        // $data['department_id'] = $data['employee']->department;

        // dd($data);

        // return view('pages.eleave.setting.eleaveentitlement', $data);
    }


    public function bulkUploadHoliday(Request $r)
    {
        $es = new EleaveService();

        $result = $es->bulkUploadHoliday($r);

        return response()->json($result);
    }
}