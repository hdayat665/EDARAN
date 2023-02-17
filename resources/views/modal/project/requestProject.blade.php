<div class="modal fade" id="requestProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 780px!important;" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="requestProjectForm">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Customer Name:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control" id="customer_name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Project Code:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control" id="project_code"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Project Name:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control" id="project_name"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Project Manager:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control" id="project_manager"/>
                            <input type="hidden" id="idRP">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label col-md-6">Reason*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control " name="reason" rows="5" type="text" placeholder="Reason"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateRequestProject">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
