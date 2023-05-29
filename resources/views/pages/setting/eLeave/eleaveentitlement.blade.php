@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}
	{{-- eleaveentitlementJs.js --}}

    <div id="content" class="app-content">
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
        <h1 class="page-header" id="eleaveentitlementJs">Setting | Staff Leave Entitlement</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row p-2">
                        <h3>Staff Leave Entitlement List</h3>
                    </div>
                    <div class="row p-2 ">
                        <button class="btn btn-primary col-2" data-bs-toggle="modal" id="myModal1" data-bs-target="#updatelapse"> <i aria-hidden="true"></i> Generate Staff</button>
                    </div>
                    <div class="row p-2">
                        <table  id="tableentitlement"  class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">No.</th>
                                    <th class="text-nowrap">Action</th>
                                    <th class="text-nowrap">Employee Name</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Job Grade</th>
                                    <th class="text-nowrap">Current Entitlement Balance</th>
                                    <th class="text-nowrap">Sick Leave Entitlement Balance</th>
                                    <th class="text-nowrap">Carry Forward Balance</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $id = 0 ?>
                                    @if ($leave)
                                    @foreach ($leave as $l)
                                <?php $id++ ?>

                                <tr class="odd gradeX">
                                    <td>{{ $id }}</td>
                                    <td>
                                        <a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$l->id}}" data-bs-target="#editleave" class="btn btn-outline-blue">edit
                                        </a>
                                    </td>
                                    <td>{{$l->fullname}}</td>
                                    <td>{{$l->departmentName}}</td>
                                    <td>{{$l->jobGradeName}}</td>
                                    <td>{{$l->current_entitlement_balance}}</td>
                                    <td>{{$l->sick_leave_entitlement_balance}}</td>
                                    <td>{{$l->carry_forward_balance}}</td>
                                </tr>

                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  edit row-->
    <div class="modal fade" id="editleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Staff Entitlement</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="updateForm">
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Employee Name :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="nameEmployer" name="nameEmployer" placeholder=""  readonly />
                        <input type="hidden" id="idleave" class="form-control" name="idleave" placeholder="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Current Entitlement Balance :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="CurrentEntitlementBalance" name="CurrentEntitlementBalance" placeholder=""   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Sick Leave Entitlement Balance :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="SickLeaveEntitlementBalance" name="SickLeaveEntitlementBalance" placeholder=""/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Current Forward Balance :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="CurrentForwardBalance" name="CurrentForwardBalance" placeholder=""/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="updateButton">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- {{-- modal updatedlapsed --}} -->
    <div class="modal fade" id="updatelapse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Staff</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form id="addForm">
						<div class="row p-2">
							<div class="col-md-9">
                                <div class="mb-2">
                                    <label for="lapsed date" class="form-label">Generate Date </label>
                                    <input type="text" class="form-control col-sm-2" name="generatedate" id="datepickerlapse">
                                </div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-primary" id="saveButton">Save</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>

@endsection

