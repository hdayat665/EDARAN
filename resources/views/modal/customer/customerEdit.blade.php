<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                <div class="row ">
                        <div class="col-md-4">
                            <label class="form-label">Customer Name*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="CUSTOMER NAME">
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
                            <input type="text" class="form-control" name="address" id="address" placeholder="ADDRESS 1">
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
                            <input type="text" id="address2" name="address2" class="form-control" placeholder="ADDRESS 2">
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
                            <select class="form-select sel5" name="country" id="CountryEd">
                                <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                                @foreach($country as $ct)
                                    <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>
                                        {{ $ct->country_name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="countryEdiv" name="" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select sel6" name="state" id="StateEd" style="text-transform: uppercase;">
                                <option value="" label="PLEASE CHOOSE" selected ></option>
                                @foreach($state as $st)
                                    <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="stateEdiv" name="" class="form-control">
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
                            <select name="city" id="CityEd" class="form-select sel7">
                                <option value="" label="PLEASE CHOOSE" selected ></option>
                                @foreach($city as $cty)
                                    <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="cityEdiv" name="" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <select name="postcode" id="PostcodeEd" class="form-select sel8">
                                <option value="" label="PLEASE CHOOSE" selected ></option>
                                @foreach($postcode as $pc)
                                    <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="postEdiv" name="" class="form-control">
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
                            <input type="number" class="form-control" name="phoneNo" id="phoneNo" placeholder="0000000000">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com">
                            <input type="hidden" class="form-control" name="id" id="idC" placeholder="">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updateButton" class="btn btn-primary">Update</button>
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
