@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}
	{{-- eleaveentitlementJs.js --}}

    <div id="content" class="app-content">
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
        <h1 class="page-header" id="eleaveentitlementJs">Setting | Leave Entitlement</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row p-2">
                        <h3>Leave Entitlement List</h3>
                    </div>
                    <div class="row p-2 ">
                        <button class="btn btn-primary col-2" data-bs-toggle="modal" id="myModal1" data-bs-target="#updatelapse"> <i class="fa fa-calendar" aria-hidden="true"></i> Lapsed Date</button>
                    </div>
                    <div class="row p-2">
                        <table  id="tableentitlement"  class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>	
                                <th class="text-nowrap">Action</th>
                                <th class="text-nowrap">Employee Name</th>
                                <th class="text-nowrap">Department</th>
                                <th class="text-nowrap">Current Entitlement</th>
                                <th class="text-nowrap">Current Entitlement Balance</th>
                                <th class="text-nowrap">Sick Leave Entitlement</th>
                                <th class="text-nowrap">Sick Leave Entitlement Balance</th>
                                <th class="text-nowrap">Carry Forward</th>
                                <th class="text-nowrap">Carry Forward Balance</th>
                                <th class="text-nowrap">Lapsed Date</th>
                                <th class="text-nowrap">Lapse</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id = 0 ?>
                                @if ($leave)
                                @foreach ($leave as $l)
                                <?php $id++ ?>
                            <tr>
                                {{-- <td>
                                    <a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$company->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a>
                                </td> --}}
                                <td>
                                    <a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$l->id}}" data-bs-target="#editleave" class="btn btn-outline-blue">edit
                                    </a>
                                </td>
                                <td>{{$l->fullname}}</td>
                                <td>{{$l->departmentName}}</td>
                                <td>{{$l->current_entitlement}}</td>
                                <td>{{$l->current_entitlement_balance}}</td>
                                <td>{{$l->sick_leave_entitlement}}</td>
                                <td>{{$l->sick_leave_entitlement_balance}}</td>
                                <td>{{$l->carry_forward}}</td>
                                <td>{{$l->carry_forward_balance}}</td>
                                <td>{{$l->lapsed_date}}</td>
                                <td>{{$l->lapse}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Entitlement</h5>
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
                        <label class="form-label col-form-label col-md-3">Department :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="department" name="department"  placeholder="" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Current Entitlement:</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="CurrentEntitlement" name="CurrentEntitlement" placeholder=""   />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Current Entitlement Balance :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="CurrentEntitlementBalance" name="CurrentEntitlementBalance" placeholder=""   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Sick Leave Entitlement :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="SickLeaveEntitlement" name="SickLeaveEntitlement" placeholder=""/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Sick Leave Entitlement Balance :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="SickLeaveEntitlementBalance" name="SickLeaveEntitlementBalance" placeholder=""/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Carry Forward:</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="CarryForward" name="CarryForward" placeholder=""  />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Current Forward Balance :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="CurrentForwardBalance" name="CurrentForwardBalance" placeholder=""/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Lapsed Date :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="LapsedDate" name="LapsedDate" placeholder=""   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Lapsed :</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="Lapsed" name="Lapsed" placeholder="" value=""   />
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Lapsed Date</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form id="addForm">
						<div class="row p-2">

							<div class="col-md-9">
								<div class="mb-2">
									<label for="lapsed date" class="form-label">Employee Name: </label>
									{{-- <input type="text" class="form-control col-sm-2" name="employerName"> --}}
                                    <select class="form-select" name="employerName" id="employerName">
                                        <option value="" label="PLEASE CHOOSE"></option>
                                        @foreach($nameStaff as $nf)
                                            <option value="{{ $nf->user_id . ',' . $nf->id }}" {{ old('employerName') == $nf->user_id ? 'selected' : '' }}>{{ $nf->fullname }}</option>
                                         @endforeach
                                    </select>
								</div>
							</div>
						</div>
						<div class="row p-2">
							<div class="col-md-9">
									<div class="mb-2">
										<label for="lapsed date" class="form-label">Lapsed Date </label>
										<input type="text" class="form-control col-sm-2" name="lapsed" id="datepickerlapse">
									</div>
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

@endsection

