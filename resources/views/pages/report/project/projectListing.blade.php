@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header" id="projectReportListingJs">Reporting <small>| Project | Project Listing Report </small></h1>
    <div class="panel panel">
        <div class="panel-heading">
            <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
            <table id="projectReportListing" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th data-orderable="false" class="align-middle">Action</th>
                        <th width="5%" class="text-nowrap">LOA Date</th>
                        <th width="1%" class="text-nowrap">Customer Name</th>
                        <th width="1%" >Project Code</th>
                        <th width="1%" class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Account Manager</th>
                        <th class="text-nowrap">Project Manager</th>
                        <th class="text-nowrap">Contract Value</th>
                        <th class="text-nowrap">Contract Start Date</th>
                        <th class="text-nowrap">Contract End Date</th>
                        <th class="text-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($projectListings)
                        @foreach ($projectListings as $projectListing)
                        <tr class="odd gradeX">
                            <td style="text-align:center" width="1%" >
                                <a href ="/projectDetail/{{$projectListing->id}}"><i class="fas fa-eye fa-2x"></i></a>
                            </td>
                            <td width="1%">{{$projectListing->LOA_date}}</td>
                            <td width="1%">{{$projectListing->customer_name}}</td>
                            <td width="1%">{{$projectListing->project_code}}</td>
                            <td width="1%">{{$projectListing->project_name}}</td>
                            <td width="1%">{{($projectListing->acc_manager) ? getEmployeeNameById($projectListing->acc_manager)->employeeName ?? '-' : '-'}}</td>
                            <td width="1%">{{($projectListing->project_manager) ? getEmployeeNameById($projectListing->project_manager)->employeeName ?? '-' : '-'}}</td>
                            <td width="1%">{{$projectListing->contract_value}}</td>
                            <td width="1%">{{$projectListing->contract_start_date}}</td>
                            <td width="1%">{{$projectListing->contract_end_date}}</td>
                            <td width="1%">{{$projectListing->status}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
