<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORGOT YOUR PASSWORD?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="forgotPassEmailForm">
                    <div class="mb-3">
                        <label>A password reset link will be sent to your email to reset your password. If you don't get an email within a few minutes, please re-try.</label>
                    </div>
                    
                    <div class="mb-3">
                        <label for="recipient-tenant" class="col-form-label">Domain Name</label>
                        <input type="text" class="form-control" name="tenant_name">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Working Email</label>
                        <input type="text" class="form-control" name="username">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="forgotPassEmail" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
