<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ENTER DOMAIN NAME</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="submitForm">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Domain name :</label>
                        <input type="text" class="form-control" name="tenant" id="recipient-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="tenantNameSubmit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
