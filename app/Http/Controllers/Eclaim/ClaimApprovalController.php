<?php

namespace App\Http\Controllers\Eclaim;

use App\Http\Controllers\Controller;
use App\Service\ClaimApprovalService;
use Illuminate\Http\Request;

class ClaimApprovalController extends Controller
{
    public function claimApprovalView()
    {
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->getGeneralClaim();

        $view = getViewForClaimApproval();

        return view('pages.eclaim.claimApproval.' . $view, $data);
    }

    public function updateStatusClaim(Request $r, $id = '', $status,)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateStatusClaim($r, $id, $status);

        return response()->json($data);
    }
}