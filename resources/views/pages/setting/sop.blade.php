@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">HRIS | Policy's & SOP's</h1>





    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-15">
            <!-- BEGIN nav-tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Policy's</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">SOP's</span>
                    </a>
                </li>

            </ul>
            <!-- END nav-tabs -->
            <!-- BEGIN tab-content -->
            <div class="tab-content panel m-0 rounded-0 p-3">
                <!-- BEGIN tab-pane -->
                <div class="tab-pane fade active show" id="default-tab-1">
                    <h3 class="mt-10px"></i> Policy's List </h3>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">+ New Policy's</a>
                    </div>
                    <div class="panel-body">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="9%" data-orderable="false" class="align-middle">Action</th>
                                    <th class="text-nowrap">Policy Name</th>
                                    <th class="text-nowrap">Document Title</th>
                                    <th class="text-nowrap">Description</th>
                                    <th class="text-nowrap">Attachment</th>
                                    <th class="text-nowrap">Added By</th>
                                    <th class="text-nowrap">Added Time</th>
                                    <th class="text-nowrap">Modified By</th>
                                    <th class="text-nowrap">Modified Time</th>



                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal3" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                    <td>Infra Policy</td>
                                    <td>Policy on Infrastructure Policy</td>
                                    <td>This policy</td>
                                    <td>Infrapolicy.pdf</td>
                                    <td>Zaid</td>
                                    <td>14 Feb 2021 4.30 pm</td>
                                    <td>Kamal</td>
                                    <td>14 Feb 2021 4.30 pm</td>

                                </tr>
                                <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>IT Policy</td>
                                <td>Policy on IT Policy</td>
                                <td>This policy</td>
                                <td>ITpolicy.pdf</td>
                                <td>Ifwat</td>
                                <td>13 Feb 2021 4.30 pm</td>
                                <td>Rika</td>
                                <td>19 Feb 2021 4.30 pm</td>

                            </tr>
                            <tr>
                                <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Standard Policy</td>
                                <td>Policy on General Policy</td>
                                <td>This policy govern</td>
                                <td>generalpolicy.pdf</td>
                                <td>Yusuf</td>
                                <td>11 Feb 2021 4.30 pm</td>
                                <td>Kamal</td>
                                <td>18 Feb 2021 4.30 pm</td>

                            </tr>




                        </tbody>
                    </table>
                </div>



            </div>
            <!-- END tab-pane -->
            <!-- BEGIN tab-pane -->
            <div class="tab-pane fade" id="default-tab-2">
                <h3 class="mt-10px"></i> SOP's List </h3>
                <div class="panel-heading-btn">
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary">+ New SOP's</a>
                </div>
                <div class="panel-body">
                    <table id="data-table-default2" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="10%" data-orderable="false" class="align-middle">Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th class="text-nowrap">SOP Name</th>
                                <th class="text-nowrap">Document Title</th>
                                <th class="text-nowrap">Description</th>
                                <th class="text-nowrap">Attachment</th>
                                <th class="text-nowrap">Added By</th>
                                <th class="text-nowrap">Added Time</th>
                                <th class="text-nowrap">Modified By</th>
                                <th class="text-nowrap">Modified Time</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal4" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Infra SOP</td>
                                <td>SOP on Infrastructure SOP</td>
                                <td>This SOP govern the following activities</td>
                                <td>InfraSOP.pdf</td>
                                <td>Zaid</td>
                                <td>14 Feb 2021 4.30 pm</td>
                                <td>Kamal</td>
                                <td>14 Feb 2021 4.30 pm</td>

                            </tr>
                            <tr>
                                <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>IT SOP</td>
                                <td>SOP on IT SOP</td>
                                <td>This SOP govern the following activities</td>
                                <td>ITSOP.pdf</td>
                                <td>Ifwat</td>
                                <td>13 Feb 2021 4.30 pm</td>
                                <td>Rika</td>
                                <td>19 Feb 2021 4.30 pm</td>

                            </tr>
                            <tr>
                                <td><a href="javascript:;" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                <td>Standard SOP</td>
                                <td>SOP on General Policy</td>
                                <td>This SOP govern the following activities</td>
                                <td>generalSOP.pdf</td>
                                <td>Yusuf</td>
                                <td>11 Feb 2021 4.30 pm</td>
                                <td>Kamal</td>
                                <td>18 Feb 2021 4.30 pm</td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END col-4 -->
        </div>
        <!-- END row -->
    </div>
</div>
<!-- END #content -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Policy's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>Policy's Code </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Policy's Name </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!--

-->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Policy's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>Policy's Code </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Policy's Name </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New SOP's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>SOP's Code </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>SOP's Name </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update SOP's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-3">
                        <label>SOP's Code </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>SOP's Name </label><br><br>
                        <input type="text" class="form-control" id="recipient-name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


@endsection
