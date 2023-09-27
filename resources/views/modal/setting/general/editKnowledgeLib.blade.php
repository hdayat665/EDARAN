<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">

                    <div class="mb-3">
                        <label class="form-label">Title*</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="TITLE" maxlength="100" >
                        <input type="hidden" class="form-control" name="id" id="idN" placeholder="TITLE" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Source URL</label>
                        <input type="text" class="form-control" name="sourceURL" id="sourceURL" placeholder="SOURCE URL" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content*</label>
                        <textarea type="text" class="form-control" rows="3" name="content" id="contents" maxlength="255" placeholder="CONTENT"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment*</label>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                        <span id="fileDownload"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary"  id="updateButton">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>