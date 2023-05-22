@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}
	

    <div id="content" class="app-content">
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">Setting | Leave Entitlements</h1>
        <div class="row">
            <div class="col-xl-15" id="eleaveentitlementJs">
                <!-- BEGIN nav-tabs -->
                <ul class="nav nav-tabs" id="eleaveentitlementJs">
                    <li class="nav-item">
                        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Annual Leave List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">Sick Leave</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 3</span>
                            <span class="d-sm-block d-none">Carried Forward</span>
                        </a>
                    </li>
                </ul>
            
                <div class="tab-content panel m-0 rounded-0 p-3">
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <h3 class="mt-10px"></i> Annual Leave List </h3>
                        <div class="panel-body">
                            <table  id="tableannual"  class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>	
                                    <th class="text-nowrap">No.</th>
                                    <th class="text-nowrap">Job Grade</th>
                                    <th class="text-nowrap">Permanent (0-2 years)</th>
                                    <th class="text-nowrap">Permanent (2-3 years)</th>
                                    <th class="text-nowrap">Permanent (More than 5 years)</th>
                                    <th class="text-nowrap">Contract</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Chairman</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Director</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Board of Director</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Chief Executive Officer</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Chief Operation Officer</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- end panel-body -->
                    </div> <!-- end tab-pane fade active show-->
                 

                    <div class="tab-pane fade" id="default-tab-2">   
                        <h3 class="mt-10px"></i> Sick Leave </h3>    
                        <div class="panel-body">
                            <table  id="tablesick"  class="table table-striped table-bordered align-middle table-sm">
                                <thead>
                                    <tr>	
                                    <th class="text-nowrap">No.</th>
                                    <th class="text-nowrap">Job Grade</th>
                                    <th class="text-nowrap">Permanent (0-2 years)</th>
                                    <th class="text-nowrap">Permanent (2-3 years)</th>
                                    <th class="text-nowrap">Permanent (More than 5 years)</th>
                                    <th class="text-nowrap">Contract (0-2 years)</th>
                                    <th class="text-nowrap">Contract (2-3 years)</th>
                                    <th class="text-nowrap">Contract (More than 5 years)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>No Hospitalization</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Hospitalization</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>  <!-- end panel-body-->
                    </div> <!-- end tab-pane fade-->

                    <div class="tab-pane fade" id="default-tab-3">   
                        <h3>Carried Forward Leave</h3>    
                        <div class="panel-body">
                            <table  id="tablecarrforward"  class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>	
                                    <th class="text-nowrap">No.</th>
                                    <th class="text-nowrap">Job Grade</th>
                                    <th class="text-nowrap">Permanent (0-2 years)</th>
                                    <th class="text-nowrap">Permanent (2-3 years)</th>
                                    <th class="text-nowrap">Permanent (More than 5 years)</th>
                                    <th class="text-nowrap">Contract</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Chairman</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Director</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Board of Director</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Chief Executive Officer</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Chief Operation Officer</td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                        <td><input type="text" id="fname" name="fname"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!--end panel-body-->   
                    </div> <!-- end tab-pane fade-->
                </div> <!--end tab-content panel m-0 rounded-0 p-3-->
            </div> <!-- end col-xl-15-->
        </div> <!--end row-->
    </div> <!--end app-content -->


@endsection

