<?php

namespace App\Http\Controllers\Report;

use App\Service\EleaveReportService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



class EleaveReportController extends Controller
{
     public function leaveReportView()
    {
        $ms = new EleaveReportService;
        $data['types'] = $ms->datatype();
        $data['employer'] = $ms->dataemployer();
        $data['department'] = $ms->datadepartment();

        // dd($data['department'], $data['employer']);
        // die;
        return view('pages.report.myleave.myleaveReport', $data);
    }

    public function searchEleaveReport(Request $r)
    {
        $ms = new EleaveReportService;
        $input = $r->input();
        if($input){
            $data['myleavereport'] = $ms->searchEleaveReport($r);
        }

        return view('pages.report.myleave.resultEleaveReport',$data);
    }

}
