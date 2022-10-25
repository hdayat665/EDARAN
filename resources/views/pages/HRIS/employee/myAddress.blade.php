<div class="tab-pane fade" id="default-tab-2">
    <h4 class="mt-10px">Permanent Address</h4>
    <br>
    <form id="formAddress">
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="address-1" class="form-label">Address 1*</label>
                <input type="text" id="address-1" name="address1" value="{{ $address->address1 ?? '' }}" class="form-control" aria-describedby="address-1">
                <input type="hidden" name="user_id" value="{{$user_id ?? ''}}">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="address-2" class="form-control" name="address2" value="{{ $address->address2 ?? '' }}" aria-describedby="address-2">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="postcode" name="postcode" value="{{ $address->postcode ?? '' }}" class="form-control" aria-describedby="postcode">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $address->city ?? '' }}">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" name="state" id="state" value="{{ $address->state ?? '' }}">
                    <?php $state = state() ?>
                    <option value="0" label="Please Choose"  ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}"  <?php echo ($key == $address->state) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" name="country" id="country" value="{{ $address->country ?? '' }}">
                    <option value="MY" label="MALAYSIA" ></option>
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
                        Same as Permenant Address
                    </label>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="address-1" class="form-label">Address 1*</label>
                <input type="text" id="address-1c" name="address1c" value="{{ $address->address1c ?? '' }}" class="form-control" aria-describedby="address-1">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="address-2c" name="address2c" value="{{ $address->address2c ?? '' }}" class="form-control" aria-describedby="address-2">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="postcodec" name="postcodec" value="{{ $address->postcodec ?? '' }}" class="form-control" aria-describedby="postcode">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" id="cityc" name="cityc" value="{{ $address->cityc ?? '' }}">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" id="statec" name="statec" value="{{ $address->statec ?? '' }}">
                    <?php $state = state() ?>
                    <option value="0" label="Please Choose"  ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}"  <?php echo ($key == $address->statec) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" id="countryc" name="countryc" value="{{ $address->countryc ?? '' }}">
                    <option value="1" label="Malaysia" ></option>
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
                        @foreach ($asias as $key => $asia)
                        <option value="{{$key}}" <?php echo ($key == $address->countryc) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
    </form>
    <p class="text-end mb-0 mt-3">
        <a href="javascript:;" class="btn btn-white me-5px">Previous</a>
        <a href="javascript:;" id="saveAddress" class="btn btn-primary">Save</a>
    </p>
</div>
