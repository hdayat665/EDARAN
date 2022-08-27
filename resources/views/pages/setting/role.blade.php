@extends('layouts.dashboardTenant')

@section('content')

<iv id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->

    <!-- END page-header -->
    <!-- BEGIN row -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Roles <small>| Use roles to group permissions. </small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <p>

                </p><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary">+ New Role</a>
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
                <a href="#" class="btn btn-primary"><i class="fa fa-arrow-rotate-left"></i> Refresh</a>

            </div>
        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
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
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">1</td>
                        <td>Admin <span class="badge bg-primary rounded-pill">Static</span><span class="badge bg-dark rounded-pill">Default</span></td>
                        <td>ahmad</td>
                        <td>2 Feb 2022 2.30 pm</td>
                        <td>Elon Musk</td>
                        <td>14 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal3" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a></td>

                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="fw-bold text-dark">2</td>
                        <td>Administrator<span class="badge bg-primary rounded-pill">Static</span><span class="badge bg-dark rounded-pill">Default</span></td>
                        <td>Rosyam</td>
                        <td>3 Feb 2022 2.30 pm</td>
                        <td>Bill Gates</td>
                        <td>12 Feb 2021 4.30 pm</td>
                        <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a>

                        </tr>
                        <tr class="even gradeC">
                            <td width="1%" class="fw-bold text-dark">3</td>
                            <td>Intern</td>
                            <td>abu</td>
                            <td>5 Feb 2022 2.30 pm</td>
                            <td>Maisarah</td>
                            <td>10 Feb 2022 2.30 pm</td>
                            <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>

                        </tr>




                    </tbody>
                </table>
            </div>
        </div>

        <!-- END row -->
        <!-- BEGIN row -->

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <li class="nav-item">
                                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Tab 2</span>
                                        <span class="d-sm-block d-none">Permissions</span>
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content panel m-0 rounded-0 p-3">
                                <!-- BEGIN tab-pane -->
                                <div class="tab-pane fade active show" id="default-tab-1">
                                    <blockquote class="blockquote">
                                        <p>Role name</p>
                                        <input type="text" class="form-control" id="recipient-name">
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
                                <div class="tab-pane fade" id="default-tab-2">
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
                                </div>
                                <!-- END tab-pane -->
                                <!-- BEGIN tab-pane -->

                                <!-- END tab-pane -->
                            </div>
                        </div>
                        <div id="dvPreview"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="hljs-wrapper">


                        <div class="mb-3">

                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link active">
                                        <span class="d-sm-none" >Tab 1</span>
                                        <span class="d-sm-block d-none">Role name</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#default-tab-4" data-bs-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Tab 2</span>
                                        <span class="d-sm-block d-none">Permissions</span>
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content panel m-0 rounded-0 p-3">
                                <!-- BEGIN tab-pane -->
                                <div class="tab-pane fade active show" id="default-tab-3">
                                    <blockquote class="blockquote">
                                        <p>Role name</p>
                                        <input type="text" class="form-control" id="recipient-name">
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
                                <div class="tab-pane fade" id="default-tab-4">
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

                                <!-- END tab-pane -->
                            </div>
                        </div>
                        <div id="dvPreview"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- END row -->
    </div>

    @endsection
