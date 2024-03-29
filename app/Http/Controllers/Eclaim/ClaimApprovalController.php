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

    public function updateStatusClaim(Request $r, $id = '', $status, $stage, $desc)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateStatusClaim($r, $id, $status, $stage, $desc);

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
        $data['cashAdvances'] = $mcs->getUsedCashAdvance($id);
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

        $carValue = $data['totalCar'][0]->total_km ?? 0;

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

        $data['ansCar'] = $ansCar;


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

        $data['ansMotor'] = $ansMotor;

        $totalcarmotor = $ansMotor + $ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;



        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking + $totalLaundry;
        $totalTravellings = $totalPetrol + $totalParking + $totalToll + $totalcarmotor;
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
        $data['cashAdvances'] = $mcs->getUsedCashAdvance($id);
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
        //pr($data['travelClaims']);
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

        $carValue = $data['totalCar'][0]->total_km ?? 0;

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

        $data['ansCar'] = $ansCar;


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

        $data['ansMotor'] = $ansMotor;

        $totalcarmotor = $ansMotor + $ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;



        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking + $totalLaundry;
        $totalTravellings = $totalPetrol + $totalParking + $totalToll + $totalcarmotor;
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
        $data['gncs'] = $result['general'];
        $data['checkers'] = getFinanceChecker();

        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getUsedCashAdvance($id);
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

        $carValue = $data['totalCar'][0]->total_km ?? 0;

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

        $data['ansCar'] = $ansCar;


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

        $data['ansMotor'] = $ansMotor;

        $totalcarmotor = $ansMotor + $ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;



        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking + $totalLaundry;
        $totalTravellings = $totalPetrol + $totalParking + $totalToll + $totalcarmotor;
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
        $data['gncs'] = $result['general'];
        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getUsedCashAdvance($id);
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

        $carValue = $data['totalCar'][0]->total_km ?? 0;

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

        $data['ansCar'] = $ansCar;


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

        $data['ansMotor'] = $ansMotor;

        $totalcarmotor = $ansMotor + $ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;



        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking + $totalLaundry;
        $totalTravellings = $totalPetrol + $totalParking + $totalToll + $totalcarmotor;
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

        $carValue = $data['totalCar'][0]->total_km ?? 0;

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

        $data['ansCar'] = $ansCar;


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

        $data['ansMotor'] = $ansMotor;

        $totalcarmotor = $ansMotor + $ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;



        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking + $totalLaundry;
        $totalTravellings = $totalPetrol + $totalParking + $totalToll + $totalcarmotor;
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
        $data['domain'] = getDomainListByTypeNCategory('monthlyClaim','finance');

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
        $data['domain'] = getDomainListByTypeNCategory('monthlyClaim','admin');

        $view = 'adminChecker';

        return view('pages.eclaim.claimApproval.admin.checker.' . $view, $data);
    }



    public function financeRecView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(7, 'monthly');
        $data['claims'] = $mcs->financeRecView();
        $data['domain'] = getDomainListByTypeNCategory('monthlyClaim','recommender');
        
        $view = 'financeRec';

        return view('pages.eclaim.claimApproval.finance.recommender.' . $view, $data);
    }

    public function adminRecView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(4, 'monthly');
        $data['claims'] = $mcs->adminRecView();
        $data['domain'] = getDomainListByTypeNCategory('monthlyClaim','admin');

        $view = 'adminRec';

        return view('pages.eclaim.claimApproval.admin.recommender.' . $view, $data);
    }


    public function financeApprovalView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(8, 'monthly');
        $data['claims'] = $mcs->financeRecView();
        $data['domain'] = getDomainListByTypeNCategory('monthlyClaim','finance');
        
        $view = 'fapproval';

        return view('pages.eclaim.claimApproval.finance.approval.' . $view, $data);
    }

    public function adminApprovalView()
    {
        $mcs = new ClaimApprovalService;
        $data['config'] = $mcs->getApprovalConfig(5, 'monthly');
        $data['claims'] = $mcs->adminRecView();
        $data['domain'] = getDomainListByTypeNCategory('monthlyClaim','admin');

        $view = 'adminApproval';

        return view('pages.eclaim.claimApproval.admin.approval.' . $view, $data);
    }

    public function financeRecDetailClaimView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);
        $data['gncs'] = $result['general'];

        $data['general'] = $result['claim'];
        $data['cashAdvances'] = $mcs->getUsedCashAdvance($id);
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

        $carValue = $data['totalCar'][0]->total_km ?? 0;

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

        $data['ansCar'] = $ansCar;


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

        $data['ansMotor'] = $ansMotor;

        $totalcarmotor = $ansMotor + $ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;



        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking + $totalLaundry;
        $totalTravellings = $totalPetrol + $totalParking + $totalToll + $totalcarmotor;
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
        $data['cashAdvances'] = $mcs->getUsedCashAdvance($id);
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

        $carValue = $data['totalCar'][0]->total_km ?? 0;

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

        $data['ansCar'] = $ansCar;


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

        $data['ansMotor'] = $ansMotor;

        $totalcarmotor = $ansMotor + $ansCar;

        $totalAmount = $data['summaryOthers'][0]->total_amount ?? 0;
        $totalSubs = $data['summarySubs'][0]->total_subs ?? 0;
        $totalAcc = $data['summarySubs'][0]->total_acc ?? 0;
        $totalLaundry = $data['summarySubs'][0]->total_laundry ?? 0;
        $totalMillage = $data['summaryTravelling'][0]->total_millage ?? 0;
        $totalPetrol = $data['summaryTravelling'][0]->total_petrol ?? 0;
        $totalToll = $data['summaryTravelling'][0]->total_toll ?? 0;
        $totalParking = $data['summaryTravelling'][0]->total_parking ?? 0;
        $totalTravelling = $data['summaryTravelling'][0]->total_travelling ?? 0;



        $sum = $totalAmount + $totalSubs + $totalAcc + $totalcarmotor + $totalPetrol + $totalToll + $totalParking + $totalLaundry;
        $totalTravellings = $totalPetrol + $totalParking + $totalToll + $totalcarmotor;
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
        // dd($data);
        $data['mode'] = $mcs->cashAdvanceApproverModeTransport($id);
        $data['employeeInfo'] = $mcs->cashAdvanceEmployeeInfo($id);
        $data['approvalInfo'] = $mcs->cashAdvanceApprovalInfo();
        $data['deptApprover'] = $mcs->cashAdvanceDeptApprover($id);

        // dd($data);
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
    public function updateMaxValue(Request $r, $id = '')
    {   
        
        $msc = new ClaimApprovalService;

        $data = $msc->updateMaxValue($r, $id);

        return response()->json($data);
    }
    public function cashAdvanceFcheckerView()
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->cashAdvanceFcheckerView();
        $data['check'] = $result['check'];
        $data['cas'] = $result['general'];
        $data['domain'] = getDomainListByTypeNCategory('cashAdvance');

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

        $data['employeeInfo'] = $mcs->cashAdvanceEmployeeInfo($id);
        $data['approvalInfo'] = $mcs->cashAdvanceApprovalInfo();
        $data['deptApprover'] = $mcs->cashAdvanceDeptApprover($id);
        $data['PVNumber'] = $mcs->cashAdvancePVNumber($id);
        // pr($data['deptApprover']);
        // dd($data['ca']);
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
        $data['domain'] = getDomainListByTypeNCategory('cashAdvance');

        $view = 'financeApprover';

        return view('pages.eclaim.claimApproval.cashAdvance.finance.approver.' . $view, $data);
    }

    public function cashAdvanceFapproverDetail($type = '', $id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->cashAdvanceFcheckerDetail($id);
        $data['ca'] = $result['general'];

        $data['check'] = $result['check'];

        $data['employeeInfo'] = $mcs->cashAdvanceEmployeeInfo($id);
        $data['approvalInfo'] = $mcs->cashAdvanceApprovalInfo();
        $data['deptApprover'] = $mcs->cashAdvanceDeptApprover($id);
        // dd($data['cashAdvanceFcheckerDetail']);
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
        $data['domain'] = getDomainListByTypeNCategory('cashAdvance');

        $view = 'financeRecommender';

        return view('pages.eclaim.claimApproval.cashAdvance.finance.recommender.' . $view, $data);
    }

    public function cashAdvanceFrecommenderDetail($type = '', $id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->cashAdvanceFcheckerDetail($id);
        $data['ca'] = $result['general'];
        $data['check'] = $result['check'];

        $data['employeeInfo'] = $mcs->cashAdvanceEmployeeInfo($id);
        $data['approvalInfo'] = $mcs->cashAdvanceApprovalInfo();
        $data['deptApprover'] = $mcs->cashAdvanceDeptApprover($id);
        
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
    public function skipAllClaimApp(Request $r)
    {
        $ss = new ClaimApprovalService;

        $result = $ss->skipAllClaimApp($r);

        return response()->json($result);
    }
    public function approveAllCa(Request $r)
    {
        $ss = new ClaimApprovalService;

        $result = $ss->approveAllCa($r);

        return response()->json($result);
    }
    public function updateTravelMtcAdminRec(Request $r, $id = '')
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateTravelMtcAdminRec($r, $id = '');

        return response()->json($result);
    }
    public function updateTravelMtcAdminApp(Request $r, $id = '')
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateTravelMtcAdminApp($r, $id = '');

        return response()->json($result);
    }

    public function updateSubsMtcAdminRec(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateSubsMtcAdminRec($r);

        return response()->json($result);
    }
    public function updateOtherMtcAdminRec(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateOtherMtcAdminRec($r);

        return response()->json($result);
    }



    // 
    public function updateSubsMtcAdminApp(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateSubsMtcAdminApp($r);

        return response()->json($result);
    }

    public function updateOtherMtcAdminApp(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateOtherMtcAdminApp($r);

        return response()->json($result);
    }

    public function updateTravelMtcSuperVApp(Request $r, $id = '')
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateTravelMtcSuperVApp($r, $id = '');

        return response()->json($result);
    }

    public function updateOtherMtcSuperVApp(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateOtherMtcSuperVApp($r);

        return response()->json($result);
    }


    public function updateTravelMtcSuperVRec(Request $r, $id = '')
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateTravelMtcSuperVRec($r, $id = '');

        return response()->json($result);
    }

    public function updateSubsMtcSuperVRec(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateSubsMtcSuperVRec($r);

        return response()->json($result);
    }

    // 
    public function updateOtherMtcSuperVRec(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateOtherMtcSuperVRec($r);

        return response()->json($result);
    }

    public function updateTravelMtcFinanRec(Request $r, $id = '')
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateTravelMtcFinanRec($r, $id = '');

        return response()->json($result);
    }

    // 
    public function updateSubsMtcFinanRec(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateSubsMtcFinanRec($r);

        return response()->json($result);
    }


    public function updateOtherMtcFinanRec(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateOtherMtcFinanRec($r);

        return response()->json($result);
    }

    public function updateTravelMtcFinanApp(Request $r, $id = '')
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateTravelMtcFinanApp($r, $id = '');

        return response()->json($result);
    }

    public function updateSubsMtcFinanApp(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateSubsMtcFinanApp($r);

        return response()->json($result);
    }


    public function updateOtherMtcFinanApp(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateOtherMtcFinanApp($r);

        return response()->json($result);
    }

    public function updateTravelMtcFinanChk(Request $r, $id = '')
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateTravelMtcFinanChk($r, $id = '');

        return response()->json($result);
    }

    public function updateSubsMtcFinanChk(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateSubsMtcFinanChk($r);

        return response()->json($result);
    }

    // updateOtherMtcFinanChk

    public function updateOtherMtcFinanChk(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateOtherMtcFinanChk($r);

        return response()->json($result);
    }

    public function updateCheckMtc(Request $r, $id, $date, $level)
    {
        $msc = new ClaimApprovalService;

        $data = $msc->updateCheckMtc($r, $id, $date, $level);

        return response()->json($data);
    }


    public function updateSubsMtcSuperVApp(Request $r)
    {
        $ps = new ClaimApprovalService;

        $result = $ps->updateSubsMtcSuperVApp($r);

        return response()->json($result);
    }

    public function createCAPVNumber(Request $r)
    {
        $ss = new ClaimApprovalService;

        $result = $ss->createCAPVNumber($r);

        return response()->json($result);
    }
}