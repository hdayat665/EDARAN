
<div class="modal fade" id="editSubsistence" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form id="editAreaForm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Area</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Area*</label><br>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="area_name" id="area_name">
                                <input type="hidden" class="form-control" id="idE">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="editButton" class="btn btn-primary">Update</button>
                    </form>
                </div>
            
        </div>
    </div>
</div>