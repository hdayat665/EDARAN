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
                            <input type="text" name="customer_name" class="form-control" placeholder="CUSTOMER NAME">
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
                            <input type="text" name="address" class="form-control" placeholder="ADDRESS 1">
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
                            <input type="text" name="address2" class="form-control" placeholder="ADDRESS 2">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">Country*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">State*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <select class="form-select sel1" name="country" id="CountryId">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($country as $ct)
                                    <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="countrydiv" name="" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select sel2" name="state" id="StateId" style="text-transform: uppercase;">
                                <option value="" label="PLEASE CHOOSE" selected ></option>
                            </select>
                            <input type="hidden" id="statediv" name="" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">City*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Postcode*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <select name="city" id="CityId" class="form-select sel3">
                                <option value="" label="PLEASE CHOOSE" selected ></option>
                            </select>
                            <input type="hidden" id="citydiv" name="" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <select name="postcode" id="PostcodeId" class="form-select sel4">
                                <option value="" label="PLEASE CHOOSE" selected ></option>
                            </select>
                            <input type="hidden" id="postdiv" name="" class="form-control">
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
                            <input type="number" class="form-control" name="phoneNo" placeholder="00000000000">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="email@gmail.com">
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
