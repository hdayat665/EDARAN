
<div class="modal fade" id="addcountry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formstate">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add State</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <label class="form-label">Add State*</label>
                        <div class="input-group">
                            <select class="form-select" name="state_id">
                                <option value="" label="PLEASE CHOOSE"></option>
                                @foreach($state as $st)
                                    <option value="{{ $st->id }}" {{ old('state_id') == $st->id ? 'selected' : '' }}>{{ $st->state_name }}</option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <div class="text-danger" style="margin-top: 5px;">{{ $messages }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button href="javascript:;" class="btn btn-primary" id="savestatemodal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="addleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="updateweekendmodal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Weekend and Hour Working</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="state">Title State</h5>
                    <br>

                        <div class="row p-2">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monday</td>
                                            <td>
                                                <input style="text-align:center" id="id_monday" type="hidden" name="id_monday" class="form-control" />
                                                <input style="text-align:center" id="start_time_monday" type="text" name="start_time_monday" class="form-control" placeholder="Start Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="end_time_monday" type="text" name="end_time_monday" class="form-control" placeholder="End Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="duration_monday" type="text" name="duration_monday" class="form-control" placeholder="Duration" style=" background: #ffffff;" />
                                            </td>
                                            <td><button type="button" class="btn btn-warning" id="clear_monday">Reset</button></td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>
                                                <input style="text-align:center" id="id_tuesday" type="hidden" name="id_tuesday" class="form-control" />
                                                <input style="text-align:center" id="start_time_tuesday" type="text" name="start_time_tuesday" class="form-control" placeholder="Start Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="end_time_tuesday" type="text" name="end_time_tuesday" class="form-control" placeholder="End Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="duration_tuesday" type="text" name="duration_tuesday" class="form-control" placeholder="Duration" style=" background: #ffffff;" />
                                            </td>
                                            <td><button type="button" class="btn btn-warning" id="clear_tuesday">Reset</button></td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday</td>
                                            <td>
                                                <input style="text-align:center" id="id_wednesday" type="hidden" name="id_wednesday" class="form-control"  />
                                                <input style="text-align:center" id="start_time_wednesday" type="text" name="start_time_wednesday" class="form-control" placeholder="Start Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="end_time_wednesday" type="text" name="end_time_wednesday" class="form-control" placeholder="End Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="duration_wednesday" type="text" name="duration_wednesday" class="form-control" placeholder="Duration" style=" background: #ffffff;" />
                                            </td>
                                            <td><button type="button" class="btn btn-warning" id="clear_wednesday">Reset</button></td>
                                        </tr>
                                        <tr>
                                            <td>Thursday</td>
                                            <td>
                                                <input style="text-align:center" id="id_thursday" type="hidden" name="id_thursday" class="form-control" />
                                                <input style="text-align:center" id="start_time_thursday" type="text" name="start_time_thursday" class="form-control" placeholder="Start Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="end_time_thursday" type="text" name="end_time_thursday" class="form-control" placeholder="End Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="duration_thursday" type="text" name="duration_thursday" class="form-control" placeholder="Duration" style=" background: #ffffff;" />
                                            </td>
                                            <td><button type="button" class="btn btn-warning" id="clear_thursday">Reset</button></td>
                                        </tr>
                                        <tr>
                                            <td>Friday</td>
                                            <td>
                                                <input style="text-align:center" id="id_friday" type="hidden" name="id_friday" class="form-control" />
                                                <input style="text-align:center" id="start_time_friday" type="text" name="start_time_friday" class="form-control" placeholder="Start Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="end_time_friday" type="text" name="end_time_friday" class="form-control" placeholder="End Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="duration_friday" type="text" name="duration_friday" class="form-control" placeholder="Duration" style=" background: #ffffff;" />
                                            </td>
                                            <td><button type="button" class="btn btn-warning" id="clear_friday">Reset</button></td>
                                        </tr>
                                        <tr>
                                            <td>Saturday</td>
                                            <td>
                                                <input style="text-align:center" id="id_saturday" type="hidden" name="id_saturday" class="form-control"/>
                                                <input style="text-align:center" id="start_time_saturday" type="text" name="start_time_saturday" class="form-control" placeholder="Start Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="end_time_saturday" type="text" name="end_time_saturday" class="form-control" placeholder="End Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="duration_saturday" type="text" name="duration_saturday" class="form-control" placeholder="Duration" style=" background: #ffffff;" />
                                            </td>
                                            <td><button type="button" class="btn btn-warning" id="clear_saturday">Reset</button></td>
                                        </tr>
                                        <tr>
                                            <td>Sunday</td>
                                            <td>
                                                <input style="text-align:center" id="id_sunday" type="hidden" name="id_sunday" class="form-control" />
                                                <input style="text-align:center" id="start_time_sunday" type="text" name="start_time_sunday" class="form-control" placeholder="Start Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="end_time_sunday" type="text" name="end_time_sunday" class="form-control" placeholder="End Time" style=" background: #ffffff;" />
                                            </td>
                                            <td>
                                                <input style="text-align:center" id="duration_sunday" type="text" name="duration_sunday" class="form-control" placeholder="Duration" style=" background: #ffffff;" />
                                            </td>
                                            <td><button type="button" class="btn btn-warning" id="clear_sunday">Reset</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button href="javascript:;" class="btn btn-primary" id="updateweekendmodal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
