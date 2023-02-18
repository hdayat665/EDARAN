<?php

namespace App\Service;

use App\Models\MyLeaveModel;
use App\Models\leavetypesModel;
use App\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class MyleaveService
{
   public function myleaveView(){
        
        $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        // ->where('myleave.status', '=', 1)
                        ->where('myleave.up_user_id', '=', Auth::user()->id)
                        ->select('myleave.*','leave_types.leave_types as type')
                        ->orderBy('myleave.applied_date', 'desc')
                        ->get();
        return $data;
    }

    public function myleaveHistoryView(){
        $data = 
        
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        // ->where('myleave.status', '!=', 3)
                        ->where('myleave.up_user_id', '=', Auth::user()->id)
                        ->select('myleave.*','leave_types.leave_types as type')
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

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        $etData = MyLeaveModel::where([['applied_date', $input['applied_date']], ['tenant_id', Auth::user()->tenant_id]])->first();
        if ($etData) {
            $data['msg'] = 'Date already exists in list hmyleave.';
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');

            return $data;
        }

        $data1 = $input['applied_date'];
        $data2 = $input['typeofleave'];
        $data3 = $input['noofday'];
        $data5 = $input['leave_date'];
        $data6 = $input['flexRadioDefault'];

        if($input['noofday'] == 1){
            $data7 = $input['leave_date'];
            $data8 = $input['leave_date'];
            $data4 = 1;
        }else if ($input['noofday'] == 0.5){
            $data7 = $input['leave_date'];
            $data8 = $input['leave_date'];
            $data4 = 0.5;
        }else{
            $data7 = $input['start_date'];
            $data8 = $input['end_date'];
            $data4 = $input['total_day_appied'];
        }
        
        $data9 = $input['reason'];
        

        $input = [
                'applied_date' => $data1,
                'lt_type_id' => $data2,
                'day_applied' => $data3,
                'total_day_applied' => $data4,
                'leave_date' => $data5,
                'leave_session' => $data6,
                'start_date' => $data7,
                'end_date' => $data8,
                'reason' => $data9,
                'status_user' => '2',
                'up_rec_status' => '2',
                'up_app_status' => '2',
                'tenant_id' => Auth::user()->tenant_id,
                'up_user_id' => Auth::user()->id 
            ];

        MyLeaveModel::create($input);
        

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success create company';

        return $data;
    }


    public function getcreatemyleave($id)
    {
        $data = MyLeaveModel::find($id);

        return $data;
    }

    public function deletemyleave($id)
    {
        $logs = MyLeaveModel::find($id);

        if (!$logs) {
            $data['status'] = config('app.response.error.status');
            $data['type'] = config('app.response.error.type');
            $data['title'] = config('app.response.error.title');
            $data['msg'] = 'Leave holiday not found';
        } else {
            $logs->delete();

            $data['status'] = config('app.response.success.status');
            $data['type'] = config('app.response.success.type');
            $data['title'] = config('app.response.success.title');
            $data['msg'] = 'Success delete Leave holiday';
        }

        return $data;
    }


    //sepervisor

    public function leaveApprView(){
        
        $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
                        // ->where('myleave.status', '=', 1)
                        // ->orWhere('myleave.status', '=', 2)
                        ->select('myleave.*','leave_types.leave_types as type', 'userprofile.fullName')
                        ->orderBy('myleave.applied_date', 'desc')
                        ->get();
        return $data;
    }


    public function updatesupervisor($r, $id)
    {
        $input = $r->input();

         $input = [
                'up_recommendedby_id' => Auth::user()->id ,
                'up_rec_status' => 4,
                'up_rec_reason' => '',
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

     public function updatesupervisorreject($r, $id)
    {
        $input = $r->input();
        $data1 = $input['reasonreject'];

         $input = [
                'up_recommendedby_id' => Auth::user()->id ,
                'up_rec_status' => 3,
                'up_rec_reason' => $data1,
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

    //hod
     public function leaveApprhodView(){
        
        $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
                        // ->where('myleave.status', '=', 1)
                        // ->orWhere('myleave.status', '=', 2)
                        ->select('myleave.*','leave_types.leave_types as type', 'userprofile.fullName')
                        ->orderBy('myleave.applied_date', 'desc')
                        ->get();
        return $data;
    }

    public function updatehod($r, $id)
    {
        $input = $r->input();

         $input = [
                'up_approvedby_id' => Auth::user()->id ,
                'up_app_status' => 4,
                'up_app_reason' => '',
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

     public function updatehodreject($r, $id)
    {
        $input = $r->input();
        $data1 = $input['reasonreject'];

         $input = [
                'up_approvedby_id' => Auth::user()->id ,
                'up_app_status' => 3,
                'up_app_reason' => $data1,
            ];

        MyLeaveModel::where('id', $id)->update($input);

        $data['status'] = config('app.response.success.status');
        $data['type'] = config('app.response.success.type');
        $data['title'] = config('app.response.success.title');
        $data['msg'] = 'Success update company';

        return $data;
    }

    public function getusermyleave($id)
    {
        // $data = MyLeaveModel::find($id);

        // return $data;

        $data = 
        MyLeaveModel::where('myleave.tenant_id', Auth::user()->tenant_id)
                        ->leftJoin('leave_types', 'myleave.lt_type_id', '=', 'leave_types.id')
                        ->leftJoin('userprofile', 'myleave.up_user_id', '=', 'userprofile.user_id')
                        ->where('myleave.status_user', '=', 2)
                        ->where('myleave.id', '=', $id)
                        ->where('myleave.up_user_id', '=', Auth::user()->id)
                        ->select('myleave.*','leave_types.leave_types as type', 'userprofile.fullName')
                        ->orderBy('myleave.applied_date', 'desc')
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