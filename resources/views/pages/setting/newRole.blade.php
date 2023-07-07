@extends('layouts.dashboardTenant')
@section('content')

<div id="content" class="app-content">
    <h1 class="page-header" id="newRoleJs">Settings<small>| System Role</small></h1>
    <div class="panel panel">
        <div class="panel-heading">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="/newCreateRole" data-bs-toggle="modal" id="" class="btn btn-primary"><i class="fa fa-plus"></i> Create New System Role</a>
            </div>
            <h4 class="panel-title"></h4>
        </div>
        
        <div class="panel-body">
            <table id="systemRoleTable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No.</th>     
                        <th class="text-nowrap">Created Date</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Role</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">1</td>
                        <td>2023-05-14</td>
                        <td>Master</td>
                        <td>Manage the whole system</td>  
                        <td>Static</td>
                        <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="/newUpdateRole" id="" data-id="" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="" data-id="" class="dropdown-item"> Delete</a>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">2</td>
                        <td>2023-05-14</td>
                        <td>Master</td>
                        <td>Manage the whole system</td>  
                        <td>Static</td>
                        <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="/newUpdateRole" id="" data-id="" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="" data-id="" class="dropdown-item"> Delete</a>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">3</td>
                        <td>2023-05-14</td>
                        <td>Master</td>
                        <td>Manage the whole system</td>  
                        <td>Static</td>
                        <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="/newUpdateRole" id="" data-id="" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="" data-id="" class="dropdown-item"> Delete</a>
                        </td>
                    </tr>
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