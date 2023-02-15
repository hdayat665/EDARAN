<?php

namespace App\Service;

use App\Models\Employee;
use App\Models\EmploymentType;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use App\Models\PersonalClaim;
use App\Models\TravelClaim;
use Illuminate\Support\Facades\Auth;

class ClaimApprovalService
{

    public function getGeneralClaim()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();

        // hod = 2 supervisor = 1
        if ($employee->jobGrade == '1') {
            $cond[1] = ['claim_type', 'MTC'];
        } elseif ($employee->jobGrade == '2') {
            // $cond[1] = ['claim_type', 'GNC'];
        }
        $cond[0] = ['tenant_id', Auth::user()->tenant_id];

        $data = GeneralClaim::where($cond)->get();

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

        $input['status'] = $status;
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

        $input['status'] = $status;
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

        $input['status'] = $status;
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
}