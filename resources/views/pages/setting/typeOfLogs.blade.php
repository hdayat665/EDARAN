@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header">Settings <small>| Type of Logs </small></h1>
    <div class="panel panel" id="typeOfLogsJs">
        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ New Type of Log</a>
            </div>
            <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
            <table id="typeOfLogsTable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Department</th>
                        <th class="text-nowrap">Type of Logs</th>
                        <th class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Activity Name</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @if ($datas)
                    @foreach ($datas as $data)
                    <tr>
                        <td >{{$no++}}</td>
                        <td >{{$data->departmentName}}</td>
                        <td >{{$data->type_of_log}}</td>
                        <td >{{$data->project_name}}</td>
                        <td >{{$data->activity_name}}</td>
                        {{-- <td>1. Corrective Maintenance, <br> 2. Reviewing & Documenting, <br>3. Reporting </td> --}}
                        <td><a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$data->id}}" data-bs-target="#exampleModaledit" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" id="deleteButton" data-id="{{$data->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @include('modal.setting.addTypeOfLogs')
    @include('modal.setting.editTypeOfLogs')

    @endsection
