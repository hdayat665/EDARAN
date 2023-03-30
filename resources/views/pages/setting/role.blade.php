@extends('layouts.dashboardTenant')@section('content')
<style>
    /* Default styles for the table */
    #tableBody {
        font-family: Arial, sans-serif;
        font-size: 12px;
        border-collapse: collapse;
        width: 100%;
    }

    #tableBody th {
        background-color: #f2f2f2;
        color: #444444;
        font-weight: bold;
        text-align: left;
        padding: 10px;
        border-bottom: 1px solid #dddddd;
    }

    #tableBody td {
        padding: 10px;
        border-bottom: 1px solid #dddddd;
    }

    #tableBody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    #tableBody tr:hover {
        background-color: #eaeaea;
    }

    #tableBody tbody tr:last-child td {
        border-bottom: none;
    }

    /* Media query for small screens */
    @media (max-width: 600px) {
        #tableBody {
            font-size: 10px;
            width: 100%;
        }

        #tableBody th {
            padding: 8px;
        }

        #tableBody td {
            padding: 8px;
        }
    }
</style>
<div id="content" class="app-content">

    <h1 class="page-header" id="roleJs">Roles <small>| Use roles to group permissions. </small></h1> <!-- END page-header -->
    <div class="panel panel">
        <div class="panel-heading">
            <div class="col-md-6">
                <p> </p><a href="javascript:;" data-bs-toggle="modal" id="addRoleButton" class="btn btn-primary"><i class="fa fa-plus"></i> New Role</a>
            </div>
            <div class="modal fade" id="modal-dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Select Permissions</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body"></div>
                        <div id="kt_docs_jstree_checkable"></div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                            <a href="javascript:;" class="btn btn-success">Action</a>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="panel-title"></h4>
            <div class="panel-heading-btn">
                <a href="" class="btn btn-primary" id="reloadRole"><i class="fa fa-arrow-rotate-left"></i> Refresh</a>
            </div>
        </div>
        <div class="panel-body">
            <table id="tableRoles" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Role Name</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($roles)
                        <?php $i = 1; ?>
                        @foreach ($roles as $role)
                            <?php $a = $i++; ?>
                            <tr class="odd gradeX">
                                <td width="1%" class="fw-bold text-dark">{{ $a }}</td>
                                {{-- <span class="badge bg-primary rounded-pill">Static</span><span class="badge bg-dark rounded-pill">Default</span> --}}
                                <td>{{ $role->roleName }} </td>
                                <td>{{ $role->addedBy }}</td>
                                <td>{{ $role->addedTime }}</td>
                                <td>{{ $role->modifiedBy }}</td>
                                <td>{{ $role->modifiedTime }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a href="javascript:;" data-bs-toggle="modal" id="editRoleButton" data-id="{{ $role->id }}" class="dropdown-item"> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:;" id="deleteRoleButton" data-id="{{ $role->id }}" class="dropdown-item"> Delete</a>
                                </td>
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
    </div> <!-- END row -->
</div>
@include('modal.setting.roleModal')
@endsection
