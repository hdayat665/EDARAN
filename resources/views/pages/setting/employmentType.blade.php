
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
    <h1 class="page-header" id="employmentTypeJs">Setting <small>| Employment Type </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary"><i class="fa fa-plus"></i> New Employment Type</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="tableemploymenttype" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        {{-- <th class="text-nowrap">Employment Type Code</th> --}}
                        <th class="text-nowrap">Employment Type</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php  $id = 0 ?>
                    @if ($employmentTypes)
                        @foreach ($employmentTypes as $employmentType)
                        <?php  $id++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                        {{-- <td>{{$employmentType->code}}</td> --}}
                        <td>{{$employmentType->type}}</td>
                        <td>{{$employmentType->addedBy}}</td>
                        <td>{{$employmentType->created_at}}</td>
                        <td>{{$employmentType->modifiedBy}}</td>
                        <td>{{$employmentType->modified_at}}</td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="javascript:;" id="editButton" data-id="{{$employmentType->id}}" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="deleteButton" data-id="{{$employmentType->id}}" class="dropdown-item"> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-primary" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>

    </div>

    <!-- END row -->
    <!-- BEGIN row -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Employment Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        {{-- <div class="mb-3">
                            <label class="form-label">Employment Type Code* </label><br><br>
                            <input type="text" class="form-control" name="code" placeholder="EMPLYMENT TYPE CODE" maxlength="100" style="text-transform:uppercase ;">
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Employment Type* </label><br><br>
                            <input type="text" class="form-control" name="type" placeholder="EMPLYMENT TYPE" maxlength="100" style="text-transform:uppercase ;">
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Employment Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        {{-- <div class="mb-3">
                            <label class="form-label">Employment Type Code* </label><br><br>
                            <input type="text" class="form-control" name="code" placeholder="EMPLYMENT TYPE CODE" maxlength="100" style="text-transform:uppercase ;">
                            <input type="hidden" class="form-control" name="id" id="idE" placeholder="" maxlength="100" style="text-transform:uppercase ;">
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Employment Type* </label><br><br>
                            <input type="text" class="form-control" name="type" id="type" placeholder="EMPLOYMENT TYPE" maxlength="100" style="text-transform:uppercase ;">
                            <input type="hidden" id="idE" name="id">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button href="javascript:;" class="btn btn-primary" id="updateButton">Update</button>
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
    <!-- END row -->
</div>
@endsection
