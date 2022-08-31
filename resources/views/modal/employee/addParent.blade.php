<div class="modal fade" id="add-parent" tabindex="-1" aria-labelledby="add-parent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-parent">Add Parent Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addParentForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First Name*</label>
                            <input type="text" id="" name="firstName" class="form-control" aria-describedby="firstname">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last Name*</label>
                            <input type="text" id="" name="lastName" class="form-control" aria-describedby="lastname">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="dob" class="form-label">Date of Birth*</label>
                            <input type="date" id="" name="DOB" class="form-control" aria-describedby="dob">
                        </div>
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Gender*</label>
                            <select class="form-select" name="gender" id="">
                                <option value="0" label="Please Choose "></option>
                                @foreach ($gender as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="passport" class="form-label">Contact Number</label>
                            <input type="text" id="" name="contactNo" class="form-control" aria-describedby="passport">
                        </div>
                        <div class="col-sm-6">
                            <label for="expirydate" class="form-label">Relationship</label>
                            <select class="form-select" name="relationship" id="">
                                <?php $relationship = relationship() ?>
                                <option value="0" label="Please Choose"  ></option>
                                @foreach ($relationship as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4 class="mt-3 p-2">Address</h4>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="form-check form-switch align-right">
                                <input class="form-check-input" type="checkbox" name="sameAddress" id="same-address">
                                <label class="form-check-label" for="same-address">
                                    Same as permenant address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="address-1" class="form-label">Address 1*</label>
                            <input type="text" id="" name="address1" class="form-control" aria-describedby="address-1">
                        </div>
                        <div class="col-sm-6">
                            <label for="address-2" class="form-label">Address 2</label>
                            <input type="text" id="" name="address2" class="form-control" aria-describedby="address-2">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="postcode" class="form-label">Postcode*</label>
                            <input type="text" id="" name="postcode" class="form-control" aria-describedby="postcode">
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" class="form-select" name="city" id="">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State*</label>
                            <select class="form-select" id="" name="state">
                                <?php $state = state() ?>
                                <option value="0" label="Please Choose"  ></option>
                                @foreach ($state as $key => $status)
                                <option value="{{$key}}"> {{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="">
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}" >{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asias as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addParent">Save</button>
            </div>
        </div>
    </div>
</div>
@include('modal.employee.editParent')
@include('modal.employee.viewParent')
