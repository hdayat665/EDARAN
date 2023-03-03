<?php

namespace App\Service;

use App\Models\MyLeaveModel;
use App\Models\leavetypesModel;
use App\Models\Employee;
use App\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;

class MyleaveService
{
   public function myleaveView(){
        
         $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
            ->where('myleave.up_user_id', '=', '. Auth::user()->id .')
            ->where('myleave.leave_date', '>=', Carbon::now()->format('Y-m-d'))
            ->select('myleave.*', 'leave_types.leave_types as type')
            ->orderBy('myleave.applied_date', 'desc')
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
            ->get();

        return $data;

    }

    public function datatype(){

        $data = 
        leavetypesModel::where('tenant_id', Auth::user()->tenant_id)
                        ->where('status', '=', 1)
                        ->get();
        return $data;

    }


      public function createtmyleave($r)
    {
       $input = $r->input();

       $getdata = 
       Employee::where('tenant_id', Auth::user()->tenant_id)
                        ->where('user_id', '=', Auth::user()->id)
                        ->first(); 

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
        $data['msg'] = 'Success create myleave';

        return $data;

    }


    public function getcreatemyleave($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.id')
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
            $data['msg'] = 'Success delete your leave';
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
                        ->get();
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
        $data['msg'] = 'Success update myleave';

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
        $data['msg'] = 'Success update myleave';

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
        $data['msg'] = 'Success update myleave';

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
        $data['msg'] = 'Success update myleave';

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
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.id')
            ->select('myleave.*','ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2')
            ->get();

        return $data;
    }

    public function getuserleaveAppr($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.id')
            ->leftJoin('leave_types as lt', 'myleave.lt_type_id', '=', 'lt.id')
            ->select('myleave.*','ap.fullName as username', 'au.fullName as username1', 'mu.fullName as username2', 'lt.leave_types as leave_types')
            ->get();

        return $data;
    }
    public function getuserleaveApprhod($id)
    {
        $data = MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
            ->where('myleave.id', '=', $id)
            ->leftJoin('userprofile as ap', 'myleave.up_user_id', '=', 'ap.id')
            ->leftJoin('userprofile as au', 'myleave.up_recommendedby_id', '=', 'au.id')
            ->leftJoin('userprofile as mu', 'myleave.up_approvedby_id', '=', 'mu.id')
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