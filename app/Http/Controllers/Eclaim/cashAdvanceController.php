<?php

namespace App\Http\Controllers\Eclaim;

use App\Service\myClaimService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class cashAdvanceController extends Controller
{
    public function createCashAdvance(Request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createCashAdvance($r, 'amend');

        return response()->json($data);
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

    public function viewCashAdvance($id = '')
    {

        $mcs = new myClaimService;

        $data['cashClaim'] = $mcs->getCashAdvanceById($id);

        return view('pages.eclaim.viewCashAdvance', $data);
    }
}