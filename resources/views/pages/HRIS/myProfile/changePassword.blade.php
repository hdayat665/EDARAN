<div class="tab-pane fade" id="v-pills-changepassword" role="tabpanel" aria-labelledby="v-pills-changepassword-tab">
    <div class="card">
        <div class="card-header bg-white bg-gray-100">
            <h4 class="fw-bold">
                Change Password
            </h4>
            <p class="fw-light">
                Update your password information
            </p>
         </div>
        <div class="card-body">
            <form id="changePassForm">
                <div class="row p-2">
                    <label for="firstname" class="form-label">Current Password*</label>
                    <div class="input-group">
                        <input type="password" id="current_password" name="current_password" class="form-control" aria-describedby="password">
                        <span class="input-group-text" id="show-current-password" style="cursor:pointer;">
                            <i class="fas fa-eye-slash fa-fw" id="current-password-toggle"></i>
                        </span>
                    </div>
                    <input type="hidden" id="password1" name="user_id" value="{{$user_id}}" class="form-control" aria-describedby="password">
                </div>
                <div class="row p-2">
                    <label for="firstname" class="form-label">New Password*</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" aria-describedby="password">
                        <span class="input-group-text" id="show-password" style="cursor:pointer;">
                            <i class="fas fa-eye-slash fa-fw" id="password-toggle"></i>
                        </span>
                    </div>
                </div>
                <div class="row p-2">
                    <label for="firstname" class="form-label">Confirm Password*</label>
                    <div class="input-group">
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" aria-describedby="password">
                        <span class="input-group-text" id="show-confirm-password" style="cursor:pointer;">
                            <i class="fas fa-eye-slash fa-fw" id="confirm-password-toggle"></i>
                        </span>
                    </div>
                </div>
            
            {{-- <button type="button" id="changePassButton" class="btn btn-primary float-end mt-3">
                Save
            </button> --}}
            <button href="javascript:;" id="changePassButton" class="btn btn-primary float-end mt-3">Save</button>
        </form>
        </div>
    </div>
</div>
