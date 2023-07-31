<?php

namespace App\Http\Controllers\Eclaim;

use App\Http\Controllers\Controller;
use App\Service\ClaimApprovalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimApprovalController extends Controller
{
    public function claimApprovalView($type = '')
    { 
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->getGeneralClaim($type);
        $data['config'] = $mcs->getApprovalConfig($type, 'monthly');
        $data['date'] = $mcs->getBucketDate();
        
        $view = getViewForClaimApproval($type);

        return view('pages.eclaim.claimApproval.' . $view, $data);
    }

    public function updateStatusClaim(Request $r, $id = '', $status, $stage)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateStatusClaim($r, $id, $status, $stage);

        return response()->json($data);
    }

    public function updateStatusGncClaim(Request $r, $id = '', $status, $stage)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateStatusGncClaim($r, $id, $status, $stage);

        return response()->json($data);
    }

    public function updateStatusPersonalClaim(Request $r, $id = '', $status, $stage)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateStatusPersonalClaim($r, $id, $status, $stage);

        return response()->json($data);
    }

    public function updateStatusTravelClaim(Request $r, $id = '', $status, $stage)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateStatusTravelClaim($r, $id, $status, $stage);

        return response()->json($data);
    }

    public function supervisorDetailClaimView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['user'] = $mcs->getUserData($data['general']->user_id);
        $data['generalDetail'] = $mcs->getGeneralDetailData();
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = $data['general']->user_id ?? '';
        
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
        $data['totalcarmotor'] = $totalcarmotor;
        
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);

        return view('pages.eclaim.claimApproval.supervisorClaimDetail', $data);
    }

    public function hodDetailClaimView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['user'] = $mcs->getUserData($data['general']->user_id);
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
 
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['lessCash'] = $mcs->getlessCashClaimByGeneralId($id) ?? 0;
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = $data['general']->user_id ?? '';
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
        $data['totalcarmotor'] = $totalcarmotor;
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);

        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

        if ($data['general']->claim_type == 'MTC') {
            $view = 'hodClaimDetailMtc';
        } else {
            $view = 'hodClaimDetailGnc';
        }
        
        return view('pages.eclaim.claimApproval.' . $view, $data);
    }

    public function financeCheckerDetail($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['checkers'] = getFinanceChecker();
        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['user'] = $mcs->getUserData($data['general']->user_id);
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
 
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['lessCash'] = $mcs->getlessCashClaimByGeneralId($id) ?? 0;
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = $data['general']->user_id ?? '';
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
        $data['totalcarmotor'] = $totalcarmotor;
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);

        if ($data['general']->claim_type == 'MTC') {
            $view = 'financeCheckerMtc';
        } else {
            $view = 'financeCheckerGnc';
        }

        return view('pages.eclaim.claimApproval.finance.checker.' . $view, $data);
    }

    public function adminCheckerDetail($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['checkers'] = getAdminChecker();
        $data['general'] = $result['claim'];
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

        // if ($data['general']->claim_type == 'MTC') {
        //     $view = 'adminCheckerMtc';
        // } else {
        //     $view = 'financeCheckerGnc';
        // }
        $view = 'adminCheckerMtc';

        return view('pages.eclaim.claimApproval.admin.checker.' . $view, $data);
    }


    public function financeAppDetailClaimView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['user'] = $mcs->getUserData($data['general']->user_id);
        $data['generalDetail'] = $mcs->getGeneralDetailData();
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = $data['general']->user_id ?? '';
        
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
        $data['totalcarmotor'] = $totalcarmotor;
        
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);

        if ($data['general']->claim_type == 'MTC') {
            $view = 'fapprovalMtc';
        } else {
            $view = 'fapprovalGnc';
        }

        return view('pages.eclaim.claimApproval.finance.approval.' . $view, $data);
    }

    public function adminApprovalDetail($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['user'] = $mcs->getUserData($data['general']->user_id);
        $data['generalDetail'] = $mcs->getGeneralDetailData();
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = $data['general']->user_id ?? '';
        
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
        $data['totalcarmotor'] = $totalcarmotor;
        
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);

        // if ($data['general']->claim_type == 'MTC') {
        $view = 'adminApprovalDetailMtc';
        // } else {
        //     $view = 'fapprovalGnc';
        // }

        return view('pages.eclaim.claimApproval.admin.approval.' . $view, $data);
    }

    public function financeCheckerView()
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->financeCheckerView();
        $data['check'] = $result['check'];
        $data['claims'] = $result['general'];
        $data['config'] = $mcs->getApprovalConfig(6, 'monthly');
        $view = 'financeChecker';

        return view('pages.eclaim.claimApproval.finance.checker.' . $view, $data);
    }

    public function adminCheckerView()
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->adminCheckerView();
        $data['config'] = $mcs->getApprovalConfig(3, 'monthly');
        $data['check'] = $result['check'];
        $data['claims'] = $result['general'];

        $view = 'adminChecker';

        return view('pages.eclaim.claimApproval.admin.checker.' . $view, $data);
    }



    public function financeRecView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(7, 'monthly');
        $data['claims'] = $mcs->financeRecView();

        $view = 'financeRec';

        return view('pages.eclaim.claimApproval.finance.recommender.' . $view, $data);
    }

    public function adminRecView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(4, 'monthly');
        $data['claims'] = $mcs->adminRecView();

        $view = 'adminRec';

        return view('pages.eclaim.claimApproval.admin.recommender.' . $view, $data);
    }


    public function financeApprovalView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(8, 'monthly');
        $data['claims'] = $mcs->financeRecView();
        //pr($data['config']);
        $view = 'fapproval';

        return view('pages.eclaim.claimApproval.finance.approval.' . $view, $data);
    }

    public function adminApprovalView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(5, 'monthly');
        $data['claims'] = $mcs->adminRecView();

        $view = 'adminApproval';

        return view('pages.eclaim.claimApproval.admin.approval.' . $view, $data);
    }

    public function financeRecDetailClaimView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['user'] = $mcs->getUserData($data['general']->user_id);
        $data['generalDetail'] = $mcs->getGeneralDetailData();
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = $data['general']->user_id ?? '';
        
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
        $data['totalcarmotor'] = $totalcarmotor;
        
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);

        // pr($data['gncs']);
        if ($data['general'] != null && $data['general']->claim_type == 'MTC') {
            $view = 'financeRecMtc';
        } else {
            $view = 'financeRecGnc';
        }

        return view('pages.eclaim.claimApproval.finance.recommender.' . $view, $data);
    }

    public function adminRecDetailView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);
        
        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getCashAdvancePaid();
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['user'] = $mcs->getUserData($data['general']->user_id);
        $data['generalDetail'] = $mcs->getGeneralDetailData();
        $data['claimData'] = $mcs->getGeneralClaimDataById($id);
        $data['getadmin'] = $mcs->getDomainRoleAdmin();
        $data['getfinance'] = $mcs->getDomainRoleFinance();
        $data['summaryTravelling'] = $mcs->getSummaryTravellingClaimByGeneralId($id) ?? 0;
        $data['summarySubs'] = $mcs->getSummarySubsClaimByGeneralId($id);
        
        $data['summaryOthers'] = $mcs->getSummaryOthersByGeneralId($id);
        $data['totalCar'] = $mcs->getTotalCarClaimByGeneralId($id) ?? 0;
        $data['totalMotor'] = $mcs->getTotalMotorClaimByGeneralId($id) ?? 0;
        $data['user_id'] = $data['general']->user_id ?? '';
        
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
        $data['totalcarmotor'] = $totalcarmotor;
        
        $data['totalTravellings'] = $totalTravellings;
        //pr($data['totalcarmotor']);
        $data['details'] = getGNCDetailByGeneralId($id);
        // if ($data['general']->claim_type == 'MTC') {
        $view = 'adminRecDetail';
        // } else {
        // $view = 'financeRecGnc';
        // }

        return view('pages.eclaim.claimApproval.admin.recommender.' . $view, $data);
    }

    public function getPersonalById($id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->getPersonalById($id);

        return response()->json($data);
    }

    public function getTravelById($id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->getTravelById($id);

        return response()->json($data);
    }

    public function getGncById($id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->getGncById($id);

        return response()->json($data);
    }

    public function createPvNumber($id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->createPvNumber($id);

        return response()->json($data);
    }

    public function createPvNumberCa($id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->createPvNumberCa($id);

        return response()->json($data);
    }


    public function cashAdvanceApproverView()
    {
        $mcs = new ClaimApprovalService;

        $data['cas'] = $mcs->cashAdvanceApprovalView();

        $view = 'cashAdvanceApprover';

        return view('pages.eclaim.claimApproval.cashAdvance.approver.' . $view, $data);
    }

    public function cashAdvanceApproverDetail($type = '', $id = '')
    {
        $mcs = new ClaimApprovalService;

        $data['ca'] = $mcs->cashAdvanceApproverDetail($id);
        $data['mode'] = $mcs->cashAdvanceApproverModeTransport($id);
        // 1 other outside 2 other non outside 3 project outside 4 project non outside
        //pr($data['mode']);
        if ($type == 1) {
            $view = 'projectOutside';
        } elseif ($type == 2) {
            $view = 'projectNonOutside';
        } elseif ($type == 3) {
            $view = 'otherOutside';
        } else {
            $view = 'otherNonOutside';
        }

        return view('pages.eclaim.claimApproval.cashAdvance.approver.' . $view, $data);
    }

    public function updateStatusCashAdvance(Request $r, $id = '', $status, $stage)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateStatusCashAdvance($r, $id, $status, $stage);

        return response()->json($data);
    }

    public function cashAdvanceFcheckerView()
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->cashAdvanceFcheckerView();
        $data['check'] = $result['check'];
        $data['cas'] = $result['general'];

        $view = 'financeChecker';

        return view('pages.eclaim.claimApproval.cashAdvance.finance.checker.' . $view, $data);
    }

    public function cashAdvanceFcheckerDetail($type = '', $id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->cashAdvanceFcheckerDetail($id);
        $data['checkers'] = getFinanceChecker();
        $data['ca'] = $result['general'];
        $data['check'] = $result['check'];
        // pr($data['check']);
        // 1 other outside 2 other non outside 3 project outside 4 project non outside

        if ($type == 1) {
            $view = 'projectOutside';
        } elseif ($type == 2) {
            $view = 'projectNonOutside';
        } elseif ($type == 3) {
            $view = 'otherOutside';
        } else {
            $view = 'otherNonOutside';
        }

        return view('pages.eclaim.claimApproval.cashAdvance.finance.checker.' . $view, $data);
    }

    public function cashAdvanceFapproverView()
    {
        $mcs = new ClaimApprovalService;

        $data['cas'] = $mcs->cashAdvanceFapproverView();

        $view = 'financeApprover';

        return view('pages.eclaim.claimApproval.cashAdvance.finance.approver.' . $view, $data);
    }

    public function cashAdvanceFapproverDetail($type = '', $id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->cashAdvanceFcheckerDetail($id);
        $data['ca'] = $result['general'];

        $data['check'] = $result['check'];
        // pr($data['check']);
        // 1 other outside 2 other non outside 3 project outside 4 project non outside

        if ($type == 1) {
            $view = 'projectOutside';
        } elseif ($type == 2) {
            $view = 'projectNonOutside';
        } elseif ($type == 3) {
            $view = 'otherOutside';
        } else {
            $view = 'otherNonOutside';
        }

        return view('pages.eclaim.claimApproval.cashAdvance.finance.approver.' . $view, $data);
    }

    public function cashAdvanceFrecommenderView()
    {
        $mcs = new ClaimApprovalService;

        $data['cas'] = $mcs->cashAdvanceFapproverView();

        $view = 'financeRecommender';

        return view('pages.eclaim.claimApproval.cashAdvance.finance.recommender.' . $view, $data);
    }

    public function cashAdvanceFrecommenderDetail($type = '', $id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->cashAdvanceFcheckerDetail($id);
        $data['ca'] = $result['general'];
        $data['check'] = $result['check'];
        // pr($data['check']);
        // 1 other outside 2 other non outside 3 project outside 4 project non outside

        if ($type == 1) {
            $view = 'projectOutside';
        } elseif ($type == 2) {
            $view = 'projectNonOutside';
        } elseif ($type == 3) {
            $view = 'otherOutside';
        } else {
            $view = 'otherNonOutside';
        }

        return view('pages.eclaim.claimApproval.cashAdvance.finance.recommender.' . $view, $data);
    }

    public function createChequeNumber(Request $r, $id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->createChequeNumber($r, $id);

        return response()->json($data);
    }

    public function createChequeNumberCa(Request $r, $id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->createChequeNumberCa($r, $id);

        return response()->json($data);
    }

    public function createClearCa(Request $r, $id = '')
    {
        $msc = new ClaimApprovalService;

        $data = $msc->createClearCa($r, $id);

        return response()->json($data);
    }
    public function approveAllClaim(Request $r)
    {
        $ss = new ClaimApprovalService;

        $result = $ss->approveAllClaim($r);

        return response()->json($result);
    }
    public function skipAllClaim(Request $r)
    {
        $ss = new ClaimApprovalService;
        
        $result = $ss->skipAllClaim($r);

        return response()->json($result);
    }
    public function approveAllCa(Request $r)
    {
        $ss = new ClaimApprovalService;

        $result = $ss->approveAllCa($r);

        return response()->json($result);
    }
}