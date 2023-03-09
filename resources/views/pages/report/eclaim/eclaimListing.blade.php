@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
			
            <h1 class="page-header" id="eclaimReportJs">Report | Claim Report </h1>
            
            <!-- END page-header -->
            <!-- BEGIN panel -->
            <div class="panel panel">
                <div class="panel-heading">
                 <h4>Claim Report</h4>
                </div>
               
                <h4 class="panel-titel"></h4>
            <!-- END panel -->
            <!-- BEGIN panel-body -->
            <form action="/eclaim/searchAllReport" method="POST">
            <div class="panel-body">  
                <div class="row p-2">
                    <div class="col-md-4"> 
                        <label class="form-label col-form-label col-md-4">Select Date: </label>
                    </div>
        
                    <div class="col-md-4"> 
                        <div class="input-group" id="default-date">
                            <input type="text" name="default-date" class="form-control" value="" id="datepicker-autoClose" />
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>  
                </div>
        
                <div class="row p-2">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select By: </label>
                    </div>
        
                    <div class="col-md-4"> 
                        <select class="form-select" id="selectby" name="category">
                            <option value="" label="ALL" selected="selected"></option>
                            <option value="1" label="PROJECT">PROJECT</option>
                            <option value="2" label="DEPARTMENT">DEPARTMENT</option>
                            <option value="3" label="EMPLOYEE NAME">EMPLOYEE NAME</option>
                            <option value="4" label="PREFERENCE NUMBER">PREFERENCE NUMBER</option>
                        </select>
                    </div>
                </div>
                <div class="row p-2" id="hideProject">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select Project: </label>
                    </div>
        
                    <div class="col-md-4"> 
                        <select class="form-select" name="project">
                            <option class="form-label" value="">Please Select</option>
                            <?php $projects = project() ?>
                            @foreach ($projects as $project)
                            <option value= {{$project->id}}>{{$project->project_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="row p-2" id="hideDepart">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select Department: </label>
                    </div>
        
                    <div class="col-md-4"> 
                        <select class="form-select" name="department">
                            <option class="form-label" value="">Please Select</option>
                            <?php $departments = getDepartment() ?>
                            @foreach ($departments as $department)
                            <option value="{{$department->id}}">{{$department->departmentName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="row p-2" id="hideEmpName">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select Employee Name: </label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="user_id">
                            <option class="form-label" value="" >Please Select</option>
                            <?php $employees = getEmployee() ?>
                            @foreach ($employees as $employee)
                            <option value="{{$employee->user_id}}">{{$employee->employeeName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="row p-2" id="hideRefNum">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select Reference Number: </label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="reference">
                            <option class="form-label" value="">Please Select</option>
                            <?php $getChequekNos = getChequekNo() ?>
                            @foreach ($getChequekNos as $getChequekNo)
                                @if ($getChequekNo->cheque_number)
                                    <option value="{{$getChequekNo->cheque_number}}">{{$getChequekNo->cheque_number}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                
                </div>
        
                <div class="row p-2">
                    <div class="col-md-7">
                        <label class="form-label col-form-label col-md-4"></label>
                    </div>
                    {{-- <div class="col-md-4"> 
                        <a type="button" href="/eclaim/searchAllReport" class="btn btn-primary">Submit</a>
                    </div> --}}
                    <button type="submit" class="btn btn-primary mt-3">
                        Submit
                    </button>
                </div>
                
            </div>
        </form>
        </div>


@endsection
