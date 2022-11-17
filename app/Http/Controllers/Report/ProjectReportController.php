<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Service\ProjectReportService;
use App\Models\Customer;

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

    public function projectFilter()
    {
        $data = [];

        $prs = new ProjectReportService;

        return view('pages.report.project.projectStatus', $data);
    }

    public function getProjectByCustomerId($customer_id = '')
    {
        $data = [];
        $prs = new ProjectReportService;

        $data = $prs->getProjectByCustomerId($customer_id);

        return response()->json($data);
    }

    public function searchReport()
    {
        $query = $_GET;
        $prs = new ProjectReportService;
        // pr($query);
        if ($query['filter'] == 'All') {
            $data['statusAll'] = $prs->searchReportAll();
            $view = 'pages.report.project.filter.statusAllTable';

        }else if($query['filter'] == 'CustName'){
            $customer = Customer::where('id', $query['customerName'])->first();
            $data['customerName'] = $customer->customer_name;
// dd($query);
            $data['custName'] = $prs->searchReportCustName($query);
            $view = 'pages.report.project.filter.customerNameTable';

        }else if($query['filter'] == 'EmpName'){


            $data['empName'] = $prs->searchReportEmpName($query);
            $view = 'pages.report.project.filter.employeeNameTable';

        }else if($query['filter'] == 'ProjName'){

            $data['projName'] = $prs->searchReportProjName($query);
            $data['projMember'] = $prs->getProjectMember($query);
            $view = 'pages.report.project.filter.projectNameTable';

        }else if($query['filter'] == 'FinYear'){

            $data['financialYear'] = $query['financialYear'];

            $data['finYear'] = $prs->searchReportFinYear($query);
            $view = 'pages.report.project.filter.finYearTable';

        }else if($query['filter'] == 'AccManager'){
            dd($query);
            $data['accManager'] = $prs->searchReportAccManager($query);
            $view = 'pages.report.project.filter.accManagerTable';

        }else if($query['filter'] == 'ProjManager'){
            $data['projManager'] = $prs->searchReportAccManager($query);
            $view = 'pages.report.project.filter.projManagerTable';
        }else if($query['filter'] == 'Status'){
            $data['status'] = $prs->searchReportAccManager($query);
            $view = 'pages.report.project.filter.statusTable';
        }
    // dd($query);
       //dd($view);
        return view($view, $data);
    }

}
