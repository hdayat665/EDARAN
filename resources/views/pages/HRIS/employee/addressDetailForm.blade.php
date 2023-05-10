<div class="tab-pane fade" id="default-tab-2">
    <h3 class="mt-10px"></i> Permanent Address</h3>
    <br>
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
            <label class="form-label col-form-label col-md-1">Postcode*</label>
            <div class="col-md-5">
                <input type="text" name="postcode" id="postcode" class="form-control mb-10px" placeholder="00000"  />

            </div><label class="form-label col-form-label col-md-1">City*</label>
            <div class="col-md-5">
                <input type="text" name="city" id="city" class="form-control mb-5px" placeholder="CITY" />

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">State*</label>
            <div class="col-md-5">
                <select class="form-select" name="state" id="state" style="text-transform:uppercase">
                    <?php $state = state() ?>
                        <option value="" label="PLEASE CHOOSE"  ></option>
                        @foreach ($state as $key => $status)
                        <option value="{{$key}}"  >{{$status}}</option>
                        @endforeach
                </select>
            </div>
            <label class="form-label col-form-label col-md-1">Country*</label>
            <div class="col-md-5">
                <select class="form-select" name="country" id="country" style="text-transform:uppercase">
                    <?php
                    $americass = americas();
                    $asias = asias();
                    ?>
                    <optgroup id="country-optgroup-Americas" label="Americas">
                        @foreach ($americass as $key => $america)
                        <option value="{{$key}}" >{{$america}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup id="country-optgroup-Asia" label="Asia">
                        <option value="MY" label="Malaysia" Selected></option>
                        @foreach ($asias as $key => $asia)
                        <option value="{{$key}}">{{$asia}}</option>
                        @endforeach
                    </optgroup>
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
            <label class="form-label col-form-label col-md-1">Postcode*</label>
            <div class="col-md-5">
                <input type="text" name="postcodec" id="postcodec" class="form-control mb-10px" placeholder="00000" />

            </div><label class="form-label col-form-label col-md-1">City*</label>
            <div class="col-md-5">
                <input type="text" name="cityc" id="cityc" class="form-control mb-5px" placeholder="CITY" />

            </div>
        </div>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">State*</label>
            <div class="col-md-5">
                <select class="form-select" name="statec" id="statec" >
                    <?php $state = state() ?>
                    <option value="" label="PLEASE CHOOSE"  ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}"  >{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <label class="form-label col-form-label col-md-1">Country*</label>
            <div class="col-md-5">
                <select class="form-select" name="countryc" id="countryc" style="text-transform:uppercase">
                    <?php
                    $americass = americas();
                    $asias = asias();
                    ?>
                    <optgroup id="country-optgroup-Americas" label="Americas">
                        @foreach ($americass as $key => $america)
                        <option value="{{$key}}" >{{$america}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup id="country-optgroup-Asia" label="Asia">
                        <option value="MY" label="Malaysia" Selected></option>
                        @foreach ($asias as $key => $asia)
                        <option value="{{$key}}">{{$asia}}</option>
                        @endforeach
                    </optgroup>  
                </select>
            </div>
        </div>

    

    <p class="text-end mb-0">
        <!-- <a href="javascript:;" id="prev_btn_addr_det" class="btn btn-white me-5px">Previous</a>  -->
       
        <button id="submitAddress" class="btn btn-primary">Save</button>
    </p>
    </form>

</div>
