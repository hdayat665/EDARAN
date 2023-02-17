<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1200px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Register | Register Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="row">
                        <label class="form-label col-form-label col-md-4">Customer Name*</label>
                        <label class="form-label col-form-label col-md-4">Project Code*</label>
                        <label class="form-label col-form-label col-md-4">Project Name*</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <select class="form-select" name="customer_id">
                                <option label="PLEASE CHOOSE"></option>
                                <?php $customers = customeractive(); ?>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="project_code" class="form-control mb-5px" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="project_name" class="form-control mb-5px "
                                style="text-transform: uppercase;" />
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label col-form-label col-md-1">Description</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-12">
                            <textarea type="text" class="form-control " rows="5" name="desc" style="text-transform: uppercase;"></textarea>
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
                            <input type="number" name="contract_value" class="form-control mb-5px" />
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" name="contract_type">
                                <option label="PLEASE CHOOSE"></option>
                                <?php $types = getContractType(); ?>
                                @foreach ($types as $key => $type)
                                    <option value="{{ $key }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" name="financial_year">
                                <option label="PLEASE CHOOSE"></option>
                                <?php $years = getFinancialYearForm(); ?>
                                @foreach ($years as $key => $type)
                                    <option value="{{ $key }}">{{ $type }}</option>
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
                            <input type="text" class="form-control" name="LOA_date" id="datepicker-loa"
                                placeholder="yyyy/mm/dd" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="contract_start_date" id="datepicker-start"
                                placeholder="yyyy/mm/dd" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="contract_end_date" id="datepicker-end"
                                placeholder="yyyy/mm/dd" />
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label col-form-label col-md-4">Account Manager*</label>
                        <label class="form-label col-form-label col-md-4">Warranty Start Date</label>
                        <label class="form-label col-form-label col-md-4">Warranty End Date</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <select class="selectpicker form-select" name="acc_manager" id="acc_manager2" >
                                <option value="" label="PLEASE CHOOSE"></option>
                                <?php $getEmployees = getEmployee(); ?>
                                @foreach ($getEmployees as $getEmployee)
                                    <option value="{{ $getEmployee->id }}">{{ $getEmployee->employeeName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="warranty_start_date"
                                id="datepicker-warstart" placeholder="yyyy/mm/dd" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="datepicker-warend"
                                name="warranty_end_date" placeholder="yyyy/mm/dd" />
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label col-form-label col-md-4">Bank Guarantee Amount</label>
                        <label class="form-label col-form-label col-md-4">Bank Guarantee Expiry Date</label>
                        <label class="form-label col-form-label col-md-4">Status*</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <input type="number" class="form-control mb-5px" name="bank_guarantee_amount" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="datepicker-bankexpiry"
                                name="bank_guarantee_expiry_date" placeholder="yyyy/mm/dd" />
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" name="status">
                                <option value="" label="PLEASE CHOOSE" selected="selected"></option>
                                <option value="ONGOING" label="ONGOING">ONGOING</option>
                                <option value="WARRANTY" label="WARRANTY">Warranty</option>
                                <option value="CLOSED" label="CLOSED">Closed</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
