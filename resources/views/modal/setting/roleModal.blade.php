<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="hljs-wrapper">
                <div class="mb-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                                <span class="d-sm-none">Tab 1</span>
                                <span class="d-sm-block d-none">Role name</span>
                            </a>
                        </li>
                    </ul>
                    <form id="addRoleForm">
                        <div class="tab-content panel m-0 rounded-0 p-3">
                            <!-- BEGIN tab-pane -->
                            <div class="tab-pane fade active show" id="default-tab-1">
                                <blockquote class="blockquote">
                                    <p>Role name</p>
                                    <input type="text" name="roleName" class="form-control" id="recipient-name">
                                </blockquote>
                                <div class="form-check">
                                    <input class="form-check-input" name="default_YN" type="checkbox" id="checkbox1" />
                                    <label class="form-check-label" for="checkbox1">Default</label>
                                    <small> - Assign to new users by default. </small>
                                </div>
                                <br>
                                <div class="note note-warning note-with-end-icon mb-2">
                                    <div class="note-content text-end">
                                        <p>
                                            If you are changing your own permissions, you may need to refresh page (F5) to take effect of permission changes on your own screen!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-pane -->
                        </div>
                    </form>
                </div>
                <div id="dvPreview"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveRoleButton">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="editRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="hljs-wrapper">
                <div class="mb-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link active">
                                <span class="d-sm-none">Tab 1</span>
                                <span class="d-sm-block d-none">Role name</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#default-tab-5" data-bs-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Tab 2</span>
                                <span class="d-sm-block d-none">Permissions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#default-tab-6" data-bs-toggle="tab" class="nav-link">
                                <span class="d-sm-none">Tab 3</span>
                                <span class="d-sm-block d-none">User</span>
                            </a>
                        </li>
                    </ul>
                    <form id="updateRoleForm">
                        <div class="tab-content panel m-0 rounded-0 p-3">
                            <!-- BEGIN tab-pane -->
                            <div class="tab-pane fade active show" id="default-tab-4">
                                <blockquote class="blockquote">
                                    <p>Role name</p>
                                    <input type="text" class="form-control" name="roleName" id="roleName">
                                    <input type="hidden" class="form-control" name="id" id="idR">
                                </blockquote>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox1" />
                                    <label class="form-check-label" for="checkbox1">Default</label>
                                    <small> - Assign to new users by default. </small>
                                </div>
                                <br>
                                <div class="note note-warning note-with-end-icon mb-2">
                                    <div class="note-content text-end">
                                        <p>
                                            If you are changing your own permissions, you may need to refresh page (F5) to take effect of permission changes on your own screen!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="default-tab-5">
                                <blockquote class="blockquote"> <input type="text" class="form-control" id="recipient-name" placeholder="Search">
                                    <br>
                                    <div id="kt_docs_jstree_checkable3"></div>
                                </blockquote> <br>
                                <div class="note note-warning note-with-end-icon mb-2">
                                    <div class="note-content text-end">
                                        <p>
                                            If you are changing your own permissions, you may need to refresh page (F5) to take effect of permission changes on your own screen!
                                        </p>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <table id="permissionTable" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Permission Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="default-tab-6">
                                <br>
                                <div class="col-md-9">
                                    <div class="mb-2">
                                        <label for="lapsed date" class="form-label">Employee Name: </label>
                                        <select class="form-select" name="userName" id="userName">
                                            <option value="" label="PLEASE CHOOSE"></option>
                                            @foreach ($rolestaff as $rs)
                                                <option value="{{ $rs->user_id }}" {{ old('userName') == $rs->user_id ? 'selected' : '' }}>{{ $rs->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="row p-2">
                                    <table id="tableBody" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Employee Name</th>
                                                <th class="text-nowrap">Added By</th>
                                                <th class="text-nowrap">Added Time</th>
                                                <th class="text-nowrap">Modified By</th>
                                                <th class="text-nowrap">Modified Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="dvPreview"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateRole">Update</button>
            </div>
        </div>
    </div>
</div>
