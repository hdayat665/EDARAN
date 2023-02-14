<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                <div class="row ">
                        <div class="col-md-4">
                            <label class="form-label">Customer Name*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" name="customer_name" id="customer_name" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-4">
                            <label class="form-label">Address 1*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="address" id="address" placeholder="">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-4">
                            <label class="form-label">Address 2</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" id="address2" name="address2" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">Postcode*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <input type="text" id="postcode" name="postcode" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="city" name="city" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">State*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                        <select class="form-select" name="state" value="" style="text-transform:uppercase">
                                    <?php $state = state() ?>
                                    <option value="" label="PLEASE CHOOSE" ></option>
                                    @foreach ($state as $key => $status)
                                    <option value="{{$key}}"  <?php echo ($key == $customer->state) ? 'selected="selected"' : '' ?>>{{$status}}</option>
                                    @endforeach
                                </select>
                        </div>


                        <div class="col-md-6">
                        <select class="form-select" name="country">
                            <option value="" label="PLEASE CHOOSE" ></option>
                            
                            <?php
                            $americass = americas();
                            $asias = asias();
                            ?>
                            <optgroup id="country-optgroup-Americas" label="Americas">
                                @foreach ($americass as $key => $america)
                                <option value="{{$key}}" <?php echo ($key == $customer->country) ? 'selected="selected"' : '' ?> >{{$america}}</option>
                                @endforeach
                            </optgroup>
                            <optgroup id="country-optgroup-Asia" label="Asia">
                                @foreach ($asias as $key => $asia)
                                <option value="{{$key}}" <?php echo ($key == $customer->country) ? 'selected="selected"' : '' ?> >{{$asia}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="form-label">Phone Number*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email*</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="phoneNo" id="phoneNo" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="">
                            <input type="hidden" class="form-control" name="id" id="idC" placeholder="">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updateButton" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="switchery-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Dialog</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
            </div>
        </div>
    </div>
</div>
