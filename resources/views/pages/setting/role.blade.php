@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->

    <!-- END page-header -->
    <!-- BEGIN row -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header" id="roleJs">Roles <small>| Use roles to group permissions. </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <p>

                </p><a href="javascript:;" data-bs-toggle="modal" id="addRoleButton" class="btn btn-primary">+ New Role</a>
            </div>
            <div class="modal fade" id="modal-dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Select Permissions</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body"></div>
                        <div id="kt_docs_jstree_checkable"></div>

                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                            <a href="javascript:;" class="btn btn-success">Action</a>
                        </div>

                    </div>
                </div>
            </div>

            <h4 class="panel-title"></h4>

            <div class="panel-heading-btn">
                <a href="" class="btn btn-primary" id="reloadRole"><i class="fa fa-arrow-rotate-left"></i> Refresh</a>

            </div>
        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="tableRoles" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th class="text-nowrap">Role Name</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @if ($roles)
                    <?php $i = 1 ?>
                    @foreach ($roles as $role)
                    <?php $a = $i++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$a}}</td>
                        {{-- <span class="badge bg-primary rounded-pill">Static</span><span class="badge bg-dark rounded-pill">Default</span> --}}
                        <td>{{$role->roleName}} </td>
                        <td>{{$role->addedBy}}</td>
                        <td>{{$role->addedTime}}</td>
                        <td>{{$role->modifiedBy}}</td>
                        <td>{{$role->modifiedTime}}</td>
                        <td><a href="javascript:;" data-bs-toggle="modal" id="editRoleButton" data-id="{{$role->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a><a href="javascript:;" id="deleteRoleButton" data-id="{{$role->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>

    <!-- END row -->
    <!-- BEGIN row -->

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
                                    <span class="d-sm-none" >Tab 1</span>
                                    <span class="d-sm-block d-none">Role name</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">Tab 2</span>
                                    <span class="d-sm-block d-none">Permissions</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">Tab 3</span>
                                    <span class="d-sm-block d-none">User</span>
                                </a>
                            </li> --}}

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
                                        <input class="form-check-input" name="defaultRole" type="checkbox" id="checkbox1"  />
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
                                <!-- BEGIN tab-pane -->
                                {{-- <div class="tab-pane fade" id="default-tab-2">
                                    <blockquote class="blockquote">

                                        <input type="text" class="form-control" id="recipient-name" placeholder="Search">
                                        <br>
                                        <div id="kt_docs_jstree_checkable2"></div>
                                    </blockquote>

                                    <br>
                                    <div class="note note-warning note-with-end-icon mb-2">
                                        <div class="note-content text-end">

                                            <p>
                                                If you are changing your own permissions, you may need to refresh page (F5) to take effect of permission changes on your own screen!
                                            </p>
                                        </div>

                                    </div>
                                </div> --}}
                                <!-- END tab-pane -->
                                <!-- BEGIN tab-pane -->
                                

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

    <!--  -->
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
                                    <span class="d-sm-none" >Tab 1</span>
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
                                    <input type="text" class="form-control" name="roleName" id="roleName" >
                                    <input type="hidden" class="form-control" name="id" id="idR" >
                                </blockquote>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox1"  />
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
                            <!-- BEGIN tab-pane -->
                            <div class="tab-pane fade" id="default-tab-5">
                                <blockquote class="blockquote">

                                    <input type="text" class="form-control" id="recipient-name" placeholder="Search">
                                    <br>
                                    <div id="kt_docs_jstree_checkable3"></div>
                                </blockquote>

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
                            <!-- BEGIN tab-pane -->

                            <div class="tab-pane fade" id="default-tab-6">
                                {{-- <blockquote class="blockquote"> --}}
                                <br>
                                   <div class="col-md-9">
                                        <div class="mb-2">
                                            <label for="lapsed date" class="form-label">Employee Name: </label>
                                            {{-- <input type="text" class="form-control col-sm-2" name="employerName"> --}}
                                            <select class="form-select" name="userName" id="userName">
                                                <option value="" label="PLEASE CHOOSE"></option>
                                                @foreach($rolestaff as $rs)
                                                    <option value="{{ $rs->user_id }}" {{ old('userName') == $rs->user_id ? 'selected' : '' }}>{{ $rs->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
							        </div>
                                <br>
                                <br>
                                <br>
                                {{-- </blockquote> --}}
                                <div class="row p-2">
                                    <table id="" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Employee Name</th>
                                                <th class="text-nowrap">Added By</th>
                                                <th class="text-nowrap">Added Time</th>
                                                <th class="text-nowrap">Modified By</th>
                                                <th class="text-nowrap">Modified Time</th>
                                                {{-- <th class="text-nowrap">Action</th> --}}
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 1 ?>
                                                @if ($listuserrole)
                                                @foreach ($listuserrole as $h)
                                            
                                            <tr>
                                                <td>{{ $id++ }}</td>
                                                <td>{{$h->fullname}}</td>
                                                <td>{{$h->username1}}</td>
                                                <td>{{$h->added_time}}</td>
                                                <td>{{$h->username2}}</td>
                                                <td>{{$h->modified_time}}</td>
                                                {{-- <td></td> --}}
                                            </tr>
                                           @endforeach
                                           @endif
                                        </tbody>
                                    </table>
                                </div>
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="updateRole">Update</button>
                                    </div> --}}
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


    <!-- END row -->
</div>

@endsection
