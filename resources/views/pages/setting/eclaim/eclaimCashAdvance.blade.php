@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting <small>| Cash Advanced Controller</small></h1>
        <div class="panel panel" id="cashAdvanceJs">
            <div class="panel-body">
                <div>
                    <div class="row p-2">
                        <table id="cashAdvanceTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="1%">No.</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Employee Name</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Cash Advanced Month</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $id = 0 ?>
									@if ($cashAdvance)
									@foreach ($cashAdvance as $ca)
                                <?php $id++ ?>
								<tr>
                                    <td>{{ $id }}</td>
									<td>{{ $ca->cash_advance_status == 1 ? 'Active' : 'Deactive' }}</td>
									<td>{{$ca->employeeName}}</td>
									<td>{{$ca->departmentName}}</td>
									<td>{{$ca->cashadvancemonth}}</td>
                                    <td>
										<div class="form-check form-switch">
                                                <input class="form-check-input statusCheck" name="mainCompanion" type="checkbox" data-id="{{ $ca->user_id }}" data-name ="{{ $ca->employeeName }}"  id="updateStatus"
                                                {{ $ca->cash_advance_status == '1' ? 'checked' : '' }}>
                                        </div>
									</td>
								</tr>
								@endforeach
                                @endif
							</tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col align-self-start">
                        <a href="/setting" class="btn btn-light" style="color: black" type="submit"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
