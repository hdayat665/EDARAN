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
        //$data = [];
        // return view('pages.report.myleave.myleaveReport', $data);

        // $data['myleave'] = $ms->myleaveView();
        // $data['myleaveHistory'] = $ms->myleaveHistoryView();
        // $data['applydate'] = '';
        // $data['typelist'] = '';
        // $data['status_searching'] = '';
        // $data['types'] = $ms->datatype();
        // // $data['mypie'] = $ms->datapie();

        $input = $r->input();
        if($input){
            $data['myleavereport'] = $ms->searchEleaveReport($r);
            // $data['applydate'] = $input['applydate'];
            // $data['typelist'] = $input['typelist'];
            // $data['typelist'] = $input['typelist'];
            // $data['department'] = $input['department'];
            // $data['status_searching'] = $input['status'];

            // dd($data);
            // die;
        }
        
        
        return view('pages.report.myleave.resultEleaveReport',$data);
    }

}
