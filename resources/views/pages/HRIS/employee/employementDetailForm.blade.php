<div class="tab-pane fade" id="default-tab-3">
    <h3 class="mt-10px" id="editHRISJs"></i> Employment Details</h3>	<br>
    <form id="employmentForm">
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Company*</label>
            <div class="col-md-5">
                <select class="form-select" name="company"  id="companyForEmployment">
                <?php $companys = getCompany(); ?>
                <option label="PLEASE CHOOSE" selected="selected"> </option>
                @if ($companys)

                @foreach ($companys as $company)
                    <option value="{{$company->id }}">{{$company->companyName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>

            <label class="form-label col-form-label col-md-1">Department*</label>
            <div class="col-md-5">
                

                <select class="form-select" name="departmentId"  id="departmentShow">
                    
                <option label="PLEASE CHOOSE" selected="selected"> </option>
               
                </select>
            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Unit*</label>
            <div class="col-md-5">
                

                <select class="form-select" name="unitId"  id="unitShow">
                    
                <option label="PLEASE CHOOSE" selected="selected"> </option>
                
                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Branch*</label>
            <div class="col-md-5">
                

                <select class="form-select" name="branchId"  id="branchShow">
                   
                <option label="PLEASE CHOOSE" selected="selected"> </option>
                
                </select>

            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Job Grade*</label>
            <div class="col-md-5">
                <select class="form-select" name="jobGrade" >
                    <?php $jobGrades = getJobGrade(); ?>
                    <option label="PLEASE CHOOSE" selected="selected"> </option>
                    @if ($jobGrades)

                    @foreach ($jobGrades as $jobGrade)
                        <option value="{{$jobGrade->id }}">{{$jobGrade->jobGradeName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Designation*</label>
            <div class="col-md-5">
                <select class="form-select" name="designation" >
                    <?php $designations = getDesignation(); ?>
                    <option label="PLEASE CHOOSE" selected="selected"> </option>
                    @if ($designations)

                    @foreach ($designations as $designation)
                        <option value="{{$designation->id }}">{{$designation->designationName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Employment Type*</label>
            <div class="col-md-5">
                <select class="form-select" name="employmentType" >
                    <?php $employmentTypes = getEmploymentType(); ?>
                    <option label="PLEASE CHOOSE" selected="selected"> </option>
                    @if ($employmentTypes)

                    @foreach ($employmentTypes as $employmentType)
                        <option value="{{$employmentType->id }}">{{$employmentType->type}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Report To</label>
            <div class="col-md-5">
                <select class="form-select" name="report_to" >

                    <?php $employees = getEmployee(); ?>
                    <option value="" label="PLEASE CHOOSE"" selected="selected"> </option>
                    @if ($employees)

                    @foreach ($employees as $employee)
                        <option value="{{$employee->id }}">{{$employee->employeeName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
        </div>

        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Working Email*</label>
            <div class="col-md-5">
                <input type="email" name="workingEmail" class="form-control mb-10px" placeholder="Email" required />

            </div>

            <label class="form-label col-form-label col-md-1">Joined Date*</label>
            <div class="col-md-5">
                <input type="text" name="joinedDate" class="form-control" id="datepicker-joindate" style="text-transform:uppercase" required />
                <input type="hidden" name="user_id" id="user_id1" class="form-control mb-10px" />
                <input type="hidden" name="employeeId" id="employeeId" class="form-control mb-10px" />
                <input type="hidden" name="employeeName" id="employeeName" class="form-control mb-10px" />
                <input type="hidden" name="employeeEmail" id="employeeEmail" class="form-control mb-10px" />
            </div>

        </div>

    <p class="text-end mb-0">
        <!-- <a href="javascript:;" id="prev_emp_det" class="btn btn-white me-5px">Previous</a> -->
        {{-- <a href="javascript:;" class="btn btn-primary">Save</a> --}}
        <button id="submitEmployment" class="btn btn-primary">Submit</button>
    </p>
    </form>
</div>
