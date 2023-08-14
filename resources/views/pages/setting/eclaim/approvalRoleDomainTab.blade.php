<div class="tab-pane fade" id="default-tab-2">
    {{-- <h3 class="mt-10px"></i> Domain List </h3>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-control">
                    <div class="row p-2">
                        <h4>MONTLY CLAIM</h4>
                    </div>
                    <div class="form-control">
                        <form id="claimAdminForm">
                            <div class="row p-2">
                                <div class="col-md-2">
                                    <h5>ADMIN</h5>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Role</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type" value="monthlyClaim">
                                    <input type="hidden" name="category_role" value="admin">
                                    <select class="form-select" id="roleId" name="role">
                                        <option class="form-label" value="">Please Select</option>
                                        <?php $roles = getAllRole(); ?>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->roleName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2"> 
                                    <label class="form-label">Checker 1</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" name="checker1" id="checker1">
                                        <option class="form-label" value="">Please Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 2</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker2" name="checker2">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 3</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker3" name="checker3">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Recommender</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="recommender" name="recommender">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Approver</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="approver" name="approver">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary">Reset</button> -->
                                <button type="submit" class="btn btn-primary" id="claimAdminButton">Save</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="form-control">
                        <form id="claimFinanceForm">
                            <div class="row p-2">
                                <div class="col-md-2">
                                    <h5>FINANCE</h5>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Role</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type" value="monthlyClaim">
                                    <input type="hidden" name="category_role" value="finance">
                                    <select class="form-select" id="roleIdF" name="role">
                                        <option class="form-label" value="">Please Select</option>
                                        <?php $roles = getAllRole(); ?>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->roleName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 1</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker1F" name="checker1">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 2</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker2F" name="checker2">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 3</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker3F" name="checker3">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Recommender</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="recommenderF" name="recommender">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Approver</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="approverF" name="approver">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary">Reset</button> -->
                                <button type="submit" id="claimFinanceButton" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-control">
                    <div class="row p-2">
                        <h4>CASH ADVANCE</h4>
                    </div>
                    <div class="form-control">
                        <form id="cashAdminForm">
                            <div class="row p-2">
                                <div class="col-md-2">
                                    <h5>FINANCE</h5>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Role</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type" value="cashAdvance">
                                    <input type="hidden" name="category_role" value="cash_advance">
                                    <select class="form-select" id="roleIdC" name="role">
                                        <option class="form-label" value="">Please Select</option>
                                        <?php $roles = getAllRole(); ?>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->roleName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 1</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker1C" name="checker1">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 2</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker2C" name="checker2">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Checker 3</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="checker3C" name="checker3">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Recommender</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="recommenderC" name="recommender">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Approver</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="approverC" name="approver">
                                        <option class="form-label" value="" selected>Please
                                            Select</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary">Reset</button> -->
                                <button type="submit" id="cashAdminButton" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
