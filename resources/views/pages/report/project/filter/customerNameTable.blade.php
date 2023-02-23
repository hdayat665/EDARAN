@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Project  | Project Report </small></h1>
    <div class="panel panel">   
        <div class="panel-body" id="projectStatusJs">
            <div class="row p-2"> 
                <h4>Project Report</h4>
            </div>
            <div class="row p-2"> 
                <h5>Customer Name: {{ $customerName }}</h5>
            </div>

        <table id="customerTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th width="1%">NO</th>
                    <th class="text-nowrap">Project Code</th>
                    <th class="text-nowrap">Project Name</th>
                    <th class="text-nowrap">Description</th>
                    <th class="text-nowrap">Contract Value</th>
                    <th class="text-nowrap">Contract Type</th>
                    <th class="text-nowrap">Financial Year</th>
                    <th class="text-nowrap">LOA Date</th>
                    <th class="text-nowrap">Contract Start Date</th>
                    <th class="text-nowrap">Contract End Date</th>
                    <th class="text-nowrap">Account Manager</th>
                    <th class="text-nowrap">Project Manager</th>
                    <th class="text-nowrap">Warranty Start Date</th>
                    <th class="text-nowrap">Warranty End Date</th>
                    <th class="text-nowrap">Bank Gurantee Amount</th>
                    <th class="text-nowrap">Bank Gurantee Expiry Date</th>
                    <th class="text-nowrap">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @if ($custName)
                @foreach ($custName as $project)
                <tr class="odd gradeX">
                    <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                    <td class="text-nowrap">{{$project->project_code}}</td>
                    <td class="text-nowrap">{{$project->project_name}}</td>
                    <td class="text-nowrap">{{$project->desc}}</td>
                    <td class="text-nowrap">{{$project->contract_value}}</td>
                    <td class="text-nowrap">{{$project->contract_type}}</td>
                    <td class="text-nowrap">{{$project->financial_year}}</td>
                    <td class="text-nowrap">{{$project->LOA_date}}</td>
                    <td class="text-nowrap">{{$project->contract_start_date}}</td>
                    <td class="text-nowrap">{{$project->contract_end_date}}</td>
                    <td class="text-nowrap">{{$project->acc_manager_name}}</td>
                    <td class="text-nowrap">{{$project->project_manager_name}}</td>
                    <td class="text-nowrap">{{$project->warranty_start_date}}</td>
                    <td class="text-nowrap">{{$project->warranty_end_date}}</td>
                    <td class="text-nowrap">{{$project->bank_guarantee_amount}}</td>
                    <td class="text-nowrap">{{$project->bank_guarantee_expiry_date}}</td>
                    <td class="text-nowrap">{{$project->status}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/projectFilter" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
    </div>
</div>
@endsection
