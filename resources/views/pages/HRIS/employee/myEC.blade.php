
<div class="tab-pane fade" id="default-tab-4">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add New Emergency Contact 1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <form id="formEmergency">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-firstname" class="form-label">First Name*</label>
                            <input type="text" id="emergency-firstname" name="firstName" value="{{ $emergency->firstName ?? '' }}" class="form-control" aria-describedby="emergency-firstname">
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-lastname" class="form-label">Last Name*</label>
                            <input type="text" id="emergency-lastname" name="lastName" value="{{ $emergency->lastName ?? '' }}" class="form-control" aria-describedby="emergency-lastname">
                            <input type="hidden" name="id" value="{{$emergency->id ?? ''}}">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-contactnumber" class="form-label">Contact Number*</label>
                            <input type="text" id="emergency-contactnumber" name="contactNo" value="{{ $emergency->contactNo ?? '' }}" class="form-control" aria-describedby="emergency-contactnumber">
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-relationship" class="form-label">Relationship*</label>
                            <select class="form-select" name="relationship" id="emergency-relationship" style="text-transform:uppercase">
                                            <?php $relationship = relationship() ?>
                                            <option value="" label="Please Choose"  ></option>
                                            @foreach ($relationship as $key => $status)
                                            <option value="{{$key}}"<?php echo ($key == $emergency->relationship) ? 'selected="selected"' : '' ?>> {{$status}}</option>
                                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-address1" class="form-label">Address 1*</label>
                            <input type="text" id="emergency-address1" name="address1" value="{{ $emergency->address1 ?? '' }}" class="form-control" aria-describedby="emergency-address1" style="text-transform: uppercase;">
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-address1" class="form-label">Address 2</label>
                            <input type="text" id="emergency-address2" name="address2" value="{{ $emergency->address2 ?? '' }}" class="form-control" aria-describedby="emergency-address2" style="text-transform: uppercase;">
                        </div>
            
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-postcode" class="form-label">Postcode*</label>
                            <input type="text" id="emergency-postcode" name="postcode" value="{{ $emergency->postcode ?? '' }}" class="form-control" aria-describedby="emergency-postcode">
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-city" class="form-label">City*</label>
                            <input type="text" class="form-control" name="city" value="{{ $emergency->city ?? '' }}" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="emergency-state" class="form-label">State*</label>
                            <select class="form-select" name="state" value="{{ $emergency->state ?? '' }}">>
                                <?php $state = state() ?>
                                <option value="" label="Please Choose"  ></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}"  <?php echo ($key == $emergency->state) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="emergency-country" class="form-label">Country</label>
                            <select class="form-select" name="country" value="{{ $emergency->country ?? '' }}">>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}" <?php echo ($key == $emergency->country) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}" <?php echo ($key == $emergency->country) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                
                <div class="row p-2">
                        <div class="modal-footer">
                            <a  class="btn btn-white me-5px btnPrevious">Previous</a>
                            <button type="submit" id="saveEmergency" class="btn btn-primary">Update</button>
                            <a class="btn btn-white me-5px btnNext">Next</a>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    Add New Emergency Contact 2
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-white">
                    <form id="formEmergency">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-firstname" class="form-label">First Name*</label>
                                <input type="text" id="" name="" value="" class="form-control" aria-describedby="emergency-firstname" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-lastname" class="form-label">Last Name*</label>
                                <input type="text" id="" name="" value="" class="form-control" aria-describedby="emergency-lastname" style="text-transform:uppercase">
                                <input type="hidden" name="id" value="">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-contactnumber" class="form-label">Contact Number*</label>
                                <input type="text" id="" name="contactNo" value="" class="form-control" aria-describedby="emergency-contactnumber">
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-relationship" class="form-label">Relationship*</label>
                                <select class="form-select" name="relationship" id="emergency-relationship" style="text-transform:uppercase">
                                                <?php $relationship = relationship() ?>
                                                <option value="" label="Please Choose"  ></option>
                                                @foreach ($relationship as $key => $status)
                                                <option value="{{$key}}"> {{$status}}</option>
                                                @endforeach
                                </select>
                
                            </div>
                        </div> 
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-address1" class="form-label">Address 1*</label>
                                <input type="text" id="" name="address1" value="" class="form-control" aria-describedby="emergency-address1" style="text-transform:uppercase">
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-address1" class="form-label">Address 2</label>
                                <input type="text" id="" name="address2" value="" class="form-control" aria-describedby="emergency-address2" style="text-transform:uppercase">
                            </div>
                
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-postcode" class="form-label">Postcode*</label>
                                <input type="number" id="" name="postcode" value="" class="form-control" aria-describedby="emergency-postcode">
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-city" class="form-label">City*</label>
                                <input type="text" class="form-control" name="" value="" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <label for="emergency-state" class="form-label">State*</label>
                                <select class="form-select" name="" value="" style="text-transform:uppercase">
                                    <?php $state = state() ?>
                                    <option value="" label="Please Choose"  ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}"  <?php echo ($key == $emergency->state) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="emergency-country" class="form-label">Country</label>
                                <select class="form-select" name="" value="" style="text-transform:uppercase">
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        @foreach ($americass as $key => $america)
                                        <option value="{{$key}}" <?php echo ($key == $emergency->country) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                    <option value="MY" label="Malaysia" selected ></option>
                                        @foreach ($asias as $key => $asia)
                                        <option value="{{$key}}" <?php echo ($key == $emergency->country) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="modal-footer">
                                {{-- <a  class="btn btn-white me-5px btnPrevious">Previous</a> --}}
                                <button type="submit" id="" class="btn btn-primary">Update</button>
                                {{-- <a class="btn btn-white me-5px btnNext">Next</a> --}}
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
</div>
