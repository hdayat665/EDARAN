<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exit Employment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form id="submitTerminateForm">
                        <div class="mb-5">
                            <label for="recipient-name" class="col-form-label">Employee ID</label>
                            <input type="text" name="employeeId" id="employeeId" class="form-control" readonly>
                            <input type="hidden" name="user_id"  id="userId" >
                            <label for="recipient-name" class="col-form-label">Employee Name</label>
                            <input type="text" name="employeeName" id="employeeName" class="form-control" readonly>
                            <label for="recipient-name" class="col-form-label">Employee Email</label>
                            <input type="text" name="employeeEmail" id="employeeEmail" class="form-control" readonly>
                            <label for="recipient-name" class="col-form-label">Report To</label>
                            <input type="text" name="report_to" id="reportTo" class="form-control" readonly>

                        </div>
                        <div class="mb-5">
                            <label for="recipient-name" class="col-form-label">Exit Date*</label>
                            <input type="date" name="effectiveFrom" class="form-control" id="" placeholder="YYYY/MM/DD" />
                            <label for="recipient-name" class="col-form-label">Exit Type*</label>
                            <select class="form-select" name="employmentDetail">
                                <option value="" label="PLEASE CHOOSE" selected="selected">PLEASE CHOOSE </option>
                                <option value="DECEASED" label="1.DECEASED"></option>
                                <option value="DISMISSED" label="2.DISMISSED"></option>
                                <option value="RETRENCHED" label="3.RETRENCHED"></option>
                                <option value="END OF CONTRACT" label="4.END OF CONTRACT"></option>
                                <option value="RESIGNED" label="5.RESIGNED"></option>
                                <option value="RETIREMENT" label="6.RETIREMENT"></option>
                                <option value="OTHERS" label="7.OTHERS"></option>
                            </select>
                            <label for="recipient-name" class="col-form-label">Remarks</label>
                            <textarea class="form-control" name="remarks" placeholder="Remarks" rows="3"></textarea>

                            <label for="recipient-name" class="col-form-label">Attachments*</label><br>
                            <input type="file" class="form-control" name="file">
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button id="submitTerminate" class="btn btn-primary">Submit</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- BEGIN panel -->

            <!-- END panel -->
        </div>
        <!-- END col-4 -->
    </div>
    <!-- END row -->
</div>

<!-- The template to display files available for upload -->
{{-- <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade show">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <div class="bg-light rounded p-3 mb-2">
                <dl class="mb-0">
                    <dt class="text-dark">File Name:</dt>
                    <dd class="name">{%=file.name%}</dd>
                    <hr />
                    <dt class="text-dark mt-10px">File Size:</dt>
                    <dd class="size mb-0">Processing...</dd>
                </dl>
            </div>
            <strong class="error text-danger h-auto d-block text-left"></strong>
        </td>
        <td>
            <dl>
                <dt class="text-dark mt-3px">Progress:</dt>
                <dd class="mt-5px">
                    <div class="progress progress-sm progress-striped active rounded-pill"><div class="progress-bar progress-bar-primary" style="width:0%; min-width: 40px;">0%</div></div>
                </dd>
            </dl>
        </td>
        <td nowrap>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start w-100px pe-20px mb-2 d-block" disabled>
                    <i class="fa fa-upload fa-fw text-dark"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-default cancel w-100px pe-20px d-block">
                    <i class="fa fa-trash fa-fw text-muted"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
    {% } %}
</script> --}}

<!-- The template to display files available for download -->
{{-- <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade show">
            <td width="1%">
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" class="rounded"></a>
                    {% } else { %}
                        <div class="bg-light text-center fs-20px" style="width: 80px; height: 80px; line-height: 80px; border-radius: 6px;">
                            <i class="fa fa-file-image fa-lg text-gray-500"></i>
                        </div>
                    {% } %}
                </span>
            </td>
            <td>
                <div class="bg-light p-3 mb-2">
                    <dl class="mb-0">
                        <dt class="text-dark">File Name:</dt>
                        <dd class="name">
                            {% if (file.url) { %}
                                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                            {% } else { %}
                                <span>{%=file.name%}</span>
                            {% } %}
                        </dd>
                        <hr />
                        <dt class="text-dark mt-10px">File Size:</dt>
                        <dd class="size mb-0">{%=o.formatFileSize(file.size)%}</dd>
                    </dl>
                    {% if (file.error) { %}
                        <hr />
                        <div><span class="badge bg-danger me-1">ERROR</span> {%=file.error%}</div>
                    {% } %}
                </div>
            </td>
            <td></td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete w-100px mb-2 pe-20px" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="fa fa-trash float-start fa-fw text-dark mt-2px"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle">
                {% } else { %}
                    <button class="btn btn-default cancel w-100px me-3px pe-20px">
                        <i class="fa fa-trash float-start fa-fw text-muted mt-2px"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
</script> --}}
