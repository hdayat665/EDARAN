<?php

namespace App\Service;

use App\Models\MyLeaveModel;
use App\Models\leavetypesModel;
use App\Models\holidayModel;
use App\Models\Employee;
use App\Models\ActivityLogs;
use App\Models\leaveEntitlementModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;


class MyleaveService
{
   public function myleaveView(){
        
         $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.up_user_id', '=', Auth::user()->id)
            ->where('myleave.leave_date', '>=', Carbon::now()->format('Y-m-d'))
            ->select('myleave.*', 'leave_types.leave_types as type')
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc')
            ->get();

        return $data;
    }

    public function myleaveHistoryView(){
     
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.up_user_id', '=', Auth::user()->id)
            ->where('myleave.leave_date', '<', Carbon::now()->format('Y-m-d'))
            ->select('myleave.*', 'leave_types.leave_types as type')
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc')
            ->get();

        return $data;

    }

    public function searcmyleavehistory($r)
    {
       $input = $r->input();
        $query = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                    ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                    ->where('myleave.up_user_id', '=', Auth::user()->id)
                    ->where('myleave.leave_date', '<', Carbon::now()->format('Y-m-d'))
                    ->select('myleave.*', 'leave_types.leave_types as type')
                    ->orderBy('myleave.applied_date', 'desc')
                    ->orderBy('myleave.created_at', 'desc')
                    ;
                    

        if ($input['applydate']) {
            $applydate = $input['applydate'];
            $query->where('myleave.applied_date', '=', $applydate);
        }

        if ($input['typelist']) {
            $typelist = $input['typelist'];
            $query->where('leave_types.id', '=', $typelist);
        }

        if ($input['status']) {
            $status = $input['status'];
            $query->where('myleave.status_final', '=', $status);
        }

        $data = $query->get();
        return $data;
    }

    public function datatype(){

        $data = 
        leavetypesModel::where('tenant_id', Auth::user()->tenant_id)
                        ->where('status', '=', 1)
                        ->get();
        return $data;

    }

    public function datapie(){

        // $data = 
        // leavetypesModel::where('tenant_id', Auth::user()->tenant_id)
        //                 ->where('status', '=', 1)
        //                 ->get();
        // return $data;

        $data = leaveEntitlementModel::where('leave_Entitlement.tenant_id', Auth::user()->tenant_id)
            ->rightJoin('myleave', 'leave_entitlement.id_userprofile', '=', 'myleave.up_user_id')
            ->where('up_rec_status', '4')
            ->where('up_app_status', '4')
            ->where('up_user_id', Auth::user()->id)
            ->select('current_entitlement', 'current_entitlement_balance', DB::raw('SUM(total_day_applied) as total_day_applied'))
            ->first();

        return $data;

    }


