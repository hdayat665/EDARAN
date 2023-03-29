@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
	<h1 class="page-header">Reporting <small>| Timesheet | Employee Report </small></h1>
	<div class="panel panel" id="employeeReportByJs">
		<div class="panel-body">
			<div class="row p-2">
				<div class="col-sm-12">
					<h5>Project Name: {{ $projects->first()->project_name ?? '-' }}</h5>
					</h5>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-12">
					<h5> Date : {{$date_range}}</h5>
				</div>
			</div>
			<table id="projecttable" class="table table-striped table-bordered align-middle">
				<thead>
					<tr>
						<th width="1%">NO</th>
						<th class="text-nowrap">Employee Name</th>
						<th class="text-nowrap">Department</th>
						<th class="text-nowrap">Total Hours</th>
						<th class="text-nowrap">Amount (MYR)</th>
					</tr>
				</thead>
				<tbody>
                    {{-- <?php $no = 1 ?> --}}
                    @if ($projects)
                        @foreach ($projects as $project)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                            <td>{{$project->employeeName}}</td>
                            <td>{{$project->departmentName}}</td>
                            <td>{{$project->total_hour ?? '00:00'}}</td>
							<td>{{ number_format(floatval(str_replace(':', '.', substr($project->total_hour, 0, -2))) * floatval($project->COR), 2) }}</td>
                        </tr>
                        @endforeach
                    @endif
				</tbody>
				<tfoot>
                    <tr>
                        <th colspan="4">Total:</th>
						<td>
                            @if ($projects)
                                {{ number_format($projects->sum(function($projects) {
                                    return floatval(str_replace(':', '.', substr($projects->total_hour, 0, -2))) * floatval($projects->COR);
                                }), 2) }}
                            @endif
                        </td>
                    </tr>
                </tfoot>
			</table>
			<div class="row p-2">
				<div class="col align-self-start">
					<a href="javascript:history.back()" class="btn btn-primary" class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
				</div>
			</div>
		</div>
		
</div>
	</div>
@endsection
