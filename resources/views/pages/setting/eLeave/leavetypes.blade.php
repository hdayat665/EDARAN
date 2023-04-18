@extends('layouts.dashboardTenant')

@section('content')
<style>
   .swal2-modal .swal2-title {
    color: #595959;
    font-size: 20px !important;
    text-align: center;
    font-weight: 600;
    text-transform: none;
    position: relative;
    margin: 0 0 0.4em;
    padding: 0;
    display: block;
    word-wrap: break-word;
}
</style>
	<div id="content" class="app-content">
		<h1 class="page-header" id="eleavetypesJs" >Setting | Leave Types</h1>
		<div class="panel panel">
			<div class="panel-body">
				<div class="form-control">
					<div class="row p-2">
						<h3>Leave Types List</h3>
					</div>
					<div class="row p-2 ">
						<button class="btn btn-primary col-2" data-bs-toggle="modal" id="myModal1" data-bs-target="#addleave"> <i class="fa fa-plus" aria-hidden="true"></i> New Leave Types</button>
					</div>
					<div class="row p-2">
						<table  id="tabletypes"  class="table table-striped table-bordered align-middle">
							<thead>
							<tr>	
								<th class="text-nowrap" data-orderable="false" >Action</th>
								<th class="text-nowrap" data-orderable="false" >Status</th>
								<th class="text-nowrap">Leave Types Code</th>
								<th class="text-nowrap">Leave Types</th>
							</tr>
							</thead>
							<tbody>
								<?php $id = 0 ?>
									@if ($types)
									@foreach ($types as $t)
                                <?php $id++ ?>
								<tr>
									<td>
										<a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
										<div class="dropdown-menu">
											<a href="javascript:;" id="editButton" data-id="{{ $t->id }}" class="dropdown-item" data-bs-toggle="modal" id="myModal1" data-bs-target="#updateleave"  ><i class="fa fa-edit" aria-hidden="true"></i> Update</a>
											<div class="dropdown-divider"></div>
											<a href="javascript:;" id="deleteButton" data-id="{{ $t->id }}" class="dropdown-item" ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
										</div>
									</td>
									<td> 
										<div class="form-check form-switch">
                                                <input class="form-check-input statusCheck" name="mainCompanion" type="checkbox" data-id="{{ $t->id }}" id="updateStatus"
                                                {{ $t->status == '1' ? 'checked' : '' }}>
                                        </div>
									</td>
									<td>{{$t->leave_types_code}}</td>
									<td>{{$t->leave_types}}</td>
								</tr>
								@endforeach
                                @endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		{{-- modal addleave type --}}
		<div class="modal fade" id="addleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New Leave Type</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="addForm">
							<div class="mb-3">
							<label for="leavetype" class="form-label">Leave Type Code*</label>
							<input type="text" class="form-control" name="leave_types_code" id="leave_types_code" placeholder="LEAVE CODE" style="text-transform:uppercase">
							</div>
							<div class="mb-3">
							<label for="Leavetype" class="form-label">Leave Type*</label>
							<input type="text" class="form-control" id="leave_types" name="leave_types" placeholder="LEAVE TYPE" style="text-transform:uppercase">
							</div>

							<div class="mb-3">
								<div class="row g-3 align-items-center">
									<div class="col-auto">
										<input class="form-check-input" type="checkbox" value="" id="checkallowrequest" checked> 
									</div>
									
										<div class="col-auto">
											<p class="col-form-label">To be Applied</p>
										</div>
										<div class="col-md-2">
											<input type="text" id="allowrequest" value="0" name="day" class="form-control">
										</div>
										<div class="col-auto">
											<p class="col-form-label">days in advanced</p>
										</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" id="saveButton">Save</button>
					</form>
					</div>
				</div>
			</div>
		</div>



		{{-- modal updateleave type --}}
		<div class="modal fade" id="updateleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Leave Type</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="updateForm"> 
							<div class="mb-3">
							<label for="leavetype" class="form-label">Leave Type Code*</label>
							<input type="text" class="form-control" id="leavetypescode"  name="leavetypescode" placeholder="LEAVE CODE" style="text-transform:uppercase">
							<input type="hidden" id="idtypes" class="form-control" name="idtypes" placeholder="">
							</div>
							<div class="mb-3">
							<label for="Leavetype" class="form-label">Leave Type*</label>
							<input type="text" class="form-control" id="leavetypes"  name="leavetypes" placeholder="LEAVE TYPE" style="text-transform:uppercase">
							</div>

							<div class="mb-3">
								<div class="row g-3 align-items-center">
									<div class="col-auto">
										<input class="form-check-input" type="checkbox" value="" id="ucheckallowrequest" checked> 
									</div>
									
										<div class="col-auto">
											<p class="col-form-label">To be Applied</p>
										</div>
										<div class="col-md-2">
											<input type="text" id="uallowrequest" name="day" value="" class="form-control"  disabled>
										</div>
										<div class="col-auto">
											<p class="col-form-label">days in advanced</p>
										</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" id="updateButton">Update</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection