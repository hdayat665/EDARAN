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
    <h1 class="page-header">Settings <small>| Job Grade </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading" id="jobGradeJs">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ New Job Grade</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="tablejobgrade" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Job Grade Code</th>
                        <th class="text-nowrap">Job Grade Name</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($jobGrades)
                    @foreach ($jobGrades as $jobGrade)
                    <?php $id++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                        <td>{{$jobGrade->jobGradeCode}}</td>
                        <td>{{$jobGrade->jobGradeName}}</td>
                        <td>{{$jobGrade->addedBy}}</td>
                        <td>{{$jobGrade->created_at}}</td>
                        <td>{{$jobGrade->modifiedBy}}</td>
                        <td>{{$jobGrade->modified_at}}</td>
                        <td><a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$jobGrade->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a id="deleteButton" data-id="{{$jobGrade->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

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
                <h5 class="modal-title" id="exampleModalLabel">New Job Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">

                    <div class="mb-3">
                        <label class="form-label">Job Grade Code* </label><br><br>
                        <input type="text" class="form-control" name="jobGradeCode" placeholder="" maxlength="100" style="text-transform:uppercase ;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Grade Name* </label><br><br>
                        <input type="text" class="form-control" name="jobGradeName" placeholder="" maxlength="100" style="text-transform:uppercase ;">
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
                <h5 class="modal-title" id="exampleModalLabel">Update Job Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">

                    <div class="mb-3">
                        <label class="form-label">Job Grade Code* </label><br><br>
                        <input type="text" class="form-control" name="jobGradeCode" id="jobGradeCode" placeholder=""maxlength="100" style="text-transform:uppercase ;">
                        <input type="hidden" class="form-control" name="id" id="idJ" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Grade Name* </label><br><br>
                        <input type="text" class="form-control" name="jobGradeName" id="jobGradeName" placeholder="" maxlength="100" style="text-transform:uppercase ;">
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
<div class="row">
    <!-- BEGIN col-4 -->
    <div class="col-xl-4 col-lg-6">
        <!-- BEGIN panel -->

        <!-- END panel -->
    </div>
    <!-- END col-4 -->
    <!-- BEGIN col-4 -->
    <div class="col-xl-4 col-lg-6">
        <!-- BEGIN panel -->

        <!-- END panel -->
    </div>
    <!-- END col-4 -->
    <!-- BEGIN col-4 -->
    <div class="col-xl-4 col-lg-6">
        <!-- BEGIN panel -->

        <!-- END panel -->
    </div>
    <!-- END col-4 -->
</div>

@endsection
