@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}
	

    <div id="content" class="app-content">
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
        <h1 class="page-header" id="eleaveentitlementJs">Setting | Leave Entitlement | Annual Leave</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row p-2">
                        <h3>Annual Leave List</h3>
                    </div>
                    
                    <div class="row p-2">
                        <table  id="tableentitlement"  class="table table-striped table-bordered align-middle">
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

