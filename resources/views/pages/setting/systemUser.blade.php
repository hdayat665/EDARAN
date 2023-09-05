@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header" id="systemUserJs">Setting <small>| System User</small></h1>
        <div class="panel panel">
            <div class="panel-body">
                <table id="systemUserTable" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-nowrap">User ID</th>
                            <th class="text-nowrap">Employee Name</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Role</th>
                            <th class="text-nowrap">Status</th>
                            <th width="9%" data-orderable="false" class="align-middle">Action</th>
                            <th class="text-nowrap">Modified Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users)
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr class="odd gradeX">
                                    <td width="1%" class="fw-bold text-dark">{{ $no++ }}</td>
                                    <td>{{ $user->id ?? '-' }}</td>
                                    <td>{{ $user->employement->employeeName ?? '-' }}</td>
                                    <td>{{ $user->employement->workingEmail ?? '-' }}</td>
                                    <td>{{ $user->role->roleName ?? '-' }} {{ $user->role_custom_id ? '(Customize)' : '' }}</td>
                                    <td>
                                        @if ($user->status == 'active')
                                            <span class="badge <?= 'bg-green' ?>">Active</span>
                                        @else
                                            <span class="badge <?= 'bg-red' ?>">Deactivate</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                            <a href="/systemUserUpdate/{{ $user->id }}" class="dropdown-item"> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a id="deleteUserBtn" data-id="{{ $user->id }}" class="dropdown-item"> Delete</a>
                                    </td>
                                    <td>{{ $user->updated_at ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endif
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
