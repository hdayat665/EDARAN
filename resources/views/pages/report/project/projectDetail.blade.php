@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header" id="projectReportListingJs">Reporting <small>| Project | View Listing Report </small></h1>
    <div class="panel panel">
        <br>
        <div style="display: flex; justify-content: flex-end">
            <button type="button" class="btn btn-inverse me-5 " onClick="window.print()">PRINT</button>
        </div>
        <div class="panel-body">
            <h4 class="panel-title"> Project Information</h4>
            <form>
                <div class="row">
                    <label class="form-label col-form-label col-md-4">Customer Name*</label>
                    <label class="form-label col-form-label col-md-4">Project Code*</label>
                    <label class="form-label col-form-label col-md-4">Project Name*</label>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4">
                        <input type="customer name" readonly class="form-control mb-5px" value="{{$detailProject->customer_name}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="Project Code" readonly class="form-control mb-5px" value="{{$detailProject->project_code}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="Project name" readonly class="form-control mb-5px" value="{{$detailProject->project_name}}" />
                    </div>
                </div>
                <div class="row">
                    <label class="form-label col-form-label col-md-1">Description</label>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-12">
                        <textarea class="form-control" readonly rows="3" style="text-transform: uppercase;">{{$detailProject->desc}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Contract Value*</label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Contract Type</label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Financial Year*</label>
                    </div>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4">
                        <input type="contract-value" readonly class="form-control mb-5px" value="{{$detailProject->contract_value}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="contract-type" readonly class="form-control mb-5px" value="{{$detailProject->contract_type}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="financial-year" readonly class="form-control mb-5px" value="{{$detailProject->financial_year}}" />
                    </div>
                </div>
                <div class="row">
                    <label class="form-label col-form-label col-md-4">LOA Date*</label>
                    <label class="form-label col-form-label col-md-4">Contract Start Date*</label>
                    <label class="form-label col-form-label col-md-4">Contract End Date*</label>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4">
                        <input type="LOA-date" readonly class="form-control mb-5px" value="{{$detailProject->LOA_date}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="contract-start-date" readonly class="form-control mb-5px" value="{{$detailProject->contract_start_date}}"  />
                    </div>
                    <div class="col-md-4">
                        <input type="contract-end-date" readonly class="form-control mb-5px" value="{{$detailProject->contract_end_date}}" />
                    </div>
                </div>
                <div class="row">
                    <label class="form-label col-form-label col-md-4">Account Manager*</label>
                    <label class="form-label col-form-label col-md-4">Project Manager*</label>
                    <label class="form-label col-form-label col-md-4">Warranty Start Date</label>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4">
                        <input type="account-manager" readonly class="form-control mb-5px" value="{{($detailProject->acc_manager) ? getEmployeeNameById($detailProject->acc_manager)->employeeName ?? '-' : '-'}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="project-manager" readonly class="form-control mb-5px" value="{{($detailProject->project_manager) ? getEmployeeNameById($detailProject->project_manager)->employeeName ?? '-' : '-'}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="warranty-start-date" readonly class="form-control mb-5px" value="{{$detailProject->warranty_start_date}}" />
                    </div>
                </div>
                <div class="row">
                    <label class="form-label col-form-label col-md-4">Warranty End Date</label>
                    <label class="form-label col-form-label col-md-4">Bank Guarantee Amount*</label>
                    <label class="form-label col-form-label col-md-4">Bank Guarantee Expiry Date</label>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4">
                        <input type="warranty-end-date" readonly class="form-control mb-5px" value="{{$detailProject->warranty_end_date}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="bank-gurantee-amount" readonly class="form-control mb-5px" value="{{$detailProject->bank_guarantee_amount}}" />
                    </div>
                    <div class="col-md-4">
                        <input type="bank-gurantee-expiry" readonly class="form-control mb-5px" value="{{$detailProject->bank_guarantee_expiry_date}}" />
                    </div>
                </div>
                <div class="row">
                    <label class="form-label col-form-label col-md-4">Status</label>
                </div>
                <div class="row mb-15px">
                    <div class="col-md-4">
                        <input type="status" readonly class="form-control mb-5px" value="{{$detailProject->status}}" />
                    </div>
                </div>
            </form>
        </div>
        <!-- BEGIN panel-body -->
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
                    <a href="/projectListing" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
