@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Project Management <small>| Project Request </small></h1>
        <div class="panel panel" id="requestProjectJs">
            <div class="panel-body">
                <table id="data-table-projectrequest" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
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
                            @foreach ($projectInfos as $key => $project) <!-- add $key variable -->
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td> <!-- display sequential number -->
                                    <td>
                                        @if (in_array($project->id, $projectIdPending))
                                            <a href="#" class="btn btn-warning btn-xs" id="cancelRequestButton"
                                                data-id="{{ $project->project_member_id }}">Cancel</a>
                                        @elseif(in_array($project->id, $projectIdReject))
                                            <button class="btn btn-primary btn-xs" disabled>Request</button>
                                            <button class="btn btn-warning btn-xs" id="viewReasonButton"
                                                data-id="{{ $project->id }}"> View Reason
                                                Rejected</button>
                                        @else
                                            <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                id="requestProjectButton" data-id="{{ $project->id }}">Request</a>
                                        @endif
                                    </td>
                                    <td>{{ $project->customer_name }}</td>
                                    <td>{{ $project->project_code }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->desc }}</td>
                                    <td>{{ $project->employeeName }}</td>
                                    <td>{{ $project->contract_start_date }}</td>
                                    <td>{{ $project->contract_end_date }}</td>
                                    <!-- @if (in_array($project->id, $projectIdPending))
                                        <td><a data-bs-toggle="modal" data-id="{{ $project->id }}"
                                                id="viewProjectRequestButton">Pending</a></td>
                                    @elseif (in_array($project->id, $projectIdApprove))
                                        <td><a data-bs-toggle="modal" data-id="{{ $project->id }}"
                                                id="viewProjectRequestButton">Approve</a></td>
                                    @elseif (in_array($project->id, $projectIdReject))
                                        <td><a data-bs-toggle="modal" data-id="{{ $project->id }}"
                                                id="viewProjectRequestButton">Rejected</a></td>
                                    @else
                                        <td><a data-bs-toggle="modal" data-id="{{ $project->id }}"
                                                id="viewProjectRequestButton">-</a></td>
                                    @endif -->
                                    <td>{{$project->status}}</td>
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
    @include('modal.project.reasonRejectProject')
@endsection
