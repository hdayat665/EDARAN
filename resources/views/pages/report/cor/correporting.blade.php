@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">

    {{-- <h1 class="page-header" id="eclaimReportJs">Report | Claim Report </h1> --}}
    <h1 class="page-header" id="reportcorJs">Reporting <small>| Charge Out Rate</small></h1>
    <div class="panel panel">
       <div class="panel-body">
           <div class="row p-2">
            <form action="/searchcor" onsubmit="return validateForm()" method="POST">
               <div class="mb-3 row">
                   <label for="staticEmail" class="col-sm-2 col-form-label">Date</label>
                   <div class="col-sm-3">
                        <input type="text" class="form-control" id="datepickercor" name="date_range" value="">
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="inputPassword" class="col-sm-2 col-form-label">By</label>
                   <div class="col-sm-3">
                       <select class="form-select" id="staffn" name="selectAS">
                           <option class="form-label" value="1" selected>ALL</option>
                           <option class="form-label" value="2" >STAFF</option>
                       </select>
                   </div>
               </div>
               <div class="mb-3 row" id="staffname" style="display: none">
                   <label for="inputPassword" class="col-sm-2 col-form-label">Staff Name</label>
                   <div class="col-sm-3">
                       <select class="form-select" id="employeeid" name="user_id">
                        <option class="form-label" value="" >PLEASE CHOOSE</option>
                        <?php $employees = getEmployee() ?>
                        @foreach ($employees->sortBy('employeeName') as $employee)
                        <option value="{{$employee->user_id}}">{{$employee->employeeName}}</option>
                        @endforeach
                    </select>
                   </div>
               </div>
           </div>

           <div class="row p-2">
            <div class="col-md-7">
                <label class="form-label col-form-label col-md-4"></label>
            </div>
            <div class="row-p-2">
                <a href="/reportingchargeoutratet"><button class="btn btn-primary" type="submit"> Submit</button></a>
            </div>
            </div>
        </form>
       </div>










            </div>
            </div>
        </form>
        </div>

        <script>
            $("#datepickercor").datepicker({
           todayHighlight: true,
           autoclose: true,
           format: 'dd/mm/yyyy',
         });
        </script>

        <script>
           $(document).on('change', "#staffn", function() {
               if ($(this).val() == "2")  {
                   $("#staffname").show();




               }
               else {
                   $("#staffname").hide();

               }
           });
        </script>
@endsection


