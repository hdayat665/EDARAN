@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Reporting <small>| Eleave Report </small></h1>
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
                        <th width="1%">Bil</th>
                        <th>Employer Name</th>
                        <th>Type of Leave</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Days Applied</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                        @if ($myleavereport)
                        @foreach ($myleavereport as $m)
                    <?php 
                        $id++;
                        $applied_date = new DateTime($m->applied_date);
                        $start_date = new DateTime($m->start_date);
                        $end_date = new DateTime($m->end_date);
                    ?>
                    <tr class="odd gradeX">
                        <td>{{$id}}</td>
                        <td>{{$m->employer_name}}</td>
                        <td>{{$m->type}}</td>
                        <td>{{$start_date->format('Y-m-d') }}</td>
                        <td>{{$end_date->format('Y-m-d') }}</td>
                        <td>{{$m->total_day_applied. ' day'}}</td>
                        <td>{{$m->reason. ' day'}}</td>
                        <td>@for ($i = 1; $i <= 4; $i++)
                                <?php
                                    switch ($i) {
                                        case 1:
                                            $status = 'Pending';
                                            break;
                                        case 2:
                                            $status = 'pending approval';
                                            break;
                                        case 3:
                                            $status = 'Rejected';
                                            break;
                                        case 4:
                                            $status = 'Approved';
                                            break;
                                        default:
                                            $status = 'Unknown';
                                    }
                                ?>
                                @if ($m->status_final == $i)
                                    @php
                                        echo $status;
                                        break;
                                    @endphp
                                @endif
                            @endfor
                        </td>
                    </tr>
                    @endforeach
                    @endif
                  
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">Total:</th>
                        
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
