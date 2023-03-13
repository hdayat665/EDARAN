@extends('layouts.dashboardTenant')

@section('content')
	<div id="content" class="app-content">
		<h1 class="page-header" id="eleaveholidayJs">Setting | Holiday</h1>
		<div class="panel panel">
			<div class="panel-body">
				<div class="form-control">
					<div class="row p-2">
						<h3>Holiday List</h3>
					</div>
					<div class="row p-2 ">
						<div class="col align-self-start">                    
							<button class="btn btn-primary" data-bs-toggle="modal" id="myModal1" data-bs-target="#addleave"> <i class="fa fa-plus" aria-hidden="true"></i> Holiday </button>
							<button class="btn btn-primary " data-bs-toggle="modal" id="myModal1" data-bs-target="#uploadbulk"> <i class="fa fa-upload" aria-hidden="true"></i></i> Bulk Upload</button>
						</div>
					</div>
					<div class="row p-2">
						<table  id="tabletype"  class="table table-striped table-bordered align-middle">
							<thead>
								<tr>	
								<th width="1%" class="text-nowrap">Action</th>
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">Holiday Title</th>
								<th class="text-nowrap">Start Date</th>
								<th class="text-nowrap">End Date</th>
								<th class="text-nowrap">Annual Holiday</th>
								</tr>
							</thead>
							<tbody>
								<?php $id = 0 ?>
									@if ($holiday)
									@foreach ($holiday as $h)
                                <?php $id++ ?>

								<tr>
									<td>
										<a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
										<div class="dropdown-menu">
											<a href="javascript:;" id="editButton" data-id="{{ $h->id }}" class="dropdown-item" data-bs-toggle="modal" id="myModal1" data-bs-target="#updateleave"  ><i class="fa fa-edit" aria-hidden="true"></i> Update</a>
											<div class="dropdown-divider"></div>
											<a href="javascript:;" id="deleteButton" data-id="{{ $h->id }}" class="dropdown-item" ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
										</div>
									</td>
									<td> 
										<div class="form-check form-switch">
                                                <input class="form-check-input statusCheck" name="mainCompanion" type="checkbox" data-id="{{ $h->id }}" id="updateStatus"
                                                {{ $h->status == '1' ? 'checked' : '' }}>
                                        </div>
									</td>
									<td>{{$h->holiday_title}}</td>
									<td>{{$h->start_date}}</td>
									<td>{{$h->end_date}}</td>
									<td>{{$h->annual_date == 1 ? 'Yes' : 'No'}}</td>
								</tr>
								@endforeach
                                @endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		{{-- modal add holiday --}}
		<div class="modal fade" id="addleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Holiday</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="addForm">
							<div class="row p-2">
								<div class="col md-6">
									<div class="mb-3">
										<label for="holidaytitle" class="form-label">Holiday Title* </label>
										<input type="text" class="form-control" name="holiday_title" id="holiday_title">
									</div>
								</div>
								<div class="col md-6">
									<div class="mb-3">
										<div class="row ">
											<span class="form-label">Set as annual holiday</span>
										</div>
										<div></div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" value="1" type="radio" name="annual_date" id="radioyes">
											<label class="form-check-label" for="radioyes">
											Yes
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" value="2"  type="radio" name="annual_date" id="radiono" checked>
											<label class="form-check-label" for="radiono">
											No
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row p-2">
								<div class="col md-6">
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Start Date* </label>
										<input type="text" class="form-control" name= "start_date" id="datepickerstart">
									</div>
								</div>
								<div class="col md-6">
									<div class="mb-3">
										<label for="" class="form-label">End Date* </label>
										<input type="text" class="form-control" name= "end_date" id="datepickerend" />
									</div>
								</div>
							</div>
					</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
						<h5 class="modal-title" id="exampleModalLabel">Update Holiday</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="updateForm">
							<div class="row p-2">
								<div class="col md-6">
									<div class="mb-3">
										<label for="holiday_title" class="form-label">Holiday Title* </label>
										<input type="text" class="form-control" id="holidaytitle" name="holidaytitle">
										<input type="hidden" id="idholiday" class="form-control" name="idholiday" placeholder="">
									</div>
								</div>
								<div class="col md-6">
									<div class="mb-3">
										<div class="row ">
											<span class="form-label">Set as annual holiday</span>
										</div>
										<div></div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" value="1" name="flexRadioDefault" id="uradioyes" value="1">
											<label class="form-check-label" for="uradioyes">
											Yes
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" value="2" name="flexRadioDefault" id="uradiono" value="2">
											<label class="form-check-label" for="uradiono">
											No
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row p-2">
								<div class="col md-6">
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Start Date* </label>
										<input type="text" class="form-control" name="start_date" id="udatepickerstart">
									</div>
								</div>
								<div class="col md-6">
									<div class="mb-3">
										<label for="" class="form-label">End Date* </label>
										<input type="text" class="form-control" name="enddate" id="udatepickerend" />
									</div>
								</div>
							</div>
							
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button class="btn btn-primary" id="updateButton">Update</button>
					</form>
					</div>
				</div>
			</div>
		</div>

		{{-- modal bulk --}}
		<div class="modal fade" id="uploadbulk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Bulk Upload Holiday</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="row p-2">
								<a href="" download="Holiday.xlsx">Holiday.xlx</a>
							</div>
							<div class="row p-2">
								<div class="file-upload-wrapper">
									<input type="file" id="input-file-now" class="file-upload" />
								</div>
							</div>

							{{-- <div id="dropzone">
								<form action="/upload" class="dropzone needsclick" id="demo-upload">
								<div class="dz-message needsclick">
									Drop files <b>here</b> or <b>click</b> to upload.<br />
									<span class="dz-note needsclick">
									(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)
									</span>
								</div>
								</form>
							</div> --}}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection

