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
    <h1 class="page-header" id="companyJs">Settings <small>| Companies </small></h1>
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ New Company</a>
            </div>

            <h4 class="panel-title"></h4>

        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Company Code</th>
                        <th class="text-nowrap">Company Name</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($companies)
                    @foreach ($companies as $company)
                    <?php $id++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                        <td>{{$company->companyCode}}</td>
                        <td>{{$company->companyName}}</td>
                        <td> {{$company->addedBy}} </td>
                        <td>{{$company->created_at}}</td>
                        <td>{{$company->modifiedBy}}</td>
                        <td>{{$company->modified_at}}</td>
                        <td><a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$company->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger" id="deleteButton" data-id="{{$company->id}}"><i class="fa fa-trash"></i></a></td>

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
                    <h5 class="modal-title" id="exampleModalLabel">New Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm">

                        <div class="mb-3">
                            <label class="form-label">Company Code* </label>
                            <input type="text" class="form-control" name="companyCode" placeholder="Company Code">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Name* </label>
                            <input type="text" class="form-control" name="companyName" placeholder="Company Name">
                        </div> 
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="saveButton">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm">

                        <div class="mb-3">
                            <label class="form-label">Company Code* </label>
                            <input type="text" class="form-control" id="companyCode" name="companyCode" placeholder="Company Code" >
                            <input type="hidden" id="idC" class="form-control" name="id" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Name* </label>
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    <button class="btn btn-primary" id="updateButton">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    @endsection
