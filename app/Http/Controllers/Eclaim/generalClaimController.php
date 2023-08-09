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

        $data = $mcs->createGeneralClaim($r, 'draft');
        
        return response()->json($data);
    }
    
    public function submitGeneralClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createGeneralClaim($r, 'active');

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
    public function deletePersonalDetail($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->deletePersonalDetail($id);

        return response()->json($data);
    }
    public function deleteTravelAttachment($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->deleteTravelAttachment($id);

        return response()->json($data);
    }
    public function deleteSubsAttachment($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->deleteSubsAttachment($id);

        return response()->json($data);
    }
    public function deleteTravelDetail($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->deleteTravelDetail($id);

        return response()->json($data);
    }
    public function updateStatusGeneralClaims($id = '',$desc)
    {
        $mcs = new myClaimService;

        $data = $mcs->updateStatusGeneralClaims($id,$desc);

        return response()->json($data);
    }

    public function viewGeneralClaim($id = '')
    {
        $mcs = new myClaimService;

        $data['GNC'] = $mcs->getGeneralClaimDataById($id);
        $data['details'] = getGNCDetailByGeneralId($id);

        return view('pages.eclaim.viewGNC', $data);
    }

    public function getClaimContentById($id = '')
    {
        $data = getClaimContentById($id);

        return response()->json($data);
    }
}