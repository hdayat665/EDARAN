@extends('layouts.dashboardTenant')
@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header">Setting | Update Claim Category</h1>
        <div class="panel panel" id="claimCategoryJs">
            <div class="panel-body">
                <div class="row p-2">
                    <form id="updateForm">
                        <div class="col-md-6">
                            <h3>Update Claim Category</h3>
                            <br>
                            <div class="form-group row p-2">
                                <label for="categorycode" class="col-sm-3 col-form-label">Claim Category
                                    Code*</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="category_code" value="{{ $claimCategory->claim_catagory_code }}" name="claim_catagory_code"
                                        placeholder="Input Claim Category Code">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-2">
                                <label for="claimcategory" class="col-sm-3 col-form-label">Claim
                                    Category*</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="claim_catagory" value="{{ $claimCategory->claim_catagory }}" id="claim_category" placeholder="Input Claim Category">
                                    <input type="hidden" id="idClaim" value="{{ $claimCategory->id }}">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-2">
                                <label for="claimtype" class="col-sm-3 col-form-label">Claim Type*</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" {{ $claimCategory->claim_type == 'MTC' ? 'checked' : '' }}
                                            {{ $claimCategory->claim_type == 'MTC,GC' ? 'checked' : '' }} value="MTC" {{ $claimCategory->claim_type == 'GC,MTC' ? 'checked' : '' }} value="MTC"
                                            name="claim_type[]" id="" />
                                        <label>MTC- Monthly Claim</label>
                                    </div>
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" value="GC" {{ $claimCategory->claim_type == 'GC' ? 'checked' : '' }} {{ $claimCategory->claim_type == 'MTC,GC' ? 'checked' : '' }}
                                            {{ $claimCategory->claim_type == 'GC,MTC' ? 'checked' : '' }} value="MTC" class="form-check-input" name="claim_type[]" id="" />
                                        <label>GC- General Claim</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row p-2">
                                <label for="claimtype" class="col-sm-3 col-form-label">Add Dropdown</label>
                                <div class="col-sm-6">
                                    <div class="row-sm-6 p-1">
                                        <input type="checkbox" class="form-check-input" name="" id="adddropdownu" /> <label></label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="labelu" style="display:{{ $claimCategory->claim_catagory ? 'block' : 'none' }}">
                                <div class="form-group row p-2">
                                    <label for="description" class="col-sm-3 col-form-label">Labelling Name</label>
                                    <div class="col">
                                        <textarea class="form-control" name="desc" id="descriptionn" rows="3" placeholder="Input Labelling Name">{{ $claimCategory->desc }}</textarea>
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
                                        @if ($claimCategory->categoryContent)
                                            @foreach ($claimCategory->categoryContent as $content)
                                                <tr>
                                                    <td>
                                                        <button type='button' class='btn btn-outline-danger' id='contentDeleteButton' data-id="{{ $content->id }}" size='1' height='1'><i
                                                                class='fa fa-trash'></i></button>
                                                    </td>
                                                    <td>{{ $content->content }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
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
                                <button class="btn btn-light" id="updateButton" type="submit" style="color: black">
                                    <i class="fa fa-save"></i>
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
