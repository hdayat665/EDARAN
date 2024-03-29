<div class="tab-pane fade" id="v-pills-employment" role="tabpanel" aria-labelledby="v-pills-employment-tab">
    <div class="row">
        <div class="col-sm-6">
            <div class="card" id="employmentJs">
                <div class="card-header bg-white bg-gray-100">
                    <h4 class="fw-bold">
                        Employment Information
                    </h4>
                    {{-- <p class="fw-light">
                        Update your employment information
                    </p> --}}
                </div>

                <div class="card-body">
                    {{-- <div class="row p-2">
                        <label for="firstname" class="form-label">Role*</label>
                        <select class="form-select" name="Role" disabled>
                            <option value="" label="PLEASE CHOOSE"></option>
                            <?php $roles = getAllRole(); ?>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ Auth::user()->role_id == $role->id ? 'selected="selected"' : '' }}
                                    label="{{ $role->roleName }}"></option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Company*</label>
                        <select class="form-select" name="company" aria-label="Disabled select example" disabled>
                            <option value="0" label="PLEASE CHOOSE"></option>
                            <?php $companys = getCompany(); ?>
                            @foreach ($companys as $company)
                                <option value="{{ $company->id }}"
                                    {{ $employment->company == $company->id ? 'selected="selected"' : '' }}
                                    label="{{ $company->companyName }}"></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Department*</label>
                        <select class="form-select" name="department" aria-label="Disabled select example" disabled>>
                            <?php $Departments = getDepartment(); ?>
                            <option value="0" label="PLEASE CHOOSE"></option>
                            @foreach ($Departments as $Department)
                                <option value="{{ $Department->id ?? null }}"
                                    {{ $employment->department == $Department->id ? 'selected="selected"' : '' }}
                                    label="{{ $Department->departmentName }}"></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Unit</label>
                        <select class="form-select" name="unit" aria-label="Disabled select example" disabled>>
                            <?php $Units = getUnit('', $employment->department); ?>
                            <option value="0" label="PLEASE CHOOSE"></option>
                            @foreach ($Units as $Unit)
                                <option value="{{ $Unit->id }}"
                                    {{ $employment->unit == $Unit->id ? 'selected="selected"' : '' }}
                                    label="{{ $Unit->unitName }}">{{ $Unit->unitName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Branch*</label>
                        <select class="form-select" name="branch" aria-label="Disabled select example" disabled>>
                            <?php $Branchs = getBranch('', $employment->company); ?>
                            <option value="0" label="PLEASE CHOOSE"></option>
                            @foreach ($Branchs as $Branch)
                                <option value="{{ $Branch->id }}"
                                    {{ $employment->branch == $Branch->id ? 'selected="selected"' : '' }}
                                    label="{{ $Branch->branchName }}">{{ $Branch->branchName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Joined Date*</label>
                        <input type="text" name="joinedDate" value="{{ $employment->joinedDate ?? '' }}" id="datepicker-joindate" placeholder="YYYY-MM-DD"
                            class="form-control" aria-describedby="address-2" disabled>
                    </div>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Job Grade*</label>
                        <select class="form-select" name="jobGrade" aria-label="Disabled select example" disabled>>
                            <?php $JobGrades = getJobGrade(); ?>
                            <option value="0" label="PLEASE CHOOSE"></option>
                            @foreach ($JobGrades as $JobGrade)
                                <option value="{{ $JobGrade->id }}"
                                    {{ $employment->jobGrade == $JobGrade->id ? 'selected="selected"' : '' }}
                                    label="{{ $JobGrade->jobGradeName }}"></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Designation*</label>
                        <select class="form-select" name="designation" aria-label="Disabled select example" disabled>>
                            <?php $Designations = getDesignation(); ?>
                            <option value="0" label="PLEASE CHOOSE"></option>
                            @foreach ($Designations as $Designation)
                                <option value="{{ $Designation->id }}"
                                    {{ $employment->designation == $Designation->id ? 'selected="selected"' : '' }}
                                    label="{{ $Designation->designationName }}"></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row p-2">
                        <label for="firstname" class="form-label">Employment Type*</label>
                        <select class="form-select" name="employmentType" aria-label="Disabled select example"
                            disabled>>
                            <?php $EmploymentTypes = getEmploymentType(); ?>
                            <option value="0" label="PLEASE CHOOSE"></option>
                            @foreach ($EmploymentTypes as $EmploymentType)
                                <option value="{{ $EmploymentType->id ?? null }}"
                                    label="{{ $EmploymentType->type ?? null }}"
                                    {{ $employment->employmentType == $EmploymentType->id ? "selected='selected'" : '' }}>
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="employee-id" class="form-label">Charge Out Rate</label>
                            <input type="number" id="" name="COR"
                                value="{{ $employment->COR ?? '' }}" class="form-control"
                                aria-describedby="employee-id" disabled>
                        </div>
                    </div>
                    <!-- <div class="row p-2">
                        <label class="form-label" for="supervisor">
                              User Role
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" {{ $employment->supervisor == 'on' ? "checked='checked'" : '' }} name="supervisor" type="checkbox" id="supervisor">
                            <label class="form-check-label" for="supervisor">
                                  Supervisor
                            </label>
                        </div>
                        <div class="form-text">
                            If enabled, report-to will enabled the usernameasddasd
                        </div>
                    </div> -->
                    <hr>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="employee-id" class="form-label">Employee ID</label>
                            <input type="text" id="employee-id" name="employeeId"
                                value="{{ $employment->employeeId ?? '' }}" class="form-control"
                                aria-describedby="employee-id" disabled>
                            <input type="hidden" value="{{ $employment->user_id ?? '' }}" name="user_id">
                        </div>
                        <div class="col-sm-6">
                            <label for="employee-name" class="form-label">Employee Name</label>
                            <input type="text" id="employee-name" name="employeeName" class="form-control"
                                value="{{ $employment->employeeName ?? '' }}" aria-describedby="employee-name"
                                disabled>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="employee-email" class="form-label">Employee Email</label>
                            <input type="text" id="employee-email" name="employeeEmail" class="form-control"
                                value="{{ $employment->workingEmail ?? '' }}" aria-describedby="employee-email"
                                disabled>
                        </div>
                    </div>
                    <hr>
                    {{-- <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#update-employment"">
                        Update
                    </button> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header bg-gray-100">
                    <div class="row">
                        <div class="col">
                            <h4 class="fw-bold">
                                Job History
                            </h4>
                            {{-- <p class="fw-light">
                                Update your history information
                            </p> --}}
                        </div>
                        <div class="col">
                            {{-- <button class="btn btn-white float-end" data-bs-toggle="dropdown">
                                Filter content
                                <i class="fa fa-filter text-dark"></i>
                            </button> --}}
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Company</a>
                                <a href="#" class="dropdown-item">Department</a>
                                <a href="#" class="dropdown-item">Unit</a>
                                <a href="#" class="dropdown-item">Branch</a>
                                <a href="#" class="dropdown-item">Job Grade</a>
                                <a href="#" class="dropdown-item">Designation</a>
                                <a href="#" class="dropdown-item">Employment Type</a>
                                <a href="#" class="dropdown-item">Supervisor</a>
                                <a href="#" class="dropdown-item">Clear Filter</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <ul class="timeline-with-icons">
                            <?php $latestJobHistory = $jobHistorys->last(); ?>
                            <?php $firstJobHistory = $jobHistorys->first(); ?>
                            <?php $secondLastJobHistory = $jobHistorys->skip($jobHistorys->count() - 2)->first(); ?>

                            <?php $showRole = getAllRoleTEST();?>
                            <?php $showCompany = getCompanyforJobHistory();?>
                            <?php $showDepartment = getDepartmentforJobHistory();?>
                            <?php $showUnit = getUnitforJobHistory();?>
                            <?php $showBranch = getBranchforJobHistory();?>
                            <?php $showJobGrade = getJobGradeforJobHistory();?>
                            <?php $showDesignation = getDesignationforJobHistory();?>
                            <?php $showEmploymentType = getEmploymentTypeforJobHistory();?>

                            @if ($jobHistorys)
                                @foreach ($jobHistorys->reverse() as $jobHistory)
                                    <li class="timeline-item mb-5 ">
                                        <span class="timeline-icon">
                                            <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                        </span>

                                        <div class="card p-3 bg-white">

                                            @if ($jobHistory->roleHistory)
                                            <p class="fw-bold">
                                                Role has changed to {{ $showRole[$jobHistory->roleHistory] }}.
                                            </p>
                                            @endif                                                        

                                            @if ($jobHistory->companyHistory)
                                            <p class="fw-bold">
                                                Company has changed to {{ $showCompany[$jobHistory->companyHistory] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->departmentHistory)
                                            <p class="fw-bold">
                                                Department has changed to {{ $showDepartment[$jobHistory->departmentHistory] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->unitHistory)
                                            <p class="fw-bold">
                                                Unit has changed to {{ $showUnit[$jobHistory->unitHistory] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->branchHistory)
                                            <p class="fw-bold">
                                                Branch has changed to {{ $showBranch[$jobHistory->branchHistory] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->jobGradeHistory)
                                            <p class="fw-bold">
                                                Job Grade has changed to {{ $showJobGrade[$jobHistory->jobGradeHistory] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->designationHistory)
                                            <p class="fw-bold">
                                                Designation has changed to {{ $showDesignation[$jobHistory->designationHistory] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->employmentTypeHistory)
                                            <p class="fw-bold">
                                                Employment Type has changed to {{ $showEmploymentType[$jobHistory->employmentTypeHistory] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->CORHistory)
                                            <p class="fw-bold">
                                                Charge Out Rate has changed to {{ $jobHistory->CORHistory }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->event)
                                            <p class="fw-bold">
                                                Event has set to {{ getEvent()[$jobHistory->event] }}.
                                            </p>
                                            @endif

                                            @if ($jobHistory->effectiveDate && $jobHistory->effectiveDate !== '0000-00-00')
                                            <p class="text">
                                                Effective Date: {{ $jobHistory->effectiveDate ?? '' }}
                                            </p>
                                            @endif

                                            <p class="text-muted">
                                                Updated By: {{ $jobHistory->updatedBy ?? '' }}
                                            </p>

                                            <p class="text-muted">
                                                Last Modified: {{ $jobHistory->updated_at ?? '' }}
                                            </p>
                                            
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Update Employment-->
        <div class="modal fade" id="update-employment" tabindex="-1" aria-labelledby="update-employment"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update-employment">Employment Details - Confirm Changes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="employee-id" class="form-label">Employee ID</label>
                                <input type="text" id="employee-id" name="employeeID" class="form-control"
                                    aria-describedby="employee-id">
                            </div>
                            <div class="col-sm-6">
                                <label for="employee-name" class="form-label">Employee Name</label>
                                <input type="text" id="employee-name" name="employeeName" class="form-control"
                                    aria-describedby="employee-name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="employee-email" class="form-label">Employee Email</label>
                            <input type="text" id="employee-email" name="employeeEmail" class="form-control"
                                aria-describedby="employee-email">
                        </div>
                        <hr>

                        <p class="mt-3 mb-3 fw-bold">Confirm Changes</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="effective-from" class="form-label">Effective From*</label>
                                <input type="date" id="effective-from" name="effectiveFrom" class="form-control"
                                    aria-describedby="effective-from">
                            </div>
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">Event*</label>
                                <select class="form-select" name="event">
                                    <option value="0" label="PLEASE CHOOSE"></option>
                                    <?php $events = getEvent(); ?>
                                    @foreach ($events as $key => $event)
                                        <option value="{{ $key }}">{{ $event }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <p class="mt-3 mb-3 fw-bold">Changes Details</p>
                        <div class="row">
                            <label for="changes-input" class="form-label">Input</label>
                            <input type="file" id="changes-input" class="form-control"
                                aria-describedby="changes-input">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
