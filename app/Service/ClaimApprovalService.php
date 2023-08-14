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
use App\Models\ModeOfTransport;
use App\Models\ClaimDateSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\EntitleGroup;
use App\Models\TransportMillage;
use App\Models\MtcAttachment;

class ClaimApprovalService
{
    public function getUserData($id='')
    {   
        
        $data = Employee::where('user_id', $id)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
    public function getGeneralClaimDataById($id = '')
    {
        $data = GeneralClaim::where([['tenant_id', Auth::user()->tenant_id], ['id', $id]])->first();

        return $data;
    }
    public function getDomainRoleAdmin()
    {
        $data = DomainList::where('tenant_id', Auth::user()->tenant_id)
            ->where('type', 'monthlyClaim')
            ->where('category_role', 'admin')
            ->first();

        if (!$data) {
            $data = '';
        }

        return $data;

    }
    public function getDomainRoleFinance()
    {
        $data = DomainList::where('tenant_id', Auth::user()->tenant_id)
            ->where('type', 'monthlyClaim')
            ->where('category_role', 'finance')
            ->first();

        if (!$data) {
            $data = '';
        }

        return $data;

    }
    public function getSummaryTravellingClaimByGeneralId($id = '')
    {
        $data = TravelClaim::select(
            
            DB::raw('SUM(total_km) AS total_km'),
            DB::raw('SUM(petrol) AS total_petrol'),
            DB::raw('SUM(toll) AS total_toll'),
            DB::raw('SUM(parking) AS total_parking'),
            DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
        )
        
        ->where('general_id', $id)
        ->where('type_claim', 'travel')
        ->groupBy('general_id')
        ->get();

        return $data;
    }
    public function getSummarySubsClaimByGeneralId($id = '')
    {
        $data = TravelClaim::select(
            DB::raw('COALESCE(SUM(total_subs), 0) AS total_subs'),
            DB::raw('COALESCE(SUM(total_acc), 0) AS total_acc'),
            DB::raw('COALESCE(SUM(laundry_amount), 0) AS total_laundry'),
            DB::raw('COALESCE(SUM(total_subs), 0) + COALESCE(SUM(total_acc), 0) + COALESCE(SUM(laundry_amount), 0) AS total_all')
        )
        ->where('general_id', $id)
        ->where('type_claim', 'subs')
        ->groupBy('general_id')
        ->get();

        return $data;
    }
    public function getSummaryOthersByGeneralId($id = '')
    {
        $data = PersonalClaim::select(
            DB::raw('SUM(amount) AS total_amount'),
            
        )

        ->where('general_id', $id)
        ->groupBy('general_id')
        ->get();

        return $data;
    }
    public function getlessCashClaimByGeneralId($id = '')
    {
        $data = TravelClaim::select(
            
            DB::raw('SUM(lesscash) AS totalCash'),
        )
        
        ->where('general_id', $id)
        ->where('type_claim', 'subs')
        ->where('claim_for', 1)
        ->groupBy('general_id')
        ->get();

        return $data;
    }
    public function getTotalCarClaimByGeneralId($id = '')
    {
        $data = TravelClaim::select(
            DB::raw('SUM(total_km) AS total_km'),
        )
        
        ->where('general_id', $id)
        ->where('type_claim', 'travel')
        ->where('type_transport', 'Personal Car')
        ->groupBy('general_id')
        ->get();

        return $data;
    }
    public function getTotalMotorClaimByGeneralId($id = '')
    {
        $data = TravelClaim::select(
            DB::raw('SUM(total_km) AS total_km'),
        )
        
        ->where('general_id', $id)
        ->where('type_claim', 'travel')
        ->where('type_transport', 'Personal Motocycle')
        ->groupBy('general_id')
        ->get();

        return $data;
    }
    public function getCashAdvancePaid()
    {
        $data = CashAdvanceDetail::where([
            ['tenant_id', Auth::user()->tenant_id],
            ['user_id', Auth::user()->id],
            //['status', 'paid'],
            //['status', 3]
        ])->get();
        
        return $data;
        
        
    }
    public function getTravellingClaimByGeneralId($id = '')
    {
        $data = TravelClaim::select(
            'travel_date','general_id','sv','hod','adminrec','adminapp','f1','f2','f3','financerec','financeapp',
            
            DB::raw('SUM(total_km) AS total_km'),
            DB::raw('SUM(petrol) AS total_petrol'),
            DB::raw('SUM(toll) AS total_toll'),
            DB::raw('SUM(parking) AS total_parking')
        )
        
        ->where('general_id', $id)
        ->where('type_claim', 'travel', 'sv')
        ->groupBy('travel_date')
        ->orderBy('travel_date', 'asc')
        ->get();
        //pr($data);
        return $data;
    }
    public function getSubsClaimByGeneralId($id = '')
    {
        $data = TravelClaim::where('general_id', $id)
        ->where('type_claim', 'subs')
        ->get();

        return $data;
    }
    public function getTravelAttachmentsByGeneralId($id = '')
    {
        $data = MtcAttachment::where('general_id', $id)
        ->where('type', 'travelling')
        ->get();

        return $data;
    }
    public function getSubsAttachmentsByGeneralId($id = '')
    {
        $data = MtcAttachment::where('general_id', $id)
        ->where('type', 'subs')
        ->get();

        return $data;
    }
    public function getPersonalClaimByGeneralId($id = '')
    {
        $data = PersonalClaim::where('general_id', $id)->get();

        return $data;
    }
    public function getEntitlementByJobGradeCar($id = '')
    {

        $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
        $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
        $car = TransportMillage::where('entitle_id', $entitle)
            ->where('type', 'car')
            ->get();

        //pr($car);


        return $car;
    }
    public function getFoodByJobGrade($id = '')
    {
        
        $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
        $entitle = EntitleGroup::where('job_grade', $jobGrade)
                                ->get();

        //pr($entitle);

        
        return $entitle;
    }
    public function getEntitlementByJobGradeMotor($id = '')
    {

        $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
        $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
        $motor = TransportMillage::where('entitle_id', $entitle)
            ->where('type', 'motor')
            ->get();

        //pr($car);


        return $motor;
    }
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

    public function updateStatusClaim($r, $id, $status, $stage ,$desc)
    {
        $input = $r->input();
        //pr($id);
        // if (in_array($status, ['reject', 'amend'])) {
        //     $input['status'] = $status;
        // }

        $input['status'] = $status;
        $input['status_desc'] = $desc;
        $input[$stage] = $status;
        
        if ($stage == 'a_approval') {
            $input['status'] = 'recommend';
            $input['a_approval'] = 'bucket';
            GeneralClaim::where('id', $id)->update($input);

            $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
                if ($setting->notify_user) {

                    $ms = new MailService;
                    if ($stage == 'supervisor' && $status == 'recommend') {
                        $ms->approvalEmailMTC($generalClaimData);
                        $ms->emailToHodClaimMTC($generalClaimData);
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

        GeneralClaim::where('id', $id)->update($input);

        $generalClaimData = GeneralClaim::find($id);

        // email notification
        $setting = EclaimGeneralSetting::where('tenant_id', Auth::user()->tenant_id)->first();
        if ($setting->notify_user) {

            $ms = new MailService;
            if ($stage == 'supervisor' && $status == 'recommend') {
                $ms->approvalEmailMTC($generalClaimData);
                $ms->emailToHodClaimMTC($generalClaimData);
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
    public function getGeneralDetailData()
    {
        $data = GeneralClaimDetail::where('tenant_id', Auth::user()->tenant_id)->get();

        return $data;
    }
    public function supervisorDetailClaimView($id = '')
    {
        $claim[0] = ['tenant_id', Auth::user()->tenant_id];
        $claim[1] = ['id', $id];
        
        $travel = [
            ['travel_claim.tenant_id', '=', Auth::user()->tenant_id],
            ['travel_claim.general_id', '=', $id],
        ];

        $personal = [
            ['personal_claim.tenant_id', '=', Auth::user()->tenant_id],
            ['personal_claim.general_id', '=', $id],
        ];

        $general = [
            ['general_claim_details.tenant_id', '=', Auth::user()->tenant_id],
            ['general_claim_details.general_id', '=', $id],
        ];

        $data['claim'] = GeneralClaim::where($claim)->first();


        $data['travel'] = TravelClaim::select(
            'travel_claim.*',
            'travel_claim.type_transport AS travel_claim_type_transport',
        )
            ->where($travel)
            ->get();

       

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

        return $data;
    }

    public function getPersonalById($id = '')
    {
        $data = PersonalClaim::where('personal_claim.id', $id)
            ->leftJoin('claim_category', 'personal_claim.claim_category', '=', 'claim_category.id')
            ->select('personal_claim.*', 'claim_category.claim_catagory as claim_category_name')
            ->with('claim_category_content')
            ->first();

        return $data;
    }

    public function getTravelById($id = '')
    {
        $data = TravelClaim::where('travel_claim.id', $id)
            ->leftJoin('project', 'travel_claim.project_id', '=', 'project.id')
            ->select('travel_claim.*', 'project.project_name')
            ->first();

        return $data;
    }

    public function getGncById($id = '')
    {
        $data = GeneralClaimDetail::where('general_claim_details.id', $id)
            ->leftJoin('claim_category', 'general_claim_details.claim_category', '=', 'claim_category.id')
            ->select('general_claim_details.*', 'claim_category.claim_catagory as claim_category_name')
            ->with('claim_category_content')
            ->first();

        if (!$data) {
            $data = [];
        }

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
            'pv_number' => 'PV-' . 'CA' . '-' . $claim->id
        ];

        CashAdvanceDetail::where('id', $id)->update($pvNo);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Generate PV Number';

        return $data;
    }


    public function cashAdvanceApprovalView($role = '')
    {

        //$cond = ['caapprover', Auth::user()->id];

        $employees = Employee::where('caapprover', Auth::user()->id)->get();

        $userId = [];
        foreach ($employees as $key => $employee) {
            $userId[] = $employee->user_id;
        }

        $claim[0] = ['tenant_id', Auth::user()->tenant_id];

        if ($role == 'departApprover') {
            $claim[1] = ['approver', ''];
            $claim[2] = ['status', 'active'];
        }

        $data = CashAdvanceDetail::where($claim)->whereIn('user_id', $userId)->get();

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
    public function cashAdvanceApproverModeTransport($id = '')
    {
        $ca[0] = ['tenant_id', Auth::user()->tenant_id];
        $ca[2] = ['cash_advance_id', $id];

        $data = ModeOfTransport::where($ca)->first();
        // pr($data);
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

    public function cashAdvanceFapproverView($role = '')
    {

        $ca[0] = ['tenant_id', Auth::user()->tenant_id];
        $ca[1] = ['status', '!=', 'draft'];

        if ($role == 'financeRec') {
            $ca[2] = ['f_status', 'recommend'];
            $ca[3] = ['f_recommender', '!=', 'recommend'];
        }

        if ($role == 'financeApprover') {
            $ca[4] = ['f_approver', ''];
            $ca[5] = ['f_recommender', 'recommend'];
        }

        $data = CashAdvanceDetail::where($ca)->get();

        return $data;
    }

    public function createChequeNumber($r, $id = '')
    {
        $input = $r->input();

        $input['status'] = 'paid';
        $input['status_desc'] = 'Claim Paid';
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
    public function approveAllClaim($r)
    {
        $input = $r->input();

        if (!isset($input['id'])) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Please select the claim submission first!';

            return $data;
        }

        $ids = $input['id'];
        $status['hod'] = 'bucket';
        $status['status'] = 'pending';

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        GeneralClaim::where($cond)->whereIn('id', $ids)->update($status);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Approve Timesheet';

        return $data;
    }
    public function skipAllClaim($r)
    {
        $input = $r->input();
        
        if (!isset($input['id'])) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Please select the claim submission first!';

            return $data;
        }

        $ids = $input['id'];
        $status['hod'] = 'recommend';
        $status['status'] = 'recommend';
        $status['status_desc'] = 'Admin Dept. processing';
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        GeneralClaim::where($cond)->whereIn('id', $ids)->update($status);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Skip The Queue';

        return $data;
    }
    public function skipAllClaimApp($r)
    {
        $input = $r->input();
        
        if (!isset($input['id'])) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Please select the claim submission first!';

            return $data;
        }

        $ids = $input['id'];
        $status['a_approval'] = 'recommend';
        $status['status'] = 'recommend';
        $status['status_desc'] = 'Finance Dept. processing';
        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        GeneralClaim::where($cond)->whereIn('id', $ids)->update($status);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Skip The Queue';

        return $data;
    }
    public function approveAllCa($r)
    {
        $input = $r->input();

        if (!isset($input['id'])) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Please select the cash advance submission first!';

            return $data;
        }

        $ids = $input['id'];
        $status['approver'] = 'recommend';
        $status['status'] = 'pending';

        $cond[1] = ['tenant_id', Auth::user()->tenant_id];

        CashAdvanceDetail::where($cond)->whereIn('id', $ids)->update($status);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Approve Timesheet';

        return $data;
    }

    public function getApprovalConfig($type = '', $type_claim = '')
    {
        if ($type == '1') {
            $role = 'HOD / CEO - APPROVER';
        } elseif ($type == '2') {
            $role = 'SUPERVISOR - RECOMMENDER';
        } elseif ($type == '3') {
            $role = 'ADMIN - CHECKER';
        } elseif ($type == '4') {
            $role = 'ADMIN - RECOMMENDER';
        } elseif ($type == '5') {
            $role = 'ADMIN - APPROVER';
        } elseif ($type == '6') {
            $role = 'FINANCE - CHECKER';
        } elseif ($type == '7') {
            $role = 'FINANCE - RECOMMENDER';
        } elseif ($type == '8') {
            $role = 'FINANCE - APPROVER';
        }

        $data = ApprovalConfig::where([['type_claim', $type_claim], ['tenant_id', Auth::user()->tenant_id], ['role', $role]])->first();

        return $data;
    }
    public function getBucketDate()
    {
        $data = ClaimDateSetting::where('tenant_id', Auth::user()->tenant_id)->first();

        if (!$data) {
            $data = [];
        }

        return $data;
    }
    public function updateTravelMtcAdminApp($r,$id = '')
    {
        $input = $r->input();
        //pr($input);
        $id = $input['id'];
        $input['amount'] = $input['petrol']+$input['toll']+$input['parking'];
        $input['total_km'] = $input['millage'];
        //pr($input['amount']);
        $user = TravelClaim::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TravelClaim::where('id', $id)->update($input);
            $updatedTravelClaim = TravelClaim::select('general_id')->where('id', $id)->first();
            $general_id = $updatedTravelClaim->general_id;

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $updatedTravelClaim->general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateSubsMtcAdminApp($r)
    {
        $input = $r->input();
        $id = $input['id'];
        $general_id = $input['general_id'];

        // dd($input);

        $user = TravelClaim::where('id', $id)->first();

        if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
            $filenames = array();
            foreach ($_FILES['file_upload']['name'] as $key => $filename) {
                $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
                if (!empty($filename) && !empty($tmp_name)) {
                    $fileInfo = TravelFile($filename, $tmp_name);
                    if ($fileInfo !== null) {
                        $filenames[] = $fileInfo['filename'];
                    }
                }
            }
            $fileString = implode(',', $filenames);
        }
        $input['file_upload'] = $fileString ?? '';

        //pr($input['file_upload']);

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
            
            TravelClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

    
        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;
        
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;

        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateOtherMtcAdminApp($r)
    {
        $input = $r->input();
       
        $id = $input['id'];
        $general_id = $input['general_id'];
        $user = PersonalClaim::where('id', $id)->first();

        // if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        //     $filenames = array();
        //     foreach ($_FILES['file_upload']['name'] as $key => $filename) {
        //         $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        //         if (!empty($filename) && !empty($tmp_name)) {
        //             $fileInfo = PersonalFile($filename, $tmp_name);
        //             if ($fileInfo !== null) {
        //                 $filenames[] = $fileInfo['filename'];
        //             }
        //         }
        //     }
        // }
        // $fileString = implode(',', $filenames);
        // //pr($fileString);
        // $input['file_upload'] = $fileString ?? '';

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            PersonalClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
        

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        

       

        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }
    ///////////////////////////
    public function updateTravelMtcAdminRec($r,$id = '')
    {
        $input = $r->input();
        //pr($input);
        $id = $input['id'];
        $input['amount'] = $input['petrol']+$input['toll']+$input['parking'];
        $input['total_km'] = $input['millage'];
        //pr($input['amount']);
        $user = TravelClaim::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TravelClaim::where('id', $id)->update($input);
            $updatedTravelClaim = TravelClaim::select('general_id')->where('id', $id)->first();
            $general_id = $updatedTravelClaim->general_id;

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $updatedTravelClaim->general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateSubsMtcAdminRec($r)
    {
        $input = $r->input();
        $id = $input['id'];
        $general_id = $input['general_id'];

        // dd($input);

        $user = TravelClaim::where('id', $id)->first();

        if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
            $filenames = array();
            foreach ($_FILES['file_upload']['name'] as $key => $filename) {
                $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
                if (!empty($filename) && !empty($tmp_name)) {
                    $fileInfo = TravelFile($filename, $tmp_name);
                    if ($fileInfo !== null) {
                        $filenames[] = $fileInfo['filename'];
                    }
                }
            }
            $fileString = implode(',', $filenames);
        }
        $input['file_upload'] = $fileString ?? '';

        //pr($input['file_upload']);

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
            
            TravelClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

    
        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;
        
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;

        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateOtherMtcAdminRec($r)
    {
        $input = $r->input();
       
        $id = $input['id'];
        $general_id = $input['general_id'];
        $user = PersonalClaim::where('id', $id)->first();

        // if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        //     $filenames = array();
        //     foreach ($_FILES['file_upload']['name'] as $key => $filename) {
        //         $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        //         if (!empty($filename) && !empty($tmp_name)) {
        //             $fileInfo = PersonalFile($filename, $tmp_name);
        //             if ($fileInfo !== null) {
        //                 $filenames[] = $fileInfo['filename'];
        //             }
        //         }
        //     }
        // }
        // $fileString = implode(',', $filenames);
        // //pr($fileString);
        // $input['file_upload'] = $fileString ?? '';

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            PersonalClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
        

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        

       

        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }
    public function updateCheckMtc($r, $id, $date, $level)
    {
        $input = $r->input();
        
        // Add a condition to filter by 'travel_date' = $date
        $input2 = array_merge($input, [$level => 'checked']);
        
        // Update the record with the new condition
        TravelClaim::where('general_id', $id)->where('travel_date', $date)->update($input2);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success Checked Claim';

        return $data;
    }



    public function updateTravelMtcSuperVApp($r,$id = '')
    {
        $input = $r->input();
        //pr($input);
        $id = $input['id'];
        $input['amount'] = $input['petrol']+$input['toll']+$input['parking'];
        $input['total_km'] = $input['millage'];
        //pr($input['amount']);
        $user = TravelClaim::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TravelClaim::where('id', $id)->update($input);
            $updatedTravelClaim = TravelClaim::select('general_id')->where('id', $id)->first();
            $general_id = $updatedTravelClaim->general_id;

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $updatedTravelClaim->general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateOtherMtcSuperVApp($r)
    {
        $input = $r->input();
       
        $id = $input['id'];
        $general_id = $input['general_id'];
        $user = PersonalClaim::where('id', $id)->first();

        // if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        //     $filenames = array();
        //     foreach ($_FILES['file_upload']['name'] as $key => $filename) {
        //         $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        //         if (!empty($filename) && !empty($tmp_name)) {
        //             $fileInfo = PersonalFile($filename, $tmp_name);
        //             if ($fileInfo !== null) {
        //                 $filenames[] = $fileInfo['filename'];
        //             }
        //         }
        //     }
        // }
        // $fileString = implode(',', $filenames);
        // //pr($fileString);
        // $input['file_upload'] = $fileString ?? '';

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            PersonalClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
        

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        

       

        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateTravelMtcSuperVRec($r,$id = '')
    {
        $input = $r->input();
        //pr($input);
        $id = $input['id'];
        $input['amount'] = $input['petrol']+$input['toll']+$input['parking'];
        $input['total_km'] = $input['millage'];
        //pr($input['amount']);
        $user = TravelClaim::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TravelClaim::where('id', $id)->update($input);
            $updatedTravelClaim = TravelClaim::select('general_id')->where('id', $id)->first();
            $general_id = $updatedTravelClaim->general_id;

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $updatedTravelClaim->general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateSubsMtcSuperVRec($r)
    {
        $input = $r->input();
        $id = $input['id'];
        $general_id = $input['general_id'];

        // dd($input);

        $user = TravelClaim::where('id', $id)->first();

        if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
            $filenames = array();
            foreach ($_FILES['file_upload']['name'] as $key => $filename) {
                $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
                if (!empty($filename) && !empty($tmp_name)) {
                    $fileInfo = TravelFile($filename, $tmp_name);
                    if ($fileInfo !== null) {
                        $filenames[] = $fileInfo['filename'];
                    }
                }
            }
            $fileString = implode(',', $filenames);
        }
        $input['file_upload'] = $fileString ?? '';

        //pr($input['file_upload']);

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
            
            TravelClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

    
        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;
        
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;

        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateOtherMtcSuperVRec($r)
    {
        $input = $r->input();
       
        $id = $input['id'];
        $general_id = $input['general_id'];
        $user = PersonalClaim::where('id', $id)->first();

        // if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        //     $filenames = array();
        //     foreach ($_FILES['file_upload']['name'] as $key => $filename) {
        //         $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        //         if (!empty($filename) && !empty($tmp_name)) {
        //             $fileInfo = PersonalFile($filename, $tmp_name);
        //             if ($fileInfo !== null) {
        //                 $filenames[] = $fileInfo['filename'];
        //             }
        //         }
        //     }
        // }
        // $fileString = implode(',', $filenames);
        // //pr($fileString);
        // $input['file_upload'] = $fileString ?? '';

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            PersonalClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
        

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        

       

        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    
    public function updateTravelMtcFinanRec($r,$id = '')
    {
        $input = $r->input();
        //pr($input);
        $id = $input['id'];
        $input['amount'] = $input['petrol']+$input['toll']+$input['parking'];
        $input['total_km'] = $input['millage'];
        //pr($input['amount']);
        $user = TravelClaim::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TravelClaim::where('id', $id)->update($input);
            $updatedTravelClaim = TravelClaim::select('general_id')->where('id', $id)->first();
            $general_id = $updatedTravelClaim->general_id;

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $updatedTravelClaim->general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    
    public function updateSubsMtcFinanRec($r)
    {
        $input = $r->input();
        $id = $input['id'];
        $general_id = $input['general_id'];

        // dd($input);

        $user = TravelClaim::where('id', $id)->first();

        if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
            $filenames = array();
            foreach ($_FILES['file_upload']['name'] as $key => $filename) {
                $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
                if (!empty($filename) && !empty($tmp_name)) {
                    $fileInfo = TravelFile($filename, $tmp_name);
                    if ($fileInfo !== null) {
                        $filenames[] = $fileInfo['filename'];
                    }
                }
            }
            $fileString = implode(',', $filenames);
        }
        $input['file_upload'] = $fileString ?? '';

        //pr($input['file_upload']);

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
            
            TravelClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

    
        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;
        
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;

        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    // 
    public function updateOtherMtcFinanRec($r)
    {
        $input = $r->input();
       
        $id = $input['id'];
        $general_id = $input['general_id'];
        $user = PersonalClaim::where('id', $id)->first();

        // if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        //     $filenames = array();
        //     foreach ($_FILES['file_upload']['name'] as $key => $filename) {
        //         $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        //         if (!empty($filename) && !empty($tmp_name)) {
        //             $fileInfo = PersonalFile($filename, $tmp_name);
        //             if ($fileInfo !== null) {
        //                 $filenames[] = $fileInfo['filename'];
        //             }
        //         }
        //     }
        // }
        // $fileString = implode(',', $filenames);
        // //pr($fileString);
        // $input['file_upload'] = $fileString ?? '';

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            PersonalClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
        

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        

       

        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    // 
    public function updateTravelMtcFinanApp($r,$id = '')
    {
        $input = $r->input();
        //pr($input);
        $id = $input['id'];
        $input['amount'] = $input['petrol']+$input['toll']+$input['parking'];
        $input['total_km'] = $input['millage'];
        //pr($input['amount']);
        $user = TravelClaim::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TravelClaim::where('id', $id)->update($input);
            $updatedTravelClaim = TravelClaim::select('general_id')->where('id', $id)->first();
            $general_id = $updatedTravelClaim->general_id;

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $updatedTravelClaim->general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    // 
    public function updateSubsMtcFinanApp($r)
    {
        $input = $r->input();
        $id = $input['id'];
        $general_id = $input['general_id'];

        // dd($input);

        $user = TravelClaim::where('id', $id)->first();

        if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
            $filenames = array();
            foreach ($_FILES['file_upload']['name'] as $key => $filename) {
                $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
                if (!empty($filename) && !empty($tmp_name)) {
                    $fileInfo = TravelFile($filename, $tmp_name);
                    if ($fileInfo !== null) {
                        $filenames[] = $fileInfo['filename'];
                    }
                }
            }
            $fileString = implode(',', $filenames);
        }
        $input['file_upload'] = $fileString ?? '';

        //pr($input['file_upload']);

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
            
            TravelClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

    
        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;
        
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;

        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    // 
    public function updateOtherMtcFinanApp($r)
    {
        $input = $r->input();
       
        $id = $input['id'];
        $general_id = $input['general_id'];
        $user = PersonalClaim::where('id', $id)->first();

        // if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        //     $filenames = array();
        //     foreach ($_FILES['file_upload']['name'] as $key => $filename) {
        //         $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        //         if (!empty($filename) && !empty($tmp_name)) {
        //             $fileInfo = PersonalFile($filename, $tmp_name);
        //             if ($fileInfo !== null) {
        //                 $filenames[] = $fileInfo['filename'];
        //             }
        //         }
        //     }
        // }
        // $fileString = implode(',', $filenames);
        // //pr($fileString);
        // $input['file_upload'] = $fileString ?? '';

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            PersonalClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
        

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        

       

        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    public function updateTravelMtcFinanChk($r,$id = '')
    {
        $input = $r->input();
        //pr($input);
        $id = $input['id'];
        $input['amount'] = $input['petrol']+$input['toll']+$input['parking'];
        $input['total_km'] = $input['millage'];
        //pr($input['amount']);
        $user = TravelClaim::where('id', $id)->first();

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            TravelClaim::where('id', $id)->update($input);
            $updatedTravelClaim = TravelClaim::select('general_id')->where('id', $id)->first();
            $general_id = $updatedTravelClaim->general_id;

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $updatedTravelClaim->general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }

       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($updatedTravelClaim->general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $updatedTravelClaim->general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $updatedTravelClaim->general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    //
    public function updateSubsMtcFinanChk($r)
    {
        $input = $r->input();
        $id = $input['id'];
        $general_id = $input['general_id'];

        // dd($input);

        $user = TravelClaim::where('id', $id)->first();

        if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
            $filenames = array();
            foreach ($_FILES['file_upload']['name'] as $key => $filename) {
                $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
                if (!empty($filename) && !empty($tmp_name)) {
                    $fileInfo = TravelFile($filename, $tmp_name);
                    if ($fileInfo !== null) {
                        $filenames[] = $fileInfo['filename'];
                    }
                }
            }
            $fileString = implode(',', $filenames);
        }
        $input['file_upload'] = $fileString ?? '';

        //pr($input['file_upload']);

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
            
            TravelClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

    
        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;
        
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;

        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    //
    public function updateOtherMtcFinanChk($r)
    {
        $input = $r->input();
       
        $id = $input['id'];
        $general_id = $input['general_id'];
        $user = PersonalClaim::where('id', $id)->first();

        // if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        //     $filenames = array();
        //     foreach ($_FILES['file_upload']['name'] as $key => $filename) {
        //         $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
        //         if (!empty($filename) && !empty($tmp_name)) {
        //             $fileInfo = PersonalFile($filename, $tmp_name);
        //             if ($fileInfo !== null) {
        //                 $filenames[] = $fileInfo['filename'];
        //             }
        //         }
        //     }
        // }
        // $fileString = implode(',', $filenames);
        // //pr($fileString);
        // $input['file_upload'] = $fileString ?? '';

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {

            PersonalClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
        

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

        

       

        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;

       
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;
        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }

    //
    public function updateSubsMtcSuperVApp($r)
    {
        $input = $r->input();
        $id = $input['id'];
        $general_id = $input['general_id'];

        // dd($input);

        $user = TravelClaim::where('id', $id)->first();

        if (!empty($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
            $filenames = array();
            foreach ($_FILES['file_upload']['name'] as $key => $filename) {
                $tmp_name = $_FILES['file_upload']['tmp_name'][$key];
                if (!empty($filename) && !empty($tmp_name)) {
                    $fileInfo = TravelFile($filename, $tmp_name);
                    if ($fileInfo !== null) {
                        $filenames[] = $fileInfo['filename'];
                    }
                }
            }
            $fileString = implode(',', $filenames);
        }
        $input['file_upload'] = $fileString ?? '';

        //pr($input['file_upload']);

        if (!$user) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'user not found';
        } else {
            
            TravelClaim::where('id', $id)->update($input);

            $personalClaims = PersonalClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();
        $travelClaims = TravelClaim::where([['tenant_id', Auth::user()->tenant_id], ['general_id', $general_id]])->get();

        foreach ($personalClaims as $claim) {
            $total[] = $claim->amount;
        }

        foreach ($travelClaims as $claims) {
            $totals[] = $claims->amount;
        }
       

        $allClaims = array_merge($personalClaims->toArray(), $travelClaims->toArray());
        
        $totalAmount = [
            'total_amount' => ($generalClaimData->amount ?? 0) + array_sum(array_column($allClaims, 'amount')),
        ];

    
        GeneralClaim::where('id', $general_id)->update($totalAmount);

        function getTotalCarClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Car')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        function getTotalMotorClaimByGeneralId($generalId)
        {
            $data = TravelClaim::select(DB::raw('SUM(total_km) AS total_km'))
                ->where('general_id', $generalId)
                ->where('type_claim', 'travel')
                ->where('type_transport', 'Personal Motocycle')
                ->groupBy('general_id')
                ->get();

            if ($data->isEmpty()) {
                return 0; // Return 0 if no records found
            }

            return $data[0]->total_km;
        }

        $data['totalCar'] = getTotalCarClaimByGeneralId($general_id) ?? 0;
        
        $data['totalMotor'] = getTotalMotorClaimByGeneralId($general_id) ?? 0;
       
        function getEntitlementByJobGradeCar($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $car = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'car')
                ->get();

            return $car;
        }

        $data['car'] = getEntitlementByJobGradeCar(Auth::user()->id);
        
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
       
        $carValue = $data['totalCar'] ??0;
       
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
        
        function getEntitlementByJobGradeMotor($id = '')
        {
            $jobGrade = Employee::where('user_id', $id)->value('jobGrade');
            $entitle = EntitleGroup::where('job_grade', $jobGrade)->value('id');
            $motor = TransportMillage::where('entitle_id', $entitle)
                ->where('type', 'motor')
                ->get();

            return $motor;
        }

        $data['motor'] = getEntitlementByJobGradeMotor(Auth::user()->id);
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

        $MotorValue = $data['totalMotor'] ?? 0;
        
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

        //pr($totalcarmotor);

        
        
        function getSummaryTravellingClaimByGeneralId($id = '')
        {
            $data = TravelClaim::select(
                    DB::raw('SUM(total_km) AS total_km'),
                    DB::raw('SUM(petrol) AS total_petrol'),
                    DB::raw('SUM(toll) AS total_toll'),
                    DB::raw('SUM(parking) AS total_parking'),
                    DB::raw('SUM(petrol) + SUM(toll) + SUM(parking) AS total_travelling')
                )
                ->where('general_id', $id)
                ->where('type_claim', 'travel')
                ->groupBy('general_id')
                ->get();

            return $data;
        }

        
        $IdGeneral=GeneralClaim::where('id', $general_id)->first();
        $realAmount = $IdGeneral->total_amount;
        
        // Calculate the total amount and assign it to the key 'total_amount' in the $totalRealAmount array
        $totalRealAmount['total_amount'] = $realAmount + $totalcarmotor;

        
        GeneralClaim::where('id', $general_id)->update($totalRealAmount);

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Data is updated';
        }

        return $data;
    }


}