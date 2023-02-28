<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Service\EclaimReportService;

class EclaimReportController extends Controller
{
    public function eclaimListingView()
    {
        // $data = [];

        // $prs = new ProjectReportService;

        // $data['projectListings'] = $prs->eclaimListingView();

        return view('pages.report.eclaim.eclaimListing');
    }
    public function reportAllView()
    {
        $data = [];

        $prs = new EclaimReportService;

        $report_data = $prs->searchReportAll();

        $data['allClaims'] = $report_data['general_claims'];
        $data['cash_advance'] = $report_data['cash_advance'];
        
        //$data['allClaims'] = $prs->searchReportAll();

        //pr($data['cash_advance']);
        // pr($data['allClaims']);
        return view('pages.report.eclaim.filter.reportAll',$data);
    }
}