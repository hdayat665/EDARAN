@extends('layouts.dashboardTenant')

@section('content')
<style>
    #more {display: none;}
    #more2 {display: none;}
    #more3 {display: none;}
    </style>
<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->

    <!-- END page-header -->
    <!-- BEGIN row -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header" id="designationJs" >Setting <small>| Designation </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary"><i class="fa fa-plus"></i> New Designation</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="tabledesignation" class="table table-striped table-bordered align-middle" >
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Designation Code</th>
                        <th class="text-nowrap">Designation Name</th>
                        <th class="text-nowrap" style="word-wrap: break-word;">Job Description</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>



                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0; ?>
                    @if ($designations)
                    @foreach ($designations as $designation)
                    <?php $id++; ?>
                    <tr class="odd gradeX">
                            <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                            <td>{{$designation->designationCode}}</td>
                            <td>{{$designation->designationName}}</td>
                            <td class="show-less" style="word-wrap: break-word;">{{$designation->jobDesc}}</td>
                            <td>{{$designation->addedBy}}</td>
                            <td>{{$designation->created_at}}</td>
                            <td>{{$designation->modifiedBy}}</td>
                            <td>{{$designation->modified_at}}</td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                <a href="javascript:;" id="editButton" data-id="{{$designation->id}}" class="dropdown-item"> Edit</a>
                                <div class="dropdown-divider"></div>
                                <a id="deleteButton" data-id="{{$designation->id}}" class="dropdown-item">Delete</a>
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
</div>

<!-- END row -->
<!-- BEGIN row -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Designation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">

                    <div class="mb-3">
                        <label class="form-label">Designation Code* </label>
                        <input type="text" class="form-control" name="designationCode" placeholder="DESIGNATION CODE" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Designation Name* </label>
                        <input type="text" class="form-control" name="designationName" placeholder="DESIGNATION NAME" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Description* </label>
                        <textarea type="text" class="form-control" placeholder="Job Description" name="jobDesc" rows="5" maxlength="255" placeholder="JOB DESCRIPTION"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Designation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">

                    <div class="mb-3">
                        <label class="form-label">Designation Code* </label>
                        <input type="text" class="form-control" name="designationCode" id="designationCode" placeholder="DESIGNATION CODE" >
                        <input type="hidden" class="form-control" name="id" id="idD" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Designation Name* </label>
                        <input type="text" class="form-control" name="designationName" id="designationName" placeholder="DESIGNATION NAME" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Description* </label>
                        <textarea type="text" class="form-control" placeholder="Job Description" id="jobDesc" name="jobDesc" rows="5" maxlength="255" placeholder="JOB DESCRIPTION"></textarea>
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

@endsection
