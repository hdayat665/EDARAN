<?php

namespace App\Http\Controllers\Eclaim;

use App\Service\myClaimService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
        $mcs = new myClaimService;

        $data['user_id'] = Auth::user()->id;
        $data['food'] = $mcs->getFoodByJobGrade($data['user_id']);
        $data['area'] = $mcs->getEntitlementAreaByJobGrade($data['user_id']);
        //pr($data['area']);
        return view('pages.eclaim.cashAdvance');
    }

    public function viewMtcClaim($id = '')
    {
        $mcs = new myClaimService;

        $result = $mcs->viewMtcClaim($id);

        $data['general'] = $result['claim'];
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

        return view('pages.eclaim.ViewClaimDetailMtc', $data);
    }

    public function newMonthlyClaimView($month = '', $year = '')
    {
        $mcs = new myClaimService;

        $data['cashAdvances'] = $mcs->getCashAdvance();

        $data['travelClaims'] = [];
        $data['personalClaims'] = [];
        $data['month_id'] = $month;
        $data['year'] = $year;
        $data['user_id'] = Auth::user()->id;
        $data['car'] = $mcs->getEntitlementByJobGradeCar($data['user_id']);
        $data['food'] = $mcs->getFoodByJobGrade($data['user_id']);
        
        $entitlementArr = json_decode($data['car'], true);

        $firstkmcar = null;
        $firstpricecar = null;
        $secondkmcar = null;
        $secondpricecar = null;
        $thirdkmcar = null;
        $thirdpricecar = null;

        foreach ($entitlementArr as $item) {
            switch ($item['order_km']) {
                case 1:
                    $firstkmcar = $item['km'];
                    $firstpricecar = $item['price'];
                    break;
                case 2:
                    $secondkmcar = $item['km'];
                    $secondpricecar = $item['price'];
                    break;
                case 3:
                    $thirdkmcar = $item['km'];
                    $thirdpricecar = $item['price'];
                    break;
            }
        }

        $data['firstkmcar'] = $firstkmcar;
        $data['firstpricecar'] = $firstpricecar;
        $data['secondkmcar'] = $secondkmcar;
        $data['secondpricecar'] = $secondpricecar;
        $data['thirdkmcar'] = $thirdkmcar;
        $data['thirdpricecar'] = $thirdpricecar;

        $data['motor'] = $mcs->getEntitlementByJobGradeMotor($data['user_id']);
        $entitlementArr = json_decode($data['motor'], true);

        $firstkmmotor = null;
        $firstpricemotor = null;
        $secondkmmotor = null;
        $secondpricemotor = null;
        $thirdkmmotor = null;
        $thirdpricemotor = null;

        foreach ($entitlementArr as $item) {
            switch ($item['order_km']) {
                case 1:
                    $firstkmmotor = $item['km'];
                    $firstpricemotor = $item['price'];
                    break;
                case 2:
                    $secondkmmotor = $item['km'];
                    $secondpricemotor = $item['price'];
                    break;
                case 3:
                    $thirdkmmotor = $item['km'];
                    $thirdpricemotor = $item['price'];
                    break;
            }
        }

        $data['firstkmmotor'] = $firstkmmotor;
        $data['firstpricemotor'] = $firstpricemotor;
        $data['secondkmmotor'] = $secondkmmotor;
        $data['secondpricemotor'] = $secondpricemotor;
        $data['thirdkmmotor'] = $thirdkmmotor;
        $data['thirdpricemotor'] = $thirdpricemotor;
        
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

        $data['GNC'] = $mcs->getGeneralClaimDataById($id);
        $data['details'] = getGNCDetailByGeneralId($id);
        
        $data['cashAdvances'] = $mcs->getCashAdvance();
        $data['travelClaims'] = $mcs->getTravelClaimByGeneralId($id);
        $data['personalClaims'] = $mcs->getPersonalClaimByGeneralId($id);
        $generalClaim = $mcs->getGeneralClaimById($id);
        $data['month'] = $generalClaim->month ?? '';
        $data['year'] = $generalClaim->year ?? '';
        $data['user_id'] = Auth::user()->id ?? '';

        $data['food'] = $mcs->getFoodByJobGrade($data['user_id']);
        //pr($data['food']);
        $data['car'] = $mcs->getEntitlementByJobGradeCar($data['user_id']);

        $entitlementArr = json_decode($data['car'], true);

        $firstkmcar = null;
        $firstpricecar = null;
        $secondkmcar = null;
        $secondpricecar = null;
        $thirdkmcar = null;
        $thirdpricecar = null;

        foreach ($entitlementArr as $item) {
            switch ($item['order_km']) {
                case 1:
                    $firstkmcar = $item['km'];
                    $firstpricecar = $item['price'];
                    break;
                case 2:
                    $secondkmcar = $item['km'];
                    $secondpricecar = $item['price'];
                    break;
                case 3:
                    $thirdkmcar = $item['km'];
                    $thirdpricecar = $item['price'];
                    break;
            }
        }

        $data['firstkmcar'] = $firstkmcar;
        $data['firstpricecar'] = $firstpricecar;
        $data['secondkmcar'] = $secondkmcar;
        $data['secondpricecar'] = $secondpricecar;
        $data['thirdkmcar'] = $thirdkmcar;
        $data['thirdpricecar'] = $thirdpricecar;

        $data['motor'] = $mcs->getEntitlementByJobGradeMotor($data['user_id']);
        $entitlementArr = json_decode($data['motor'], true);

        $firstkmmotor = null;
        $firstpricemotor = null;
        $secondkmmotor = null;
        $secondpricemotor = null;
        $thirdkmmotor = null;
        $thirdpricemotor = null;

        foreach ($entitlementArr as $item) {
            switch ($item['order_km']) {
                case 1:
                    $firstkmmotor = $item['km'];
                    $firstpricemotor = $item['price'];
                    break;
                case 2:
                    $secondkmmotor = $item['km'];
                    $secondpricemotor = $item['price'];
                    break;
                case 3:
                    $thirdkmmotor = $item['km'];
                    $thirdpricemotor = $item['price'];
                    break;
            }
        }

        $data['firstkmmotor'] = $firstkmmotor;
        $data['firstpricemotor'] = $firstpricemotor;
        $data['secondkmmotor'] = $secondkmmotor;
        $data['secondpricemotor'] = $secondpricemotor;
        $data['thirdkmmotor'] = $thirdkmmotor;
        $data['thirdpricemotor'] = $thirdpricemotor;


        
        //pr($data['food']);
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

        $data = $mcs->updateStatusMonthlyClaim($id, 'active');

        return response()->json($data);
    }

    public function appealMtcView()
    {
        $mcs = new myClaimService;

        $data['appealMtc'] = $mcs->getAppealData();
        $data['historyAppeal'] = $mcs->getHistoryAppealData();
        // pr($data);
        return view('pages.eclaim.appealMtc', $data);
    }

    public function createAppealMtc(Request $r)
    {
        $ps = new myClaimService;

        $result = $ps->createAppealMtc($r);

        return response()->json($result);
    }
    public function approveAppealMtc($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->approveAppealMtc($id);

        return response()->json($data);
    }
    public function rejectAppealMtc($id = '')
    {
        $mcs = new myClaimService;

        $data = $mcs->rejectAppealMtc($id);

        return response()->json($data);
    }
    public function cancelGNC($id = '')
    {
        $ps = new myClaimService;

        $result = $ps->cancelGNC($id);

        return response()->json($result);
    }
    
}