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
	<h1 class="page-header">Reporting <small>| Timesheet | Overtime Report </small></h1>
	
	<!-- END page-header -->
	<!-- BEGIN panel -->
	<div class="panel panel" id="sheetPeriodJs">
		
		<!-- BEGIN panel-heading -->
		<div class="panel-body">
            <div class="row p-2">	
                <div class="col-sm-6">
            
                </div>
            <div>
                <H3 class="form-label">Timesheet Period 
                    <a id="filter" class="btn btn-default btn-icon btn-lg">
                        <i class="fa fa-info"></i>
                    </a>
                </H3>
			</div>
		</div>
        <br>
		<div class="form-control" id="filterform" style="display:none">	
		    <div class="row p-2">	
			    <h4>Filter</h4>
			    <div class="col-sm-2">
                    <label for="emergency-firstname" class="form-label">Monthly : Submission once a month</label>
                    <label for="emergency-firstname" class="form-label">Bi Weekly : Submission once a 2 week</label>
                    <label for="emergency-firstname" class="form-label">Weekly : Submission once a week</label>
			    </div>
			</div>
		</div>

		<!-- END panel-heading -->
		<!-- BEGIN panel-body --><br>
		<div class="form-control">	
		    <div class="panel-body">
		        <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
			            Monthly
		            </label>
		        </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Bi Weekly
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
                    <label class="form-check-label" for="exampleRadios3">
                        Weekly
                    </label>
                </div>
		    </div>
		</div>
        <br>
        <div class="row">
            <div class="col align-self-start">
                <a href="/setting" class="btn btn-light" style="color: black" type="submit" ><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col d-flex justify-content-end">
                <button class="btn btn-light" id="submitButton" type="submit" style="color: black" ><i class="fa fa-save"></i> Submit</button>
            </div>
        </div>
	</div>



@endsection
