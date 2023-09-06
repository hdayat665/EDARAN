<div class="modal fade" id="modaleditaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Address Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="addressProfile">
            <form id="formEditAddressDetails">
                <input type="hidden" id="id1" name="id">
                <div class="row p-2">
                    <div class="col-sm-6">
                        <label for="address-1" class="form-label">Address 1*</label>
                        <input type="text" id="address1Edit" name="address1" value="" class="form-control" aria-describedby="address-1" placeholder="ADDRESS 1" style="text-transform:uppercase">
                    </div>
                    <div class="col-sm-6">
                        <label for="address-2" class="form-label">Address 2</label>
                        <input type="text" id="address2Edit" class="form-control" name="address2" value="" aria-describedby="address-2" placeholder="ADDRESS 2" style="text-transform:uppercase">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-6">
                        <label for="country" class="form-label">Country*</label>
                        <select class="form-select" name="country" id="country_idedit" value="" style="text-transform:uppercase">
                            <option type="text" value="" selected="selected">Please Choose</option>
                            @foreach($country->sortBy('country_name') as $ct)
                            <option value="{{ $ct->country_id }}" {{ old('country_id') == $ct->country_id ? 'selected' : '' }}>{{ $ct->country_name }}</option>
                            @endforeach
                        </select>
                        <div id="country-err-2" class="error"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="state" class="form-label">State*</label>
                        <select class="form-select" name="state" id="state_idedit" value="" style="text-transform:uppercase">
                            <option type="text" value="" label="" selected="selected">Please Choose</option>
                            @foreach($state->sortBy('state_name') as $st)
                            <option value="{{ $st->id }}" {{ old('id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                            @endforeach
                        </select>
                        <div id="state-err-2" class="error"></div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-6">
                        <label for="city" class="form-label">City*</label>
                        <select class="form-select" name="city" id="city_idedit" style="text-transform: uppercase;">
                            <option type="text" value="" label="" selected="selected">Please Choose</option>
                            @foreach($city->sortBy('name') as $cty)
                            <option value="{{ $cty->name }}" {{ old('name') == $cty->name ? 'selected' : '' }}>{{ $cty->name }}</option>
                            @endforeach
                        </select>
                        <div id="city-err-2" class="error"></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="postcode" class="form-label">Postcode*</label>
                        <select class="form-select" name="postcode" id="postcode_idedit" style="text-transform: uppercase;">
                            <option type="text" value="" label="" selected="selected">Please Choose</option>
                            @foreach($postcode->sortBy('postcode') as $pc)
                            <option value="{{ $pc->postcode }}" {{ old('postcode') == $pc->postcode ? 'selected' : '' }}>{{ $pc->postcode }}</option>
                            @endforeach
                        </select>
                        <div id="postcode-err-2" class="error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button  class="btn btn-primary" id="saveAddressDetailsBtn">Save</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
