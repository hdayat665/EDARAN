<?php

namespace App\Service;

use App\Models\GeneralClaim;
use Illuminate\Support\Facades\Auth;

class ClaimApprovalService
{

    public function getGeneralClaim()
    {
        $cond[0] = ['tenant_id', Auth::user()->tenant_id];

        $data = GeneralClaim::where($cond)->get();

        return $data;
    }

    public function updateStatusClaim($r, $id, $status)
    {
        $input = $r->input();

        $input['status'] = $status;

        GeneralClaim::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update status';

        return $data;
    }
}