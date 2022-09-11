@extends('layouts.dashboardTenant')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Project Registration <small>| Project Request </small></h1>
    <div class="panel panel" id="requestProjectJs">
        <div class="panel-body">
            <table id="data-table-projectrequest" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">Action</th>
                        <th class="text-nowrap">Customer Name</th>
                        <th class="text-nowrap">Project Code</th>
                        <th class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Project Manager</th>
                        <th class="text-nowrap">Contract Start Date</th>
                        <th class="text-nowrap">Contract End Date</th>
                        <th class="text-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($projectInfos)
                    @foreach ($projectInfos as $project)
                    <tr class="odd gradeX">
                        <td>
                            <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" id="requestProjectButton" data-id="{{$project->id}}">Request</a><br><a href="#" class="btn btn-warning btn-xs">Cancel</a>
                        </td>
                        <td>{{$project->customer_name}}</td>
                        <td>{{$project->project_code}}</td>
                        <td>{{$project->project_name}}</td>
                        <td>{{$project->desc}}</td>
                        <td>{{$project->project_manager}}</td>
                        <td>{{$project->contract_start_date}}</td>
                        <td>{{$project->contract_end_date}}</td>
                        <td><a href="#" data-bs-toggle="modal" data-id="{{$project->id}}" id="viewProjectRequestButton" >{{$project->status}}</a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('modal.project.requestProject')
@include('modal.project.viewRequestProject')
@endsection
