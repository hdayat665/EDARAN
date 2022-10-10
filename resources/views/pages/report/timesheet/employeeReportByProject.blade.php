@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
			<!-- BEGIN breadcrumb -->
			<!-- BEGIN breadcrumb -->

	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->

	<!-- END page-header -->
	<!-- BEGIN row -->

	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header">Reporting <small>| Timesheet | Employee Report </small></h1>

	<!-- END page-header -->
	<!-- BEGIN panel -->
	<div class="panel panel" id="employeeReportByJs">


		<!-- BEGIN panel-body -->
		<div class="panel-body">
			<div class="row p-2">
				<div class="col-sm-12">
					<h5>Filter Option : Project A</h5>
				</div>
			</div>
			<div class="row p-2">
				<div class="col-sm-12">
					<h5> Date : 02/02/2020 - 10/10/2023</h5>
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
					<tr class="odd gradeX">
						<td width="1%" class="fw-bold text-dark">1</td>
						<td>Amira Roslam</td>
						<td>Edaran Communications Sdn Bhd</td>
						<td> 90:00</td>
						<td>321</td>

					</tr>
					<tr class="even gradeC">
						<td width="1%" class="fw-bold text-dark">2</td>
						<td>Irsyad</td>
						<td>Edaran Enginnering Sdn Bhd</td>
						<td> 33:00 </td>
						<td>120312</td>

					</tr>
					<tr class="even gradeC">
						<td width="1%" class="fw-bold text-dark">3</td>
						<td>Ali</td>
						<td>Edaran Service Sdn Bhd</td>
						<td> 413:00 </td>
						<td>1023</td>

					</tr>




				</tbody>
			</table>
		</div>
	</div>
@endsection
