@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header" id="newRoleJs">Settings<small>| System Role</small></h1>
        <div class="panel panel">
            <div class="panel-heading">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="/newCreateRole" id="" class="btn btn-primary"><i class="fa fa-plus"></i> Create New System Role</a>
                </div>
                <h4 class="panel-title"></h4>
            </div>

            <div class="panel-body">
                <table id="systemRoleTable" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-nowrap">Created Date</th>
                            <th class="text-nowrap">Role</th>
                            <th class="text-nowrap">Description</th>
                            <th width="9%" data-orderable="false" class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $role)
                            <tr class="odd gradeX">
                                <td width="1%" class="fw-bold text-dark">{{ $no++ }}</td>
                                <td>{{ $role->created_at ?? '-' }}</td>
                                <td>{{ $role->roleName ?? '-' }}</td>
                                <td>{{ $role->desc ?? '-' }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a href="/newUpdateRole/{{ $role->id }}" id="" data-id="" class="dropdown-item"> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a id="deleteBtn" data-id="{{ $role->id }}" class="dropdown-item"> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row p-2">
                    <div class="col align-self-start">
                        <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
