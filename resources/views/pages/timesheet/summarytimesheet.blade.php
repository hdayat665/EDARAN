@extends('layouts.dashboardTenant')
@section('content')

        <div id="content" class="app-content">		
            <h1 class="page-header">My Timesheet <small>| Summary</small></h1>
            
            <!-- BEGIN panel -->
            <div class="panel panel">
                
                <!-- BEGIN panel-heading -->              
                <div class="panel-heading">
                    <div class="col-md-6">
                        <a href="/myTimesheet" class="btn btn-primary">+ Add Logs</a>
                    </div>
                    <h4 class="panel-title"></h4>
                </div>
                <!-- END panel-heading -->

                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <tr>
                            <th>Total Days of This Month</th>
                            <td>31 Days</td>
                            <th>Weekdays</th>
                            <td>22 Days</td>
                        </tr>
                        <tr>
                            <th >Weekend</th>
                            <td>9 Days</td>
                            <th>Working Days</th>
                            <td>19 Days</td>
                        </tr>
                        <tr>
                            <th>Public Holidays</th>
                            <td>5 Days</td>
                            <th>Worked Days</th>
                            <td>19 Days</td>
                        </tr>
                        <tr>
                            <th>Eligible Public Holidays</th>
                            <td>3 Days</td>
                            <th>Remaining TSR</th>
                            <td>0 Days</td>
                        </tr>
                    </table>
                </div>

                <!-- BEGIN panel-body -->
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <!-- <th width="9%" data-orderable="false" class="align-middle">Action</th> -->
                                <th class="text-nowrap">Year</th>
                                <th class="text-nowrap">Month</th>
                                <th class="text-nowrap">TSR Status</th>
                                <th class="text-nowrap">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <!-- <td><a href="javascript:;" class="btn btn-outline-green ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-pencil-alt"></i></a></td>
                                <td><div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                </div></td> -->
                                <td>2022</td>
                                <td>January</td>
                                <td>31/31</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fa fa-file-text"></i></button>
                                    &nbsp<button class="btn btn-primary"><i class="fa fa-print"></i></button>
                                </td>
                            </tr>
                                <td>2022</td>
                                <td>February</td>
                                <td>28/28</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fa fa-file-text"></i></button>
                                    &nbsp<button class="btn btn-primary"><i class="fa fa-print"></i></button>
                                </td>
                            </tr>
                                <td>2022</td>
                                <td>March</td>
                                <td>31/31</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fa fa-file-text"></i></button>
                                    &nbsp<button class="btn btn-primary"><i class="fa fa-print"></i></button>
                                </td>
                            </tr>	
                        </tbody>
                    </table>
                    <div class="modal fade" id="newlogmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="width:800px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Logs</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" >
                                    <form id="addChildrenForm">
                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                                <label for="firstname" class="form-label">Type Of Log*</label>
                                                <select class="form-select" id="typeoflog" aria-label="Default select example">
                                                <option class="form-label" value="" selected>Please Select</option>
                                                <option class="form-label" value="1">Home</option>
                                                <option class="form-label" value="2">Office</option>
                                                <option class="form-label" value="3">My Project</option>
                                                <option class="form-label" value="4">Others</option>
                                                </select>                              
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="lastname" class="form-label">Date*</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dateaddlog" />
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-sm-6" id="officelog" style="display:none">
                                                <label for="Office-Log" class="form-label">Office Log</label>
                                                <select class="form-select" id="officelog2" aria-label="Default select example">
                                                <option class="form-label" value="" selected>Please Select</option>
                                                <option class="form-label" value="1">My Project</option>
                                                <option class="form-label" value="2">Activity</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6" id="myproject" style="display:none">
                                                <label for="Office-Log" class="form-label">My Project</label>
                                                <select class="form-select" id="" aria-label="Default select example">
                                                <option class="form-label" value="" selected>List all project</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-sm-6" id="listproject" style="display:none">
                                                <label for="Office-Log" class="form-label">My Project</label>
                                                <select class="form-select" id="" aria-label="Default select example">
                                                <option class="form-label" value="" selected>List All Project</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                                <label for="issuing-country" class="form-label">Activity Name</label>
                                                <select class="form-select" id="" >
                                                <option class="form-label" value="" selected>List All Activity Name</option>                                                                               
                                                </select>
                                            </div>                                   
                                            <div class="col-sm-6">
                                                <label for="issuing-country" class="form-label">Start Time</label>  
                                                <div class="input-group">
                                                    <input id="starttime" type="text" class="form-control" />
                                                    <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                </div>	
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-sm-6">                      
                                                <label for="issuing-country" class="form-label">Project Location</label>
                                                <select class="selectpicker form-select" id="projectlocsearch" aria-label="Default select example">
                                                <option class="form-label" value="" selected>List All Project location</option>                                                                              
                                                </select>                                
                                            </div>
                                            <div class="col-sm-6 ">                                   
                                                <label for="issuing-country" class="form-label">End Time</label>
                                                <div class="input-group">
                                                    <input id="endtime" type="text" class="form-control" />
                                                    <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                                <label for="gender" class="form-label">Description</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="col-sm-6">                                   
                                                <label for="issuing-country" class="form-label">Total Hours</label>
                                                <input type="text" readonly id="" value="Auto calculate (End time - Start time), default 00:00" name="" class="form-control" aria-describedby="dob">                     
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" id="addChildren">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                <div class="col align-self-start">
                    <a href="#" class="btn btn-primary" onclick="window.history.back(); return false;"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            </div>
        </div>


@endsection