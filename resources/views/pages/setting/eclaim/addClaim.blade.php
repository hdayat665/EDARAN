@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Add Claim Category</h1>
        <div class="panel panel" id="claimCategoryJs">
            <div class="panel-body">
                <div class="row p-2">
                    <form id="saveForm">
                        <div class="col-md-6">
                            <h3>Add Claim Category</h3>
                            <br>
                            <div class="form-group row p-2">
                                <label for="categorycode" class="col-sm-3 col-form-label">Claim Category
                                    Code*</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="category_code" name="claim_catagory_code" placeholder="Input Claim Category Code">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-2">
                                <label for="claimcategory" class="col-sm-3 col-form-label">Claim
                                    Category*</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="claim_catagory" id="claim_category" placeholder="Input Claim Category">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-2">
                                <label for="claimtype" class="col-sm-3 col-form-label">Claim Type*</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" name="claim_type[]" value="MTC" id="" />
                                        <label>MTC- Monthly Claim</label>
                                    </div>
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" value="GC" name="claim_type[]" id="" />
                                        <label>GC- General Claim</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row p-2">
                                <label for="claimtype" class="col-sm-3 col-form-label">Add Dropdown</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" name="" id="adddropdown" /> <label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row p-2">
                                <label for="claimtype" class="col-sm-3 col-form-label">Add Project</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" name="addproject" id="addprojectid"  /> <label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row p-2">
                                <label for="claimtype" class="col-sm-3 col-form-label">Add Attachment</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" name="addattach" id="addattachid" /> <label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row p-3" style="display:none" id="mandotoryview">
                                <label for="claimtype" class="col-sm-5 col-form-label">Mandotory Attachment</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" name="attachstatus" id="" /> <label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="label" style="display: none">
                                <div class="form-group row p-2">
                                    <label for="labellingname" class="col-sm-3 col-form-label">Labelling Name</label>
                                    <div class="col">
                                        <textarea class="form-control" name="label" id="descriptionn" rows="3" placeholder="Labelling Name"></textarea>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-white mt-3 mb-3" data-bs-toggle="modal" id="myModal1" data-bs-target="#modaladdcontent"><i class="fa fa-plus"></i>
                                    Add Content Description</button>
                                <table id="tablesavecontent" class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Action</th>
                                            <th class="text-nowrap">Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br><br>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col align-self-start">
                                <a href="/setting/eclaimCategoryView" class="btn btn-light" style="color: black" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-light" type="submit" id="saveButton" style="color: black">
                                    <i class="fa fa-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal -->
        </div>
        @include('modal.setting.eclaim.addContentDesc')
    </div>
@endsection
