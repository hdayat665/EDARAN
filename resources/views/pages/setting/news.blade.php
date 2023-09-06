@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header" id="newsJs">Setting <small>| News</small></h1>
    <div class="panel panel">
        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary"><i class="fa fa-plus"></i> New News</a>
            </div>
            <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
            <table id="tablenews" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="text-nowrap">Title</th>
                        <th class="text-nowrap">Content</th>
                        <th class="text-nowrap">Attachment</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($news)
                    @foreach ($news as $new)
                    <?php $id++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                        <td>{{$new->title}}</td>
                        <td>{{$new->content}}</td>
                        <!-- <td><a href="{{ route('download', ['filename' => $new->file]) }}">{{$new->file}}</a></td> -->
                        <td><a href="/storage/{{ $new->file }}" target="_blank">{{ $new->file }}</a></td>
                        <td>{{$new->addedBy}}</td>
                        <td>{{$new->created_at}}</td>
                        <td>{{$new->modifiedBy}}</td>
                        <td>{{$new->modified_at}}</td>
                        <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="javascript:;" id="editButton" data-id="{{$new->id}}" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="deleteButton" data-id="{{$new->id}}" class="dropdown-item"> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-primary" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>

    </div>
</div>


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
<!-- END row -->

@endsection
