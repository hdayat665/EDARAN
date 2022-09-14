<?php
namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use App\Service\EmployeeService;
use App\Service\ProjectReportService;
use App\Service\ProjectService;
use Illuminate\Http\Request;


class ProjectReportController extends Controller
{
    public function projectListingView()
    {
        $data = [];

        $prs = new ProjectReportService;

        $data['projectListings'] = $prs->projectListingView();

        return view('pages.report.project.projectListing', $data);
    }

    public function projectDetail($id)
    {
        $data = [];

        $prs = new ProjectReportService;

        $data['detailProject'] = $prs->detailsProject($id);
        $data['projectMembers'] = $prs->projectMemberList($id);
            // pr($data);
        return view('pages.report.project.projectDetail', $data);
    }
}
