<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Service\EclaimReportService;
use Illuminate\Http\Request;


class EclaimReportController extends Controller
{
    public function eclaimListingView()
    {
        $data = [];

        return view('pages.report.eclaim.eclaimListing', $data);
    }

    public function reportAllView(Request $r)
    {
      

        $data = [];
        $trs = new EclaimReportService;
        $input = $r->input();

        $requiredKeys = ['category', 'default-date'];
        if(array_diff($requiredKeys, array_keys($input))) {
            return redirect()->back()->withErrors(['message' => 'Please select all dropdown values']);
        }

        if ($input['category'] == '') {
            $report_data = $trs->searchReportAll($input);
            $data['allClaims'] = $report_data['general_claims'];
            // $data['cash_advance'] = $report_data['cash_advance'];
            $data['default-date'] = $input['default-date'];
            

            $view = 'pages.report.eclaim.filter.reportAll';
        }
        else if($input['category'] == '1'){
            $report_data = $trs->searchReportAll($input);
            $data['allClaims'] = $report_data['general_claims'];
            // $data['cash_advance'] = $report_data['cash_advance'];
            $data['default-date'] = $input['default-date'];

            // pr($data['allClaims']);

            $view = 'pages.report.eclaim.filter.reportAll';
        }

        else if($input['category'] == '2'){
            $report_data = $trs->searchReportAll($input);
            $data['allClaims'] = $report_data['general_claims'];
            // $data['cash_advance'] = $report_data['cash_advance'];
            $data['default-date'] = $input['default-date'];

            // pr($data['allClaims']);

            $view = 'pages.report.eclaim.filter.reportAll';
        }
        else if($input['category'] == '3'){
            $report_data = $trs->searchReportAll($input);
            $data['allClaims'] = $report_data['general_claims'];
            // $data['cash_advance'] = $report_data['cash_advance'];
            $data['default-date'] = $input['default-date'];

            // pr($data['allClaims']);

            $view = 'pages.report.eclaim.filter.reportAll';

        }

        else if($input['category'] == '4'){
            $report_data = $trs->searchReportAll($input);
            $data['allClaims'] = $report_data['general_claims'];
            // $data['cash_advance'] = $report_data['cash_advance'];
            $data['default-date'] = $input['default-date'];

            // pr($data['allClaims']);

            $view = 'pages.report.eclaim.filter.reportAll';

        }
  
        return view($view, $data);
        
    }

}