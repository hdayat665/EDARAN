@extends('layouts.dashboardTenant')
@section('content')

<div id="content" class="app-content">
    <h1 class="page-header" id="projectLocationJs">Project <small>| Project Location</small></h1>
    <div class="panel panel">
        <div class="panel-body">
        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="newProjectLocBtn" class="btn btn-primary"><i class="fa fa-plus"></i> New Location</a>
            </div>
            <h4 class="panel-title"></h4>
        </div>
        <table id="projectLoc" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Location Name</th>
                        <th class="text-nowrap">Address</th>
                        <th class="text-nowrap">Location</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">1</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input statusCheck" data-id="" type="checkbox" role="switch" id=""/>
                                    
                                <label class="form-check-label" for=""></label>
                            </div>
                        </td>
                        <td>Location A</td>
                        <td>Desa Pandan</td>
                        <td><a href="https://www.google.com/maps">https://www.google.com/maps</td>
                        <td>Muni Mazlan</td>
                        <td>2023-05-14</td>
                        <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="javascript:;" data-bs-toggle="modal" id="updateProjectLocBtn" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="" data-id="" class="dropdown-item"> Delete</a>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">2</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input statusCheck" data-id="" type="checkbox" role="switch" id=""/>
                                    
                                <label class="form-check-label" for=""></label>
                            </div>
                        </td>
                        <td>Location B</td>
                        <td>Pasir Puteh</td>
                        <td><a href="https://www.google.com/maps">https://www.google.com/maps</td>
                        <td>Nur Farhana</td>
                        <td>2023-09-13</td>
                        <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="javascript:;" id="updateProjectLocBtn" data-id="" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="" data-id="" class="dropdown-item">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.project.newProjectLoc')
@include('modal.project.updateProjectLoc')
@endsection
