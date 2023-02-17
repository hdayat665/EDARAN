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
                <h5>Project Name: {{$projName->project_name ?? ''}}</h5>
                
            </div>
    <div class="panel-body">
        <h4 class="row">
            <label class="form-label col-form-label col-md-4">Project Information</label>
        </h4>
        <form>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Customer Name:</label>
                <label class="form-label col-form-label col-md-4">Project Code:</label>
                <label class="form-label col-form-label col-md-4">Project Name:</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <input type="customer name" readonly class="form-control mb-5px" value="{{$projName->customer_name ?? ''}}" />
                </div>
                <div class="col-md-4">
                    <input type="Project Code" readonly class="form-control mb-5px"  value="{{$projName->project_code ?? ''}}"/>
                </div>
                <div class="col-md-4">
                    <input type="Project name" readonly class="form-control mb-5px"  value="{{$projName->project_name ?? ''}}"/>
                </div>
            </div>
            <h4 class="row">
                <label class="form-label col-form-label col-md-4">Project Manager</label>
            </h4>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label col-form-label col-md-4">Project Manager Name:</label>
                </div>
                <div class="col-md-4">
                    <label class="form-label col-form-label col-md-4">Department:</label>
                </div>
                <div class="col-md-4">
                    <label class="form-label col-form-label col-md-4">Branch:</label>
                </div>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <input type="contract-value" readonly class="form-control mb-5px" value="{{$projName->project_manager ?? ''}}" />
                </div>
                <div class="col-md-4">
                    <input type="contract-type" readonly class="form-control mb-5px" value="{{$projName->project_manager_department ?? ''}}"  />
                </div>
                <div class="col-md-4">
                    <input type="financial-year" readonly class="form-control mb-5px" value="{{$projName->project_manager_branch ?? ''}}" />
                </div>
            </div>
            <h4 class="row">
                <label class="form-label col-form-label col-md-4">Account Manager</label>
            </h4>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Account Manager Name</label>
                <label class="form-label col-form-label col-md-4">Department</label>
                <label class="form-label col-form-label col-md-4">Branch</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <input type="LOA-date" readonly class="form-control mb-5px" value="{{$projName->acc_manager ?? ''}}" />
                </div>
                <div class="col-md-4">
                    <input type="contract-start-date" readonly class="form-control mb-5px" value="{{$projName->acc_manager_department ?? ''}}" />
                </div>
                <div class="col-md-4">
                    <input type="contract-end-date" readonly class="form-control mb-5px" value="{{$projName->acc_manager_branch ?? ''}}" />
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
                    <th class="text-nowrap">Location</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @if ($projMember)
                @foreach ($projMember as $member)
                <tr class="odd gradeX">
                    <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                    <td>{{$member->employeeName}}</td>
                    <td>{{$member->designationName}}</td>
                    <td>{{$member->departmentName}}</td>
                    <td>{{$member->branchName}}</td>
                    <td>{{$member->unitName}}</td>
                    <td>{{$member->joined_date}}</td>
                    <td><a href="/projectAssignView/{{$member->id}}" >view</a></td>
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
<div class="modal fade" id="1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Assigned Project Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-10">
                            <label class="form-label col-form-label col-md-10">Project Member Name: Noraliya</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label class="form-label col-form-label col-md-10">Project Location Name</label>
                        </div>
                    </div>
                </form>
                <div class="panel-body"><br>
                    <table id="data-table-viewassigned" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="1%" data-orderable="false" class="align-middle">Action</th>
                                <th class="text-nowrap">Project Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="1%">1</td>
                                <td width="1%"><a data-bs-toggle="modal" data-bs-target="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Putrajaya</td>
                            </tr>
                            <tr>
                                <td width="1%">2</td>
                                <td width="1%"><a data-bs-toggle="modal" data-bs-target="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Kuala Lumpur</td>
                            </tr>
                            <tr>
                                <td width="1%">3</td>
                                <td width="1%"><a data-bs-toggle="modal" data-bs-target="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Selangor</td>
                            </tr>
                            <tr>
                                <td width="1%">4</td>
                                <td width="1%"><a data-bs-toggle="modal" data-bs-target="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Kuala Terengganu</td>
                            </tr>
                            <tr>
                                <td width="1%">5</td>
                                <td width="1%"><a data-bs-toggle="modal" data-bs-target="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Pahang</td>
                            </tr>
                            <tr>
                                <td width="1%">6</td>
                                <td width="1%"><a data-bs-toggle="modal" data-bs-target="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Kuala Pilah</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
