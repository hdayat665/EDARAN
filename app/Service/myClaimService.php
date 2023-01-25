<?php

namespace App\Service;

use App\Http\Controllers\Eclaim\generalClaimController;
use App\Mail\Mail as MailMail;
use App\Models\CashAdvanceDetail;
use App\Models\GeneralClaim;
use App\Models\GeneralClaimDetail;
use App\Models\ModeOfTransport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class myClaimService
{
    public function getClaimsData()
    {
        $data = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function createGeneralClaim($r, $status = '')
    {
        $input = $r->input();

        $generalClaimCount = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->count();

        // add to general claim
        $generalClaim['user_id'] = Auth::user()->id;
        $generalClaim['tenant_id'] = Auth::user()->tenant_id;
        $generalClaim['claim_id'] = 'GNC' . $generalClaimCount + 1;
        $generalClaim['claim_type'] = $input['claim_type'] ?? 'GNC';
        $generalClaim['status'] = $status;
        $generalClaim['year'] = $input['year'];
        $generalClaim['month'] = $input['month'];
        $generalClaim['total_amount'] = array_sum($input['amount']) ?? '';

        GeneralClaim::create($generalClaim);
        $generalClaimData = GeneralClaim::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();

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
                'general_id' => $generalClaimData->id,
                'general_claim_id' => 'GNC' . $generalClaimCount + 1,
                'applied_date' => $input['applied_date'][$key],
                'claim_category' => $input['claim_category'],
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

    public function getGeneralClaimDataById($id = '')
    {
        $data = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }

    public function updateGeneralClaim($r, $id = '')
    {
        $input = $r->input();
        // pr($input);
        if ($_FILES['file_upload']['name']) {
            $filename = upload($r->file('file_upload'));
            $filenames = $filename['filename'];
        }

        $generalClaimData = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        $generalDetail = [];
        $generalDetail['tenant_id'] = Auth::user()->tenant_id;
        $generalDetail['user_id'] = Auth::user()->id;
        $generalDetail['general_id'] = $id;
        $generalDetail['general_claim_id'] = $generalClaimData->claim_id;
        $generalDetail['amount'] = $input['amount'];
        $generalDetail['desc'] = $input['desc'];
        $generalDetail['file_upload'] = $filenames ?? '';

        GeneralClaimDetail::create($generalDetail);

        $generalDetailData = GeneralClaimDetail::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $id]])->get();

        foreach ($generalDetailData as $generalClaimDetail) {
            $total[] = $generalClaimDetail['amount'];
        }

        $totalAmount = array_sum($total);

        $generalClaim = [];
        $generalClaim['year'] = $input['year'];
        $generalClaim['month'] = $input['month'];
        $generalClaim['total_amount'] = $totalAmount;
        GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($generalClaim);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function deleteGNCDetail($id)
    {
        $GNCDetail = GeneralClaimDetail::find($id);

        if (!$GNCDetail) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Detail not found';
        } else {
            // DB::query("DELETE FROM general_claim_detail WHERE id = $id");
            $GNCDetail->delete($id);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete';
        }

        return $data;
    }

    public function updateStatusGeneralClaims($id)
    {
        $update = [
            'status' => 'paid'
        ];

        GeneralClaim::where('id', $id)->update($update);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Submit';

        return $data;
    }

    public function createCashAdvance($r, $status = '')
    {
        $input = $r->input();

        $cashAdvance['type'] = $input['type'] ?? '';
        $cashAdvance['tenant_id'] = Auth::user()->tenant_id ?? '';
        $cashAdvance['user_id'] = Auth::user()->id ?? '';
        $cashAdvance['project_id'] = $input['project_id'] ?? '';
        $cashAdvance['project_location_id'] = $input['project_location_id'] ?? '';
        $cashAdvance['purpose'] = $input['purpose'] ?? '';
        $cashAdvance['travel_date'] = $input['travel_date'] ?? '';
        $cashAdvance['destination'] = $input['destination'] ?? '';
        $cashAdvance['date_require_cash'] = $input['date_require_cash'] ?? '';
        $cashAdvance['status'] = $status ?? '';
        $cashAdvance['amount'] = $input['amount'] ?? '';

        if ($_FILES['file_upload']['name']) {
            $filename = upload($r->file('file_upload'));
            $cashAdvance['file_upload'] = $filename['filename'];
        }

        CashAdvanceDetail::create($cashAdvance);
        $cashAdvanceData = CashAdvanceDetail::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'DESC')->first();

        $modeOfTransport['tenant_id'] = Auth::user()->tenant_id;
        $modeOfTransport['user_id'] = Auth::user()->id;
        $modeOfTransport['cash_advance_id'] = $cashAdvanceData->id;
        $modeOfTransport['tranport_type'] = $input['transport_type'];
        $modeOfTransport['subs_allowance_total'] = $input['subs_allowance_total'];
        $modeOfTransport['subs_allowance_day'] = $input['subs_allowance_day'];
        $modeOfTransport['accommadation_total'] = $input['accommadation_total'];
        $modeOfTransport['accommadation_night'] = $input['accommadation_night'];
        $modeOfTransport['entertainment'] = $input['entertainment'];
        $modeOfTransport['toll'] = $input['toll'];
        $modeOfTransport['fuel'] = $input['fuel'];
        $modeOfTransport['total'] = $input['total'];
        $modeOfTransport['max_total'] = $input['max_total'];
        ModeOfTransport::create($modeOfTransport);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function getCashClaimsData()
    {
        $data = CashAdvanceDetail::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }

    public function getCashAdvanceById($id = '')
    {
        $data = CashAdvanceDetail::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }

    public function updateStatusCashClaim($id = '', $status = '')
    {
        $cashAdvance = [];
        $cashAdvance['status'] = $status;
        CashAdvanceDetail::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->update($cashAdvance);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }

    public function updateCashAdvance($r, $status = '')
    {
        $input = $r->input();
        $cash = $input['cash'];

        if ($status) {
            $cash['status'] = $status;
        }
        if ($_FILES) {
            if ($_FILES['file_upload']['name']) {
                $filename = upload($r->file('file_upload'));
                $cash['file_upload'] = $filename['filename'];
            }
        }

        CashAdvanceDetail::where([['tenant_id', Auth::user()->tenant_id], ['id', $cash['id']]])->update($cash);

        if (isset($input['mot'])) {
            $mot = $input['mot'];
            ModeOfTransport::where([['tenant_id', Auth::user()->tenant_id], ['id', $mot['id']]])->update($mot);
        }


        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success';

        return $data;
    }
}