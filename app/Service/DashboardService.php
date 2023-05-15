<?php

namespace App\Service;

use App\Models\News;
use App\Models\TimesheetEvent;
use App\Models\Employee;
use App\Models\Project;
use App\Models\ProjectLocation;
use App\Models\ProjectMember;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardService
{

    public function newsView()
    {
        $data['news'] = News::where('tenant_id', Auth::user()->tenant_id)
            ->orderBy('id', 'desc')
            ->get();

        if ($data['news']->isEmpty()) {
            $data['news'] = collect(); // Set an empty collection if there are no news items
        }

        return $data;
    }



    public function eventView()
    {
        $data['events'] = TimesheetEvent::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();
        
        if (!$data) {
            $data = [];
        }

        return $data;
    }

    public function myProject()
    {
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        // pr(Auth::user()->id);
        $projectMember = ProjectMember::select('project_id')->where('employee_id', '=', $employee->id)->groupBy('project_id')->get();

        foreach ($projectMember as $project) {
            $projectId[] = $project->project_id;
        }

        $data2 = DB::table('project_member as a')
            ->leftJoin('project as b', 'a.project_id', '=', 'b.id')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')
            ->select('a.id as member_id', 'a.status as request_status', 'a.location', 'a.id as memberId', 'b.*', 'c.customer_name')
            ->where([['a.employee_id', '=', $employee->id], ['a.status', 'approve']])
            ->get();

        
        $data['numberOfObjects'] = count($data2);
        
        if (!$data) {
            $data = [];
        }
        //pr($data['numberOfObjects']);
        return $data;
    }

    public function allproject()
    {
        $tenant_id = Auth::user()->tenant_id;
        $cond[1] = ['a.tenant_id', '=', $tenant_id];

        $data2 = DB::table('project as a')
            ->select('a.*')
            ->where($cond)
            ->orderBy('id', 'desc')
            ->get();
        
        $data['allproject'] = count($data2);
        
        if (!$data) {
            $data = [];
        }


        return $data;
    }
    public function allEmployee()
    {
        $userId = Auth::user()->tenant_id;
        $data2= DB::table('employment as a')
            ->select('a.*')
            ->where([['a.tenant_id', $userId], ['status', '=', 'active']])
            ->orderBy('id', 'desc')
            ->get();

        $data['allEmployee'] = count($data2);
        //pr($data['allEmployee']);
        if (!$data) {
            $data = [];
        }
    
        return $data;
    }
}