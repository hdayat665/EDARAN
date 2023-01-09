<?php

namespace App\Service;

use App\Http\Controllers\Eclaim\generalClaimController;
use App\Mail\Mail as MailMail;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class myClaimService
{
    public function getClaimsData()
    {
        $data = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function createGeneralClaim($r)
    {
        $input = $r->input();

        $generalClaimCount = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->count();

        // add to general claim
        $generalClaim['user_id'] = Auth::user()->id;
        $generalClaim['tenant_id'] = Auth::user()->tenant_id;
        $generalClaim['claim_id'] = 'GNC' . $generalClaimCount + 1;
        $generalClaim['claim_type'] = $input['claim_type'] ?? 'GNC';
        $generalClaim['status'] = 'amend';
        $generalClaim['year'] = $input['year'];
        $generalClaim['month'] = $input['month'];
        $generalClaim['total_amount'] = array_sum($input['amount']) ?? '';

        GeneralClaim::create($generalClaim);

        $filenames = [];
        if ($_FILES['file_upload']['name'][0]) {
            foreach ($r->file('file_upload') as $file) {
                $filename = upload($file);
                $filenames[] = $filename['filename'];
            }
        }

        // add to general claim detail
        foreach ($input['applied_date'] as $key => $value) {
            if ($filenames) {
                $file_upload = $filenames[$key];
            } else {
                $file_upload = '';
            }
            $generalDetail[] = [
                'tenant_id' => Auth::user()->tenant_id,
                'user_id' => Auth::user()->id,
                'general_claim_id' => 'GNC' . $generalClaimCount + 1,
                'applied_date' => date_format(date_create($input['applied_date'][$key]), 'Y-m-d'),
                'claim_category' => $input['claim_category'][$key],
                'claim_category_detail' => $input['claim_category_detail'][$key],
                'amount' => $input['amount'][$key],
                'desc' => $input['desc'][$key],
                'file_upload' => $file_upload,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        GeneralClaimDetail::insert($generalDetail);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function getGeneralDetailData()
    {
        $data = GeneralClaimDetail::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }
}