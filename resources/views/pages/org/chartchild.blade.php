@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header" id="organization" style="font-weight: bold">CORPORATE SERVICES</h1>
    <div class="panel panel-with-tabs">

        <div class="panel-body tab-content">
            <div class="tab-pane fade active show" id="default-tab-1">
                <div style="width:100%; height:100%;" id="tree"> </div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <div id="chart_div1"></div>
            </div>
        </div>
    </div>
    {{-- <a class="btn btn-primary" href="/organizationChart" role="button">Link</a>
    <a href="{{ url("/organizationChart") }}">Some Text</a> --}}
    <div class="modal-footer">
        <a class="btn btn-primary" href="{{ url("/organizationChart") }}" role="button">Back</a>
    </div>
    {{-- <div class="row">
        <div class="col-xl-4 col-lg-6">
        </div>
        <div class="col-xl-4 col-lg-6">
        </div>
        <div class="col-xl-4 col-lg-6">
        </div>
    </div> --}}
</div>

@endsection


