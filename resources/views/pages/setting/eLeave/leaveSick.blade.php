@extends('layouts.dashboardTenant')

@section('content')

    {{-- content-start --}}


    <div id="content" class="app-content">
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
        <h1 class="page-header" id="eleaveentitlementJs">Setting | Leave Entitlement | Sick Leave</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="form-control">
                    <div class="row p-2">
                        <h3>Sick Leave List</h3>
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

