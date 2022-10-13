<div class="tab-pane fade" id="default-tab-3">
    <h3 class="mt-10px"></i> Employment Details</h3>	<br>
    <form id="employmentForm">
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Company*</label>
            <div class="col-md-5">
                <select class="form-select" name="company" required>
                <?php $companys = getCompany(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($companys)

                @foreach ($companys as $company)
                    <option value="{{$company->id }}">{{$company->companyName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>

            <label class="form-label col-form-label col-md-1">Department*</label>
            <div class="col-md-5">
                <select class="form-select" name="department" required>
                    <?php $departments = getDepartment(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($departments)

                @foreach ($departments as $department)
                    <option value="{{$department->id }}">{{$department->departmentName}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Unit*</label>
            <div class="col-md-5">
                <select class="form-select" name="unit" required>
                    <?php $units = getUnit(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($units)

                @foreach ($units as $unit)
                    <option value="{{$unit->id }}">{{$unit->unitName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Branch*</label>
            <div class="col-md-5">
                <select class="form-select" name="branch" required>
                    <?php $branchs = getBranch(); ?>
                <option label="Please Choose" selected="selected"> </option>
                @if ($branchs)

                @foreach ($branchs as $branch)
                    <option value="{{$branch->id }}">{{$branch->branchName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Job Grade*</label>
            <div class="col-md-5">
                <select class="form-select" name="jobGrade" required>
                    <?php $jobGrades = getJobGrade(); ?>
                    <option label="Please Choose" selected="selected"> </option>
                    @if ($jobGrades)

                    @foreach ($jobGrades as $jobGrade)
                        <option value="{{$jobGrade->id }}">{{$jobGrade->jobGradeName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Designation*</label>
            <div class="col-md-5">
                <select class="form-select" name="designation" required>
                    <?php $designations = getDesignation(); ?>
                    <option label="Please Choose" selected="selected"> </option>
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
                <select class="form-select" name="employmentType" required>
                    <?php $employmentTypes = getEmploymentType(); ?>
                    <option label="Please Choose" selected="selected"> </option>
                    @if ($employmentTypes)

                    @foreach ($employmentTypes as $employmentType)
                        <option value="{{$employmentType->id }}">{{$employmentType->employmentTypeName}}</option>
                    @endforeach
                    @endif

                </select>

            </div>
            <label class="form-label col-form-label col-md-1">Report To*</label>
            <div class="col-md-5">
                <select class="form-select" name="supervisor" required>

                    <?php $employees = getEmployee(); ?>
                    <option label="Please Choose" selected="selected"> </option>
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
        <a href="javascript:;" class="btn btn-white me-5px">Previous</a>
        {{-- <a href="javascript:;" class="btn btn-primary">Save</a> --}}
        <button id="submitEmployment" class="btn btn-primary">Save</button>
    </p>
    </form>
</div>
