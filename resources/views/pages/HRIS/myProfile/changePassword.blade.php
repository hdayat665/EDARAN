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
                    <input type="password" id="password" name="current_password" class="form-control" aria-describedby="password">
                    <input type="hidden" id="password1" name="user_id" value="{{$user_id}}" class="form-control" aria-describedby="password">
                </div>
                <div class="row p-2">
                    <label for="firstname" class="form-label">New Password*</label>
                    <input type="password" id="password2" name="password"  class="form-control" aria-describedby="password">
                </div>
                <div class="row p-2">
                    <label for="firstname" class="form-label">Confirm Password*</label>
                    <input type="password" id="password" name="confirm_password" class="form-control" aria-describedby="password">

                </div>
            
            {{-- <button type="button" id="changePassButton" class="btn btn-primary float-end mt-3">
                Save
            </button> --}}
            <button href="javascript:;" id="changePassButton" class="btn btn-primary float-end mt-3">Save</button>
        </form>
        </div>
    </div>
</div>
