@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content bg-gray-100">
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Dashboard</h1>
    <!-- END page-header -->

    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-list-check	 fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">New Subscription Amount</div>
                    <div class="stats-number">US$0</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 35.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-user-astronaut	 fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">New Tenant</div>
                    <div class="stats-number">0</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 43.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-square-poll-vertical	 fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Sample Statistic</div>
                    <div class="stats-number">65</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 23.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-square-poll-horizontal	 fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Sample Statistic 2</div>
                    <div class="stats-number">432</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 28.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
    </div>
    <!-- END row -->

    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-8 -->
        <div class="col-xl-8">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Income Statistics</h4>
                    <div class="btn-group btn-group-toggle my-n1" data-toggle="buttons">
                        <input type="radio" name="options" class="btn-check" id="option1" checked />
                        <label class="btn btn-success btn-xs" for="option1">Daily</label>

                        <input type="radio" name="options" class="btn-check" id="option2" />
                        <label class="btn btn-success btn-xs" for="option2">Weekly</label>

                        <input type="radio" name="options" class="btn-check" id="option2" />
                        <label class="btn btn-success btn-xs" for="option2">Monthly</label>
                    </div>
                </div>
                <div class="panel-body pe-1">
                    <div id="interactive-chart" class="h-300px"></div>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN tabs -->

            <!-- END tabs -->

            <!-- BEGIN panel -->

            <!-- END panel -->

            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-8 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-6">
                <div class="panel-heading">
                    <h4 class="panel-title">Edition Statistics</h4>
                    <div class="panel-heading-btn">

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-panel align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Source</th>
                                <th>Total</th>
                                <th>Trend</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td nowrap><label class="badge bg-danger">Unique Visitor</label></td>
                                <td>13,203 <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
                                <td><div id="sparkline-unique-visitor"></div></td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-warning">Bounce Rate</label></td>
                                <td>28.2%</td>
                                <td><div id="sparkline-bounce-rate"></div></td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-success">Total Page Views</label></td>
                                <td>1,230,030</td>
                                <td><div id="sparkline-total-page-views"></div></td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-blue">Avg Time On Site</label></td>
                                <td>00:03:45</td>
                                <td><div id="sparkline-avg-time-on-site"></div></td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-default text-gray-900">% New Visits</label></td>
                                <td>40.5%</td>
                                <td><div id="sparkline-new-visits"></div></td>
                            </tr>
                            <tr>
                                <td nowrap><label class="badge bg-inverse">Return Visitors</label></td>
                                <td>73.4%</td>
                                <td><div id="sparkline-return-visitors"></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END panel -->

            <!-- BEGIN panel -->

            <!-- END col-4 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END #content -->

    <!-- BEGIN scroll-top-btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- END scroll-top-btn -->
</div>

@endsection
