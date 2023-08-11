<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Leave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label class="form-label">Applied Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-applied1" placeholder="yyyy-mm-dd" readonly/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Type of Leave</label>
                            <div class="input-group">
                                <select class="form-select" name="typeofleave" id="typeofleave1" disabled>
                                    <option value="" label="PLEASE CHOOSE"></option>
                                    @foreach($types as $dt)
                                        <option value="{{ $dt->id }}" {{ old('typeofleave') == $dt->id ? 'selected' : '' }}>{{ $dt->leave_types }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label class="form-label">No of Day(s) Applied</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="dayApplied1"  readonly/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Total Days Applied</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="totalapply1" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="menu01">
                            <label class="form-label">Leave Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-leave1" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6" id="menu02">
                            <label class="form-label">Leave Session</label>
                            <div class="input-group">
                                <div class="form-check">
                                    <input class="form-check-input specific-radio" type="radio" name="flexRadioDefault" id="flexRadioDefaulta" style="pointer-events: none">
                                    <label class="form-check-label" for="flexRadioDefaulta">
                                        Morning
                                        <br>
                                        8AM - 1PM
                                    </label>
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="form-check">
                                    <input class="form-check-input specific-radio" type="radio" name="flexRadioDefault" id="flexRadioDefaultb" style="pointer-events: none">
                                    <label class="form-check-label" for="flexRadioDefaultb">
                                        Evening
                                        <br>
                                        2PM - 5PM
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2" id="menu03">
                        <div class="col-sm-6">
                            <label class="form-label">Start Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-start1"  readonly/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">End Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-end1"  readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <label class="form-label">Supporting Document</label>
                            <div class="input-group">
                                <span id="fileDownloadPolicya"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Reason</label>
                            <div class="input-group">
                                <textarea class="form-control" id="reason1" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <div class="form-control" id = "hiderec1">
                                <div class="row">
                                    <div class="col-sm-6">Recommended By:
                                        <div id="recommended_by"></div>
                                    </div>
                                    <div class="col-sm-6">Approved By:
                                        <div id="approved_by"></div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">Status:
                                        <div id="status_1">Pending</div>
                                    </div>
                                    <div class="col-sm-6">Status:
                                        <div id="status_2">Pending</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control" id = "hiderec2">
                                <div class="row">
                                    <div class="col-sm-6">Approved By:
                                        <div id="approved_by1"></div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">Status:
                                        <div id="status_22">Pending</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
