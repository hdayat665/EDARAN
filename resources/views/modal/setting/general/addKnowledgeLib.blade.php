<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">

                    <div class="mb-3">
                        <label class="form-label">Title*</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" maxlength="100" placeholder="TITLE">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Source URL</label>
                        <input type="url" class="form-control" name="sourceURL" placeholder="Source URL" maxlength="255" placeholder="SOURCE URL">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content*</label>
                        <textarea type="text" class="form-control" rows="3" placeholder="Content" name="content" maxlength="255" placeholder="CONTENT"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment* </label>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary" id="saveButton">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>