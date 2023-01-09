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

        $data = $mcs->createGeneralClaim($r);

        return response()->json($data);
    }
}