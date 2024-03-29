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
    .custom-dropdown-menu {
        position: static !important;
        height: auto !important;
        max-height: none !important;
        overflow: visible !important;
    }

</style>
	<div id="content" class="app-content">
		<h1 class="page-header" id="eleavetypesJs" >Setting <small>| Leave Type</small></h1>
		<div class="panel panel">
			<div class="panel-body">
				<div class="form-control">
					<div class="row p-2">
					</div>
					<div class="panel-heading-btn">
						<button class="btn btn-primary" data-bs-toggle="modal" id="myModal1" data-bs-target="#addleave"> <i class="fa fa-plus" aria-hidden="true"></i> New Leave Type</button>
					</div>
					<div class="row p-2">
						<table  id="tabletypess"  class="table table-striped table-bordered align-middle">
							<thead>
							<tr>
                                <th width="1%">No.</th>
								<th class="text-nowrap" data-orderable="false" >Status</th>
								<th class="text-nowrap">Leave Types Code</th>
								<th class="text-nowrap">Leave Types</th>
								<th class="text-nowrap">Duration</th>
                                <th class="text-nowrap">Added By</th>
                                <th class="text-nowrap">Added Time</th>
                                <th class="text-nowrap">Modified By</th>
                                <th class="text-nowrap">Modified Time</th>
                                <th class="text-nowrap" data-orderable="false" >Action</th>
							</tr>
							</thead>
							<tbody>
								<?php $id = 0 ?>
									@if ($types)
									@foreach ($types as $t)
                                <?php $id++ ?>
								<tr>
                                    <td>{{ $id }}</td>
									<td>
										<div class="form-check form-switch">
                                                <input class="form-check-input statusCheck" name="mainCompanion" type="checkbox" data-id="{{ $t->id }}" id="updateStatus"
                                                {{ $t->status == '1' ? 'checked' : '' }}>
                                        </div>
									</td>
									<td>{{$t->leave_types_code}}</td>
									<td>{{$t->leave_types}}</td>
									<td>{{$t->duration}}</td>
                                    <td>{{$t->addedBy ?? '-' }}</td>
                                    <td>{{$t->created_at ?? '-' }}</td>
                                    <td>{{$t->modifiedBy ?? '-' }}</td>
                                    <td>{{$t->modifiedTime ?? '-' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <div>
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                                    <i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i>
                                                </a>
                                            </div>
                                            <div class="dropdown-menu custom-dropdown-menu test">
                                                <a href="javascript:;" id="editButton" data-id="{{ $t->id }}" class="dropdown-item" data-bs-toggle="modal" id="myModal1" data-bs-target="#updateleave"  ><i class="fa fa-edit" aria-hidden="true"></i> Update</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:;" id="deleteButton" data-id="{{ $t->id }}" class="dropdown-item" ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                            </div>
                                        </div>
									</td>
								</tr>
								@endforeach
                                @endif
							</tbody>
						</table>
					</div>
				</div>
				<div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

			</div>
		</div>
        @include('modal.eleave.leavetypes.leaveTypesModelStore')
        @include('modal.eleave.leavetypes.leaveTypesModelUpdate')
	</div>
@endsection
