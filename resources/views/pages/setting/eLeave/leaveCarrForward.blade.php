@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}
	

    <div id="content" class="app-content">
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
        <h1 class="page-header" id="eleaveentitlementJs">Setting | Leave Entitlement | Carried Forward</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row p-2">
                        <h3>Carried Forward List</h3>
                    </div>
                    
                    <div class="row p-2">
                        <table  id="tableentitlement"  class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>	
                                <th class="text-nowrap"></th>
                                <th class="text-nowrap">Max Duration (Days)</th>
                                <th class="text-nowrap">Lapsed Date (Month)</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                
                            <tr>
                                <td>Carried Forward</td>
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

