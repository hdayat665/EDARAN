
<div class="tab-pane fade" id="default-tab-3">
    <h4 class="mt-10px">Emergency Contact</h4>
    <br>
    <form id="formEmergency">
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-firstname" class="form-label">First Name*</label>
                <input type="text" id="emergency-firstname" name="firstName" value="{{ $emergency->firstName ?? '' }}" class="form-control" aria-describedby="emergency-firstname" style="text-transform:uppercase">
            </div>
            <div class="col-sm-6">
                <label for="emergency-lastname" class="form-label">Last Name*</label>
                <input type="text" id="emergency-lastname" name="lastName" value="{{ $emergency->lastName ?? '' }}" class="form-control" aria-describedby="emergency-lastname" style="text-transform:uppercase">
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
                <input type="text" id="emergency-address1" name="address1" value="{{ $emergency->address1 ?? '' }}" class="form-control" aria-describedby="emergency-address1" style="text-transform:uppercase">
            </div>
            <div class="col-sm-6">
                <label for="emergency-address1" class="form-label">Address 2</label>
                <input type="text" id="emergency-address2" name="address2" value="{{ $emergency->address2 ?? '' }}" class="form-control" aria-describedby="emergency-address2" style="text-transform:uppercase">
            </div>

        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-postcode" class="form-label">Postcode*</label>
                <input type="number" id="emergency-postcode" name="postcode" value="{{ $emergency->postcode ?? '' }}" class="form-control" aria-describedby="emergency-postcode">
            </div>
            <div class="col-sm-6">
                <label for="emergency-city" class="form-label">City*</label>
                <input type="text" class="form-control" name="city" value="{{ $emergency->city ?? '' }}" style="text-transform:uppercase">
            </div>
        </div>
        <div class="row p-2">
            <div class="col-sm-6">
                <label for="emergency-state" class="form-label">State*</label>
                <select class="form-select" name="state" value="{{ $emergency->state ?? '' }}" style="text-transform:uppercase">
                    <?php $state = state() ?>
                    <option value="" label="Please Choose"  ></option>
                    @foreach ($state as $key => $status)
                    <option value="{{$key}}"  <?php echo ($key == $emergency->state) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label for="emergency-country" class="form-label">Country</label>
                <select class="form-select" name="country" value="{{ $emergency->country ?? '' }}" style="text-transform:uppercase">
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
                <a  class="btn btn-white me-5px btnPrevious">Previous</a>
                <button type="submit" id="saveEmergency" class="btn btn-primary">Update</button>
                <a class="btn btn-white me-5px btnNext">Next</a>
            </div>
        </div>
    
       
    </form>
</div>
