<?php

namespace App\Http\Controllers\COR;
use App\Http\Controllers\Controller;
use App\Service\CORService;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;



class CORReportController extends Controller
{
    public function corlisting()
    {
        $data = [];
        $data['employeeId'] = '';

        return view('pages.report.cor.correporting', $data);
    }

    public function searchcor(Request $r)
    {
        $data = [];
        $trs = new CORService;
        $input = $r->input();
        // dd($input);
        $requiredKeys = ['selectAS', 'date_range'];

        if(array_diff($requiredKeys, array_keys($input))) {
            return redirect()->back()->withErrors(['message' => 'Please select all dropdown values']);
        }


        if ($input['selectAS'] == '1') {
            $data['employees'] = $trs->getdatabyemployee($input);
            $data['date_range'] = $input['date_range'];
            $view = 'pages.report.cor.employeeReportAll';
        }
     else if($input['selectAS'] == '2'){
            $data['employees'] = $trs->getDataEmployeeSummary($input);
            $data['date_range'] = $input['date_range'];

            $view = 'pages.report.cor.employeeReportAll';
        }

        return view($view, $data);
    }

}
