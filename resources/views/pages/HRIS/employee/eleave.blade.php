<div class="tab-pane fade" id="v-pills-eleave" role="tabpanel" aria-labelledby="v-pills-eleave-tab">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    EDARAN IT SERVICES SDN. BHD.
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white bg-gray-100">
                                    <h4 class="fw-bold">
                                        eLeave
                                    </h4>
                                    <p class="fw-light">
                                        Approval Hierarchy
                                    </p>
                                    </div>
                                <div class="card-body">
                                    <form id="updateeleavehierarchy">
                                        <div class="row">
                                            <div class="col md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Employee Name </label>
                                                    <input type="text" readonly value="{{$profile->fullName ?? ''}}" class="form-control" >
                                                    <input type="hidden" readonly id="hierarchyid" value="{{$profile->user_id ?? ''}}" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Recommender </label>
                                                    <select class="form-select" name="eleaverecommender" id="eleaverecommender">

                                                        <?php $employees = getEmployeerecommender(); ?>
                                                        <option value="">Please Choose</option>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ $employee->user_id }}" label="{{ $employee->employeeName }}"
                                                            {{ $employment->eleaverecommender == $employee->user_id ? "selected='selected'" : '' }}>

                                                            {{ $employee->employeeName }}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col md-6">
                                                <div class="mb-3">
                                                    <label for="holiday_title" class="form-label">Approver* </label>
                                                    <select class="form-select" name="eleaveapprover" id="eleaveapprover">
                                                        <option value="">Please Choose</option>
                                                        <?php $employees = getEmployeeapprover(); ?>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ $employee->user_id }}" label="{{ $employee->employeeName }}"
                                                            {{ $employment->eleaveapprover == $employee->user_id ? "selected='selected'" : '' }}>
                                                            {{ $employee->employeeName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="eleavehierarchy">Update</button>
                                            </form>
                                        </div>
                                    <br>
                                    <!-- <div class="row p-2">
                                        <div class="col-md-4">
                                            <p class="form-label">User Roles :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row p-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                      Recommender
                                                    </label>
                                                  </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="" >
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                      Approver
                                                    </label>
                                                  </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="" >
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                      HR Administrator
                                                    </label>
                                                  </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    {{-- <button type="button" class="btn btn-primary float-end mt-3">
                                        Save
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-gray-100">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="fw-bold">
                                                 History
                                            </h4>

                                        </div>
                                        <div class="col">
                                            <button class="btn btn-white float-end" data-bs-toggle="dropdown">
                                                Filter content
                                                <i class="fa fa-filter text-dark"></i>
                                            </button>
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
                                            @if ($jobHistorys)
                                                @foreach ($jobHistorys as $jobHistory)
                                                    <li class="timeline-item mb-5 ">
                                                        <span class="timeline-icon">
                                                            <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                                        </span>

                                                        <div class="card p-3 bg-white">
                                                            <p class="fw-bold">{{ $jobHistory->employmentDetail ?? '' }}</p>
                                                            <p class="text-muted mb-2 fw-bold">{{ $jobHistory->effectiveDate ?? '' }}</p>
                                                            <p class="text-muted">
                                                                Effective Date: {{ $jobHistory->effectiveDate ?? '' }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- <button type="button" class="btn btn-primary float-end mt-3 col-md-2">
                            Save
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                EDARAN BERHAD
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white bg-gray-100">
                                <h4 class="fw-bold">
                                    eLeave
                                </h4>
                                <p class="fw-light">
                                    Approval Hierarchy
                                </p>
                                </div>
                            <div class="card-body">
                                <div class="row p-2">
                                    <label for="firstname" class="form-label">Employee Name</label>
                                    <input type="text" id="text" class="form-control" aria-describedby="password">
                                </div>
                                <div class="row p-2">
                                    <label for="firstname" class="form-label">Recommender*</label>
                                    <select class="form-select">
                                        <option value="0" label="PLEASE CHOOSE" selected="selected"></option>
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="firstname" class="form-label">Approver*</label>
                                    <select class="form-select">
                                        <option value="0" label="PLEASE CHOOSE" selected="selected"></option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="cashadvancehierarchy">Update</button>
                                    </form>
                                </div>
                                <br>
                                <!-- <div class="row p-2">
                                    <div class="col-md-4">
                                        <p class="form-label">User Roles :</p>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row p-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  Recommender
                                                </label>
                                              </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  Approver
                                                </label>
                                              </div>
                                        </div>
                                        <div class="row p-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  HR Administrator
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                </div> -->
                                {{-- <button type="button" class="btn btn-primary float-end mt-3">
                                    Save
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-gray-100">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-bold">
                                             History
                                        </h4>

                                    </div>
                                    <div class="col">
                                        <button class="btn btn-white float-end" data-bs-toggle="dropdown">
                                            Filter content
                                            <i class="fa fa-filter text-dark"></i>
                                        </button>
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
                                        @if ($jobHistorys)
                                            @foreach ($jobHistorys as $jobHistory)
                                                <li class="timeline-item mb-5 ">
                                                    <span class="timeline-icon">
                                                        <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                                    </span>

                                                    <div class="card p-3 bg-white">
                                                        <p class="fw-bold">{{ $jobHistory->employmentDetail ?? '' }}</p>
                                                        <p class="text-muted mb-2 fw-bold">{{ $jobHistory->effectiveDate ?? '' }}</p>
                                                        <p class="text-muted">
                                                            Effective Date: {{ $jobHistory->effectiveDate ?? '' }}
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
                    <!-- <button type="button" class="btn btn-primary float-end mt-3 col-md-2">
                        Save
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</div>

{{--
    <div class="card">
        <div class="card-header bg-white bg-gray-100">
            <h4 class="fw-bold">
                eLeave
            </h4>
            <p class="fw-light">
                Approval Hierarchy
            </p>
         </div>
        <div class="card-body">
            <div class="row p-2">
                <label for="firstname" class="form-label">Employee Name</label>
                <input type="text" id="text" class="form-control" aria-describedby="password">
            </div>
            <div class="row p-2">
                <label for="firstname" class="form-label">Recommender*</label>
                <select class="form-select">
                    <option value="0" label="PLEASE CHOOSE" selected="selected"></option>
                </select>
            </div>
            <div class="row p-2">
                <label for="firstname" class="form-label">Approver*</label>
                <select class="form-select">
                    <option value="0" label="PLEASE CHOOSE" selected="selected"></option>
                </select>
            </div>
            <button type="button" class="btn btn-primary float-end mt-3">
                Save
            </button>
        </div>
    </div>
</div> --}}
