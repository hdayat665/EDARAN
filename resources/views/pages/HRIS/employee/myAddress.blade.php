{{-- <div class="tab-pane fade" id="default-tab-3">
    <h4 class="mt-10px">Permanent Address</h4>
    <br>
    <form id="formAddress">
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="address-1" class="form-label">Address 1*</label>
                <input type="text" id="address-1" name="address1" value="{{ $address->address1 ?? '' }}" class="form-control" aria-describedby="address-1" placeholder="ADDRESS 1">
                <input type="hidden" name="user_id" value="{{$user_id ?? ''}}">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="address-2" class="form-control" name="address2" value="{{ $address->address2 ?? '' }}" aria-describedby="address-2" placeholder="ADDRESS 2">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="postcode" name="postcode" value="{{ $address->postcode ?? '' }}" class="form-control" aria-describedby="postcode" placeholder="00000">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $address->city ?? '' }}" placeholder="CITY">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" name="state" id="state" value="{{ $address->state ?? '' }}">
                    <?php $state = state() ?>
                    <option value="" label="PLEASE CHOOSE"  ></option>
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
                <input type="text" id="address-1c" name="address1c" value="{{ $address->address1c ?? '' }}" class="form-control" aria-describedby="address-1" placeholder="ADDRESS 1">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="address-2c" name="address2c" value="{{ $address->address2c ?? '' }}" class="form-control" aria-describedby="address-2" placeholder="ADDRESS 2">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="postcodec" name="postcodec" value="{{ $address->postcodec ?? '' }}" class="form-control" aria-describedby="postcode" placeholder="00000">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" id="cityc" name="cityc" value="{{ $address->cityc ?? '' }}" placeholder="CITY">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" id="statec" name="statec" value="{{ $address->statec ?? '' }}">
                    <?php $state = state() ?>
                    <option value="" label="PLEASE CHOOSE"  ></option>
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
   
        <div class="row p-2">
            <div class="modal-footer">
            <a class="btn btn-white me-5px btnPrevious">Previous</a>
            <button type="submit" id="saveAddress" class="btn btn-primary">Update</button>
            <a class="btn btn-white me-5px btnNext">Next</a>
            </div>
        </div>
    </form>
</div> --}}

<div class="tab-pane fade" id="default-tab-3">
    <div class="row p-2">
        <button class="btn btn-primary col-md-3" data-bs-toggle="modal" data-bs-target="#modaladdaddress">Add New Address</button>
    </div>
    <div class="row p-2">
        <table id="" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th class="text-nowrap">Action</th>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Address</th>
                    <th class="text-nowrap">Address Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="btn-group me-1 mb-1">
                            <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#muaddress" class="dropdown-item">Update</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </td>
                    <td>1</td>
                    <td>No 73 Jalan Gamelon 3</td>
                    <td>Correspondence</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-group me-1 mb-1">
                            <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#muaddress" class="dropdown-item">Update</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </td>
                    <td>2</td>
                    <td>No 23 Jalan Melor 2</td>
                    <td>Permanent</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-group me-1 mb-1">
                            <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#muaddress" class="dropdown-item">Update</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </td>
                    <td>3</td>
                    <td>No 71  Jalan SS 2</td>
                    <td>Both</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-group me-1 mb-1">
                            <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#muaddress" class="dropdown-item">Update</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </td>
                    <td>4</td>
                    <td>No 72 Jalan SS 4</td>
                    <td>None</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row p-2">
        <div class="modal-footer">
            <a class="btn btn-white me-5px btnPrevious">Previous</a>
            
            <a class="btn btn-white me-5px btnNext">Next</a>
        </div>
    </div>
</div>


{{-- modal add address --}}
<div class="modal fade" id="modaladdaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formAddress">
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="address-1" class="form-label">Address 1*</label>
                <input type="text" id="" name="" value="" class="form-control" aria-describedby="address-1" placeholder="ADDRESS 1" style="text-transform:uppercase" placeholder="ADDRESS 1">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="" class="form-control" name="" value="" aria-describedby="address-2" placeholder="ADDRESS 2" style="text-transform:uppercase" placeholder="ADDRESS 2">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="postcode" name="" value="" class="form-control" placeholder="POSTCODE" aria-describedby="postcode" placeholder="00000">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" name="" id="" value="" placeholder="CITY" style="text-transform:uppercase" placeholder="CITY">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" name="state" id="state" value="" style="text-transform:uppercase">
                    <?php $state = state() ?>
                    <option value="" label="PLEASE CHOOSE" ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}"  >{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label for="country" class="form-label">Country*</label>
                <select class="form-select" name="country" id="country" value="" style="text-transform:uppercase">
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
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="Addresstype" class="form-label">Address Type</label>
                <select class="form-select" >
                    <option class="form-label" value="" selected>PLEASE SELECT</option>
                    <option class="form-label" value="" >CORRESPONDENCE</option>
                    <option class="form-label" value="" >PERMANENT</option>
                    <option class="form-label" value="" >BOTH</option>
                    <option class="form-label" value="" >NONE</option>
                    
                </select>
            </div>
        </div>
        
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>


  {{-- modal update address --}}
<div class="modal fade" id="muaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formAddress">
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="address-1" class="form-label">Address 1*</label>
                <input type="text" id="" name="" value="" class="form-control" aria-describedby="address-1" style="text-transform:uppercase" placeholder="ADDRESS 1">
            </div>
            <div class="col-sm-6">
                <label for="address-2" class="form-label">Address 2</label>
                <input type="text" id="" class="form-control" name="" value="" aria-describedby="address-2" style="text-transform:uppercase" placeholder="ADDRESS 2">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="postcode" class="form-label">Postcode*</label>
                <input type="text" id="" name="postcode" value="" class="form-control" aria-describedby="postcode" placeholder="00000">
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City*</label>
                <input type="text" class="form-control" name="" id="" value="" style="text-transform:uppercase" placeholder="CITY">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="state" class="form-label">State*</label>
                <select class="form-select" name="" id="" value="" style="text-transform:uppercase">
                    <?php $state = state() ?>
                    <option value="" label="PLEASE CHOOSE" ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}" >{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label for="country" class="form-label">Country*</label>
                <select class="form-select" name="country" id="" value="" style="text-transform:uppercase">
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
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="Addresstype" class="form-label">Address Type</label>
                <select class="form-select" >
                    <option class="form-label" value="" selected>PLEASE SELECT</option>
                    <option class="form-label" value="" >CORRESPONDENCE</option>
                    <option class="form-label" value="" >PERMANENT</option>
                    <option class="form-label" value="" >BOTH</option>
                    <option class="form-label" value="" >NONE</option>
                    
                </select>
            </div>
        </div>
        <div class="row p-2">
            <div class="modal-footer">
            {{-- <a class="btn btn-white me-5px btnPrevious">Previous</a> --}}
            <button type="submit" id="saveAddress" class="btn btn-primary">Update</button>
            {{-- <a class="btn btn-white me-5px btnNext">Next</a> --}}
            </div>
        </div> 
    
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>