      public function createtmyleave($r)
    {
       $input = $r->input();



       $getdata = Employee::where('tenant_id', Auth::user()->tenant_id)
                        ->where('user_id', '=', Auth::user()->id)
                        ->first(); 
        //  $etData = leavetypesModel::where([['leave_types_code', $input['leave_types_code']], ['tenant_id', Auth::user()->tenant_id]])->first();
        
        //pr($getdata->eleaverecommender);

       

        if (!$getdata) {
            $data['msg'] = 'Please select the e-Leave approver';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $getDateSame = MyLeaveModel::where([['start_date', $input['leave_date']], ['tenant_id', Auth::user()->tenant_id]], ['up_user_id', Auth::user()->id])->first();
        if($getDateSame){
            $data['msg'] = 'There is an existing application for the date selected';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $getDateSame = holidayModel::where([['start_date', $input['leave_date']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if($getDateSame){
            $data['msg'] = 'The selected date cannot be selected';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK && $_FILES['file']['size'] > 0) {
            $myleave = upload($r->file('file'));
            $input['file'] = $myleave['filename'];
        } else {
            
            $input['file'] = null;
        }


        $data1 = date('Y-m-d', strtotime($input['applied_date']));
        $data2 = $input['typeofleave'];
        $data3 = $input['noofday'];
        $data8 = $input['file'];
        $data9 = $input['reason'];

        if($r->input('noofday') == 1){
            $data3 = $input['noofday'];
            $data4 = $input['total_day_appied'];
            $data5 = date('Y-m-d', strtotime($input['leave_date']));
            $data6 = date('Y-m-d', strtotime($input['leave_date']));
            $data7 = date('Y-m-d', strtotime($input['leave_date']));
        }else if ($r->input('noofday') == 0.5){
            $data3 = $input['noofday'];
            $data4 = $input['total_day_appied'];
            $data5 = date('Y-m-d', strtotime($input['leave_date']));
            $data6 = date('Y-m-d', strtotime($input['leave_date']));
            $data7 = date('Y-m-d', strtotime($input['leave_date']));
        }else{
            $data3 = $input['total_day_appied'];
            $data4 = $input['total_day_appied'];
            $data5 = date('Y-m-d', strtotime($input['start_date']));
            $data6 = date('Y-m-d', strtotime($input['start_date']));
            $data7 = date('Y-m-d', strtotime($input['end_date']));
        }

        if($r->input('flexRadioDefault')){
            $data10 = $input['flexRadioDefault'];
        }else{
            $data10 = null;
        }
        
        if (!$getdata->eleaverecommender) {
            
            $input = [
                'applied_date' => $data1,
                'lt_type_id' => $data2,
                'day_applied' => $data3,
                'total_day_applied' => $data4,
                'leave_date' => $data5,
                'start_date' => $data6,
                'end_date' => $data7,
                'file_document' => $data8,
                'reason' => $data9,
                'leave_session' => $data10,
                'up_approvedby_id' => $getdata->eleaveapprover,
                'status_user' => '2',
                'up_rec_status' => '4',
                'up_app_status' => '2',
                'status_final' => '1',
                'tenant_id' => Auth::user()->tenant_id,
                'up_user_id' => Auth::user()->id 
            ];

        MyLeaveModel::create($input);
        

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Applied';

        return $data;

        }

        $input = [
                'applied_date' => $data1,
                'lt_type_id' => $data2,
                'day_applied' => $data3,
                'total_day_applied' => $data4,
                'leave_date' => $data5,
                'start_date' => $data6,
                'end_date' => $data7,
                'file_document' => $data8,
                'reason' => $data9,
                'leave_session' => $data10,
                'up_recommendedby_id' => $getdata->eleaverecommender,
                'up_approvedby_id' => $getdata->eleaveapprover,
                'status_user' => '2',
                'up_rec_status' => '2',
                'up_app_status' => '2',
                'status_final' => '1',
                'tenant_id' => Auth::user()->tenant_id,
                'up_user_id' => Auth::user()->id 
            ];

        MyLeaveModel::create($input);
        

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Applied';

        return $data;

    }


    public function getcreatemyleave($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->select('myleave.*', 'au.fullName as username1', 'mu.fullName as username2')
            ->get();

        return $data;

       
    }

    public function deletemyleave($id)
    {
        $logs = MyLeaveModel::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'your leave not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Leave Application Is Cancelled';
        }

        return $data;
    }


    //sepervisor

    public function leaveApprView(){
        
        $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
                        ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
                        ->select('myleave.*','leave_types.leave_types as type', 'userprofile.fullName')
                        ->orderBy('myleave.applied_date', 'desc')
                        ->orderBy('myleave.created_at', 'desc')
                        ->get();
        return $data;
    }

    public function idemployer(){
         $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
                        ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
                        ->select('userprofile.user_id', 'userprofile.fullName')
                        ->groupBy('userprofile.user_id')
                        ->get();
        return $data;
    }
    public function idemployerhod(){
         $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
                        ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
                        ->where('myleave.up_rec_status', '=', 4)
                        ->select('userprofile.user_id', 'userprofile.fullName')
                        ->groupBy('userprofile.user_id')
                        ->get();
        return $data;
    }

    public function searleavaappr($r){

        $input = $r->input();

        $query =    
        MyLeaveModel::select('myleave.*','leave_types.leave_types as type', 'userprofile.fullName')
        ->join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
        ->join('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
        ->where('myleave.up_recommendedby_id', '=', Auth::user()->id)
        ->where('myleave.tenant_id', Auth::user()->tenant_id)
        ->orderBy('myleave.applied_date', 'desc')
        ->orderBy('myleave.created_at', 'desc');
        
            if ($input['applydate']) {
                $applydate = $input['applydate'];
                $query->where('myleave.applied_date', '=', $applydate);
            }

            if ($input['idemployer']) {
                $idemployer = $input['idemployer'];
                $query->where('myleave.up_user_id', '=', $idemployer);
            }

            if ($input['type']) {
                $type = $input['type'];
                $query->where('myleave.lt_type_id', '=', $type);
            }

        $data = $query->get();
        return $data;
    }

    public function searApprhod($r){

        $input = $r->input();

        $query = 
           
        MyLeaveModel::
            select('myleave.*','leave_types.leave_types as type', 'userprofile.fullName')
            ->Join('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->Join('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
            ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
            ->where('myleave.up_rec_status', '=', 4)
            ->where('myleave.tenant_id', Auth::user()->tenant_id)
            ->orderBy('myleave.applied_date', 'desc')
            ->orderBy('myleave.created_at', 'desc');
                
            if ($input['applydate']) {
                $applydate = $input['applydate'];
                $query->where('myleave.applied_date', '=', $applydate);
            }

            if ($input['idemployer']) {
                $idemployer = $input['idemployer'];
                $query->where('myleave.up_user_id', '=', $idemployer);
            }

            if ($input['type']) {
                $type = $input['type'];
                $query->where('myleave.lt_type_id', '=', $type);
            }

        $data = $query->get();
        return $data;
    }


    public function updatesupervisor($r, $id)
    {
        $input = $r->input();

         $input = [

                'up_rec_status' => 4,
                'up_rec_reason' => '',
                'status_final' => 2,
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Approved';

        return $data;
    }

     public function updatesupervisorreject($r, $id)
    {
        $input = $r->input();
        $data1 = $input['reasonreject'];

         $input = [
                'up_rec_status' => 3,
                'up_rec_reason' => $data1,
                'status_final' => 3,
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Rejected';

        return $data;
    }

    //hod
     public function leaveApprhodView(){
        
        $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
                        ->where('myleave.up_approvedby_id', '=', Auth::user()->id)
                        ->where('myleave.up_rec_status', '=', 4)
                        ->select('myleave.*','leave_types.leave_types as type', 'userprofile.fullName')
                        ->orderBy('myleave.applied_date', 'desc')
                        ->orderBy('myleave.created_at', 'desc')
                        ->get();
        return $data;
    }

    public function updatehod($r, $id)
    {
        $input = $r->input();

         $input = [
                'up_app_status' => 4,
                'up_app_reason' => '',
                'status_final' => 4,
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Approved';

        return $data;
    }

     public function updatehodreject($r, $id)
    {
        $input = $r->input();
        $data1 = $input['reasonreject'];

         $input = [

                'up_app_status' => 3,
                'up_app_reason' => $data1,
                'status_final' => 3,
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Leave Application is Rejected';

        return $data;
    }

    // public function getcreatemyleave($id)
    // {
    //     $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
    //         ->where('myleave.id', '=', $id)
    //         ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.id')
    //         ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.id')
    //         ->select('myleave.*', 'au.fullName as username1', 'mu.fullName as username2')
    //         ->get();

    //     return $data;

       
    // }


    public function getusermyleave($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->select('myleave.*','ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2')
            ->get();

        return $data;
    }
    public function getpieleave()
    {
        $currentYear = date('Y');
        $datapie = 
        leaveEntitlementModel::where('leave_Entitlement.tenant_id', Auth::user()->tenant_id)
        ->rightJoin('myleave', 'leave_entitlement.id_userprofile', '=', 'myleave.up_user_id')
        ->where('myleave.up_rec_status', '!=', '3')
        ->where('myleave.up_app_status', '!=', '3')
        ->where('myleave.up_user_id', Auth::user()->id)
        ->whereYear('leave_entitlement.le_year', '=', $currentYear) 
        ->whereYear('myleave.applied_date', '=', $currentYear) 
        ->select('leave_entitlement.current_entitlement', 'leave_entitlement.current_entitlement_balance', DB::raw('SUM(myleave.total_day_applied) as total_day_applied'))
        ->first();
        

        if(isset($datapie) && isset($datapie->total_day_applied)) {
            return $datapie;
        } else {

            $currentYear = date('Y');
            $datapie = leaveEntitlementModel::where('tenant_id', Auth::user()->tenant_id)
                ->whereYear('le_year', '=', $currentYear) 
                ->where('id_userprofile', Auth::user()->id)
                ->select('current_entitlement', 'current_entitlement_balance', DB::raw('"0" as total_day_applied'))
                ->first();
                return $datapie;
        }
    }
    public function getpieleave2()
    {
        $endYear = date('Y') - 1;
        $datapie2 = 
        leaveEntitlementModel::where('leave_Entitlement.tenant_id', Auth::user()->tenant_id)
        ->rightJoin('myleave', 'leave_entitlement.id_userprofile', '=', 'myleave.up_user_id')
        ->where('myleave.up_rec_status', '!=', '3')
        ->where('myleave.up_app_status', '!=', '3')
        ->where('myleave.up_user_id', Auth::user()->id)
        ->whereYear('leave_entitlement.le_year', '=', $endYear)
        ->whereYear('myleave.applied_date', '=', $endYear) 
        ->select('leave_entitlement.current_entitlement', 'leave_entitlement.current_entitlement_balance', DB::raw('SUM(myleave.total_day_applied) as total_day_applied'))
        ->first();

        if(isset($datapie2) && isset($datapie2->total_day_applied)) {
            return $datapie2;
        } else {

            $defaultCurrentEntitlement = '14';
            $defaultCurrentEntitlementBalance = '14';
            $defaultTotalDayApplied = '0';
            $datapie2 = new leaveEntitlementModel;
            $datapie2->fill([
                'current_entitlement' => $defaultCurrentEntitlement,
                'current_entitlement_balance' => $defaultCurrentEntitlementBalance,
                'total_day_applied' => $defaultTotalDayApplied
            ]);
            return $datapie2;

        }

        
    }

    public function getuserleaveAppr($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*','ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }
    public function getuserleaveApprview($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*','ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }
    public function getuserleaveApprhod($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*','ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }
    public function getuserleaveApprhodview($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.user_id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.user_id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.user_id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*','ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }


    public function approvemyleave($id)
    {
        $data1 = "";

        $input = [
                'up_recommendedby_id' => $data1,
            ];


        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
        
    }

    public function approvemyleaveby($id)
    {
        $data1 = 4; 

        $input = [
                'up_recommendedby_id' => Auth::user()->id,
                'status' => $data1,
            ];


        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update Status';

        return $data;
        
    }

   

}