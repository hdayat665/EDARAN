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
    <h1 class="page-header" id="newsJs">Settings <small>| News</small></h1>

    <!-- END page-header -->
    <!-- BEGIN panel -->
    <div class="panel panel">

        <!-- BEGIN panel-heading -->

        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary">+ New News</a>
            </div>

            <h4 class="panel-title"></h4>


        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                        <th class="text-nowrap">Title</th>
                        <th class="text-nowrap">Content</th>
                        <th class="text-nowrap">Attachment</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>



                    </tr>
                </thead>
                <tbody>
                    @if ($news)
                        @foreach ($news as $new)
                    <tr>
                        <td><a href="javascript:;" data-bs-toggle="modal" id="editButton" data-id="{{$new->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a id="deleteButton" data-id="{{$new->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                        <td>{{$new->title}}</td>
                        <td>{{$new->content}}</td>
                        <td>{{$new->file}}</td>
                        <td>{{$new->addedBy}}</td>
                        <td>{{$new->created_at}}</td>
                        <td>{{$new->modifiedBy}}</td>
                        <td>{{$new->updated_at}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- END row -->
<!-- BEGIN row -->
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
                        <label>Title</label><br><br>
                        <input type="text" class="form-control" name="title" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Source URL</label><br><br>
                        <input type="text" class="form-control" name="sourceURL" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Content </label><br><br>
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveButton">Save</button>
            </div>
        </div>
    </div>
</div>

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
                        <label>Title</label><br><br>
                        <input type="text" class="form-control" name="title" id="title" placeholder="">
                        <input type="hidden" class="form-control" name="id" id="idN" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Source URL</label><br><br>
                        <input type="text" class="form-control" name="sourceURL" id="sourceURL" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Content </label><br><br>
                        <textarea class="form-control" rows="3" name="content" id="contents"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  id="updateButton">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- END row -->

@endsection
