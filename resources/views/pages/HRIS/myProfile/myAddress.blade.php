<div class="tab-pane fade" id="default-tab-2">
    <h4 class="mt-10px">Permanent Address</h4>
    <br>
    <form id="formAddress">
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="address-1" class="form-label">Address 1*</label>
                <input type="text" id="address-1" name="address1" value="{{ $address->address1 ?? '' }}" class="form-control" aria-describedby="address-1" style="text-transform:uppercase">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="address-2" class="form-control" name="address2" value="{{ $address->address2 ?? '' }}" aria-describedby="address-2" style="text-transform:uppercase">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="postcode" name="postcode" value="{{ $address->postcode ?? '' }}" class="form-control" aria-describedby="postcode">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" name="city" id="city" value="{{ $address->city ?? '' }}" style="text-transform:uppercase">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" name="state" id="state" value="{{ $address->state ?? '' }}" style="text-transform:uppercase">
                    <?php $state = state() ?>
                    <option value="" label="Please Choose"  ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}"  <?php echo ($key == $address->state) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label for="country" class="form-label">Country*</label>
                <select class="form-select" name="country" id="country" value="{{ $address->country ?? '' }}" style="text-transform:uppercase">
                    <?php
                    $americass = americas();
                    $asias = asias();
                    ?>
                    <optgroup id="country-optgroup-Americas" label="Americas">
                        @foreach ($americass as $key => $america)
                        <option value="{{$key}}" <?php echo ($key == $address->country) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup id="country-optgroup-Asia" label="Asia">
                        <option value="MY" label="Malaysia" Selected></option>
                        @foreach ($asias as $key => $asia)
                        <option value="{{$key}}" <?php echo ($key == $address->country) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
        <hr class="mt-5">
        <div class="row">
            <h4 class="col-sm-6 p-2">Correspondence Address</h4>
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="same-address" name="sameAsPermenant">
                    <label class="form-check-label" for="same-address">
                        Same as Permanent Address
                    </label>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="address-1" class="form-label">Address 1*</label>
                <input type="text" id="address-1c" name="address1c" value="{{ $address->address1c ?? '' }}" class="form-control" aria-describedby="address-1" style="text-transform:uppercase">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="address-2c" name="address2c" value="{{ $address->address2c ?? '' }}" class="form-control" aria-describedby="address-2" style="text-transform:uppercase">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="postcodec" name="postcodec" value="{{ $address->postcodec ?? '' }}" class="form-control" aria-describedby="postcode">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" name="cityc" id="cityc" value="{{ $address->cityc ?? '' }}" style="text-transform:uppercase">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" name="statec" id="statec" value="{{ $address->statec ?? '' }}" style="text-transform:uppercase">
                    <?php $state = state() ?>
                    <option value="" label="Please Choose"  ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}"  <?php echo ($key == $address->statec) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label for="country" class="form-label">Country*</label>
                <select class="form-select" name="countryc" id="countryc" value="{{ $address->countryc ?? '' }}" style="text-transform:uppercase">
                    <?php
                    $americass = americas();
                    $asias = asias();
                    ?>
                    <optgroup id="country-optgroup-Americas" label="Americas">
                        @foreach ($americass as $key => $america)
                        <option value="{{$key}}" <?php echo ($key == $address->countryc) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup id="country-optgroup-Asia" label="Asia">
                        <option value="MY" label="Malaysia" Selected></option>
                        @foreach ($asias as $key => $asia)
                        <option value="{{$key}}" <?php echo ($key == $address->countryc) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
    
    <p class="text-end mb-0 mt-3">
        <a href="javascript:;" class="btn btn-white me-5px">Previous</a>
        <button type="submit" id="saveAddress" class="btn btn-primary">Save</button>
        
    </p>
    </form>
</div>

