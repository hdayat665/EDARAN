@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h1 class="page-header">Project Management <small>| My Project</small></h1>
    <div class="panel panel" id="myProjectJs">
        <div class="panel-heading">
            <div class="panel-body">

                <table id="myProjectTable" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-nowrap">Customer Name</th>
                            <th class="text-nowrap">Project Code</th>
                            <th class="text-nowrap">Project Name</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Project Manager</th>
                            <th class="text-nowrap">Contract End Date</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($datas)
                        @foreach ($datas as $key => $myProject)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$myProject->customer_name}}</td> 
                            <td>{{$myProject->project_code}}</td>
                            <td>{{$myProject->project_name}}</td>
                            <td>{{$myProject->desc}}</td>
                            <td>{{($myProject->project_manager) ? getEmployeeNameById($myProject->project_manager)->employeeName ?? '-' : '-'}}</td>
                            <td>{{$myProject->contract_end_date}}</td>
                            <td>{{$myProject->status}}</td>
                            <!-- <td><a href="javascript:;" data-bs-toggle="modal" data-id=",{{$myProject->location}}" id="getLocation" data-bs-target="#exampleModal">{{count(explode(',',$myProject->location))}}</a></td> -->
                                <td><a href="/projectViewAssignLocation/{{$myProject->member_id}}" data-id="{{$myProject->member_id}}"  class="btn btn-primary"> View </a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <div class="panel-heading">
            <div class="panel-body">
                <h3 class="page-header">Project Pending</h3>
                <table id="myProjectPendingTable" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Action</th>
                            <th class="text-nowrap">Customer Name</th>
                            <th class="text-nowrap">Project Code</th>
                            <th class="text-nowrap">Project Name</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Project Manager</th>
                            <th class="text-nowrap">Contract End Date</th>
                            <th class="text-nowrap">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pendings)
                        @foreach ($pendings as $myProject)
                        <tr>
                            <td><a href="#" class="btn btn-warning btn-xs" id="cancelProject" data-id="{{$myProject->memberId}}">Cancel</a></td>
                            <td>{{$myProject->customer_name}}</td>
                            <td>{{$myProject->project_code}}</td>
                            <td>{{$myProject->project_name}}</td>
                            <td>{{$myProject->desc}}</td>
                            <td>{{$myProject->project_manager}}</td>
                            <td>{{$myProject->contract_end_date}}</td>
                            <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">{{$myProject->location}}</a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel-heading">
            <div class="panel-body">
                <h3 class="page-header">Project Reject</h3>
                <table id="myProjectRejectTable" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Customer Name</th>
                            <th class="text-nowrap">Project Code</th>
                            <th class="text-nowrap">Project Name</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Project Manager</th>
                            <th class="text-nowrap">Contract End Date</th>
                            <th class="text-nowrap">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($rejects)
                        @foreach ($rejects as $myProject)
                        <tr>
                            <td>{{$myProject->customer_name}}</td>
                            <td>{{$myProject->project_code}}</td>
                            <td>{{$myProject->project_name}}</td>
                            <td>{{$myProject->desc}}</td>
                            <td>{{$myProject->project_manager}}</td>
                            <td>{{$myProject->contract_end_date}}</td>
                            <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">{{$myProject->location}}</a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-xl-4 col-lg-6">
            </div>
            <div class="col-xl-4 col-lg-6">
            </div>
            <div class="col-xl-4 col-lg-6">
            </div>
        </div>
    </div>
</div>
@endsection
