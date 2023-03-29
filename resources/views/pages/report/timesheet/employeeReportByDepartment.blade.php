@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Timesheet | Employee Report </small></h1>
    <div class="panel panel" id="employeeReportByJs">
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-12">
                    {{-- <h5>Department : {{$department ?? '-'}}</h5> --}}
                    <h5>Department Name : @if(!empty($departments) && isset($departments[0])){{$departments[0]->departmentName}}@endif
					</h5>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5> Date : {{$date_range}}</h5>
                </div>
            </div>
            <table id="tablebydepartment" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Employee Name</th>
                        <th class="text-nowrap">Project</th>
                        <th class="text-nowrap">Total Hours</th>
                        <th class="text-nowrap">Amount (MYR)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @if ($departments)
                        @foreach ($departments as $department)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                            <td>{{$department->employeeName}}</td>
                            <td>{{$department->project_name}}</td>
                            <td>{{ str_replace(':', '.', substr($department->total_hour, 0, -2)) }}</td>
                            <td>{{ number_format(floatval(str_replace(':', '.', substr($department->total_hour, 0, -2))) * floatval($department->COR), 2) }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total:</th>
                        <td>
                            @if ($departments)
                                {{ number_format($departments->sum(function($departments) {
                                    return floatval(str_replace(':', '.', substr($departments->total_hour, 0, -2))) * floatval($departments->COR);
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
