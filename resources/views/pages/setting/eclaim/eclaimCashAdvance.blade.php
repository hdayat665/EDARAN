@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Settings | Cash Advance Controller</h1>
        <div class="panel panel" id="cashAdvanceJs">
            <div class="panel-body">
                <div>
                    <div class="row">
                        <h3>Claim Controller List</h3>
                    </div>
                    <div class="row p-2">
                        <table id="cashAdvanceTable" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Action</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Employee Name</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Cash Advanced <BR> Month</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="mainCompanion" type="checkbox"
                                                role="switch" id="set-main" checked>
                                            {{-- <label class="form-check-label" for="set-main">Send notification email</label>  --}}
                                        </div>
                                    </td>
                                    <td>Active</td>
                                    <td>Hafiz Bin Rahman</td>
                                    <td>Service Delivery Department</td>
                                    <td>January</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="mainCompanion" type="checkbox"
                                                role="switch" id="set-main" checked>
                                            {{-- <label class="form-check-label" for="set-main">Send notification email</label>  --}}
                                        </div>
                                    </td>
                                    <td>Deactivate</td>
                                    <td>Ahmad bin Abu</td>
                                    <td>Sale Department</td>
                                    <td>March</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="mainCompanion" type="checkbox"
                                                role="switch" id="set-main" checked>
                                            {{-- <label class="form-check-label" for="set-main">Send notification email</label>  --}}
                                        </div>
                                    </td>
                                    <td>Active</td>
                                    <td>Zarina bin Hassan</td>
                                    <td>Human Resource Department</td>
                                    <td>September</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col align-self-start">
                        <a href="/setting" class="btn btn-light" style="color: black" type="submit"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
