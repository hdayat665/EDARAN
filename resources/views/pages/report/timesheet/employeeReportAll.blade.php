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
    <div class="panel panel" id="employeeReportAllJs">


        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5>Year: {{ $year }}</h5>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5>Month: {{ date('F', mktime(0, 0, 0, $month, 1)) }}</h5>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
                    <h5>Department Name: {{ $departmentName }}</h5>
                </div>
            </div>
            {{-- <table id="summarytable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Employee Name</th>
                        <th class="text-nowrap">Designation</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">1hb</th>
                        <th class="text-nowrap">2hb</th>
                        <th class="text-nowrap">3hb</th>
                        <th class="text-nowrap">4hb</th>
                        <th class="text-nowrap">5hb</th>
                        <th class="text-nowrap">6hb</th>
                        <th class="text-nowrap">7hb</th>
                        <th class="text-nowrap">8hb</th>
                        <th class="text-nowrap">9hb</th>
                        <th class="text-nowrap">10hb</th>
                        <th class="text-nowrap">11hb</th>
                        <th class="text-nowrap">12hb</th>
                        <th class="text-nowrap">13hb</th>
                        <th class="text-nowrap">14hb</th>
                        <th class="text-nowrap">15hb</th>
                        <th class="text-nowrap">16hb</th>
                        <th class="text-nowrap">17hb</th>
                        <th class="text-nowrap">18hb</th>
                        <th class="text-nowrap">19hb</th>
                        <th class="text-nowrap">20hb</th>
                        <th class="text-nowrap">21hb</th>
                        <th class="text-nowrap">22hb</th>
                        <th class="text-nowrap">23hb</th>
                        <th class="text-nowrap">24hb</th>
                        <th class="text-nowrap">25hb</th>
                        <th class="text-nowrap">26hb</th>
                        <th class="text-nowrap">27hb</th>
                        <th class="text-nowrap">28hb</th>
                        <th class="text-nowrap">29hb</th>
                        <th class="text-nowrap">30hb</th>
                        <th class="text-nowrap">31hb</th>


                    </tr>
                </thead>
                <tbody>
                    @if ($logs)
                    <?php $no = 1 ?>
                    @foreach ($logs as $log)
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$no++}}</td>
                        {{-- <td>{{$log->employeeName}}</td>
                        <td>{{$log->departmentName}}</td> --}}
                        {{-- <td>test1</td>
                        <td>test2</td>
                        <td>{{$log->status}}</td>
                        <td>{{$log->a1hb}}</td>
                        <td>{{$log->a2hb}}</td>
                        <td>{{$log->a3hb}}</td>
                        <td>{{$log->a4hb}}</td>
                        <td>{{$log->a5hb}}</td>
                        <td>{{$log->a6hb}}</td>
                        <td>{{$log->a7hb}}</td>
                        <td>{{$log->a8hb}}</td>
                        <td>{{$log->a9hb}}</td>
                        <td>{{$log->a10hb}}</td>
                        <td>{{$log->a11hb}}</td>
                        <td>{{$log->a12hb}}</td>
                        <td>{{$log->a13hb}}</td>
                        <td>{{$log->a14hb}}</td>
                        <td>{{$log->a15hb}}</td>
                        <td>{{$log->a16hb}}</td>
                        <td>{{$log->a17hb}}</td>
                        <td>{{$log->a18hb}}</td>
                        <td>{{$log->a19hb}}</td>
                        <td>{{$log->a20hb}}</td>
                        <td>{{$log->a21hb}}</td>
                        <td>{{$log->a22hb}}</td>
                        <td>{{$log->a23hb}}</td>
                        <td>{{$log->a24hb}}</td>
                        <td>{{$log->a25hb}}</td>
                        <td>{{$log->a26hb}}</td>
                        <td>{{$log->a27hb}}</td>
                        <td>{{$log->a28hb}}</td>
                        <td>{{$log->a29hb}}</td>
                        <td>{{$log->a30hb}}</td>
                        <td>{{$log->a31hb}}</td>
                    </tr>
                    @endforeach
                    @endif --}}

                {{-- </tbody> --}}
            {{-- </table> --}} 

           <div class="row p-2" style=" overflow: auto;">
            <table id="summarytable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>Department</th> --}}
                        <th>Department Name</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>1hb</th>
                        <th>2hb</th>
                        <th>3hb</th>
                        <th>4hb</th>
                        <th>5hb</th>
                        <th>6hb</th>
                        <th>7hb</th>
                        <th>8hb</th>
                        <th>9hb</th>
                        <th>10hb</th>
                        <th>11hb</th>
                        <th>12hb</th>
                        <th>13hb</th>
                        <th>14hb</th>
                        <th>15hb</th>
                        <th>16hb</th>
                        <th>17hb</th>
                        <th>18hb</th>
                        <th>19hb</th>
                        <th>20hb</th>
                        <th>21hb</th>
                        <th>22hb</th>
                        <th>23hb</th>
                        <th>24hb</th>
                        <th>25hb</th>
                        <th>26hb</th>
                        <th>27hb</th>
                        <th>28hb</th>
                        <th>29hb</th>
                        <th>30hb</th>
                        <th>31hb</th>
                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            {{-- <td>{{ $row->departmentName }}</td> --}}
                            <td>{{ $row->departmentName }}</td>
                            <td>{{ $row->employeeName }}</td>
                            <td>{{ $row->designationName }}</td>
                            <td>{{ $row->status }}</td>
                            <td>{{ $row->date }}</td>
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
                    @endforeach
                </tbody>
            </table>
            
            
            
            {{-- <style>
                .has-data {
                    background-color: #AED6F1; 
                }
            </style> --}}
            
            

           </div>

           <div class="row p-2">
            <div class="col align-self-start">
                <a href="javascript:history.back()"  class="btn btn-primary"  type="submit"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>


            
        </div>
       
</div>
    </div>
    @endsection

