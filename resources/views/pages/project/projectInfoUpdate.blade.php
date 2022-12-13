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
                        <option label="Please Choose "></option>
                        <?php $customers = getCustomer(); ?>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $project->customer_id == $customer->id ? 'selected="selected"' : '' }}">
                                {{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="hidden" id="idP" value="{{ $project->id }}">
                    <input type="text" class="form-control mb-5px" name="project_code"
                        value="{{ $project->project_code ?? '' }}" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control mb-5px " style="text-transform: uppercase;"
                        name="project_name" value="{{ $project->project_name ?? '' }}" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-1">Description</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-12">
                    <textarea type="text" class="form-control " rows="5" style="text-transform: uppercase;"name="desc">{{ $project->desc ?? '' }}</textarea>
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
                    <input type="number" class="form-control mb-5px" name="contract_value"
                        value="{{ $project->contract_value ?? '' }}" />
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="contract_type">
                        <option label="Please Choose "></option>
                        <?php $ContractType = getContractType(); ?>
                        @foreach ($ContractType as $key => $value)
                            <option value="{{ $key }}"
                                {{ $key == $project->contract_type ? 'selected="selected"' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="financial_year">
                        <option label="Please Choose "></option>
                        <?php $FinancialYear = getFinancialYearForm(); ?>
                        @foreach ($FinancialYear as $key => $value)
                            <option value="{{ $key }}"
                                {{ $key == $project->financial_year ? 'selected="selected"' : '' }}>
                                {{ $value }}</option>
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
                    <input type="text" class="form-control" name="LOA_date" value="{{ $project->LOA_date ?? '' }}"
                        id="datepicker-loa" placeholder="dd/mm/yyyy" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="contract_start_date"
                        value="{{ $project->contract_start_date ?? '' }}" id="datepicker-start"
                        placeholder="dd/mm/yyyy" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="contract_end_date"
                        value="{{ $project->contract_end_date ?? '' }}" id="datepicker-end" placeholder="dd/mm/yyyy" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Account Manager*</label>
                <label class="form-label col-form-label col-md-4">Project Manager*</label>
                <label class="form-label col-form-label col-md-4">Warranty Start Date</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <select class="form-select" name="acc_manager">
                        <option value="" label="Please Choose "></option>
                        <?php $Employees = getEmployee(); ?>
                        @foreach ($Employees as $Employee)
                            <option value="{{ $Employee->id }}"
                                {{ $project->acc_manager == $Employee->id ? 'selected="selected"' : '' }}">
                                {{ $Employee->employeeName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="project_manager">
                        <option value="" label="Please Choose "></option>
                        <?php $Employees = getEmployee(); ?>
                        @foreach ($Employees as $Employee)
                            <option value="{{ $Employee->id }}"
                                {{ $project->project_manager == $Employee->id ? 'selected="selected"' : '' }}">
                                {{ $Employee->employeeName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="datepicker-warstart" name="warranty_start_date"
                        value="{{ $project->warranty_start_date ?? '' }}" placeholder="dd/mm/yyyy" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Warranty End Date</label>
                <label class="form-label col-form-label col-md-4">Bank Guarantee Amount</label>
                <label class="form-label col-form-label col-md-4">Bank Guarantee Expiry Date</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="datepicker-warend" name="warranty_end_date"
                        value="{{ $project->warranty_end_date ?? '' }}" placeholder="dd/mm/yyyy" />
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="bank_guarantee_amount"
                        value="{{ $project->bank_guarantee_amount ?? '' }}" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="bank_guarantee_expiry_date"
                        value="{{ $project->bank_guarantee_expiry_date ?? '' }}" id="datepicker-bankexpiry"
                        placeholder="dd/mm/yyyy" />
                </div>
            </div>
            <div class="row">
                <label class="form-label col-form-label col-md-4">Status</label>
            </div>
            <div class="row mb-15px">
                <div class="col-md-4">
                    <select class="form-select" name="status">
                        <option label="Please Choose"></option>
                        <?php $status = getStatusProject(); ?>
                        @foreach ($status as $key => $value)
                            <option value="{{ $key }}"
                                {{ $key == $project->status ? 'selected="selected"' : '' }}>{{ $value }}
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
