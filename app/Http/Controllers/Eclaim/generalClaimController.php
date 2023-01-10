<?php

namespace App\Http\Controllers\Eclaim;

use App\Http\Controllers\Controller;
use App\Service\myClaimService;
use Illuminate\Http\Request;

class generalClaimController extends Controller
{
    public function createGeneralClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createGeneralClaim($r, 'amend');

        return response()->json($data);
    }

    public function submitGeneralClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createGeneralClaim($r, 'paid');

        return response()->json($data);
    }

    public function editGeneralClaimView($id = '')
    {
        $mcs = new myClaimService;

        $data['GNC'] = $mcs->getGeneralClaimDataById($id);
        $data['details'] = getGNCDetailByGeneralId($id);

        return view('pages.eclaim.editGNC', $data);
    }

    public function updateGeneralClaim(request $r, $id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->updateGeneralClaim($r, $id);

        return response()->json($data);
    }

    public function deleteGNCDetail($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->deleteGNCDetail($id);

        return response()->json($data);
    }

    public function updateStatusGeneralClaims($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->updateStatusGeneralClaims($id);

        return response()->json($data);
    }
}