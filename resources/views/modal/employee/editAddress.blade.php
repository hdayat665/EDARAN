<div class="modal fade" id="modaleditaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formEditAddressDetails">
                <input type="hidden" id="id1" name="id" >
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
                        <label for="postcode" class="form-label">Postcode*</label>
                        <input type="text" id="postcodeEdit" name="postcode" value="" class="form-control" placeholder="00000" aria-describedby="postcode">
                    </div>
                    <div class="col-sm-6">
                        <label for="city" class="form-label">City*</label>
                        <input type="text" class="form-control" name="city" id="cityEdit" value="" placeholder="CITY" style="text-transform:uppercase">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-6">
                        <label for="state" class="form-label">State*</label>
                        <select class="form-select" name="state" id="stateEdit" value="" style="text-transform:uppercase">
                            <?php $state = state() ?>
                            <option value="" label="PLEASE CHOOSE"  ></option>
                            @foreach ($state as $key => $status)
                            <option value="{{$key}}" >{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="country" class="form-label">Country*</label>
                        <select class="form-select" name="country" id="countryEdit" value="" style="text-transform:uppercase">
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
                                <option value="{{$key}}" >{{$asia}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                {{-- <div class="row p-2">
                    <div class="col-sm-6">
                        <label for="Addresstype" class="form-label">Address Type*</label>
                        <select class="form-select" name="addressType" id="addressTypeEdit" value="">
                            <?php $type = addressType() ?>
                                <option value="" label="PLEASE CHOOSE"></option>
                                @foreach ($type as $key => $status)
                                <option value="{{$key}}" >{{$status}}</option>
                                @endforeach
                            
                        </select>
                    </div>
                </div> --}}
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="saveAddressDetailsBtn">Update</button>
        </div>
      </div>
    </div>
  </div>