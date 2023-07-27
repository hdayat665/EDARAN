@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">HRIS | Policy & SOP</h1>





    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-15" id="SOPJs">
            <!-- BEGIN nav-tabs -->
            <ul class="nav nav-tabs" id="SOPJs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Policy</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">SOP</span>
                    </a>
                </li>

            </ul>
            <!-- END nav-tabs -->
            <!-- BEGIN tab-content -->
            <div class="tab-content panel m-0 rounded-0 p-3">
                <!-- BEGIN tab-pane -->
                <div class="tab-pane fade active show" id="default-tab-1">
                    <h3 class="mt-10px"></i> Policy List </h3>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" data-bs-toggle="modal" id="addButton1" class="btn btn-primary">+ New Policy</a>
                    </div>
                    <div class="panel-body">
                        <table id="tablepolicy" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th class="text-nowrap">Policy</th>
                                    <th class="text-nowrap">Document Title</th>
                                    <th class="text-nowrap">Description</th>
                                    <th class="text-nowrap">Attachment</th>
                                    <th class="text-nowrap">Added By</th>
                                    <th class="text-nowrap">Added Time</th>
                                    <th class="text-nowrap">Modified By</th>
                                    <th class="text-nowrap">Modified Time</th>
                                    <th width="9%" class="align-middle">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php $id = 0 ?>
                                @if ($policys)
                                    @foreach ($policys as $policy)
                                    <?php $id++ ?>
                                    <tr class="odd gradeX">
                                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                                        <td>{{$policy->code}}</td>
                                        <td>{{$policy->policy}}</td>
                                        <td>{{$policy->desc}}</td>
                                        <td><a href="{{ route('download', ['filename' => $policy->file]) }}">{{$policy->file}}</a></td>
                                        <td>{{$policy->addedBy}}</td>
                                        <td>{{$policy->created_at}}</td>
                                        <td>{{$policy->modifiedBy}}</td>
                                        <td>{{$policy->modified_at}}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                            <div class="dropdown-menu">
                                            <a href="javascript:;" id="editButton1" data-id="{{$policy->id}}" class="dropdown-item"> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a id="deleteButton1" data-id="{{$policy->id}}" class="dropdown-item"> Delete</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                @endif

                        </tbody>
                    </table>
                </div>



            </div>
            <!-- END tab-pane -->
            <!-- BEGIN tab-pane -->
            <div class="tab-pane fade" id="default-tab-2">
                <h3 class="mt-10px"></i> SOP List </h3>
                <div class="panel-heading-btn">
                    <a href="javascript:;" data-bs-toggle="modal" id="addButton2" class="btn btn-primary">+ New SOP</a>
                </div>
                <div class="panel-body">
                    <table id="tablesop" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-nowrap">SOP Code</th>
                                <th class="text-nowrap">SOP Name</th>
                                <th class="text-nowrap">Description</th>
                                <th class="text-nowrap">Attachment</th>
                                <th class="text-nowrap">Added By</th>
                                <th class="text-nowrap">Added Time</th>
                                <th class="text-nowrap">Modified By</th>
                                <th class="text-nowrap">Modified Time</th>
                                <th width="9%" class="align-middle">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $id = 0 ?>
                                @if ($SOPs)
                                @foreach ($SOPs as $SOP)
                            <?php $id++ ?>
                                <tr class="odd gradeX">
                                    <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                                    <td>{{$SOP->SOPCode}}</td>
                                    <td>{{$SOP->SOPName}}</td>
                                    <td>{{$SOP->desc}}</td>
                                    <td>
                                        <a href="{{ route('download', ['filename' => $SOP->file]) }}">{{$SOP->file}}</a>
                                    </td>
                                    <td>{{$SOP->addedBy}}</td>
                                    <td>{{$SOP->created_at}}</td>
                                    <td>{{$SOP->modifiedBy}}</td>
                                    <td>{{$SOP->modified_at}}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                                        <div class="dropdown-menu">
                                        <a href="javascript:;" id="editButton2" data-id="{{$SOP->id}}" class="dropdown-item"> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a id="deleteButton2" data-id="{{$SOP->id}}" class="dropdown-item"> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-light" style="color: black;" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

            <!-- END col-4 -->
        </div>
        <!-- END row -->
    </div>
</div>
<!-- END #content -->
<div class="modal fade" id="addModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm1">

                    <div class="mb-3">
                        <label class="form-label">Policy*</label>
                        <input type="text" class="form-control" name="code" placeholder="POLICY" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Document Title*</label>
                        <input type="text" class="form-control" name="policy" placeholder="DOCUMENT TITLE" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description*</label>
                        <textarea type="text" class="form-control" rows="3" placeholder="DESCRIPTION" name="desc" maxlength="255" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment*</label>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary" id="saveButton1">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--

-->
<div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm1">

                    <div class="mb-3">
                        <label class="form-label">Policy*</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="POLICY" >
                        <input type="hidden" class="form-control" id="idP" name="id" placeholder="POLICY" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Document Title*</label>
                        <input type="text" class="form-control" id="policy" name="policy" placeholder="DOCUMENT TITLE" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description*</label>
                        <textarea type="text" class="form-control" rows="3" name="desc" placeholder="DESCRIPTION" id="desc" maxlength="255" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment*</label>
                        <input id="fileupload" type="file" multiple="multiple" name="file"></input>
                        <span id="fileDownloadPolicy"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary" id="updateButton1">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="addModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New SOP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm2">

                    <div class="mb-3">
                        <label class="form-label">SOP Code* </label>
                        <input type="text" class="form-control" name="SOPCode" placeholder="SOP'S CODE" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SOP Name* </label>
                        <input type="text" class="form-control" name="SOPName" placeholder="SOP'S NAME" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description* </label>
                        <textarea type="text" class="form-control" rows="3" name="desc" maxlength="255" placeholder="DESCRIPTION"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment* </label>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary" id="saveButton2">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update SOP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm2">

                    <div class="mb-3">
                        <label class="form-label">SOP Code </label>
                        <input type="text" class="form-control" name="SOPCode" id="SOPCode" placeholder="SOP'S CODE" >
                        <input type="hidden" class="form-control" name="id" id="idS" placeholder="SOP'S CODE" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SOP Name </label>
                        <input type="text" class="form-control" name="SOPName" id="SOPName" placeholder="SOP'S NAME" maxlength="100" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description </label>
                        <textarea class="form-control" rows="3" name="desc" id="descr" maxlength="255" placeholder="DESCRIPTION"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Upload </label>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                        <span id="fileDownloadSOP"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button href="javascript:;" class="btn btn-primary" id="updateButton2">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection
