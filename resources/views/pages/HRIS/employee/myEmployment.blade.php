<div class="tab-pane fade" id="default-tab-7">
    <div class="container">
        <h4 class="mt-3 mb-3">Employment information</h4>
        <form id="addEmpForm">
        <div class="row p-2">
            <label for="firstname" class="form-label">Company*</label>
            <select class="form-select" name="company">
                <option value="0" label="Please Choose "></option>
                <?php $companys = getCompany() ?>
                @foreach ($companys as $company)
                <option value="{{$company->id}}" <?php echo ($employment->company == $company->id) ? 'selected="selected"' : '' ?> label="{{$company->companyName}}"></option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{$employment->id}}">
        </div>
        <div class="row p-2">
            <label for="firstname" class="form-label">Department*</label>
            <select class="form-select" name="department">
                <?php $Departments = getDepartment() ?>
                <option value="0" label="Please Choose "></option>
                @foreach ($Departments as $Department)
                <option value="{{$Department->id ?? null}}" <?php echo ($employment->department == $Department->id) ? 'selected="selected"' : '' ?> label="{{$Department->departmentName}}" ></option>
                @endforeach
            </select>
        </div>
        <div class="row p-2">
            <label for="firstname" class="form-label">Unit*</label>
            <select class="form-select" name="unit">
                <?php $Units = getUnit() ?>
                <option value="0" label="Please Choose "></option>
                @foreach ($Units as $Unit)
                <option value="{{$Unit->id}}" <?php echo ($employment->unit == $Unit->id) ? 'selected="selected"' : '' ?> label="{{$Unit->unitName}}" ></option>
                @endforeach
            </select>
        </div>
        <div class="row p-2">
            <label for="firstname" class="form-label">Branch*</label>
            <select class="form-select" name="branch">
                <?php $Branchs = getBranch() ?>
                <option value="0" label="Please Choose "></option>
                @foreach ($Branchs as $Branch)
                <option value="{{$Branch->id}}" <?php echo ($employment->branch == $Branch->id) ? 'selected="selected"' : '' ?> label="{{$Branch->branchName}}" ></option>
                @endforeach
            </select>
        </div>
        <div class="row p-2">
            <label for="firstname" class="form-label">Joined Date*</label>
            <input type="date" name="joinedDate" id="datepicker-joindate" class="form-control" aria-describedby="address-2">
        </div>
        <div class="row p-2">
            <label for="firstname" class="form-label">Job Grade*</label>
            <select class="form-select" name="jobGrade">
                <?php $JobGrades = getJobGrade() ?>
                <option value="0" label="Please Choose "></option>
                @foreach ($JobGrades as $JobGrade)
                <option value="{{$JobGrade->id}}" <?php echo ($employment->jobGrade == $JobGrade->id) ? 'selected="selected"' : '' ?> label="{{$JobGrade->jobGradeName}}" ></option>
                @endforeach
            </select>
        </div>
        <div class="row p-2">
            <label for="firstname" class="form-label">Designation*</label>
            <select class="form-select" name="designation">
                <?php $Designations = getDesignation() ?>
                <option value="0" label="Please Choose "></option>
                @foreach ($Designations as $Designation)
                <option value="{{$Designation->id}}" <?php echo ($employment->designation == $Designation->id) ? 'selected="selected"' : '' ?> label="{{$Designation->designationName}}" ></option>
                @endforeach
            </select>
        </div>
        <div class="row p-2">
            <label for="firstname" class="form-label">Employment Type*</label>
            <select class="form-select" name="employmentType">
                <?php $EmploymentTypes = getEmploymentType() ?>
                <option value="0" label="Please Choose "></option>
                @foreach ($EmploymentTypes as $EmploymentType)
                <option value="{{$EmploymentType->id ?? null}}" label="{{$EmploymentType->employmentTypeName ?? null}}" {{ ($employment->EmploymentType == $EmploymentType->id) ? "selected='selected'" : '' }}></option>
                @endforeach
            </select>
        </div>
        <div class="row p-2">
            <label class="form-label" for="supervisor">
                User Role
            </label>
            <div class="form-check form-switch">
                <input class="form-check-input" name="supervisor" type="checkbox" id="supervisor">
                <label class="form-check-label" for="supervisor">
                    Supervisor
                </label>
            </div>
            <div class="form-text">
                If enabled, report-to will enabled the username
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label for="employee-id" class="form-label">Employee ID</label>
                <input type="text" id="employee-id" name="employeeId" value="{{$employment->employeeId ?? ''}}" class="form-control" aria-describedby="employee-id">
                <input type="hidden" value="{{$employment->user_id ?? ''}}" name="user_id">
            </div>
            <div class="col-sm-6">
                <label for="employee-name" class="form-label">Employee Name</label>
                <input type="text" id="employee-name" name="employeeName" class="form-control" value="{{$employment->employeeName ?? ''}}" aria-describedby="employee-name">
            </div>
        </div>
        <div class="col-sm-6">
            <label for="employee-email" class="form-label">Employee Email</label>
            <input type="text" id="employee-email" name="employeeEmail" class="form-control" value="{{$employment->employeeEmail ?? ''}}" aria-describedby="employee-email">
        </div>
        <hr>

        <p class="mt-3 mb-3 fw-bold">Confirm Changes</p>
        <div class="row">
            <div class="col-sm-6">
                <label for="effective-from" class="form-label">Effective From*</label>
                <input type="date" id="effective-from" name="effectiveFrom" class="form-control" value="{{$employment->effectiveFrom ?? ''}}" aria-describedby="effective-from">
            </div>
            <div class="col-sm-6">
                <label for="firstname" class="form-label">Event*</label>
                <select class="form-select" name="event">
                    <option value="0" label="Please Choose"></option>
                    <?php $events = getEvent(); ?>
                    @foreach ($events as $key => $event)
                    <option value="{{ $key }}" <?= ($employment->event == $key) ? 'selected="selected"' : '' ?>>{{$event}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <p class="mt-3 mb-3 fw-bold">Changes Details</p>
        {{-- <div class="row">
            <label for="changes-input" class="form-label">Input</label>
            <input type="file" id="changes-input" class="form-control" aria-describedby="changes-input">
        </div> --}}
    </form>
    <hr>

        <button type="button" class="btn btn-primary float-end" id="updateEmp" data-bs-toggle="modal">
            Update
        </button>
    </div>
</div>


