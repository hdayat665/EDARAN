@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">

    {{-- <h1 class="page-header" id="eclaimReportJs">Report | Claim Report </h1> --}}

    <h1 class="page-header" id="reportcorJs">Charge Out Rate History</h1>
    <div class="panel panel">
       <div class="panel-body">
        <div class="row p-2">
            <table  id="tableviewcor"  class="table table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th  data-orderable="false">Action</th>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Employee Name</th>
                    <th class="text-nowrap">Designation</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Charge Out Rate</th>
                    <th class="text-nowrap">Previous COR</th>
                    <th class="text-nowrap">Updated By</th>
                    <th class="text-nowrap">Updated  On</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @if ($employees)
                    @foreach ($employees as $employee)
                    <tr>
                        <td>
                            {{-- <a href="hris/employmentdetails"><button class="btn btn-primary">View</button></a> --}}
                            <a href="/editEmployee/{{$employee->user_id}}" class="btn btn-primary">View</a>
                        </td>
                        <td>{{ $no++ }}</td>
                        <td>{{ $employee->employeeName }}</td>
                        <td>{{ $employee->designationName }}</td>
                        <td>{{ $employee->departmentName }}</td>
                        <td>{{ $employee->COR ?? '-' }}</td>
                        <td>-</td>
                        <td>{{ $employee->updated_by ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($employee->updated_at)->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row-p-2">
    <a href="javascript:history.back()" type="submit" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
        Back
    </a>
</div>

       </div>
    </div>
@endsection


