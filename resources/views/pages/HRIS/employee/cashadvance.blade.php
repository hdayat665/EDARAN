<div class="tab-pane fade" id="v-pills-cashadvance" role="tabpanel" aria-labelledby="v-pills-cashadvance-tab">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cashadvance1" aria-expanded="true" aria-controls="collapseOne">
                    Edaran Berhad
                </button>
            </h2>
            <div id="cashadvance1" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white bg-gray-100">
                                    <h4 class="fw-bold">
                                        Cash Advance
                                    </h4>
                                    <p class="fw-light">
                                        Approval Hierarchy
                                    </p>
                                    </div>
                                    <div class="card-body">
                                            <form id="updatecashhierarchy">
                                                <div class="row ">
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
                                                            <label for="" class="form-label">Approver* </label>
                                                            <select class="form-select" name="caapprover"  id="caapprover" >
                                                                <option></option>
                                                                <?php $employees = getEmployeeapprover(); ?>
                                                               
                                                                @foreach ($employees as $employee)
                                                                    <option value="{{ $employee->user_id }}" label="{{ $employee->employeeName }}"
                                                                    {{ $employment->caapprover == $employee->user_id ? "selected='selected'" : '' }}>
                                                                    {{ $employee->employeeName }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button  type="submit" class="btn btn-primary" id="cahierarchybutton">Update</button>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="col-md-6">
                            {{-- <div class="card">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

