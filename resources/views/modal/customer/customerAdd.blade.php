<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="row ">
                        <div class="col-md-4">
                            <label class="form-label">Customer Name*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" name="customer_name" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-4">
                            <label class="form-label">Address 1*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" name="address" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-4">
                            <label class="form-label">Address 2</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" name="address2" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">Postcode*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <input type="text" name="postcode" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="city" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">State*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                        <select class="form-select" name="state" id="state" style="text-transform: uppercase;">
                            <option value="" label="Please Choose" selected ></option>
                            <?php $getState = getState(); ?>
                            @if ($getState)
                                @foreach ($getState as $key => $name)
                                    <option value="{{ $key }}">{{ $name }}</option>
                                @endforeach
                            @endif
                        </select>
                        </div>
                        <div class="col-md-6">
                        <select class="form-select" name="country" id="">
                                <option value="MALAYSIA" label="MALAYSIA" selected ></option>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                <?php $americass = americas(); ?>
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}">{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <?php $asia = asias(); ?>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asia as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">Phone Number*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="phoneNo" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="switchery-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Dialog</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
            </div>
        </div>
    </div>
</div>
