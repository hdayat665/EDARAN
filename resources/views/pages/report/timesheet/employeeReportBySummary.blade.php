@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Timesheet | Employee Report </small></h1>
    <div class="panel panel" id="employeeReportByJs">
        <div class="panel-body">
            {{-- <div class="row p-2">
                <div class="col-sm-12">
                    <h5>Filter Option : Summary</h5>
                </div>
            </div> --}}
            <div class="row p-2">
                <div class="col-sm-12">
					{{-- <h5> Date : {{$date_range}}</h5> --}}
                </div>
            </div>
            <table id="tablereportemployee" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Employee Name</th>
                        <th class="text-nowrap">Date</th>
                        <th class="text-nowrap">Project</th>
                        <th class="text-nowrap">Total Hours</th>
                        <th class="text-nowrap">Amount (MYR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($summary as $key => $row)
                        {{-- @if (!empty($row->projectnameas)) --}}
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $row->employeeName }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->projectnameas }}</td>
                                <td>{{ str_replace(':', '.', substr($row->total_hour, 0, -2)) }}</td>
                                <td>{{ number_format(floatval(str_replace(':', '.', substr($row->total_hour, 0, -2))) * floatval($row->COR), 2) }}</td>
                            </tr>
                        {{-- @endif --}}
                    @endforeach 
                </tbody>
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
