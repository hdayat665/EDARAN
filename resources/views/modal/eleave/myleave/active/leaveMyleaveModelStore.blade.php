<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply Leave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Applied Date </label>
                                <input type="text" class="form-control" name= "applied_date" id="datepicker-applied" placeholder="yyyy-mm-dd" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6" id="menu2">
                            <label class="form-label" for="Menu2">Type of Leave*</label>
                            <select class="form-select" id="typeofleavehidden" name="typeofleave">
                                <option value="" label="PLEASE CHOOSE "></option>
                                @foreach($types as $dt)
                                <option value="{{ $dt->id }}" {{ old('typeofleave') == $dt->id ? 'selected' : '' }}>{{ $dt->leave_types }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2" id="hideavaible">
                        <div class="col-sm-12">
                            <div>
                                <label for="exampleInputEmail1" class="form-label">Date Availability</label>
                            </div>
                            <div class="mb-12">
                                <input type="hidden" class="form-control" id="type_sick" value="<?php echo $typessick->id; ?>">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" value="1" type="radio" name="availability" id="radio1" checked>
                                    <label class="form-check-label" for="radio1">
                                        Available
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" value="2" type="radio" name="availability" id="radio2">
                                    <label class="form-check-label" for="radio2">
                                        Existing Application
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <br>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="menu3">
                            <label class="form-label" for="Menu3">No of Day(s) Applied*</label>
                            <div class="">
                                <select class="form-select" name="noofday" id="select3">
                                    <option value="" label="PLEASE CHOOSE"></option>
                                    <option value="1" label="ONE DAY"></option>
                                    <option value="0.5" label="HALF DAY"></option>
                                    <option value="-" label="OTHERS"></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6" id="menu4">
                            <label class="form-label" for="Menu4">Total Days Applied</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="total_day_appied" id="select4" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2" id="menu5">
                        <div class="col-sm-6">
                            <label class="form-label" for="Menu5">Leave Date*</label>
                            <div class="">
                                <input type="text" class="form-control" name="leave_date" id="datepicker-leave" placeholder="YYYY/MM/DD"/>
                            </div>
                        </div>
                    </div>

                    <div class="row p-2" id="menu6">
                        <div class="col-sm-12" >
                            <label class="form-label" for="Menu6">Leave Session*</label>
                                <div class="input-group" name="name6" id="select6">
                                    <div class="form-check">
                                        <input class="form-check-input" value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Morning
                                            <br>
                                            8AM - 1PM
                                        </label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check">
                                        <input class="form-check-input" value="2" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Evening
                                            <br>
                                            2PM - 5PM
                                        </label>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-sm-6" id="menu7">
                            <label class="form-label" for="Menu5">Start Date*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="start_date" id="datepicker-start" placeholder="YYYY/MM/DD"/>

                                </div>
                        </div>
                        <div class="col-sm-6" id="menu8">
                            <label class="form-label" for="Menu6">End Date*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="end_date" id="datepicker-end" placeholder="YYYY/MM/DD"/>

                                </div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-sm-6" id="menu9">
                            <label class="form-label" for="Menu7">Supporting Document</label>
                            <div class="input-group">
                                <input id="fileupload" type="file" accept=".pdf,.png,.jpeg,.jpg" name="file" max-size="5MB">
                                <span id="fileDownloadPolicy"></span>
                            </div>
                        </div>
                        <div class="col-sm-6" id="menusick">
                            <label class="form-label" for="Menu7">Supporting Document</label>
                            <div class="input-group">
                                <input name="fileuploadsick" type="file" accept=".pdf,.png,.jpeg,.jpg" name="file" max-size="5MB">
                                <span id="fileDownloadPolicy"></span>
                            </div>
                        </div>
                        <div class="col-sm-6" id="menu10">
                            <label class="form-label" for="Menu8">Reason*</label>
                            <div class="">
                                <textarea class="form-control upperReason" rows="3" name="reason" maxlength="225"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="saveButton">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
