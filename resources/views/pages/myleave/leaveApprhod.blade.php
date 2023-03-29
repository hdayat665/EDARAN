@extends('layouts.dashboardTenant')

@section('content')
    <div id="content" class="app-content">
    <br>
    <h1 class="page-header" id="leaveHodJs">E-Leave <small>| Leave Approval | Head Of Department</small></h1>
    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">
        <!-- BEGIN panel-heading -->
        <div class="panel-body">
            <div class="form-control">
                <div class="row">
                    <div class="col">
                        <h3>Leave Approval</h3>
                    </div>
                    <div class="col">
                        <div class="panel-heading">
                            <div class="col-md-12" style="display: flex; justify-content: flex-end" >
                                <button class="btn btn-default btn-icon btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" >
                                    <i class="fa fa-filter"></i>
                                </button>  
                            </div>
                        </div>
                    </div>
                </div>
                <div id="collapseOne" class="form-control collapse hidden">
                    <h5>Filter</h5><br>
                    <table>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row p-1">
                                    <label for="date">Date</label>
                                    <input type="text" id="calendar" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row p-1">
                                    <label for="text">Employee Name</label>
                                    <select class="form-select" id="" >
                                        <option class="form-label" value="" selected>All</option>
                                    </select>
                                </div>
                                <!-- <div class="row">
                                    <input type="text" class="form-control" placeholder="Employee Name">
                                </div> -->
                            </div>
                            <div class="col-md-3">
                                <div class="row p-1">
                                    <label for="text">Type of Leave</label>
                                    <select class="form-select" id="" >
                                        <option class="form-label" value="" selected>All</option>
                                    </select>
                                </div>
                                <!-- <div class="row">
                                    <input type="text" class="form-control" placeholder="Type of Leave">
                                </div> -->
                            </div>
                            <div class="col-md-3">
                            <br>
                                <!-- <div class="row"> -->
                                    <button type="search" class="btn btn-info">Search</button> &ensp;
                                    <button type="reset" class="btn btn-info">Reset</button>
                                <!-- </div> -->
                            </div>
                        </div>
                    </table>
                </div>
                <br>
                <table class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Applied Date</th>
                            <th>Employee Name</th>
                            <th>Type of Leave</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Days Applied</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $id = 0 ?>
                                    @if ($leaveApprhodView)
                                    @foreach ($leaveApprhodView as $l)
                                <?php $id++ ?> 
                            <td >
                                <div class="btn-group">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <a class="dropdown-item" href="/myTimesheet">View Calendar</a>
                                        <div class="dropdown-divider" style=""></div>
                                        <!-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn">View Calendar</a> -->
                                        <a href="javascript:;" id="editButton2" data-id="{{ $l->id }}" data-bs-toggle="modal" data-bs-target="#approveModal-tab-1" class="btn">Approve Leave</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:;" id="editButton3" data-id="{{ $l->id }}"  data-bs-toggle="modal" data-bs-target="#rejectModal-tab-1" class="btn">Reject Leave</a>
                                    </ul>
                                </div>
                            </td>
                            <td>{{$l->applied_date}}</td>
                            <td>{{$l->fullName}}</td>
                            <td>{{$l->type}}</td>
                            <td>{{$l->start_date}}</td>
                            <td>{{$l->end_date}}</td>
                            <td>{{$l->total_day_applied}}</td>
                            <td>@for ($i = 1; $i <= 4; $i++)
                                        <?php
                                            switch ($i) {
                                                case 1:
                                                    $status = 'Pending for approve';
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
                                        @if ($l->up_app_status == $i)
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
                <!-- TRIAL OF APPROVEMODAL -->
                <div class="modal fade" id="approveModal-tab-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apply Leave</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="updateForm">
                                        <div class="row row-cols-lg-auto g-3 mb-3">
                                            <div class="col-12" style="width:50%">
                                                <label>Applied Date</label><br>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="applieddate" value="">
                                                <input type="hidden" readonly class="form-control-plaintext" id="iddata" >
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Type of Leave*</label><br>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="type1">
                                            </div> 
                                            <div class="col-12" style="width:50%">
                                                <label>Number of Day(s) Applied</label><br>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="dayapplied">
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Total Days Applied*</label><br>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="totaldayapplied">
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Leave Date</label><br>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="leavedate">
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Reason*</label><br>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="reason1">
                                            </div>
                                            <div class="col-12" style="width:50%" id="menu01">
                                                <label>Leave Session</label><br>
                                                <div></div>
                                                <div id="leavesession" style="font-weight: lighter;"></div>
                                            </div>
                                            <div class="col-12" style="width:50%">
                                                <label>Supporting Document*</label><br>
                                                 <span id="fileDownloadPolicya" style="font-weight: lighter;"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <div class = col-md-4>
                                                        <label for="text" >Recommended By:</label><br>
                                                        <div id="recommended_by" style="font-weight: lighter;"></div>
                                                    </div>
                                                    <div class = col-md-2>
                                                    </div>
                                                    <div class = col-md-4>
                                                        <label for="text" >Approved By:</label><br>
                                                        <div id="approved_by" style="font-weight: lighter;"></div>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class = col-md-4>
                                                        <label for="text">Status:</label><br>
                                                    <div id="status_1" style="font-weight: lighter;"></div>
                                                    </div>
                                                    <div class = col-md-2>
                                                    </div>
                                                    <div class = col-md-4>
                                                        <label for="text">Status:</label><br>
                                                    <div id="status_2" style="font-weight: lighter;"></div>
                                                    </div>
                                                </div>

                                                <div class="row p-2">
                                                </div>
                                                <div class="row p-2">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="updateButton">Approve</button>
                                            {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Approve</button> --}}
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF APPROVEMODAL -->
                <!-- TRIAL REJECTMODAL -tab-1-->
                <div class="modal fade" id="rejectModal-tab-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="updatereject">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Employee Name:</label>
                                                <input type="text" style="pointer-events: none;" class="form-control-plaintext" id="datafullname2" value="" readonly>
                                                <input type="hidden" readonly class="form-control-plaintext" id="iddata2" >		
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Submitted Date:</label>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="applieddate2" value="">
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Type of Leave:</label>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="type2" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">No of Day(s) Applied:</label>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="dayapplied2" value="">
                                            </div>
                                           
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Duration:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="form-label row-md-6"> </label>			
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Start Date:</label>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="startdate2" value="">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">End Date:</label>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="enddate2" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label row-md-6">Total Days Applied:</label>
                                                <input type="text" style="pointer-events: none;" readonly class="form-control-plaintext" id="totaldayapplied2" value="">
                                            </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label row-md-6">Reason:</label>
                                            </div>

                                            <div class="col-md-8">
                                                <textarea class="form-control" id="reasonreject" name="reasonreject"></textarea>
                                            </div>
                                        </div>
                            
                                        <br>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="updateButtonreject">Reject</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF REJECTMODAL -->
            </div>
        </div>
    </div>
@endsection