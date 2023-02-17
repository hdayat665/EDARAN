<?php

namespace App\Http\Controllers\Eclaim;

use App\Http\Controllers\Controller;
use App\Service\ClaimApprovalService;
use Illuminate\Http\Request;

class ClaimApprovalController extends Controller
{
    public function claimApprovalView($type = '')
    {
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->getGeneralClaim($type);

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
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];

        return view('pages.eclaim.claimApproval.supervisorClaimDetail', $data);
    }

    public function hodDetailClaimView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['general'] = $result['claim'];
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
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

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
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

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
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

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

        $view = 'financeChecker';

        return view('pages.eclaim.claimApproval.finance.checker.' . $view, $data);
    }

    public function adminCheckerView()
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->adminCheckerView();
        $data['check'] = $result['check'];
        $data['claims'] = $result['general'];

        $view = 'adminChecker';

        return view('pages.eclaim.claimApproval.admin.checker.' . $view, $data);
    }



    public function financeRecView()
    {
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->financeRecView();

        $view = 'financeRec';

        return view('pages.eclaim.claimApproval.finance.recommender.' . $view, $data);
    }

    public function adminRecView()
    {
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->adminRecView();

        $view = 'adminRec';

        return view('pages.eclaim.claimApproval.admin.recommender.' . $view, $data);
    }


    public function financeApprovalView()
    {
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->financeRecView();

        $view = 'fapproval';

        return view('pages.eclaim.claimApproval.finance.approval.' . $view, $data);
    }

    public function adminApprovalView()
    {
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->adminRecView();

        $view = 'adminApproval';

        return view('pages.eclaim.claimApproval.admin.approval.' . $view, $data);
    }

    public function financeRecDetailClaimView($id = '')
    {
        $mcs = new ClaimApprovalService;

        $result = $mcs->supervisorDetailClaimView($id);

        $data['general'] = $result['claim'];
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

        if ($data['general']->claim_type == 'MTC') {
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
        $data['travels'] = $result['travel'];
        $data['personals'] = $result['personal'];
        $data['gncs'] = $result['general'];

        // if ($data['general']->claim_type == 'MTC') {
        $view = 'adminRecDetail';
        // } else {
        // $view = 'financeRecGnc';
        // }

        return view('pages.eclaim.claimApproval.admin.recommender.' . $view, $data);
    }

    public function HodCashApprovalView()
    {
        $mcs = new ClaimApprovalService;

        $data['claims'] = $mcs->getGeneralClaim();

        return view('pages.eclaim.claimApproval.cashAdvance.hodApproval', $data);
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
}