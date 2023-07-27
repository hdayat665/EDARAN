<div class="tab-pane fade active show" id="tab1">
    <h3 class="mt-10px"></i>Project Information</h3>
    <div class="panel-body">
        <form id="editProjectInfoForm">
            <div class="row">
                <label class="form-label col-form-label col-md-4">Customer Name*</label>
                <label class="form-label col-form-label col-md-4">Project Code*</label>
                <label class="form-label col-form-label col-md-4">Project Name*</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <select class="form-select" name="customer_id">
                        <option label="PLEASE CHOOSE"></option>
                        <?php $customers = getCustomer(); ?>
                        <?php $sortedCustomers = $customers->sortBy('customer_name'); ?>
                        @foreach ($sortedCustomers as $customer)
                            <option value="{{ $customer->id }}" {{ $project->customer_id == $customer->id ? 'selected="selected"' : '' }}>
                                {{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="hidden" id="idP" value="{{ $project->id }}">
                    <input type="text" class="form-control mb-5px" name="project_code" placeholder="PROJECT CODE" value="{{ $project->project_code ?? '' }}" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-5px " style="text-transform: uppercase;" placeholder="PROJECT NAME" name="project_name" value="{{ $project->project_name ?? '' }}" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-1">Description</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-12">
                    <textarea type="text" class="form-control " rows="5" placeholder="DESCRIPTION" style="text-transform: uppercase;" name="desc" maxlength="225">{{ $project->desc ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label col-form-label col-md-4">Contract Value*</label>
                </div>
                <div class="col-md-4">
                    <label class="form-label col-form-label col-md-4">Contract Type</label>
                </div>
                <div class="col-md-4">
                    <label class="form-label col-form-label col-md-4">Financial Year*</label>
                </div>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <input type="number" step="0.01" class="form-control mb-5px" name="contract_value" placeholder="CONTRACT VALUE" value="{{ $project->contract_value ?? '' }}"
                        onchange="this.value=parseFloat(this.value).toFixed(2);" />
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="contract_type">
                        <option label="PLEASE CHOOSE"></option>
                        <?php $ContractType = getContractType(); ?>
                        @foreach ($ContractType as $key => $value)
                            <option value="{{ $key }}" {{ $key == $project->contract_type ? 'selected="selected"' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="financial_year">
                        <option label="PLEASE CHOOSE"></option>
                        <?php $financialYears = getFinancialYearFormold(); ?>
                        @foreach ($financialYears as $financialYear)
                            <?php
                            // Calculate the starting and ending years of the financial year
                            $startingYear = $financialYear;
                            $endingYear = $financialYear + 1;
                            ?>
                            <option value="{{ $financialYear }}" {{ $financialYear == $project->financial_year ? 'selected="selected"' : '' }}>
                                {{ $startingYear }}
                            </option>
                        @endforeach
                    </select>


                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-4">LOA Date*</label>
                <label class="form-label col-form-label col-md-4">Contract Start Date*</label>
                <label class="form-label col-form-label col-md-4">Contract End Date*</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="LOA_date" value="{{ $project->LOA_date ?? '' }}" id="datepicker-loa" placeholder="YYYY/MM/DD" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="contract_start_date" value="{{ $project->contract_start_date ?? '' }}" id="datepicker-start" placeholder="YYYY/MM/DD" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="contract_end_date" value="{{ $project->contract_end_date ?? '' }}" id="datepicker-end" placeholder="YYYY/MM/DD" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Account Manager*</label>
                <label class="form-label col-form-label col-md-4">Project Manager*</label>
                <label class="form-label col-form-label col-md-4">Warranty Start Date</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <select class="form-select" name="acc_manager" id="acc_manager2">
                        <?php $Employees = getEmployee(); ?>
                        <?php $sortedEmployees = $Employees->sortBy('employeeName'); ?>
                        @foreach ($sortedEmployees as $Employee)
                            <option value="{{ $Employee->id }}" {{ $project->acc_manager == $Employee->id ? 'selected="selected"' : '' }}>
                                {{ $Employee->employeeName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="project_manager" id="project_manager2" style="pointer-events: none; background: #e9ecef">
                        <?php $Employees = getEmployee(); ?>
                        @foreach ($Employees as $Employee)
                            <option value="{{ $Employee->id }}" {{ $project->project_manager == $Employee->id ? 'selected="selected"' : '' }}>
                                {{ $Employee->employeeName }}
                            </option>
                        @endforeach
                    </select>
                    <select class="form-select" name="project_manager" id="project_manager2_show" style="display:none" disabled></select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="datepicker-warstart" name="warranty_start_date" value="{{ $project->warranty_start_date ?? '' }}" placeholder="YYYY/MM/DD" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Warranty End Date</label>
                <label class="form-label col-form-label col-md-4">Bank Guarantee Amount</label>
                <label class="form-label col-form-label col-md-4">Bank Guarantee Expiry Date</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="datepicker-warend" name="warranty_end_date" value="{{ $project->warranty_end_date ?? '' }}" placeholder="YYYY/MM/DD" />
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="bank_guarantee_amount" value="{{ $project->bank_guarantee_amount ?? '' }}" onchange="this.value=parseFloat(this.value).toFixed(2);" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="bank_guarantee_expiry_date" value="{{ $project->bank_guarantee_expiry_date ?? '' }}" id="datepicker-bankexpiry"
                        placeholder="YYYY/MM/DD" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Status*</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <select class="form-select" name="status">
                        <option label="PLEASE CHOOSE"></option>
                        <?php $status = getStatusProject(); ?>
                        @foreach ($status as $key => $value)
                            <option value="{{ $key }}" {{ $key == $project->status ? 'selected="selected"' : '' }}>{{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <p class="text-end mb-0">
                    <a class="btn btn-white" href="{{ url('projectInfo') }}">Back</a>
                    <button type="submit" class="btn btn-primary" id="updateProjectInfoButton">Update</button>

                    <a class="btn btn-white me-5px btnNext">Next</a>
                </p>
            </div>
        </form>
    </div>
</div>
