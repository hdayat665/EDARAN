@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content" >

	<h1 class="page-header">Eclaim | Appeal Claim</h1>
	
	<div class="row" id="appealMtcJs">
		<!-- BEGIN col-6 -->
		<div class="col-xl-15">
			<!-- BEGIN nav-tabs -->
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
						<span class="d-sm-none">Tab 1</span>
						<span class="d-sm-block d-none">Appeal Claim</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
						<span class="d-sm-none">Tab 2</span>
						<span class="d-sm-block d-none">Appeal Claim History</span>
					</a>
				</li>
				
			</ul>
			<!-- END nav-tabs -->
			<!-- BEGIN tab-content -->
			<div class="tab-content panel m-0 rounded-0 p-3">
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade active show" id="default-tab-1">
				<h3 class="mt-10px"></i> Appeal's List </h3>
					
					<div class="panel-body">
						
			<table id="appealTable" class="table table-striped table-bordered align-middle">
				<thead>
					<tr>
						<th width="9%" data-orderable="false" class="align-middle">Action</th>
						<th class="text-nowrap">Employee Name</th>
						<th class="text-nowrap">Year</th>
						<th class="text-nowrap">Month</th>
						<th class="text-nowrap">Reason</th>
						<th class="text-nowrap">File Name</th>
					</tr>
				</thead>   
					<tbody>
						@if ($appealMtc)
                        @foreach ($appealMtc as $data)
						<tr>
							<td>
								<a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
								<div class="dropdown-menu">
									<a href="javascript:;" data-id="{{ $data->id }}" class="dropdown-item approveButton"> Approve</a>
								<div class="dropdown-divider"></div>
									<a href="javascript:;" data-id="{{ $data->id }}" class="dropdown-item rejectButton"> Reject</a>
								<!-- <a data-bs-toggle="modal" data-bs-target="#exampleModal3" class="dropdown-item"> Reject</a> -->
							</td>	
							<td>{{ getEmployeeName($data->user_id) ?? '-' }}</td>
							<td>{{ $data->year ?? '-' }}</td>
							<td>{{ $data->month ?? '-' }}</td>
							<td>{{ $data->reason ?? '-' }}</td>
							<td>{{ $data->uploadFile ?? '-' }}</td>
						</tr>
						@endforeach

                    @endif
                </tbody>
            </table>
        </div>
	
					
					
				</div>
				<!-- END tab-pane -->
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade" id="default-tab-2">
					<h3 class="mt-10px"></i> Appeal Claim History </h3>
					
					<div class="panel-body">
                        <table id="historyTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Employee Name</th>
                                    <th class="text-nowrap">Year</th>
                                    <th class="text-nowrap">Month</th>
                                    <th class="text-nowrap">Reason</th>
                                    <th class="text-nowrap">File Name</th>
                                    <th class="text-nowrap">Status</th>
                                </tr>
                            </thead>
							@if ($historyAppeal)
                        	@foreach ($historyAppeal as $data)
                                <tbody>
									<td>{{ getEmployeeName($data->user_id) ?? '-' }}</td>
									<td>{{ $data->year ?? '-' }}</td>
									<td>{{ $data->month ?? '-' }}</td>
									<td>{{ $data->reason ?? '-' }}</td>
									<td>{{ $data->uploadFile ?? '-' }}</td>
									<td>{{ $data->status ?? '-' }}</td>
                                </tr>
								@endforeach
                    		@endif
                            </tbody>
                        </table>
                    </div>
                </div>		
		
		<!-- END col-4 -->
	</div>
	<!-- END row -->
		</div>
		<!-- END #content -->
			   <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rejection Reason</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="rejectForm">
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <label class="form-label col-md-6">Reason*</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="5" style="text-transform: uppercase;" id="reason"
                                        name="reason" placeholder=""></textarea>
                                </div>
                            </div>

                        </form>
                    </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Submit</button>
					</div>
				  </div>
				</div>
			  </div>
		
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>

@endsection
