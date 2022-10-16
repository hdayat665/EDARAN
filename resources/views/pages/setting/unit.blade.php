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
    <h1 class="page-header">Settings <small>| Unit </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading" id="unitJs">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ New Unit</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="tableunit" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Department Name</th>
                        <th class="text-nowrap">Unit Code</th>
                        <th class="text-nowrap">Unit Name</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>



                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($units)
                    @foreach ($units as $unit)
                    <?php $id++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                        <td>{{$unit->departmentName}}</td>
                        <td>{{$unit->unitCode}}</td>
                        <td>{{$unit->unitName}}</td>
                        <td>{{$unit->addedBy}}</td>
                        <td>{{$unit->created_at}}</td>
                        <td>{{$unit->modifiedBy}}</td>
                        <td>{{$unit->modified_at}}</td>
                        <td><a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$unit->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" id="deleteButton" data-id="{{$unit->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
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
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">

                    <div class="mb-3">
                        <label class="form-label">Department Name* </label><br><br>
                        <select class="form-select" name="departmentId" style="text-transform: uppercase;">
                            <option value="" label="Select Department Name " selected="selected">Select Department Name </option>
                            <?php $departments = getDepartment() ?>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}" >{{$department->departmentName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit Code* </label><br><br>
                        <input type="text" class="form-control" name="unitCode" maxlength="100" placeholder="" style="text-transform:uppercase">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit Name* </label><br><br>
                        <input type="text" class="form-control" name="unitName" maxlength="100" placeholder="" style="text-transform:uppercase">
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



<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">

                    <div class="mb-3">
                        <label class="form-label"> Department Name* </label><br><br>
                        <select class="form-select" name="departmentId" id="departmentId" style="text-transform: uppercase;">
                            <option value="" label="Select Department Name " selected="selected">Select Department Name </option>
                            <?php $departments = getDepartment() ?>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}" >{{$department->departmentName}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit Code* </label><br><br>
                        <input type="text" class="form-control" id="unitCode" name="unitCode" maxlength="100" placeholder="" style="text-transform:uppercase">
                        <input type="hidden" class="form-control" id="idU" name="id" maxlength="100" placeholder="" style="text-transform:uppercase">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit Name* </label><br><br>
                        <input type="text" class="form-control" id="unitName" name="unitName" maxlength="100" placeholder="" style="text-transform:uppercase">
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

<!-- END row -->

@endsection
