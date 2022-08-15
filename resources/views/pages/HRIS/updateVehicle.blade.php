<div class="col-md-8">
    <form >
      <div class="card ">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">mail_outline</i>
          </div>
          <h4 class="card-title">Update Vehicle</h4>
        </div>
        <div class="card-body ">
          <div class="form-group">
            <label for="exampleEmail" class="bmd-label-floating"> Current Password *</label>
            <input type="password" name="current_password" class="form-control" id="exampleEmail" required="true">
          </div>
          <div class="form-group">
            <label for="examplePassword" class="bmd-label-floating"> New Password *</label>
            <input type="password" name="password" class="form-control" id="examplePassword" required="true">
          </div>
          <div class="form-group">
            <label for="examplePassword1" class="bmd-label-floating"> Confirm Password *</label>
            <input type="password" name="confirm_password" class="form-control" id="examplePassword1" required="true" equalTo="#examplePassword">
          </div>
          {{-- <div class="category form-category">* Required fields</div> --}}
        </div>
        <div class="card-footer text-right">

          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </div>
    </form>
  </div>
