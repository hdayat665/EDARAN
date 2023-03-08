<div class="tab-pane fade active show" id="default-tab-1">
    <h3 class="mt-10px"></i> General List </h3>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-control">
                    <form id="generalForm">
                        <div class="row p-2">
                            <h4>General</h4>
                        </div>
                        <div class="form-control">
                            <div class="row p-2">
                                <div class="col-md-2">
                                    <h5>Department</h5>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Recommender</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" name="recommender" id="recommenderGeneral">
                                        <option class="form-label" value="">Please Select</option>
                                        <?php $roles = getAllJobGrade(); ?>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" label="{{ $role->jobGradeName }}">
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
                                    <label class="form-label">Approver</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" name="approver" id="approverGenralShow">
                                        <option class="form-label" value="">Please Select</option>
                                        <?php $roles = getAllJobGrade(); ?>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" label="{{ $role->jobGradeName }}">
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary">Reset</button> -->
                                <button type="submit" class="btn btn-primary" id="generalButton">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-control">
                    <div class="row p-2">
                        <h4>History</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <ul class="timeline-with-icons">
                                    @if ($datas)
                                        @foreach ($datas as $data)
                                            <li class="timeline-item mb-5 ">
                                                <div class="card p-3 bg-white">
                                                    <p class="fw-bold">Recommender and Approver has change <br>
                                                        Recommender : {{ getJobGradeById($data->recommender)->jobGradeName ?? '-' }}<br>
                                                        Approver : {{ getJobGradeById($data->approver)->jobGradeName ?? 'Unable to retrieve approver information.' }}<br>
                                                        updated by {{ optional(getUserProfileByUserId($data->user_id))->fullName ?? 'Unable to retrieve updater information.' }}


                                                    <p class="text-muted mb-2 fw-bold">11 March 2020
                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
