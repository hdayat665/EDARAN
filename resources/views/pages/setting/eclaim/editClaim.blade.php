@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Update Claim Category</h1>
        <div class="panel panel">
            <div class="panel-body">
                <div class="row p-2">
                    <div class="col-md-6">
                        <h3>Update Claim Category</h3>
                        <br>
                        <form>
                            <div class="form-group row p-2">
                                <label for="categorycode" class="col-sm-2 col-form-label">Claim Category
                                    Code*</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="category_code" name="categorycode"
                                        placeholder="Input Claim Category Code">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-2">
                                <label for="claimcategory" class="col-sm-2 col-form-label">Claim
                                    Category*</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="claimcategory" id="claim_category"
                                        placeholder="Input Claim Category">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-2">
                                <label for="claimtype" class="col-sm-2 col-form-label">Claim Type*</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-2">
                                        <input type="checkbox" class="form-check-input" name="" id="" />
                                        <label>MTC- Monthly Claim</label>
                                    </div>
                                    <div class="row-sm-6 p-2">
                                        <input type="checkbox" class="form-check-input" name="" id="" />
                                        <label>GC- General Claim</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-2">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col">
                                    <textarea class="form-control" name="description" id="descriptionn" rows="3" placeholder="Input Description"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-white mt-3 mb-3" data-bs-toggle="modal" id="myModal1"
                                data-bs-target="#modaladdcontent"><i class="fa fa-plus"></i>
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
                            <br><br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col align-self-start">
                            <a href="/setting/eclaimCategoryView" class="btn btn-light" style="color: black"
                                type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-light" type="submit" style="color: black"><i class="fa fa-save"></i>
                                Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('modal.setting.eclaim.addContentDesc')
@endsection
