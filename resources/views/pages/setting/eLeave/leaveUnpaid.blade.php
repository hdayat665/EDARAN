@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}
	

    <div id="content" class="app-content">
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
        <h1 class="page-header" id="eleaveentitlementJs">Setting | Leave Entitlement | Unpaid Leave</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row p-2">
                        <h3>Unpaid Leave</h3>
                    </div>
                    
                    <div class="row p-2">
                        <table  id="tableentitlement"  class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>	
                                <th class="text-nowrap"></th>
                                <th class="text-nowrap">Permanent</th>
                                <th class="text-nowrap">Contract</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                
                            <tr>
                                <td>Fully Use Annual Leave</td>
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

