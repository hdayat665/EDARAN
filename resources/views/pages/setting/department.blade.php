@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->

    <!-- END page-header -->
    <!-- BEGIN row -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header" id="departmentJs">Settings <small>| Department </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ New Department</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="tabledepartment" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th class="text-nowrap">Company Name</th>
                        <th class="text-nowrap">Department Name</th>
                        <th class="text-nowrap">Department Code</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($departments)
                        @foreach ($departments as $department)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold text-dark">1</td>
                            <td>{{$department->companyName}}</td>
                            <td>{{$department->departmentName}}</td>
                            <td>{{$department->departmentCode}}</td>
                            <td> {{$department->addedBy}}</td>
                            <td>{{$department->created_at}}</td>
                            <td>{{$department->modifiedBy}}</td>
                            <td>{{$department->modified_at}}</td>
                            <td><a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$department->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger" id="deleteButton" data-id="{{$department->id}}"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- END row -->
<!-- BEGIN row -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">

                    <div class="mb-3">
                        <label class="form-label">Company Name* </label>
                        <select class="form-select" name="companyId" id="companyId" style="text-transform: uppercase;">
                            <?php $companies = getCompany() ?>
                            <option value="" label="Select Company">Select Company </option>
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}" >{{$company->companyName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department Name* </label>
                        <input type="text" class="form-control" id="departmentName" name="departmentName" maxlength="100" placeholder="" style="text-transform:uppercase">
                        <input type="hidden" class="form-control" id="idD" name="id" maxlength="100" placeholder="" style="text-transform:uppercase">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department code* </label>
                        <input type="text" class="form-control" id="departmentCode" name="departmentCode" maxlength="100" placeholder="" style="text-transform:uppercase">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary" id="updateButton">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">

                    <div class="mb-3">
                        <label class="form-label">Company Name* </label>
                            <?php $companies = getCompany() ?>
                            <select class="form-select" name="companyId" style="text-transform:uppercase;">
                            <option value="" label="Select Company " >Select Company </option>
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->companyName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department Name* </label>
                        <input type="text" class="form-control" name="departmentName" maxlength="100" placeholder="" style="text-transform:uppercase">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department code* </label>
                        <input type="text" class="form-control" name="departmentCode" maxlength="100" placeholder="" style="text-transform:uppercase">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary" id="saveButton">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection
