@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Project  | Project Report </small></h1>
    <div class="panel panel" id="projectStatusJs">
        <div class="panel-heading">
            <h3>Project Report</h3>
            <div class="panel-heading-btn">
            </a>
        </div>
        
    </div>
    <div class="panel-body">
        <caption><h5>Table for All</h5></caption>
        <table id="statusAll" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th width="1%">NO</th>
                    <th class="text-nowrap">Customer Name</th>
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
                @if ($statusAll)
                @foreach ($statusAll as $project)

                <tr class="odd gradeX">
                    <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                    <td class="text-nowrap">{{$project->customer_name}}</td>
                    <td class="text-nowrap">{{$project->project_code}}</td>
                    <td class="text-nowrap">{{$project->project_name}}</td>
                    <td class="text-nowrap" style="white-space: normal;">
                    <?php
                        $desc = $project->desc;
                        $desc_words = explode(" ", $desc);
                        $line_length = 5;
                        for ($i = 0; $i < count($desc_words); $i += $line_length) {
                        $line_words = array_slice($desc_words, $i, $line_length);
                        $line = implode(" ", $line_words);
                        echo $line . "<br>";
                        }
                    ?>
                    </td>
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
