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
}