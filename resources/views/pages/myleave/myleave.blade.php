@extends('layouts.dashboardTenant')

@section('content')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">
        <!-- BEGIN breadcrumb -->
        <!-- BEGIN breadcrumb -->

            <!-- END breadcrumb -->
            <!-- BEGIN page-header -->
            <h1 class="page-header" id="myleaveJs"> E-Leave | My Leave</h1>

        <div class="row p-2">
            <div class="col-xl-15">
                <!-- BEGIN nav-tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Leave Info</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">Leave History</span>
                        </a>
                    </li>
                </ul>
                <!-- END nav-tabs -->
                <!-- BEGIN tab-content -->
                <div class="tab-content panel m-0 rounded-0 p-3">
                    <!-- BEGIN tab-pane -->
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ Apply Leave</a>
                        </div>
                        
                        <div class="panel-body">
                            <!-- <div class="form-control"> -->
                            

                                <div class="row">
                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-sm-2"></div> -->
                                            <div class="col-sm-6">
                                                <div class="panel-heading mt-15px">
                                                    <h5 class="panel-title">Leave Entitlement</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div id="chart-wrapper" style="display: flex; justify-content: center;">
                                                        <canvas id="myChart"  style="width:100%;max-width:500px" > </canvas>
                                                    </div>
                                                    <br>
                                                    <div class="form-control "> Earned Leave to Date: 3 Days </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-2"></div> -->
                                
                                            <div class="col-sm-6">
                                                <div class="panel-heading mt-15px">
                                                    <h5 class="panel-title">Leave Carried Foward 2021</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div id="chart-wrapper" style="display: flex; justify-content: center;">
                                                        <canvas id="myChart2"style="width:100%;max-width:500px"></canvas>
                                                    </div>
                                                    <br>
                                                    <div class="form-control "> Lapsed: 0 Days </div>
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                </div><br>

                                <div class="row p-2">
                                    <div class="form-control">
                                    <h4> My Leave </h4>
                                        {{-- <div class="input-group rounded">
                                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                                <span type="button" class="input-group-text border-0" id="search-addon">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                        </div> --}}
                                        <table id="table-leave" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th width="1%">No.</th>
                                                <th width="1%">Action</th>
                                                <th width="1%">Applied Date</th>
                                                <th>Type of Leave</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Total Days Applied</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 0 ?>
                                            @if ($myleave)
                                            @foreach ($myleave as $m)
                                            <?php 
                                                $id++;
                                                $applied_date = new DateTime($m->applied_date);
                                                $start_date = new DateTime($m->start_date);
                                                $end_date = new DateTime($m->end_date);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>{{ $id }}</td>
                                                <td>
                                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                                        <i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <div class="viewleave">
                                                            <a href="javascript:;" id="editButton" data-id="{{ $m->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="dropdown-item">View Leave</a>
                                                        </div>
                                                        <div class="dropdown-divider "></div>
                                                        <div class="cancelleave">    
                                                            <a href="javascript:;" id="deleteButton" data-id="{{ $m->id }}" class="dropdown-item" ><i class="fa fa-trash" aria-hidden="true"></i> Cancel Leave</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$applied_date->format('Y-m-d') }}</td>
                                                <td>{{$m->type}}</td>
                                                <td>{{$start_date->format('Y-m-d') }}</td>
                                                <td>{{$end_date->format('Y-m-d') }}</td>
                                                <td>{{$m->total_day_applied. ' day'}}</td>
                                                <td>@for ($i = 1; $i <= 4; $i++)
                                                        <?php
                                                            switch ($i) {
                                                                case 1:
                                                                    $status = 'Pending';
                                                                    break;
                                                                case 2:
                                                                    $status = 'Pending for approve';
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
                                        </table>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- END tab-pane -->
                    <!-- BEGIN tab-pane -->
                    <div class="tab-pane fade" id="default-tab-2">
                        <h3 class="mt-10px"></i></h3>
                        
                        <div class="panel-body">
                            <div class="form-control">
                                <h3>Leave History</h3>

                                
                                    <div class="row p-2">
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button class="btn btn-primary" type="button" id="filter"><i class="fa fa-filter" aria-hidden="true"></i></button>&nbsp;
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <form action="/myleave#default-tab-2" method="POST">
                                            <div id="filterleave" style="display: none">
                                                <div class="form-control">						
                                                    <div class="row p-2">
                                                        <div class="col-md-2">
                                                            <label class="form-label">Date</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="applydate" value="<?php echo $applydate; ?>" id="datepicker-filter" placeholder="YYYY/MM/DD"/>
                                                                    
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">	
                                                            <label class="form-label">Type of Leave</label>
                                                            <select class="form-select" name="typelist" id = "typelist">
                                                                <option value="">PLEASE CHOOSE</option>
                                                                @foreach($types as $dt)
                                                                    <option value="{{ $dt->id }}" {{ old('typelist') == $dt->id ? 'selected' : ($typelist == $dt->id ? 'selected' : '') }}>{{ $dt->leave_types }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-select" id = "status_searching" name="status">
                                                                <option value="">PLEASE CHOOSE</option>
                                                                <option value="4" {{ old('status') == '4' || $status_searching == '4' ? 'selected' : '' }}>Approved</option>
                                                                <option value="3" {{ old('status') == '3' || $status_searching == '3' ? 'selected' : '' }}>Rejected</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-2"></div>
                                                        <!-- <div class="col-md-2"></div> -->

                                                        <div class="col">
                                                            <div class="row-p-2">
                                                                <label for="test"></label>
                                                            </div>
                                                            <div class="row">
                                                                <button class="btn btn-primary" type="submit" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                            </div>
                                                        </div>&nbsp;
                                                        <div class="col">
                                                            <div class="row-p-2">
                                                                <label for="test"></label>
                                                            </div>
                                                            <div class="row">
                                                                <a href="#" class="btn btn-primary form-control" id="reset"> <i class="fas fa-repeat"></i> Reset</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row p-2">
                                        <table id="table-leave2" class="table table-striped table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Action</th>
                                                    <th width="1%">Applied Date</th>
                                                    <th>Type of Leave</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Total Days Applied</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id = 0 ?>
                                                    @if ($myleaveHistory)
                                                    @foreach ($myleaveHistory as $mh)
                                                <?php 
                                                    $id++;
                                                    $applied_date = new DateTime($mh->applied_date);
                                                    $start_date = new DateTime($mh->start_date);
                                                    $end_date = new DateTime($mh->end_date); 
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                                            <i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <div class="viewleave">
                                                                <a href="javascript:;" id="editButton2" data-id="{{ $mh->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="dropdown-item">View Leave</a>
                                                            </div>
                                                            {{-- <div class="dropdown-divider "></div> --}}
                                                            {{-- <div class="cancelleave">	
                                                                <a href="javascript:;" id="deleteButton" data-id="{{ $m->id }}" class="dropdown-item">Cancel Leave</a>
                                                            </div> --}}
                                                            {{-- <div class="dropdown-divider "></div>
                                                            <div class="rejectedleave">	
                                                                <a class="dropdown-item">Rejected Leave</a>
                                                            </div> --}}
                                                        </div>
                                                    </td>
                                                    <td>{{$applied_date->format('Y-m-d') }}</td>
                                                    <td>{{$mh->type}}</td>
                                                    <td>{{$start_date->format('Y-m-d') }}</td>
                                                    <td>{{$end_date->format('Y-m-d') }}</td>
                                                    <td>{{$mh->total_day_applied. ' day'}}</td>
                                                    <td>@for ($i = 1; $i <= 4; $i++)
                                                            <?php
                                                                switch ($i) {
                                                                    case 1:
                                                                        $status = 'Pending';
                                                                        break;
                                                                    case 2:
                                                                        $status = 'Pending for approve';
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
                                                            @if ($mh->status_final == $i)
                                                                @php
                                                                    echo $status;
                                                                    break;
                                                                @endphp
                                                            @endif
                                                        @endfor
                                                    </td>
                                                </tr>
                                                @endforeach
                                                    {{-- <tr>
                                                        <td colspan="7">No data found</td>
                                                    </tr> --}}
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                
                            </div>		
                            <!--   END col-4 -->
                        </div>
                        <!-- END row -->
                    </div>
                    <!-- END #content -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apply Leave</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addForm">
                                <div class="row p-2">
                                    
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Applied Date </label>
                                            <input type="text" class="form-control" name= "applied_date" id="datepicker-applied" placeholder="yyyy-mm-dd" readonly>
                                        </div>
								    </div>

                                    <div class="col-sm-6" id="menu2">
                                        <label class="form-label" for="Menu2">Type of Leave*</label>
                                           <select class="form-select" name="typeofleave">
                                                <option value="" label="PLEASE CHOOSE "></option>
                                                    @foreach($types as $dt)
                                                        <option value="{{ $dt->id }}" {{ old('typeofleave') == $dt->id ? 'selected' : '' }}>{{ $dt->leave_types }}</option>
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-6" id="menu3">
                                        <label class="form-label" for="Menu3">No of Day(s) Applied*</label>
                                            <div class="">
                                                <select class="form-select" name="noofday" id="select3">
                                                    <option value="" label="PLEASE CHOOSE"></option>
                                                    <option value="1" label="One Day"></option>
                                                    <option value="0.5" label="Half Day"></option>
                                                    <option value="-" label="Others"></option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="col-sm-6" id="menu4">
                                        <label class="form-label" for="Menu4">Total Days Applied</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="total_day_appied" id="select4" readonly/>
                                            </div>
                                    </div>
                                </div>
                                    
                                <div class="row p-2" id="menu5">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="Menu5">Leave Date*</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="leave_date" id="datepicker-leave" placeholder="YYYY/MM/DD"/>
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2" id="menu6">
                                    <div class="col-sm-12" >
                                        <label class="form-label" for="Menu6">Leave Session*</label>
                                            <div class="input-group" name="name6" id="select6">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked style="pointer-events: none">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Morning
                                                        <br>
                                                        8AM - 1AM
                                                    </label>
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="form-check">
                                                    <input class="form-check-input" value="2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" style="pointer-events: none">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Evening
                                                        <br>
                                                        2PM - 5PM
                                                    </label>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="row p-2">
                                    <div class="col-sm-6" id="menu7">
                                        <label class="form-label" for="Menu5">Start Date*</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="start_date" id="datepicker-start" placeholder="YYYY/MM/DD"/>
                                                   
                                            </div>
                                    </div>
                                    <div class="col-sm-6" id="menu8">
                                        <label class="form-label" for="Menu6">End Date*</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="end_date" id="datepicker-end" placeholder="YYYY/MM/DD"/>
                                                    
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-6" id="menu9">
                                        <label class="form-label" for="Menu7">Supporting Document</label>
                                        <div class="input-group">
                                            <input id="fileupload" type="file" accept=".pdf,.png,.jpeg,.jpg" name="file" max-size="5MB">
                                            <span id="fileDownloadPolicy"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" id="menu10">
                                        <label class="form-label" for="Menu8">Reason*</label>
                                            <div class="">
                                                <textarea class="form-control" rows="3" name="reason"></textarea>
                                            </div>
                                    </div>
                                </div>
                           
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" id="saveButton">Save</button>
                                </div>
                         </form>
                    </div>
                </div>
            </div>
            <!-- 

            -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Leave</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label class="form-label">Applied Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="datepicker-applied1" placeholder="yyyy-mm-dd" readonly/>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label">Type of Leave</label>
                                        <div class="input-group">
                                            <select class="form-select" name="typeofleave" id="typeofleave1" disabled> 
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                @foreach($types as $dt)
                                                    <option value="{{ $dt->id }}" {{ old('typeofleave') == $dt->id ? 'selected' : '' }}>{{ $dt->leave_types }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label class="form-label">No of Day(s) Applied</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dayApplied1"  readonly/>
                                            </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label">Total Days Applied</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="totalapply1" readonly/>
                                            </div>
                                    </div>
                                </div>
                                        
                                <div class="row p-2">
                                    <div class="col-sm-6" id="menu01">
                                        <label class="form-label">Leave Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-leave1" readonly/>
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-6" id="menu02">
                                        <label class="form-label">Leave Session</label>
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaulta">
                                                    <label class="form-check-label" for="flexRadioDefaulta">
                                                        Morning 
                                                        <br>
                                                        8AM - 1AM

                                                    </label>
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultb">
                                                    <label class="form-check-label" for="flexRadioDefaultb">
                                                        Evening
                                                        <br>
                                                        2PM - 5PM
                                                    </label>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                        
                                <div class="row p-2" id="menu03">
                                    <div class="col-sm-6">
                                        <label class="form-label">Start Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-start1"  readonly/>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">End Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-end1"  readonly/>
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label class="form-label">Supporting Document</label>
                                            <div class="input-group">
                                                <span id="fileDownloadPolicya"></span>
                                            {{-- <a href="" target="_blank">Download.pdf</a> --}}
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Reason</label>
                                            <div class="input-group">
                                                <textarea class="form-control" id="reason1" readonly></textarea>
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-12">
                                        <div class="form-control">
                                            <div class="row">
                                                <div class="col-sm-6">Recommended By: 
                                                    <div id="recommended_by"></div>
                                                </div>
                                                <div class="col-sm-6">Approved By:
                                                    <div id="approved_by"></div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="row">
                                                <div class="col-sm-6">Status: 
                                                    <div id="status_1">Pending</div>
                                                </div>
                                                <div class="col-sm-6">Status:
                                                    <div id="status_2">Pending</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">History</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>

                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label class="form-label">Applied Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="datepicker-applied2" placeholder="yyyy-mm-dd" readonly/>              
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label">Type of Leave</label>
                                        <div class="input-group">
                                            <select class="form-select" name="typeofleave" id="typeofleave2" disabled> 
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                @foreach($types as $dt)
                                                    <option value="{{ $dt->id }}" {{ old('typeofleave') == $dt->id ? 'selected' : '' }}>{{ $dt->leave_types }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label class="form-label">No of Day(s) Applied</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dayApplied2"  readonly/>
                                            </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label">Total Days Applied</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="totalapply2" readonly/>
                                            </div>
                                    </div>
                                </div>
                                        
                                <div class="row p-2">
                                    <div class="col-sm-6" id="menu10">
                                        <label class="form-label">Leave Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-leave2" readonly/>
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-6" id="menu20">
                                        <label class="form-label">Leave Session</label>
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaulta2">
                                                    <label class="form-check-label" for="flexRadioDefaulta">
                                                        Morning
                                                        <br>
                                                        8AM - 1PM
                                                    </label>
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultb2">
                                                    <label class="form-check-label" for="flexRadioDefaultb">
                                                        Evening
                                                        <br>
                                                        2PM - 5PM
                                                    </label>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                        
                                <div class="row p-2" id="menu30">
                                    <div class="col-sm-6">
                                        <label class="form-label">Start Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-start2"  readonly/>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">End Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-end2"  readonly/>
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-6">
                                        <label class="form-label">Supporting Document</label>
                                            <div class="input-group">
                                                <span id="fileDownloadPolicya2"></span>
                                            {{-- <a href="" target="_blank">Download.pdf</a> --}}
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Reason</label>
                                            <div class="input-group">
                                                <textarea class="form-control" id="reason2" readonly></textarea>
                                            </div>
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-sm-12">
                                        <div class="form-control">
                                            <div class="row">
                                                <div class="col-sm-6">Recommended By: 
                                                    <div id="recommended_by2"></div>
                                                </div>
                                                <div class="col-sm-6">Approved By:
                                                    <div id="approved_by2"></div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="row">
                                                <div class="col-sm-6">Status: 
                                                    <div id="status_10">Pending</div>
                                                </div>
                                                <div class="col-sm-6">Status:
                                                    <div id="status_20">Pending</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

    

            <!-- BEGIN scroll-top-btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <!-- END scroll-top-btn -->
        </div>
    </div>
@endsection