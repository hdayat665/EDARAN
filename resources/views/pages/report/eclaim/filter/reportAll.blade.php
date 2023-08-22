@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
			<!-- BEGIN breadcrumb -->

	<h1 class="page-header" id="eclaimReportJs">Reporting <small>| eClaim | Claim</small></h1>

	<!-- END page-header -->
	<!-- BEGIN panel -->
	<div class="panel panel">

		<!-- BEGIN panel-heading -->
		<div class="panel-heading">
		<div class="col-md-6">
		<h4> Claim Report </h4>

		</div>
			<h4 class="panel-title"></h4>
		</div>
		<!-- END panel-heading -->
		<!-- BEGIN panel-body -->
		<div class="panel-body">
        <table id="tableproject" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Claim ID</th>
                <th>Claim Type</th>
                <th>Project Code</th>
                <th>Employee Name</th>
                <th>Department</th>
                <th>Department id</th>
                <th>PV No</th>
                <th>Ref No</th>
                <th>Date</th>
                <th>Millage</th>
                <th>Toll</th>
                <th>Parking</th>
                <th>Petroll</th>
                <th>Fare</th>
                <th>Subsistance</th>
                <th>Allowence</th>
                <th>Personal Claim</th>
            </tr>
        </thead>
            <tbody>
                <?php $no = 1 ?>
                @if ($allClaims)
                @foreach ($allClaims as $allClaim)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$allClaim->claim_id ?? '-'}}</td>
                    <td>{{$allClaim->claim_type ?? '-'}}</td>
                    <td>{{($allClaim->TravelClaim->project_id) ?? '' ? getProjectById($allClaim->TravelClaim->project_id)->project_code : '-' ?? ''}}</td>
                    <td>{{($allClaim->user_id) ? getEmployeeName($allClaim->user_id) : '-'}}</td>
                    <td>{{($allClaim->user_id) ? getDepartmentName($allClaim->user_id) : '-'}}</td>
                    {{-- <td>{{($allClaim->user_id) ? getDepartmentById($allClaim->user_id) : '-'}}</td> --}}
                    <td>{{$allClaim->pv_number ?? '-'}}</td>
                    <td>{{$allClaim->cheque_number ?? '-'}}</td>
                    <td></td>
                    <td> {{$allClaim->created_at ?? '-'}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
                @endif

                {{-- <!-- @if ($cash_advance)
                @foreach ($cash_advance as $ca)
                <tr>
                    <td>{{$no++}}</td>
                    <td>CA{{$ca->id ?? '-'}}</td>
                    <td>{{$ca->type ? getCashAdvanceType ($ca->type) : '-'}}</td>
                    <td>{{($ca->project_id) ? getProjectById($ca->project_id)->project_code : '-'}}</td>
                    <td>{{($ca->user_id) ? getEmployeeName($ca->user_id) : '-'}}</td>
                    <td>{{($ca->user_id) ? getDepartmentName($ca->user_id) : '-'}}</td>
                    <td>{{$ca->pv_number ?? '-'}}</td>
                    <td></td>
                    <td>{{$ca->created_at ?? '-'}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
                @endif --> --}}

            </tbody>
        </table>

		</div>
	</div>


@endsection
