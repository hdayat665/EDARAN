<?php

namespace App\Service;

use App\Models\ApprovalConfig;
use App\Models\ApprovelRoleGeneral;
use App\Models\CashAdvanceDetail;
use App\Models\DomainList;
use App\Models\EclaimGeneralSetting;
use App\Models\Employee;
use App\Models\EmploymentType;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use App\Models\PersonalClaim;
use App\Models\TravelClaim;
use Illuminate\Support\Facades\Auth;

class ClaimApprovalService
{

    public function getGeneralClaim($type = '')
    {
        // type 1 approval 2 recommender

        if ($type == 1) {
            $cond[0] = ['eclaimapprover', Auth::user()->id];
        } else {
            $cond[0] = ['eclaimrecommender', Auth::user()->id];
        }

        $employees = Employee::where($cond)->get();

        $userId = [];
        foreach ($employees as $key => $employee) {
            $userId[] = $employee->user_id;
        }

        $claim[0] = ['tenant_id', Auth::user()->tenant_id];

        $data = GeneralClaim::where($claim)->whereIn('user_id', $userId)->get();

        return $data;
    }

    public function financeCheckerView()
    {
        // find checker 
        $domainList = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'finance']])->orderBy('created_at', 'DESC')->first();
        $userId = Auth::user()->id;
        // pr($domainList);
        $data['check'] = '';
        if ($domainList->checker1 == $userId) {
            $data['check'] = 'f1';
        } else if ($domainList->checker2 == $userId) {
            $data['check'] = 'f2';
        } else if ($domainList->checker3 == $userId) {
            $data['check'] = 'f3';
        }

        $claim[0] = ['tenant_id', Auth::user()->tenant_id];
        $claim[1] = ['status', '!=', 'draft'];

        $data['general'] = GeneralClaim::where($claim)->get();

        return $data;
    }

    public function adminCheckerView()
    {
        // find checker 
        $domainList = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'admin']])->orderBy('created_at', 'DESC')->first();
        $userId = Auth::user()->id;
        // pr($domainList);
        $data['check'] = '';
        if ($domainList->checker1 == $userId) {
            $data['check'] = 'a1';
        } else if ($domainList->checker2 == $userId) {
            $data['check'] = 'a2';
        } else if ($domainList->checker3 == $userId) {
            $data['check'] = 'a3';
        }

        $claim[0] = ['tenant_id', Auth::user()->tenant_id];
        $claim[1] = ['status', '!=', 'draft'];

        $data['general'] = GeneralClaim::where($claim)->get();

        return $data;
    }

    public function financeRecView()
    {
        // find checker 
        // $domainList = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'finance']])->orderBy('created_at', 'DESC')->first();
        // $userId = Auth::user()->id;
        // // pr($domainList);
        // $data['check'] = '';
        // if ($domainList->checker1 == $userId) {
        //     $data['check'] = 'f1';
        // } else if ($domainList->checker2 == $userId) {
        //     $data['check'] = 'f2';
        // } else if ($domainList->checker3 == $userId) {
        //     $data['check'] = 'f3';
        // }

        $claim[0] = ['tenant_id', Auth::user()->tenant_id];
        $claim[1] = ['status', '!=', 'draft'];

        $data = GeneralClaim::where($claim)->get();

        return $data;
    }

    public function adminRecView()
    {

        $claim[0] = ['tenant_id', Auth::user()->tenant_id];
        $claim[1] = ['status', '!=', 'draft'];

        $data = GeneralClaim::where($claim)->get();

        return $data;
    }

    public function updateStatusClaim($r, $id, $status, $stage)
    {
        $input = $r->input();

        // if (in_array($status, ['reject', 'amend'])) {
        //     $input['status'] = $status;
        // }

        $input['status'] = $status;
        $input[$stage] = $status;

        GeneralClaim::where('id', $id)->update($input);

        $generalClaimData = GeneralClaim::find($id);

        // email notification
        $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        if ($setting->notify_user) {

            $ms = new MailService;
            if ($stage == 'supervisor' && $status == 'recommend') {
                $ms->approvalEmailMTC($generalClaimData);
                $ms->approvalEmailMTCForAdmin($generalClaimData);
            }

            if ($stage == 'a_approval' && $status == 'recommend') {
                $ms->approvalEmailMTC($generalClaimData);
                $ms->approvalEmailMTCForAdmin($generalClaimData);
            }

            if ($stage == 'f_approval' && $status == 'recommend') {
                $ms->approvalEmailMTC($generalClaimData);
            }

            if (in_array($stage, ['supervisor', 'f_approval', 'a_approval']) && $status == 'reject') {
                $ms->rejectEmailMTC($generalClaimData);
                // $ms->approvalEmailMTCForAdmin($generalClaimData);

            }
            if (in_array($stage, ['supervisor', 'f_approval', 'a_approval']) && $status == 'amend') {
                $ms->amendEmailMTC($generalClaimData);
                // $ms->approvalEmailMTCForAdmin($generalClaimData);
            }
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Status Claim';

        return $data;
    }

    public function updateStatusGncClaim($r, $id, $status, $stage)
    {
        $input = $r->input();

        // if (in_array($status, ['reject', 'amend'])) {
        //     $input['status'] = $status;
        // }

        // $input['status'] = $status;
        $input[$stage] = $status;

        GeneralClaimDetail::where('id', $id)->update($input);

        // email notification
        $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        if ($setting->notify_user) {
            $generalClaimData = GeneralClaim::find($id);

            $ms = new MailService;
            if ($stage == 'supervisor' && $status == 'recommend') {
                $ms->approvalEmailMTC($generalClaimData);
                $ms->approvalEmailMTCForAdmin($generalClaimData);
            }

            if ($stage == 'a_approval' && $status == 'recommend') {
                $ms->approvalEmailMTC($generalClaimData);
                $ms->approvalEmailMTCForAdmin($generalClaimData);
            }

            if ($stage == 'f_approval' && $status == 'recommend') {
                $ms->approvalEmailMTC($generalClaimData);
            }

            if (in_array($stage, ['supervisor', 'f_approval', 'a_approval']) && $status == 'reject') {
                $ms->rejectEmailMTC($generalClaimData);
                // $ms->approvalEmailMTCForAdmin($generalClaimData);

            }
            if (in_array($stage, ['supervisor', 'f_approval', 'a_approval']) && $status == 'amend') {
                $ms->amendEmailMTC($generalClaimData);
                // $ms->approvalEmailMTCForAdmin($generalClaimData);
            }
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Status Claim';

        return $data;
    }

    public function updateStatusPersonalClaim($r, $id, $status, $stage)
    {
        $input = $r->input();

        // if (in_array($status, ['reject', 'amend'])) {
        //     $input['status'] = $status;
        // }

        // $input['status'] = $status;
        $input[$stage] = $status;

        PersonalClaim::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Status Claim';

        return $data;
    }

    public function updateStatusTravelClaim($r, $id, $status, $stage)
    {
        $input = $r->input();

        // if (in_array($status, ['reject', 'amend'])) {
        // }

        // $input['status'] = $status;
        $input[$stage] = $status;

        TravelClaim::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Status Claim';

        return $data;
    }

    public function supervisorDetailClaimView($id = '')
    {
        $claim[0] = ['tenant_id', Auth::user()->tenant_id];
        $claim[1] = ['id', $id];

        // $travel[0] = ['tenant_id', Auth::user()->tenant_id];
        // $travel[1] = ['general_id', $id];
        $travel = [
            ['travel_claim.tenant_id', '=', Auth::user()->tenant_id],
            ['travel_claim.general_id', '=', $id],
        ];

        $personal = [
            ['personal_claim.tenant_id', '=', Auth::user()->tenant_id],
            ['personal_claim.general_id', '=', $id],
        ];
        // $personal[0] = ['tenant_id', Auth::user()->tenant_id];
        // $personal[1] = ['general_id', $id];


        $general = [
            ['general_claim_details.tenant_id', '=', Auth::user()->tenant_id],
            ['general_claim_details.general_id', '=', $id],
        ];

        // $general[0] = ['tenant_id', Auth::user()->tenant_id];
        // $general[1] = ['general_id', $id];

        $data['claim'] = GeneralClaim::where($claim)->first();


        $data['travel'] = TravelClaim::select(
            'travel_claim.*',
            'travel_claim.type_transport AS travel_claim_type_transport',
        )
            ->where($travel)
            ->get();

        //pr($data['travel']);

        // $data['travel'] = TravelClaim::select(
        //         'travel_claim.*',
        //         'project.project_name',
        //         'general_claim.id as general_claim_id',
        //     )
        //     ->leftJoin('project', 'project.id', '=', 'travel_claim.project_id')
        //     ->leftJoin('general_claim', 'general_claim.id', '=', 'travel_claim.general_id')
        //     // ->where($travel)
        //     ->get();


        // pr($data['travel']); 

        $data['personal'] = PersonalClaim::select(
            'personal_claim.*',
            'claim_category.claim_catagory as claim_catagory_name',

        )
            ->leftJoin('claim_category', 'claim_category.id', '=', 'personal_claim.claim_category')
            ->where($personal)
            ->get();


        //pr($data['personal']);

        $data['general'] = GeneralClaimDetail::select(
            'general_claim_details.*',
            'general_claim_details.desc as gnc_desc',
            'general_claim.year',
            'general_claim.month',
            'claim_category.claim_catagory as claim_catagory_name',

        )
            ->leftJoin('claim_category', 'claim_category.id', '=', 'general_claim_details.claim_category')
            ->leftJoin('general_claim', 'general_claim_details.general_id', '=', 'general_claim.id')
            ->where('general_claim_details.tenant_id', '=', Auth::user()->tenant_id)
            ->where('general_claim_details.general_id', '=', $id)
            ->get();



        //pr( $data['general']);

        return $data;
    }

    public function getPersonalById($id = '')
    {
        $data = PersonalClaim::where('id', $id)->first();

        return $data;
    }

    public function getTravelById($id = '')
    {
        $data = TravelClaim::where('id', $id)->first();

        return $data;
    }

    public function getGncById($id = '')
    {
        $data = GeneralClaimDetail::where('id', $id)->first();

        return $data;
    }

    public function createPvNumber($id = '')
    {
        $claim = GeneralClaim::where('id', $id)->first();

        $pvNo = [
            'pv_number' => 'PV-' . $claim->claim_type . '-' . $claim->id
        ];

        GeneralClaim::where('id', $id)->update($pvNo);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Generate PV Number';

        return $data;
    }

    public function createPvNumberCa($id = '')
    {
        $claim = CashAdvanceDetail::where('id', $id)->first();

        $pvNo = [
            'pv_number' => 'PV-' . $claim->claim_type . '-' . $claim->id
        ];

        CashAdvanceDetail::where('id', $id)->update($pvNo);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Generate PV Number';

        return $data;
    }


    public function cashAdvanceApprovalView()
    {

        $ca[0] = ['tenant_id', Auth::user()->tenant_id];
        $ca[1] = ['status', '!=', 'draft'];

        $data = CashAdvanceDetail::where($ca)->get();

        return $data;
    }

    public function cashAdvanceApproverDetail($id = '')
    {
        $ca[0] = ['tenant_id', Auth::user()->tenant_id];
        $ca[1] = ['status', '!=', 'draft'];
        $ca[2] = ['id', $id];

        $data = CashAdvanceDetail::where($ca)->first();

        return $data;
    }

    public function updateStatusCashAdvance($r, $id, $status, $stage)
    {
        $input = $r->input();

        $input['status'] = $status;
        $input[$stage] = $status;

        if ($status == 'amend') {
            $input['approver'] = '';
            $input['f1'] = '';
            $input['f2'] = '';
            $input['f3'] = '';
            $input['f_approver'] = '';
            $input['f_recommender'] = '';
        }

        CashAdvanceDetail::where('id', $id)->update($input);

        // email notification
        $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        if ($setting->notify_user) {
            $cashAdvanceData = CashAdvanceDetail::find($id);

            $ms = new MailService;
            if ($stage == 'approver' && $status == 'recommend') {
                $ms->approvalEmailCA($cashAdvanceData);
                $ms->approvalEmailCAFinanceApprover($cashAdvanceData);
            }

            if ($stage == 'f_approval' && $status == 'recommend') {
                $ms->approvalEmailCA($cashAdvanceData);
            }
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Status Cash Advance';

        return $data;
    }

    public function cashAdvanceFcheckerView()
    {
        // find checker 
        $domainList = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'cash_advance']])->orderBy('created_at', 'DESC')->first();
        $userId = Auth::user()->id;

        $data['check'] = '';
        if ($domainList->checker1 == $userId) {
            $data['check'] = 'f1';
        } else if ($domainList->checker2 == $userId) {
            $data['check'] = 'f2';
        } else if ($domainList->checker3 == $userId) {
            $data['check'] = 'f3';
        }

        $ca[0] = ['tenant_id', Auth::user()->tenant_id];
        $ca[1] = ['status', '!=', 'draft'];

        $data['general'] = CashAdvanceDetail::where($ca)->get();

        return $data;
    }

    public function cashAdvanceFcheckerDetail($id = '')
    {
        // find checker 
        $domainList = DomainList::where([['tenant_id', Auth::user()->tenant_id], ['category_role', 'cash_advance']])->orderBy('created_at', 'DESC')->first();
        $userId = Auth::user()->id;

        $data['check'] = '';
        if ($domainList->checker1 == $userId) {
            $data['check'] = 'f1';
        } else if ($domainList->checker2 == $userId) {
            $data['check'] = 'f2';
        } else if ($domainList->checker3 == $userId) {
            $data['check'] = 'f3';
        }

        $ca[0] = ['tenant_id', Auth::user()->tenant_id];
        $ca[1] = ['status', '!=', 'draft'];
        $ca[2] = ['id', $id];

        $data['general'] = CashAdvanceDetail::where($ca)->first();

        return $data;
    }

    public function cashAdvanceFapproverView()
    {

        $ca[0] = ['tenant_id', Auth::user()->tenant_id];
        $ca[1] = ['status', '!=', 'draft'];

        $data = CashAdvanceDetail::where($ca)->get();

        return $data;
    }

    public function createChequeNumber($r, $id = '')
    {
        $input = $r->input();

        $input['status'] = 'paid';

        GeneralClaim::where('id', $id)->update($input);

        // email notification
        $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        if ($setting->notify_user) {
            $generalClaimData = GeneralClaim::find($id);

            $ms = new MailService;
            $ms->paidEmailMTC($generalClaimData);
        }

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create Cheque Number';

        return $data;
    }

    public function createChequeNumberCa($r, $id = '')
    {
        $input = $r->input();
        $input['status'] = 'paid';

        CashAdvanceDetail::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create Cheque Number';

        return $data;
    }

    public function createClearCa($r, $id = '')
    {
        $input = $r->input();
        $input['status'] = 'close';

        CashAdvanceDetail::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Create Clear Date';

        return $data;
    }

    public function getApprovalConfig($type = '', $claimType = '')
    {
        if ($type == 1) {
            $role = 'SUPERVISOR - RECOMMENDER';
        }

        if ($type == 2) {
            $role = 'HOD / CEO - APPROVER';
        }

        $cond[0] = ['tenant_id', Auth::user()->tenant_id];
        $cond[1] = ['role', $role];
        $cond[2] = ['type_claim', $claimType];

        $data = ApprovalConfig::where($cond)->first();

        return $data;
    }
}