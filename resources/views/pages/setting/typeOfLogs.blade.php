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
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Department</th>
                        <th class="text-nowrap">Type of Logs</th>
                        <th class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Activity Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @if ($datas)
                    @foreach ($datas as $data)
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="javascript:;" id="editButton" data-id="{{$data->id}}" data-bs-target="#exampleModaledit" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" id="deleteButton" data-id="{{$data->id}}" class="dropdown-item"> Delete</a>
                            </div>
                        </td>

                        <td >{{$no++}}</td>
                        <td >{{$data->departmentName}}</td>
                        @php
                            $typeOfLogNames = [
                                1 => 'HOME',
                                2 => 'OFFICE',
                                3 => 'PROJECT',
                                4 => 'OTHERS',
                                // add more mappings as needed
                            ];
                        @endphp
                       <td>{{ isset($typeOfLogNames[$data->type_of_log]) ? $typeOfLogNames[$data->type_of_log] : '-' }}</td>
                        <td >{{$data->project_name ? $data->project_name : '-'}}</td>
                        <td >
                            <a href="javascript:;" data-bs-toggle="modal" id="listActivityNames" data-id="{{$data->id}}">CLICK HERE</a></td>
                        {{-- <td>1. Corrective Maintenance, <br> 2. Reviewing & Documenting, <br>3. Reporting </td> --}}
                        
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
    </div>
    @include('modal.setting.addTypeOfLogs')
    @include('modal.setting.editTypeOfLogs')
    @include('modal.setting.listActivityNamesTypeOfLogs')

    @endsection
