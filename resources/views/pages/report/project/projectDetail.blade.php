@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header" id="projectReportListingJs">Reporting <small>| Project | Project Listing </small></h1>
    <div class="panel panel">
        <div class="panel-body">
            <h4 class="panel-title"> Project Information</h4>
            <div style="display: flex; justify-content: flex-end">
                <button type="button" class="btn btn-inverse me-5 hide-on-print" id="printButton">PRINT</button>
            </div>
            <form>
                <div class="row mb-15px">
                    <div class="col-md-4 next">
                        <label class="form-label col-form-label col-md-4">Customer Name*</label>
                        <input type="customer name" readonly class="form-control mb-5px" value="{{$detailProject->customer_name}}" />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">Project Code*</label>
                        <input type="Project Code" readonly class="form-control mb-5px" value="{{$detailProject->project_code}}" />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">Project Name*</label>
                        <input type="Project name" readonly class="form-control mb-5px" value="{{$detailProject->project_name}}" />
                    </div>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-12">
                    <label class="form-label col-form-label col-md-1">Description</label>
                        <textarea class="form-control" readonly rows="3" style="text-transform: uppercase;">{{$detailProject->desc}}</textarea>
                    </div>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4 next">
                        <label class="form-label col-form-label col-md-4">Contract Value*</label>
                        <input type="contract-value" readonly class="form-control mb-5px" value="{{$detailProject->contract_value}}" />
                    </div>
                    <div class="col-md-4 next">
                        <label class="form-label col-form-label col-md-4">Contract Type</label>
                        <input type="contract-type" readonly class="form-control mb-5px" value="{{$detailProject->contract_type}}" />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">Financial Year*</label>
                        <input type="financial-year" readonly class="form-control mb-5px" value="{{$detailProject->financial_year}}" />
                    </div>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">LOA Date*</label>
                        <input type="LOA-date" readonly class="form-control mb-5px" value="{{$detailProject->LOA_date}}" />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">Contract Start Date*</label>
                        <input type="contract-start-date" readonly class="form-control mb-5px" value="{{$detailProject->contract_start_date}}"  />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">Contract End Date*</label>
                        <input type="contract-end-date" readonly class="form-control mb-5px" value="{{$detailProject->contract_end_date}}" />
                    </div>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4 next">
                        <label class="form-label col-form-label col-md-4">Account Manager*</label>
                        <input type="account-manager" readonly class="form-control mb-5px" value="{{($detailProject->acc_manager) ? getEmployeeNameById($detailProject->acc_manager)->employeeName ?? '-' : '-'}}" />
                    </div>
                    <div class="col-md-4 next">
                        <label class="form-label col-form-label col-md-4">Project Manager*</label>
                        <input type="project-manager" readonly class="form-control mb-5px" value="{{($detailProject->project_manager) ? getEmployeeNameById($detailProject->project_manager)->employeeName ?? '-' : '-'}}" />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">Warranty Start Date</label>
                        <input type="warranty-start-date" readonly class="form-control mb-5px" value="{{$detailProject->warranty_start_date}}" />
                    </div>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4 next">
                        <label class="form-label col-form-label">Warranty End Date</label>
                        <input type="warranty-end-date" readonly class="form-control mb-5px" value="{{$detailProject->warranty_end_date}}" />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label ">Bank Guarantee Amount*</label>
                        <input type="bank-gurantee-amount" readonly class="form-control mb-5px" value="{{$detailProject->bank_guarantee_amount}}" />
                    </div>
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label">Bank Guarantee Expiry Date</label>
                        <input type="bank-gurantee-expiry" readonly class="form-control mb-5px" value="{{$detailProject->bank_guarantee_expiry_date}}" />
                    </div>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4 next">
                    <label class="form-label col-form-label col-md-4">Status</label>
                        <input type="status" readonly class="form-control mb-5px" value="{{$detailProject->status}}" />
                    </div>
                </div>
            </form>
        </div>
        <!-- BEGIN panel-body -->
        <style>
            @media print{
                .hide-on-print {
                    display: none;
                }
                #header {
                    display: none; /* Adjust the value as needed */
                }
                .page-header{
                    display: none;
                }
                .navbar-nav {
                    display: none;
                }
                #content {
                    position: absolute;
                    top: 0;
                    padding-top: 1cm;
                }
                @page {
                    margin-bottom: 2cm; /* Adjust this value as needed */
                }
                #projectMemberTable_wrapper .dataTables_paginate {
                    display: none;
                }
                #projectMemberTable_wrapper .dataTables_info,
                #projectMemberTable_wrapper .dataTables_length,
                #projectMemberTable_wrapper .dataTables_filter {
                    display: none;
                }
                input[type] {
                    width: 100%;
                    padding: 2px 2px;
                    margin: 2px 2px;
                    /* box-sizing: border-box; */
                    border: none;
                    -webkit-transition: 0.5s;
                    transition: 0.5s;
                    outline: none;
                }
                textarea {
                    border: none !important;
                    padding: 1px 2px;
                    margin: 2px 0;
                    outline: none;
                    width: 100%;
                }
                .next {
                    float: left;
                    width: 33%; 
                }
                .clearfix::after {
                    content: "";
                    clear: both;
                    display: table;
                }
            }
        </style>

        <div class="row print-container">
            <div class="col-md-12">
                <div class="panel-body">
                    <table id="projectMemberTable" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="1%">NO</th>
                                <th class="text-nowrap">Project Member Name</th>
                                <th class="text-nowrap">Designation</th>
                                <th class="text-nowrap">Department</th>
                                <th class="text-nowrap">Branch</th>
                                <th class="text-nowrap">Unit</th>
                                <th class="text-nowrap">Joined Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $id = 0 ?>

                        @if ($projectMembers)
                                @foreach ($projectMembers as $projectMember)
                        <?php $id++ ?>

                                <tr class="odd gradeX">
                                    <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                                    <td>{{$projectMember->employeeName}}</td>
                                    <td>{{$projectMember->designationName}}</td>
                                    <td>{{$projectMember->departmentName}}</td>
                                    <td>{{$projectMember->branchName}}</td>
                                    <td>{{$projectMember->unitName}}</td>
                                    <td>{{$projectMember->joined_date}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="row p-2">
                        <div class="col align-self-start">
                            <a href="/projectListing" class="btn btn-light hide-on-print" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <script>
        function printAndShowAllRows() {
        // Show all rows in the table
        $('#projectMemberTable').DataTable().page.len(-1).draw();

        // Print the page
        window.print();
    }
</script> -->

