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
            {{-- <table id="summarytable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Employee Name</th>
                        <th class="text-nowrap">Department</th>
                        <th class="text-nowrap">Project</th>
                        <th class="text-nowrap">Amount (MYR)</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @if ($summarys)
                    @foreach ($summarys as $summary)
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                        <td>{{$summary->employeeName}}</td>
                        <td>{{$summary->departmentName}}</td>
                        <td>{{$summary->project_name ?? '-'}}</td>
                        <td>321</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table> --}}

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
                    @foreach ($namepem as $key => $row)
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
                
                {{-- <tbody> --}}
                    {{-- @foreach ($logs as $key => $row) --}}
                        {{-- <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->employeeName }}</td>
                            <td style="{{ isset($row->day_01) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_01) ? $row->day_01 : '-' }}</td>
                            <td style="{{ isset($row->day_02) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_02) ? $row->day_02 : '-' }}</td>
                            <td style="{{ isset($row->day_03) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_03) ? $row->day_03 : '-' }}</td>
                            <td style="{{ isset($row->day_04) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_04) ? $row->day_04 : '-' }}</td>
                            <td style="{{ isset($row->day_05) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_05) ? $row->day_05 : '-' }}</td>
                            <td style="{{ isset($row->day_06) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_06) ? $row->day_06 : '-' }}</td>
                            <td style="{{ isset($row->day_07) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_07) ? $row->day_07 : '-' }}</td>
                            <td style="{{ isset($row->day_08) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_08) ? $row->day_08 : '-' }}</td>
                            <td style="{{ isset($row->day_09) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_09) ? $row->day_09 : '-' }}</td>
                            <td style="{{ isset($row->day_10) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_10) ? $row->day_10 : '-' }}</td>
                            <td style="{{ isset($row->day_11) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_11) ? $row->day_11 : '-' }}</td>
                            <td style="{{ isset($row->day_12) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_12) ? $row->day_12 : '-' }}</td>
                            <td style="{{ isset($row->day_13) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_13) ? $row->day_13 : '-' }}</td>
                            <td style="{{ isset($row->day_14) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_14) ? $row->day_14 : '-' }}</td>
                            <td style="{{ isset($row->day_15) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_15) ? $row->day_15 : '-' }}</td>
                            <td style="{{ isset($row->day_16) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_16) ? $row->day_16 : '-' }}</td>
                            <td style="{{ isset($row->day_17) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_17) ? $row->day_17 : '-' }}</td>
                            <td style="{{ isset($row->day_18) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_18) ? $row->day_18 : '-' }}</td>
                            <td style="{{ isset($row->day_19) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_19) ? $row->day_19 : '-' }}</td>
                            <td style="{{ isset($row->day_20) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_20) ? $row->day_20 : '-' }}</td>
                            <td style="{{ isset($row->day_21) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_21) ? $row->day_21 : '-' }}</td>
                            <td style="{{ isset($row->day_22) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_22) ? $row->day_22 : '-' }}</td>
                            <td style="{{ isset($row->day_23) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_23) ? $row->day_23 : '-' }}</td>
                            <td style="{{ isset($row->day_24) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_24) ? $row->day_24 : '-' }}</td>
                            <td style="{{ isset($row->day_25) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_25) ? $row->day_25 : '-' }}</td>
                            <td style="{{ isset($row->day_26) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_26) ? $row->day_26 : '-' }}</td>
                            <td style="{{ isset($row->day_27) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_27) ? $row->day_27 : '-' }}</td>
                            <td style="{{ isset($row->day_28) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_28) ? $row->day_28 : '-' }}</td>
                            <td style="{{ isset($row->day_29) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_29) ? $row->day_29 : '-' }}</td>
                            <td style="{{ isset($row->day_30) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_30) ? $row->day_30 : '-' }}</td>
                            <td style="{{ isset($row->day_31) ? 'background-color: #00FF00;' : '' }}">{{ isset($row->day_31) ? $row->day_31 : '-' }}</td>
                           
                        </tr>
                    @endforeach --}}
                {{-- </tbody> --}}
            </table>


            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        
</div>
    </div>

    @endsection
