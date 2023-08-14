<div class="tab-pane fade" id="default-tab-3">
    <div class="panel-body">
        <div class="accordion" id="accordionFlushExample">
            @if ($companys)
                @foreach ($companys as $company)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-{{ $company->id }}" aria-expanded="false"
                                aria-controls="flush-{{ $company->id }}">
                                {{ $company->companyName }}
                            </button>
                        </h2>
                        <div id="flush-{{ $company->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-control">
                                            <div class="row p-2">
                                                <h4>MONTLY CLAIM</h4>
                                            </div>
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <div class="col-md-2">
                                                        <h5>ADMIN</h5>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Role</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>
                                                                Please Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 1</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>
                                                                Please Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 2</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>
                                                                Please Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 3</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>
                                                                Please Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Recommender</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>
                                                                Please Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Approver</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary">Reset</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <div class="col-md-2">
                                                        <h5>FINANCE</h5>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Role</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 1</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 2</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 3</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Recommender</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Approver</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary">Reset</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-control">
                                            <div class="row p-2">
                                                <h4>CASH ADVANCE</h4>
                                            </div>
                                            <div class="form-control">
                                                <div class="row p-2">
                                                    <div class="col-md-2">
                                                        <h5>FINANCE</h5>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Role</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 1</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 2</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Checker 3</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Recommender</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Approver</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="">
                                                            <option class="form-label" value="" selected>Please
                                                                Select
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary">Reset</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div> <!-- END col-4 -->
    </div>
    <!-- END row -->
</div>
