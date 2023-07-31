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
    public function monthlyClaimView($id = '')
    { 
        $mcs = new myClaimService;
        $data['GNC'] = $mcs->getGeneralClaimDataById($id);
        $data['user'] = $mcs->getUserData();
        $data['generalDetail'] = $mcs->getGeneralDetailData();
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        $data['cashAdvance'] = $mcs->getCashAdvanceClaimByGeneralId($id) ?? 0;
        $data['cashAdvances'] = $mcs->getUsedCashAdvance($id);
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = Auth::user()->id ?? '';
        $data['lessCash'] = $mcs->getlessCashClaimByGeneralId($id) ?? 0;
        $data['travelClaims'] = $mcs->getTravellingClaimByGeneralId($id) ?? [];
        $data['subsClaims'] = $mcs->getSubsClaimByGeneralId($id) ?? [];
        $data['personalClaims'] = $mcs->getPersonalClaimByGeneralId($id) ?? [];
        $data['car'] = $mcs->getEntitlementByJobGradeCar($data['user_id']);
        $data['travelAttachments'] = $mcs->getTravelAttachmentsByGeneralId($id);
        $data['subsAttachments'] = $mcs->getSubsAttachmentsByGeneralId($id);
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

        $carValue = $data['totalCar'][0]->total_km ??0;

        $ansCar = 0;

        if ($carValue > $firstkmcar) {
            $ansCar += $firstkmcar * $firstpricecar;
            $carValue -= $firstkmcar;

            if ($carValue > $secondkmcar) {
                $ansCar += $secondkmcar * $secondpricecar;
                $carValue -= $secondkmcar;

                $ansCar += $carValue * $thirdpricecar;
            } else {
                $ansCar += $carValue * $secondpricecar;
            }
        } else {
            $ansCar = $carValue * $firstpricecar;
        }

        $data['ansCar']= $ansCar ;


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

        $MotorValue = $data['totalMotor'][0]->total_km ?? 0;

        $ansMotor = 0;

        if ($MotorValue > $firstkmmotor) {
            $ansMotor += $firstkmmotor * $firstpricemotor;
            $MotorValue -= $firstkmmotor;

            if ($MotorValue > $secondkmmotor) {
                $ansMotor += $secondkmmotor * $secondpricemotor;
                $MotorValue -= $secondkmmotor;

                $ansMotor += $MotorValue * $thirdpricemotor;
            } else {
                $ansMotor += $MotorValue * $secondpricemotor;
            }
        } else {
            $ansMotor = $MotorValue * $firstpricemotor;
        }

        $data['ansMotor']= $ansMotor;

        $totalcarmotor = $ansMotor +$ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;

        

        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking +$totalLaundry;
        $totalTravellings = $totalPetrol+$totalParking+$totalToll+$totalcarmotor;
        // Add the sum to the $data array
        $data['sum'] = $sum;
        $data['balance'] = $data['sum'] - $data['cashAdvance'];
        
        if ($data['balance'] < 0) {
            $data['balance'] = 0;
        }
        $data['totalcarmotor'] = $totalcarmotor;
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);

        return view('pages.eclaim.monthlyClaimView', $data);

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
        $data['areas'] = $mcs->getEntitlementArea($data['user_id']);

        $area_data = array('area' => $data['area']);
        $json_area_data = json_encode($area_data);

        return view('pages.eclaim.cashAdvance',$data, compact('data', 'json_area_data'));
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

        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['GNC'] = [];
        $data['travelClaims'] = [];
        $data['personalClaims'] = [];
        $data['subsClaims'] = [];
        $data['summaryOthers'] = [];
        $data['travelAttachments'] = [];
        $data['subsAttachments'] = [];
        $data['month_id'] = $month;
        $data['year'] = $year;
        $data['user_id'] = Auth::user()->id;
        $data['car'] = $mcs->getEntitlementByJobGradeCar($data['user_id']);
        $data['food'] = $mcs->getFoodByJobGrade($data['user_id']);
        $data['travelDate'] = $mcs->getTravelDateClaimByGeneralId();
        $entitlementArr = json_decode($data['car'], true);
        $data['address'] = $mcs->getUserAddress($data['user_id']);

        if ($data['address']) {
            $address = $data['address']['address1'];

            if ($data['address']['address2']) {
                $address .= ', ' . $data['address']['address2'];
            }

            $address .= ', ' . $data['address']['postcode'];
            $address .= ' ' . $data['address']['city'];
            $address .= ', ' . $data['address']['state'];
            $address .= ', ' . $data['address']['country'];

            $data['address'] = $address;
        } else {
            $data['address'] = 'Address not available';
        }
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
    public function getTravelDataByGeneralId($id = '', $date = '')
    {
        // Your code to handle the $id and $date parameters
        $ss = new myClaimService;
        $result = $ss->getTravelDataByGeneralId($id, $date);
        //pr($result);
        return response()->json($result);
    }
    public function getSubsDataByGeneralId($id = '')
    {
        // Your code to handle the $id and $date parameters
        $ss = new myClaimService;
        $result = $ss->getSubsDataByGeneralId($id);
        //pr($result);
        return $result;
    }
    public function updateOtherMtc(Request $r)
    {
        $ps = new myClaimService;

        $result = $ps->updateOtherMtc($r);

        return response()->json($result);
    }
    public function updateSubsMtc(Request $r)
    {
        $ps = new myClaimService;

        $result = $ps->updateSubsMtc($r);

        return response()->json($result);
    }
    public function updateTravelMtc(Request $r,$id = '')
    {
        $ps = new myClaimService;

        $result = $ps->updateTravelMtc($r,$id = '');

        return response()->json($result);
    }
    public function getOthersDataByGeneralId($id = '')
    {
        // Your code to handle the $id and $date parameters
        $ss = new myClaimService;
        $result = $ss->getOthersDataByGeneralId($id);
        //pr($result);
        return $result;
    }
    public function getProjectNameById($id = '')
    {
        // Your code to handle the $id and $date parameters
        $ss = new myClaimService;
        $result = $ss->getProjectNameById($id);
        //pr($result);
        return $result;
    }
    public function getClaimCategoryNameById($id = '')
    {
        // Your code to handle the $id and $date parameters
        $ss = new myClaimService;
        $result = $ss->getClaimCategoryNameById($id);
        //pr($result);
        return $result;
    }

    public function monthClaimEditView($id = '')
    {
        $mcs = new myClaimService;

        $data['GNC'] = $mcs->getGeneralClaimDataById($id);
        // pr($data['GNC']);
        $data['details'] = getGNCDetailByGeneralId($id);

        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['travelClaims'] = $mcs->getTravellingClaimByGeneralId($id);
        $data['travelAttachments'] = $mcs->getTravelAttachmentsByGeneralId($id);
        $data['subsAttachments'] = $mcs->getSubsAttachmentsByGeneralId($id);
        //pr($data['travelAttachments']);
        $data['subsClaims'] = $mcs->getSubsClaimByGeneralId($id);
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['lessCash'] = $mcs->getlessCashClaimByGeneralId($id) ?? 0;
        $data['cashAdvance'] = $mcs->getCashAdvanceClaimByGeneralId($id) ?? 0;
        
        
        //pr($data['balance']);
        //pr($data['summaryTravelling']);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $total_millage = isset($data['summaryTravelling'][0]) ? $data['summaryTravelling'][0]->total_millage : 0;
        //pr($data['totalCar']);
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        //pr($data['summarySubs']);
        $data['travelDate'] = $mcs->getTravelDateClaimByGeneralId($id);
        //pr($data['travelDate']);
        $data['personalClaims'] = $mcs->getPersonalClaimByGeneralId($id);
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        //pr($data['summaryOthers']);




        //
        $generalClaim = $mcs->getGeneralClaimById($id);
        $data['month'] = $generalClaim->month ?? '';
        $data['year'] = $generalClaim->year ?? '';
        $data['user_id'] = Auth::user()->id ?? '';
        $data['address'] = $mcs->getUserAddress($data['user_id']);

        if ($data['address']) {
            $address = $data['address']['address1'];

            if ($data['address']['address2']) {
                $address .= ', ' . $data['address']['address2'];
            }

            $address .= ', ' . $data['address']['postcode'];
            $address .= ' ' . $data['address']['city'];
            $address .= ', ' . $data['address']['state'];
            $address .= ', ' . $data['address']['country'];

            $data['address'] = $address;
        } else {
            $data['address'] = 'Address not available';
        }

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

        $carValue = $data['totalCar'][0]->total_km ??0;

        $ansCar = 0;

        if ($carValue > $firstkmcar) {
            $ansCar += $firstkmcar * $firstpricecar;
            $carValue -= $firstkmcar;

            if ($carValue > $secondkmcar) {
                $ansCar += $secondkmcar * $secondpricecar;
                $carValue -= $secondkmcar;

                $ansCar += $carValue * $thirdpricecar;
            } else {
                $ansCar += $carValue * $secondpricecar;
            }
        } else {
            $ansCar = $carValue * $firstpricecar;
        }

        $data['ansCar']= $ansCar ;


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

        $MotorValue = $data['totalMotor'][0]->total_km ?? 0;

        $ansMotor = 0;

        if ($MotorValue > $firstkmmotor) {
            $ansMotor += $firstkmmotor * $firstpricemotor;
            $MotorValue -= $firstkmmotor;

            if ($MotorValue > $secondkmmotor) {
                $ansMotor += $secondkmmotor * $secondpricemotor;
                $MotorValue -= $secondkmmotor;

                $ansMotor += $MotorValue * $thirdpricemotor;
            } else {
                $ansMotor += $MotorValue * $secondpricemotor;
            }
        } else {
            $ansMotor = $MotorValue * $firstpricemotor;
        }

        $data['ansMotor']= $ansMotor;

        $totalcarmotor = $ansMotor +$ansCar;
        //pr($data['ansMotor']);
        // Calculate the sum of the values
        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;

        

        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking +$totalLaundry;
        $totalTravellings = $totalPetrol+$totalParking+$totalToll+$totalcarmotor;
        // Add the sum to the $data array
        $data['sum'] = $sum;
        $data['balance'] = $data['sum'] - $data['cashAdvance'];
        
        if ($data['balance'] < 0) {
            $data['balance'] = 0;
        }

        $data['totalcarmotor'] = $totalcarmotor;
        //pr($data['totalcarmotor']);
        $data['totalTravellings'] = $totalTravellings;
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
    public function saveTravellingAttachment(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->saveTravellingAttachment($r);

        return response()->json($data);
    }
    public function updateCashMtc(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->updateCashMtc($r);

        return response()->json($data);
    }
    
    public function saveSubsAttachment(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->saveSubsAttachment($r);

        return response()->json($data);
    }
    public function submitCaClaim(request $r)
    {
        $mcs = new myClaimService;

        $data = $mcs->createCaClaim($r);

        return response()->json($data);
    }

    public function submitMonthlyClaim(request $r, $id = '')
    {
        $mcs = new myClaimService;
        
        $data = $mcs->updateStatusMonthlyClaim($id, 'active',$r);

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
    public function cancelMTC($id = '')
    {
        $ps = new myClaimService;

        $result = $ps->cancelMTC($id);

        return response()->json($result);
    }
    public function getStartTimeDrop($id = '')
    {   
        $ps = new myClaimService;

        $data = $ps->getStartTimeDrop($id);

        return response()->json($data);
    }
    public function getEndTimeDrop($id = '')
    {   
        $ps = new myClaimService;

        $data = $ps->getEndTimeDrop($id);

        return response()->json($data);
    }
}
