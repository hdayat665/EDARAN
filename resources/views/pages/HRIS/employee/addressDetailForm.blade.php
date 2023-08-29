<div class="tab-pane fade" id="default-tab-2">
    <h3 class="mt-10px"></i> Permanent Address</h3>
    <br>
    <div id=addressEmployee>
        <form id="addressForm">
            <div class="row mb-15px">
                <label class="form-label col-form-label col-md-1">Address 1*</label>
                <div class="col-md-5">
                    <input type="text" name="address1" id="address1" class="form-control mb-10px" placeholder="ADDRESS 1" />
                    <input type="hidden" name="user_id" id="user_id" class="form-control mb-10px" />

                </div><label class="form-label col-form-label col-md-1">Address 2</label>
                <div class="col-md-5">
                    <input type="text" name="address2" id="address2" class="form-control mb-5px" placeholder="ADDRESS 2"/>

                </div>
            </div>

            <div class="row mb-15px">
                <label class="form-label col-form-label col-md-1">Country*</label>
                <div class="col-md-5">
                    <select class="form-select" name="country" id="country" value="" style="text-transform:uppercase">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                        @foreach($country->sortBy('country_name') as $ct)
                            <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="form-label col-form-label col-md-1">State*</label>
                <div class="col-md-5">
                    <select class="form-select" name="state" id="state" value="" style="text-transform: uppercase;">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                    </select>
                </div>
            </div>
            <div class="row mb-15px">
                <label class="form-label col-form-label col-md-1">City*</label>
                <div class="col-md-5">
                    <select class="form-select" name="city" id="city" style="text-transform: uppercase;">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                    </select>
                </div>
                <label class="form-label col-form-label col-md-1">Postcode*</label>
                <div class="col-md-5">
                    <select class="form-select" name="postcode" id="postcode" style="text-transform: uppercase;">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <h4 class="col-sm-6 p-2">Correspondence Address</h4>
                <div class="col-sm-6">
                    <div class="form-check">
                    <input type="checkbox" name="sameAsPermenant" id="same-address" class="form-check-input"/>
                        <label class="form-check-label" for="same-address">
                            Same as Permanent Address
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row mb-15px">
                <label class="form-label col-form-label col-md-1">Address 1*</label>
                <div class="col-md-5">
                    <input type="text" name="address1c" id="address1c" class="form-control mb-10px" placeholder="ADDRESS 1" />

                </div><label class="form-label col-form-label col-md-1">Address 2</label>
                <div class="col-md-5">
                    <input type="text" name="address2c" id="address2c" class="form-control mb-5px" placeholder="ADDRESS 2" />

                </div>
            </div>

            <div class="row mb-15px">
                <label class="form-label col-form-label col-md-1">Country*</label>
                <div class="col-md-5">
                    <select class="form-select" name="countryc" id="countryc" value="" style="text-transform:uppercase">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                        @foreach($country->sortBy('country_name') as $ct)
                            <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="form-label col-form-label col-md-1">State*</label>
                <div class="col-md-5">
                    <select class="form-select" name="statec" id="statec" value="" style="text-transform: uppercase;">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                    </select>
                </div>
            </div>
            <div class="row mb-15px">
                <label class="form-label col-form-label col-md-1">City*</label>
                <div class="col-md-5">
                    <select class="form-select" name="cityc" id="cityc" style="text-transform: uppercase;">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                    </select>
                </div>
                <label class="form-label col-form-label col-md-1">Postcode*</label>
                <div class="col-md-5">
                    <select class="form-select" name="postcodec" id="postcodec" style="text-transform: uppercase;">
                        <option type="text" value="" selected="selected">PLEASE CHOOSE</option>
                    </select>
                </div>
            </div>



        <p class="text-end mb-0">
            <!-- <a href="javascript:;" id="prev_btn_addr_det" class="btn btn-white me-5px">Previous</a>  -->

            <button id="submitAddress" class="btn btn-primary">Save</button>
        </p>
        </form>
    </div>
</div>
