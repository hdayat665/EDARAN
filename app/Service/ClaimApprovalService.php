<?php

namespace App\Service;

use App\Models\ApprovelRoleGeneral;
use App\Models\CashAdvanceDetail;
use App\Models\DomainList;
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

        $travel[0] = ['tenant_id', Auth::user()->tenant_id];
        $travel[1] = ['general_id', $id];

        $personal[0] = ['tenant_id', Auth::user()->tenant_id];
        $personal[1] = ['general_id', $id];

        $general[0] = ['tenant_id', Auth::user()->tenant_id];
        $general[1] = ['general_id', $id];

        $data['claim'] = GeneralClaim::where($claim)->first();
        $data['travel'] = TravelClaim::where($travel)->get();
        $data['personal'] = PersonalClaim::where($personal)->get();
        $data['general'] = GeneralClaimDetail::where($general)->get();

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

    public function cashAdvanceApprovalView()
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

        CashAdvanceDetail::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Update Status Cash Advance';

        return $data;
    }
}