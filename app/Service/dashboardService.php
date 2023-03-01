<?php

namespace App\Service;

use App\Models\News;
use App\Models\TimesheetEvent;
use Illuminate\Support\Facades\Auth;

class DashboardService {

    public function newsView()
    {
        $data['news'] = News::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();
        return $data;
    }

    public function eventView()
    {
        $data['events'] = TimesheetEvent::where('tenant_id', Auth::user()->tenant_id)->orderBy('id', 'desc')->get();
        return $data;
    }

}