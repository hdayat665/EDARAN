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
                    <div class="form-group">
                        <div class="form-control" id = "hiderec1">
                            <div class="row p-2">
                                <div class = col-md-5>
                                    <label for="text" >Recommended By:</label><br>
                                    <div id="recommended_by" style="font-weight: lighter;"></div>
                                </div>
                                <div class = "col-md-1">
                                </div>
                                <div class = "col-md-6" id="hidenull1">
                                    <label for="text" >Approved By:</label><br>
                                    <div id="approved_by" style="font-weight: lighter;"></div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class = col-md-5>
                                    <label for="text">Status:</label><br>
                                <div id="status_1" style="font-weight: lighter;"></div>
                                </div>
                                <div class = col-md-1>
                                </div>
                                <div class = "col-md-6" id="hidenull2">
                                    <label for="text">Status:</label><br>
                                <div id="status_2" style="font-weight: lighter;"></div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class = "col-md-5" id="hideRec">
                                    <label for="text">Reason:</label><br>
                                    <div id="reasonRecommender" style="font-weight: lighter; word-wrap: break-word;"></div>
                                </div>
                                <div class = "col-md-1">
                                </div>
                                <div class = "col-md-5"id="hideApprPending">
                                </div>
                                <div class = "col-md-6 hidenull3" id="hideAppr">
                                    <label for="text">Reason:</label><br>
                                    <div id="reasonApprover" style="font-weight: lighter; word-wrap: break-word;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-control" id = "hiderec2">
                            <div class="row p-2">
                                <div class = "col-md-12">
                                    <label for="text" >Approved By:</label><br>
                                    <div id="approved_by1" style="font-weight: lighter;"></div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class = "col-md-12">
                                    <label for="text">Status:</label><br>
                                <div id="status_21" style="font-weight: lighter;"></div>
                                </div>
                            </div>
                            <div class="row p-2" id="viewmenu021">
                                <div class = "col-md-12">
                                    <label for="text">Reason:</label><br>
                                    <div id="reasonApprover1" style="font-weight: lighter; word-wrap: break-word;"></div>
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
