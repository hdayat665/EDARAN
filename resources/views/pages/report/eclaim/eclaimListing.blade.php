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
                        <select class="form-select" id="selectby">
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
                        <select class="form-select">
                            <option value="" label="SELECT PROJECT" selected="selected"></option>
                            <option value="1" label="ORB123-ORBIT">ORB123-ORBIT</option>
                            <option value="2" label="JPP001-JABATAN PERHUBUNGAN  PERUSAHAAN">JPP001-JABATAN PERHUBUNGAN  PERUSAHAAN</option>
                            <option value="3" label="LHDN004-LEMBAGA HASIL DALAM NEGERI">LHDN004-LEMBAGA HASIL DALAM NEGERI/option>
                            <option value="4" label="JPN031-JABATAN PENDAFTARAN NEGARA">JPN031-JABATAN PENDAFTARAN NEGARA</option>
                        </select>
                    </div>
                </div>
        
                <div class="row p-2" id="hideDepart">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select Department: </label>
                    </div>
        
                    <div class="col-md-4"> 
                        <select class="form-select">
                            <option value="" label="SELECT DEPARTMENT" selected="selected" ></option>
                            <option value="1" label="SDD-SERVICE DELIVERY DEPARTMENT"></option>
                            <option value="2" label="BSR-BUSINESS DEVELOPMENT"></option>
                            <option value="3" label="CSR-CUSTOMER SERVICE"></option>
                        </select>
                    </div>
                </div>
        
                <div class="row p-2" id="hideEmpName">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select Employee Name: </label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option value="" label="SELECT EMPLOYEE NAME" selected="selected"></option>
                        </select>
                    </div>
                </div>
        
                <div class="row p-2" id="hideRefNum">
                    <div class="col-md-4">
                        <label class="form-label col-form-label col-md-4">Select Reference Number: </label>
                    </div>
                    <div class="col-md-4">
                        <select class="selectpicker form-control" id="ex-search" multiple>
                            <option type="text" label="Type For Hint" value=""></option>
                        </select>
                    </div>
                
                </div>
        
                <div class="row p-2">
                    <div class="col-md-7">
                        <label class="form-label col-form-label col-md-4"></label>
                    </div>
                    <div class="col-md-4"> 
                        <a type="button" href="/eclaim/searchAllReport" class="btn btn-primary">Submit</a>
                    </div>
                </div>
            </div>
        
        </div>


@endsection
