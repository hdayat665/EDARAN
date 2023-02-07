<?php

namespace App\Http\Controllers\Eclaim;

use App\Service\myClaimService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class myClaimController extends Controller
{
    public function myClaimView()
    {
        $mcs = new myClaimService;

        $data['claims'] = $mcs->getClaimsData();
        $data['cashClaims'] = $mcs->getCashClaimsData();

        return view('pages.eclaim.myClaim', $data);
    }

    public function generalClaimView()
    {
        $mcs = new myClaimService;

        $data['generalDetail'] = $mcs->getGeneralDetailData();

        return view('pages.eclaim.generalClaim', $data);
    }

    public function cashAdvanceView()
    {
        return view('pages.eclaim.cashAdvance');
    }

    public function newMonthlyClaimView($month = '', $year = '')
    {
        $mcs = new myClaimService;

        $data['cashAdvances'] = $mcs->getCashAdvance();

        $data['travelClaims'] = [];
        $data['personalClaims'] = [];
        $data['month_id'] = $month;
        $data['year'] = $year;

        return view('pages.eclaim.monthlyClaim', $data);
    }

    public function submitPersonalClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createPersonalClaim($r);

        return response()->json($data);
    }

    public function monthClaimEditView($id = '')
    {
        $mcs = new myClaimService;

        $data['cashAdvances'] = $mcs->getCashAdvance();
        $data['travelClaims'] = $mcs->getTravelClaimByGeneralId($id);
        $data['personalClaims'] = $mcs->getPersonalClaimByGeneralId($id);
        $generalClaim = $mcs->getGeneralClaimById($id);
        $data['month'] = $generalClaim->month ?? '';
        $data['year'] = $generalClaim->year ?? '';

        return view('pages.eclaim.monthClaimEditView', $data);
    }

    public function submitTravelClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createTravelClaim($r);

        return response()->json($data);
    }

    public function submitSubsClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createSubsClaim($r);

        return response()->json($data);
    }

    public function submitCaClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createCaClaim($r);

        return response()->json($data);
    }

    public function submitMonthlyClaim($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->updateStatusMonthlyClaim($id, 'paid');

        return response()->json($data);
    }
}